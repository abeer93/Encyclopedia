@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Title : </h1> {{ $post->title }}
    <h1>Author : </h1>{{ $author[0]->name}}</h3>
    <h1>Description : </h1><p> :{{ $post->description }}</p>
    <br />

</div>
@endsection
