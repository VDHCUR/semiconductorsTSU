<?php

namespace App\Http\Controllers;

use App\Avatars;
use App\Http\Requests\AvatarUpdateRequest;
use App\Http\Requests\ProfileDocsRequest;
use App\Http\Resources\UserResource;
use App\PersonDocs;
use App\Persons;
use App\Profiles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
    public function index()
    {
        return view('about.employees', [
            'employees' => UserResource::collection(User::where('deleted', 0)->latest()->get())
        ]);
    }

    public function show($employee)
    {
        if (User::find($employee)->deleted === 1) {
            return abort(404);
        }

        return view('about.employee', [
            'employee' => new UserResource(User::find($employee))
        ]);
    }

    public function edit(User $employee)
    {
        if ($employee->deleted === 1) {
            return abort(404);
        }

        if (Auth::user()->is_admin || Auth::user()->id === $employee->id) {
            return view('admin.edit_user', [
                'employee' => $employee
            ]);
        }

        return abort(401);
    }

    public function update(Request $request, User $employee)
    {
        if (Auth::user()->is_admin && Auth::user()->id === $employee->id) {
            $isadmin = 1;
        } else {
            if (isset($request->isadmin)) {
                if ($request->isadmin == "on") {
                    $isadmin = 1;
                } else {
                    $isadmin = 0;
                }
            } else {
                $isadmin = 0;
            }
        }

        if (Auth::user()->id === $employee->id) {
            $employee->update([
                'password' => Hash::make($request->password),
                'is_admin' => $isadmin,
            ]);
        }


        if (Auth::user()->is_admin === 1) {
            $employee->update([
                'is_admin' => $isadmin
            ]);

            $employee->person->update([
                'degree' => $request->degree,
                'position' => $request->position,
                'link' => $request->link,
            ]);
        }

        $employee->update([
            'email' => $request->email,
        ]);

        $employee->person->update([
            'surname' => $request->surname,
            'name' => $request->first_name,
            'patronymic' => $request->patronymic,
            'phone' => $request->phone,
        ]);

        if (Auth::user()->id === $employee->id) {
            return redirect('/profile');
        }

        return redirect('/employees/' . $employee->id);

    }

    public function destroy(Request $request, User $employee)
    {
        if (Auth::user()->id === $employee->id) {
            return abort(403);
        }

        $employee->update([
            'deleted' => 1,
        ]);

        if (isset($request->admin)) {
            return redirect('/admin/employees');
        }

        return redirect('/employees');
    }

    public function self()
    {
        return view('profile');
    }

    public function avatar_update(AvatarUpdateRequest $request)
    {

        if (!empty(Auth::user()->person->avatar[0])) {
            Auth::user()->person->avatar[0]->update([
                'deleted' => 1
            ]);
        }

        $path = '/storage/' . $request->avatar->store('/avatars', ['disk' => 'public']);
        Avatars::create([
            'persons_id' => Auth::user()->person->id,
            'path' => $path
        ]);

        return redirect()->back();
    }

    public function self_edit()
    {
        if (User::find(Auth::user()->id)->deleted === 1) {
            return abort(404);
        }

        return view('admin.edit_user', [
            'employee' => User::find(Auth::user()->id)
        ]);
    }

    public function admin()
    {
        return view('admin.employees', [
            'employees' => UserResource::collection(User::where('deleted', 0)->where('id', '!=', Auth::user()->id)->latest()->get())
        ]);
    }

    public function contacts()
    {
        return view('contacts', [
            'director' => new UserResource(User::where('deleted', 0)->whereHas('person', function ($query) {
                $query->where('position', '=', 'Зав. кафедрой');
            })->latest()->first()),
            'secretary' => new UserResource(User::where('deleted', 0)->whereHas('person', function ($query) {
                $query->where('position', '=', 'Секретарь');
            })->latest()->first())
        ]);
    }

    public function upload_doc(ProfileDocsRequest $request)
    {
        $person = Auth::user()->person;

        if (!empty($request->docs) && (count($person->docs) + count($request->docs) < 5)) {
            $files = [];
            for ($i = 0; $i < count($request->docs); $i++) {
                $files[$request->docs[$i]->getClientOriginalName()] = '/storage/' . $request->docs[$i]->store('/docs', ['disk' => 'public']);
            }
            echo "<br><br>";
            foreach ($files as $name => $path) {
                PersonDocs::create([
                    'name' => $name,
                    'path' => $path,
                    'persons_id' => $person->id,
                ]);
            }
        }

        return redirect('/profile');
    }

    public function delete_doc(PersonDocs $doc)
    {
        $doc->update([
            'deleted' => 1
        ]);

        return redirect()->back();
    }
}
