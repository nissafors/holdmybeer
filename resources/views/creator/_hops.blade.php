{{----------------------------------------------------------------------
|| Hops tab content
----------------------------------------------------------------------}}
<div role="tabpanel" class="tab-pane" id="creator-hops">
    <div class="panel panel-default">
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-3 form-group">
                        <label for="hop-name-0">Name <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                        <select class="form-control combobox" name="hop-name-0" id="hop-name-0">
                            <option label="new"></option>
                            <option label="cascade">Cascade</option>
                            <option label="centennial">Centennial</option>
                            <option label="hallertau-tradition">Hallertau Tradition</option>
                            <option label="east-kent-goldings">East Kent Goldings</option>
                            <option label="any">Etc</option>
                        </select>
                    </div>
                    <div class="col-sm-3 form-group">
                        <label for="hop-time-0">Time <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                        <div class="input-group">
                            <input type="number" min="0" class="form-control" name="hop-time-0" id="hop-time-0" value="0">
                            <span class="input-group-addon">min</span>
                        </div>
                    </div>
                    <div class="col-sm-2 form-group">
                        <label for="hop-alpha-0">&alpha;-acid <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                        <div class="input-group">
                            <input type="number" min="0" max="100" class="form-control" name="hop-alpha-0" id="hop-alpha-0" value="0">
                            <span class="input-group-addon">%</span>
                        </div>
                    </div>
                    <div class="col-sm-2 form-group">
                        <label for="hop-amount-0">Amount <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                        <div class="input-group">
                            <input type="number" min="0" class="form-control" name="hop-amount-0" id="hop-amount-0" value="0">
                            <span class="input-group-addon">g</span>
                        </div>
                    </div>
                    <div class="col-sm-2 form-group">
                        <label class="invisible" for="hop-delete">Delete</label>
                        <button class="btn btn-danger form-control" id="hop-delete">Delete</button>
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
