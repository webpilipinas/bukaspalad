<div id="repack_modal" class="modal hide" data-backdrop="true" data-keyboard="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal_label">Mark Donation as repacked</h3>
    </div>
    <div class="modal-body">
        <form id="repack_modal_form" method="POST" action="{{ action('data@repack') }}" class="form-inline">
            <div class="form-inline-div">
                <h4>Repacking: Donation #<strong id="donation_id_mock"></strong></h4>
                <input type="hidden" name="donation_id" id="donation_id" />
            </div>

            @if ((Package::where('is_transported', '=', '0')->count()) == 0)
            <div class="alert alert-info">Oops! No packages are available. <a href="#package_modal" data-toggle="modal">Click here to create a new one.</a></div>
            @else
            <?php $packages_are_available = true ?>
            <div class="form-inline-div">
                <label for="package_id">Packed to:</label>
                <select name="package_id" id="package_id">
                    @foreach ($packages as $package)
                    @if ($package->is_transported != 1)
                    <option value="{{$package->id}}">{{$package->area}} (Package #{{$package->id}})</option>
                    @endif
                    @endforeach
                </select>
            </div>
            @endif
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        @if (isset($packages_are_available) and ($packages_are_available == true))
        <button class="btn btn-primary" data-loading-text="Posting..." onclick="$('#repack_modal_form').submit()">Mark as Repacked</button>
        @endif
    </div>
</div>

@section('js')
@parent
function handleRepack(donation_id)
{
    $('#donation_id').val(donation_id);
    $('#donation_id_mock').html(donation_id);
    $('#repack_modal').modal('show');
}
@endsection