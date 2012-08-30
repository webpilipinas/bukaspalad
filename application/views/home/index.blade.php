@layout('layouts/main')

@section('content')
<div class="hero-unit">
	<div class="row">
        <div class="span6">
            <h1>{{ Config::get('settings.group_name') }}</h1>
            <form class="well" method="POST" action="{{ action('user@authenticate') }}">
            	@include('plugins.status')
                <label for="username">Username</label>
                <input type="text" placeholder="Your Username" name="username" id="username" />
                <label for="pin">Group Pin</label>
                <input type="text" placeholder="4-Digit Group Pin" name="pin" id="pin" />
                @if (Config::get('settings.show_group_pin') === true)
                <h6>Group pin is: {{Config::get('settings.pin')}}</h6>
                @endif
                <div class="btn-group">
                	@for ($x = 1; $x < 10; $x++)
                	<button class="btn btn-small" type="button" onclick="$('#pin').val($('#pin').val() + '' +$(this).text())">{{$x}}</button>
                	@endfor
                	<button type="button" class="btn btn-small btn-danger" onclick="$('#pin').val('')">Clear</button>
                </div>
                <br />
                <button type="submit" class="btn btn-success">Login</button>
            </form>
        </div>
        
        <div class="span4">
            <img src="{{ asset('img/logo_hd.png') }}" alt="{{ Config::get('project.title') }}" />
        </div>
    </div>
</div>
@endsection

@section('js')
@parent
{{-- <script> --}}
$(document).ready(function() {
});
{{-- </script> --}}
@endsection

@section('css')
@parent
{{-- <style> --}}
.hero-unit h1 {
	margin-bottom: 30px;
}
{{-- </style> --}}
@endsection