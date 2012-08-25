<div class="alert alert-block">
	<a class="close" data-dismiss="alert" href="#">×</a>
	<h4 class="alert-heading">Whoa!</h4>
	@if (is_array(Session::get('warning')))
		<ul>
		@foreach (Session::get('warning') as $warning)
			<li>{{ $warning }}</li>
		@endforeach
		</ul>
	@else
		{{ Session::get('warning') }}
	@endif
</div>
