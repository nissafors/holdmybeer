<div class="modal fade" id="edit-vendors-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form data-resource="vendors" accept-charset="UTF-8" class="ingredient-edit-form" id="edit-vendors-form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add Vendor</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group can-have-error" data-error="name">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <div class="form-group can-have-error" data-error="countryId">
                        <label for="countryId">Country</label>
                        <select class="form-control" name="countryId" data-resource="countries"></select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" value="Save" class="btn btn-primary" />
                </div>
            </div>
        </form>
    </div>
</div>