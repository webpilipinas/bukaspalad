<div id="marktransport_modal" class="modal hide" data-backdrop="true" data-keyboard="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal_label">Mark Package as Transported</h3>
    </div>
    <div class="modal-body">
        <form id="marktransport_modal_form" method="POST" action="/data/marktransport" class="form-inline">
            <div class="form-inline-div">
                <h4>Transporting: Package #<strong id="package_id_mock"></strong></h4>
                <input type="hidden" name="transport_package_id" id="transport_package_id" />
            </div>

            <div class="form-inline-div">
                <label for="transport_id">Transported By:</label>
                <select name="transport_id" id="transport_id">
                    @foreach ($transports as $trans)
                    <option value="{{$trans->id}}">{{$trans->name}} (Transporation ID: {{$trans->id}})</option>
                    @endforeach
                </select>
                <label class="checkbox inline">
                    <input type="checkbox" name="mark_as_unavailable" checked="checked" />Mark this transport as unavailable
                </label>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-primary" data-loading-text="Posting..." onclick="$('#marktransport_modal_form').submit()">Mark as Transported</button>
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