@extends('layout.app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{url('/posts')}}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Post Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Post Content</label>
                <textarea class="form-control" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
            <button type="reset" class="btn btn-danger float-right">Clear Fields</button>
        </form>
    </div>
@endsection
