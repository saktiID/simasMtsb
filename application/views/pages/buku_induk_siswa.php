<div class="content-wrapper">

    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Selamat datang,</h2>
                        <p class="mb-md-0"><?= $user['nama'] ?></p>
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
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Buku Induk Siswa&nbsp;/&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- content -->

    <div class="col-lg grid-margin stretch-card data-guru">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">Tambah Data Induk</h4>
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg grid-margin stretch-card data-guru">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">Data Induk Siswa</h4>
                </div>

                <table class="table table-striped table-hover">
                    <tbody>
                        <?php foreach ($buku_induk as $bk_induk) : ?>
                            <tr>
                                <td data-bs-toggle="modal" data-bs-target="#bukuindukModel" style="cursor: pointer;" data-link="<?= $bk_induk['tahun_ajaran']; ?>" class="data-induk">
                                    <i class="mdi mdi-arrow-right mr-3"></i> Buku induk tahun <?= $bk_induk['tahun_ajaran']; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>



            </div>
        </div>
    </div>
    <!-- end content -->



    <!-- modalbox -->
    <div class="modal fade" id="bukuindukModel" tabindex="-1" aria-labelledby="bukuindukModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bukuindukModelLabel">Buku Induk Tahun Ajaran </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="table-responsive">
                        <table class="table table-hover" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No. Induk</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>

                            <tbody>
                            </tbody>

                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modalbox -->
</div>
<!-- content-wrapper ends -->


<script>
    $('.data-induk').on('click', (e) => {
        let link = e.target.dataset.link
        $('#bukuindukModelLabel').html('Buku Induk Tahun Ajaran ' + link)
    })
</script>