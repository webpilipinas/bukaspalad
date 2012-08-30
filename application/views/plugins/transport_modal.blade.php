<div id="transport_modal" class="modal hide" data-backdrop="true" data-keyboard="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal_label">Register a new Transport</h3>
    </div>
    <div class="modal-body">
        <form id="transport_modal_form" method="POST" action="{{ action('data@transport') }}" class="form-inline">
            <div class="form-inline-div">
                <label for="transport_name">Transport Name</label>
                <input type="text" name="transport_name" id="transport_name" placeholder="Name of Transport" />
            </div>
            <div class="form-inline-div">
                <label for="car_type">Car Type</label>
                <input type="text" name="car_type" id="car_type" placeholder="Car Type" />
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-primary" data-loading-text="Registering..." onclick="$('#transport_modal_form').submit()">Register</button>
    </div>
</div>