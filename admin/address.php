<?php

$customer = new Customer();
$all = $customer->all();

$c_toledo = $customer->findAllBy('address', 'Toledo');
$c_aloguinsan = $customer->findAllBy('address', 'Aloguinsan');
$c_pinamungajan = $customer->findAllBy('address', 'Pinamungajan');
$c_asturias = $customer->findAllBy('address', 'Asturias');
$c_balamban = $customer->findAllBy('address', 'Balamban');
$c_cebu = $customer->findAllBy('address', 'Cebu');
?>

<div class="pagetitle">
    <h1>Address</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Address</li>
        </ol>
    </nav>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <!-- overall total customers -->
            Overall Total Customers (<?= count($all) ?>)
        </h5>

        <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100 active" id="toledo-tab" data-bs-toggle="tab"
                    data-bs-target="#bordered-justified-toledo" type="button" role="tab" aria-controls="toledo"
                    aria-selected="true">Toledo <?php (count($c_toledo) > 0) ? print('<span class="badge bg-primary">'.count($c_toledo).'</span>') : '' ?></button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="aloguinsan-tab" data-bs-toggle="tab"
                    data-bs-target="#bordered-justified-aloguinsan" type="button" role="tab" aria-controls="aloguinsan"
                    aria-selected="false">Aloguinsan <?php (count($c_aloguinsan) > 0) ? print('<span class="badge bg-primary">'.count($c_aloguinsan).'</span>') : '' ?></button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="pinamungajan-tab" data-bs-toggle="tab"
                    data-bs-target="#bordered-justified-pinamungajan" type="button" role="tab" aria-controls="pinamungajan"
                    aria-selected="false">Pinamungajan <?php (count($c_pinamungajan) > 0) ? print('<span class="badge bg-primary">'.count($c_pinamungajan).'</span>') : '' ?></button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="asturias-tab" data-bs-toggle="tab"
                    data-bs-target="#bordered-justified-asturias" type="button" role="tab" aria-controls="asturias"
                    aria-selected="false">Asturias <?php (count($c_asturias) > 0) ? print('<span class="badge bg-primary">'.count($c_asturias).'</span>') : '' ?></button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="balamban-tab" data-bs-toggle="tab"
                    data-bs-target="#bordered-justified-balamban" type="button" role="tab" aria-controls="balamban"
                    aria-selected="false">Balamban <?php (count($c_balamban) > 0) ? print('<span class="badge bg-primary">'.count($c_balamban).'</span>') : '' ?></button>
            </li>
            <li class="nav-item flex-fill" role="presentation">
                <button class="nav-link w-100" id="cebu-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-cebu"
                    type="button" role="tab" aria-controls="cebu" aria-selected="false">Cebu City <?php (count($c_cebu) > 0) ? print('<span class="badge bg-primary">'.count($c_cebu).'</span>') : '' ?></button>
            </li>
        </ul>
        <div class="tab-content pt-2" id="borderedTabJustifiedContent">
            <div class="tab-pane fade show active" id="bordered-justified-toledo" role="tabpanel"
                aria-labelledby="toledo-tab">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered datatable" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Account Number</th>
                                <th>Customer Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($c_toledo as $key => $c): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $c->account_number ?></td>
                                <td><?= $c->last_name . ', ' . $c->first_name ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="bordered-justified-aloguinsan" role="tabpanel"
                aria-labelledby="aloguinsan-tab">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Account Number</th>
                                <th>Customer Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($c_aloguinsan as $key => $c): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $c->account_number ?></td>
                                <td><?= $c->last_name . ', ' . $c->first_name ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="bordered-justified-pinamungajan" role="tabpanel"
                aria-labelledby="pinamungajan-tab">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Account Number</th>
                                <th>Customer Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($c_pinamungajan as $key => $c): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $c->account_number ?></td>
                                <td><?= $c->last_name . ', ' . $c->first_name ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="bordered-justified-asturias" role="tabpanel" aria-labelledby="asturias-tab">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Account Number</th>
                                <th>Customer Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($c_asturias as $key => $c): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $c->account_number ?></td>
                                <td><?= $c->last_name . ', ' . $c->first_name ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="bordered-justified-balamban" role="tabpanel" aria-labelledby="balamban-tab">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Account Number</th>
                                <th>Customer Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($c_balamban as $key => $c): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $c->account_number ?></td>
                                <td><?= $c->last_name . ', ' . $c->first_name ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane fade" id="bordered-justified-cebu" role="tabpanel" aria-labelledby="cebu-tab">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Account Number</th>
                                <th>Customer Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($c_cebu as $key => $c): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $c->account_number ?></td>
                                <td><?= $c->last_name . ', ' . $c->first_name ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>