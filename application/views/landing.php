<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SIMAS - <?= $title; ?> | MTs Bilingual</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/vendors/mdi/css/materialdesignicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico" />

    <!-- temp style -->
    <style>
        body {
            background-color: #F3F3F3;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card bg-gradient-success border-0">
                    <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
                        <img src="<?= base_url() ?>assets/images/logo-small.png" alt="logo mtsb" width="7%">
                        <div class="d-flex flex-column" style="text-align: center;">
                            <h5 class="mb-0 text-white">SISTEM INFORMASI MANAJEMEN MADRASAH</h5>
                            <h3 class="mb-0 text-white font-weight-medium">MTS BILINGUAL MUSLIMAT NU PUCANG</h3>
                            <p class="mb-0 text-white">Selamat datang, <strong><?= $nama; ?></strong> </p>
                        </div>
                        <div class="d-flex">
                            <span class="btn btn-outline-light mr-2 bg-gradient-danger border-0" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Kepala Madrasah</h5>
                        <a href="#" class="card-text btn btn-success"><i class="mdi mdi-arrow-right-bold-circle-outline"></i> Lihat detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Kesiswaan</h5>
                        <a href="#" class="card-text btn btn-success"><i class="mdi mdi-arrow-right-bold-circle-outline"></i> Lihat detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Kurikulum</h5>
                        <a href="#" class="card-text btn btn-success"><i class="mdi mdi-arrow-right-bold-circle-outline"></i> Lihat detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Sarpras</h5>
                        <a href="#" class="card-text btn btn-success"><i class="mdi mdi-arrow-right-bold-circle-outline"></i> Lihat detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Guru</h5>
                        <a href="<?= base_url('home'); ?>" class="card-text btn btn-success">
                            <i class="mdi mdi-arrow-right-bold-circle-outline"></i> Lihat detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Wali Kelas</h5>
                        <a href="#" class="card-text btn btn-success"><i class="mdi mdi-arrow-right-bold-circle-outline"></i> Lihat detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Penjamin Mutu</h5>
                        <a href="#" class="card-text btn btn-success"><i class="mdi mdi-arrow-right-bold-circle-outline"></i> Lihat detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Bendahara</h5>
                        <a href="#" class="card-text btn btn-success"><i class="mdi mdi-arrow-right-bold-circle-outline"></i> Lihat detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Siswa</h5>
                        <a href="#" class="card-text btn btn-success"><i class="mdi mdi-arrow-right-bold-circle-outline"></i> Lihat detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Orang Tua</h5>
                        <a href="#" class="card-text btn btn-success"><i class="mdi mdi-arrow-right-bold-circle-outline"></i> Lihat detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Tata Usaha</h5>
                        <a href="#" class="card-text btn btn-success"><i class="mdi mdi-arrow-right-bold-circle-outline"></i> Lihat detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Kepegawaian</h5>
                        <a href="#" class="card-text btn btn-success"><i class="mdi mdi-arrow-right-bold-circle-outline"></i> Lihat detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">BP - BK</h5>
                        <a href="#" class="card-text btn btn-success"><i class="mdi mdi-arrow-right-bold-circle-outline"></i> Lihat detail</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card mb-2">
                    <div class="card-body">
                        <h5 class="card-title">Profil</h5>
                        <a href="#" class="card-text btn btn-success"><i class="mdi mdi-arrow-right-bold-circle-outline"></i>Lihat detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Logout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Anda akan logout?
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>


    <!-- cdn bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- end cdn -->


</body>

</html>