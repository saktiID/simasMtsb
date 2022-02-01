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
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Jurnal Mengajar&nbsp;/&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb -->


    <div class="row">
        <!-- form jurnal -->
        <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Jurnal</h4>
                    <p class="card-description">
                        Tambahkan isian jurnal
                    </p>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="datepicker">Tanggal</label>
                            <input type="text" class="form-control" id="datepicker" placeholder="Isi tanggal">
                        </div>

                        <div class="data-jurnal">
                            <div class="form-group">
                                <label>Data Jurnal</label>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <select class="form-control sesi" id="sesi">
                                            <option>- Sesi -</option>
                                            <?php foreach ($sesi as $sess) : ?>
                                                <?php if ($sess['kegiatan'] == 'KBM') : ?>
                                                    <option value=""><?= $sess['jam_ke']; ?> | <?= $sess['waktu']; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2">
                                        <select class="form-control kelas" id="kelas">
                                            <option>- Kelas -</option>
                                            <?php foreach ($main_kelas as $mkls) : ?>
                                                <optgroup label="<?= $mkls['kelas']; ?>"></optgroup>
                                                <?php foreach ($sub_kelas as $skls) : ?>
                                                    <?php if ($skls['child'] == $mkls['id']) : ?>
                                                        <option value=""><?= $skls['kelas']; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control subject" id="subject" placeholder="Subject">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control topic" id="topic" placeholder="Topic">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control activities" id="activities" placeholder="Activities">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control absence" id="absence" placeholder="Absence Student">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="data-jurnal-plus"></div>

                        <div class="row">
                            <div class="col d-flex justify-content-between">
                                <div class="btn btn-primary rounded-circle px-2 py-2 tmbh-list" title="Tambah daftar jurnal">
                                    <i class="mdi mdi-calendar-plus"></i>
                                </div>
                                <button type="submit" class="btn btn-success mr-2 isi-jurnal" title="Isi jurnal mengajar">Isi jurnal</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <!-- search jurnal -->
        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Cari Jurnal</h4>
                    <p class="card-description">
                        Cari data jurnal
                    </p>

                    <div class="form-group">
                        <label for="datepicker">Mulai Tanggal</label>
                        <input type="text" class="form-control" id="from" placeholder="Isi tanggal">
                    </div>
                    <div class="form-group">
                        <label for="datepicker">Sampai Tanggal</label>
                        <input type="text" class="form-control" id="to" placeholder="Isi tanggal">
                    </div>

                    <button type="submit" class="btn btn-success mr-2">Cari jurnal</button>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- content-wrapper ends -->


<script>
    $(function() {
        $("#datepicker").datepicker({
            dayNamesMin: ['Aha', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
            dayNames: ['Ahad', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            monthNames: ["Januari", "Februarr", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            changeYear: true,
            dateFormat: "DD, dd MM yy"
        });


        var dateFormat = "mm/dd/yy",
            from = $("#from")
            .datepicker({
                changeYear: true,
                numberOfMonths: 1,
                dayNamesMin: ['Aha', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                monthNames: ["Januari", "Februarr", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            })
            .on("change", function() {
                to.datepicker("option", "minDate", getDate(this));
            }),
            to = $("#to").datepicker({
                changeYear: true,
                numberOfMonths: 1,
                dayNamesMin: ['Aha', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                monthNames: ["Januari", "Februarr", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
            })
            .on("change", function() {
                from.datepicker("option", "maxDate", getDate(this));
            });

        function getDate(element) {
            var date;
            try {
                date = $.datepicker.parseDate(dateFormat, element.value);
            } catch (error) {
                date = null;
            }

            return date;
        }


    });

    // menambah form jurnal
    $('.tmbh-list').click(() => {
        // let form = $('.data-jurnal').children()
        // form.clone().appendTo('.data-jurnal-plus')

        let data = '<div class="wrapp">'
        data += '<div class="form-group">'
        data += '<label>Data Jurnal <i class="mdi mdi-minus-box minus-jurnal"></i></label>'
        data += '<div class="row">'

        data += '<div class="col-sm-2">'
        data += '<select class="form-control sesi">'
        data += '<option>- Sesi -</option>'
        data += '<?php foreach ($sesi as $sess) : ?>'
        data += '<?php if ($sess["kegiatan"] == "KBM") : ?>'
        data += '<option value = "" ><?= $sess["jam_ke"]; ?> | <?= $sess["waktu"]; ?> < /option>'
        data += '<?php endif; ?>'
        data += '<?php endforeach; ?> '
        data += '</select></div>'


        data += '<div class="col-sm-2"><select class="form-control kelas">'
        data += '<option>- Kelas -</option>'
        data += '<?php foreach ($main_kelas as $mkls) : ?>'
        data += '<optgroup label = "<?= $mkls['kelas']; ?>" > < /optgroup>'
        data += '<?php foreach ($sub_kelas as $skls) : ?>'
        data += '<?php if ($skls['child'] == $mkls['id']) : ?>'
        data += '<option value = "" > <?= $skls['kelas']; ?> < /option>'
        data += '<?php endif; ?>'
        data += '<?php endforeach; ?>'
        data += '<?php endforeach; ?>'
        data += '</select></div>'


        data += '<div class="col-sm-4">'
        data += '<input type="text" class="form-control subject" placeholder="Subject">'
        data += '</div>'

        data += '<div class="col-sm-4">'
        data += '<input type="text" class="form-control topic" placeholder="Topic">'
        data += '</div>'

        data += '</div></div>'

        data += '<div class="form-group">'
        data += '<div class="row">'
        data += '<div class="col-sm-6">'
        data += '<input type="text" class="form-control activities" placeholder="Activities">'
        data += '</div>'
        data += '<div class="col-sm-6">'
        data += '<input type="text" class="form-control absence" placeholder="Absence Student">'
        data += '</div></div></div>'

        $('.data-jurnal-plus').append(data)
        min()

    })


    // isi jurnal
    $('.isi-jurnal').click((e) => {
        e.preventDefault()

        let sesi = $('.sesi')
        let kelas = $('.kelas')
        let subject = $('.subject')
        let topic = $('.topic')
        let activities = $('.activities')
        let absence = $('.absence')

        let allSesi = []
        for (let i = 0; i < topic.length; i++) {
            allSesi.push(topic[i].value)
        }
        console.log(allSesi)

    })

    // klik minus jurnal
    const min = () => (
        $('.minus-jurnal').click((e) => {
            e.target.parentElement.parentElement.parentElement.remove()
        })
    )
</script>