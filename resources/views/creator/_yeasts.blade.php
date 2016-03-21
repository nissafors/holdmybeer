{{----------------------------------------------------------------------
|| Yeast tab content
----------------------------------------------------------------------}}
<div role="tabpanel" class="tab-pane" id="creator-yeasts">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-4 form-group">
                    <label for="yeast-form">Form <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                    <select class="form-control" name="yeast-form" id="creator-select-yeast-form">
                        <option value="liquid">Liquid</option>
                        <option value="dry">Dry</option>
                        <option value="agar">Agar</option>
                    </select>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="yeast-strain">Yeast strain <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                    <select class="form-control" data-resource="yeasts/form/liquid" name="yeast-strain" id="creator-select-yeast">
                    </select>
                </div>
                <div class="col-sm-4 form-group">
                    <label for="yeast-pitch-temp">Pitch temperature <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="yeast-pitch-temp" id="yeast-pitch-temp">
                        <span class="input-group-addon">&deg;C</span>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- panel-body -->
    </div><!-- panel -->
</div><!-- tab-pane -->
