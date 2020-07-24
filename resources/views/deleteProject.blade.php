@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p><a href="{{ route('project', $project->id) }}"><button class="btn btn-secondary"><- return to project</button></a></p>
            <div class="card">
                <div class="card-header"><h3>Confirm deliting the "{{ $project->name }}" project</h3></div>

                <div class="card-body">

                    <div class="alert alert-danger" role="alert">
                      Are you sure you want to delete this project? Deleting a project will automatically delete its tasks.
                    </div>
                    <form action="{{ route('confirm-delete-project', $project->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="$project->id">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
