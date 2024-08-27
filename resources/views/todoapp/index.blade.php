@extends("layouts.app")
@section("title", "To-Do List")

@section("content")

@isset($x)
    {{ $x }}
@endisset

<div class="d-flex flex-column justify-content-center align-items-center rounded main-color py-5 mb-1">
    
    <a class="btn btn-primary" href="{{ route('todoapp.create') }}" role="button">Add new task</a>

    <ul class="list-group col-10 col-md-8 mb-4">
        <p class="mb-1 aaa">Uncompleted tasks:</p>
        @foreach ($uncompletedTasks as $uncompletedTask)
            <li class="list-group-item rounded">
                <p class="fs-6 my-1 fst-italic">{{ $uncompletedTask->created_at }}</p>
                
                <form method="POST" action="{{ route("todoapp.update", $uncompletedTask->id) }}" class="d-flex gap-2">
                    @csrf
                    @method("PUT")
                    <input type="text" name="content" value="{{ $uncompletedTask->content }}" class="form-control">
                    <button type="submit" class="btn btn-warning">Edit</button>
                </form>

                <div class="d-flex my-2">
                    <form method="POST" action="{{ route("todoapp.destroy", $uncompletedTask->id) }}" class="me-2">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                    <form method="POST" action="{{ route("todoapp.complete", $uncompletedTask->id) }}" class="me-2">
                        @csrf
                        @method("PUT")
                        <button type="submit" class="btn btn-success">Done</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $uncompletedTasks->links() }}

    <ul class="list-group col-10 col-md-8 mb-4">
        <p class="mb-1">Completed tasks:</p>
        @foreach ($completedTasks as $completedTask)
            <li class="list-group-item rounded">
                <p class="fs-6 my-1 fst-italic">{{ $completedTask->created_at }}</p>

                <form method="POST" action="{{ route("todoapp.update", $completedTask->id) }}" class="d-flex gap-2">
                    @csrf
                    @method("PUT")
                    <input type="text" name="content" value="{{ $completedTask->content }}" class="form-control">
                    <button type="submit" class="btn btn-warning">Edit</button>
                </form>

                <form method="POST" action="{{ route("todoapp.destroy", $completedTask->id) }}" class="me-2 my-2">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
    {{ $completedTasks->links() }}

@endsection
