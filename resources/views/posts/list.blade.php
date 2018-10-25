<div class="txtAlign-right">   
     <a class="btn btn-primary" href="{{ url('/post/create') }}" id='addPostBtn'>
     Add Post
    </a>
</div>
<table class="table table-striped table-borderless text-center">
<thead>
    <tr>
        <th>Post ID</th>
        <th>Post Title</th>
        <th>Post Description</th>
        <th>Actions</th>     
    </tr>
</thead>
<tbody>
    @foreach ($posts as $post)
    <tr>
        <td><a href="">{{ $post->id }}</a></td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->description }}</td>
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
</tbody>
</table>