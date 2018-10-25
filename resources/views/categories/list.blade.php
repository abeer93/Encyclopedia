<div class="txtAlign-right">   
     <a class="btn btn-primary" href="{{ url('/category/create') }}" id='addCategoryBtn'>
     Add Categroy
    </a>
</div>
<table class="table table-striped table-borderless text-center">
<thead>
    <tr>
        <th>Category ID</th>
        <th>Category Name</th>
        <th>Category Description</th>
        <th>Actions</th>     
    </tr>
</thead>
<tbody>
    @foreach ($categories as $category)
    <tr>
        <td><a href="">{{ $category->id }}</a></td>
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
        <td>
            <form method="post" action="/category/{{ $category->id }}">
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
