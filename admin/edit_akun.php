<?php 
//
include '../koneksi.php';
//
error_reporting();
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
	<title>Ubah Pengguna</title>
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
		<h1 align="center" style="color:white;">Ubah Data akun</h1>
	</div>

	<br>
	<?php  
include '../koneksi.php';
$id_user = $_GET['id_user'];
$sql = "SELECT * from akun where id_user='$id_user'";
$result = mysqli_query($koneksi, $sql);
$nomor = 1;
while ($data = mysqli_fetch_assoc($result)) {
	?>
	<div class="border border-start-9 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width:350px; margin:auto;">
		<form action="update_akun.php" method="post">
		<table class="table table-borderless">
			<tr>
				<td>
					<input type="hidden" name="id_user" value="<?php echo $data['id_user'] ?>">
				</td>
			</tr>
			<tr>
				<td>Nama Pengguna</td>
				<td><input type="text" name="username" value="<?php echo $data['username'] ?>" class="form-control"></td>
			</tr>
			<tr>
				<td>Kata Sandi</td>
				<td><input type="password" name="password" value="<?php echo $data['password'] ?>" class="form-control"></td>
			</tr>
            <tr>
                <td><label>Jenis Akun</label></td>
                <td>
                <div class="d-grid gap-2 mb-3">
                <select name="level" id=""  class="form-control">
                    <option value="<?php echo $data['level'] ?>"><?php echo $data['level'] ?></option>
                    <option value="pelayanan">Pelayanan</option>
                    <option value="petugas">Petugas Verifikasi</option>
                </select>
			    </div>
                </td>
            </tr>
			<tr>
				<td colspan="2">
                <div class="d-grid gap-2">
					<input type="submit" name="Simpan" class="btn btn-success mg-auto">
			    </div>
                </td>
			</tr>
		</table>
		</form>
		<a href="akun.php" class="tombol"><button class="btn btn-primary" style="padding:0px 5px; margin-top: 5px;">Lihat semua data <--</button></a>
	</div>
<?php } ?>


</body>
</html>