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
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="9%">No. Urut</th>
                                <th width="9%">Kode</th>
                                <th>Mata Pelajaran</th>
                            </tr>
                        </thead>

                        <style>
                            .ui-state-highlight {
                                height: 1.5em;
                                line-height: 1.2em;
                                border: 1px solid #bcbcbc;
                                background: #efffd5;
                            }
                        </style>
                        <tbody id="sortable">
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

<script>
    $(document).ready(function() {
        $('#sortable').sortable({
            placeholder: "ui-state-highlight",
            update: function() {
                $(this).children().each(function(index) {
                    $(this).attr('data-urut', (index + 1)).addClass('updated')
                })
                simpanPosisi()
                tampilMapel()
                Swal.fire({
                    title: "Hurray!",
                    text: "Berhasil mengurutkan mapel",
                    icon: "success",
                })
            }
        })
        $('#sortable').disableSelection()
        tampilMapel()
    })

    function tampilMapel() {
        $.ajax({
            url: '<?= base_url('mapel/tampil_mapel'); ?>',
            method: 'POST',
            dataType: 'json',
            success: function(res) {
                let trMapel = ''
                for (let i = 0; i < Object.keys(res).length; i++) {
                    trMapel += '<tr  style="cursor: move;" data-id=' + res[i].id + ' data-urut=' + res[i].urut + '>' +
                        '<td>' + res[i].urut + '</td>' +
                        '<td>' + res[i].kode + '</td>' +
                        '<td>' +
                        '<span class="d-flex align-items-center">' +
                        '<i class="mdi mdi-swap-vertical text-secondary"></i>' +
                        '<p class="mb-0 pl-3">' + res[i].nama_mapel + '</p>' +
                        '</span>' +
                        '</td>' +
                        '</tr>'
                }
                $('#sortable').html(trMapel)
            },
            error: function(err) {
                console.log(err.responseText)
            }
        })
    }

    function simpanPosisi() {
        let urut = []
        $('.updated').each(function() {
            urut.push([$(this).attr('data-id'), $(this).attr('data-urut')])
        })

        $.ajax({
            url: '<?= base_url('mapel/simpan_posisi'); ?>',
            method: 'POST',
            dataType: 'text',
            data: {
                urutan: urut,
            },
            success: function(res) {
                if (res != '') {
                    console.log(res)
                }
            }
        })
    }
</script>