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
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp; <a href="<?= base_url('dataguru'); ?>">Data Guru</a>&nbsp;/&nbsp;Biodata&nbsp;/&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg grid-margin stretch-card">

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <h4 class="card-title">Biodata guru</h4>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="<?= base_url() ?>assets/images/faces/<?= $user['image']; ?>" class="card-img-top" alt="foto-profil">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <table class="table table-striped">
                                <tr>
                                    <th style="width:20%">Nama</th>
                                    <td><strong>: </strong>Subag</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><strong>: </strong>Jagir</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td><strong>: </strong>Hunsa</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end content -->
</div>