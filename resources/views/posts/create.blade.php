@extends('layouts.app')

@section('content')
  @if ($message = Session::get('danger'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="container">
      <h2>Add New Post</h2><br/>
      <form method="post" action="{{url('post')}}">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="title">Post Title:</label>
            <input type="text" class="form-control" name="title" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="content">Post Content:</label>
              <input type="text" class="form-control" name="content" required>
            </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="category">Category:</label>
              <select class="form-control" name="category" required>
                  <option>Choose Category</option>
                  @foreach ($categories as $cat)
                      <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endforeach
              </select>
            </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <a href="javascript:history.back()" class="btn btn-primary">Back</a>
          </div>
        </div>
      </form>
    </div>
@endsection
