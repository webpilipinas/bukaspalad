<div id="transports_table_container" class="tab-pane tablediv row-fluid">
    <div class="span12">
        <h4>Transports</h4>
        <table cellpadding="0" cellspacing="0" border="0" class="table-condensed table table-striped table-bordered" id="transports_table">
            <thead>
                <tr>
                    <th>Transport ID</th>
                    <th>Name</th>
                    <th>Car Type</th>
                    <th>Available?</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transports as $trans)
                <tr>
                    <td>#{{$trans->id}}</td>
                    <td>{{$trans->name}}</td>
                    <td>{{$trans->car_type}}</td>
                    <td>
                        @if ($trans->is_available)
                        Yes
                        @else
                        No
                        @if (!is_null($trans->package_id))
                        , transporting to {{ Package::find($trans->package_id)->area }} <strong>(Package #{{ $trans->package_id}})</strong>
                        @endif
                        @endif
                    </td>
                    <td>
                        @if ($trans->is_available)
                        <a href="{{ action('data@transport_availability', array($trans->id, 0)) }}" class="btn btn-danger btn-mini">Mark as unavailable</a>
                        @else
                        <a href="{{ action('data@transport_availability', array($trans->id, 1)) }}" class="btn btn-success btn-mini">Mark as available</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>