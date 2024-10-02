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
	$no_pelayanan = $_POST['no_pelayanan'];
	$status = $_POST['status']; 
  $hasil  = $_POST['hasil'];
  $id_user = $_SESSION['id_user'];
    
  $sql = "SELECT * from hasil_verifikasi where no_pelayanan='$no_pelayanan'";
	$result = mysqli_query($koneksi,$sql);

	if (!$result->num_rows>0) {
		//Masukan Data ke tabel hasil_verifikasi
        $sql = "INSERT INTO hasil_verifikasi (id_verifikasi, no_pelayanan, status, hasil, id_user) values ('', '$no_pelayanan', '$status', '$hasil', '$id_user') ";
		$result = mysqli_query($koneksi, $sql);

		//
		if ($result) {
			header("location:hasil_verifikasi.php?pesan=input");
		//
		} else {
				echo "<script>alert('Woops!, Terjadi Kesalahan')</script>";
		}
	//
	}else{
			echo "<script>alert('Woops!, no_pelayanan Sudah Terdaftar')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Hasil Verifikasi</title>
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
		<h1 align="center" style="color:white;">Tambah Hasil Verifikasi</h1>
	</div>
  <?php
  $no_pelayanan = $_GET['no_pelayanan'];
$sql = "SELECT * FROM pelayanan where no_pelayanan='$no_pelayanan'";
$result = mysqli_query($koneksi, $sql);

while ($data = mysqli_fetch_assoc($result)) {
?>
	<br>
    <div class="border border-start-9 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width: 300px; margin:auto;">
        <form action="" method="POST" class="row">
            <div class="mb-3">
                <label class="form-label">No Pelayanan</label>
                <input type="text" class="form-control"placeholder="no_pelayanan" name="no_pelayanan" value="<?php echo $data['no_pelayanan']  ?>"  required>
            </div>
            <div class="d-grid gap-2 mb-3">
			      <label>Status</label>
            <select name="status" id="" class="form-control">
                <option value="<?php echo $status  ?>">Pilih</option>
                <option value="DIKABULKAN">Dikabulkan</option>
                <option value="DITUNDA">Ditunda</option>
            </select>
			      </div>
            <div class="mb-3">
              <label class="form-label">Hasil Verifikasi</label>
              <textarea class="form-control" placeholder="" style="height: 100px" name="hasil" required><?php echo $hasil  ?></textarea>
            </div>
            <div class="d-grid gap-2 mt-3">
                <button name="submit" class="btn btn-success">Simpan</button>	
            </div>
        </form>
    </div>
  <?php } ?>
    <br>
</body>
</html>