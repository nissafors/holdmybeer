{{----------------------------------------------------------------------
|| Fermentables tab content
----------------------------------------------------------------------}}
<div role="tabpanel" class="tab-pane" id="ingman-fermentables">
    <div class="row">
        <div class="col-md-2">
            <ul class="list-unstyled hmb-sidebar">
                <li><a href="" class="ingman-add-ingredient" data-toggle="modal" data-target="#edit-grains-modal">Add Grain</a></li>
                <li><a href="" class="ingman-add-ingredient" data-toggle="modal" data-target="#edit-maltextracts-modal">Add Malt Extract</a></li>
                <li><a href="" class="ingman-add-ingredient" data-toggle="modal" data-target="#edit-sugars-modal">Add Sugar</a></li>
                <li><a href="" class="ingman-add-ingredient" data-toggle="modal" data-target="#edit-fermentables-modal">Add Fermentable</a></li>
                <li><a href="" class="ingman-add-ingredient" data-toggle="modal" data-target="#edit-graintypes-modal">Add Grain Type</a></li>
                <li><a href="" class="ingman-add-ingredient" data-toggle="modal" data-target="#edit-grainclasses-modal">Add Grain Class</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Grains</h3>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="col-md-3">Name</th>
                        <th class="col-md-2">Vendor</th>
                        <th class="col-md-1">HWE</th>
                        <th class="col-md-1">&deg;EBC</th>
                        <th class="col-md-2">Type</th>
                        <th class="col-md-2">Class</th>
                        <th class="col-md-1">Action</th>
                    </tr>
                    </thead>
                    <tbody id="ingman-grains-tbody"></tbody>
                </table>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Malt Extract</h3>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="col-md-3">Name</th>
                        <th class="col-md-2">Vendor</th>
                        <th class="col-md-1">HWE</th>
                        <th class="col-md-1">&deg;EBC</th>
                        <th class="col-md-2">Form</th>
                        <th class="col-md-2">Pre-hopped</th>
                        <th class="col-md-3">Action</th>
                    </tr>
                    </thead>
                    <tbody id="ingman-maltextracts-tbody"></tbody>
                </table>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sugars</h3>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="col-md-3">Name</th>
                        <th class="col-md-2">Vendor</th>
                        <th class="col-md-1">HWE</th>
                        <th class="col-md-1">&deg;EBC</th>
                        <th class="col-md-4">Form</th>
                        <th class="col-md-1">Action</th>
                    </tr>
                    </thead>
                    <tbody id="ingman-sugars-tbody"></tbody>
                </table>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Other fermentables</h3>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="col-md-3">Name</th>
                        <th class="col-md-2">Vendor</th>
                        <th class="col-md-1">HWE</th>
                        <th class="col-md-5">&deg;EBC</th>
                        <th class="col-md-1">Action</th>
                    </tr>
                    </thead>
                    <tbody id="ingman-fermentables-tbody"></tbody>
                </table>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Grain types</h3>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="col-md-11">Name</th>
                        <th class="col-md-1">Action</th>
                    </tr>
                    </thead>
                    <tbody id="ingman-graintypes-tbody"></tbody>
                </table>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Grain classes</h3>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="col-md-11">Name</th>
                        <th class="col-md-1">Action</th>
                    </tr>
                    </thead>
                    <tbody id="ingman-grainclasses-tbody"></tbody>
                </table>
            </div>

        </div>
    </div>
</div><!-- tab-pane -->
