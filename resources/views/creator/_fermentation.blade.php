{{----------------------------------------------------------------------
|| Fermentation tab content
----------------------------------------------------------------------}}
<div role="tabpanel" class="tab-pane" id="creator-fermentation">
    <div class="row">
        <div class="col-sm-2 form-group">
            <label for="cue-type">Cue Type <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
            <select class="form-control" name="cue-type" id="creator-select-cue-type">
                <option value="h">Time</option>
                <option value="&deg;C">Temperature</option>
                <option value="SG">Density</option>
            </select>
        </div>
        <div class="col-sm-2 form-group">
            <label for="cue-target">Target <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
            <div class="input-group">
                <input type="number" class="form-control" name="cue-target">
                <span class="input-group-addon" id="creator-cue-target-unit">h</span>
            </div>
        </div>
        <div class="col-sm-6 form-group">
            <label for="action">Action <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
            <input type="text" class="form-control" name="action">
        </div>
        <div class="col-sm-2 form-group">
            <label class="invisible" for="add">Add</label>
            <button class="btn btn-success form-control" name="add">Add</button>
        </div>
    </div><!-- row -->
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="col-md-2">Type</th>
            <th class="col-md-2">Target</th>
            <th class="col-md-7">Action</th>
            <th class="col-md-1"></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Density</td>
            <td>1.010</td>
            <td>Add 50g cascade</td>
            <td><button class="btn btn-xs btn-danger">Delete</button></td>
        </tr>
        </tbody>
    </table>
</div><!-- tab-pane -->
