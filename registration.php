<div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4">
        Customer Details
    </h5>
    <p class="text-center small">
        Please fill in your details
    </p>
</div>

<form class="row g-3 needs-validation" novalidate method="POST" action="process_register.php?page=customer">
    <div class="col-12">
        <label for="account_number" class="form-label">Account Number</label>
        <input type="text" name="account_number" class="form-control" id="account_number"
            value="<?= strtoupper(Input::get('account_number')); ?>" placeholder="Optional">
    </div>

    <div class="col-md-6">
        <label for="first_name" class="form-label">First Name</label>
        <input type="text" name="first_name" class="form-control" id="first_name" required
            value="<?= Input::get('first_name'); ?>">
        <div class="invalid-feedback">Please, enter your first name!</div>
    </div>

    <div class="col-md-6">
        <label for="last_name" class="form-label">Last Name</label>
        <input type="text" name="last_name" class="form-control" id="last_name" required
            value="<?= Input::get('last_name'); ?>">
        <div class="invalid-feedback">Please, enter your last name!</div>
    </div>

    <div class="col-12">
        <label for="city" class="form-label">City</label>
        <select class="form-select" name="city" id="city" required>
            <option selected disabled hidden>Choose...</option>
            <option value="Toledo">Toledo</option>
            <option value="Aloguinsan">Aloguinsan</option>
            <option value="Pinamungajan">Pinamungajan</option>
            <option value="Asturias">Asturias</option>
            <option value="Balamban">Balamban</option>
            <option value="Cebu">Cebu City</option>
        </select>
    </div>

    <div class="col-6">
        <label for="baranggay" class="form-label">Baranggay</label>
        <input type="text" name="baranggay" class="form-control" id="baranggay" required>
        <div class="invalid-feedback">Please, enter your baranggay!</div>
    </div>

    <div class="col-6">
        <label for="sitio" class="form-label">Sitio</label>
        <input type="text" name="sitio" class="form-control" id="sitio" required>
        <div class="invalid-feedback">Please, enter your sitio!</div>
    </div>

    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
            <label class="form-check-label" for="acceptTerms">
                I agree to the terms and conditions.
            </label>
            <div class="invalid-feedback">You must agree before submitting.</div>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">
            Register
        </button>
    </div>
    <div class="col-12">
        <p class="small mb-0">
            Identify if you are a new or existing customer.
            <a href="?page=login">Identify</a>
        </p>
    </div>
</form>