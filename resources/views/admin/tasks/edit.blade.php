@extends('layouts.admin')

@section('content')
    <form action="{{ route('tasks.update', $task) }}" method="POST" class="m-3">

        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Insert a Task Description</label>
            <textarea class="form-control" name="description" id="" rows="3">{{ $task->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
@endsection
