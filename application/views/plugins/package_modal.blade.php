<div id="package_modal" class="modal hide" data-backdrop="true" data-keyboard="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal_label">Create a new Package</h3>
    </div>
    <div class="modal-body">
        <form id="package_modal_form" method="POST" action="{{ action('data@package') }}" class="form-inline">
            <div class="form-inline-div">
                <input type="text" name="area" id="area" placeholder="Package's destination area" />
                <input type="number" name="packs" id="packs" placeholder="Number of donation packs to send" />
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-primary" data-loading-text="Creating..." onclick="$('#package_modal_form').submit()">Create</button>
    </div>
</div>