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


		<?php
		include 'conn/koneksi.php';
		if (@$_GET['p'] == "") {
			include_once 'login.php';
		} elseif (@$_GET['p'] == "login") {
			include_once 'login.php';
		} elseif (@$_GET['p'] == "logout") {
			include_once 'logout.php';
		}
		?>

	</div>
</body>

</html>
<div class="card" style="padding: 45px; width: 30%; margin: 0 auto; margin-top: 5%;">
	<h3 style="text-align: center;" class="dark-text">Login!</h3>
	<br>

	<form method="POST">
		<div class="input_field">
			<label for="username">Username</label>
			<input id="username" type="text" name="username" required>
		</div>
		<div class="input_field">
			<label for="password">Passowrd</label>
			<input id="password" type="password" name="password" required>
		</div>
		<input type="submit" name="login" value="Login" class="btn red" style="width: 100%;">
	</form>
	<br>
	<center> <a href="registrasi.php" class="register-link ">Belum punya akun? Registrasi!</a> </center>
	</br>
</div>
<?php
if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$password = mysqli_real_escape_string($koneksi, md5($_POST['password']));

	$sql = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE username='$username' AND password='$password' ");
	$cek = mysqli_num_rows($sql);
	$data = mysqli_fetch_assoc($sql);

	$sql2 = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username' AND password='$password' ");
	$cek2 = mysqli_num_rows($sql2);
	$data2 = mysqli_fetch_assoc($sql2);
	$data3 = mysqli_fetch_object($sql2);

	if ($cek > 0) {
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['data'] = $data;
		$_SESSION['level'] = 'masyarakat';
		header('location:masyarakat/');
	} elseif ($cek2 > 0) {
		if ($data2['level'] == "admin") {
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['data'] = $data2;
			$_SESSION['level_admin'] = $data3['admin'];
			$_SESSION['level_petugas'] = $data3['petugas'];
			header('location:admin/');
		} elseif ($data2['level'] == "petugas") {
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['data'] = $data2;
			$_SESSION['level_admin'] = $data3->level == "admin";
			$_SESSION['level_petugas'] = $data3->level == "petugas";
			header('location:petugas/');
		}
	} else {
		echo "<script>alert('Gagal Login')</script>";
	}
}
?>