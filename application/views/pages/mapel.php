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
                </div>

                <div class="table-responsive">
                    <table class="table table-hover" id="table">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Mata Pelajaran</th>
                                <td>Kode Mapel</td>
                                <td>Urutan</td>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i =  1; ?>
                            <?php foreach ($mapel as $mpl) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td class="d-flex justify-content-between">
                                        <p><?= $mpl['nama_mapel']; ?></p>

                                    </td>
                                    <td><?= $mpl['kode']; ?></td>
                                    <td><?= $mpl['urut']; ?></td>
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

<!-- flashdata -->
<?= $this->session->flashdata('msg'); ?>