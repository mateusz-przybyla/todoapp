<?php

namespace App\Http\Controllers;

use App\Models\{Task, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Log, Auth};

class TodoAppController extends Controller
{
    protected $validationRules = ["content" => "required"];

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('todoapp.index', [
            'tasks' => Task::where('user_id', Auth::id())->get()
        ]);
    }

    public function store(Request $request)
    {
        //Log::info($request);

        $validatedData = $request->validate($this->validationRules);
        $validatedData['user_id'] = Auth::id();

        Task::create($validatedData);

        return redirect()->route("todoapp.index");
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route("todoapp.index");
    }

    public function update(Task $task, Request $request)
    {
        $validatedData = $request->validate($this->validationRules);

        $task->update($validatedData);

        return redirect()->route("todoapp.index");
    }

    public function complete(Task $task, Request $request)
    {
        $task->completed = 1;
        $task->save();

        return redirect()->route("todoapp.index");
    }
}
