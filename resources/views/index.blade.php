@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get("success") }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get("success") }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if($userIsLoggedIn)
                    <a href="{{ route('posts.create') }}" class="btn btn-info text-white"> Create New Post </a>
                @endif
                <div class="row">
                    @foreach($allPosts as $post)
                        <div class="col-sm-6 mt-3 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{ $post->title }}</h4>
                                    @if($userIsLoggedIn)
                                        <div class="row">
                                            <a href="{{ route('posts.edit', $post->id) }}" class="card-link btn btn-link p-0 mr-3 ml-3">Edit</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="card-link btn btn-link p-0">Delete</button>
                                            </form>
                                        </div>
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
