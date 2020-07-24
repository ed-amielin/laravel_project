@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><a href="{{ route('project', $project->id) }}"><button class="btn btn-secondary"><- return to project</button></a></p>
            <div class="card">
                <div class="card-header">Creating a new task for project {{ $project->name }}</div>

                <div class="card-body">


                    <form action="{{ route('create-task', $project->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <lable for="name">Input title</lable>
                            <input type="text" name="name" placeholder="Input title" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <lable for="description">Description</lable>
                            <textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
                        </div>

                        <div class="form-group">
                            <lable for="file">File</lable>
                            <input name="file" id="file" type="file" class="form-control" placeholder="file">
                        </div>

                        <button type="submit" class="btn btn-success">Create</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
