@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if (Auth::check())
                        <div class="alert alert-success" role="alert">
                            You are logged in
                        </div>
                    @endif

                    <div class="card-header">Current Posts</div>
                    <div id="posts"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
