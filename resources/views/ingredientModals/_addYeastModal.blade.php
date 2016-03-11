<div class="modal fade" id="edit-yeasts-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form data-resource="yeasts" accept-charset="UTF-8" class="ingredient-edit-form" id="edit-yeasts-form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Add Yeast</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group can-have-error" data-error="name">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" />
                    </div>
                    <div class="form-group can-have-error" data-error="vendorsProductId">
                        <label for="vendorsProductId">Vendors Product ID</label>
                        <input type="text" class="form-control" name="vendorsProductId" />
                    </div>
                    <div class="form-group can-have-error" data-error="vendorId">
                        <label for="vendorId">Vendor</label>
                        <select class="form-control" name="vendorId" data-resource="vendors"></select>
                    </div>
                    <div class="form-group can-have-error" data-error="classId">
                        <label for="classId">Strain Category</label>
                        <select class="form-control" name="classId" data-resource="yeastclasses"></select>
                    </div>
                    <div class="form-group can-have-error" data-error="alcoholTolerance">
                        <label for="alcoholTolerance">Alcohol Tolerance (vol %)</label>
                        <input type="number" step="1" class="form-control" name="alcoholTolerance" />
                    </div>
                    <div class="form-group can-have-error" data-error="minAttenuation">
                        <label for="minAttenuation">Attenuation lower bound (%)</label>
                        <input type="number" step="1" class="form-control" name="minAttenuation" />
                    </div>
                    <div class="form-group can-have-error" data-error="maxAttenuation">
                        <label for="maxAttenuation">Attenuation upper bound (%)</label>
                        <input type="number" step="1" class="form-control" name="maxAttenuation" />
                    </div>
                    <div class="form-group can-have-error" data-error="minFermentationTemp">
                        <label for="minFermentationTemp">Fermentation temperature lower bound (&deg;C)</label>
                        <input type="number" step="1" class="form-control" name="minFermentationTemp" />
                    </div>
                    <div class="form-group can-have-error" data-error="maxFermentationTemp">
                        <label for="maxFermentationTemp">Fermentation temperature upper bound (&deg;C)</label>
                        <input type="number" step="1" class="form-control" name="maxFermentationTemp" />
                    </div>
                    <div class="form-group can-have-error" data-error="minRehydrationTemp">
                        <label for="minRehydrationTemp">Rehydration temperature lower bound (&deg;C)</label>
                        <input type="number" step="1" class="form-control" name="minRehydrationTemp" />
                    </div>
                    <div class="form-group can-have-error" data-error="maxRehydrationTemp">
                        <label for="maxRehydrationTemp">Rehydration temperature upper bound (&deg;C)</label>
                        <input type="number" step="1" class="form-control" name="maxRehydrationTemp" />
                    </div>
                    <fieldset>
                        <legend>Flocculation</legend>
                        <div class="can-have-error form-group">
                            <div>
                                <label class="radio-inline">
                                    <input type="radio" name="flocculation" value="Low" checked>
                                    Low
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="flocculation" value="Medium">
                                    Medium
                                </label>
                                <label class="radio-inline can-have-error" data-error="flocculation">
                                    <input type="radio" name="flocculation" value="High">
                                    High
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Form</legend>
                        <div class="can-have-error form-group">
                            <div>
                                <label class="radio-inline">
                                    <input type="radio" name="form" value="Liquid" checked>
                                    Liquid
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="form" value="Dry">
                                    Dry
                                </label>
                                <label class="radio-inline can-have-error" data-error="form">
                                    <input type="radio" name="form" value="Agar">
                                    Agar
                                </label>
                            </div>
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