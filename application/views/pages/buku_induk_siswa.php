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
                    <h4 class="card-title">Data Induk Siswa</h4>
                </div>

                <table class="table table-striped table-hover">
                    <tbody class="trBuku">
                    </tbody>
                </table>

                <div class="d-flex justify-content-end">
                    <div class="btn btn-primary btn-sm mt-2 mr-3 tmbh-data-induk" title="Tambah data induk">
                        <i class="mdi mdi-plus-circle-outline"></i>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- end content -->



    <!-- modalbox -->
    <div class="modal fade" id="bukuIndukModal" tabindex="-1" aria-labelledby="bukuIndukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bukuIndukModalLabel">Buku Induk Tahun Ajaran </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Data Induk Siswa</h4>
                            <input type="text" name="tahun_ajaran" id="th_ajar" hidden>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">NISN</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nisn">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_siswa">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">File Induk</label>
                                        <div class="col-sm-9">
                                            <input type="file" class="form-control" name="file_induk" id="file_induk" accept=".pdf">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success btn-upload-allrecord">
                                                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="M9,16V10H5L12,3L19,10H15V16H9M5,20V18H19V20H5Z"></path>
                                                </svg>
                                                <span>Upload</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="progress" style="display: none;">
                                <div class="progress-bar bg-success" role="progressbar" id="progressBar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>


                        </div>
                    </div>


                    <div class="table-responsive">
                        <table class="table table-hover" id="table-siswa">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NISN</th>
                                    <th>NAMA</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody class="trSiswa">
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
    $(document).ready(function() {
        // prepare data buku induk
        $.ajax({
            url: '<?= base_url('buku_induk_siswa/tampil_buku_induk'); ?>',
            method: 'POST',
            dataType: 'json',
            success: function(res) {
                tampilBukuInduk(res)
            }
        })

        // prepare tambah data buku induk
        klikTambahBukuInduk()

        // prepare upload record
        klikUpload()
    })

    function klikUpload() {

        $('.btn-upload-allrecord').on('click', () => {

            // prepare data
            let nisn = $('[name="nisn"]').val()
            let nama_siswa = $('[name="nama_siswa"]').val()
            let tahun_ajaran = $('[name="tahun_ajaran"]').val()
            let file_val = $('#file_induk').val()
            let fileupload = $('#file_induk').prop('files')[0]

            // validator
            if (nisn == '' || nama_siswa == '' || file_val == '') {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Oops..',
                    text: 'Ada kolom yang belum terisi',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                // cek nisn = angka
                if ($.isNumeric(nisn)) {

                    // interface uploading
                    $('.btn-upload-allrecord span').text('Sedang mengaupload')
                    $('.progress').show()

                    // instansiasi formData
                    let formData = new FormData()
                    formData.append('fileupload', fileupload)
                    formData.append('nisn', nisn)
                    formData.append('nama_siswa', nama_siswa)
                    formData.append('tahun_ajaran', tahun_ajaran)

                    $.ajax({
                        url: '<?= base_url('buku_induk_siswa/upload_data_siswa') ?>',
                        type: 'POST',
                        dataType: 'json',
                        cache: false,
                        processData: false,
                        contentType: false,
                        data: formData,
                        success: function(res) {
                            // ketika nisn sudah ada
                            if (res[0] == 1) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'warning',
                                    title: 'Oops...',
                                    text: 'NISN sudah terdaftar dengan nama "' + res[1][0].nama_siswa + '" lulusan tahun ' + res[1][0].tahun_ajaran,
                                })
                                $('.btn-upload-allrecord span').text('Upload')
                                $('.progress').hide()
                                $('#progressBar').attr('aria-valuenow', 0).css('width', 0 + '%')
                                return false
                            } else {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Hurray',
                                    text: 'Berhasil upload data siswa',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                $('[name="nisn"]').val('')
                                $('[name="nama_siswa"]').val('')
                                $('[name="file_induk"]').val('')
                                $('.btn-upload-allrecord span').text('Upload')
                                $('#table-siswa').DataTable().destroy()
                                tampilSiswa(res, tahun_ajaran)
                                klikHapusSiswa()
                                setTimeout(() => {
                                    $('.progress').hide()
                                    $('#progressBar').attr('aria-valuenow', 0).css('width', 0 + '%')
                                }, 500)
                            }
                        },
                        error: function(err) {
                            console.log(err.responseText)
                        },
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
                            return xhr;
                        },
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Oops..',
                        text: 'NISN harus berupa angka!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    }

    function destroyModal() {
        $('#bukuIndukModal').on('hidden.bs.modal', () => {
            $('#table-siswa').DataTable().destroy()
            $('[name="nisn"]').val('')
            $('[name="nama_siswa"]').val('')
            $('[name="file_induk"]').val('')
        })
    }

    function klikHapusSiswa() {
        $('.hapus-siswa').on('click', (e) => {
            e.preventDefault()
            let id = ''
            let link = ''
            if (e.target.tagName == 'I') {
                id = e.target.parentElement.dataset.id
                link = e.target.parentElement.dataset.link
            } else {
                id = e.target.dataset.id
                link = e.target.dataset.link
            }

            Swal.fire({
                title: "Hapus Siswa!",
                text: 'Apakah Anda akan menghapus data siswa?',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batalkan',
                confirmButtonText: 'Ya, hapus siswa!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '<?= base_url('buku_induk_siswa/hapus_siswa') ?>',
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            id: id,
                            link: link
                        },
                        success: function(res) {
                            if (res !== false) {
                                // ketika gagal hapus file
                                if (res == 1) {
                                    Swal.fire(
                                        'Oops..',
                                        'Gagal hapus file!',
                                        'warning'
                                    )
                                    return false
                                }
                                // ketika gagal hapus data
                                if (res == 2) {
                                    Swal.fire(
                                        'Oops..',
                                        'Gagal hapus data siswa!',
                                        'warning'
                                    )
                                    return false
                                }

                                $('#table-siswa').DataTable().destroy()
                                Swal.fire(
                                    'Terhapus!',
                                    'Data siswa berhasil dihapus',
                                    'success'
                                )
                                tampilSiswa(res, link)
                            }
                        },
                        error: function(err) {
                            Swal.fire(
                                'Oops..',
                                'Gagal hapus file! mungkin file sedang digunakan atau tidak tersedia. Silahkan coba tutup semua aplikasi yang membuka file tersebut.',
                                'warning'
                            )
                            console.log(err.responseText)
                        }
                    })
                }
            })

        })
    }

    function klikDataInduk() {
        $('.data-induk').on('click', (e) => {
            $('#bukuIndukModalLabel').html('Buku Induk Lulusan Tahun Ajaran ' + e.target.dataset.link)
            $('#th_ajar').val(e.target.dataset.link)
            // interface proses cara aneh
            let trSiswa = ''
            $('.trSiswa').html(trSiswa)
            $('#table-siswa').DataTable({
                "language": {
                    "emptyTable": "Sedang memproses..."
                }
            })

            // request data siswa dengan ajax
            $.ajax({
                url: '<?= base_url('buku_induk_siswa/tampil_siswa_by_tahun'); ?>',
                method: 'POST',
                dataType: 'json',
                data: {
                    th_ajaran: e.target.dataset.link,
                },
                success: function(res) {
                    $('#table-siswa').DataTable().destroy()
                    tampilSiswa(res, e.target.dataset.link)
                    klikHapusSiswa()
                    destroyModal()
                },
                error: function(err) {
                    console.log(err.responseText)
                }
            })

            // reload function
            $('.table-responsive').on('click', () => {
                klikHapusSiswa()
                klikDownload()
                klikEdit($('.btn-edit'))
            })
        })
    }

    function klikHapusBukuInduk() {
        $('.hps-buku').on('click', (e) => {
            let th_ajaran = ''
            let id = ''
            let target = e.target.tagName
            if (target == 'I') {
                th_ajaran = e.target.parentElement.parentElement.parentElement.firstChild.dataset.link
                id = e.target.parentElement.parentElement.parentElement.firstChild.dataset.id
            } else {
                th_ajaran = e.target.parentElement.parentElement.firstChild.dataset.link
                id = e.target.parentElement.parentElement.firstChild.dataset.id
            }
            Swal.fire({
                title: "Hapus Buku!",
                text: 'Apakah Anda akan menghapus buku induk lulusan tahun ajaran ' + th_ajaran + '?',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batalkan',
                confirmButtonText: 'Ya, hapus buku!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '<?= base_url('buku_induk_siswa/hapus_buku_induk'); ?>',
                        method: 'POST',
                        dataType: 'json',
                        data: {
                            id: id,
                        },
                        success: function(res) {
                            Swal.fire(
                                'Terhapus!',
                                'Buku induk lulusan tahun ajaran ' + th_ajaran + ' telah terhapus.',
                                'success'
                            )
                            tampilBukuInduk()
                        },
                        error: function(err) {
                            console.log(err.responseText)
                        }
                    })

                }
            })
        })
    }

    function klikTambahBukuInduk() {
        $('.tmbh-data-induk').on('click', () => {
            let trow = $('.trBuku>tr:last-child')
            let current = trow.children()[0].dataset.link
            // buat buku induk induk baru
            let explode = current.split("-")
            let th1 = parseInt(explode[0]) + 1
            let th2 = parseInt(explode[1]) + 1
            let thBaru = th1 + '-' + th2

            // tambah data induk
            $.ajax({
                url: '<?= base_url('buku_induk_siswa/tambah_buku_induk'); ?>',
                method: 'POST',
                dataType: 'json',
                data: {
                    tahun_ajaran: thBaru,
                },
                success: function(res) {
                    tampilBukuInduk()
                },
                error: function(err) {
                    console.log(err.responseText)
                }

            })

            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Hurray',
                text: 'Berhasil menambah buku induk',
                showConfirmButton: false,
                timer: 1500
            })

        })
    }

    function tampilSiswa(res, link) {

        let trSiswa = ''
        for (let i = 0; i < Object.keys(res).length; i++) {
            trSiswa += '<tr class="tr-' + res[i].id + '">'
            trSiswa += '<td>'
            trSiswa += i + 1
            trSiswa += '</td>'
            trSiswa += '<td class="td-nisn">'
            trSiswa += res[i].nisn
            trSiswa += '</td>'
            trSiswa += '<td class="td-nama_siswa">'
            trSiswa += res[i].nama_siswa
            trSiswa += '</td>'
            trSiswa += '<td class="text-center">'
            trSiswa += '<div class="btn-group" role="group">'
            trSiswa += '<a href="" target="_blank" class="badge badge-secondary rounded-start btn-download" data-file="' + res[i].link_file + '" title="Unduh data"><i class="mdi mdi-cloud-download fs-6"></i></a>'
            trSiswa += '<a href="" class="badge badge-warning btn-edit" data-id="' + res[i].id + '" title="Edit data"><i class="mdi mdi-table-edit fs-6"></i></a>'
            trSiswa += '<a href="" class="badge badge-danger rounded-end hapus-siswa" data-id="' + res[i].id + '" data-link="' + res[i].tahun_ajaran + '" title="Hapus data"><i class="mdi mdi-delete-forever fs-6"></i></a>'
            trSiswa += '</div>'
            trSiswa += '</td>'
            trSiswa += '</tr>'
        }
        if (trSiswa !== '') {
            $('.trSiswa').html(trSiswa)
            $('#table-siswa').DataTable({
                prosessing: true,
                autoWidth: false,
            })
            $('.dataTables_wrapper input').on("input", () => {
                klikHapusSiswa()
                klikEdit($('.btn-edit'))
                klikDownload()
            })
            klikHapusSiswa()
            klikEdit($('.btn-edit'))
            klikDownload()
        } else {
            $('#table-siswa').DataTable().clear().draw()
        }

    }

    function tampilBukuInduk() {
        // request data dengan ajax
        $.ajax({
            url: '<?= base_url('buku_induk_siswa/tampil_buku_induk'); ?>',
            method: 'POST',
            dataType: 'json',
            success: function(res) {
                let trBuku = ''
                for (let i = 0; i < Object.keys(res).length; i++) {
                    trBuku += '<tr>'
                    trBuku += '<td class="data-induk" data-bs-toggle="modal" data-bs-target="#bukuIndukModal" style="cursor: pointer;"'
                    trBuku += 'data-link="' + res[i].tahun_ajaran + '" data-id="' + res[i].id + '">'
                    trBuku += '<i class="mdi mdi-arrow-right mr-3"></i> Buku induk lulusan tahun ajaran ' + res[i].tahun_ajaran
                    trBuku += '</td>'
                    trBuku += '<td class="d-flex justify-content-end">'
                    trBuku += '<span class="btn btn-danger btn-sm hps-buku" title="Hapus data induk">'
                    trBuku += '<i class="mdi mdi-delete-forever"></i>'
                    trBuku += '</span>'
                    trBuku += '</td>'
                    trBuku += '</tr>'
                }

                // masukkan element ke tabel
                $('.trBuku').html(trBuku)
                // event listener click buku induk
                klikDataInduk()
                // event listener click hapus buku induk
                klikHapusBukuInduk()
            },
            error: function(err) {
                console.log(err.responseText)
            }
        })
    }

    function klikEdit(el) {
        el.on('click', (e) => {
            e.preventDefault()

            // cek ada editing lain atau tidak
            if ($('.simpan-edit')[0]) {
                // ketika ada
                if ($('.simpan-edit')[1]) {
                    Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: 'Oops..',
                        text: 'Ada data yang belum disimpan',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            } else {
                // ketika tidak ada
                // cari data
                let trId = ''
                if (e.target.tagName == 'I') {
                    trId = e.target.parentElement.dataset.id
                } else {
                    trId = e.target.dataset.id
                }

                // convert to editable element
                $('.tr-' + trId + ' .td-nisn').attr('contenteditable', 'true').focus()
                $('.tr-' + trId + ' .td-nama_siswa').attr('contenteditable', 'true')

                // add save button
                let ok = '<a href="" class="badge badge-primary mr-2 simpan-edit" data-id="' + trId + '" title="Simpan"><i class="mdi mdi-checkbox-marked-circle-outline fs-6"></i></a>'
                $('.tr-' + trId + ' td .btn-group').prepend(ok)

                // on click save btn
                $('.simpan-edit').on('click', (e) => {
                    e.preventDefault()

                    // inialisasi
                    let newNisn = $('.tr-' + trId + ' .td-nisn').text()
                    let newNamaSiswa = $('.tr-' + trId + ' .td-nama_siswa').text()

                    // cek nisn
                    if ($.isNumeric(newNisn)) {

                        // update data siswa
                        $.ajax({
                            url: '<?= base_url('buku_induk_siswa/ubah_data_siswa') ?>',
                            method: 'POST',
                            dataType: 'json',
                            data: {
                                nisn: newNisn,
                                nama_siswa: newNamaSiswa,
                                id: trId
                            },
                            success: function(res) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    title: 'Hurray',
                                    text: 'Berhasil edit data siswa',
                                    showConfirmButton: false,
                                    timer: 1500
                                })

                                // update state datatable
                                $('#table-siswa').DataTable().destroy()
                                $('#table-siswa').DataTable()

                            },
                            error: function(err) {
                                console.log(err.responseText)
                            }
                        })

                        // hilangkan attribute editable
                        $('.tr-' + trId + ' .td-nisn').attr('contenteditable', 'false')
                        $('.tr-' + trId + ' .td-nama_siswa').attr('contenteditable', 'false')

                        // hilangkan btn save
                        $('.simpan-edit').remove()
                    } else {
                        Swal.fire({
                            position: 'center',
                            icon: 'warning',
                            title: 'Oops..',
                            text: 'NISN harus berupa angka',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                })
            }
        })
    }

    function klikDownload() {
        $('.btn-download').on('click', (e) => {
            e.preventDefault()
            // cari data
            let fileName = ''
            if (e.target.tagName == 'I') {
                fileName = e.target.parentElement.dataset.file
            } else {
                fileName = e.target.dataset.file
            }

            // ketika belum upload file
            if (fileName == '') {
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: 'Oops..',
                    text: 'File belum diupload',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                // ketika file ada
                let url = '<?= base_url('buku_induk_siswa/download/') ?>' + fileName + '.pdf'
                window.open(url, '_blank');
            }

        })
    }
</script>