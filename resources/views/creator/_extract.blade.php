{{----------------------------------------------------------------------
|| Extract tab content
----------------------------------------------------------------------}}
<div role="tabpanel" class="tab-pane" id="creator-extract">
    <div class="panel panel-default">
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label for="extract-name-0">Name <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                        <select class="form-control combobox" name="extract-name-0" id="extract-name-0">
                            <option label="new"></option>
                            <option label="muntons-extra-light">Muntons Extra light</option>
                            <option label="muntons-light">Muntons Light</option>
                            <option label="muntons-dark">Muntons Dark</option>
                            <option label="weyermann-bavarian-pilsner">Weyewrmann Bavarian Pilsner</option>
                            <option label="weyermann-bavarian-dunkel">Weyermann Bavarian Dunkel</option>
                            <option label="any">Etc</option>
                        </select>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="extract-type-0">Type <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                        <select class="form-control" name="extract-type-0" id="extract-type-0">
                            <option value="malt-extract">Malt Extract</option>
                            <option value="pre-hopped-extract">Pre-hopped Extract</option>
                            <option value="steeping-grain">Steeping Grain</option>
                            <option value="sugar">Sugar</option>
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
                        <label class="invisible" for="extract-delete">Delete</label>
                        <button class="btn btn-danger form-control" id="extract-delete">Delete</button>
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
