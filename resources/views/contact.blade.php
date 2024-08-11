@extends("layouts.app")
@section("title", "Contact us")

@section("content")
<form method="POST">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"><br>
    <label for="message">Message:</label><br>
    <textarea id="message" name="message"></textarea><br>
    <input type="submit" value="Send">
</form>
@endsection