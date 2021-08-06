<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIMAS - <?= $title; ?> | MTs Bilingual</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico" />

    <style>
        .eyeBtn {
            position: absolute;
            font-size: 1.5em;
            margin: 15px;
            right: 10%;
            color: grey;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-5 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="<?= base_url() ?>assets/images/logo-mark.png" alt="logo">
                            </div>
                            <h4>Sistem Informasi Manajemen Madrasah</h4>
                            <h6 class="font-weight-light">Silakan login.</h6>
                            <?= $this->session->flashdata('pesan'); ?>
                            <form class="pt-3" method="post" action="<?= base_url('auth'); ?>">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-lg" id="userid" placeholder="User ID" value="<?= set_value('username'); ?>">
                                    <?= form_error('username', '<span class="text-danger text-small">', '</span>'); ?>
                                </div>
                                <div class="form-group d-flex">
                                    <input type="password" name="password" class="form-control form-control-lg" id="password" placeholder="Password">
                                    <span class="mdi mdi-eye eyeBtn"></span>
                                    <?= form_error('password', '<span class="text-danger text-small">', '</span>'); ?>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">LOGIN</button>
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
    <!-- <script src="<?= base_url() ?>assets/vendors/base/vendor.bundle.base.js"></script> -->
    <!-- endinject -->
    <!-- inject:js -->
    <!-- <script src="<?= base_url() ?>assets/js/off-canvas.js"></script>
    <script src="<?= base_url() ?>assets/js/hoverable-collapse.js"></script>
    <script src="<?= base_url() ?>assets/js/template.js"></script> -->
    <!-- endinject -->

    <script>
        let eye = document.querySelector('.eyeBtn')
        let pass = document.getElementById('password')
        eye.addEventListener('click', () => {
            if (eye.classList.contains('mdi-eye')) {
                eye.classList.remove('mdi-eye')
                eye.classList.add('mdi-eye-off')
                eye.style.color = 'black'
                pass.type = 'text'
            } else {
                eye.classList.remove('mdi-eye-off')
                eye.classList.add('mdi-eye')
                eye.style.color = 'grey'
                pass.type = 'password'
            }
        })
    </script>
</body>

</html>