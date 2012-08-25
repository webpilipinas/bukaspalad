<div class="alert alert-error">
	<a class="close" data-dismiss="alert" href="#">×</a>
	<h4 class="alert-heading">Oh Snap!</h4>
	@if (count($errors->all() > 1))
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	@else
		@foreach ($errors->all() as $error)
			{{ $error }}
		@endforeach
	@endif
</div>