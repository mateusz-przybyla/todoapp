<?php

namespace App\Http\Controllers;

use App\Models\{Task, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Log, Auth};

class TodoAppController extends Controller
{
    protected $validationRules = ["content" => "required", "execution_date" => ["required", "date"]];

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $uncompletedTasks = Task::where('user_id', Auth::id())->where('completed', 0)->orderBy('execution_date', 'asc')->paginate(5, ['*'], 'uncompletedTasks');
        $completedTasks = Task::where('user_id', Auth::id())->where('completed', 1)->orderBy('execution_date', 'desc')->paginate(5, ['*'], 'completedTasks');

        return view('todoapp.index')->with(compact('uncompletedTasks','completedTasks'));
    }

    public function create()
    {
        return view("todoapp.create");
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
        Log::info($request);

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
