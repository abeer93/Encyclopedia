@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $category->name }}</h1>
    <h3>List Post</h3>
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Post Title</th>
        <th>Post Content</th>
        <th colspan="3">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($posts as $post)
      <tr>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td><a href="{{ url('post/' . $post->id ) }}" class="btn btn-success">View</a></td>
        <td><button class="btn btn-warning edit-post-btn" id="{{$post->id}}">Edit</button>
        </td>
        <td>
            <form method="post" action="/post/{{ $post->id }}">
                {{ method_field('DELETE') }}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </td>
      </tr>
      @endforeach
</div>
<input id="pubicPath" value="{{url('/')}}" hidden>

<!-- edit post modal -->
<div class="modal fade" id="edit-post-modal">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><b>Edit Post</b></h4>
        </div>
        <div class="modal-body">
            <form role="form" action="">
            <meta name="_token" content="{{ csrf_token() }}">
            <div class="box-body">
                <div class="form-group">
                    <label for="title">title</label> 
                    <input type="text" class="form-control" id="modal-title-input" name="title">
                </div>
                <div class="form-group">
                    <label for="content">Content</label> 
                    <input type="text" class="form-control" id="modal-content-input" name="content">
                </div>
            </div>

            <input id="modal-id-input" hidden>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="save-edit-post">Edit Post</button>
            </div>
            </form>
        </div>
        </div>
    </div>
    </div>
<!-- end of edit post modal -->
@endsection
