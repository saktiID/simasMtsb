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
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Data Guru&nbsp;/&nbsp;</p>
                    </div>
                </div>
                <div class="d-flex align-items-end flex-wrap">
                    <div class="d-flex">
                        <button type="button" class="btn btn-primary btn-sm tambahBtn">
                            <i class="mdi mdi-account-plus mr-2"></i>Tambah guru
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- styling tambah card -->
    <style>
        .data-guru {
            transition-property: display;
            transition-duration: .5s;
            transition-timing-function: ease-in-out;
        }

        .tambahCard {
            transition-property: display;
            transition-duration: .5s;
            transition-timing-function: ease-in-out;
        }

        .tambahCard.active {
            display: block !important;
        }
    </style>


    <!-- content -->
    <div class="col-lg grid-margin stretch-card tambahCard" style="display: none;">
        <!-- tambah guru card -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">Tambah Guru</h4>
                    <button type="button" class="btn-close" aria-label="Close"></button>
                </div>

                <div class=" alert alert-warning text-center msgBox" style="display: none;">
                    <p class="msg pb-0 mb-0"></p>
                </div>

                <form class="form-tambah" onsubmit="return false">
                    <p class="card-description">
                        Informasi Guru
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="nama" required>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="gender" required="">
                                        <option value="L" selected>Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" autocomplete="FALSE" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password1" autocomplete="FALSE" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ulangi Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="password2" autocomplete="FALSE" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" autocomplete="FALSE" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="role_id" required>
                                        <option value="">-- Pilih Role --</option>
                                        <?php foreach ($role as $r) : ?>
                                            <option value="<?= $r['role_id']; ?>" <?php if ($r['role_id'] == 1 && $user['role_id'] != 1) : ?>disabled<?php endif; ?>><?= $r['role_name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="is_pengajar" required>
                                        <option value="">-- Pilih Ketenagaan --</option>
                                        <option value="0">Tenaga Pendidik</option>
                                        <option value="1">Pendidik</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Walas</label>
                                <div class="col-sm-9 d-flex">
                                    <select class="form-control" name="walas" required onchange="walasTgr()">
                                        <option value="">-- Walas --</option>
                                        <option value="0">Bukan walas</option>
                                        <option value="1">Walas</option>
                                    </select>

                                    <select class="form-control" name="walas_of" disabled="disabled">
                                        <option value="">-- Walas dari --</option>
                                        <?php foreach ($kelas as $kls) : ?>
                                            <optgroup label="<?= $kls['kelas']; ?>">
                                                <?php foreach ($sub_kelas as $sub) : ?>
                                                    <?php if ($sub['child'] == $kls['id']) : ?>
                                                        <option value="<?= $sub['id']; ?>"><?= $sub['kelas']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </optgroup>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="card-description">
                            Mata Pelajaran
                        </p>
                        <div class="col-md-12">
                            <input type="text" class="form-control mapelInput" hidden name="mapel">
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($mapel as $mpl) : ?>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input check ml-1" type="checkbox" value="<?= $mpl['nama_mapel']; ?>" id="<?= $mpl['kode']; ?>">
                                    <label class="form-check-label" for="<?= $mpl['kode']; ?>">
                                        <?= $mpl['nama_mapel']; ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row mt-3">
                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" id="tambahGuru">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- css refresh -->
    <style>
        .spin {
            display: inline-block;
            animation: spinner .5s ease-in-out;
        }

        @keyframes spinner {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(359deg);
            }
        }
    </style>

    <div class="col-lg grid-margin stretch-card data-guru">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">Data Guru</h4>
                    <span class="btn btn-light btn-sm" onclick="tampilGuru()">
                        <i class="mdi mdi-refresh"></i> Refresh
                    </span>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover" id="table">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i =  1; ?>
                            <?php foreach ($guru as $g) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td class="d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <span><img src="<?= base_url('assets/images/faces/') . $g['image']; ?>" alt="profile"></span>
                                            <p class="pl-3 m-0"><?= $g['nama']; ?></p>
                                        </div>
                                        <span class="btn-group" role="group">
                                            <a href="<?= base_url('edit/') . $g['username']; ?>" class="badge badge-primary fs-6 rounded-start p-2" title="Edit data guru"><i class="mdi mdi-settings"></i></a>
                                            <a href="<?= base_url('delete/') . $g['id']; ?>" class="badge badge-danger fs-6 delBtn rounded-end p-2" title="Hapus data guru"><i class="mdi mdi-delete"></i></a>
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


<script>
    // trigger add
    $('.tambahBtn').on('click', () => {
        $('.tambahCard').toggle('active')
        reset()
    })
    $('.btn-close').on('click', () => {
        $('.tambahCard').toggle('active')
        reset()
    })

    // delete data
    $('.delBtn').on('click', (e) => {
        e.preventDefault()
        Swal.fire({
            title: 'Anda yakin?',
            text: "Anda akan menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data ini!'
        }).then((result) => {
            if (result.value) {
                let href = e.target['href']
                $.ajax({
                    type: 'POST',
                    url: href,
                    dataType: 'json',
                    success: function(res) {
                        Swal.fire({
                            title: "Berhasil!",
                            text: "Berhasil hapus data",
                            icon: "success",
                        })
                        // e.target.parentElement.parentElement.parentNode.remove()
                        setTimeout(() => {
                            location.reload()
                        }, 1000)
                    },
                    error: function(err) {
                        console.log(err.responseText)
                    }
                })

            }
        })
    })

    /** script form */

    // converting array to string
    let val = []
    $('.check').on('click', function(e) {
        if (e.target.checked) {
            val.push(e.target.value)
            val.toString()
            $('.mapelInput').val(val)
        } else {
            let i = val.indexOf(e.target.value)
            val.splice(i, 1)
            val.toString()
            $('.mapelInput').val(val)
        }
    })

    // trigger walas
    function walasTgr() {
        let walas = $('[name="walas"]').val()
        if (walas == 0) {
            $('[name="walas_of"]').attr('disabled', 'disabled')
            $('[name="walas_of"]').val('')
        } else {
            $('[name="walas_of"]').attr('disabled', false)
        }
    }

    // event add user
    $('#tambahGuru').on('click', () => {
        let nama = $('[name="nama"]').val()
        let gender = $('[name="gender"]').val()
        let email = $('[name="email"]').val()
        let username = $('[name="username"]')
        let role_id = $('[name="role_id"]').val()
        let password1 = $('[name="password1"]')
        let password2 = $('[name="password2"]')
        let mapel = $('[name="mapel"]').val()
        let is_pengajar = $('[name="is_pengajar"]').val()
        let is_walas = $('[name="is_walas"]').val()
        let walas_of = $('[name="walas_of"]').val()

        if (username.val().length > 4) {
            if (password1.val().length > 5) {
                if (password1.val() === password2.val()) {
                    $.ajax({
                        type: 'POST',
                        data: 'nama=' + nama + '&gender=' + gender + '&email=' + email + '&username=' + username.val() + '&role_id=' + role_id + '&password1=' + password1.val() + '&mapel=' + mapel + '&is_pengajar=' + is_pengajar + '&is_walas=' + is_walas + '&walas_of=' + walas_of,
                        url: '<?= base_url('dataguru/tambahguru'); ?>',
                        dataType: 'json',
                        success: function(res) {
                            $(window).scrollTop(0)
                            if (res.psn == 'Success') {
                                $('.btn-close').click()
                                Swal.fire({
                                    title: "Berhasil!",
                                    text: "Berhasil tambah data",
                                    icon: "success",
                                })
                                setTimeout(() => {
                                    location.reload()
                                }, 1000)
                                // tampilGuru()
                            } else {
                                $(window).scrollTop(0);
                                setTimeout(() => {
                                    $('.msgBox').css('display', 'block')
                                    $('.msg').html(res.psn)
                                }, 500)
                            }
                        },
                        error: function(err) {
                            console.log(err.responseText)
                        }
                    })
                } else {
                    $(window).scrollTop(0);
                    setTimeout(() => {
                        $('.msgBox').css('display', 'block')
                        $('.msg').html('Password tidak sama!')
                    }, 500)
                }
            } else {
                $(window).scrollTop(0);
                setTimeout(() => {
                    $('.msgBox').css('display', 'block')
                    $('.msg').html('Password terlalu sedikit!')
                }, 500)
            }
        } else {
            $(window).scrollTop(0);
            setTimeout(() => {
                $('.msgBox').css('display', 'block')
                $('.msg').html('Username terlalu sedikit!')
            }, 500)
        }
    })

    // reset form
    function reset() {
        $('.form-tambah')[0].reset()
        $('.msgBox').css('display', 'none')
    }

    // showing data
    function tampilGuru() {
        $('.mdi-refresh').addClass('spin')
        setTimeout(() => {
            $('.mdi-refresh').removeClass('spin')
        }, 500)
    }
</script>