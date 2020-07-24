@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><a href="{{ route('project', $project->id) }}"><button class="btn btn-secondary"><- return to project</button></a></p>
            <div class="card">
                <div class="card-header"><h3>Editing the "{{ $project->name }}" project</h3></div>

                <div class="card-body">


                    <form action="{{ route('save-project', $project->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <lable for="name">Title</lable>
                            <input type="text" name="name" placeholder="Input title" id="name" class="form-control" value="{{ $project->name }}">
                        </div>

                        <div class="form-group">
                            <lable for="description">Description</lable>
                            <textarea name="description" id="description" class="form-control" placeholder="Description">{{ $project->description }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
