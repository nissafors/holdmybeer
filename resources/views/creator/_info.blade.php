{{----------------------------------------------------------------------
|| Info tab content
----------------------------------------------------------------------}}
<div role="tabpanel" class="tab-pane active" id="creator-recipe-info">
    <div class="row">
        <div class="col-md-2">
            <ul class="list-unstyled hmb-sidebar">
                <li><a href="">New Recipe</a></li>
                <li><a href="">Load Recipe</a></li>
                <li><a href="">Edit Style List</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <label for="recipe-name">Recipe name <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                    <input type="text" class="form-control" name="recipe-name" id="recipe-name">
                </div>
                <div class="col-sm-6 form-group">
                    <label for="beer-style">Beer style <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                    <input class="form-control" name="beer-style" list="creator-beer-style" />
                    <datalist id="creator-beer-style">
                        <option>Pilsner</option>
                        <option>English Pale Ale</option>
                        <option>American Pale Ale</option>
                        <option>Porter</option>
                        <option>Stout</option>
                    </datalist>
                    <!--<select class="form-control" name="recipe-style">
                        <option></option>
                        <option value="pilsner">Pilsner</option>
                        <option value="english-pale-ale">English Pale Ale</option>
                        <option value="american-pale-ale">American Pale Ale</option>
                        <option value="porter">Porter</option>
                        <option value="stout">Stout</option>
                        <option value="any">Etc</option>
                    </select>-->
                </div>
            </div><!-- row -->
            <div class="form-group">
                <label for="recipe-credits">Credits <a href="#"><span class="glyphicon glyphicon-question-sign"></span></a></label>
                <input type="text" class="form-control" name="recipe-credits" id="recipe-credits">
            </div>
        </div>
    </div>
</div><!-- tab-pane -->
