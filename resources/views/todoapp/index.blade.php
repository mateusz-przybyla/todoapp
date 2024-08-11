@extends("layouts.app")
@section("title", "To-Do List")

@section("content")

@isset($x)
    {{ $x }}
@endisset

<ul>
    @foreach ($tasks as $task)
        <li>{{ $task->content }}</li>
        <form method="POST" action="{{ route("todoapp.destroy", $task->id) }}">
            @csrf
            @method("DELETE")
            <button type="submit">delete</button>
        </form>
    @endforeach
</ul>

<form method="POST">
    @csrf
    <div>
        <input type="text" name="content" placeholder="Enter a to-do item">
        <input type="submit" value="Add">
    </div>
</form>
@endsection