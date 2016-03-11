<div class="modal fade" id="edit-hops-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form data-resource="hops" accept-charset="UTF-8" class="ingredient-edit-form" id="edit-hops-form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add Hop</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group can-have-error" data-error="name">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" />
                    </div>
                    <div class="form-group can-have-error" data-error="countryId">
                        <label for="countryId">Country</label>
                        <select class="form-control" name="countryId" data-resource="countries"></select>
                    </div>
                    <div class="form-group can-have-error" data-error="name">
                        <label for="name">Typical Alpha Acid %</label>
                        <input type="number" name="typicalAA" class="form-control" />
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