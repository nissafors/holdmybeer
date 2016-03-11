{{----------------------------------------------------------------------
|| Settings tab content
----------------------------------------------------------------------}}
<div role="tabpanel" class="tab-pane" id="creator-settings">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">	
                <div class="col-sm-4 form-group">
                    <label for="level-brewer">Show tools for <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                    <select class="form-control" name="level-brewer" id="level-brewer">
                        <option value="extract-brewer">Extract Brewing</option>
                        <option value="mini-mash-brewer">Mini-mash Brewing</option>
                        <option value="all-grain-brewer">All Grain Brewing</option>
                    </select>
                </div>
                <div class="col-sm-4 form-group">
                    <label class="invisible" for="level">Brewer level</label>
                    <select class="form-control" name="level" id="level">
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <label for="load">Actions <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" id="load">Load</button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success" id="save">Save</button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger" id="exit">Exit</button>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- panel-body -->
    </div><!-- panel -->
</div><!-- tab-pane -->
