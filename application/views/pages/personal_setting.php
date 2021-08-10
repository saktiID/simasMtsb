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

                <form class="form-tambah" method="POST" action="<?= base_url('edit_personal'); ?>">
                    <input type="text" name="id" value="<?= $user['id']; ?>" hidden>
                    <p class="card-description">
                        Informasi Guru
                    </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nama" value="<?= $user['nama']; ?>" required>
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
                    <div class="row mt-3">
                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <div class="col-lg grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">Jadwal Guru</h4>
                </div>

                <div class=" alert alert-warning text-center msgBox" style="display: none;">
                    <p class="msg pb-0 mb-0"></p>
                </div>

                <div class="btn btn-primary save">SIMPAN</div>

                <div class="table-responsive table-editable">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td>Jam ke-</td>
                                <td>Waktu</td>
                                <td>Senin</td>
                                <td>Selasa</td>
                                <td>Rabu</td>
                                <td>Kamis</td>
                                <td>Jum'at</td>
                            </tr>
                        </thead>
                        <tbody class="jadwal">
                            <tr class="bg-secondary">
                                <td>0</td>
                                <td contenteditable>07.30-08.10</td>
                                <td colspan="5" class="text-center">PEMBIASAAN PAGI</td>
                            </tr>

                            <tr>
                                <td><?= '1'; ?></td>
                                <td>
                                    07.30-08.10
                                </td>
                                <td>
                                    <select>
                                        <option></option>
                                        <?php foreach ($main_kelas as $kls) : ?>
                                            <optgroup label="<?= $kls['kelas']; ?>">
                                                <?php foreach ($sub_kelas as $sub) : ?>
                                                    <?php if ($sub['child'] == $kls['id']) : ?>
                                                        <option><?= $sub['kelas']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </optgroup>
                                        <?php endforeach; ?>
                                    </select>
                                    <select>
                                        <option></option>
                                        <?php foreach ($mapelCheck as $m) : ?>
                                            <option><?= $m; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>


                            </tr>
                            <tr class=" bg-secondary"">
                                <td>3</td>
                                <td contenteditable>09.30-09.50</td>
                                <td colspan=" 5" class="text-center">BREAKTIME</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
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
    // table value
    let jadwal = $('.jadwal').html()

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