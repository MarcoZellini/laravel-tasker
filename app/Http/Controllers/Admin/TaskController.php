<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.tasks.index', ['tasks' => Task::orderByDesc('id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'description' => $request->description
        ];

        Task::create($data);

        return to_route('tasks.index')->with('message', 'Task Created Successfully 👍');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('admin.tasks.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('admin.tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return to_route('tasks.index')->with('message', 'Task Updated Successfully 👍');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return to_route('tasks.index')->with('message', 'Task Deleted Successfully 👍');
    }
}
