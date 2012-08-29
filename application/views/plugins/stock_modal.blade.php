<div id="stock_modal" class="modal hide" data-backdrop="true" data-keyboard="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal_label">Insert new Stock Types</h3>
    </div>
    <div class="modal-body">
        <form action="{{ action('data@stocks') }}" method="POST" class="form-inline" id="stock_modal_form">
        <div id="sku_container_modal">
            <div class="form-inline-div" id="first_sku_div">
                <input class="span3" type="text" placeholder="Stock type or SKU" id="sku" name="sku[]" />
                <input class="span3" type="text" placeholder="Unit of Measurement" id="unit" name="unit[]" />
                <button type="button" class="btn addstock_modal"><i class="icon-plus"></i></button>
            </div>
        </div>
    </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-primary" data-loading-text="Posting..." onclick="$('#stock_modal_form').submit()">Submit</button>
    </div>
</div>

@section('additional_handlebar_templates')
@parent
@include('handlebar-templates/sku-template')
@endsection

@section('js')
@parent
$(document).ready(function() {
    var sku_template = Handlebars.compile($('#sku-handlebars-template').html());
    $('.addstock_modal').on('click', function() {
        $('#sku_container_modal').append(sku_template());
    });
});
@endsection

@section('css')
@parent
.sku_div {
    margin-bottom: 5px;
}
@endsection