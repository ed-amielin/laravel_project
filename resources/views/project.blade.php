@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><a href="{{ route('home') }}"><button class="btn btn-secondary"><- return to dashboard</button></a></p>
            <div class="card">
                <div class="card-header"><h3>{{ $project->name }}</h3></div>

                <div class="card-body">
                    <p>
                        <a href="{{ route('edit-project', $project->id) }}"><button class="btn btn-warning">Edit this project</button></a>
                        <a href="{{ route('delete-project', $project->id) }}"><button class="btn btn-danger">Delete this project</button></a>
                    </p>
                    <p>{{ $project->description }}</p>
                    <p><small>Created at: {{ $project->created_at }}</small></p>
                    <p><small>Updated at: {{ $project->updated_at }}</small></p>

                    <p>
                        <a href="{{ route('new-task', $project->id) }}"><button class="btn btn-info">Add new task</button></a>
                    </p>

                    @foreach($tasks as $task)
                        <div class="alert alert-info">
                            @if($task->status == 'New')
                                <span class="badge badge-pill badge-success" style="float: right;">
                            @elseif($task->status == 'In progress')
                                <span class="badge badge-pill badge-warning" style="float: right;">
                            @elseif($task->status == 'Done')
                                <span class="badge badge-pill badge-primary" style="float: right;">
                            @endif
                                {{ $task->status }}</span>
                            <h3>{{ $task->name }}</h3>
                            <p>{{ $task->description }}</p>
                            <p><small>Created at: {{ $task->created_at }}</small></p>
                            <p><small>Updated at: {{ $task->updated_at }}</small></p>
                            <a href="{{ route('task', $task->id) }}"><button class="btn btn-warning">Open</button></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
