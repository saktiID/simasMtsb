<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico" />
    <!-- bootstrap 5.2 css-->
    <link href="<?= base_url(); ?>assets/bootstrap/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/style_pdf_eci.css" rel="stylesheet">
    <title>Score Achievement | <?= $nama; ?></title>

    <style>
        .box-number {
            font-size: 10pt;
            margin-top: -9px;
            margin-bottom: 7px;
        }

        @media print {
            .box-stripped {
                width: 100%;
                height: 2px;
                background-color: #393939;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <div class="container d-flex flex-column align-item-center">
        <div class="wrapper-top p-2 text-center">
            <div class=" box-logo">
                <img src="<?= base_url(); ?>assets/images/printECI/logo_brand.png" alt="logo">
            </div>
            <div class="box-brand-title">
                <h2>ENGLISH COMPETENCE IMPROVEMENT</h2>
                <h2>MTs BILINGUAL MUSLIMAT NU PUCANG SIDOARJO</h2>
            </div>
            <div class="box-brand-subtitle">
                <h3>INTEGRATED CURRICULLUM OF KEMENAG, KEMENDIKBUD, AND CAMBRIDGE</h3>
            </div>
            <div class="box-stripped hr"></div>
        </div>
        <div class="wrapper-middle d-flex justify-content-center">
            <div class="box-content">
                <div class="box-number text-center">
                    <span>Report Number: <?= date('d/m/y/', $timestamp) . $link; ?></span>
                </div>
                <div class="box-title text-center">
                    <p class="text-title"><u><b>TO WHOM MAY CONCERN</b></u></p>
                </div>
                <p class="text-content text-start">This to report that :</p>
                <table class="text-start mt-3">
                    <tr>
                        <td width="80px">Name</td>
                        <td>: <strong><?= $nama; ?></strong></td>
                    </tr>
                    <tr>
                        <td width="80px">NIS</td>
                        <td>: <strong><?= $nis; ?></strong></td>
                    </tr>
                    <tr>
                        <td>Class</td>
                        <td>: <strong><?= $kelas; ?></strong></td>
                    </tr>
                    <tr hidden>
                        <td>Month</td>
                        <td>: <strong><?= $bulan; ?></strong></td>
                    </tr>
                </table>
                <p class="text-content my-3">Took a paper-based English Competence Improvement Test in our institution with the following result :</p>
                <div class="box-score d-flex justify-content-between">
                    <div class="score-item score-listening d-flex flex-column text-center">
                        <div class=" score-type">Listening</div>
                        <div class="score-value mx-auto"><?= $listening; ?></div>
                    </div>
                    <div class="score-item score-speaking d-flex flex-column text-center">
                        <div class="score-type">Speaking</div>
                        <div class="score-value mx-auto"><?= $speaking; ?></div>
                    </div>
                    <div class="score-item score-writing d-flex flex-column text-center">
                        <div class="score-type">Writing</div>
                        <div class="score-value mx-auto"><?= $writing; ?></div>
                    </div>
                    <div class="score-item score-reading d-flex flex-column text-center">
                        <div class="score-type">Reading</div>
                        <div class="score-value mx-auto"><?= $reading; ?></div>
                    </div>
                    <div class="score-item score-describe-vocab d-flex flex-column text-center">
                        <div class="score-type">Describe/Vocab</div>
                        <div class="score-value mx-auto"><?= $describe_vocab; ?></div>
                    </div>
                </div>
                <canvas id="myChart" width="400" height="150"></canvas>
                <p class="text-content my-3">Those are the English Competence Improvement Test scores <span class="user-name">"<?= $nama; ?>" </span>obtained, thank you for your attention.</p>

                <div class="box-sign-row d-flex justify-content-end">
                    <div class=" box-sign text-center">
                        <div class="date"><?= date('l, d F Y', $timestamp); ?></div>
                        <div class="sign">(electronically signed)</div>
                        <div class="box-qr d-flex justify-content-center py-2">
                            <div id="qrcode"></div>
                        </div>
                        <div class="author">Advisor for English<br>Competence Improvement</div>
                    </div>
                </div>

            </div>
        </div>
        <div class="wrapper-bottom mt-auto p-0">
            <div class="box-stripped"></div>
            <div class="box-footer d-flex justify-content-around pt-3">
                <div class="social">
                    <img src="<?= base_url(); ?>assets/images/printECI//web.png" alt="">
                    <span class="text-social">mtsb.sch.id</span>
                </div>
                <div class="social">
                    <img src="<?= base_url(); ?>assets/images/printECI//ig.png" alt="">
                    <span class="text-social">mtsbilingual_official</span>
                </div>
                <div class="social">
                    <img src="<?= base_url(); ?>assets/images/printECI//yt.png" alt="">
                    <span class="text-social">mtsb channel</span>
                </div>
                <div class="social">
                    <img src="<?= base_url(); ?>assets/images/printECI//phone.png" alt="">
                    <span class="text-social">031 99705746</span>
                </div>
            </div>
        </div>
    </div>




    <!-- bootstrap 5.2 js -->
    <script src="<?= base_url(); ?>assets/bootstrap/bootstrap.min.js"></script>
    <!-- chart js -->
    <script src="<?= base_url(); ?>assets/chartJS/chartjs.min.js"></script>
    <!-- qr code generator -->
    <script src="<?= base_url(); ?>assets/qrcode/qrcode.min.js"></script>

    <!-- setup $ config chart -->
    <script>
        const ctx = document.getElementById('myChart')
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Listening', 'Speaking', 'Writing', 'Reading', 'Describe/Vocab', ],
                datasets: [{
                    label: 'Score Achievement',
                    data: [
                        <?= $listening; ?>,
                        <?= $speaking; ?>,
                        <?= $writing; ?>,
                        <?= $reading; ?>,
                        <?= $describe_vocab; ?>,
                    ],
                    backgroundColor: [
                        '#365c674e',
                        '#f9a62043',
                        '#ffd5494c',
                        '#548c2f41',
                        '#1049113f',
                    ],
                    borderColor: [
                        '#365C67',
                        '#f9a620',
                        '#FFD449',
                        '#548C2F',
                        '#104911',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                animations: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <!-- setup qr code -->
    <script type="text/javascript">
        const qrcode = new QRCode("qrcode", {
            text: 'https://simas.mtsb.sch.id/eci?q=' + '<?= $link; ?>',
            width: 80,
            height: 80,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    </script>

    <script>
        window.print()
    </script>
</body>

</html>