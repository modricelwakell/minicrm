<?php

namespace App\Http\Controllers;

use App\Enums\ProjectStatus;
use App\Http\Requests\StoreProjectsRequest;
use App\Http\Requests\UpdateProjectsRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\User;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::with(['client', 'user'])->latest()->paginate(10);

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        $users    = User::select(['id', 'first_name', 'last_name'])->get();
        $clients  = Client::select(['id', 'company_name'])->get();
        $statuses = ProjectStatus::cases();

        return view('projects.create', compact('users', 'clients', 'statuses'));
    }

    public function store(StoreProjectsRequest $request)
    {
        Project::create($request->validated());

        return redirect()->route('projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function edit(Project $project)
    {
        $users    = User::select(['id', 'first_name', 'last_name'])->get();
        $clients  = Client::select(['id', 'company_name'])->get();
        $statuses = ProjectStatus::cases();

        return view('projects.edit', compact('project', 'users', 'clients', 'statuses'));
    }

    public function update(UpdateProjectsRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect()->route('projects.index')
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}