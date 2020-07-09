<?php

namespace App\Http\Controllers;

use App\Http\Requests\HistoriesUpdateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\News;
use App\NewImages;
use App\Http\Requests\NewsStoreRequest;
use App\Http\Resources\NewsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Scopes\ExistScope;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.all', [
            'news' => News::where('new_header', '!=', 'История кафедры')->latest()->get()
        ]);
    }

    public function show(News $new)
    {
        if ($new->deleted === 0 && $new->new_header !== 'История кафедры') {
            return view('news.one', [
                'new' => $new
            ]);
        }

        return abort(404);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(NewsStoreRequest $request)
    {
        $new = News::create([
            'new_header' => $request->new_header,
            'new_lead' => $request->new_lead,
            'new_content' => $request->new_content,
        ]);

        if (!empty($request->images)) {
            $pathNames = [];
            for ($i = 0; $i < count($request->images); $i++) {
                $pathNames[] = '/storage/' . $request->images[$i]->store('/news_images', ['disk' => 'public']);
            }
            echo "<br><br>";
            foreach ($pathNames as $path) {
                NewImages::create([
                    'path' => $path,
                    'news_id' => $new->id,
                ]);
            }
        }

        return redirect('/news');
    }

    public function edit(News $new)
    {
        if ($new->new_header !== 'История кафедры') {
            return view('news.edit', [
                'new' => $new
            ]);
        }

        return abort(404);
    }

    public function update(News $new, NewsUpdateRequest $request)
    {
        if ($new->new_header === 'История кафедры') {
            return abort(403);
        }
        if (!empty($request->img_to_delete)) {
            foreach ($request->img_to_delete as $id) {
                NewImages::where('id', $id)->update([
                    'deleted' => 1
                ]);
            }
        }

        if (!empty($request->images) && (count($new->new_images) + count($request->images) <= 10)) {
            $pathNames = [];
            for ($i = 0; $i < count($request->images); $i++) {
                $pathNames[] = '/storage/' . $request->images[$i]->store('/news_images', ['disk' => 'public']);
            }
            echo "<br><br>";
            foreach ($pathNames as $path) {
                NewImages::create([
                    'path' => $path,
                    'news_id' => $new->id,
                ]);
            }
        }

        $new->update([
            'new_header' => $request->new_header,
            'new_lead' => $request->new_lead,
            'new_content' => $request->new_content,
        ]);

        return redirect('/news/' . $new->id);
    }

    public function destroy(Request $request, News $new)
    {

        if ($new->new_header === 'История кафедры') {
            return abort(403);
        }

        $new->update([
            'deleted' => 1
        ]);

        foreach ($new->new_images as $image) {
            $image->update([
                'deleted' => 1
            ]);
        }

        if (isset($request->admin)) {
            return redirect('/admin/news');
        }

        return redirect('/news');
    }

    public function admin()
    {
        return view('admin.news', [
            'news' => News::where('new_header', '!=', 'История кафедры')->latest()->get(),
        ]);
    }

    public function mainpage()
    {
        return view('index', [
            'news' => NewsResource::collection(News::where('new_header', '!=', 'История кафедры')->latest()->take(5)->get())
        ]);
    }

    public function history()
    {
        return view('about.history', [
            'new' => News::where('new_header', '=', 'История кафедры')->latest()->first()
        ]);
    }

    public function history_edit()
    {
        return view('admin.history_edit', [
            'new' => News::where('new_header', '=', 'История кафедры')->latest()->first()
        ]);
    }

    public function history_update(HistoriesUpdateRequest $request)
    {

        $new = News::where('new_header', '=', 'История кафедры')->latest()->first();
        if (!empty($request->img_to_delete)) {
            foreach ($request->img_to_delete as $id) {
                NewImages::where('id', $id)->update([
                    'deleted' => 1
                ]);
            }
        }

        if (!empty($request->images) && (count($new->new_images) + count($request->images) <= 10)) {
            $pathNames = [];
            for ($i = 0; $i < count($request->images); $i++) {
                $pathNames[] = '/storage/' . $request->images[$i]->store('/news_images', ['disk' => 'public']);
            }
            echo "<br><br>";
            foreach ($pathNames as $path) {
                NewImages::create([
                    'path' => $path,
                    'news_id' => $new->id,
                ]);
            }
        }

        $new->update([
            'new_content' => $request->new_content,
        ]);

        return redirect('/admin/history');
    }

    public function history_admin()
    {
        return view('admin.history_admin', [
            'new' => News::where('new_header', '=', 'История кафедры')->latest()->first()
        ]);
    }
}
