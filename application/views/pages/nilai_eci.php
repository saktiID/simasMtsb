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
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Nilai ECI&nbsp;/&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb -->

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
                                    <option value="2021-2022">2021-2022</option>
                                    <option value="2022-2023">2022-2023</option>
                                    <option value="2024-2024">2023-2024</option>
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
                                    <option>Januari</option>
                                    <option>Februari</option>
                                    <option>Maret</option>
                                    <option>April</option>
                                    <option>Mei</option>
                                    <option>Juni</option>
                                    <option>Juli</option>
                                    <option>Agustus</option>
                                    <option>September</option>
                                    <option>Oktober</option>
                                    <option>November</option>
                                    <option>Desember</option>
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
                </div>
            </div>
        </div>
    </div>


    <!-- card table data nilai eci siswa -->
    <div class="row">
        <div class="col-md grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nilai ECI siswa</h4>
                    <p class="card-description desc">Belum ada kelas yang dipilih!</p>
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

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loadingScreen">
        Launch static backdrop modal
    </button>

    <!-- Modal loading -->
    <div class="modal fade" id="loadingScreen" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body d-flex justify-content-center">
                    Sedang memuat...
                </div>
            </div>
        </div>
    </div>

</div>
<!-- content-wrapper ends -->

<script>
    $(document).ready(function() {

        const showLoading = () => {
            $('#loadingScreen').modal('show')
        }

        const hideLoading = () => {
            $('#loadingScreen').modal('hide')
        }

        let result = []


        let tableEci = $('#tableEci').DataTable({
            ordering: false,
            data: result,
            pageLength: 40,
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

        $('.download').on('click', (e) => {
            e.preventDefault();
            let query = $('form.cari').serializeArray();
            let data = {
                tahun_ajaran: query[0].value,
                semester: query[1].value,
                bulan: query[2].value,
                kelas_id: query[3].value,
            }

            if (!data.tahun_ajaran && !data.semester && !data.bulan && !data.kelas_id) {
                alert('Isi formulir terlebih dahulu!')
                return false
            } else {
                let parameter = new URLSearchParams(data).toString()
                let url = '<?= base_url('nilai_eci/download?') ?>' + parameter
                window.location.href = url
            }

        })

        $('form.cari').on('submit', (e) => {
            e.preventDefault();
            tableEci.clear();
            showLoading()
            result = []

            let query = $('form.cari').serializeArray();
            let data = {
                tahun_ajaran: query[0].value,
                semester: query[1].value,
                bulan: query[2].value,
                kelas_id: query[3].value,
            }

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
                    res.data.forEach(() => {
                        result.push({
                            no: n,
                            nama: res.data[i].nama,
                            listening: res.data[i].listening,
                            reading: res.data[i].reading,
                            speaking: res.data[i].speaking,
                            writing: res.data[i].writing,
                            describe_vocab: res.data[i].describe_vocab,
                            print: res.data[i].link,
                        })
                        i++
                        n++
                    })
                    tableEci.rows.add(result).draw();
                    $('.desc').html(`Kelas ${res.identity[0].kelas} | ${query[2].value} Semester ${query[1].value} Tahun Ajaran ${query[0].value}`);
                }
            })
        })



    });
</script>