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
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Admin ECI&nbsp;/&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb -->

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-level-tab" data-bs-toggle="tab" data-bs-target="#nav-level" type="button" role="tab" aria-controls="nav-level" aria-selected="false">Level ECI</button>

            <button class="nav-link" id="nav-nilai-tab" data-bs-toggle="tab" data-bs-target="#nav-level-kelas" type="button" role="tab" aria-controls="nav-level-kelas" aria-selected="true">Level ECI Per Kelas</button>

            <button class="nav-link" id="nav-nilai-tab" data-bs-toggle="tab" data-bs-target="#nav-nilai" type="button" role="tab" aria-controls="nav-nilai" aria-selected="true">Nilai ECI</button>

            <button class="nav-link" id="nav-riwayat-tab" data-bs-toggle="tab" data-bs-target="#nav-riwayat" type="button" role="tab" aria-controls="nav-riwayat" aria-selected="false">Riwayat</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <!-- wrapper nilai ECI -->
        <div class="tab-pane fade" id="nav-nilai" role="tabpanel" aria-labelledby="nav-nilai-tab">

            <!-- content Nilai ECI -->
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Cari Kelas</h4>
                            <form class="cari">
                                <div class="row">
                                    <!-- input tahun ajar -->
                                    <div class="col mb-3">
                                        <select class="form-select" name="tahun_ajaran" required>
                                            <option selected value="">-- Tahun ajaran --</option>
                                            <option value="2022-2023">2022-2023</option>
                                            <option value="2023-2024">2023-2024</option>
                                            <option value="2024-2025">2024-2025</option>
                                        </select>
                                    </div>
                                    <!-- input semester -->
                                    <div class="col mb-3">
                                        <select class="form-select" name="semester" required>
                                            <option selected value="">-- Semester --</option>
                                            <option value="1">Ganjil</option>
                                            <option value="2">Genap</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- input jenis ujian -->
                                    <div class="col mb-3">
                                        <select class="form-select" name="bulan" required>
                                            <option selected value="">-- Bulan --</option>
                                            <option>January</option>
                                            <option>February</option>
                                            <option>March</option>
                                            <option>April</option>
                                            <option>May</option>
                                            <option>June</option>
                                            <option>July</option>
                                            <option>August</option>
                                            <option>September</option>
                                            <option>October</option>
                                            <option>November</option>
                                            <option>December</option>
                                        </select>
                                    </div>
                                    <!-- input kelas -->
                                    <div class="col mb-3">
                                        <select class="form-select" name="kelas_id" required>
                                            <option selected value="">-- Kelas --</option>
                                            <?php foreach ($kelas as $kls) : ?>
                                                <optgroup label="<?= $kls['kelas'] ?>">
                                                    <?php foreach ($sub_kelas as $sub) : ?>
                                                        <?php if ($sub['child'] == $kls['id']) : ?>
                                                            <option value="<?= $sub['id']; ?>"><?= $sub['kelas'] ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </optgroup>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- input submit -->
                                    <div class="col mb-3 d-flex justify-content-end">
                                        <button class="btn btn-success download">Download Template</button>
                                        <button type="submit" class="btn btn-primary ml-2">Cari</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Upload Nilai</h4>
                            <form class="upload" enctype="multipart/form-data">
                                <div class="row">
                                    <!-- input tahun ajar -->
                                    <div class="col mb-3">
                                        <select class="form-select" name="tahun_ajaran">
                                            <option selected value="">-- Tahun ajaran --</option>
                                            <option value="2022-2023">2022-2023</option>
                                            <option value="2023-2024">2023-2024</option>
                                            <option value="2024-2025">2024-2025</option>
                                        </select>
                                    </div>
                                    <!-- input semester -->
                                    <div class="col mb-3">
                                        <select class="form-select" name="semester">
                                            <option selected value="">-- Semester --</option>
                                            <option value="1">Ganjil</option>
                                            <option value="2">Genap</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- input jenis ujian -->
                                    <div class="col mb-3">
                                        <select class="form-select" name="bulan">
                                            <option selected value="">-- Bulan --</option>
                                            <option>January</option>
                                            <option>February</option>
                                            <option>March</option>
                                            <option>April</option>
                                            <option>May</option>
                                            <option>June</option>
                                            <option>July</option>
                                            <option>August</option>
                                            <option>September</option>
                                            <option>October</option>
                                            <option>November</option>
                                            <option>December</option>
                                        </select>
                                    </div>
                                    <!-- input kelas -->
                                    <div class="col mb-3">
                                        <select class="form-select" name="kelas_id">
                                            <option selected value="">-- Kelas --</option>
                                            <?php foreach ($kelas as $kls) : ?>
                                                <optgroup label="<?= $kls['kelas'] ?>">
                                                    <?php foreach ($sub_kelas as $sub) : ?>
                                                        <?php if ($sub['child'] == $kls['id']) : ?>
                                                            <option value="<?= $sub['id']; ?>"><?= $sub['kelas'] ?></option>
                                                        <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </optgroup>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- input file -->
                                    <div class="col mb-3">
                                        <input class="form-control" name="nilaiXls" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" type="file" id="formFile" required>
                                    </div>
                                    <!-- input submit -->
                                    <div class="col mb-3 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary ml-2">Upload</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- card table data nilai eci siswa -->
            <div class="row">
                <div class="col-md grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" id="nilai">Nilai ECI siswa</h4>
                            <div class="d-flex justify-content-between align-items-baseline">
                                <p class="card-description desc">Belum ada kelas yang dipilih!</p>
                                <span class="btn btn-warning" id="kunci_nilai" style="display: none;"><i class="mdi mdi-lock-open"></i> Kunci nilai</span>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover" style="width: 100%;" id="tableEci">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="7%">No</th>
                                            <th width="33%">Nama</th>
                                            <th width="10%">Listening</th>
                                            <th width="10%">Reading</th>
                                            <th width="10%">Speaking</th>
                                            <th width="10%">Writing</th>
                                            <th width="10%">Describe / Vocab</th>
                                            <th width="10%">Print</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content Nilai ECI -->

        </div>
        <!-- end wrapper nilai ECI -->

        <!-- wrapper level ECI -->
        <div class="tab-pane fade show active" id="nav-level" role="tabpanel" aria-labelledby="nav-level-tab">
            <!-- level -->
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Level</h4>

                            <div class="row">
                                <div class="col-md-3 grid-margin stretch-card d-flex justify-content-center">
                                    <div class="level">
                                        <div class="d-flex flex-column">
                                            <img width="125" height="125" src="<?= base_url('assets/images/expert.png'); ?>" alt="expert" data-toggle="dropdown" style="cursor:pointer;">
                                            <button type="button" class="btn btn-outline-dark mt-2" data-toggle="dropdown">Expert</button>
                                            <div class="dropdown-menu">
                                                <a href="<?= base_url(''); ?>" class="dropdown-item">7th Grade</a>
                                                <a href="" class="dropdown-item">8th Grade</a>
                                                <a href="" class="dropdown-item">9th Grade</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 grid-margin stretch-card d-flex justify-content-center">
                                    <div class="level">
                                        <div class="d-flex flex-column">
                                            <img width="125" height="125" src="<?= base_url('assets/images/advance.png'); ?>" alt="advance" data-toggle="dropdown" style="cursor:pointer;">
                                            <button type="button" class="btn btn-outline-success mt-2" data-toggle="dropdown">Advance</button>
                                            <div class="dropdown-menu">
                                                <a href="<?= base_url(''); ?>" class="dropdown-item">7th Grade</a>
                                                <a href="" class="dropdown-item">8th Grade</a>
                                                <a href="" class="dropdown-item">9th Grade</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 grid-margin stretch-card d-flex justify-content-center">
                                    <div class="level">
                                        <div class="d-flex flex-column">
                                            <img width="125" height="125" src="<?= base_url('assets/images/intermediate.png'); ?>" alt="intermediate" data-toggle="dropdown" style="cursor:pointer;">
                                            <button type="button" class="btn btn-outline-primary mt-2" data-toggle="dropdown">Intermediate</button>
                                            <div class="dropdown-menu">
                                                <a href="" class="dropdown-item">7th Grade</a>
                                                <a href="" class="dropdown-item">8th Grade</a>
                                                <a href="" class="dropdown-item">9th Grade</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 grid-margin stretch-card d-flex justify-content-center">
                                    <div class="level">
                                        <div class="d-flex flex-column">
                                            <img width="125" height="125" src="<?= base_url('assets/images/basic.png'); ?>" alt="basic" data-toggle="dropdown" style="cursor:pointer;">
                                            <button type="button" class="btn btn-outline-warning mt-2" data-toggle="dropdown">Basic</button>
                                            <div class="dropdown-menu">
                                                <a href="" class="dropdown-item">7th Grade</a>
                                                <a href="" class="dropdown-item">8th Grade</a>
                                                <a href="" class="dropdown-item">9th Grade</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <p class="card-description">Belum ada kelas dan level yang dipilih!</p>
                            <div class="table-responsive">
                                <table class="table table-hover" style="width: 100%;" id="listTable">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="">No</th>
                                            <th width="">NIS</th>
                                            <th width="">Nama</th>
                                            <th width="">Kelas</th>
                                            <th width="">x</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end level -->
        </div>
        <!-- end wrapper level ECI -->

        <!-- wrapper level ECI perkelas -->
        <div class="tab-pane fade" id="nav-level-kelas" role="tabpanel" aria-labelledby="nav-level-kelas-tab">
            <!-- cari kelas -->
            <div class=" row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Cari Kelas</h4>
                            <form class="level-in-kelas mb-4 d-flex justify-content-center">
                                <div class="input-group" style="width: 300px;">
                                    <select class="form-select" name="kelas_id" required>
                                        <option selected value="">-- Kelas --</option>
                                        <?php foreach ($kelas as $kls) : ?>
                                            <optgroup label="<?= $kls['kelas'] ?>">
                                                <?php foreach ($sub_kelas as $sub) : ?>
                                                    <?php if ($sub['child'] == $kls['id']) : ?>
                                                        <option value="<?= $sub['id']; ?>"><?= $sub['kelas'] ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </optgroup>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="submit">Padosi</button>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <div class="col-md-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Expert</h4>
                                            <div class="table-responsive">
                                                <table class="table table-hover" style="width: 100%;" id="expertTable">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th width="7%">No</th>
                                                            <th width="83%">Nama</th>
                                                            <th width="10%">x</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Advance</h4>
                                            <div class="table-responsive">
                                                <table class="table table-hover" style="width: 100%;" id="advanceTable">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th width="7%">No</th>
                                                            <th width="83%">Nama</th>
                                                            <th width="10%">x</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Intermediate</h4>
                                            <div class="table-responsive">
                                                <table class="table table-hover" style="width: 100%;" id="intermediateTable">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th width="7%">No</th>
                                                            <th width="83%">Nama</th>
                                                            <th width="10%">x</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Basic</h4>
                                            <div class="table-responsive">
                                                <table class="table table-hover" style="width: 100%;" id="basicTable">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th width="7%">No</th>
                                                            <th width="83%">Nama</th>
                                                            <th width="10%">x</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">No Level</h4>
                                            <div class="table-responsive">
                                                <table class="table table-hover" style="width: 100%;" id="nolevelTable">
                                                    <thead>
                                                        <tr class="text-center">
                                                            <th width="7%">No</th>
                                                            <th width="83%">Nama</th>
                                                            <th width="10%">x</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>


                </div>
            </div>
            <!-- end cari kelas -->
        </div>
        <!-- end wrapper level ECI perkelas -->

        <!-- wrapper riwayat -->
        <div class="tab-pane fade" id="nav-riwayat" role="tabpanel" aria-labelledby="nav-riwayat-tab">
            <!-- riwayat kenaikan -->
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Riwayat ECI</h4>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end riwayat kenaikan -->
        </div>
        <!-- end wrapper riwayat -->


    </div>



    <!-- Modal loading -->
    <div class="modal fade" id="loadingScreen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="d-flex align-items-center">
                        <span>Loading...</span>
                        <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if ($this->session->flashdata('pesan')) : ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '<?= $this->session->flashdata('pesan'); ?>',
            })
        </script>
    <?php endif; ?>

</div>
<!-- content-wrapper ends -->

<script>
    $(document).ready(function() {

        // panel 1
        const result = []
        const pURL = '<?= base_url('nilai_eci/print?uniqid='); ?>'
        const tableEci = $('#tableEci').DataTable({
            order: [
                [1, 'asc']
            ],
            data: result,
            pageLength: 40,
            columnDefs: [{
                className: "text-center",
                targets: [2, 3, 4, 5, 6, 7]
            }],
            columns: [{
                    data: 'no'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'listening'
                },
                {
                    data: 'reading'
                },
                {
                    data: 'speaking'
                },
                {
                    data: 'writing'
                },
                {
                    data: 'describe_vocab'
                },
                {
                    data: 'print'
                }
            ],
            language: {
                "zeroRecords": "Tidak ada data yang cocok ditemukan",
                "decimal": "",
                "emptyTable": "Tidak ada data di dalam tabel",
                "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri",
                "infoEmpty": "Menampilkan 0 hingga 0 dari 0 entri",
                "infoFiltered": "(disaring dari _MAX_ total entri)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Tampilkan _MENU_ entri per halaman",
                "loadingRecords": "Loading...",
                "processing": "",
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                },
            },
        });

        const showLoading = () => {
            $('#loadingScreen').modal('show')

            setTimeout(() => {
                if ($('#loadingScreen').hasClass('show')) {
                    hideLoading()
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops',
                        text: 'Terjadi masalah server!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }, 1000 * 10)
        }

        const hideLoading = () => {
            $('#loadingScreen').modal('hide')
        }

        const fetchData = (data) => {
            while (result.length > 0) {
                result.pop()
            }
            tableEci.clear();
            $.ajax({
                url: '<?= base_url('api/eci') ?>',
                dataType: 'json',
                data: data,
                success: function(res) {
                    setTimeout(() => {
                        hideLoading()
                    }, 500)
                    let i = 0
                    let n = 1
                    let z = 0
                    res.data.forEach(() => {
                        result.push({
                            no: n,
                            nama: res.data[i].nama,
                            listening: res.data[i].listening,
                            reading: res.data[i].reading,
                            speaking: res.data[i].speaking,
                            writing: res.data[i].writing,
                            describe_vocab: res.data[i].describe_vocab,
                            print: res.data[i].link != '' ? '<a class="btn btn-success" target="_blank" href="' + pURL + res.data[i].link + '"><i class="mdi mdi-cloud-print-outline" title="Cetak nilai"></i></a>' : '<button class="btn btn-secondary" disabled><i class="mdi mdi-printer-alert"></i></button',
                        })
                        if (res.data[i].listening == '' || res.data[i].reading == '' || res.data[i].speaking == '' || res.data[i].writing == '' || res.data[i].describe_vocab == '') {
                            z++
                        }
                        i++
                        n++

                    })
                    tableEci.rows.add(result).draw();

                    $('.desc').html(`Kelas ${res.identity[0].kelas} | ${data.bulan} Semester ${data.semester} Tahun Ajaran ${data.tahun_ajaran}`);
                    if (z <= 0) {
                        $('#kunci_nilai').show()
                    } else {
                        $('#kunci_nilai').hide()
                    }
                    let el = document.getElementById('nilai')
                    let elPos = el.getBoundingClientRect().top - 90
                    window.scrollTo(0, elPos)
                },
                error: function(err) {
                    hideLoading()
                    location.reload();
                }
            })
        }

        $('.download').on('click', (e) => {
            e.preventDefault();
            let query = $('form.cari').serializeArray();
            let data = {
                tahun_ajaran: query[0].value,
                semester: query[1].value,
                bulan: query[2].value,
                kelas_id: query[3].value,
            }

            if (!data.tahun_ajaran || !data.semester || !data.bulan || !data.kelas_id) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Isi formulir terlebih dahulu!',
                })
                return false
            } else {
                let parameter = new URLSearchParams(data).toString()
                let url = '<?= base_url('nilai_eci/download?') ?>' + parameter
                window.location.href = url
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil download!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }

        })

        $('form.cari').on('submit', (e) => {
            e.preventDefault();
            while (result.length > 0) {
                result.pop()
            }
            tableEci.clear();
            showLoading()

            let query = $('form.cari').serializeArray();
            let data = {
                tahun_ajaran: query[0].value,
                semester: query[1].value,
                bulan: query[2].value,
                kelas_id: query[3].value,
            }

            fetchData(data)
        })

        $('form.upload').on('submit', (e) => {
            e.preventDefault()
            Swal.fire({
                title: 'Upload nilai?',
                html: "Anda akan mengupload nilai ini? <br/> data lama akan digabungkan dengan data baru dan akan diupdate jika ada perbedaan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya upload!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.value) {
                    while (result.length > 0) {
                        result.pop()
                    }
                    tableEci.clear();
                    let query = $('form.upload').serializeArray()
                    let nilaiXls = $('[name="nilaiXls"]').prop('files')[0]

                    let formData = new FormData()
                    formData.append('tahun_ajaran', query[0].value)
                    formData.append('semester', query[1].value)
                    formData.append('bulan', query[2].value)
                    formData.append('kelas_id', query[3].value)
                    formData.append('nilaiXls', nilaiXls)

                    let data = {
                        tahun_ajaran: query[0].value,
                        semester: query[1].value,
                        bulan: query[2].value,
                        kelas_id: query[3].value,
                    }

                    $.ajax({
                        url: '<?= base_url('nilai_eci/upload') ?>',
                        type: 'POST',
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        data: formData,
                        beforeSend: () => {
                            showLoading()
                        },
                        /**function on success */
                        success: function(res) {
                            if (res.status) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Horee',
                                    text: 'Behasil upload!',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                setTimeout(() => {
                                    showLoading()
                                    fetchData(data)
                                }, 1600)
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops',
                                    text: res.msg,
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                setTimeout(() => {
                                    hideLoading()
                                }, 500)
                            }
                        },
                        error: function(err) {
                            console.log(err.responseText)
                        }

                    })
                }
            })

        })

        //panel 2
        const listResult = []
        const expertResult = []
        const advanceResult = []
        const intermediateResult = []
        const basicResult = []
        const nolevelResult = []

        const listTable = $('#listTable').DataTable({
            order: [
                [1, 'asc']
            ],
            data: listResult,
            columns: [{
                    data: 'no'
                },
                {
                    data: 'nis'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'kelas'
                },
                {
                    data: 'levelup'
                },
            ],
        })
        const expertTable = $('#expertTable').DataTable({
            order: [
                [1, 'asc']
            ],
            pageLength: 40,
            data: expertResult,
            columns: [{
                    data: 'no'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'levelup'
                },
            ],
        })
        const advanceTable = $('#advanceTable').DataTable({
            order: [
                [1, 'asc']
            ],
            pageLength: 40,
            data: advanceResult,
            columns: [{
                    data: 'no'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'levelup'
                },
            ],
        })
        const intermediateTable = $('#intermediateTable').DataTable({
            order: [
                [1, 'asc']
            ],
            pageLength: 40,
            data: intermediateResult,
            columns: [{
                    data: 'no'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'levelup'
                },
            ],
        })
        const basicTable = $('#basicTable').DataTable({
            order: [
                [1, 'asc']
            ],
            pageLength: 40,
            data: basicResult,
            columns: [{
                    data: 'no'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'levelup'
                },
            ],
        })
        const nolevelTable = $('#nolevelTable').DataTable({
            order: [
                [1, 'asc']
            ],
            pageLength: 40,
            data: nolevelResult,
            columns: [{
                    data: 'no'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'levelup'
                },
            ],
        })

        // event btn per level
        $('.dropdown-item').on('click', (e) => {
            e.preventDefault()
            console.log(e.target.href)
        })


        // event btn per kelas
        $('form.level-in-kelas').on('submit', (e) => {
            e.preventDefault()

            while (expertResult.length > 0) {
                expertResult.pop()
            }
            while (advanceResult.length > 0) {
                advanceResult.pop()
            }
            while (intermediateResult.length > 0) {
                intermediateResult.pop()
            }
            while (basicResult.length > 0) {
                basicResult.pop()
            }
            while (nolevelResult.length > 0) {
                nolevelResult.pop()
            }

            expertTable.clear();
            advanceTable.clear();
            intermediateTable.clear();
            basicTable.clear();
            nolevelTable.clear();

            showLoading()

            let perKelas = $('form.level-in-kelas').serializeArray();
            let data = {
                kelas_id: perKelas[0].value
            }

            fetchDataLevelKelas(data)
        })

        const fetchDataLevelKelas = (data) => {
            $.ajax({
                url: '<?= base_url('api/levelkelas') ?>',
                dataType: 'json',
                data: data,
                success: function(res) {
                    setTimeout(() => {
                        drawExpertTable(res.data.expert)
                        drawAdvanceTable(res.data.advance)
                        drawIntermediateTable(res.data.intermediate)
                        drawBasicTable(res.data.basic)
                        drawNolevelTable(res.data.nolevel)
                        hideLoading()
                    }, 500)
                },
                error: function(err) {
                    hideLoading()
                    location.reload();
                }
            })
        }

        const drawExpertTable = (data) => {
            let no = 1
            let i = 0
            data.forEach(() => {
                expertResult.push({
                    no: no,
                    nama: data[i].nama,
                    levelup: `<i class="mdi mdi-table-edit" data-toggle="dropdown" style="cursor:pointer;"><i><div class="dropdown-menu">
                                <a href="" class="dropdown-item set-level" data-oldlevel="expert" data-level="advance" data-nis="${data[i].nis}">Advance</a>
                                <a href="" class="dropdown-item set-level" data-oldlevel="expert" data-level="intermediate" data-nis="${data[i].nis}">Intermediate</a>
                                <a href="" class="dropdown-item set-level" data-oldlevel="expert" data-level="basic" data-nis="${data[i].nis}">Basic</a>
                              </div>`
                })
                no++
                i++
            })
            expertTable.rows.add(expertResult).draw();
        }
        const drawAdvanceTable = (data) => {
            let no = 1
            let i = 0
            data.forEach(() => {
                advanceResult.push({
                    no: no,
                    nama: data[i].nama,
                    levelup: `<i class="mdi mdi-table-edit" data-toggle="dropdown" style="cursor:pointer;"><i><div class="dropdown-menu">
                                <a href="" class="dropdown-item set-level" data-oldlevel="advance" data-level="expert" data-nis="${data[i].nis}">Expert</a>
                                <a href="" class="dropdown-item set-level" data-oldlevel="advance" data-level="intermediate" data-nis="${data[i].nis}">Intermediate</a>
                                <a href="" class="dropdown-item set-level" data-oldlevel="advance" data-level="basic" data-nis="${data[i].nis}">Basic</a>
                              </div>`
                })
                no++
                i++
            })
            advanceTable.rows.add(advanceResult).draw();
        }
        const drawIntermediateTable = (data) => {
            let no = 1
            let i = 0
            data.forEach(() => {
                intermediateResult.push({
                    no: no,
                    nama: data[i].nama,
                    levelup: `<i class="mdi mdi-table-edit" data-toggle="dropdown" style="cursor:pointer;"><i><div class="dropdown-menu">
                                <a href="" class="dropdown-item set-level" data-oldlevel="intermediate" data-level="expert" data-nis="${data[i].nis}">Expert</a>
                                <a href="" class="dropdown-item set-level" data-oldlevel="intermediate" data-level="advance" data-nis="${data[i].nis}">Advance</a>
                                <a href="" class="dropdown-item set-level" data-oldlevel="intermediate" data-level="basic" data-nis="${data[i].nis}">Basic</a>
                              </div>`
                })
                no++
                i++
            })
            intermediateTable.rows.add(intermediateResult).draw();
        }
        const drawBasicTable = (data) => {
            let no = 1
            let i = 0
            data.forEach(() => {
                basicResult.push({
                    no: no,
                    nama: data[i].nama,
                    levelup: `<i class="mdi mdi-table-edit" data-toggle="dropdown" style="cursor:pointer;"><i><div class="dropdown-menu">
                                <a href="" class="dropdown-item set-level" data-oldlevel="basic" data-level="expert" data-nis="${data[i].nis}">Expert</a>
                                <a href="" class="dropdown-item set-level" data-oldlevel="basic" data-level="advance" data-nis="${data[i].nis}">Advance</a>
                                <a href="" class="dropdown-item set-level" data-oldlevel="basic" data-level="intermediate" data-nis="${data[i].nis}">Intermediate</a>
                              </div>`
                })
                no++
                i++
            })
            basicTable.rows.add(basicResult).draw();
            activateSetLevel()
        }
        const drawNolevelTable = (data) => {
            let no = 1
            let i = 0

            data.forEach(() => {
                nolevelResult.push({
                    no: no,
                    nama: data[i].nama,
                    levelup: `<i class="mdi mdi-table-edit" data-toggle="dropdown" style="cursor:pointer;"><i><div class="dropdown-menu">
                                <a href="" class="dropdown-item set-level" data-oldlevel="nolevel" data-level="expert" data-nis="${data[i].nis}">Expert</a>
                                <a href="" class="dropdown-item set-level" data-oldlevel="nolevel" data-level="advance" data-nis="${data[i].nis}">Advance</a>
                                <a href="" class="dropdown-item set-level" data-oldlevel="nolevel" data-level="intermediate" data-nis="${data[i].nis}">Intermediate</a>
                                <a href="" class="dropdown-item set-level" data-oldlevel="nolevel" data-level="basic" data-nis="${data[i].nis}">Basic</a>
                              </div>`
                })
                no++
                i++
            })

            nolevelTable.rows.add(nolevelResult).draw();
            activateSetLevel()
        }

        const activateSetLevel = () => {
            $('.set-level').on('click', (e) => {
                e.preventDefault()
                // console.log(e.target.href)
                // console.log(e.target.dataset.level)
                // console.log(e.target.dataset.nis)
                Swal.fire({
                    title: 'Edit Level Siswa',
                    text: `Anda merubah level siswa menjadi ${e.target.dataset.level}?`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya'
                }).then((result) => {
                    if (result.value) {
                        // jika dikonfirmasi
                        let data = {
                            nis: e.target.dataset.nis,
                            level_baru: e.target.dataset.level,
                            level_lama: e.target.dataset.oldlevel
                        }
                        setLevel(data)
                        showLoading()
                    }
                })
            })
        }

        const setLevel = (data) => {
            $.ajax({
                url: '<?= base_url('eci/set_level_eci') ?>',
                dataType: 'json',
                method: 'POST',
                data: data,
                success: function(res) {
                    setTimeout(() => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Horee!',
                            text: 'Berhasil merubah level ECI siswa',
                            showConfirmButton: false,
                            timer: 1500
                        })

                        hideLoading()
                    }, 500)

                    setTimeout(() => {
                        $('form.level-in-kelas').submit()
                    }, 1500)
                },
                error: function(err) {
                    console.log(err.responseText)
                    hideLoading()
                    // location.reload();
                }
            })
        }

    });
</script>