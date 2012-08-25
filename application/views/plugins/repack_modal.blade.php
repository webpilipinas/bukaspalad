<div id="repack_modal" class="modal hide" data-backdrop="true" data-keyboard="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal_label">Mark Donation as repacked</h3>
    </div>
    <div class="modal-body">
        <form id="repack_modal_form" method="POST" action="/data/repack" class="form-inline">
            <div class="form-inline-div">
                <h4>Repacking: Donation #<strong id="donation_id_mock"></strong></h4>
                <input type="hidden" name="donation_id" id="donation_id" />
            </div>

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
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-primary" data-loading-text="Posting..." onclick="$('#repack_modal_form').submit()">Mark as Repacked</button>
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