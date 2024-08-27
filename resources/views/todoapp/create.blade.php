@extends("layouts.app")
@section("title", "Create new task")

@section("content")

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card main-color">
            <div class="card-header">Enter a to-do item</div>

            <div class="card-body">
                <form method="POST" action="{{ route('todoapp.store') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="content" class="col-md-4 col-form-label text-md-end">Content</label>

                        <div class="col-md-6">
                            <input id="content" type="text" class="form-control @error('content') is-invalid @enderror" name="content" value="{{ old('content') }}" required autofocus>

                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="execution_date" class="col-md-4 col-form-label text-md-end">Execution date</label>

                        <div class="col-md-6">
                            <input id="execution_date" type="date" class="form-control @error('execution_date') is-invalid @enderror" name="execution_date" value="{{ old('execution_date') }}" required>

                            @error('execution_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary me-2">
                                Add
                            </button>
                            <a class="btn btn-secondary" href="{{ route('todoapp.index') }}" role="button">Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
