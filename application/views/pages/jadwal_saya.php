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
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Jadwal Saya&nbsp;/&nbsp;</p>
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
                    <h4 class="card-title">Jadwal Saya</h4>
                </div>

                <form id="jadwalForm" method="POST">
                    <div class="table-responsive table-editable">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Jam ke-</th>
                                    <th>Waktu</th>
                                    <th>Senin</th>
                                    <th>Selasa</th>
                                    <th>Rabu</th>
                                    <th>Kamis</th>
                                    <th>Jum'at</th>
                                </tr>
                            </thead>
                            <tbody class="jadwal">
                                <?php foreach ($jadwal_jam as $jdwl_jm) : ?>
                                    <?php if ($jdwl_jm['kegiatan'] != 'KBM') : ?>
                                        <tr class="bg-secondary text-white">
                                            <td><?= $jdwl_jm['jam_ke']; ?></td>
                                            <td><?= $jdwl_jm['waktu']; ?></td>
                                            <td colspan="5" class="text-center"><?= $jdwl_jm['kegiatan']; ?></td>
                                        </tr>
                                    <?php else : ?>
                                        <tr>
                                            <td><?= $jdwl_jm['jam_ke']; ?></td>
                                            <td><?= $jdwl_jm['waktu']; ?></td>

                                            <!-- senin -->
                                            <td>
                                                <select name="senin_kelas_<?= $jdwl_jm['jam_ke']; ?>" class="senin_kelas" data-jam-id="<?= $jdwl_jm['id']; ?>">
                                                    <option></option>
                                                    <?php foreach ($main_kelas as $kls) : ?>
                                                        <optgroup label="<?= $kls['kelas']; ?>">
                                                            <?php foreach ($sub_kelas as $sub) : ?>
                                                                <?php if ($sub['child'] == $kls['id']) : ?>
                                                                    <?php $isi = explode(",", $jdwl_jm['senin']); ?>
                                                                    <option <?php if ($isi[0] == $sub['kelas']) : ?> selected <?php endif; ?>><?= $sub['kelas']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </optgroup>
                                                    <?php endforeach; ?>
                                                </select>

                                                <select name="senin_mapel_<?= $jdwl_jm['jam_ke']; ?>" class="senin_mapel">
                                                    <option></option>
                                                    <?php foreach ($mapelCheck as $m) : ?>
                                                        <?php $isi2 = explode(",", $jdwl_jm['senin']); ?>
                                                        <?php if (!empty($isi2[1])) : ?>
                                                            <option <?php if ($isi2[1] == $m) : ?> selected <?php endif; ?>><?= $m; ?></option>
                                                        <?php else : ?>
                                                            <option><?= $m; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>

                                            <!-- selasa -->
                                            <td>
                                                <select name="selasa_kelas_<?= $jdwl_jm['jam_ke']; ?>" class="selasa_kelas" data-jam-id="<?= $jdwl_jm['id']; ?>">
                                                    <option></option>
                                                    <?php foreach ($main_kelas as $kls) : ?>
                                                        <optgroup label="<?= $kls['kelas']; ?>">
                                                            <?php foreach ($sub_kelas as $sub) : ?>
                                                                <?php if ($sub['child'] == $kls['id']) : ?>
                                                                    <?php $isi = explode(",", $jdwl_jm['selasa']); ?>
                                                                    <option <?php if ($isi[0] == $sub['kelas']) : ?> selected <?php endif; ?>><?= $sub['kelas']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </optgroup>
                                                    <?php endforeach; ?>
                                                </select>

                                                <select name="selasa_mapel_<?= $jdwl_jm['jam_ke']; ?>" class="selasa_mapel">
                                                    <option></option>
                                                    <?php foreach ($mapelCheck as $m) : ?>
                                                        <?php $isi2 = explode(",", $jdwl_jm['selasa']); ?>
                                                        <?php if (!empty($isi2[1])) : ?>
                                                            <option <?php if ($isi2[1] == $m) : ?> selected <?php endif; ?>><?= $m; ?></option>
                                                        <?php else : ?>
                                                            <option><?= $m; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>

                                            <!-- rabu -->
                                            <td>
                                                <select name="rabu_kelas_<?= $jdwl_jm['jam_ke']; ?>" class="rabu_kelas" data-jam-id="<?= $jdwl_jm['id']; ?>">
                                                    <option></option>
                                                    <?php foreach ($main_kelas as $kls) : ?>
                                                        <optgroup label="<?= $kls['kelas']; ?>">
                                                            <?php foreach ($sub_kelas as $sub) : ?>
                                                                <?php if ($sub['child'] == $kls['id']) : ?>
                                                                    <?php $isi = explode(",", $jdwl_jm['rabu']); ?>
                                                                    <option <?php if ($isi[0] == $sub['kelas']) : ?> selected <?php endif; ?>><?= $sub['kelas']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </optgroup>
                                                    <?php endforeach; ?>
                                                </select>

                                                <select name="rabu_mapel_<?= $jdwl_jm['jam_ke']; ?>" class="rabu_mapel">
                                                    <option></option>
                                                    <?php foreach ($mapelCheck as $m) : ?>
                                                        <?php $isi2 = explode(",", $jdwl_jm['rabu']); ?>
                                                        <?php if (!empty($isi2[1])) : ?>
                                                            <option <?php if ($isi2[1] == $m) : ?> selected <?php endif; ?>><?= $m; ?></option>
                                                        <?php else : ?>
                                                            <option><?= $m; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>

                                            <!-- kamis -->
                                            <td>
                                                <select name="kamis_kelas_<?= $jdwl_jm['jam_ke']; ?>" class="kamis_kelas" data-jam-id="<?= $jdwl_jm['id']; ?>">
                                                    <option></option>
                                                    <?php foreach ($main_kelas as $kls) : ?>
                                                        <optgroup label="<?= $kls['kelas']; ?>">
                                                            <?php foreach ($sub_kelas as $sub) : ?>
                                                                <?php if ($sub['child'] == $kls['id']) : ?>
                                                                    <?php $isi = explode(",", $jdwl_jm['kamis']); ?>
                                                                    <option <?php if ($isi[0] == $sub['kelas']) : ?> selected <?php endif; ?>><?= $sub['kelas']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </optgroup>
                                                    <?php endforeach; ?>
                                                </select>

                                                <select name="kamis_mapel_<?= $jdwl_jm['jam_ke']; ?>" class="kamis_mapel">
                                                    <option></option>
                                                    <?php foreach ($mapelCheck as $m) : ?>
                                                        <?php $isi2 = explode(",", $jdwl_jm['kamis']); ?>
                                                        <?php if (!empty($isi2[1])) : ?>
                                                            <option <?php if ($isi2[1] == $m) : ?> selected <?php endif; ?>><?= $m; ?></option>
                                                        <?php else : ?>
                                                            <option><?= $m; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>

                                            <!-- jumat -->
                                            <td>
                                                <select name="jumat_kelas_<?= $jdwl_jm['jam_ke']; ?>" class="jumat_kelas" data-jam-id="<?= $jdwl_jm['id']; ?>">
                                                    <option></option>
                                                    <?php foreach ($main_kelas as $kls) : ?>
                                                        <optgroup label="<?= $kls['kelas']; ?>">
                                                            <?php foreach ($sub_kelas as $sub) : ?>
                                                                <?php if ($sub['child'] == $kls['id']) : ?>
                                                                    <?php $isi = explode(",", $jdwl_jm['jumat']); ?>
                                                                    <option <?php if ($isi[0] == $sub['kelas']) : ?> selected <?php endif; ?>><?= $sub['kelas']; ?></option>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        </optgroup>
                                                    <?php endforeach; ?>
                                                </select>

                                                <select name="jumat_mapel_<?= $jdwl_jm['jam_ke']; ?>" class="jumat_mapel">
                                                    <option></option>
                                                    <?php foreach ($mapelCheck as $m) : ?>
                                                        <?php $isi2 = explode(",", $jdwl_jm['jumat']); ?>
                                                        <?php if (!empty($isi2[1])) : ?>
                                                            <option <?php if ($isi2[1] == $m) : ?> selected <?php endif; ?>><?= $m; ?></option>
                                                        <?php else : ?>
                                                            <option><?= $m; ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </select>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button type="submit" class="btn btn-success btn-md">Simpan</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- end content -->
</div>

<script>
    $('#jadwalForm').on('submit', (e) => {
        e.preventDefault()
        let senin_kelas = $('select.senin_kelas')
        let senin_mapel = $('select.senin_mapel')
        let selasa_kelas = $('select.selasa_kelas')
        let selasa_mapel = $('select.selasa_mapel')
        let rabu_kelas = $('select.rabu_kelas')
        let rabu_mapel = $('select.rabu_mapel')
        let kamis_kelas = $('select.kamis_kelas')
        let kamis_mapel = $('select.kamis_mapel')
        let jumat_kelas = $('select.jumat_kelas')
        let jumat_mapel = $('select.jumat_mapel')

        // array senin
        let senin_all = []
        for (let i = 0; i < senin_kelas.length; i++) {
            senin_all.push(senin_kelas[i].value + '_' + senin_mapel[i].value + '_' + senin_kelas[i].getAttribute('data-jam-id'))
        }

        // array selasa
        let selasa_all = []
        for (let i = 0; i < selasa_kelas.length; i++) {
            selasa_all.push(selasa_kelas[i].value + '_' + selasa_mapel[i].value + '_' + selasa_kelas[i].getAttribute('data-jam-id'))
        }

        // array rabu
        let rabu_all = []
        for (let i = 0; i < rabu_kelas.length; i++) {
            rabu_all.push(rabu_kelas[i].value + '_' + rabu_mapel[i].value + '_' + rabu_kelas[i].getAttribute('data-jam-id'))
        }

        // array kamis
        let kamis_all = []
        for (let i = 0; i < kamis_kelas.length; i++) {
            kamis_all.push(kamis_kelas[i].value + '_' + kamis_mapel[i].value + '_' + kamis_kelas[i].getAttribute('data-jam-id'))
        }

        // array jumat
        let jumat_all = []
        for (let i = 0; i < jumat_kelas.length; i++) {
            jumat_all.push(jumat_kelas[i].value + '_' + jumat_mapel[i].value + '_' + jumat_kelas[i].getAttribute('data-jam-id'))
        }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: '<?= base_url('simpan_jadwal'); ?>',
            data: 'senin_all=' + senin_all + '&selasa_all=' + selasa_all + '&rabu_all=' + rabu_all + '&kamis_all=' + kamis_all + '&jumat_all=' + jumat_all,
            success: function(res) {
                console.log(res)
                if (res == 'success') {
                    Swal.fire({
                        title: "Hurray!",
                        text: "Berhasil simpan jadwal",
                        icon: "success",
                    })
                }
            },
            error: function(err) {
                console.log(err.responseText)
                Swal.fire({
                    title: "Ups!",
                    text: "Gagal simpan jadwal",
                    icon: "error",
                    footer: '<small>Pergi ke halaman lain lalu coba kembali ke halaman ini</small>',
                })
            }
        })
    })
</script>