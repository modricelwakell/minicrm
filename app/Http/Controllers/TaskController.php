<?php

namespace App\Http\Controllers;

use App\Enums\Enum\TaskStatus;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(['client', 'user', 'project'])->latest()->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select(['id', 'first_name', 'last_name'])->get();
        $clients = Client::select(['id', 'company_name'])->get();
        $projects = Project::select(['id', 'title'])->get();
        $statuses = TaskStatus::cases();

        return view('tasks.create', compact('users', 'clients', 'statuses', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        Task::create($request->validated());

        return redirect()->route('tasks.index')
            ->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function edit(Task $task)
    {
        $users = User::select(['id', 'first_name', 'last_name'])->get();
        $clients = Client::select(['id', 'company_name'])->get();
        $projects = Project::select(['id', 'title'])->get();
        $statuses = TaskStatus::cases();

        return view('tasks.edit', compact('task', 'users', 'clients', 'statuses', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Gate::authorize('delete clients');
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}
