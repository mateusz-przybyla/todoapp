@extends("layouts.app")
@section("title", "To-Do List")

@section("content")

@isset($x)
    {{ $x }}
@endisset

<ul>
    @foreach ($tasks as $task)
        @if ($task->completed === 0)
            <li
                @if ($task->completed === 0)
                style="color: red;"
                @endif
            >
                <form method="POST" action="{{ route("todoapp.update", $task->id) }}">
                    @csrf
                    @method("PUT")
                    <input type="text" name="content" value="{{ $task->content }}">
                    <button type="submit">Edit</button>
                </form>

                <form method="POST" action="{{ route("todoapp.destroy", $task->id) }}">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Delete</button>
                </form>

                <form method="POST" action="{{ route("todoapp.complete", $task->id) }}">
                    @csrf
                    @method("PUT")
                    <button type="submit">Mark as complete</button>
                </form>
            </li>
        @endif
    @endforeach
</ul>

<ul>
    @foreach ($tasks as $task)
         @if ($task->completed === 1)
            <li
                @if ($task->completed === 1)
                style="color: green;"
                @endif
            >
                <form method="POST" action="{{ route("todoapp.update", $task->id) }}">
                    @csrf
                    @method("PUT")
                    <input type="text" name="content" value="{{ $task->content }}">
                    <button type="submit">Edit</button>
                </form>

                <form method="POST" action="{{ route("todoapp.destroy", $task->id) }}">
                    @csrf
                    @method("DELETE")
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endif
    @endforeach
</ul>

<form method="POST">
    @csrf
    <div>
        <input type="text" name="content" placeholder="Enter a to-do item">
        <input type="submit" value="Add">
        @error("content")
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>
</form>
@endsection