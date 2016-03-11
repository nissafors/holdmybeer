{{----------------------------------------------------------------------
|| Info tab content
----------------------------------------------------------------------}}
<div role="tabpanel" class="tab-pane active" id="creator-recipe-info">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <label for="recipe-name">Recipe name <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                    <input type="text" class="form-control" name="recipe-name" id="recipe-name">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="recipe-style">Beer style <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                    <select class="form-control combobox" name="recipe-style" id="recipe-style">
                        <option></option>
                        <option value="pilsner">Pilsner</option>
                        <option value="english-pale-ale">English Pale Ale</option>
                        <option value="american-pale-ale">American Pale Ale</option>
                        <option value="porter">Porter</option>
                        <option value="stout">Stout</option>
                        <option value="any">Etc</option>
                    </select>
                </div>
            </div><!-- row -->
            <div class="form-group">
                <label for="recipe-credits">Credits <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                <input type="text" class="form-control" name="recipe-credits" id="recipe-credits">
            </div>
        </div><!-- panel-body -->
    </div><!-- panel -->
</div><!-- tab-pane -->
