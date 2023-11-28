<?php
include 'conn/koneksi.php'
?>
<!DOCTYPE html>
<html>

<head>
    <title>WEB Pengaduan Masyarakat</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <link href="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">

</head>

<body style="background-image: url(img/pexels-jeffry-surianto-9105274.jpg); background-size: cover;">

    <div class="container">




    </div>
</body>

</html>
<div class="card" style="padding: 60px; width: 35%; margin: 0 auto; margin-top: 0%;">
    <h3 style="text-align: center;" class="dark-text">Registrasi!</h3>
    <form method="POST">
        <div class="col s12 input-field">
            <input id="nik" type="number" name="nik" placeholder="NIK">
        </div>
        <div class="col s12 input-field">
            <input id="nama" type="text" name="nama" placeholder="Nama">
        </div>
        <div class="col s12 input-field">
            <input id="username" type="text" name="username" placeholder="Username">
        </div>
        <div class="col s12 input-field">
            <input id="password" type="password" name="password" placeholder="Password">
        </div>
        <div class="col s12 input-field">
            <input id="telp" type="number" name="telp" placeholder="Telp">
        </div>
        <div class="col s12 input-field">
            <input type="submit" name="simpan" value="Registrasi" class="btn right red">
        </div>
    </form>
    <a href="login.php" class="login-link left">Sudah punya akun? Login!</a>
    <?php

    if (isset($_POST['simpan'])) {
        $password = md5($_POST['password']);

        $query = mysqli_query($koneksi, "INSERT INTO masyarakat VALUES ('" . $_POST['nik'] . "','" . $_POST['nama'] . "','" . $_POST['username'] . "','" . $password . "','" . $_POST['telp'] . "')");
        if ($query) {
            echo "<script>alert('Data Tesimpan')</script>";
            echo "<script>location='location:index.php?p=registrasi';</script>";
        }
    }
    ?>
</div>