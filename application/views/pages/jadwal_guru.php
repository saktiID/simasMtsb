<div class="content-wrapper">

    <!-- welcome -->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="mr-md-3 mr-xl-5">
                        <h2>Selamat datang,</h2>
                        <p class="mb-md-0"><?= $user['nama']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end welcome -->

    <!-- breadcrumb -->
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                    <div class="d-flex">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Jadwal Guru&nbsp;/&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb -->


    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body dashboard-tabs p-0">
                    <ul class="nav nav-tabs px-4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="set_jadwal_tab" data-toggle="tab" href="#setjadwal" role="tab" aria-controls="set_jadwal" aria-selected="true">Pengaturan Dadwal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="jadwal_guru_tab" data-toggle="tab" href="#jadwalguru" role="tab" aria-controls="jadwal_guru" aria-selected="false">Jadwal Jam Guru</a>
                        </li>
                    </ul>
                    <div class="tab-content py-0 px-0">
                        <div class="tab-pane fade show active" id="set_jadwal" role="tabpanel" aria-labelledby="set_jadwal_tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">


                            </div>
                        </div>
                        <div class="tab-pane fade" id="jadwal_guru" role="tabpanel" aria-labelledby="jadwal_guru_tab">
                            <div class="d-flex flex-wrap justify-content-xl-between">


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- content-wrapper ends -->