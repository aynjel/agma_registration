    <?php

    require('../autoload.php');

    if(!isset($_GET['id']) || !isset($_GET['action']) || !isset($_GET['table'])) {
        header('Location: index.php?page=customers');
        exit;
    }

    $title = 'Edit Customer';

    $id = $_GET['id'];
    $table = $_GET['table'];

    $customer = new Customer();
    $c = $customer->find($id);

    if(Input::exists()) {
        $validate = new Validate();
        $validation = $validate->check($_POST, [
            'account_number' => [
                'display' => 'Account Number',
                'required' => true,
                'unique' => $table
            ],
            'first_name' => [
                'display' => 'First Name',
                'required' => true,
                'min' => 2,
                'max' => 50
            ],
            'last_name' => [
                'display' => 'Last Name',
                'required' => true,
                'min' => 2,
                'max' => 50
            ],
            'city' => [
                'display' => 'City',
                'required' => true,
            ],
            'baranggay' => [
                'display' => 'Baranggay',
                'required' => true,
                'min' => 2,
                'max' => 50
            ],
            'sitio' => [
                'display' => 'Sitio',
                'required' => true,
                'min' => 2,
                'max' => 50
            ]
        ]);

        if($validation->passed()) {
            $customer->update($id, [
                'account_number' => Input::get('account_number'),
                'first_name' => Input::get('first_name'),
                'last_name' => Input::get('last_name'),
                'city' => Input::get('city'),
                'baranggay' => Input::get('baranggay'),
                'sitio' => Input::get('sitio')
            ]);

            Session::flash('success', 'Customer updated successfully!');
            header('Location: index.php?page=customers');
            exit;
        }else{
            Session::flash('error', $validation->errors()[0]);
        }
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>
            <?= $title; ?> | <?= Config::get('website/name'); ?>
        </title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="../assets/img/favicon.png" rel="icon">
        <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.gstatic.com" rel="preconnect">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="../assets/css/style.css" rel="stylesheet">
    </head>

    <body>

        <main>
            <div class="container">

                <section
                    class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">

                                <?= Session::display_session_msg(); ?>

                                <div class="card mb-3">

                                    <div class="card-body">

                                        <div class="pt-4 pb-2">
                                            <h5 class="card-title text-center pb-0 fs-4">
                                                Edit Customer
                                            </h5>
                                            <p class="text-center small">
                                                Please, fill up the form below.
                                            </p>
                                        </div>

                                        <form class="row g-3 needs-validation" novalidate method="POST">
                                            <div class="col-12">
                                                <label for="account_number" class="form-label">Account Number</label>
                                                <input type="text" name="account_number" class="form-control"
                                                    id="account_number" required value="<?= $c->account_number; ?>">
                                                <div class="invalid-feedback">Please, enter your account number!</div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="first_name" class="form-label">First Name</label>
                                                <input type="text" name="first_name" class="form-control" id="first_name"
                                                    required value="<?= $c->first_name; ?>">
                                                <div class="invalid-feedback">Please, enter your first name!</div>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="last_name" class="form-label">Last Name</label>
                                                <input type="text" name="last_name" class="form-control" id="last_name"
                                                    required value="<?= $c->last_name; ?>">
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
                                                <input type="text" name="baranggay" class="form-control" id="baranggay"
                                                    required value="<?= $c->baranggay; ?>">
                                                <div class="invalid-feedback">Please, enter your baranggay!</div>
                                            </div>

                                            <div class="col-6">
                                                <label for="sitio" class="form-label">Sitio</label>
                                                <input type="text" name="sitio" class="form-control" id="sitio" required
                                                    value="<?= $c->sitio; ?>">
                                                <div class="invalid-feedback">Please, enter your sitio!</div>
                                            </div>

                                            <div class="col-12">
                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </div>
                                        </form>


                                    </div>
                                </div>

                                <!-- <div class="credits">
                                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                                </div> -->

                            </div>
                        </div>
                    </div>

                </section>

            </div>
        </main><!-- End #main -->

        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Vendor JS Files -->
        <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/chart.js/chart.umd.js"></script>
        <script src="../assets/vendor/echarts/echarts.min.js"></script>
        <script src="../assets/vendor/quill/quill.min.js"></script>
        <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="../assets/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="../assets/js/main.js"></script>

    </body>

    </html>