@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><a href="{{ route('task', $task->id) }}"><button class="btn btn-secondary"><- return to task</button></a></p>
            <div class="card">
                <div class="card-header"><h3>Editing the "{{ $task->name }}" task</h3></div>

                <div class="card-body">


                    <form action="{{ route('save-task', $task->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <lable for="name">Title</lable>
                            <input type="text" name="name" placeholder="Input title" id="name" class="form-control" value="{{ $task->name }}">
                        </div>

                        <div class="form-group">
                            <lable for="description">Description</lable>
                            <textarea name="description" id="description" class="form-control" placeholder="Description">{{ $task->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <span class="badge badge-pill badge-success">
                                <input type="radio" name="status" id="status1" value="New" @if($task->status == 'New')
                                    checked
                                @endif >
                                <lable for="status1">New</lable>
                            </span>
                            <span class="badge badge-pill badge-warning">
                                <input type="radio" name="status" id="status2" value="In progress" @if($task->status == 'In progress')
                                    checked
                                @endif >
                                <lable for="status2">In progress</lable>
                            </span>
                            <span class="badge badge-pill badge-primary">
                                <input type="radio" name="status" id="status3" value="Done" @if($task->status == 'Done')
                                    checked
                                @endif >
                                <lable for="status3">Done</lable>
                            </span>
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
