{{----------------------------------------------------------------------
|| Extract tab content
----------------------------------------------------------------------}}
<div role="tabpanel" class="tab-pane" id="creator-fermentables">
    <div class="row">
        <div class="col-sm-4 form-group">
            <label for="fermentable">Fermentable <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
            <select class="form-control" data-resource="maltextracts" name="fermentable" id="creator-select-fermentable"></select>
        </div>
        <div class="col-sm-4 form-group">
            <label for="type">Type <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
            <select class="form-control" name="type" id="creator-select-fermentable-type">
                <option value="maltextracts">Malt Extract</option>
                <option value="grains">Grain</option>
                <option value="sugars">Sugar</option>
                <option value="fermentables">Other fermentable</option>
            </select>
        </div>
        <div class="col-sm-2 form-group">
            <label for="extract-amount-0">Amount <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
            <div class="input-group">
                <input type="number" min="0" max="100" class="form-control" name="extract-amount-0" id="extract-amount-0" value="0">
                <span class="input-group-addon">%</span>
            </div>
        </div>
        <div class="col-sm-2 form-group">
            <label class="invisible" for="extract-delete">Add</label>
            <button class="btn btn-success form-control">Add</button>
        </div>
    </div><!-- row -->
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="col-md-4">Fermentable</th>
            <th class="col-md-3">Type</th>
            <th class="col-md-2">Amount (%)</th>
            <th class="col-md-2">Amount (kg)</th>
            <th class="col-md-1">Action</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div><!-- tab-pane -->
