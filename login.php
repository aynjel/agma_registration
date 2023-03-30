<?php

if(Session::exists('customer')){
    Redirect::to('index.php?page=customer');
}

?>

<div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4">
        Identify
    </h5>
    <p class="text-center small">
        Identify if you are a new or existing customer.
    </p>
</div>

<form class="row g-3 needs-validation" novalidate method="POST" action="process_login.php?page=customer">

    <div class="col-12">
        <label for="account_number" class="form-label">Account Number</label>
        <input type="text" name="account_number" class="form-control" id="account_number" required
            value="<?= strtoupper(Input::get('account_number')); ?>">
        <div class="invalid-feedback">Please, enter your account number!</div>
    </div>

    <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">
            Identify
        </button>
    </div>
    <div class="col-12">
        <p class="small mb-0">
            Go back to
            <a href="?page=registration">Registration</a>
        </p>
    </div>
</form>