<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $completedamount = count(Task::completed()->get());
        $totalamount = Task::select('id')->count();
        return view('index', ['completedamount' => $completedamount, 'tasks' => Task::latest()->select('id', 'title', 'description', 'completed')->paginate(5), 'totalamount' => $totalamount]);
    }
    public function create()
    {
        return view('create');
    }
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->validate([
            'title' => 'required|max:16',
            'description' => 'required|max:128',
            'long_description' => 'max:255'
        ]));
        return redirect()->route('tasks.show', $task)->with('success', 'Task created successfully!');
    }
    public function show(Task $task)
    {
        return view('show', ['task' => $task]);
    }
    public function edit(Task $task)
    {
        return view('edit', ['task' => $task]);
    }
    public function update(Request $request, Task $task)
    {
        if ($request->query()) {
            $task->toggleComplete();
            return redirect()->back()->with('success', 'Task updated successfully!');
        }
        $task->update($request->validate([
            'title' => 'required|max:16',
            'description' => 'required|max:128',
            'long_description' => 'max:255'
        ]));
        return redirect()->route('tasks.show', $task)->with('success', 'Task edited successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task was deleted successfully!');
    }
}
