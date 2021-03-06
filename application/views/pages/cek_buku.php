<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Selamat datang,</h2>
                        <p class="mb-md-0"><?= $user['nama']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Cek Buku Kerja&nbsp;/&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- content -->
    <div class="col-lg grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List buku kerja</h4>
                <div class="table-responsive">
                    <table class="table table-hover" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Mapel</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($cek_buku as $cek) : ?>
                                <tr>
                                    <td><?= $no; ?> <?php $no++ ?></td>
                                    <td class="d-flex align-items-center">
                                        <span><img src="<?= base_url('assets/images/faces/') . $cek['image']; ?>" alt="profile"></span>
                                        <p class="pl-3 m-0"><?= $cek['nama']; ?></p>
                                    </td>
                                    <td>

                                        <?php $explode = explode(',', $cek['kode_mapel']) ?>
                                        <?php foreach ($explode as $mapel) : ?>
                                            <?php $class = '';
                                            $rand = rand(1, 6);
                                            switch ($rand) {
                                                case 1:
                                                    $class = 'badge-warning';
                                                    break;
                                                case 2:
                                                    $class = 'badge-success';
                                                    break;
                                                case 3:
                                                    $class = 'badge-danger';
                                                    break;
                                                case 4:
                                                    $class = 'badge-dark';
                                                    break;
                                                case 5:
                                                    $class = 'badge-secondary';
                                                    break;
                                                default:
                                                    $class = 'badge-primary';
                                            }

                                            ?>
                                            <label style="cursor: pointer;" class="badge rounded-pill <?= $class; ?>"><?= $mapel; ?></label>
                                        <?php endforeach ?>

                                    </td>
                                    <td><a href="<?= base_url('cekbuku/detail/') . $cek['id']; ?>" class="btn btn-primary p-2" title="Lihat dokumen"><i class="mdi mdi-magnify fs-6"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->


</div>
<!-- content-wrapper ends -->