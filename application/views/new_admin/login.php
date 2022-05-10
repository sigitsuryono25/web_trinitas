<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EO Ibadah Admin Portal</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/vendors/feather/feather.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('assets/admin') ?>/images/favicon.png">
    <script src="<?= base_url('assets/admin') ?>/vendors/js/vendor.bundle.base.js"></script>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-center py-5 px-4 px-sm-5">
                            <img src="<?= base_url('assets/admin/images/icon.png') ?>" width="80" alt="">
                            <h4 class="text-center mt-2">Welcome to <br>EO Ibadah Admin Portal</h4>
                            <?php if ($this->session->flashdata('code') == 200) {
                            ?>
                                <div class="alert alert-success" id="success-alert">
                                    <strong>Berhasil! </strong><br> <?= $this->session->flashdata('message') ?>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                                            $("#success-alert").slideUp(500);
                                        });
                                    });
                                </script>
                            <?php } else if ($this->session->flashdata('code') == 500) {
                            ?>
                                <div class="alert alert-danger" id="danger-alert">
                                    <strong>Gagal !</strong><br><?= $this->session->flashdata('message') ?>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $("#danger-alert").fadeTo(2000, 500).slideUp(500, function() {
                                            $("#danger-alert").slideUp(500);
                                        });
                                    });
                                </script>
                            <?php } ?>
                            <form class="pt-3" action="<?= site_url('welcome/loginproc') ?>" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" name="email" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary" href="<?= base_url('assets/admin') ?>/index.html">SIGN IN</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url('assets/admin') ?>/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url('assets/admin') ?>/js/off-canvas.js"></script>
    <script src="<?= base_url('assets/admin') ?>/js/hoverable-collapse.js"></script>
    <script src="<?= base_url('assets/admin') ?>/js/template.js"></script>
    <script src="<?= base_url('assets/admin') ?>/js/settings.js"></script>
    <script src="<?= base_url('assets/admin') ?>/js/todolist.js"></script>
    <!-- endinject -->



</body>

</html>