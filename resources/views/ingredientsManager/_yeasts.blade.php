{{----------------------------------------------------------------------
|| Yeasts tab content
----------------------------------------------------------------------}}
<div role="tabpanel" class="tab-pane" id="ingman-yeasts">
    <div class="row">
        <div class="col-md-2">
            <ul class="list-unstyled hmb-sidebar">
                <li><a href="#" class="ingman-add-ingredient" data-toggle="modal" data-target="#edit-yeasts-modal">Add Yeast</a></li>
                <li><a href="#" class="ingman-add-ingredient" data-toggle="modal" data-target="#edit-yeastclasses-modal">Add Strain</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Yeast</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="col-md-3">Name</th>
                            <th class="col-md-2">Serial no.</th>
                            <th class="col-md-2">Vendor</th>
                            <th class="col-md-2">Strain category</th>
                            <th class="col-md-2">Form</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                        </thead>
                        <tbody id="ingman-yeasts-tbody"></tbody>
                    </table>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Yeast Strain Categories</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="col-md-11">Name</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                        </thead>
                        <tbody id="ingman-yeastclasses-tbody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- tab-pane -->
