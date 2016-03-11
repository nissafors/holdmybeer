<div class="modal fade" id="edit-ions-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form data-resource="ions" accept-charset="UTF-8" class="ingredient-edit-form" id="edit-ions-form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add Ion</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group can-have-error" data-error="name">
                        <label for="symbol">Name</label>
                        <input type="text" class="form-control" name="name" />
                    </div>
                    <div class="form-group can-have-error" data-error="symbol">
                        <label for="symbol">Chemical Symbol</label>
                        <input type="text" class="form-control" name="symbol" />
                    </div>
                    <div class="form-group can-have-error" data-error="charge">
                        <label for="charge">Charge</label>
                        <input type="number" class="form-control" name="charge" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" name="Save" class="btn btn-primary" value="Save" />
                </div>
            </div>
        </form>
    </div>
</div>