@extends("layouts.app")
@section("title", "Contact us")

@section("content")
<div class="rounded main-color py-5 mb-1">
    <h2 class="col-md-6 text-start mx-auto">Contact us</h2>
    <form method="POST" class="col-md-6 mx-auto">
        <label for="name" class="mt-2">Name:</label><br>
        <input type="text" id="name" name="name" class="form-control">
        <label for="email" class="mt-2">Email:</label><br>
        <input type="text" id="email" name="email" class="form-control">
        <label for="message" class="mt-2">Message:</label><br>
        <textarea id="message" name="message"  class="form-control"></textarea>
        <input type="submit" value="Send" class="btn btn-primary mt-3">
    </form>
</div>
@endsection