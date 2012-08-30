<div id="packages_table_container" class="tab-pane tablediv row-fluid">
    <div class="span12">
        <h4>Packages</h4>
        <table cellpadding="0" cellspacing="0" border="0" class="table-condensed table table-striped table-bordered" id="packages_table">
            <thead>
                <tr>
                    <th>Package ID</th>
                    <th>Area</th>
                    <th>Packs</th>
                    <th>Included Donations</th>
                    <th>Transported?</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($packages as $package)
                <tr>
                    <td>#{{$package->id}}</td>
                    <td>{{$package->area}}</td>
                    <td>{{$package->packs}}</td>
                    <td>{{count($package->donations)}}</td>
                    <td>
                        {{ ($package->is_transported) ? 'Yes' : 'No' }}
                    </td>
                    <td>
                        @if ($package->is_transported)
                        <?php $ptransport = Transport::find($package->transport_id); ?>
                        @if (!empty($ptransport))
                        <span class="label label-success">Transported by {{ Transport::find($package->transport_id)->name }}</span>
                        @else
                        <span class="label label-success">Transported</span>
                        @endif
                        @else
                        <button type="button" class="btn btn-mini" onclick="handleTransport({{$package->id}})">Mark as transported</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>