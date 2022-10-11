<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/favicon.ico" />
    <title>Score Achievement | <?= $nama; ?></title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            position: relative;
            width: 380px;
            height: 90px;
            background-color: #877633;
            border-radius: 20px;
            filter: drop-shadow(-20px 20px 40px #87763355);
            transition: 0.5s ease-in-out;
        }

        .card.active {
            height: 420px;
        }

        .toggle {
            position: absolute;
            bottom: -60px;
            left: 50%;
            transform: translateX(-50%);
            width: 70px;
            height: 60px;
            background-color: #877633;
            border-bottom-left-radius: 35px;
            border-bottom-right-radius: 35px;
            cursor: pointer;

        }

        .toggle::before {
            content: '';
            position: absolute;
            left: -34px;
            width: 35px;
            height: 35px;
            background-color: transparent;
            border-top-right-radius: 35px;
            box-shadow: 11px -10px 0 10px #877633;
        }

        .toggle::after {
            content: '';
            position: absolute;
            right: -34px;
            width: 35px;
            height: 35px;
            background-color: transparent;
            border-top-left-radius: 35px;
            box-shadow: -11px -10px 0 10px #877633;
        }

        .toggle span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -70%) rotate(405deg);
            width: 10px;
            height: 10px;
            border-bottom: 3px solid #fff;
            border-right: 3px solid #fff;
            transition: 0.5s ease-in-out;
            animation: updown 1s ease-in-out infinite;
        }

        @keyframes updown {
            0% {
                top: 40%
            }

            50% {
                top: 55%
            }

            100% {
                top: 40%
            }
        }

        .card.active .toggle span {
            transform: translate(-50%, -70%) rotate(225deg);

        }

        .contentBox {
            position: absolute;
            inset: 0;
            overflow: hidden;
        }

        .contentBox .content {
            position: relative;
            padding: 10px;
            text-align: center;
            z-index: 10;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.5s ease-in-out;
        }

        .contentBox .content h2 {
            color: #fff;
            font-weight: 500;
            font-size: 1.25em;
            text-transform: uppercase;
            letter-spacing: .0.05em;
            line-height: 1.1em;
            transition: 0.5s ease-in-out;
        }

        .card.active .contentBox .content {
            padding: 20px;
        }

        .contentBox .content h2 span {
            font-size: 0.60em;
            font-weight: 300;
            text-transform: initial;
        }

        .card.active .content h2 {
            margin-top: 80px;
        }

        .content .imgBox {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            top: 95px;
            width: 90px;
            z-index: 20;
            transition: 0.5s ease-in-out;
        }

        .imgBox img {
            width: 40px;
            transition: 0.5s ease-in-out;
        }

        .card.active img {
            width: 93px;
        }

        .card.active .imgBox {
            top: 10px;
        }

        .content .scoreBox {
            position: absolute;
            top: 110px;
            width: 300px;
            height: 200px;
            display: flex;
            justify-content: space-around;
        }

        .scoreBox .score {
            width: 55px;
            height: 50px;
            margin-top: 60px;
        }

        .score .score-type {
            font-size: 0.6em;
            color: #fff;
        }

        .score .score-value {
            color: #fff;
            font-size: 1em;
            font-weight: 600;
        }

        .divided {
            position: absolute;
            top: 220px;
            width: 300px;
            height: 180px;
            display: flex;
            flex-direction: column;
            border-top: 2px solid #fff;
            padding-top: 5px;
        }

        .divided span {
            font-size: 0.8em;
            color: #fff;
        }

        .divided .buttonBox {
            margin-top: 7px;
            display: flex;
            justify-content: space-between;
        }

        .buttonBox button {
            padding: 7px;
            width: 145px;
        }

        button.downloadBtn {
            font-weight: 700;
            background-color: #abe188;
            color: #5a5353;
            border: none;
            cursor: pointer;
            transition: 0.2s ease-in-out;
        }

        button.downloadBtn:hover {
            background-color: #f7ef99;
        }

        button.followBtn {
            font-weight: 700;
            background-color: transparent;
            color: #fff;
            border: 2px solid #fff;
            cursor: pointer;
            transition: 0.2s ease-in-out;
        }

        button.followBtn:hover {
            background-color: #fff;
            color: #877633;
        }

        a.sawer {
            font-size: 9pt;
            color: #fff;
            margin-top: auto;
            border: 2px solid #fff;
            text-decoration: none;
            padding: 3px 3px;
            transition: 0.2s ease-in-out;
        }

        a.sawer:hover {
            background-color: #fff;
            color: #877633;
        }
    </style>

</head>

<body>
    <div class="card">
        <div class="contentBox">
            <div class="content">
                <h2><?= $nama; ?><br><span>Unique ID: <?= $link; ?></span><br><span>NIS: <?= $nis; ?></span></h2>

                <div class="imgBox">
                    <a href="<?= base_url(); ?>">
                        <img src="<?= base_url(); ?>assets/images/printECI/logo_brand.png" alt="logo">
                    </a>
                </div>
                <div class="scoreBox">
                    <div class="score">
                        <span class="score-type">Listening</span> <br>
                        <span class="score-value"><?= $listening; ?></span>
                    </div>
                    <div class="score">
                        <span class="score-type">Speaking</span> <br>
                        <span class="score-value"><?= $speaking; ?></span>
                    </div>
                    <div class="score">
                        <span class="score-type">Writing</span> <br>
                        <span class="score-value"><?= $writing; ?></span>
                    </div>
                    <div class="score">
                        <span class="score-type">Reading</span> <br>
                        <span class="score-value"><?= $reading; ?></span>
                    </div>
                    <div class="score">
                        <span class="score-type">Describe</span> <br>
                        <span class="score-value"><?= $describe_vocab; ?></span>
                    </div>
                </div>
                <div class="divided">
                    <span><?= $teks; ?></span>
                    <a href="https://saweria.co/romosakti" target="_blank" class="sawer">Dukung kami dalam mengembangkan aplikasi</a>
                    <div class="buttonBox">
                        <button class="downloadBtn">Download PDF</button>
                        <button class="followBtn">Follow</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="toggle">
            <span></span>
        </div>
    </div>

    <?php if (!empty($p)) : ?>
        <script>
            alert('<?= $p; ?>')
        </script>
    <?php endif; ?>

    <script>
        let card = document.querySelector('.card')
        let cardToggle = document.querySelector('.toggle')
        cardToggle.onclick = function() {
            card.classList.toggle('active')
        }

        let followBtn = document.querySelector('.followBtn')
        followBtn.onclick = function() {
            window.open('https://www.instagram.com/ach.m4d22/', '_blank');
        }

        let downloadBtn = document.querySelector('.downloadBtn')
        downloadBtn.onclick = function() {
            window.open('<?= base_url('eci/download?uniqid='); ?>' + '<?= $link; ?>', '_blank');
        }
    </script>
</body>

</html>