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
<body>
<nav class="navbar navbar-expand-lg sticky-top "  data-bs-theme="dark" style="background-color:#ff0000;  color: rgb(255, 255, 255); font-weight: bold;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Beranda</a>
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
		<h1 align="center">Ubah Data akun</h1>
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
<svg id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 300" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(255, 61.989, 0, 0.58)" offset="0%"></stop><stop stop-color="rgba(171.129, 0, 0, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,180L18.5,175C36.9,170,74,160,111,155C147.7,150,185,150,222,150C258.5,150,295,150,332,135C369.2,120,406,90,443,90C480,90,517,120,554,150C590.8,180,628,210,665,230C701.5,250,738,260,775,255C812.3,250,849,230,886,200C923.1,170,960,130,997,130C1033.8,130,1071,170,1108,160C1144.6,150,1182,90,1218,100C1255.4,110,1292,190,1329,185C1366.2,180,1403,90,1440,55C1476.9,20,1514,40,1551,55C1587.7,70,1625,80,1662,110C1698.5,140,1735,190,1772,205C1809.2,220,1846,200,1883,160C1920,120,1957,60,1994,60C2030.8,60,2068,120,2105,150C2141.5,180,2178,180,2215,185C2252.3,190,2289,200,2326,215C2363.1,230,2400,250,2437,220C2473.8,190,2511,110,2548,110C2584.6,110,2622,190,2640,230L2658.5,270L2658.5,300L2640,300C2621.5,300,2585,300,2548,300C2510.8,300,2474,300,2437,300C2400,300,2363,300,2326,300C2289.2,300,2252,300,2215,300C2178.5,300,2142,300,2105,300C2067.7,300,2031,300,1994,300C1956.9,300,1920,300,1883,300C1846.2,300,1809,300,1772,300C1735.4,300,1698,300,1662,300C1624.6,300,1588,300,1551,300C1513.8,300,1477,300,1440,300C1403.1,300,1366,300,1329,300C1292.3,300,1255,300,1218,300C1181.5,300,1145,300,1108,300C1070.8,300,1034,300,997,300C960,300,923,300,886,300C849.2,300,812,300,775,300C738.5,300,702,300,665,300C627.7,300,591,300,554,300C516.9,300,480,300,443,300C406.2,300,369,300,332,300C295.4,300,258,300,222,300C184.6,300,148,300,111,300C73.8,300,37,300,18,300L0,300Z"></path><defs><linearGradient id="sw-gradient-1" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(255, 61.989, 0, 0.45)" offset="0%"></stop><stop stop-color="rgba(255, 0, 0, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 50px); opacity:0.9" fill="url(#sw-gradient-1)" d="M0,240L18.5,220C36.9,200,74,160,111,165C147.7,170,185,220,222,240C258.5,260,295,250,332,220C369.2,190,406,140,443,115C480,90,517,90,554,105C590.8,120,628,150,665,165C701.5,180,738,180,775,190C812.3,200,849,220,886,190C923.1,160,960,80,997,45C1033.8,10,1071,20,1108,55C1144.6,90,1182,150,1218,190C1255.4,230,1292,250,1329,220C1366.2,190,1403,110,1440,100C1476.9,90,1514,150,1551,175C1587.7,200,1625,190,1662,170C1698.5,150,1735,120,1772,130C1809.2,140,1846,190,1883,205C1920,220,1957,200,1994,165C2030.8,130,2068,80,2105,60C2141.5,40,2178,50,2215,80C2252.3,110,2289,160,2326,195C2363.1,230,2400,250,2437,230C2473.8,210,2511,150,2548,150C2584.6,150,2622,210,2640,240L2658.5,270L2658.5,300L2640,300C2621.5,300,2585,300,2548,300C2510.8,300,2474,300,2437,300C2400,300,2363,300,2326,300C2289.2,300,2252,300,2215,300C2178.5,300,2142,300,2105,300C2067.7,300,2031,300,1994,300C1956.9,300,1920,300,1883,300C1846.2,300,1809,300,1772,300C1735.4,300,1698,300,1662,300C1624.6,300,1588,300,1551,300C1513.8,300,1477,300,1440,300C1403.1,300,1366,300,1329,300C1292.3,300,1255,300,1218,300C1181.5,300,1145,300,1108,300C1070.8,300,1034,300,997,300C960,300,923,300,886,300C849.2,300,812,300,775,300C738.5,300,702,300,665,300C627.7,300,591,300,554,300C516.9,300,480,300,443,300C406.2,300,369,300,332,300C295.4,300,258,300,222,300C184.6,300,148,300,111,300C73.8,300,37,300,18,300L0,300Z"></path></svg>


</body>
</html>