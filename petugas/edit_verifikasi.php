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
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Hasil Verifikasi</title>
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
		<h1 align="center" style="color:white;">Ubah Hasil Verifikasi</h1>
	</div>

	<br>
	<?php  
include '../koneksi.php';
$id_verifikasi = $_GET['id_verifikasi'];
$sql = "SELECT * FROM hasil_verifikasi INNER JOIN pelayanan ON hasil_verifikasi.no_pelayanan = pelayanan.no_pelayanan INNER JOIN akun ON hasil_verifikasi.id_user = akun.id_user where id_verifikasi='$id_verifikasi'";
$result = mysqli_query($koneksi, $sql);
$nomor = 1;
while ($data = mysqli_fetch_assoc($result)) {
	?>
	<div class="border border-start-9 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width: 300px; margin:auto;">
        <form action="update_verifikasi.php" method="POST" class="row">
            <div class="mb-3">
                <input type="hidden" class="form-control"placeholder="" name="id_verifikasi" value="<?php echo $data['id_verifikasi']?>" >
            </div>
            <div class="mb-3">
                <label class="form-label">NO Pelayanan</label>      
                <input type="text" class="form-control"placeholder="NO Pelayanan" name="no_pelayanan" value="<?php echo $data['no_pelayanan']?>" >
            </div>
                <div class="d-grid gap-2 mb-3">
                <label>Status</label>
                <select name="status" id="" class="form-control">
                    <option value="<?php echo $data['status']  ?>"><?php echo $data['status']  ?></option>
                    <option value="DIKABULKAN">Dikabulkan</option>
                    <option value="DITUNDA">Ditunda</option>
                </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hasil Verifikasi</label>
                    <textarea class="form-control" placeholder="" style="height: 100px" name="hasil" required><?php echo $data['hasil']?></textarea>
                </div>    
                <div class="mb-3">
                    <input type="hidden" class="form-control" placeholder="Petugas" name="id_user" value="<?php echo $data['id_user']?>" >
                </div> 
                <div class="d-grid gap-2 mt-3">
                    <button name="submit" class="btn btn-success">Simpan</button>	
                </div>
              </form>
              <a href="hasil_verifikasi.php" class="tombol"><button class="btn btn-primary" style="padding:0px 5px; margin-top: 5px;">Lihat semua data <--</button></a>
          </div>
    </div>
<?php } ?>

</body>
</html>