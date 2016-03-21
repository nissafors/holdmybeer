{{----------------------------------------------------------------------
|| Hops tab content
----------------------------------------------------------------------}}
<div role="tabpanel" class="tab-pane" id="creator-hops">
    <div class="row">
        <div class="col-sm-3 form-group">
            <label for="hops">Name <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
            <select class="form-control" name="hops" data-resource="hops" id="creator-select-hops"></select>
        </div>
        <div class="col-sm-3 form-group">
            <label for="time">Time <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
            <div class="input-group">
                <input type="number" min="0" class="form-control" name="time" value="0">
                <span class="input-group-addon">min</span>
            </div>
        </div>
        <div class="col-sm-2 form-group">
            <label for="alpha-acid">&alpha;-acid <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
            <div class="input-group">
                <input type="number" min="0" max="100" class="form-control" name="alpha-acid" id="creator-alpha-acid" value="0">
                <span class="input-group-addon">%</span>
            </div>
        </div>
        <div class="col-sm-2 form-group">
            <label for="amount">Amount <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
            <div class="input-group">
                <input type="number" min="0" class="form-control" name="amount" value="0">
                <span class="input-group-addon">g</span>
            </div>
        </div>
        <div class="col-sm-2 form-group">
            <label class="invisible" for="hop-delete">Add</label>
            <button class="btn btn-success form-control">Add</button>
        </div>
    </div><!-- row -->
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="col-md-3">Hop</th>
            <th class="col-md-2">Time (min)</th>
            <th class="col-md-2">Alpha Acid (%)</th>
            <th class="col-md-2">Amount (g)</th>
            <th class="col-md-2">IBU</th>
            <th class="col-md-1">Action</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
</div><!-- tab-pane -->
