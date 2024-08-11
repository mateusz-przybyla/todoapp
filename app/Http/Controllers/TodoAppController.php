<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TodoAppController extends Controller
{
    public function index()
    {
        return view('todoapp.index')->with("tasks", Task::all());
    }

    public function store(Request $request, Task $task)
    {
        //Log::info($request);

        $task->content = $request->content;

        $task->save();

        return redirect()->route("todoapp.index");
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route("todoapp.index");
    }

    public function update(Task $task, Request $request)
    {
        $task->content = $request->content;

        $task->save();

        return redirect()->route("todoapp.index");
    }
}
