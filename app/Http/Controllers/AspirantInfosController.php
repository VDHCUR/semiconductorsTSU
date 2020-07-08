<?php

namespace App\Http\Controllers;

use App\AspirantDocs;
use App\AspirantInfos;
use App\Http\Requests\AspirantStoreRequest;
use App\Http\Requests\AspirantUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AspirantInfosController extends Controller
{
    public function index()
    {
        return view('aspirant', [
            'info' => AspirantInfos::latest()->first()
        ]);
    }

    public function create()
    {
        if (!empty(AspirantInfos::latest()->first())){
            return redirect('/aspirant/edit');
        }
        return view('admin.aspirant_create');
    }

    public function store(AspirantStoreRequest $request)
    {
        if (!empty(AspirantInfos::latest()->first())){
            return abort(403);
        }

        $aspirant = AspirantInfos::create([
            'info' => $request->info
        ]);

        if (!empty($request->docs)) {
            $files = [];
            for ($i = 0; $i < count($request->docs); $i++) {
                $files[$request->docs[$i]->getClientOriginalName()] = '/storage/' . $request->docs[$i]->store('/docs', ['disk' => 'public']);
            }
            echo "<br><br>";
            foreach ($files as $name => $path) {
                AspirantDocs::create([
                    'name' => $name,
                    'path' => $path,
                    'aspirant_infos_id' => $aspirant->id,
                ]);
            }
        }
        
        return redirect('/admin/aspirant');
    }

    public function edit()
    {
        if (empty(AspirantInfos::latest()->first())){
            return redirect('/aspirant/create');
        }

        return view('admin.aspirant_change', [
            'info' => AspirantInfos::latest()->first()
        ]);
    }

    public function update(AspirantUpdateRequest $request)
    {
        if (empty(AspirantInfos::latest()->first())){
            return abort(403);
        }

        if (!empty($request->docs_to_delete)) {
            foreach ($request->docs_to_delete as $id) {
                AspirantDocs::where('id', $id)->update([
                    'deleted' => 1
                ]);
            }
        }

        $aspirant = AspirantInfos::latest()->first();

        if (!empty($request->docs) && (count($aspirant->docs)+count($request->docs) < 5)){
            $files = [];
            for ($i = 0; $i < count($request->docs); $i++) {
                $files[$request->docs[$i]->getClientOriginalName()] = '/storage/' . $request->docs[$i]->store('/docs', ['disk' => 'public']);
            }
            echo "<br><br>";
            foreach ($files as $name => $path) {
                AspirantDocs::create([
                    'name' => $name,
                    'path' => $path,
                    'aspirant_infos_id' => $aspirant->id,
                ]);
            }
        }

        $aspirant->update([
            'info' => $request->info,
        ]);

        return redirect('/admin/aspirant');
    }

    public function admin()
    {
        return view('admin.aspirant', [
            'info' => AspirantInfos::latest()->first()
        ]);
    }
}
