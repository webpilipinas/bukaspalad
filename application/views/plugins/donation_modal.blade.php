<div id="donation_modal" class="modal hide" data-backdrop="true" data-keyboard="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal_label">Add a new Donation</h3>
    </div>
    <div class="modal-body">
        <form id="donation_modal_form" method="POST" action="{{ action('data@donation') }}" class="form-inline">
            <div class="form-inline-div">
                <label for="donator">Donator</label>
                <input type="text" name="donator" id="donator" placeholder="Name of Donator" />
            </div>
            
            <div id="donationcontents_container">
                <div class="form-inline-div" id="first_donation_content">
                    <select name="stock_id[]" placeholder="Select stock type" class="stock_dropdown" onchange="$(this).next().next().html($(this).children(':selected').attr('data-stock-unit'));">
                        @foreach ($stocks as $stock)
                        <option data-stock-unit="{{$stock->unit}}" value="{{$stock->id}}">{{$stock->sku}}</option>
                        @endforeach
                    </select>

                    <input type="number" placeholder="Units" placeholder="Input of units" name="units[]" />

                    <span></span>
                </div>
            </div>

            <button type="button" id="donationcontent_add" class="btn"><i class="icon-plus"></i></button>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-primary" data-loading-text="Adding..." onclick="$('#donation_modal_form').submit()">Add</button>
    </div>
</div>

@section('js')
@parent
$(document).ready(function() {
    $('.stock_dropdown').change();

    $('#donationcontent_add').on('click', function() {
        var dhtml = '<div class="form-inline-div">' +
        $('#first_donation_content').html() + 
        '</div>';

        $('#donationcontents_container').append(dhtml);
    });
});
@endsection