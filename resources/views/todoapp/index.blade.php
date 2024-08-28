@extends("layouts.app")
@section("title", "To-Do List")

@section("content")

@isset($x)
    {{ $x }}
@endisset

<div class="d-flex flex-column justify-content-center align-items-center rounded main-color py-5 mb-1">

    <div class="col-10 col-md-8 text-end">
        <a class="btn btn-primary" href="{{ route('todoapp.create') }}" role="button">Add new task</a>
    </div>

    <ul class="list-group col-10 col-md-8 mb-4">
        <p class="mb-1 fw-semibold">Uncompleted tasks:</p>
        @foreach ($uncompletedTasks as $uncompletedTask)
            <li class="list-group-item rounded">
                <p class="fs-6 my-1 fst-italic">Created at: {{ $uncompletedTask->created_at }}</p>
                
                <form method="POST" action="{{ route("todoapp.update", $uncompletedTask->id) }}" class="d-flex gap-2">
                    @csrf
                    @method("PUT")

                    <div class="d-flex flex-column flex-lg-row w-100 gap-2">
                        <input type="text" name="content" value="{{ $uncompletedTask->content }}" class="form-control form-control w-100">
                        <input type="date" name="execution_date" value="{{ $uncompletedTask->execution_date }}" class="form-control form-control w-100 w-lg-25">
                    </div>
                    <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                </form>

                <div class="d-flex my-2">
                    <form method="POST" action="{{ route("todoapp.complete", $uncompletedTask->id) }}" class="me-2">
                        @csrf
                        @method("PUT")
                        <button type="submit" class="btn btn-success btn-sm">Done</button>
                    </form>
                    <div class="">
                        <button type="button" class="btn btn-danger btn-sm me-2" data-bs-toggle="modal" data-bs-target="#updateModal">Delete</button>
                    </div>
                </div>

                <!-- Modal update -->
				<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
						<form method="POST" action="{{ route("todoapp.destroy", $uncompletedTask->id) }}">
							@csrf
							@method("DELETE")

							<div class="modal-header">
								<h1 class="modal-title fs-5" id="updateModalLabel">Delete task</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<p class="my-0">Are you sure want to delete?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</form>
					</div>
				</div>
				<!-- end Modal update -->
            </li>
        @endforeach
    </ul>
    {{ $uncompletedTasks->links() }}

    <ul class="list-group col-10 col-md-8 mb-4">
        <p class="mb-1 fw-semibold">Completed tasks:</p>
        @foreach ($completedTasks as $completedTask)
            <li class="list-group-item rounded">
                <p class="fs-6 my-1 fst-italic">{{ $completedTask->created_at }}</p>

                <form method="POST" action="{{ route("todoapp.update", $completedTask->id) }}" class="d-flex gap-2">
                    @csrf
                    @method("PUT")

                    <div class="d-flex flex-column flex-lg-row w-100 gap-2">
                        <input type="text" name="content" value="{{ $completedTask->content }}" class="form-control form-control w-100">
                        <input type="date" name="execution_date" value="{{ $completedTask->execution_date }}" class="form-control form-control w-100 w-lg-25">
                    </div>
                    <button type="submit" class="btn btn-warning btn-sm">Edit</button>
                </form>

                <form method="POST" action="{{ route("todoapp.destroy", $completedTask->id) }}" class="me-2 my-2">
                    @csrf
                    @method("DELETE")

                    <button type="button" class="btn btn-danger btn-sm me-2" data-bs-toggle="modal" data-bs-target="#updateModal2">Delete</button>
                </form>

                <!-- Modal update 2 -->
				<div class="modal fade" id="updateModal2" tabindex="-1" aria-labelledby="updateModal2Label" aria-hidden="true">
					<div class="modal-dialog">
					<div class="modal-content">
						<form method="POST" action="{{ route("todoapp.destroy", $completedTask->id) }}">
							@csrf
							@method("DELETE")

							<div class="modal-header">
								<h1 class="modal-title fs-5" id="updateModal2Label">Delete task</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<p class="my-0">Are you sure want to delete?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</form>
					</div>
				</div>
				<!-- end Modal update 2 -->
            </li>
        @endforeach
    </ul>
    {{ $completedTasks->links() }}

@endsection
