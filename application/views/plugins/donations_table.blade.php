<div id="donations_table_container" class="tab-pane active tablediv row-fluid">
    <div class="span12">
        <h4>Donations</h4>
        <table cellpadding="0" cellspacing="0" border="0" class="table-condensed table table-striped table-bordered" id="donations_table">
            <thead>
                <tr>
                    <th>Donation ID</th>
                    <th>Donator</th>
                    <th>Donations</th>
                    <th>Repacked?</th>
                    <th>Added</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donations as $donation)
                <tr>
                    <td>#{{$donation->id}}</td>
                    <td>{{$donation->donator}}</td>
                    <td>
                        <table class="table table-condensed ">
                            @foreach ($donation->donationcontents as $dc)
                            <tr>
                                <td class="dc_sku">{{$dc->getSku()}}</td>
                                <td class="dc_unit">{{$dc->amount}} {{$dc->getUnit()}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </td>
                    <td>
                        @if( $donation->is_repacked)
                        Yes
                        @if( !empty($donation->package))
                        , included in <strong>Package #{{$donation->package_id}} ({{$donation->package->area}})</strong>
                        @endif
                        @else
                        No
                        @endif
                    </td>
                    <td>
                        {{ date('d M Y h:iA', strtotime($donation->created_at)) }}
                    </td>
                    <td>
                        @if ($donation->is_repacked)
                        <span class="label label-success">Repacked</span>
                        @else
                        <button type="button" class="btn btn-mini" onclick="handleRepack({{$donation->id}})">Mark as repacked</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>