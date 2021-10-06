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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bukuIndukModalLabel">Buku Induk Tahun Ajaran </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="card mb-5">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <h4 class="card-title">Tambah Data Induk Siswa</h4>
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
    })



    function destroyModal() {
        $('#bukuIndukModal').on('hidden.bs.modal', () => {
            $('#table-siswa').DataTable().destroy()
        })
    }

    function klikDataInduk() {
        $('.data-induk').on('click', (e) => {
            $('#bukuIndukModalLabel').html('Buku Induk Tahun Ajaran ' + e.target.dataset.link)
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
                    destroyModal()
                },
                error: function(err) {
                    console.log(err.responseText)
                }
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
                text: 'Apakah Anda akan menghapus buku induk tahun ajaran ' + th_ajaran + '?',
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
                                'Buku induk tahun ajaran ' + th_ajaran + ' telah terhapus.',
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
                title: 'Berhasil menambah buku induk',
                showConfirmButton: false,
                timer: 1500
            })

        })
    }

    function tampilSiswa(res, link) {

        let trSiswa = ''
        let baseURL = '<?= base_url("buku_induk_siswa/") ?>'
        for (let i = 0; i < Object.keys(res).length; i++) {
            trSiswa += '<tr>'
            trSiswa += '<td>'
            trSiswa += i + 1
            trSiswa += '</td>'
            trSiswa += '<td>'
            trSiswa += res[i].nisn
            trSiswa += '</td>'
            trSiswa += '<td>'
            trSiswa += res[i].nama_siswa
            trSiswa += '</td>'
            trSiswa += '<td class="text-center">'
            trSiswa += '<div class="btn-group" role="group">'
            trSiswa += '<a href="' + baseURL + 'lihat_data/' + res[i].link_file + '" target="_blank" class="badge badge-primary rounded-start" title="Lihat data"><i class="mdi mdi-file-find fs-6"></i></a>'
            trSiswa += '<a href="' + baseURL + 'download/' + res[i].link_file + '.pdf" class="badge badge-secondary" title="Unduh data"><i class="mdi mdi-cloud-download fs-6"></i></a>'
            trSiswa += '<span class="badge badge-warning" title="Edit data"><i class="mdi mdi-table-edit fs-6"></i></span>'
            trSiswa += '<span class="badge badge-danger rounded-end" title="Hapus data"><i class="mdi mdi-delete-forever fs-6"></i></span>'
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
                    trBuku += '<i class="mdi mdi-arrow-right mr-3"></i> Buku induk tahun ajaran ' + res[i].tahun_ajaran
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
</script>