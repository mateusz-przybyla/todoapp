@extends("layouts.app")
@section("title", "Contact us")

@section("content")
<div class="rounded main-color py-5 mb-1">
    @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show col-md-6 mx-auto" role="alert">
        <strong>{{ session('status') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <h2 class="col-md-6 text-start mx-auto">Contact us</h2>

    <form method="POST" class="col-md-6 mx-auto">
        @csrf
        <div>
            <label for="name" class="mt-2">Name:</label><br>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        @error("name")
            <span class="error">{{ $message }}</span>
         @enderror

        <div>
            <label for="email" class="mt-2">Email:</label><br>
            <input type="text" id="email" name="email" class="form-control">
        </div>
        @error("email")
            <span class="error">{{ $message }}</span>
        @enderror

        <div>
            <label for="message" class="mt-2">Message:</label><br>
            <textarea id="message" name="message"  class="form-control"></textarea>
        </div>
        @error("message")
            <span class="error">{{ $message }}</span>
        @enderror

        <div>
            <input type="submit" value="Send" class="btn btn-primary mt-3">
        </div>
    </form>
</div>
@endsection