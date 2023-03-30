<?php

$customer = new Customer();

$customers = $customer->all();

?>

<div class="pagetitle">
    <h1>Customers</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="?page=dashboard">Home</a></li>
            <li class="breadcrumb-item active">Customers</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">

        <div class="col-md-12">
            <div class="row">

                <div class="col-md-12">
                    <div class="card recent-sales overflow-auto">

                        <div class="card-body">
                            <h5 class="card-title">Customers (<?= count($customers) ?>)</h5>

                            <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="customers-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th scope="col">Account Number</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Address (Sitio, Baranggay, City)</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($customers as $key => $c): ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $c->account_number ?></td>
                                        <td><?= $c->last_name.', '.$c->first_name ?></td>
                                        <td><?= $c->sitio.', '.$c->baranggay.', '.$c->city . ' City' ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="bi bi-gear"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <!-- <a class="dropdown-item" href="edit.php?table=customers&id=<?= $c->id ?>&action=edit">Edit</a> -->
                                                    <a class="dropdown-item" href="delete.php?table=customers&id=<?= $c->id ?>&action=delete" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>