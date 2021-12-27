<div class="content-wrapper">

    <!-- welcome -->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Selamat datang,</h2>
                        <p class="mb-md-0"><?= $user['nama']; ?></p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <div class="mr-md-3 mr-xl-5 text-small">
                        <?= format_indo(date('Y-m-d')); ?>
                        <!-- <br><?= date('Y-m-d H:i:s'); ?> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end welcome -->

    <!-- breadcrumb -->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb -->


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body dashboard-tabs p-0">
                    <ul class="nav nav-tabs px-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Kelas 7</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="sales" aria-selected="false">Kelas 8</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="purchases-tab" data-toggle="tab" href="#purchases" role="tab" aria-controls="purchases" aria-selected="false">Kelas 9</a>
                        </li>
                    </ul>
                    <div class="tab-content py-0 px-0">
                        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-animation mr-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total lokal</small>
                                        <h5 class="mr-2 mb-0">7 lokal kelas</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-account-multiple-outline mr-3 icon-lg text-success"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total siswa</small>
                                        <h5 class="mr-2 mb-0">256 siswa</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-login-variant mr-3 icon-lg text-warning"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Mutasi masuk</small>
                                        <h5 class="mr-2 mb-0">5 siswa</h5>
                                    </div>
                                </div>
                                <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-logout-variant mr-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Mutasi keluar</small>
                                        <h5 class="mr-2 mb-0">2 siswa</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sales" role="tabpanel" aria-labelledby="sales-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">

                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-animation mr-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total lokal</small>
                                        <h5 class="mr-2 mb-0">7 lokal kelas</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-account-multiple-outline mr-3 icon-lg text-success"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total siswa</small>
                                        <h5 class="mr-2 mb-0">256 siswa</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-login-variant mr-3 icon-lg text-warning"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Mutasi masuk</small>
                                        <h5 class="mr-2 mb-0">5 siswa</h5>
                                    </div>
                                </div>
                                <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-logout-variant mr-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Mutasi keluar</small>
                                        <h5 class="mr-2 mb-0">2 siswa</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">

                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-animation mr-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total lokal</small>
                                        <h5 class="mr-2 mb-0">7 lokal kelas</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-account-multiple-outline mr-3 icon-lg text-success"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Total siswa</small>
                                        <h5 class="mr-2 mb-0">256 siswa</h5>
                                    </div>
                                </div>
                                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-login-variant mr-3 icon-lg text-warning"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Mutasi masuk</small>
                                        <h5 class="mr-2 mb-0">5 siswa</h5>
                                    </div>
                                </div>
                                <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                                    <i class="mdi mdi-logout-variant mr-3 icon-lg text-danger"></i>
                                    <div class="d-flex flex-column justify-content-around">
                                        <small class="mb-1 text-muted">Mutasi keluar</small>
                                        <h5 class="mr-2 mb-0">2 siswa</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->

<script>
    <?= $this->session->flashdata('welcome'); ?>

    function welcome(teks) {
        responsiveVoice.speak(teks, "Indonesian Male");
    }
</script>