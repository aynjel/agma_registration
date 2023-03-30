<?php

$address = new Address();

if(isset($_POST['add_address'])){
    $address_name = $_POST['address_name'];

    $address->create([
        'address_name' => $address_name
    ]);

    Session::flash('success', 'Address has been created!');
}

Session::display_session_msg();

?>

<div class="card" style="max-width: 500px; margin: 0 auto;">
    <div class="card-body">
        <h5 class="card-title">
            <i class="bi bi-geo-alt-fill"></i>
            Create Address
        </h5>

        <form class="row g-3" method="POST">
            <div class="col-md-12">
                <label for="address_name" class="form-label">Address Name</label>
                <input type="text" name="address_name" class="form-control" id="address_name" required>
                <div class="invalid-feedback">Please, enter your address name!</div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary form-control" name="add_address">Save</button>
            </div>
        </form>

    </div>
</div>