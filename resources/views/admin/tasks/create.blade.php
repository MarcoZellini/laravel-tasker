@extends('layouts.admin')

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST" class="m-3">

        @csrf
        <div class="m-3">
            <label for="" class="form-label">Insert a Task Description</label>
            <textarea class="form-control" name="description" id="" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
