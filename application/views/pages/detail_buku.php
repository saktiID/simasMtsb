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
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Cek Buku Kerja&nbsp;/&nbsp;</p>
                        <p class="text-muted mb-0 hover-cursor">Detail&nbsp;/&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- content -->
    <div class="col-lg grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Detail buku kerja</h4>
                <p>Oleh : <strong><?= $target['nama']; ?></strong></p>

                <div class="table-responsive">
                    <table class="table table-hover" id="table">
                        <thead>
                            <tr>
                                <th>Mapel</th>
                                <th>Tahun Ajaran</th>
                                <th>Semester</th>
                                <th>Buku Kerja</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cek_buku as $cek) : ?>
                                <tr>
                                    <td><?= $cek['nama_mapel']; ?></td>
                                    <td><?= $cek['tahun_ajar']; ?></td>
                                    <td>
                                        <?php if ($cek['smt'] == 1) : ?>
                                            Ganjil
                                        <?php else : ?>
                                            Genap
                                        <?php endif; ?>
                                    </td>
                                    <td>Buku kerja <?= $cek['buku_kerja']; ?></td>
                                    <td class="text-danger"><?= $cek['isi_buku_kerja']; ?></td>
                                    <td><span class="badge rounded-pill <?= $cek['class']; ?>"><?= $cek['status']; ?></span></td>

                                    <td>
                                        <a href="<?= base_url('cekBuku/preview/') . $cek['userfile'] ?>" target="_blank" class="badge badge-primary">Lihat</a>
                                        <a href="<?= base_url('bukukerja/download/') . $cek['userfile']; ?>" class="badge badge-success">Unduh</a>
                                        <a href="<?= base_url('cekbuku/setujui/') . $cek['record_id'] . '/' . $target['id']; ?>" class="badge badge-warning setujuBtn">Setujui</a>
                                        <a href="<?= base_url('cekbuku/tolak/') . $cek['record_id'] . '/' . $target['id']; ?>" class="badge badge-danger tolakBtn">Tolak</a>
                                    </td>
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


<?= $this->session->flashdata('msg'); ?>

<script>
    $('.tolakBtn').on('click', (e) => {
        e.preventDefault()
        Swal.fire({
            title: 'Tolak file?',
            text: "Anda akan menolak file!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya, tolak file!'
        }).then((result) => {
            if (result.value) {
                window.location.replace($('.tolakBtn').attr('href'))
            }
        })
    })

    $('.setujuBtn').on('click', (e) => {
        e.preventDefault()
        Swal.fire({
            title: 'Setujui file?',
            text: "Anda akan menyetujui file!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya, setujui file!'
        }).then((result) => {
            if (result.value) {
                window.location.replace($('.setujuBtn').attr('href'))
            }
        })
    })
</script>