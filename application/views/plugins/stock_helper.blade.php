<div class="hero-unit">
    <h1>Hello <span class="blue">{{ Auth::user()->username }}</span>,</h1>
    <p>It looks like you haven't addeds any stock types yet! Stocks are types of goods donated by people to your location. For example, <strong>Rice</strong> is a stock type and is measured by <strong>Kilograms</strong>.</p>

    <form action="/data/stocks" method="POST" class="form-inline">
        <div id="sku_container">
            <div class="sku_div">
                <input class="span3" type="text" placeholder="Stock type or SKU" id="sku" name="sku[]" />
                <input class="span3" type="text" placeholder="Unit of Measurement" id="unit" name="unit[]" />
                <button type="button" class="btn addstock"><i class="icon-plus"></i></button>
                <input type="submit" class="btn btn-primary" value="Save" />
            </div>
        </div>
    </form>
    <h4>For your convenience, we've listed a few default stock types. If you prefer, you can load these:</h4>
    <a href="{{ action('data@load_default_stocks') }}" class="btn">Load default stocks</a>
</div>

@section('additional_handlebar_templates')
@parent
@include('handlebar-templates/sku-template')
@endsection

@section('js')
@parent
$(document).ready(function() {
    var sku_template = Handlebars.compile($('#sku-handlebars-template').html());
    $('.addstock').on('click', function() {
        $('#sku_container').append(sku_template());
    });
});
@endsection

@section('css')
@parent
.sku_div {
    margin-bottom: 5px;
}
@endsection