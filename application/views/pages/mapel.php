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
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp; Mata Pelajaran&nbsp;/&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- content -->
    <div class="col-lg grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">Mata Pelajaran</h4>
                    <span class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambahMapelModal">
                        <p class="mb-0 btnTmbhMapel">Tambah mapel</p>
                    </span>
                </div>

                <div class="modal fade" id="tambahMapelModal" tabindex="-1" aria-labelledby="tambahMapelModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="tambahMapelModalLabel">Tambah Mapel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="forms-sample">
                                    <div class="form-group row">
                                        <label for="namaMapel" class="col-sm-3 col-form-label">Nama Mapel</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="namaMapel" name="namaMapel" placeholder="Isi nama mapel">
                                            <small class="text-danger" style="display: none;">Nama mapel harus diisi!</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary closeModal" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-primary tmbhMapel">Tambah Mapel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="hapusMapelModal" tabindex="-1" aria-labelledby="hapusMapelModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusMapelModalLabel">Menghapus Mapel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Anda akan menghapus mapel?
                                <p class="fw-bold mapelHapus"></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary closeModal" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-danger btnHapus" data-link="">Hapus Mapel</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="showPengampuModal" tabindex="-1" aria-labelledby="showPengampuModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="showPengampuModalLabel">Menghapus Mapel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Mapel ini sedang digunakan oleh:
                                <ol class="list-pengampu"></ol>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary closeModal" data-bs-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-danger tetapHapus" data-id="">Tetap Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="9%">No. Urut</th>
                                <th width="9%">Kode</th>
                                <th>Mata Pelajaran</th>
                            </tr>
                        </thead>

                        <style>
                            .ui-state-highlight {
                                height: 1.5em;
                                line-height: 1.2em;
                                border: 1px solid #bcbcbc;
                                background: #efffd5;
                            }
                        </style>
                        <tbody id="sortable">
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>


    <!-- end content -->
</div>

<!-- flashdata -->
<?= $this->session->flashdata('msg'); ?>

<script>
    $(document).ready(function() {
        $('#sortable').sortable({
            placeholder: "ui-state-highlight",
            update: function() {
                $(this).children().each(function(index) {
                    $(this).attr('data-urut', (index + 1)).addClass('updated')
                })
                simpanPosisi()
                Swal.fire({
                    title: "Hurray!",
                    text: "Berhasil mengurutkan mapel",
                    icon: "success",
                })
                tampilMapel()
            }
        })
        $('#sortable').disableSelection()
        tampilMapel()
    })

    function tampilMapel() {
        $.ajax({
            url: '<?= base_url('mapel/tampil_mapel'); ?>',
            method: 'POST',
            dataType: 'json',
            success: function(res) {
                let trMapel = ''
                for (let i = 0; i < Object.keys(res).length; i++) {
                    trMapel += '<tr title="Seret dan jatuhkan untuk mengurutkan mapel"' +
                        'style="cursor: move;" data-id=' + res[i].id + ' data-urut=' + res[i].urut + '>' +
                        '<td>' + res[i].urut + '</td>' +
                        '<td>' + res[i].kode + '</td>' +
                        '<td>' +
                        '<span class="d-flex align-items-center">' +
                        '<span class="w-100 d-flex align-items-center">' +
                        '<i class="mdi mdi-swap-vertical text-secondary"></i>' +
                        '<p class="mb-0 pl-3 id' + res[i].id + '">' + res[i].nama_mapel + '</p>' +
                        '</span>' +
                        '<span class="flex-shrink-1 btn btn-danger btn-sm p-2" onclick="hapusMapel(' + res[i].id + ')" title="Hapus mapel"' +
                        'data-bs-toggle="modal" data-bs-target="#hapusMapelModal">' +
                        '<i class="mdi mdi-delete fs-6"></i></span>' +
                        '</span>' +
                        '</td>' +
                        '</tr>'
                }
                $('#sortable').html(trMapel)
            },
            error: function(err) {
                console.log(err.responseText)
            }
        })
    }

    function simpanPosisi() {
        let urut = []
        $('.updated').each(function() {
            urut.push([$(this).attr('data-id'), $(this).attr('data-urut')])
        })

        $.ajax({
            url: '<?= base_url('mapel/simpan_posisi'); ?>',
            method: 'POST',
            dataType: 'text',
            data: {
                urutan: urut,
            },
            success: function(res) {
                if (res != '') {
                    console.log(res)
                }
            }
        })
    }

    function hapusMapel(id) {
        let mapel = $('.id' + id + '')[0].innerHTML
        $('p.mapelHapus').html('- ' + mapel)
        $('.btnHapus').attr('data-link', id)
    }

    function hapus_mapel(res) {
        $.ajax({
            url: '<?= base_url('mapel/hapus_mapel_attemp'); ?>',
            method: 'POST',
            dataType: 'text',
            data: {
                id: res,
            },
            success: function(response) {
                tampilMapel()
                $('.closeModal').click()
                Swal.fire({
                    title: "Hurray!",
                    text: "Berhasil menghapus mapel",
                    icon: "success",
                })
            },
            error: function(err) {
                console.log(err.responseText)
            }

        })
    }

    $('.btnHapus').click(function() {
        let id = $('.btnHapus').attr('data-link')
        $.ajax({
            url: '<?= base_url('mapel/hapus_mapel'); ?>',
            method: 'POST',
            dataType: 'json',
            data: {
                id: id,
            },
            success: function(res) {
                if (res == id) {
                    hapus_mapel(res)
                } else {
                    $('.closeModal').click()
                    let li = ''
                    for (let i = 0; i < Object.keys(res).length; i++) {
                        li += '<li>' +
                            res[i] +
                            '</li>'
                    }
                    $('ol.list-pengampu').html(li)
                    $('#showPengampuModal').modal('show')
                    $('.tetapHapus').attr('data-id', id);
                }
            },
            error: function(err) {
                console.log(err.responseText)
            }
        })
    })

    $('.tetapHapus').click(function() {
        let res = $('.tetapHapus').attr('data-id')
        $('.closeModal').click()
        hapus_mapel(res)
    })

    $('.tmbhMapel').click(function() {
        let namaMapel = $('[name="namaMapel"]').val()
        if (namaMapel === '') {
            $('small.text-danger').css('display', 'block')
            setTimeout(() => {
                $('small.text-danger').css('display', 'none')
            }, 3000)
        } else {
            $.ajax({
                url: '<?= base_url('mapel/insert_mapel'); ?>',
                method: 'POST',
                dataType: 'text',
                data: {
                    namaMapel: namaMapel,
                },
                success: function(res) {
                    if (res) {
                        $('[name="namaMapel"]').val('')
                        $('.closeModal').click()
                        Swal.fire({
                            title: "Hurray!",
                            text: "Berhasil menambahkan mapel",
                            icon: "success",
                        })
                        tampilMapel()
                    }
                },
                error: function(err) {
                    console.log(err.responseText)
                }
            })
        }
    })
</script>