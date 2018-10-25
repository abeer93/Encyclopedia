<ul>
@foreach($childs as $child)
	<li>
		<h5><a href="{{ url('category/' . $child->id ) }}">{{ $child->name }}</a></h5>
		@if(count($child->childs))
            @include('categories/listChilds',['childs' => $child->childs])
        @endif
	</li>
@endforeach
</ul>