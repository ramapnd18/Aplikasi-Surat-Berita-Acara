<?php 
//
include '../koneksi.php';
//
error_reporting(0);
//
session_start();
//
if ($_SESSION['level']=="") {
	header("location:../index.php?pesan=login");
}

if (isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
    $level = $_POST['level'];

	$sql = "SELECT * from akun where username='$username'";
	$result = mysqli_query($koneksi,$sql);

	if (!$result->num_rows>0) {
		$sql = "INSERT INTO akun (id_user, username, password, level) values ('', '$username','$password', '$level') ";
		$result = mysqli_query($koneksi, $sql);

		//
		if ($result) {
			header("location:akun.php?pesan=input");
		//
		} else {
				echo "<script>alert('Woops!, Terjadi Kesalahan')</script>";
		}
	//
	}else{
			echo "<script>alert('Woops!, Nama Pengguna Sudah Terdaftar')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Input Pengguna</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="shortcut icon" href="../img/logo_bapenda1.png">
	<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-image: url('../img/bg3.png'); background-size:30em;">
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
	<div class="judul">
		<h1 align="center" style="color:white;">Tambah Data Akun</h1>
	</div>

	<br>

	<div class="border border-start-0 shadow-lg p-3  bg-body-tertiary rounded" style="width:300px; margin:auto;">
		<form action="" method="POST" class="login-email">
			<div class="mb-3">
				<label class="form-label">Nama Pengguna</label>
				<input type="text" class="form-control"placeholder="Nama Pengguna" name="username" value="<?php echo $username;  ?>" required>
			</div>
			<div class="mb-3">
				<label class="form-label">Kata Sandi</label>
				<input type="password" class="form-control" placeholder="Kata Sandi" name="password" value="<?php echo $_POST['password'];  ?>" required>
			</div>
			
            <div class="d-grid gap-2 mb-3">
				<label>Jenis Akun</label>
                <select name="level" id="" class="form-control">
                    <option value="">Pilih</option>
                    <option value="pelayanan">Pelayanan</option>
                    <option value="petugas">Petugas Verifikasi</option>
                </select>
			</div>
            <div class="d-grid gap-2">
				<button name="submit" class="btn btn-success">Simpan</button>	
			</div>
		</form>
		<a href="akun.php" class="tombol"><button class="btn btn-primary" style="padding:0px 5px; margin-top: 5px;">Lihat semua data <--</button></a>
	</div>
    <br>
</body>
</html>