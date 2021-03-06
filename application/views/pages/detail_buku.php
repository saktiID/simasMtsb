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
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;<a href="<?= base_url('cekbuku'); ?>">Cek Buku Kerja</a>&nbsp;/&nbsp;</p>
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
                <div class="d-flex justify-content-between">
                    <p>Oleh : <strong><?= $target['nama']; ?></strong></p>
                    <label for="target">
                        <select name="target" id="target" onchange="slideTarget()">
                            <option disabled selected>Pilih pembuat dokumen :</option>
                            <?php

                            use Mpdf\Tag\Select;

                            foreach ($targetAll as $all) : ?>
                                <option value="<?= base_url('cekbuku/detail/') . $all['id']; ?>">
                                    <?= $all['nama']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>

                <div>
                    <label for="tahun">Pilih tahun ajaran:</label>
                    <select name="tahun" id="tahun" onchange="slideTahun()">
                        <option value="2021-2022" <?php if ($tahun == '2021-2022') : ?> selected <?php endif; ?>>2021-2020</option>
                        <option value="2022-2023" <?php if ($tahun == '2022-2023') : ?> selected <?php endif; ?>>2022-2023</option>
                        <option value="2023-2024" <?php if ($tahun == '2023-2024') : ?> selected <?php endif; ?>>2023-2024</option>
                        <option value="2024-2025" <?php if ($tahun == '2024-2025') : ?> selected <?php endif; ?>>2024-2025</option>
                    </select>
                </div>

                <h4 class="card-title mt-5">Buku Kerja Semester 1 <br> Tahun Ajaran <?= $tahun; ?></h4>
                <div class="table-responsive">
                    <table class="table table-hover" id="table_smt1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mapel</th>
                                <th>Kelas</th>
                                <th>Buku Kerja</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($cek_buku1 as $cek) : ?>
                                <tr>
                                    <td><?= $no; ?> <?php $no++; ?></td>
                                    <td><?= $cek['nama_mapel']; ?></td>
                                    <td><?= $cek['kelas']; ?></td>
                                    <td>Buku kerja <?= $cek['buku_kerja']; ?></td>
                                    <td class="text-danger"><?= $cek['isi_buku_kerja']; ?></td>
                                    <td><span class="badge rounded-pill <?= $cek['class']; ?>"><?= $cek['status']; ?></span></td>
                                    <td>
                                        <span class="btn-group" role="group">
                                            <a href="<?= base_url('cekBuku/preview/') . $cek['userfile'] ?>" target="_blank" class="badge badge-primary rounded-start" title="Lihat dokumen"><i class="mdi mdi-magnify fs-6"></i></a>
                                            <a href="<?= base_url('bukukerja/download/') . $cek['userfile']; ?>" class="badge badge-success" title="Unduh dokumen"><i class="mdi mdi-cloud-download fs-6"></i></a>
                                            <a href="<?= base_url('cekbuku/setujui/') . $cek['record_id'] . '/' . $target['id']; ?>" class="badge badge-warning setujuBtn" title="Setujui dokumen"><i class="mdi mdi-playlist-check fs-6"></i></a>
                                            <a href="<?= base_url('cekbuku/tolak/') . $cek['record_id'] . '/' . $target['id']; ?>" class="badge badge-danger tolakBtn rounded-end" title="Tolak dokumen"><i class="mdi mdi-playlist-remove fs-6"></i></a>
                                        </span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>

                <h4 class="card-title mt-5">Buku Kerja Semester 2 <br> Tahun Ajaran <?= $tahun; ?></h4>
                <div class="table-responsive">
                    <table class="table table-hover" id="table_smt2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mapel</th>
                                <th>Kelas</th>
                                <th>Buku Kerja</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($cek_buku2 as $cek) : ?>
                                <tr>
                                    <td><?= $no; ?> <?php $no++; ?></td>
                                    <td><?= $cek['nama_mapel']; ?></td>
                                    <td><?= $cek['kelas']; ?></td>
                                    <td>Buku kerja <?= $cek['buku_kerja']; ?></td>
                                    <td class="text-danger"><?= $cek['isi_buku_kerja']; ?></td>
                                    <td><span class="badge rounded-pill <?= $cek['class']; ?>"><?= $cek['status']; ?></span></td>
                                    <td>
                                        <span class="btn-group" role="group">
                                            <a href="<?= base_url('cekBuku/preview/') . $cek['userfile'] ?>" target="_blank" class="badge badge-primary rounded-start" title="Lihat dokumen"><i class="mdi mdi-magnify fs-6"></i></a>
                                            <a href="<?= base_url('bukukerja/download/') . $cek['userfile']; ?>" class="badge badge-success" title="Unduh dokumen"><i class="mdi mdi-cloud-download fs-6"></i></a>
                                            <a href="<?= base_url('cekbuku/setujui/') . $cek['record_id'] . '/' . $target['id']; ?>" class="badge badge-warning setujuBtn" title="Setujui dokumen"><i class="mdi mdi-playlist-check fs-6"></i></a>
                                            <a href="<?= base_url('cekbuku/tolak/') . $cek['record_id'] . '/' . $target['id']; ?>" class="badge badge-danger tolakBtn rounded-end" title="Tolak dokumen"><i class="mdi mdi-playlist-remove fs-6"></i></a>
                                        </span>
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
                let link = ''
                if (e.target.tagName == 'I') {
                    link = e.target.parentElement.href
                    window.location.replace(link)
                } else {
                    console.log(e.target.href)
                    window.location.replace(e.target.href)
                }
            }
        })
    })

    $('.setujuBtn').on('click', (e) => {
        e.preventDefault()
        console.log(e.target.href)
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
                let link = ''
                if (e.target.tagName == 'I') {
                    link = e.target.parentElement.href
                    window.location.replace(link)
                } else {
                    console.log(e.target.href)
                    window.location.replace(e.target.href)
                }
            }
        })
    })

    function slideTarget() {
        let linkTarget = $('[name="target"]').val()
        location.replace(linkTarget)
    }

    function slideTahun() {
        let tahun = $('[name="tahun"]').val()
        let linkTarget = '<?= base_url('cekbuku/detail/') . $target['id'] ?>' + '/' + tahun
        location.replace(linkTarget)
    }
</script>