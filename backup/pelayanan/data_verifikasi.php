<!DOCTYPE html>
<html>
<head>
	<title>Data Verifikasi</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
	<link rel="shortcut icon" href="../img/logo_bapenda1.png">
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top " data-bs-theme="dark" style=" background-color:#ff0000; color:white; font-weight: bold;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Beranda</a>
        </li>
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
		<h1 align="center">Data Verifikasi</h1>
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
	<div class="border border-start-9 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style=" margin:auto;" >
    <div style="float:left; margin-right: 1180px ;"><h3>Data Verifikasi</h3>
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


	<table border="1" class="table table-dark table-striped">
		<tr align="center">
			<th></th>
			<th colspan="15">Belum diverifikasi</th>
			<th colspan="15">Sudah diverifikasi</th>
			<th></th>
		</tr>
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
            <th>Letak op</th>
            <th>Desa</th>
            <th>Kecamatan op</th>
            <th>RT</th>
            <th>RW</th>
            <th>BUMI</th>
            <th>BNG</th>

			<th>NOP Baru</th>
			<th>Nama</th>
			<th>Alamat</th>
            <th>Desa</th>
            <th>RT</th>
            <th>RW</th>
            <th>Kabupaten</th>
            <th>Letak op</th>
            <th>Desa</th>
            <th>Kecamatan op</th>
            <th>RT</th>
            <th>RW</th>
            <th>BUMI</th>
            <th>BNG</th>
			<th>Opsi</th>
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
				<td>
					<a class="edit" href="edit_data.php?no_pelayanan=<?php echo $data['no_pelayanan']; ?>"><button class="btn btn-success">Ubah</button></a>
					<a class="hapus" href="hapus_data.php?no_pelayanan=<?php echo $data['no_pelayanan']; ?>"><button class="btn btn-danger">Hapus</button></a>
				</td>
			</tr>
		<?php } ?>
	</table>
	</div>
    <br>
<svg id="wave" style="transform:rotate(0deg); transition: 0.3s; " viewBox="0 0 1440 300" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(255, 61.989, 0, 0.58)" offset="0%"></stop><stop stop-color="rgba(171.129, 0, 0, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,180L18.5,175C36.9,170,74,160,111,155C147.7,150,185,150,222,150C258.5,150,295,150,332,135C369.2,120,406,90,443,90C480,90,517,120,554,150C590.8,180,628,210,665,230C701.5,250,738,260,775,255C812.3,250,849,230,886,200C923.1,170,960,130,997,130C1033.8,130,1071,170,1108,160C1144.6,150,1182,90,1218,100C1255.4,110,1292,190,1329,185C1366.2,180,1403,90,1440,55C1476.9,20,1514,40,1551,55C1587.7,70,1625,80,1662,110C1698.5,140,1735,190,1772,205C1809.2,220,1846,200,1883,160C1920,120,1957,60,1994,60C2030.8,60,2068,120,2105,150C2141.5,180,2178,180,2215,185C2252.3,190,2289,200,2326,215C2363.1,230,2400,250,2437,220C2473.8,190,2511,110,2548,110C2584.6,110,2622,190,2640,230L2658.5,270L2658.5,300L2640,300C2621.5,300,2585,300,2548,300C2510.8,300,2474,300,2437,300C2400,300,2363,300,2326,300C2289.2,300,2252,300,2215,300C2178.5,300,2142,300,2105,300C2067.7,300,2031,300,1994,300C1956.9,300,1920,300,1883,300C1846.2,300,1809,300,1772,300C1735.4,300,1698,300,1662,300C1624.6,300,1588,300,1551,300C1513.8,300,1477,300,1440,300C1403.1,300,1366,300,1329,300C1292.3,300,1255,300,1218,300C1181.5,300,1145,300,1108,300C1070.8,300,1034,300,997,300C960,300,923,300,886,300C849.2,300,812,300,775,300C738.5,300,702,300,665,300C627.7,300,591,300,554,300C516.9,300,480,300,443,300C406.2,300,369,300,332,300C295.4,300,258,300,222,300C184.6,300,148,300,111,300C73.8,300,37,300,18,300L0,300Z"></path><defs><linearGradient id="sw-gradient-1" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(255, 61.989, 0, 0.45)" offset="0%"></stop><stop stop-color="rgba(255, 0, 0, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 50px); opacity:0.9" fill="url(#sw-gradient-1)" d="M0,240L18.5,220C36.9,200,74,160,111,165C147.7,170,185,220,222,240C258.5,260,295,250,332,220C369.2,190,406,140,443,115C480,90,517,90,554,105C590.8,120,628,150,665,165C701.5,180,738,180,775,190C812.3,200,849,220,886,190C923.1,160,960,80,997,45C1033.8,10,1071,20,1108,55C1144.6,90,1182,150,1218,190C1255.4,230,1292,250,1329,220C1366.2,190,1403,110,1440,100C1476.9,90,1514,150,1551,175C1587.7,200,1625,190,1662,170C1698.5,150,1735,120,1772,130C1809.2,140,1846,190,1883,205C1920,220,1957,200,1994,165C2030.8,130,2068,80,2105,60C2141.5,40,2178,50,2215,80C2252.3,110,2289,160,2326,195C2363.1,230,2400,250,2437,230C2473.8,210,2511,150,2548,150C2584.6,150,2622,210,2640,240L2658.5,270L2658.5,300L2640,300C2621.5,300,2585,300,2548,300C2510.8,300,2474,300,2437,300C2400,300,2363,300,2326,300C2289.2,300,2252,300,2215,300C2178.5,300,2142,300,2105,300C2067.7,300,2031,300,1994,300C1956.9,300,1920,300,1883,300C1846.2,300,1809,300,1772,300C1735.4,300,1698,300,1662,300C1624.6,300,1588,300,1551,300C1513.8,300,1477,300,1440,300C1403.1,300,1366,300,1329,300C1292.3,300,1255,300,1218,300C1181.5,300,1145,300,1108,300C1070.8,300,1034,300,997,300C960,300,923,300,886,300C849.2,300,812,300,775,300C738.5,300,702,300,665,300C627.7,300,591,300,554,300C516.9,300,480,300,443,300C406.2,300,369,300,332,300C295.4,300,258,300,222,300C184.6,300,148,300,111,300C73.8,300,37,300,18,300L0,300Z"></path></svg>
</body>
</html>