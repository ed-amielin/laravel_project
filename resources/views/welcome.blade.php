@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Welcome') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                            <h4>Welcome to the best project management system</h4>
                    @guest
                            Please <a href="{{ route('login') }}">log in</a>@if (Route::has('register')) or <a href="{{ route('register') }}">create an account</a>@endif.
                    @else
                            Please go to <a href="{{ route('home') }}">your dashboard</a>.
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
