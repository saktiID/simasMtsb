<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>

    <!-- block style -->
    <style>
        *,
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 11pt;
            margin: auto;
        }

        /* utilities */
        .text-center {
            text-align: center !important;
        }

        .pt-1 {
            padding-top: 10px !important;
        }

        .pb-1 {
            padding-bottom: 10px !important;
        }

        .mt-1 {
            margin-top: 10px !important;
        }

        .mb-1 {
            margin-bottom: 10px !important;
        }

        /* end */

        .wrapper {
            background-color: rgb(225, 225, 225);
        }

        .container {
            width: 21cm !important;
            height: 29.7cm !important;
            padding-left: 15px !important;
            padding-right: 15px !important;
            background-color: #fff;
        }

        table.kop {
            width: 100%;
            padding-bottom: 10px;
            border-bottom: 3px solid #393939;
        }

        table.kop img {
            width: 2.3cm;
            margin-top: 10px !important;
        }

        h2 {
            font-size: 14pt;
        }

        h3 {
            font-size: 12pt;
            font-weight: 500;
        }

        table.konten {
            width: 100%;
            font-size: 11pt;
        }

        .box-score {
            width: 130px !important;
            height: 110px !important;
            background-color: antiquewhite;
        }

        .score-type {
            font-size: 12pt;
            font-weight: 500;
            text-align: center;
            margin-bottom: 5px;
        }

        .border-rounded {
            width: 55px !important;
            height: 55px !important;
            text-align: center !important;
            line-height: 55px;
            font-size: 14pt !important;
            font-weight: 700;
            border-radius: 50%;
        }

        .score-1 {
            border: 4px solid #365C67;
        }

        .score-2 {
            border: 5px solid #f9a620;
        }

        .score-3 {
            border: 5px solid #FFD449;
        }

        .score-4 {
            border: 5px solid #548C2F;
        }

        .score-5 {
            border: 5px solid #104911;
        }

        .box-stripped {
            width: 100%;
            height: 3px;
            background-color: #393939;
        }

        .box-footer {
            width: 100%;
            height: 1.5cm;
            margin-top: 3px;
            color: #fff;
            background-color: #393939;

            display: flex;
            justify-content: space-around !important;
        }

        .social img {
            width: 15px;
        }

        .social .text-social {
            font-size: 9pt;
        }

        .wrapper-bottom {
            margin-top: auto !important;
            position: fixed;
            right: 0;
            bottom: 0;
            left: 0;
        }


        @media print {
            @page {
                margin-top: 0;
                margin-bottom: 0;
            }

            .wrapper-bottom {
                width: 100%;
                position: fixed;
                bottom: 0;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <table class="kop text-center">
                <tr>
                    <td>
                        <img src="<?= base_url(); ?>assets/images/printECI/logo_brand.png" width="2.3cm" alt="logo">
                        <h2>ENGLISH COMPETENCE IMPROVMENT</h2>
                        <h2>MTs BILINGUAL MUSLIMAT NU PUCANG SIDOARJO</h2>
                        <h3>INTEGRATED CURRICULLUM OF KEMENAG, KEMENDIKBUD AND CAMBRIDGE</h3>
                    </td>
                </tr>
            </table>
            <table class="konten mt-1 mb-1">
                <tr>
                    <td class="text-center">
                        <u><b>TO WHOM MAY CONCERN</b></u>
                    </td>
                </tr>
            </table>
            <table class="konten mb-1">
                <tr>
                    <td>
                        <p>This to report that :</p>
                    </td>
                </tr>
            </table>

            <table class="konten mb-1" width="100%">
                <tr>
                    <td width="80px">Name</td>
                    <td>: <strong>Ach Iqbal Maulana</strong></td>
                </tr>
                <tr>
                    <td width="80px">NIS</td>
                    <td>: <strong>8266245610020202</strong></td>
                </tr>
                <tr>
                    <td>Class</td>
                    <td>: <strong>XI - 10</strong></td>
                </tr>
                <tr>
                    <td>Month</td>
                    <td>: <strong>January</strong></td>
                </tr>
            </table>

            <table class="konten mb-1">
                <tr>
                    <td>
                        <p>Took a paper-based English Competence Improvement Test in our institution
                            with the following result :</p>
                    </td>
                </tr>
            </table>

            <table width="90%" class="mb-1">
                <tr>
                    <td class="text-center" width="20%">Listening</td>
                    <td class="text-center" width="20%">Speaking</td>
                    <td class="text-center" width="20%">Writing</td>
                    <td class="text-center" width="20%">Reading</td>
                    <td class="text-center" width="20%">Describe/Vocab</td>
                </tr>
                <tr>
                    <td>
                        <div class="border-rounded score-1">85</div>
                    </td>
                    <td>
                        <div class="border-rounded score-2">85</div>
                    </td>
                    <td>
                        <div class="border-rounded score-3">85</div>
                    </td>
                    <td>
                        <div class="border-rounded score-4">85</div>
                    </td>
                    <td>
                        <div class="border-rounded score-5">85</div>
                    </td>
                </tr>
            </table>

            <table class="mb-1">
                <tr>
                    <td>
                        <canvas id="myChart" width="650" height="250"></canvas>
                    </td>
                </tr>
            </table>

            <table class="mb-1">
                <tr>
                    <td>
                        <p>Those are the English Competence Improvement Test scores <span class="user-name">"Ach Iqbal Maulana"</span> obtained, thank you for your attention.</p>
                    </td>
                </tr>
            </table>

            <table width="100%">
                <tr>
                    <td width="75%"></td>
                    <td width="25%">
                        <div class="text-center">
                            <div class="date">Monday, 10 January 2022</div>
                            <div>(electronically signed)</div>
                            <div class="mb-1 mt-1">
                                <div id="qrcode"></div>
                            </div>
                            <div>Advisor for English<br>Competence Improvement</div>
                        </div>
                    </td>
                </tr>
            </table>

            <div class="wrapper-bottom">
                <div class="box-stripped"></div>
                <div class="box-footer">
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
    </div>



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
                    data: [60, 75, 85, 70, 88],
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
            text: "http://simas.mtsb.sch.id/nilai_eci",
            width: 80,
            height: 80,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });
    </script>
</body>

</html>