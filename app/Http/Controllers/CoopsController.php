<?php

namespace App\Http\Controllers;

use App\Coops;
use App\Http\Requests\CoopsStoreRequest;
use App\Http\Requests\CoopsUpdateRequest;
use Illuminate\Http\Request;

class CoopsController extends Controller
{
    public function index()
    {
        return view('coop.index', [
            'coops' => Coops::where('deleted', 0)->where('global', 0)->latest()->get(),
            'globals' => Coops::where('deleted', 0)->where('global', 1)->latest()->get(),
        ]);
    }

    public function create()
    {
        return view('coop.create');
    }

    public function store(CoopsStoreRequest $request)
    {


        if (isset($request->global)) {
            if ($request->global== "on") {
                $global = 1;
            } else {
                $global = 0;
            }
        } else {
            $global = 0;
        }


        Coops::create([
            'name' => $request->name,
            'place' => $request->place,
            'link' => $request->link,
            'global' => $global,
        ]);

        return redirect('/admin/coop');
    }

    public function edit(Coops $coop)
    {
        return view('coop.edit', [
            'coop' => $coop
        ]);
    }

    public function update(CoopsUpdateRequest $request, Coops $coop)
    {
        if (isset($request->global)) {
            if ($request->global== "on") {
                $global = 1;
            } else {
                $global = 0;
            }
        } else {
            $global = 0;
        }

        $coop->update([
            'name' => $request->name,
            'place' => $request->place,
            'link' => $request->link,
            'global' => $global,
        ]);

        return redirect('/admin/coop');
    }

    public function destroy(Coops $coop)
    {
        $coop->update([
            'deleted' => 1
        ]);

        return redirect()->back();
    }

    public function admin()
    {
        return view('admin.coops', [
            'coops' => Coops::where('deleted', 0)->latest()->get()
        ]);
    }

}
