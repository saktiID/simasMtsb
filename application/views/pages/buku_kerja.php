<div class="content-wrapper">

    <style>
        .loading {
            display: flex;
            z-index: 9999;
            height: 100vh;
            width: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.57);
            position: fixed;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .spinner {
            border: 5px solid transparent;
            border-radius: 3px;
            position: relative;
        }

        .spinner:before {
            content: '';
            box-sizing: border-box;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 50px;
            height: 50px;
            margin-top: -15px;
            margin-left: -30px;
            border-radius: 50%;
            border: 5px solid #575757;
            border-top-color: #ffffff;
            animation: spinner .9s linear infinite;
        }

        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }

        .teks {
            display: block;
            color: #ffffff;
            margin-top: 45px;
        }
    </style>

    <div class="loading d-none">
        <span class="spinner"></span>
        <span class="teks">Sedang upload file...</span>
    </div>

    <!-- welcome -->
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
    <!-- end welcome -->

    <!-- breacrumb -->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Buku Kerja&nbsp;/&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb -->



    <!-- content -->
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Upload buku kerja</h4>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center mb-2">
                        <span class="mdi mdi-alert fs-4 pr-2"></span>
                        <h4 class="alert-heading mb-0">Peringatan!</h4>
                    </div>
                    <p>Pastikan file yang di-upload sudah berformat <strong>PDF</strong>. <br>
                        Pastikan satu jenis buku ada dalam satu file, bukan file terpisah. <br>
                        Solusi kompres file PDF online agar lebih ringan dan cepat saat upload, klik link <a href="https://tools.pdf24.org/id/compress-pdf" target="_blank">PDF24</a>.
                    </p>
                    <hr>
                    <small class="mb-0">Semoga amal ibadah dan buku kerja Anda diterima, Amin!.</small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <form enctype="multipart/form-data" method="post" accept-charset="utf-8" action="<?= base_url('bukukerja/upload_buku'); ?>" class="bukerForm">
                    <div class="row">
                        <div class="col mb-3">
                            <select class="form-select inputan" aria-label="Default select example" name="tahun_ajar" required>
                                <option selected value="">-- Tahun ajaran --</option>
                                <option value="2021-2022">2021 - 2022</option>
                                <option value="2022-2023">2022 - 2023</option>
                                <option value="2024-2024">2023 - 2024</option>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <select class="form-select inputan" aria-label="Default select example" name="smt" required>
                                <option selected value="">-- Semester --</option>
                                <option value="1">Ganjil</option>
                                <option value="2">Genap</option>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <select class="form-select inputan" aria-label="Default select example" name="buku_kerja" required>
                                <option selected value="">-- Buku kerja --</option>
                                <?php foreach ($buku_kerja as $buku) : ?>
                                    <optgroup label="Buku <?= $buku['no_buku_kerja']; ?>">
                                        <?php foreach ($isi_buku as $isi) : ?>
                                            <?php if ($isi['no_buku_kerja'] == $buku['no_buku_kerja']) : ?>
                                                <option value="<?= $isi['id']; ?>"><?= $isi['isi_buku_kerja']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </optgroup>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <select class="form-select inputan" aria-label="Default select example" name="mapel" required>
                                <option selected value="">-- Mapel --</option>
                                <?php foreach ($mapel as $mpl) : ?>
                                    <option value="<?= $mpl['kode']; ?>"><?= $mpl['nama_mapel']; ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <select class="form-select inputan" aria-label="Default select example" name="kelas_id" required>
                                <option selected value="">-- Kelas --</option>
                                <?php foreach ($kelas as $kls) : ?>
                                    <option value="<?= $kls['id']; ?>"><?= $kls['kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col mb-3">
                            <input class="form-control form-control-sm inputan" title="Pilih file format PDF" type="file" id="formFile" name="userfile" required>
                        </div>

                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success uploadBtn">
                            <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M9,16V10H5L12,3L19,10H15V16H9M5,20V18H19V20H5Z" />
                            </svg>
                            Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Buku kerja tersimpan</h4>
                <div class="table-responsive">
                    <table class="table table-hover" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mapel</th>
                                <th>Kelas</th>
                                <th>Tahun Ajaran</th>
                                <th>Semester</th>
                                <th>Buku Kerja</th>
                                <th>Jenis</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($buku_self as $self) : ?>
                                <tr>
                                    <td><?= $no ?> <?php $no++ ?></td>
                                    <td><?= $self['nama_mapel']; ?></td>
                                    <td><?= $self['kelas']; ?></td>
                                    <td><?= $self['tahun_ajar']; ?></td>
                                    <td>
                                        <?php if ($self['smt'] == 1) : ?>
                                            Ganjil
                                        <?php else : ?>
                                            Genap
                                        <?php endif; ?>
                                    </td>
                                    <td>Buku kerja <?= $self['buku_kerja']; ?></td>
                                    <td class="text-danger"><?= $self['isi_buku_kerja']; ?></td>
                                    <td><span class="badge <?= $self['class']; ?> rounded-pill"><?= $self['status']; ?></span></td>
                                    <td class="btn-group" role="group">
                                        <a href="<?= base_url('bukuKerja/preview/') . $self['userfile'] ?>" target="_blank" class="badge badge-primary rounded-start" title="Lihat dokumen"><i class="mdi mdi-magnify fs-6"></i></a>
                                        <a href="<?= base_url('bukukerja/download/') . $self['userfile']; ?>" class="badge badge-success" title="Unduh dokumen"><i class="mdi mdi-cloud-download fs-6"></i></a>
                                        <a href="<?= base_url('bukukerja/delete/') . $self['record_id'] . '/' . $self['userfile']; ?>" class="badge badge-danger delBtn rounded-end" title="Hapus dokumen"><i class="mdi mdi-delete-forever fs-6"></i></a>
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
    $('.delBtn').on('click', (e) => {
        e.preventDefault()
        Swal.fire({
            title: 'Anda yakin?',
            text: "Anda akan menghapus file!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya, hapus file!'
        }).then((result) => {
            if (result.value) {
                if (e.target.hasAttribute('href')) {
                    window.location.replace(e.target.href)
                } else {
                    window.location.replace(e.target.parentElement.href)
                }
            }
        })
    })

    $('.bukerForm').on('submit', () => {
        $('.loading').removeClass('d-none')
    })
</script>