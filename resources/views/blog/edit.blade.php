@extends("layouts.app")
@section("title", "Update entry")

@section("content")
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card main-color">
            <div class="card-header">Edit entry</div>

            <div class="card-body">
                <form method="POST" action="{{ route('blog.update', $post->id ) }}">
                    @csrf
					@method("PUT")

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">Title</label>

                        <div class="col-md-6">
                            <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" value="{{ $post->description }}" required>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="post" class="col-md-4 col-form-label text-md-end">Post</label>

                        <div class="col-md-6">
							<textarea name="post" class="form-control @error('post') is-invalid @enderror" id="post" required>{{ $post->post }}</textarea>

                            @error('post')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <a class="btn btn-secondary" href="{{ route('blog.index') }}" role="button">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection