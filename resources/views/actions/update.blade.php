@extends('layout.app')

@section('content')
    <div class="container">
        @if ($errors->any())tink
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Post Title</label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="content">Post Content</label>
                <textarea type="text" class="form-control" name="contents" rows="8" >{{ $post->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
@endsection
