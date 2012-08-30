<div id="marktransport_modal" class="modal hide" data-backdrop="true" data-keyboard="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal_label">Mark Package as Transported</h3>
    </div>
    <div class="modal-body">
        <form id="marktransport_modal_form" method="POST" action="{{ action('data@marktransport') }}" class="form-inline">
            <div class="form-inline-div">
                <h4>Transporting: Package #<strong id="package_id_mock"></strong></h4>
                <input type="hidden" name="transport_package_id" id="transport_package_id" />
            </div>

            @if ((Transport::where('is_available', '=', '1')->count()) == 0)
            <div class="alert alert-info">Oops! No transports are available or you haven't registered one yet. <a href="#transport_modal" data-toggle="modal">Click here to register a new one.</a></div>
            @else
            <?php $transports_are_available = true ?>
            <div class="form-inline-div">
                <label for="transport_id">Transported By:</label>
                <select name="transport_id" id="transport_id">
                    @foreach ($transports as $trans)
                    @if ( $trans->is_available == 1)
                    <option value="{{$trans->id}}">{{$trans->name}} (Transporation ID: {{$trans->id}})</option>
                    @endif
                    @endforeach
                </select>
                <label class="checkbox inline">
                    <input type="checkbox" name="mark_as_unavailable" checked="checked" />Mark this transport as unavailable
                </label>
            </div>
            @endif
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        @if (isset($transports_are_available) and ($transports_are_available == true))
        <button class="btn btn-primary" data-loading-text="Posting..." onclick="$('#marktransport_modal_form').submit()">Mark as Transported</button>
        @endif
    </div>
</div>

@section('js')
@parent
function handleTransport(package_id)
{
    $('#transport_package_id').val(package_id);
    $('#package_id_mock').html(package_id);
    $('#marktransport_modal').modal('show');
}
@endsection