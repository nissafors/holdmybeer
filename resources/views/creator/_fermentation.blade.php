{{----------------------------------------------------------------------
|| Fermentation tab content
----------------------------------------------------------------------}}
<div role="tabpanel" class="tab-pane" id="creator-fermentation">
    <div class="panel panel-default">
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-3 form-group">
                        <label for="fermentation-target-0">Target <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="fermentation-target-0" id="fermentation-target-0">
                            <span class="input-group-addon">&deg;C</span>
                        </div>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="fermentation-cue-type-0">Cue type <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                        <select class="form-control" name="fermentation-cue-type-0" id="fermentation-cue-type-0">
                            <option value="density" selected>Density</option>
                            <option value="temperature">Temperature</option>
                            <option value="date">Time</option>
                        </select>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label for="fermentation-cue-value-0">Cue value <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="fermentation-cue-value-0" id="fermentation-cue-value-0">
                            <span class="input-group-addon">SG</span>
                        </div>
                    </div>
                    <div class="col-sm-2 form-group">
                        <label class="invisible" for="fermentable-delete">Delete</label>
                        <button class="btn btn-danger form-control" id="fermentable-delete">Delete</button>
                    </div>
                </div><!-- row -->
            </li>
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-2 form-group">
                        <button class="btn btn-success form-control">Add</button>
                    </div>
                </div><!-- row -->
            </li>
        </ul>
    </div><!-- panel -->
</div><!-- tab-pane -->
