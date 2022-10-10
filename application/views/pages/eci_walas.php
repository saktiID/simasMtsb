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


    <!-- content ECI siswa -->
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cari Nilai</h4>
                    <p>Anda wali kelas <?= $kelas_self['kelas']; ?></p>

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
                                <select class="form-select" name="kelas" disabled required>
                                    <option selected value="">-- Kelas --</option>
                                    <?php foreach ($kelas as $kls) : ?>
                                        <optgroup label="<?= $kls['kelas'] ?>">
                                            <?php foreach ($sub_kelas as $sub) : ?>
                                                <?php if ($sub['child'] == $kls['id']) : ?>
                                                    <option value="<?= $sub['id']; ?>" <?php if ($kelas_self['kelas'] == $sub['kelas']) : ?> selected <?php endif; ?>><?= $sub['kelas'] ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </optgroup>
                                    <?php endforeach; ?>

                                </select>
                                <input type="text" name="kelas_id" value="<?= $kelas_self['id']; ?>" hidden>
                            </div>
                        </div>
                        <div class="row">
                            <!-- input submit -->
                            <div class="col mb-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary ml-2">Cari</button>
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
                    <p class="card-description desc">Belum ada data yang dipilih!</p>
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

<script>
    $(document).ready(function() {
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
                        i++
                        n++
                    })
                    tableEci.rows.add(result).draw();

                    $('.desc').html(`Kelas ${res.identity[0].kelas} | ${data.bulan} Semester ${data.semester} Tahun Ajaran ${data.tahun_ajaran}`);
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
    })
</script>