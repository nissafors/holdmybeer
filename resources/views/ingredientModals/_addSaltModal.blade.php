<div class="modal fade" id="edit-salts-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form data-resource="salts" accept-charset="UTF-8" class="ingredient-edit-form" id="edit-salts-form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add Salt</h4>
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
                    <div class="form-group can-have-error" data-error="cationId">
                        <label for="cationId">Cation</label>
                        <select class="form-control" name="cationId" data-resource="ions"></select>
                    </div>
                    <div class="form-group can-have-error" data-error="anionId">
                        <label for="anionId">Anion</label>
                        <select class="form-control" name="anionId" data-resource="ions"></select>
                    </div>
                    <div class="form-group can-have-error" data-error="concentration">
                        <label for="concentration">Concentration (%)</label>
                        <input type="number" class="form-control" name="concentration" />
                    </div>
                    <div class="form-group can-have-error" data-error="cationPpmAtOneGPerL">
                        <label for="cationPpmAtOneGPerL">Cation: PPM at 1g/l</label>
                        <input type="number" class="form-control" name="cationPpmAtOneGPerL" />
                    </div>
                    <div class="form-group can-have-error" data-error="anionPpmAtOneGPerL">
                        <label for="anionPpmAtOneGPerL">Anion: PPM at 1g/l</label>
                        <input type="number" class="form-control" name="anionPpmAtOneGPerL" />
                    </div>
                    <fieldset>
                        <legend class="sr-only">Form</legend>
                        <div class="radio">
                            <label>
                                <input type="radio" name="form" value="Liquid" checked>
                                Liquid
                            </label>
                        </div>
                        <div class="radio can-have-error" data-error="form">
                            <label>
                                <input type="radio" name="form" value="Dry">
                                Dry
                            </label>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Save" />
                </div>
            </div>
        </form>
    </div>
</div>