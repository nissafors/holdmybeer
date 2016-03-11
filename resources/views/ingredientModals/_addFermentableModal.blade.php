<div class="modal fade" id="edit-fermentables-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form data-resource="fermentables" accept-charset="UTF-8" class="ingredient-edit-form" id="edit-fermentables-form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add Fermentable</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group can-have-error" data-error="name">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" />
                    </div>
                    <div class="form-group can-have-error" data-error="vendorId">
                        <label for="vendorId">Vendor</label>
                        <select class="form-control nullable" name="vendorId" data-resource="vendors"></select>
                    </div>
                    <div class="form-group can-have-error" data-error="maxHWE">
                        <label for="maxHWE">Max HWE</label>
                        <input type="number" class="form-control" name="maxHWE" />
                    </div>
                    <div class="form-group can-have-error" data-error="degEBC">
                        <label for="degEBC">&deg;EBC</label>
                        <input type="number" step="1" class="form-control" name="degEBC" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Save" />
                </div>
            </div>
        </form>
    </div>
</div>