<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubjectsStoreRequest;
use App\Persons;
use App\Profiles;
use App\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function create(Profiles $profile)
    {
        return view('about.profiles.add_subject', [
            'profile' => $profile,
            'employees' => Persons::whereHas('user', function($query) {
                $query->where('deleted', '=', 0);
            })->get()
        ]);
    }

    public function store(SubjectsStoreRequest $request, Profiles $profile)
    {
        Subjects::create([
            'profiles_id'=>$profile->id,
            'teacher_id'=>$request->teacher,
            'name'=>$request->name
        ]);

        return redirect('/admin/profiles');
    }

    public function edit(Profiles $profile, Subjects $subject)
    {
        return view('about.profiles.edit_subject', [
            'subject' => $subject,
            'profile' => $profile,
            'employees' => Persons::whereHas('user', function($query) {
                $query->where('deleted', '=', 0);
            })->get()
        ]);
    }

    public function update(Profiles $profile, Subjects $subject, SubjectsStoreRequest $request)
    {
        $subject->update([
            'profiles_id'=>$profile->id,
            'teacher_id'=>$request->teacher,
            'name'=>$request->name
        ]);

        return redirect('/admin/profiles');
    }

    public function destroy(Subjects $subject)
    {
        $subject->update([
            'deleted' => 1
        ]);

        return redirect()->back();
    }
}
