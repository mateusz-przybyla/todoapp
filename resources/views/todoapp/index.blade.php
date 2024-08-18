@extends("layouts.app")
@section("title", "To-Do List")

@section("content")

@isset($x)
    {{ $x }}
@endisset

<div class="d-flex flex-column justify-content-center align-items-center rounded main-color py-5 mb-1">
    <form method="POST" class="mb-3">
        @csrf
        <div class="d-flex gap-2">
            <input type="text" name="content" placeholder="Enter a to-do item" class="form-control">
            <input type="submit" value="Add" class="btn btn-primary">
        </div>
        @error("content")
            <span class="error">{{ $message }}</span>
        @enderror
    </form>
    
    <ul class="list-group col-10 col-md-8 mb-4">
        <p class="mb-1">Uncompleted tasks:</p>
        @foreach ($tasks as $task)
            @if ($task->completed === 0)
                <li class="list-group-item rounded">
                    <form method="POST" action="{{ route("todoapp.update", $task->id) }}" class="d-flex gap-2">
                        @csrf
                        @method("PUT")
                        <input type="text" name="content" value="{{ $task->content }}" class="form-control">
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>

                    <div class="d-flex my-2">
                        <form method="POST" action="{{ route("todoapp.destroy", $task->id) }}" class="me-2">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                        <form method="POST" action="{{ route("todoapp.complete", $task->id) }}" class="me-2">
                            @csrf
                            @method("PUT")
                            <button type="submit" class="btn btn-success">Done</button>
                        </form>
                    </div>
                </li>
            @endif
        @endforeach
    </ul>

    <ul class="list-group col-10 col-md-8">
        <p class="mb-1">Completed tasks:</p>
        @foreach ($tasks as $task)
            @if ($task->completed === 1)
                <li class="list-group-item rounded">
                    <form method="POST" action="{{ route("todoapp.update", $task->id) }}" class="d-flex gap-2">
                        @csrf
                        @method("PUT")
                        <input type="text" name="content" value="{{ $task->content }}" class="form-control">
                        <button type="submit" class="btn btn-warning">Edit</button>
                    </form>

                    <form method="POST" action="{{ route("todoapp.destroy", $task->id) }}" class="me-2 my-2">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </li>
            @endif
        @endforeach
    </ul>
@endsection