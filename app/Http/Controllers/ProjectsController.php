<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectsStoreRequest;
use App\Http\Requests\ProjectsUpdateRequest;
use App\Persons;
use App\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('projects.index', [
            'projects' => Projects::where('archived', '=', '0')->get()
        ]);
    }

    public function create()
    {
        return view('projects.create', [
            'employees' => Persons::whereHas('user', function($query) {
                $query->where('deleted', '=', 0);
            })->get()
        ]);
    }

    public function store(ProjectsStoreRequest $request)
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

        Projects::create([
            'director_id' => $request->director,
            'codename' => $request->codename,
            'name' => $request->name,
            'deadline' => $request->deadline,
            'archived' => $archived,
        ]);

        return redirect('/admin/projects');
    }

    public function edit(Projects $project)
    {
        return view('projects.edit', [
            'project' => $project,
            'employees' => Persons::whereHas('user', function($query) {
                $query->where('deleted', '=', 0);
            })->get()
        ]);
    }

    public function update(ProjectsUpdateRequest $request, Projects $project)
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

        $project->update([
            'director_id' => $request->director,
            'codename' => $request->codename,
            'name' => $request->name,
            'deadline' => $request->deadline,
            'archived' => $archived,
        ]);

        return redirect('/admin/projects');
    }

    public function destroy(Projects $project)
    {
        $project->update([
            'deleted' => 1
        ]);

        return redirect()->back();
    }

    public function admin()
    {
        return view('admin.projects', [
            'projects' => Projects::where('deleted', 0)->latest()->get()
        ]);
    }

    public function archive()
    {
        return view('projects.archive', [
            'projects' => Projects::where('deleted', '=', 0)->where('archived', '=', '1')->get()
        ]);
    }

    public function zip(Projects $project)
    {
        if ($project->archived === 0) {
            $project->update([
                'archived' => 1
            ]);
        }
        else{
            $project->update([
                'archived' => 0
            ]);
        }

        return redirect()->back();
    }


}
