<div class="alert alert-info">
	<a class="close" data-dismiss="alert" href="#">×</a>
	<h4 class="alert-heading">Heads up!</h4>
	@if (is_array(Session::get('info')))
		<ul>
		@foreach (Session::get('info') as $info)
			<li>{{ $info }}</li>
		@endforeach
		</ul>
	@else
		{{ Session::get('info') }}
	@endif
</div>
