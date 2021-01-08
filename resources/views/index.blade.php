@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if($userIsLoggedIn)
                    <a href="{{url('/posts/create')}}" class="btn btn-info text-white"> Create New Post </a>
                @endif
                <div class="row mt-3">
                    @foreach($allPosts as $post)
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{ $post->title }}</h4>
                                    @if($userIsLoggedIn)
                                        <a href="#" class="card-link">Edit</a>
                                        <a href="#" class="card-link">Delete</a>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ $post->content }}</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted float-left">Author: {{ $post->user->name }}</small>
                                    <small class="text-muted float-right">Created: {{ $post->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
