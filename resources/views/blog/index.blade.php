@extends("layouts.app")
@section("title", "Blog")

@section("content")
<div class="d-flex flex-column justify-content-center align-items-center rounded main-color py-5 mb-3">
	<form method="POST" class="col-10 col-md-8">
		@csrf
		<div class="mb-2">
			<label for="post" class="form-label mb-0 fw-semibold">New entry title</label>
			<input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Title" required>
			@error("description")
				<span class="error">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<div class="mb-3">
			<label for="post" class="form-label mb-0 fw-semibold">Post</label>
			<textarea name="post" class="form-control @error('post') is-invalid @enderror" id="post" rows="3" placeholder="..." required></textarea>
			@error("post")
				<span class="error">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>
		<button class="btn btn-primary" type="submit">Add new entry</button>
	</form>
</div>
<div class="d-flex flex-column justify-content-center align-items-center rounded main-color py-5 mb-1">
	<ul class="list-group col-10 col-md-8 mb-4">
        <p class="mb-1 fw-semibold">Recent entries:</p>
        @foreach ($posts as $post)
			<li class="list-group-item rounded mb-1">
				<p class="my-0 fs-5 fw-bolder">{{ $post->description }}</p>
				<p class="fs-6 my-0 fst-italic">{{ $post->created_at }}</p>
				<hr class="my-1">
				<p class="my-0">{{ $post->post }}</p>
				<hr class="my-1">

				<div class="d-flex my-2">
					<form method="POST" action="{{ route("blog.destroy", $post->id) }}" class="me-2">
						@csrf
						@method("DELETE")
						<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
					<div class="">
						<a class="btn btn-warning btn-sm" href="{{ route('blog.edit', $post->id) }}" role="button">Edit</a>
					</div>
				</div>
			</li>
        @endforeach
    </ul>
	{{ $posts->links() }}

</div>
@endsection