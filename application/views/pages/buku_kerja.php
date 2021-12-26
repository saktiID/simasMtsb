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

        .loading .card {
            border-radius: 7px;
            width: 50%;
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
            border: 5px solid #E9ECEF;
            border-top-color: #71C016;
            animation: spinner .9s linear infinite;
        }

        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }
    </style>

    <div class="loading d-none">
        <div class="card">
            <!-- <span class="spinner"></span> -->
            <div class="card-header card-title mb-0">
                <h5>Sedang upload file</h5>
            </div>
            <div class="card-body">
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" id="progressBar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="card-footer text-muted text-center">
                <span class="text-small">sabar nggeh</span>
            </div>
        </div>
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
                        Solusi kompres file PDF online agar lebih ringan dan cepat saat upload, klik link <a href="https://tools.pdf24.org/id/compress-pdf" target="_blank">Kompresi file | PDF24</a> <br>
                        Solusi menggabungkan file PDF, klik link <a href="https://tools.pdf24.org/id/gabung-pdf" target="_blank">Gabungkan file | PDF24</a>
                    </p>
                    <hr>
                    <small class="mb-0">Semoga amal ibadah dan buku kerja Anda diterima, Amin!.</small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <form enctype="multipart/form-data" method="post" action="#" class="bukerForm">
                    <div class="row">
                        <!-- input tahun ajar -->
                        <div class="col mb-3">
                            <select class="form-select inputan" aria-label="Default select example" name="tahun_ajar" required>
                                <option selected value="">-- Tahun ajaran --</option>
                                <option value="2021-2022">2021 - 2022</option>
                                <option value="2022-2023">2022 - 2023</option>
                                <option value="2024-2024">2023 - 2024</option>
                            </select>
                        </div>
                        <!-- input semester -->
                        <div class="col mb-3">
                            <select class="form-select inputan" aria-label="Default select example" name="smt" required>
                                <option selected value="">-- Semester --</option>
                                <option value="1">Ganjil</option>
                                <option value="2">Genap</option>
                            </select>
                        </div>
                        <!-- input nama buku kerja -->
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
                        <!-- input mapel -->
                        <div class="col mb-3">
                            <select class="form-select inputan" aria-label="Default select example" name="mapel" required>
                                <option selected value="">-- Mapel --</option>
                                <?php foreach ($mapel as $mpl) : ?>
                                    <option value="<?= $mpl['kode']; ?>"><?= $mpl['nama_mapel']; ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- input kelas -->
                        <div class="col mb-3">
                            <select class="form-select inputan" aria-label="Default select example" name="kelas_id" required>
                                <option selected value="">-- Kelas --</option>
                                <?php foreach ($kelas as $kls) : ?>
                                    <option value="<?= $kls['id']; ?>"><?= $kls['kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <!-- input file buku kerja -->
                        <div class="col mb-3">
                            <input class="form-control form-control-sm inputan" title="Pilih file format PDF" type="file" id="formFile" name="userfile" accept=".pdf" required>
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
                            <?php foreach ($buku_self1 as $self) : ?>
                                <tr>
                                    <td><?= $no ?> <?php $no++ ?></td>
                                    <td><?= $self['nama_mapel']; ?></td>
                                    <td><?= $self['kelas']; ?></td>
                                    <td>Buku kerja <?= $self['buku_kerja']; ?></td>
                                    <td class="text-danger"><?= $self['isi_buku_kerja']; ?></td>
                                    <td><span class="badge <?= $self['class']; ?> rounded-pill"><?= $self['status']; ?></span></td>
                                    <td>
                                        <span class="btn-group" role="group">
                                            <a href="<?= base_url('bukuKerja/preview/') . $self['userfile'] ?>" target="_blank" class="badge badge-primary rounded-start" title="Lihat dokumen"><i class="mdi mdi-magnify fs-6"></i></a>
                                            <a href="<?= base_url('bukukerja/download/') . $self['userfile']; ?>" class="badge badge-success" title="Unduh dokumen"><i class="mdi mdi-cloud-download fs-6"></i></a>
                                            <a href="<?= base_url('bukukerja/delete/') . $self['record_id'] . '/' . $self['userfile']; ?>" class="badge badge-danger delBtn rounded-end" title="Hapus dokumen"><i class="mdi mdi-delete-forever fs-6"></i></a>
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
                            <?php foreach ($buku_self2 as $self) : ?>
                                <tr>
                                    <td><?= $no ?> <?php $no++ ?></td>
                                    <td><?= $self['nama_mapel']; ?></td>
                                    <td><?= $self['kelas']; ?></td>
                                    <td>Buku kerja <?= $self['buku_kerja']; ?></td>
                                    <td class="text-danger"><?= $self['isi_buku_kerja']; ?></td>
                                    <td><span class="badge <?= $self['class']; ?> rounded-pill"><?= $self['status']; ?></span></td>
                                    <td>
                                        <span class="btn-group" role="group">
                                            <a href="<?= base_url('bukuKerja/preview/') . $self['userfile'] ?>" target="_blank" class="badge badge-primary rounded-start" title="Lihat dokumen"><i class="mdi mdi-magnify fs-6"></i></a>
                                            <a href="<?= base_url('bukukerja/download/') . $self['userfile']; ?>" class="badge badge-success" title="Unduh dokumen"><i class="mdi mdi-cloud-download fs-6"></i></a>
                                            <a href="<?= base_url('bukukerja/delete/') . $self['record_id'] . '/' . $self['userfile']; ?>" class="badge badge-danger delBtn rounded-end" title="Hapus dokumen"><i class="mdi mdi-delete-forever fs-6"></i></a>
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

    $('.bukerForm').on('submit', (e) => {
        e.preventDefault()
        // interface uploading
        $('.loading').removeClass('d-none')

        // prepare data
        let tahun_ajar = $('[name="tahun_ajar"]').val()
        let smt = $('[name="smt"]').val()
        let buku_kerja = $('[name="buku_kerja"]').val()
        let mapel = $('[name="mapel"]').val()
        let kelas_id = $('[name="kelas_id"]').val()
        let fileupload = $('#formFile').prop('files')[0]

        // instansiasi formData
        let formData = new FormData()
        formData.append('tahun_ajar', tahun_ajar)
        formData.append('smt', smt)
        formData.append('buku_kerja', buku_kerja)
        formData.append('mapel', mapel)
        formData.append('kelas_id', kelas_id)
        formData.append('fileupload', fileupload)

        // run upload ajax
        $.ajax({
            url: '<?= base_url('bukukerja/upload') ?>',
            type: 'POST',
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            data: formData,
            /** function on success */
            success: function(res) {
                if (res.value == 'uploaded') {
                    successUpload(res.data.filename)
                }
                if (res.value == 'exist') {
                    fileExist(res.data)
                }
                if (res.value == 'failed') {
                    failedUpload()
                }
            },
            /** function on progree */
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        /**
                         * contekan
                         * =========================================
                         * console.log('Bytes Loaded : ' + e.loaded)
                         * console.log('Total Size : ' + e.total)
                         * console.log('Persen : ' + (e.loaded / e.total))
                         */

                        var percent = Math.round((e.loaded / e.total) * 100)
                        $('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%')
                    }
                });
                return xhr
            },
            /** function on error */
            error: function(err) {
                console.log(err.responseText)
            },
        })

    })

    function successUpload(name) {
        $('.loading').addClass('d-none')
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Hurray',
            html: 'Berhasil upload buku kerja <br> <small>' + name + '</small>',
            showConfirmButton: true,
            confirmButtonText: 'Siap!',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.value) {
                location.reload()
            }
        })
    }

    function fileExist(data) {
        $('.loading').addClass('d-none')
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Oops...',
            html: 'File dengan nama <br><small>' + data.userfile + '</small><br> sudah ada di database dan penyimpanan',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonText: 'Timpa file',
            allowOutsideClick: false,
        }).then((result) => {
            if (result.value) {
                // interface upload
                $('.loading').removeClass('d-none')
                replaceFile(data)
            }
        })
    }

    function replaceFile(data) {

        // instansiasi data ulang
        let replaceFile = new FormData()
        let fileupload = $('#formFile').prop('files')[0]
        replaceFile.append('filename', data.userfile)
        replaceFile.append('fileupload', fileupload)
        $.ajax({
            url: '<?= base_url('bukukerja/replace') ?>',
            type: 'POST',
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            data: replaceFile,
            success: function(res) {
                if (res.value == 'replaced') {
                    successUpload(res.data.filename)
                }
                if (res.value == 'failed') {
                    failedUpload()
                }
            },
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                        var percent = Math.round((e.loaded / e.total) * 100)
                        $('#progressBar').attr('aria-valuenow', percent).css('width', percent + '%')
                    }
                });
                return xhr
            },
            error: function(err) {
                console.log(err.responseText)
            },
        })
    }

    function failedUpload() {
        Swal.file({
            position: 'center',
            icon: 'warning',
            title: 'Oops...',
            html: 'Gagal upload file, <br> Silahkan ulangi kembali!',
            showConfirmButton: true,
            confirmButtonText: 'Siap!',
        }).then((result) => {
            if (result.value) {
                location.reload()
            }
        })
    }

    function slideTahun() {
        let tahun = $('[name="tahun"]').val()
        let linkTarget = '<?= base_url('bukukerja?tahun=') ?>' + tahun
        location.replace(linkTarget)
    }
</script>