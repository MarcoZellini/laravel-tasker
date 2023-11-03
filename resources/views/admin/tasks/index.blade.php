@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
    <div class="container">
        <h1 class="text-center">Dashboard</h1>

        <div class="my-2">
            @include('partials.taskCreateForm')
        </div>

        @if (session('message'))
            <div class="alert alert-success" role="alert">
                <strong>Success</strong> {{ session('message') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-primary align-middle text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">DESCRIPTION</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">CREATED AT</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tasks as $task)
                        <tr class="">
                            <td scope="row">{{ $task->id }}</td>
                            <td scope="row"><a class="text-dark text-decoration-none"
                                    href="{{ route('tasks.show', $task) }}">{{ $task->description }}</a>
                            </td>
                            <td scope="row">{{ $task->status ? 'DONE' : 'TO DO' }}</td>
                            <td scope="row">{{ $task->created_at }}</td>
                            <td scope="row">
                                <a class="btn btn-warning" href="{{ route('tasks.edit', $task) }}">Edit</a>

                                <!-- Modal trigger button -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalId-{{ $task->id }}">
                                    Delete
                                </button>

                                <!-- Modal Body -->
                                <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                <div class="modal fade" id="modalId-{{ $task->id }}" tabindex="-1"
                                    data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                    aria-labelledby="modalTitleId-{{ $task->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId-{{ $task->id }}">Delete Task
                                                    #{{ $task->id }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                This cannot be undone!
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>

                                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Confirm</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <h6 class="text-center m-0">There is any task yet!</h6>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
