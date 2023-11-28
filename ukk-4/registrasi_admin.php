<?php
include 'conn/koneksi.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="background-image: url(img/pexels-jeffry-surianto-9105274.jpg); background-size: cover;">

    <div class="container">




    </div>
</body>

</html>
<div class="card" style="padding: 60px; width: 35%; margin: 0 auto; margin-top: 4%;">
    <h3 style="text-align: center;" class="dark-text">Registrasi!</h3>
    <h4>Add</h4>
    <form method="POST">
        <div class="col s12 input-field">
            <label for="nama">Nama</label>
            <input id="nama" type="text" name="nama">
        </div>
        <div class="col s12 input-field">
            <label for="username">Username</label>
            <input id="username" type="text" name="username"><br><br>
        </div>
        <div class="col s12 input-field">
            <label for="password">Password</label>
            <input id="password" type="password" name="password"><br><br>
        </div>
        <div class="col s12 input-field">
            <label for="telp">Telp</label>
            <input id="telp" type="number" name="telp"><br><br>
        </div>

        <div class="col s12 input-field">
            <select class="default" name="level">
                <option selected disabled="">Pilih Level</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
        </div>
        <div class="col s12 input-field">
            <input type="submit" name="simpan" value="Simpan" class="btn right">
        </div>
    </form>
    </form>
    <a href="login.php" class="login-link left">Sudah punya akun? Login!</a>
    <?php

    if (isset($_POST['simpan'])) {
        $password = md5($_POST['password']);

        $query = mysqli_query($koneksi, "INSERT INTO petugas VALUES (NULL,'" . $_POST['nama_petugas'] . "','" . $_POST['username'] . "','" . $password . "','" . $_POST['telp_petugas'] . "','" . $_POST['level'] . "')");
        if ($query) {
            echo "<script>alert('Data Ditambahkan')</script>";
            echo "<script>location='registrasi_admin.php?p=user'</script>";
        }
    }
    ?>
</div>