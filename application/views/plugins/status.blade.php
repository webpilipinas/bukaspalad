@if (!is_null(Session::get('success')))
@include('plugins.status_success')
@endif

@if (!is_null(Session::get('error')))
@include('plugins.status_error')
@endif

@if (isset($errors) && count($errors->all()) > 0)
@include('plugins.validation_errors')
@endif

@if (!is_null(Session::get('info')))
@include('plugins.status_info')
@endif

@if (!is_null(Session::get('warning')))
@include('plugins.status_warning')
@endif