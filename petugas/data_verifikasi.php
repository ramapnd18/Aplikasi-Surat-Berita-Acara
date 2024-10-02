<!DOCTYPE html>
<html>
<head>
	<title>Data Verifikasi</title>
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
		<h1 align="center" style="color:white;">Data Verifikasi</h1>
	</div>
	<br>

<?php
//menghubungkan php dengan koneksi database
include '../koneksi.php';
//
error_reporting();
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
	<div class="border border-start-9 shadow-lg p-3 mb-5 bg-body-tertiary rounded " style=" margin:5em;" >
    <div style="width: 300px;"><h3>Data Verifikasi</h3>
      <div class="container-fluid">
      <form action="" method="GET" class="d-flex">
        
          <input type="text" name="cari" placeholder="Pencarian" class="form-control me-2 mb-3">
          <button class="btn btn-outline-secondary btn-sm mb-3" type="submit"><img src="../img/search.png" alt="cari" style="width:20px;"></button>
      </form class="mb-3">
      </div>
    </div >
    
    <?php 
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>

<div class="table-responsive">
	<table border="1" class="table table-dark table-striped">
		<tr>
			<th>No</th>
			<th>No Pelayanan</th>
			<th>Jenis Pelayanan</th>
			<th>NOP Lama</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Desa</th>
      <th>RT</th>
      <th>RW</th>
      <th>Kabupaten</th>
      <th>Letak objek</th>
      <th>Desa</th>
      <th>Kecamatan</th>
      <th>RT</th>
      <th>RW</th>
      <th>Tanah m<sup>2</sup></th>
      <th>Bangunan m<sup>2</sup></th>

			<th>NOP Baru</th>
			<th>Nama</th>
			<th>Alamat</th>
      <th>Desa</th>
      <th>RT</th>
      <th>RW</th>
      <th>Kabupaten</th>
      <th>Letak objek</th>
      <th>Desa</th>
      <th>Kecamatan</th>
      <th>RT</th>
      <th>RW</th>
      <th>Tanah m<sup>2</sup></th>
      <th>Bangunan m<sup>2</sup></th>
      <th>Perubah</th>
			<th>Opsi </th>
		</tr>
		<?php

		include "../koneksi.php";
		// $sql = "SELECT * FROM pelayanan INNER JOIN data_baru ON pelayanan.id_data_baru = data_baru.id_data_baru INNER JOIN data_lama ON pelayanan.nop_lama = data_lama.nop_lama";
		// $result = mysqli_query($koneksi,$sql);
    if(isset($_GET['cari'])){
			$cari = $_GET['cari'];
			$result = mysqli_query($koneksi,"SELECT * FROM pelayanan INNER JOIN data_baru ON pelayanan.id_data_baru = data_baru.id_data_baru INNER JOIN data_lama ON pelayanan.id_data_lama = data_lama.id_data_lama 
      where no_pelayanan like '%".$cari."%' 
      OR jenis_pelayanan like '%".$cari."%' 
      OR nama_wp_lama like '%".$cari."%' 
      OR nama_wp_baru like '%".$cari."%' 
      OR desa_op_baru like '%".$cari."%' 
      OR desa_op_lama like '%".$cari."%' 
      OR nop_baru like '%".$cari."%' 
      OR nop_lama like '%".$cari."%' 
      ");				
		}else{
			$result = mysqli_query($koneksi,"SELECT * FROM pelayanan INNER JOIN data_baru ON pelayanan.id_data_baru = data_baru.id_data_baru INNER JOIN data_lama ON pelayanan.id_data_lama = data_lama.id_data_lama");		
		}    

		$nomor = 1;
		while ($data = mysqli_fetch_assoc($result)) {
			
		
		?>
			<tr>
				<td><?php echo $nomor++; ?></td>
				<td><?php echo $data['no_pelayanan']; ?></td>
				<td><?php echo $data['jenis_pelayanan']; ?></td>
				<td><?php echo $data['nop_lama']; ?></td>
                <td><?php echo $data['nama_wp_lama']; ?></td>
                <td><?php echo $data['alamat_lama']; ?></td>
                <td><?php echo $data['desa_wp_lama']; ?></td>
                <td><?php echo $data['rt_wp_lama']; ?></td>
                <td><?php echo $data['rw_wp_lama']; ?></td>
                <td><?php echo $data['kabupaten_lama']; ?></td>
				<td><?php echo $data['letak_op_lama']; ?></td>
                <td><?php echo $data['desa_op_lama']; ?></td>
                <td><?php echo $data['kecamatan_lama']; ?></td>
                <td><?php echo $data['rt_op_lama']; ?></td>
                <td><?php echo $data['rw_op_lama']; ?></td>
                <td><?php echo $data['bumi_lama']; ?></td>
                <td><?php echo $data['bangunan_lama']; ?></td>

				<td><?php echo $data['nop_baru']; ?></td>
                <td><?php echo $data['nama_wp_baru']; ?></td>
                <td><?php echo $data['alamat_baru']; ?></td>
                <td><?php echo $data['desa_wp_baru']; ?></td>
                <td><?php echo $data['rt_wp_baru']; ?></td>
                <td><?php echo $data['rw_wp_baru']; ?></td>
                <td><?php echo $data['kabupaten_baru']; ?></td>
				<td><?php echo $data['letak_op_baru']; ?></td>
                <td><?php echo $data['desa_op_baru']; ?></td>
                <td><?php echo $data['kecamatan_baru']; ?></td>
                <td><?php echo $data['rt_op_baru']; ?></td>
                <td><?php echo $data['rw_op_baru']; ?></td>
                <td><?php echo $data['bumi_baru']; ?></td>
                <td><?php echo $data['bangunan_baru']; ?></td>
                <td><?php echo $data['perubah']; ?></td>
				<td>
					<a class="edit" href="edit_data.php?no_pelayanan=<?php echo $data['no_pelayanan']; ?>"><button class="btn btn-success" style="width: 71px;">Ubah</button></a>
					<a class="hapus" href="hapus_data.php?no_pelayanan=<?php echo $data['no_pelayanan']; ?>"><button class="btn btn-danger" style="width: 71px;">Hapus</button></a>
          <a href="tambah_verifikasi.php?no_pelayanan=<?php echo $data['no_pelayanan']; ?>" class="tombol"><button class="btn btn-primary" style="width: 71px;">Verif</button></a>
				</td>
			</tr>
		<?php } ?>
	</table>
  </div>
	</div>
    <br>

</body>
</html>