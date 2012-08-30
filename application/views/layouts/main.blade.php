<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>{{ Config::get('project.title') }}</title>
        {{ Asset::styles() }}
        {{ Asset::scripts() }}

        <link rel="shortcut icon" href="/favicon.ico">

        <style>
        @section('css')
        @yield_section
        </style>
        
        <script>
        @section('js')
        @yield_section
        </script>

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
 
    <body>
        @if (isset($hide_main_nav) && $hide_main_nav == true)
        @else
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="#"><img src="{{ asset('img/logo.png') }}" alt="Bukas Palad" width="30" />{{ Config::get('project.title') }}</a>
                    @section('navigation')
                    @yield_section
                    @section('post_navigation')
                    @yield('post_navigation')
                </div>
            </div>
        </div>
        @endif

        <div class="container" id="main_container">
            @if (isset($hide_status_plugin) && $hide_status_plugin == true)
            @else
            @include('plugins.status')
            @endif
            @yield('content')
            <footer>
                <p>&copy; <span class="brand">{{ Config::get('project.title') }}</span> {{ date('Y'); }}</p>
            </footer>
        </div> <!-- /container -->

        <div class="modal hide" id="generic_loading_modal">
            <div class="modal-header">
                <h3 id="generic_loading_modal_title"></h3>
            </div>
            <div class="modal-body">
                <p id="generic_loading_modal_body"></p>
            </div>
        </div>
        @section('additional_modals')
        @yield_section

        @include('handlebar-templates.alert-box')
        @section('additional_handlebar_templates')
        @yield_section
    </body>
</html>