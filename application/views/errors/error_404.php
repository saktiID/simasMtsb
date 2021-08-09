<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Page Not Found</title>

    <style>
        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .container {
            height: 100vh;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        h1 {
            font-weight: bolder;
            font-size: 48pt;
        }

        .img {
            height: 400px;
            width: 100%;
            background: no-repeat;
            background-position: center;
            background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
        }

        h5 {
            font-size: 22pt;
        }

        p {
            font-size: 15pt;
            margin-bottom: 20px;
        }

        a {
            text-decoration: none;
            background-color: #4858;
            padding: 10px;
            margin-top: 15px;
            margin-bottom: 15px;
            color: #FFF;
            border-radius: 10px;
        }

        a:hover {
            background-color: #8568;
        }
    </style>

</head>

<body>



    <section>
        <div class="container">
            <h1>Error 404</h1>
            <div class="img"></div>
            <h5>Sepertinya Anda Tersesat</h5>
            <p>Halaman yang Anda cari tidak ditemukan!</p>
            <a href="<?= base_url(); ?>">Kembali ke beranda</a>
        </div>
    </section>
</body>

</html>