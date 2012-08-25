@layout('layouts/main_fluid')

@section('content')
<div class="row-fluid">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li class="nav-header">Menu</li>
                <li><a href="#donation_modal" data-toggle="modal">Add new Donation</a></li>
                <li><a href="#package_modal" data-toggle="modal">Create new Package</a></li>
                <li><a href="#transport_modal" data-toggle="modal">Register new Transport</a></li>
                <li><a href="#stock_modal" data-toggle="modal">Insert new Stock Type</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </div><!--/.well -->
        <div class="well sidebar-nav" id="action_well">
            <ul class="nav nav-list" id="action_container">
                <li class="nav-header">Updates (Logged in as {{Auth::user()->username}})</li>
                @forelse ($actions as $upd)
                <li>{{$upd->message}}</li>
                @empty
                <li><div class="alert alert-info">No updates yet</div></li>
                @endforelse
            </ul>
        </div>
    </div><!--/span-->
    <div class="span9">
        @if (Stock::count() > 0)
        <ul class="nav nav-tabs">
            <li class="active"><a href="#donations_table_container" data-toggle="tab">Donations</a></li>
            <li><a href="#packages_table_container" data-toggle="tab">Packages</a></li>
            <li><a href="#transports_table_container" data-toggle="tab">Transports</a></li>
            <li><a href="#stocks_table_container" data-toggle="tab">Stock Types</a></li>
        </ul>
        <div class="tab-content">
        @include('plugins/donations_table')
        @include('plugins/packages_table')
        @include('plugins/transports_table')
        @include('plugins/stocks_table')
        </div>
        @else
        @include('plugins/stock_helper')
        @endif
    </div>
</div>
@endsection

@section('additional_modals')
@include('plugins/donation_modal')
@include('plugins/package_modal')
@include('plugins/transport_modal')
@include('plugins/stock_modal')
@include('plugins/repack_modal')
@include('plugins/marktransport_modal')
@endsection

@section('additional_handlebar_templates')
@parent
@endsection

@section('js')
@parent
{{-- <script> --}}
/* Table initialisation */
$(document).ready(function() {
    $('#donations_table').dataTable( {
        "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ records per page"
        }
    });
    $('#packages_table').dataTable( {
        "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ records per page"
        }
    });
});
{{-- </script> --}}
@endsection

@section('css')
@parent
{{-- <style> --}}
.dc_sku {
}

.dc_unit {
    width: 80px;
}
#action_container {
    padding: 0px;
    font-size: 12px;
}

#action_well {
}
#action_container > li.nav-header {
    padding-left: 30px;
}

.tablediv {
    margin-bottom: 40px;
}

#packs {
    width: 280px;
}

#donations_table_wrapper .row, #packages_table_wrapper .row {
    margin-left: 0px;
}
{{-- </style> --}}
@endsection