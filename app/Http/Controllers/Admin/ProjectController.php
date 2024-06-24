<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->perPage ? $request->perPage : 10;
        $projectsArray = Project::paginate($perPage)->appends(['perPage' => $perPage]);

        return view('admin.projects.index', compact('projectsArray'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $newProject = $request->validated();
        $project = new Project();
        $project->slug = Str::slug($request->title);
        $project->fill($newProject);
        $project->save();
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view ('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $newProject = $request->all();
        $project->slug = Str::slug($request->title);
        $project->update($newProject);
        return redirect()->route('admin.projects.show', compact('project'))->with('message', 'Il progetto ' . $project->title . ' è stato modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'Il progetto ' . $project->title . ' è stato eliminato correttamente');
    }
}
