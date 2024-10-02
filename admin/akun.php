<!DOCTYPE html>
<html>
<head>
	<title>Data Pengguna</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="shortcut icon" href="../img/logo_bapenda1.png">
	<script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
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
		<h1 align="center" style="color:white;">Data Pengguna</h1>
	</div>
	<br>

<?php
include '../koneksi.php';
//
error_reporting(0);
//
session_start();
//
if ($_SESSION['level']=="") {
	header("location:../index.php?pesan=login");
}

if (isset($_GET['pesan'])) {
	$pesan = $_GET['pesan'];
	if ($pesan == "input") {
		echo "<div class='text-bg-primary p-3' style='text-align: center;'>Data berhasil di tambahkan.</div>";
	}else if ($pesan == "update") {
		echo "<div class='text-bg-success p-3' style='text-align: center;'>Data berhasil di update.</div>";
	}else if ($pesan == "hapus") {
		echo "<div class='text-bg-danger p-3' style='text-align: center;'>Data berhasil di hapus.</div>";
	}
}
?>
	<br>
	<div class="border border-start-9 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width:auto; margin:0 5em ;" >
		<div style="float:left; "><h3>Data Pengguna</h3>
		<div class="">
		<form action="" method="GET" class="d-flex">
			<input type="text" name="cari" placeholder="Pencarian" class="form-control me-2 mb-3">
			<button class="btn btn-outline-secondary btn-sm mb-3" type="submit"><img src="../img/search.png" alt="cari" style="width:20px;"></button>
		</form>
		<a href="tambah_akun.php" class="tombol"><button class="btn btn-primary" style="padding:0px 5px; margin: 5px;">+ Tambah Data Baru <--</button></a>
		</div>
		</div>
	
	
<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>

	<table border="1" class="table table-dark table-striped" >
		<tr>
			<th>No</th>
			<th>Nama Pengguna</th>
			<th>Kata Sandi</th>
            <th>Jenis Akun</th>
			<th>Opsi</th>
		</tr>
		<?php

		include "../koneksi.php";
		if(isset($_GET['cari'])){
			$cari = $_GET['cari'];
			$result = mysqli_query($koneksi,"SELECT * from akun where level IN('pelayanan','petugas') and (username like '%".$cari."%' or level like '%".$cari."%')");				
		}else{
			$result = mysqli_query($koneksi,"SELECT * from akun where level IN('pelayanan','petugas')");		
		}

		$nomor = 1;
		while ($data = mysqli_fetch_assoc($result)) {
			
		
		?>
			<tr>
				<td><?php echo $nomor++; ?></td>
				<td><?php echo $data['username']; ?></td>
				<td><?php echo $data['password']; ?></td>
                <td><?php echo $data['level']; ?></td>
				<td>
					<a class="edit" href="edit_akun.php?id_user=<?php echo $data['id_user']; ?>"><button class="btn btn-success">Ubah</button></a>
					<a class="hapus" href="hapus_akun.php?id_user=<?php echo $data['id_user']; ?>"><button class="btn btn-danger">Hapus</button></a>
				</td>
			</tr>
		<?php } ?>
	</table>
	</div>
    <br>
</body>
</html>