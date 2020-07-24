@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><a href="{{ route('project', $task->project_id) }}"><button class="btn btn-secondary"><- return to project</button></a></p>
            <div class="card">
                <div class="card-header"><h3>{{ $task->name }}</h3></div>

                <div class="card-body">
                    <p>
                            @if($task->status == 'New')
                                <span class="badge badge-pill badge-success" style="float: right;">
                            @elseif($task->status == 'In progress')
                                <span class="badge badge-pill badge-warning" style="float: right;">
                            @elseif($task->status == 'Done')
                                <span class="badge badge-pill badge-primary" style="float: right;">
                            @endif
                                {{ $task->status }}</span>
                        <a href="{{ route('edit-task', $task->id) }}"><button class="btn btn-warning">Edit this task</button></a>
                        <a href="{{ route('delete-task', $task->id) }}"><button class="btn btn-danger">Delete this task</button></a>
                    </p>
                    <p>{{ $task->description }}</p>
                    <p><small>Created at: {{ $task->created_at }}</small></p>
                    <p><small>Updated at: {{ $task->updated_at }}</small></p>

                    @if($task->file_name)

                        <p>Attached file:
                            <div class="alert alert-secondary" role="alert">
                              {{$task->file_name}}
                            </div>
                            <a href="{{ route('download-file', $task->id) }}">
                                <button type="button" class="btn btn-info">Download</button>
                            </a>
                         </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
