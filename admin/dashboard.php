<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
  <link rel="shortcut icon" href="../img/logo_bapenda1.png">
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('../img/bg3.png'); background-size:30em;">
	<?php
session_start();

//cek apakah yang mengakses halaman ini sudah login
if ($_SESSION['level'] == "") {
	header("location:index.php?pesan=gagal");
}
?>

<nav class="navbar navbar-expand-lg sticky-top "  data-bs-theme="dark" style="background-color:#62120e; color:white; font-weight: bold;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../img/Profile.png" alt="" style="margin-top:-10px; width :40px;"> Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="akun.php">Akun</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../logout.php">Keluar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<br>
<section class="jumbotron text-center">
  <div style="margin:auto; width: 326px;"><img src="../img/logo_bapenda.png" style="width:326px;" class="rounded-circle img-thumbnail"></div>
  <br>
  <h1 align="center" style="color:white;">Selamat Datang</h1> 
    <h2 align="center" style="color:white;">Di SI Pengelola Data Verifikasi Objek PBB-P2</h2>
</section>
</body>
</html>