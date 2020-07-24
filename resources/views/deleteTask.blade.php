@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><a href="{{ route('task', $task->id) }}"><button class="btn btn-secondary"><- return to task</button></a></p>
            <div class="card">
                <div class="card-header"><h3>Confirm deliting the "{{ $task->name }}" task</h3></div>

                <div class="card-body">

                    <div class="alert alert-danger" role="alert">
                      Are you sure you want to delete this task?
                    </div>
                    <form action="{{ route('confirm-delete-task', $task->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="$task->id">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
