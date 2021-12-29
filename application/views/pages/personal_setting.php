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
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Personal Setting&nbsp;/&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .jumbotron {
            /* background: url(<?= base_url('assets/images/banner.jpg'); ?>); */
            background: url(https://images.unsplash.com/photo-1434725039720-aaad6dd32dfe?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8NXx8fGVufDB8fHx8&w=1000&q=80);
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            position: relative;
            overflow: hidden;

        }

        .overlay {
            background: #00F260;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #0575E6, #00F260);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #0575E6, #00F260);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            opacity: 0.7;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            right: 0;
            left: 0;
        }

        .box {
            display: block;
            width: 170px;
            height: 170px;
            overflow: hidden;
            background-color: #bbb;
            text-align: center;
            position: relative;
            border-radius: 50%;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .over-lay {
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 85px;
            right: 0;
            bottom: 0;
        }

        .slide-up .over-lay {
            background-color: #4eed53;
            transform: translateY(100%);
            -webkit-transition: transform .4s ease-out;
            -o-transition: transform .4s ease-out;
            transition: transform .4s ease-out;
        }

        .slide-up .box:hover .over-lay {
            transform: translateY(0);
            cursor: pointer;
        }
    </style>

    <!-- content -->
    <div class="col-lg grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">Edit Profile</h4>
                </div>

                <div class=" alert alert-warning text-center msgBox" style="display: none;">
                    <p class="msg pb-0 mb-0"></p>
                </div>

                <div class="jumbotron jumbotron-fluid">
                    <div class="overlay"></div>
                    <div class="container" style="z-index: 2;">
                        <div class="d-flex justify-content-center">
                            <div class="d-flex flex-column slide-up">
                                <div class="box">
                                    <label for="formFile">
                                        <img src="<?= base_url('assets/images/faces/') . $user['image']; ?>" class="img-thumbnail" alt="profile" style="width: 170px;">
                                    </label>
                                    <label for="formFile" class="over-lay pt-3" aria-hidden="true">
                                        <i class="mdi mdi-camera"></i>
                                        Pilih gambar
                                        <input type="file" id="formFile" hidden>
                                    </label>
                                </div>
                                <div class="d-block btn btn-warning mb-0 mt-3" style="width: 170px;">Ganti foto</div>
                            </div>
                        </div>
                    </div>
                </div>


                <form class="form-tambah" method="POST" action="<?= base_url('edit_personal'); ?>">
                    <input type="text" name="id" value="<?= $user['id']; ?>" hidden>
                    <p class="card-description">
                        Informasi Guru
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="nama" value="<?= $user['nama']; ?>" required>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="gender" required="">
                                        <option value="L" <?= $user['gender'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                                        <option value="P" <?= $user['gender'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" autocomplete="FALSE" value="<?= $user['email']; ?>" required>
                                    <?= form_error('email', '<span class="text-danger text-small">', '</span>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" autocomplete="FALSE" value="<?= $user['username']; ?>" required>
                                    <?= form_error('username', '<span class="text-danger text-small">', '</span>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ubahPassModal">Ubah kata sandi</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="<?php if ($user['is_pengajar'] == 1) : ?>Pendidik <?php else : ?>Tenaga Pendidik <?php endif; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Walas</label>
                                <div class="col-sm-9 d-flex">
                                    <input type="text" class="form-control" value="<?php if ($user['is_walas'] == 1) : ?>Walas <?php else : ?>Bukan Walas <?php endif; ?>" readonly>
                                    <input type="text" class="form-control" value="<?= $kelas; ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <p class="card-description">
                            Mata Pelajaran
                        </p>
                        <div class="col-md-12">
                            <input type="text" class="form-control mapelInput" value="<?= $mapelString; ?>" name="mapel" hidden>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($mapel as $mpl) : ?>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <input class="form-check-input check ml-1" type="checkbox" value="<?= $mpl['nama_mapel']; ?>" id="<?= $mpl['kode']; ?>" <?php if (in_array($mpl['nama_mapel'], $mapelCheck)) : ?>checked<?php endif; ?>>
                                    <label class="form-check-label" for="<?= $mpl['kode']; ?>">
                                        <?= $mpl['nama_mapel']; ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="row">
                        <p class="card-description">Jenjang Kelas</p>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input ml-1" type="checkbox" value="VII" name="kelas7" id="kelas7" <?php if ($jenjang[0] != '') : ?> checked <?php endif; ?>>
                                <label class="form-check-label" for="kelas7">
                                    Kelas VII
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input ml-1" type="checkbox" value="VIII" name="kelas8" id="kelas8" <?php if ($jenjang[1] != '') : ?> checked <?php endif; ?>>
                                <label class="form-check-label" for="kelas8">
                                    Kelas VIII
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input ml-1" type="checkbox" value="IX" name="kelas9" id="kelas9" <?php if ($jenjang[2] != '') : ?> checked <?php endif; ?>>
                                <label class="form-check-label" for="kelas9">
                                    Kelas IX
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- end content -->
</div>


<!-- Modal -->
<div class="modal fade" id="ubahPassModal" tabindex="-1" aria-labelledby="ubahPassModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="forms-sample" method="POST" action="<?= base_url('edit_personal_pass'); ?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahPassModalLabel">Ubah kata sandi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password Lama</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="currentPass" placeholder="Password lama" autocomplete="FALSE">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password Baru</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="newPass" placeholder="Password baru" autocomplete="FALSE">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Ulangi Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="reNewPass" placeholder="Konfirmasi password" autocomplete="FALSE">
                            </div>
                        </div>
                    </div>
                </div>
                <input type=" text" name="user_id" value="" hidden>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Ubah kata sandi</button>
                </div>
                <input type="text" name="id" value="<?= $user['id']; ?>" hidden>
            </form>

        </div>
    </div>
</div>

<!-- flashdata -->
<?= $this->session->flashdata('msg'); ?>


<script>
    // converting array to string
    let val = []
    let allChecked = $('.check:checked')
    for (let x = 0; x < allChecked.length; x++) {
        val.push(allChecked[x].value)
    }
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
    let valWal = $('[name="walas"]').val()
    if (valWal == 1) {
        $('[name="walas_of"]').attr('disabled', false)
    }
</script>