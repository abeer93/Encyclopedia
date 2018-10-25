@extends('layouts.app')

@section('content')
<div class="container"> 
    @if ($message = Session::get('danger'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="float-right">   
        <a class="btn btn-primary" href="{{ url('/post/create') }}" id='addpostBtn'>
            Add Post
        </a> 
        <a class="btn btn-primary" href="{{ url('/category/create') }}" id='addCategoryBtn'>
            Add Categroy
        </a>
    </div>    
    <h1>Category List</h1>
    <ul>
        @foreach($categories as $category)
        <li>
            <h3><a href="{{ url('category/' . $category->id ) }}">{{ $category->name }}</a></h3>
            @if(count($category->childs))
                @include('categories/listChilds',['childs' => $category->childs])
            @endif
        </li>
        @endforeach
    </ul>
</div>
@endsection
