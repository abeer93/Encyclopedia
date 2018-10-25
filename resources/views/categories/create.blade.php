@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Add New Category</h2><br/>
      <form method="post" action="{{url('category')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Name">Category Name:</label>
            <input type="text" class="form-control" name="name" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Descrition">Category Description:</label>
              <input type="text" class="form-control" name="description" required>
            </div>
        </div>
        
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="perent">Parent Category:</label>
              <select class="form-control" name="parent">
                  <option>Choose Parent Category</option>
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
