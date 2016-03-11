<div class="modal fade" id="edit-finings-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form data-resource="finings" accept-charset="UTF-8" class="ingredient-edit-form" id="edit-finings-form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add Fining</h4>
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Save" />
                </div>
            </div>
        </form>
    </div>
</div>