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
	$jenis_pelayanan = $_POST['jenis_pelayanan']; 
	$nop_lama = $_POST['nop_lama']; 
    $nama_wp_lama  = $_POST['nama_wp_lama']; 
    $alamat_lama = $_POST['alamat_lama']; 
    $desa_wp_lama = $_POST['desa_wp_lama']; 
    $rt_wp_lama = $_POST['rt_wp_lama']; 
    $rw_wp_lama = $_POST['rw_wp_lama']; 
    $kabupaten_lama = $_POST['kabupaten_lama']; 
    $letak_op_lama = $_POST['letak_op_lama']; 
    $desa_op_lama = $_POST['desa_op_lama']; 
    $rt_op_lama = $_POST['rt_op_lama']; 
    $rw_op_lama = $_POST['rw_op_lama']; 
    $kecamatan_lama = $_POST['kecamatan_lama']; 
    $bumi_lama = $_POST['bumi_lama']; 
    $bangunan_lama = $_POST['bangunan_lama']; 
    $nop_baru = $_POST['nop_baru']; 
    $nama_wp_baru  = $_POST['nama_wp_baru']; 
    $alamat_baru = $_POST['alamat_baru']; 
    $desa_wp_baru = $_POST['desa_wp_baru']; 
    $rt_wp_baru = $_POST['rt_wp_baru']; 
    $rw_wp_baru = $_POST['rw_wp_baru']; 
    $kabupaten_baru = $_POST['kabupaten_baru']; 
    $letak_op_baru = $_POST['letak_op_baru']; 
    $desa_op_baru = $_POST['desa_op_baru']; 
    $rt_op_baru = $_POST['rt_op_baru']; 
    $rw_op_baru = $_POST['rw_op_baru']; 
    $kecamatan_baru = $_POST['kecamatan_baru']; 
    $bumi_baru = $_POST['bumi_baru']; 
    $bangunan_baru = $_POST['bangunan_baru']; 
    
    $sql = "SELECT * from  where no_pelayanan='$no_pelayanan'";
	$result = mysqli_query($koneksi,$sql);

	if (!$result->num_rows>0) {
        //Masukan Data ke tabel data_lama
        $sql = "INSERT INTO data_lama (id_data_lama, nop_lama, nama_wp_lama, alamat_lama, desa_wp_lama, rt_wp_lama, rw_wp_lama, kabupaten_lama, letak_op_lama, desa_op_lama, rt_op_lama, rw_op_lama, kecamatan_lama, bumi_lama, bangunan_lama)
        values ('','$nop_lama', '$nama_wp_lama', '$alamat_lama', '$desa_wp_lama', '$rt_wp_lama', '$rw_wp_lama', '$kabupaten_lama', '$letak_op_lama', '$desa_op_lama', '$rt_op_lama', '$rw_op_lama', '$kecamatan_lama', '$bumi_lama', '$bangunan_lama')";
        $result = mysqli_query($koneksi, $sql);

        $result = mysqli_query($koneksi,"SELECT * FROM data_lama where nop_lama='$nop_lama'");		
        $data = mysqli_fetch_assoc($result);
        $id_lama = $data['id_data_lama'];

        //Masukan Data ke tabel data_baru
        $sql = "INSERT INTO data_baru (id_data_baru, nop_baru, nama_wp_baru, alamat_baru, desa_wp_baru, rt_wp_baru, rw_wp_baru, kabupaten_baru, letak_op_baru, desa_op_baru, rt_op_baru, rw_op_baru, kecamatan_baru, bumi_baru, bangunan_baru)
        values ('','$nop_baru', '$nama_wp_baru', '$alamat_baru', '$desa_wp_baru', '$rt_wp_baru', '$rw_wp_baru', '$kabupaten_baru', '$letak_op_baru', '$desa_op_baru', '$rt_op_baru', '$rw_op_baru', '$kecamatan_baru', '$bumi_baru', '$bangunan_baru')";
		$result = mysqli_query($koneksi, $sql);
		
        $result = mysqli_query($koneksi,"SELECT * FROM data_baru where nop_baru='$nop_baru'");		
        $data = mysqli_fetch_assoc($result);
        $id_baru = $data['id_data_baru'];

        //Masukan Data ke tabel pelayanan
        $sql = "INSERT INTO pelayanan (no_pelayanan, jenis_pelayanan, id_data_lama, id_data_baru) values ('$no_pelayanan', '$jenis_pelayanan','$id_lama', '$id_baru') ";
		$result = mysqli_query($koneksi, $sql);

		//
		if ($result) {
			header("location:data_verifikasi.php?pesan=input");
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
	<title>Tambah Data Verifikasi</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="shortcut icon" href="../img/logo_bapenda1.png">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top "  data-bs-theme="dark" style="background-color:#ff0000; color:white; font-weight: bold;">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
		<h1 align="center">Tambah Data Verifikasi</h1>
		<h3 align="center">Mutasi Pembetulan</h3>
	</div>

	<br>
    <div class="m-5" style="width: auto; ">
        <form action="" method="POST" class="login-email row border border-start-0 shadow-lg p-3 rounded">
            <div class="mb-3">
                <label class="form-label">No Pelayanan</label>
                <input type="text" class="form-control"placeholder="no_pelayanan" name="no_pelayanan" value="<?php echo $no_pelayanan;  ?>" required>
            </div>
            <div class="border border-start-0 shadow-lg p-3  bg-body-tertiary  rounded card-body" style="width:300px; margin:auto;">
                <div class="mb-3">
                    <h5 class="card-title">Data Lama</h5>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nop Lama</label>
                    <input type="text" class="form-control"placeholder="nop_lama" name="nop_lama" value="<?php echo $nop_lama;  ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" placeholder="nama" name="nama_wp_lama" value="<?php echo $nama_wp_lama;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" placeholder="alamat" name="alamat_lama" value="<?php echo $alamat_lama;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Desa</label>
                    <input type="text" class="form-control" placeholder="desa" name="desa_wp_lama" value="<?php echo $desa_wp_lama;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">RT</label>
                    <input type="text" class="form-control" placeholder="rt" name="rt_wp_lama" value="<?php echo $rt_wp_lama;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">RW</label>
                    <input type="text" class="form-control" placeholder="rw" name="rw_wp_lama" value="<?php echo $rw_wp_lama;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Kabupaten</label>
                    <input type="text" class="form-control" placeholder="Kabupaten" name="kabupaten_lama" value="<?php echo $kabupaten_lama;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Letak OP</label>
                    <input type="text" class="form-control" placeholder="Letak OP" name="letak_op_lama" value="<?php echo $letak_op_lama;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Desa OP</label>
                    <input type="text" class="form-control" placeholder="Desa OP" name="desa_op_lama" value="<?php echo $desa_op_lama;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">RT</label>
                    <input type="text" class="form-control" placeholder="rt" name="rt_op_lama" value="<?php echo $rt_op_lama;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">RW</label>
                    <input type="text" class="form-control" placeholder="rw" name="rw_op_lama" value="<?php echo $rw_op_lama;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Kecamatan OP</label>
                    <input type="text" class="form-control" placeholder="Kecamtan Op" name="kecamatan_lama" value="<?php echo $kecamatan_lama;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Bumi</label>
                    <input type="text" class="form-control" placeholder="Bumi" name="bumi_lama" value="<?php echo $bumi_lama;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Bangunan</label>
                    <input type="text" class="form-control" placeholder="Bangunan" name="bangunan_lama" value="<?php echo $bangunan_lama;  ?>" required>
                </div>    
            </div>
            <div class="border border-start shadow-lg p-3  bg-body-tertiary rounded card-body" style="width:300px; margin:auto;">
                <div class="mb-3">
                    <h5 class="card-title">Data Baru</h5>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nop Baru</label>
                    <input type="text" class="form-control"placeholder="nop_baru" name="nop_baru" value="<?php echo $nop_baru;  ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" class="form-control" placeholder="Nama" name="nama_wp_baru" value="<?php echo $nama_wp_baru;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control" placeholder="Alamat" name="alamat_baru" value="<?php echo $alamat_baru;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Desa</label>
                    <input type="text" class="form-control" placeholder="Desa" name="desa_wp_baru" value="<?php echo $desa_wp_baru;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">RT</label>
                    <input type="text" class="form-control" placeholder="rt" name="rt_wp_baru" value="<?php echo $rt_wp_baru;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">RW</label>
                    <input type="text" class="form-control" placeholder="rw" name="rw_wp_baru" value="<?php echo $rw_wp_baru;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Kabupaten</label>
                    <input type="text" class="form-control" placeholder="Kabupaten" name="kabupaten_baru" value="<?php echo $kabupaten_baru;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Letak OP</label>
                    <input type="text" class="form-control" placeholder="Letak OP" name="letak_op_baru" value="<?php echo $letak_op_baru;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Desa OP</label>
                    <input type="text" class="form-control" placeholder="Desa OP" name="desa_op_baru" value="<?php echo $desa_op_baru;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">RT</label>
                    <input type="text" class="form-control" placeholder="rt" name="rt_op_baru" value="<?php echo $rt_op_baru;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">RW</label>
                    <input type="text" class="form-control" placeholder="rw" name="rw_op_baru" value="<?php echo $rw_op_baru;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Kecamatan OP</label>
                    <input type="text" class="form-control" placeholder="Kecamtan OP" name="kecamatan_baru" value="<?php echo $kecamatan_baru;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Bumi</label>
                    <input type="text" class="form-control" placeholder="Bumi" name="bumi_baru" value="<?php echo $bumi_baru;  ?>" required>
                </div>    
                <div class="mb-3">
                    <label class="form-label">Bangunan</label>
                    <input type="text" class="form-control" placeholder="Bangunan" name="bangunan_baru" value="<?php echo $bangunan_baru;  ?>" required>
                </div> 
            </div>
            <div class="mb-3">
                    <input hidden type="text" class="form-control"placeholder="jenis_pelayanan" name="jenis_pelayanan" value="Mutasi" required>
                </div>
            <div class="d-grid gap-2 mt-3">
                <button name="submit" class="btn btn-success">Simpan</button>	
            </div>
        </form>
    </div>
    <br>
<svg id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 300" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(255, 61.989, 0, 0.58)" offset="0%"></stop><stop stop-color="rgba(171.129, 0, 0, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,180L18.5,175C36.9,170,74,160,111,155C147.7,150,185,150,222,150C258.5,150,295,150,332,135C369.2,120,406,90,443,90C480,90,517,120,554,150C590.8,180,628,210,665,230C701.5,250,738,260,775,255C812.3,250,849,230,886,200C923.1,170,960,130,997,130C1033.8,130,1071,170,1108,160C1144.6,150,1182,90,1218,100C1255.4,110,1292,190,1329,185C1366.2,180,1403,90,1440,55C1476.9,20,1514,40,1551,55C1587.7,70,1625,80,1662,110C1698.5,140,1735,190,1772,205C1809.2,220,1846,200,1883,160C1920,120,1957,60,1994,60C2030.8,60,2068,120,2105,150C2141.5,180,2178,180,2215,185C2252.3,190,2289,200,2326,215C2363.1,230,2400,250,2437,220C2473.8,190,2511,110,2548,110C2584.6,110,2622,190,2640,230L2658.5,270L2658.5,300L2640,300C2621.5,300,2585,300,2548,300C2510.8,300,2474,300,2437,300C2400,300,2363,300,2326,300C2289.2,300,2252,300,2215,300C2178.5,300,2142,300,2105,300C2067.7,300,2031,300,1994,300C1956.9,300,1920,300,1883,300C1846.2,300,1809,300,1772,300C1735.4,300,1698,300,1662,300C1624.6,300,1588,300,1551,300C1513.8,300,1477,300,1440,300C1403.1,300,1366,300,1329,300C1292.3,300,1255,300,1218,300C1181.5,300,1145,300,1108,300C1070.8,300,1034,300,997,300C960,300,923,300,886,300C849.2,300,812,300,775,300C738.5,300,702,300,665,300C627.7,300,591,300,554,300C516.9,300,480,300,443,300C406.2,300,369,300,332,300C295.4,300,258,300,222,300C184.6,300,148,300,111,300C73.8,300,37,300,18,300L0,300Z"></path><defs><linearGradient id="sw-gradient-1" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(255, 61.989, 0, 0.45)" offset="0%"></stop><stop stop-color="rgba(255, 0, 0, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 50px); opacity:0.9" fill="url(#sw-gradient-1)" d="M0,240L18.5,220C36.9,200,74,160,111,165C147.7,170,185,220,222,240C258.5,260,295,250,332,220C369.2,190,406,140,443,115C480,90,517,90,554,105C590.8,120,628,150,665,165C701.5,180,738,180,775,190C812.3,200,849,220,886,190C923.1,160,960,80,997,45C1033.8,10,1071,20,1108,55C1144.6,90,1182,150,1218,190C1255.4,230,1292,250,1329,220C1366.2,190,1403,110,1440,100C1476.9,90,1514,150,1551,175C1587.7,200,1625,190,1662,170C1698.5,150,1735,120,1772,130C1809.2,140,1846,190,1883,205C1920,220,1957,200,1994,165C2030.8,130,2068,80,2105,60C2141.5,40,2178,50,2215,80C2252.3,110,2289,160,2326,195C2363.1,230,2400,250,2437,230C2473.8,210,2511,150,2548,150C2584.6,150,2622,210,2640,240L2658.5,270L2658.5,300L2640,300C2621.5,300,2585,300,2548,300C2510.8,300,2474,300,2437,300C2400,300,2363,300,2326,300C2289.2,300,2252,300,2215,300C2178.5,300,2142,300,2105,300C2067.7,300,2031,300,1994,300C1956.9,300,1920,300,1883,300C1846.2,300,1809,300,1772,300C1735.4,300,1698,300,1662,300C1624.6,300,1588,300,1551,300C1513.8,300,1477,300,1440,300C1403.1,300,1366,300,1329,300C1292.3,300,1255,300,1218,300C1181.5,300,1145,300,1108,300C1070.8,300,1034,300,997,300C960,300,923,300,886,300C849.2,300,812,300,775,300C738.5,300,702,300,665,300C627.7,300,591,300,554,300C516.9,300,480,300,443,300C406.2,300,369,300,332,300C295.4,300,258,300,222,300C184.6,300,148,300,111,300C73.8,300,37,300,18,300L0,300Z"></path></svg>
</body>
</html>