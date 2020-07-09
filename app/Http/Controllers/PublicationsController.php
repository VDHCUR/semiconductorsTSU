<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationsStoreRequest;
use App\Http\Requests\PublicationsUpdateRequest;
use App\Publications;
use Illuminate\Http\Request;

class PublicationsController extends Controller
{
    public function index()
    {
        return view('publications.index',[
            'publications' => Publications::where('archived', '=', '0')->orderBy('year', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('publications.create');
    }

    public function store(PublicationsStoreRequest $request)
    {
        if (isset($request->archived)) {
            if ($request->archived == "on") {
                $archived = 1;
            } else {
                $archived = 0;
            }
        } else {
            $archived = 0;
        }

        Publications::create([
            'name' => $request->name,
            'year' => $request->year,
            'archived' => $archived
        ]);

        return redirect('/admin/publications');
    }

    public function edit(Publications $publication)
    {
        return view('publications.edit', [
           'publication' => $publication
        ]);
    }

    public function update(PublicationsUpdateRequest $request, Publications $publication)
    {
        if (isset($request->archived)) {
            if ($request->archived == "on") {
                $archived = 1;
            } else {
                $archived = 0;
            }
        } else {
            $archived = 0;
        }

        $publication->update([
            'name' => $request->name,
            'year' => $request->year,
            'archived' => $archived
        ]);

        return redirect('/admin/publications');
    }

    public function destroy(Publications $publication)
    {
        $publication->update([
            'deleted' => 1
        ]);

        return redirect()->back();
    }

    public function archive()
    {
        return view('publications.archive', [
            'publications' => Publications::where('archived', 1)->orderBy('year', 'DESC')->get()
        ]);
    }

    public function admin()
    {
        return view('admin.publications', [
            'publications' => Publications::orderBy('year', 'DESC')->get()
        ]);
    }

    public function zip(Publications $publication)
    {
        if ($publication->archived === 0) {
            $publication->update([
                'archived' => 1
            ]);
        }
        else{
            $publication->update([
                'archived' => 0
            ]);
        }

        return redirect()->back();
    }

}
