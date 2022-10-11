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

        .sawer:hover {
            cursor: pointer;
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
                            <div class="mt-3">
                                <div class="alert alert-warning text-center sawer" role="alert">
                                    <span class="mdi mdi-gift"></span> Dukung kami dengan berdonasi <a href="#" class="alert-link" data-toggle="modal" data-target="#sawerModal">melalui saweria</a>.
                                </div>
                            </div>
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


    <!-- Modal -->
    <div class="modal fade" id="sawerModal" tabindex="-1" role="dialog" aria-labelledby="sawerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sawerModalLabel">Mari berdonasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <p class="my-3">Scan QR Code atau klik langsung. <br> Dapat melalui berbagai macam Bank Indonesia dan E-Wallet.</p>
                    <a href="https://saweria.co/romosakti" target="_blank">
                        <img src="<?= base_url('assets/images/sawer.png'); ?>" alt="sawer" width="150">
                    </a>
                    <p class="my-3">Atau <a href="https://saweria.co/romosakti" class="alert-link" target="_blank">langsung kunjungi link</a></p>
                </div>
                <div class="text-center my-3">
                    <span style="font-size:9pt ;"><span class="mdi mdi-cards-heart"></span> Dukungan Anda sangat berarti bagi kami <span class="mdi mdi-cards-heart"></span></span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

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

    <script>
        let link_sawer = $('.sawer')
        let modal_sawer = $('#sawerModal')
        link_sawer.on('click', function() {
            modal_sawer.modal('show')
        })
    </script>
</body>

</html>