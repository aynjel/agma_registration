<?php

if(!Session::exists('customer')){
    Redirect::to('index.php?page=registration');
}

$customer = Session::get('customer');

?>

<div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4">
        Hello, <?= $customer->first_name . ' ' . $customer->last_name; ?>
    </h5>
    <span class="badge bg-primary text-white d-block mt-2">
        Account Number: <?= $customer->account_number; ?>
    </span>
    <p class="text-center small mt-2">
        Successfully identified as an existing customer.
    </p>

    <a href="?page=logout" class="btn btn-danger w-100 mt-3">
        Logout
    </a>
</div>