{{----------------------------------------------------------------------
|| Water treatments tab content
----------------------------------------------------------------------}}
<div role="tabpanel" class="tab-pane" id="ingman-watertreatments">
    <div class="row">
        <div class="col-md-2">
            <ul class="list-unstyled hmb-sidebar">
                <li><a href="#" class="ingman-add-ingredient" data-toggle="modal" data-target="#edit-acids-modal">Add Acid</a></li>
                <li><a href="#" class="ingman-add-ingredient" data-toggle="modal" data-target="#edit-watertreatments-modal">Add Water Treatment Product</a></li>
                <li><a href="#" class="ingman-add-ingredient" data-toggle="modal" data-target="#edit-salts-modal">Add Salt</a></li>
                <li><a href="#" class="ingman-add-ingredient" data-toggle="modal" data-target="#edit-ions-modal">Add Ion</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Acids</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="col-md-3">Name</th>
                            <th class="col-md-2">Vendor</th>
                            <th class="col-md-1">Form</th>
                            <th class="col-md-5">Concentration (ppm)</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                        </thead>
                        <tbody id="ingman-acids-tbody"></tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Water Treatment Products</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="col-md-3">Name</th>
                            <th class="col-md-2">Vendor</th>
                            <th class="col-md-1">Form</th>
                            <th class="col-md-5">Concentration (ppm)</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                        </thead>
                        <tbody id="ingman-watertreatments-tbody"></tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Salts</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="col-md-3">Name</th>
                            <th class="col-md-2">Vendor</th>
                            <th class="col-md-1">Form</th>
                            <th class="col-md-3">Concentration (ppm)</th>
                            <th class="col-md-1">Cation</th>
                            <th class="col-md-1">Anion</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                        </thead>
                        <tbody id="ingman-salts-tbody"></tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Ions</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="col-md-3">Name</th>
                            <th class="col-md-2">Symbol</th>
                            <th class="col-md-6">Charge</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                        </thead>
                        <tbody id="ingman-ions-tbody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- tab-pane -->
