<!DOCTYPE html>
<html>
<head>
	<title>Hasil Verifikasi</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="shortcut icon" href="../img/logo_bapenda1.png">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-image: url('../img/bg3.png'); background-size:30em;">

<nav class="navbar navbar-expand-lg sticky-top "  data-bs-theme="dark" style="background-color:#62120e; color:white; font-weight: bold;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../img/Profile.png" alt="" style="margin-top:-10px; width :40px;"> Petugas</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Beranda</a>
        </li>
        <div class="dropdown">
          
          <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Tambah Data Objek
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="input_databaru.php">Data Baru</a></li>
            <li><a class="dropdown-item" href="input_pembetulan.php">Pembetulan</a></li>
            <li><a class="dropdown-item" href="input_pembatalan.php">Pembatalan</a></li>
          </ul>
        </div>
        <li class="nav-item">
          <a class="nav-link active" href="data_verifikasi.php">Data Verifikasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="hasil_verifikasi.php">Hasil Verifikasi</a>
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
		<h1 align="center" style="color:white;">Hasil Verifikasi</h1>
	</div>
	<br>

<?php
//menghubungkan php dengan koneksi database
include '../koneksi.php';
//
error_reporting(0);
//mengaktifkan session pada php
session_start();
//
if ($_SESSION['level']=="") {
	header("location:index.php?pesan=login");
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
	<div class="border border-start-9 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style=" margin:0 5em;" >
    <div style=" ">
		<div style=""><h3>Data Verifikasi</h3></div>
	</div>
		<div style="float:right; margin-left:500px;" class="">
		</div>
		<form action="" method="GET" class="d-flex">
			
			<input type="text" name="cari" placeholder="Pencarian" class="form-control me-2 mb-3" style="width:15rem;">
			<button class="btn btn-outline-secondary btn-sm me-2 mb-3" type="submit"><img src="../img/search.png" alt="cari" style="width:20px;"></button>
		</form class="mb-3">
		

	<?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>


	<table border="1" class="table table-dark table-striped">
		<tr>
			<th>No</th>
			<th>No Surat</th>
			<th>No Pelayanan</th>
			<th>Jenis Pelayanan</th>
			<th>Status</th>
            <th>Hasil</th>
            <th>Petugas</th>
            <th>Opsi</th>
		</tr>
		<?php

		include "../koneksi.php";
    if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
		$result = mysqli_query($koneksi,"SELECT * FROM hasil_verifikasi INNER JOIN pelayanan ON hasil_verifikasi.no_pelayanan = pelayanan.no_pelayanan INNER JOIN akun ON hasil_verifikasi.id_user = akun.id_user 
  where hasil_verifikasi.no_pelayanan like '%".$cari."%' 
  OR jenis_pelayanan like '%".$cari."%' 
  OR username like '%".$cari."%' 
  OR hasil like '%".$cari."%' 
  OR status like '%".$cari."%'
  ");				
	}else{
		$result = mysqli_query($koneksi,"SELECT * FROM hasil_verifikasi INNER JOIN pelayanan ON hasil_verifikasi.no_pelayanan = pelayanan.no_pelayanan INNER JOIN akun ON hasil_verifikasi.id_user = akun.id_user");		
	}   

		$nomor = 1;
		while ($data = mysqli_fetch_assoc($result)) {
			
		
			?>
			<tr>
				<td><?php echo $nomor++; ?></td>
				<td><?php echo $data['id_verifikasi']; ?></td>
				<td><?php echo $data['no_pelayanan']; ?></td>
				<td><?php echo $data['jenis_pelayanan']; ?></td>
                <td><?php echo $data['status']; ?></td>
                <td><?php echo $data['hasil']; ?></td>
                <td><?php echo $data['username']; ?></td>
				<td>
					<a class="edit" href="edit_verifikasi.php?id_verifikasi=<?php echo $data['id_verifikasi']; ?>"><button class="btn btn-success">Ubah</button></a>
					<a class="hapus" href="hapus_verifikasi.php?no_pelayanan=<?php echo $data['no_pelayanan']; ?>"><button class="btn btn-danger">Hapus</button></a>
					<a class="cetak" target="_blank" href="berita_acara.php?id_verifikasi=<?php echo $data['id_verifikasi']; ?>"><button class="btn btn-warning">Cetak</button></a>
				</td>
			</tr>
		<?php } ?>
	</table>
	</div>
    <br>
</body>
</html>  