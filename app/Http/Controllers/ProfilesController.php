<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilesStoreRequest;
use App\Http\Requests\ProfilesUpdateRequest;
use App\Profiles;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{

    public function index()
    {
        return view('about.profiles.all', ['profiles' => Profiles::latest()->get()]);
    }

    public function create(){
        return view('about.profiles.create');
    }

    public function store(ProfilesStoreRequest $request)
    {
        Profiles::create($request->all());

        return redirect('/admin/profiles');
    }

    public function edit(Profiles $profile)
    {
        return view('about.profiles.edit', [
            'profile' => $profile
        ]);
    }

    public function update(ProfilesUpdateRequest $request, Profiles $profile)
    {
        $profile->update([
            'name' => $request->name,
            'stage' => $request->stage,
        ]);

        return redirect('/admin/profiles');
    }

    public function destroy(Profiles $profile)
    {
        $profile->update([
            'deleted' => 1
        ]);

        return redirect()->back();
    }
    
    
    public function bachelor()
    {
        return view('about.profiles.bachelor',
            ['profiles' => Profiles::where('stage', 0)->latest()->get()]);
    }

    public function magistr()
    {
        return view('about.profiles.magistr',
            ['profiles' => Profiles::where('stage', 1)->latest()->get()]);
    }

    public function admin()
    {
        return view('admin.profiles', [
            'profiles' => Profiles::latest()->get()
        ]);
    }
}
