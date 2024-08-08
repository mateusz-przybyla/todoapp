@extends("layouts.app")
@section("title", "To-Do List")

@section("content")
<form>
    <div>
        <input type="text" placeholder="Enter a to-do item" required>
        <input type="submit" value="Add">
    </div>
</form>
@endsection