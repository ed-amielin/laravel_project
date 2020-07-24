@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    

                    <p><a href="{{ route('new-project') }}"><button class="btn btn-primary">Create new project</button></a></p>

                    @foreach($data as $project)
                        <div class="alert alert-info">
                            <h3>{{ $project->name }}</h3>
                            <p>{{ $project->description }}</p>
                            <p><small>Created at: {{ $project->created_at }}</small></p>
                            <p><small>Updated at: {{ $project->updated_at }}</small></p>
                            <a href="{{ route('project', $project->id) }}"><button class="btn btn-warning">Open</button></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
