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
                    <div class="text-small">
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
        <!-- info siswa dan kelas -->
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
        <!-- end info siswa dan kelas -->

        <!-- info progress buku kerja -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-title">
                            Progres Buku Kerja
                        </div>
                        <div class="tahun">
                            <label for="tahun">Pilih tahun ajaran :</label>
                            <select name="tahun" id="tahun" onchange="slideTahun()">
                                <option value="2021-2022" <?php if ($tahun == '2021-2022') : ?> selected <?php endif; ?>>2021-2020</option>
                                <option value="2022-2023" <?php if ($tahun == '2022-2023') : ?> selected <?php endif; ?>>2022-2023</option>
                                <option value="2023-2024" <?php if ($tahun == '2023-2024') : ?> selected <?php endif; ?>>2023-2024</option>
                                <option value="2024-2025" <?php if ($tahun == '2024-2025') : ?> selected <?php endif; ?>>2024-2025</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <!-- semester 1 -->
                        <div class="col-md-12 mb-5">
                            <p class="card-description">Semester Ganjil</p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td width="100">
                                                <div class="d-flex align-items-center">
                                                    <i class="mdi mdi-book mr-1 icon-md text-primary"></i>
                                                    <span><strong>Buku 1</strong><br>
                                                        <small>
                                                            <?= $count_uploaded[1][1]; ?> / <?= $count_buku[1]; ?> File
                                                        </small>
                                                    </span>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Terupload [<?= $count_uploaded[1][1]; ?>]</span>
                                                    <span><?= $percent_uploaded[1][1]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $percent_uploaded[1][1]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Pending [<?= $count_pending[1][1]; ?>]</span>
                                                    <span><?= $percent_pending[1][1]; ?><span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $percent_pending[1][1]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Disetujui [<?= $count_disetujui[1][1]; ?>]</span>
                                                    <span><?= $percent_disetujui[1][1]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $percent_disetujui[1][1]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Ditolak [<?= $count_ditolak[1][1]; ?>]</span>
                                                    <span><?= $percent_ditolak[1][1]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $percent_ditolak[1][1]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100">
                                                <div class="d-flex align-items-center">
                                                    <i class="mdi mdi-book mr-1 icon-md text-warning"></i>
                                                    <span><strong>Buku 2</strong><br>
                                                        <small>
                                                            <?= $count_uploaded[1][2]; ?> / <?= $count_buku[2]; ?> File
                                                        </small>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Terupload [<?= $count_uploaded[1][2]; ?>]</span>
                                                    <span><?= $percent_uploaded[1][2]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $percent_uploaded[1][2]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Pending [<?= $count_pending[1][2]; ?>]</span>
                                                    <span><?= $percent_pending[1][2]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $percent_pending[1][2]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Disetujui [<?= $count_disetujui[1][2]; ?>]</span>
                                                    <span><?= $percent_disetujui[1][2]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $percent_disetujui[1][2]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Ditolak [<?= $count_ditolak[1][2]; ?>]</span>
                                                    <span><?= $percent_ditolak[1][2]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $percent_ditolak[1][2]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100">
                                                <div class="d-flex align-items-center">
                                                    <i class="mdi mdi-book mr-1 icon-md text-success"></i>
                                                    <span><strong>Buku 3</strong><br>
                                                        <small>
                                                            <?= $count_uploaded[1][3]; ?> / <?= $count_buku[3]; ?> File
                                                        </small>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Terupload [<?= $count_uploaded[1][3]; ?>]</span>
                                                    <span><?= $percent_uploaded[1][3]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $percent_uploaded[1][3]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Pending [<?= $count_pending[1][3]; ?>]</span>
                                                    <span><?= $percent_pending[1][3]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $percent_pending[1][3]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Disetujui [<?= $count_disetujui[1][3]; ?>]</span>
                                                    <span><?= $percent_disetujui[1][3]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $percent_disetujui[1][3]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Ditolak [<?= $count_ditolak[1][3]; ?>]</span>
                                                    <span><?= $percent_ditolak[1][3]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $percent_ditolak[1][3]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100">
                                                <div class="d-flex align-items-center">
                                                    <i class="mdi mdi-book mr-1 icon-md text-secondary"></i>
                                                    <span><strong>Buku 4</strong><br>
                                                        <small>
                                                            <?= $count_uploaded[1][4]; ?> / <?= $count_buku[4]; ?> File
                                                        </small>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Terupload [<?= $count_uploaded[1][4]; ?>]</span>
                                                    <span><?= $percent_uploaded[1][4]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $percent_uploaded[1][4]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Pending [<?= $count_pending[1][4]; ?>]</span>
                                                    <span><?= $percent_pending[1][4]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $percent_pending[1][4]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Disetujui [<?= $count_disetujui[1][4]; ?>]</span>
                                                    <span><?= $percent_disetujui[1][4]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $percent_disetujui[1][4]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Ditolak [<?= $count_ditolak[1][4]; ?>]</span>
                                                    <span><?= $percent_ditolak[1][4]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $percent_ditolak[1][4]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end semeter 1 -->

                        <!-- semester 2 -->
                        <div class="col-md-12 mb-5">
                            <p class="card-description">Semester Genap</p>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td width="100">
                                                <div class="d-flex align-items-center">
                                                    <i class="mdi mdi-book mr-1 icon-md text-primary"></i>
                                                    <span><strong>Buku 1</strong><br>
                                                        <small>
                                                            <?= $count_uploaded[2][1]; ?> / <?= $count_buku[1]; ?> File
                                                        </small>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Terupload [<?= $count_uploaded[2][1]; ?>]</span>
                                                    <span><?= $percent_uploaded[2][1]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $percent_uploaded[2][1]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Pending [<?= $count_pending[2][1]; ?>]</span>
                                                    <span><?= $percent_pending[2][1]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $percent_pending[2][1]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Disetujui [<?= $count_disetujui[2][1]; ?>]</span>
                                                    <span><?= $percent_disetujui[2][1]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $percent_disetujui[2][1]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Ditolak [<?= $count_ditolak[2][1]; ?>]</span>
                                                    <span><?= $percent_ditolak[2][1]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $percent_ditolak[2][1]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100">
                                                <div class="d-flex align-items-center">
                                                    <i class="mdi mdi-book mr-1 icon-md text-warning"></i>
                                                    <span><strong>Buku 2</strong><br>
                                                        <small>
                                                            <?= $count_uploaded[2][2]; ?> / <?= $count_buku[2]; ?> File
                                                        </small>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Terupload [<?= $count_uploaded[2][2]; ?>]</span>
                                                    <span><?= $percent_uploaded[2][2]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $percent_uploaded[2][2]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Pending [<?= $count_pending[2][2]; ?>]</span>
                                                    <span><?= $percent_pending[2][2]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $percent_pending[2][2]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Disetujui [<?= $count_disetujui[2][2]; ?>]</span>
                                                    <span><?= $percent_disetujui[2][2]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $percent_disetujui[2][2]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Ditolak [<?= $count_disetujui[2][2]; ?>]</span>
                                                    <span><?= $percent_ditolak[2][2]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $percent_ditolak[2][2]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100">
                                                <div class="d-flex align-items-center">
                                                    <i class="mdi mdi-book mr-1 icon-md text-success"></i>
                                                    <span><strong>Buku 3</strong><br>
                                                        <small>
                                                            <?= $count_uploaded[2][3]; ?> / <?= $count_buku[3]; ?> File
                                                        </small>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Terupload [<?= $count_uploaded[2][3]; ?>]</span>
                                                    <span><?= $percent_uploaded[2][3]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: <?= $percent_uploaded[2][3]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Pending [<?= $count_pending[2][3]; ?>]</span>
                                                    <span><?= $percent_pending[2][3]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $percent_pending[2][3]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Disetujui [<?= $count_disetujui[2][3]; ?>]</span>
                                                    <span><?= $percent_disetujui[2][3]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $percent_disetujui[2][3]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Ditolak [<?= $count_ditolak[2][3]; ?>]</span>
                                                    <span><?= $percent_ditolak[2][3]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $percent_ditolak[2][3]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100">
                                                <div class="d-flex align-items-center">
                                                    <i class="mdi mdi-book mr-1 icon-md text-secondary"></i>
                                                    <span><strong>Buku 4</strong><br>
                                                        <small>
                                                            <?= $count_uploaded[2][4]; ?> / <?= $count_buku[4]; ?> File
                                                        </small>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Terupload [<?= $count_uploaded[2][4]; ?>]</span>
                                                    <span><?= $percent_uploaded[2][4]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" style="width:<?= $percent_uploaded[2][4]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Pending [<?= $count_pending[2][4]; ?>]</span>
                                                    <span><?= $percent_pending[2][4]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: <?= $percent_pending[2][4]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Disetujui [<?= $count_disetujui[2][4]; ?>]</span>
                                                    <span><?= $percent_disetujui[2][4]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $percent_disetujui[2][4]; ?>" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td width="200">
                                                <div class="text-small d-flex justify-content-between mb-1">
                                                    <span>Ditolak [<?= $count_ditolak[2][4]; ?>]</span>
                                                    <span><?= $percent_ditolak[2][4]; ?></span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $percent_ditolak[2][4]; ?>" aria-valuenow="1" aria-valuemin="0" aria-valuemax="2"></div>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end semeter 2 -->

                    </div>
                </div>
            </div>
        </div>
        <!-- end info progress buku kerja -->

    </div>
</div>
<!-- content-wrapper ends -->

<script>
    <?= $this->session->flashdata('welcome'); ?>

    // function welcome(teks) {
    //     responsiveVoice.speak(teks, "Indonesian Male");
    // }

    function slideTahun() {
        let tahun = $('[name="tahun"]').val()
        let linkTarget = '<?= base_url('home?tahun=') ?>' + tahun
        location.replace(linkTarget)
    }
</script>