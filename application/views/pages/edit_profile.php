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
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp; <a href="<?= base_url('dataguru'); ?>">Data Guru</a>&nbsp;/&nbsp;Edit Profile&nbsp;/&nbsp;</p>
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
                    <h4 class="card-title">Edit Profile</h4>
                </div>

                <div class=" alert alert-warning text-center msgBox" style="display: none;">
                    <p class="msg pb-0 mb-0"></p>
                </div>

                <form class="form-tambah" method="POST" action="<?= base_url('edited'); ?>">
                    <input type="text" name="id" value="<?= $edited['user']['id']; ?>" hidden>
                    <p class="card-description">
                        Informasi Guru
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" value="<?= $edited['user']['nama']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" autocomplete="FALSE" value="<?= $edited['user']['email']; ?>" required>
                                    <?= form_error('email', '<span class="text-danger text-small">', '</span>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <span class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ubahPassModal">Ubah kata sandi</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" autocomplete="FALSE" value="<?= $edited['user']['username']; ?>" required>
                                    <?= form_error('username', '<span class="text-danger text-small">', '</span>'); ?>
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
                                            <option value="<?= $r['role_id']; ?>" <?php if ($edited['user']['role_id'] == $r['role_id']) : ?> selected <?php endif; ?><?php if ($r['role_id'] == 1 && $user['role_id'] != 1) : ?>disabled<?php endif; ?>><?= $r['role_name']; ?></option>
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
                                        <option value="0" <?php if ($edited['user']['is_pengajar'] == 0) : ?>selected <?php endif; ?>>Tenaga Pendidik</option>
                                        <option value="1" <?php if ($edited['user']['is_pengajar'] == 1) : ?>selected <?php endif; ?>>Pendidik</option>
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
                                        <option value="0" <?php if ($edited['user']['is_walas'] == 0) : ?>selected <?php endif; ?>>Bukan walas</option>
                                        <option value="1" <?php if ($edited['user']['is_walas'] == 1) : ?>selected <?php endif; ?>>Walas</option>
                                    </select>

                                    <select class="form-control" name="walas_of" disabled="disabled">
                                        <option value="">-- Walas dari --</option>
                                        <?php foreach ($kelas as $kls) : ?>
                                            <optgroup label="<?= $kls['kelas']; ?>">
                                                <?php foreach ($sub_kelas as $sub) : ?>
                                                    <?php if ($sub['child'] == $kls['id']) : ?>
                                                        <option value="<?= $sub['id']; ?>" <?php if ($edited['walas']['kelas_id'] == $sub['id']) : ?>selected <?php endif; ?>><?= $sub['kelas']; ?></option>
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
                            <input type="text" class="form-control mapelInput" value="<?= $edited['mapel']['kode_mapel']; ?>" name="mapel" hidden>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($mapel as $mpl) : ?>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <input class="form-check-input check ml-1" type="checkbox" value="<?= $mpl['nama_mapel']; ?>" id="<?= $mpl['kode']; ?>" <?php if (in_array($mpl['nama_mapel'], $edited['mapelArr'])) : ?>checked<?php endif; ?>>
                                    <label class="form-check-label" for="<?= $mpl['kode']; ?>">
                                        <?= $mpl['nama_mapel']; ?>
                                    </label>
                                </div>
                            </div>
                        <?php endforeach; ?>
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
            <form class="forms-sample" method="POST" action="<?= base_url('edit_pass'); ?>">
                <input type="text" name="id" value="<?= $edited['user']['id']; ?>" hidden>
                <input type="text" name="username" value="<?= $edited['user']['username']; ?>" hidden>
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
                <input type=" text" name="user_id" value="<?= $edited['user']['id']; ?>" hidden>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Ubah kata sandi</button>
                </div>

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