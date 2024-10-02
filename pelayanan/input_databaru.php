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
    $perubah = $_SESSION['username'];
    
    $sql = "SELECT * from pelayanan where no_pelayanan='$no_pelayanan'";
	$result = mysqli_query($koneksi,$sql);

	if (!$result->num_rows>0) {
        //Masukan Data ke tabel data_lama
        // $sql = "INSERT INTO data_lama (nop_lama, nama_wp_lama, alamat_lama, desa_wp_lama, rt_wp_lama, rw_wp_lama, kabupaten_lama, letak_op_lama, desa_op_lama, rt_op_lama, rw_op_lama, kecamatan_lama, bumi_lama, bangunan_lama)
        // values ('$nop_lama', '$nama_wp_lama', '$alamat_lama', '$desa_wp_lama', '$rt_wp_lama', '$rw_wp_lama', '$kabupaten_lama', '$letak_op_lama', '$desa_op_lama', '$rt_op_lama', '$rw_op_lama', '$kecamatan_lama', '$bumi_lama', '$bangunan_lama')";
        // $result = mysqli_query($koneksi, $sql);
        //Masukan Data ke tabel data_baru
        $sql = "INSERT INTO data_baru (id_data_baru, nop_baru, nama_wp_baru, alamat_baru, desa_wp_baru, rt_wp_baru, rw_wp_baru, kabupaten_baru, letak_op_baru, desa_op_baru, rt_op_baru, rw_op_baru, kecamatan_baru, bumi_baru, bangunan_baru)
        values ('','$nop_baru', '$nama_wp_baru', '$alamat_baru', '$desa_wp_baru', '$rt_wp_baru', '$rw_wp_baru', '$kabupaten_baru', '$letak_op_baru', '$desa_op_baru', '$rt_op_baru', '$rw_op_baru', '$kecamatan_baru', '$bumi_baru', '$bangunan_baru')";
		$result = mysqli_query($koneksi, $sql);

        $result = mysqli_query($koneksi,"SELECT * FROM data_baru where nop_baru='$nop_baru'");		
        $data = mysqli_fetch_assoc($result);
        $id_baru = $data['id_data_baru'];

		//Masukan Data ke tabel pelayanan
        $sql = "INSERT INTO pelayanan (no_pelayanan, jenis_pelayanan, id_data_lama, id_data_baru, perubah) values ('$no_pelayanan', '$jenis_pelayanan','$id_data_lama', '$id_baru', '$perubah') ";
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
<body style="background-image: url('../img/bg3.png'); background-size:30em;">
<nav class="navbar navbar-expand-lg sticky-top "  data-bs-theme="dark" style="background-color:#62120e; color:white; font-weight: bold;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="../img/Profile.png" alt="" style="margin-top:-10px; width :40px;"> Pelayanan</a>
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
          <a class="nav-link active" href="../logout.php">Keluar</a>
        </li>
      </ul>
    </div>
  </div>
</nav>




<br>
	<div class="judul">
		<h1 align="center" style="color:white;">Tambah Data Verifikasi Objek Pajak</h1>
	</div>

	<br>
    <div class="border border-start-9 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="margin: auto; width :500px;">
        <form action="" method="POST" class="row">
            <div class="mb-3">
            <label class="form-label">Jenis Pelayanan : Data Baru</label><br>
                <label class="form-label">No Pelayanan</label>
                <input type="text" class="form-control"placeholder="" name="no_pelayanan" value="<?php echo $no_pelayanan;  ?>" required>
            </div>
            <!-- <div class="border border-start-0 shadow-lg p-3  bg-body-tertiary  rounded card-body" style="width:300px; margin:auto;">
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
            </div> -->
            <div class="border border-start shadow-lg p-3  bg-body-tertiary rounded card-body" style="width:300px; margin:auto;">
                <div class="mb-3">
                    <label class="form-label">Nomor objek pajak baru</label>
                    <input type="text" class="form-control"placeholder="" name="nop_baru" value="<?php echo $nop_baru;  ?>" required>
                </div>
                <h5 class="form-label">Wajib Pajak</h5>
                <div class="row g-3">
                    <div class="col">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="" name="nama_wp_baru" value="<?php echo $nama_wp_baru;  ?>" required>
                    </div>    
                    <div class="col">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" placeholder="" name="alamat_baru" value="<?php echo $alamat_baru;  ?>" required>
                    </div>    
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Desa</label>
                        <input type="text" class="form-control" placeholder="" name="desa_wp_baru" value="<?php echo $desa_wp_baru;  ?>" required>
                    </div>    
                    <div class="col-md-2">
                        <label class="form-label">RT</label>
                        <input type="text" class="form-control" placeholder="" name="rt_wp_baru" value="<?php echo $rt_wp_baru;  ?>" required>
                    </div>    
                    <div class="col-md-2">
                        <label class="form-label">RW</label>
                        <input type="text" class="form-control" placeholder="" name="rw_wp_baru" value="<?php echo $rw_wp_baru;  ?>" required>
                    </div>    
                    <div class="col-md-4 mb-3">        
                        <label class="form-label">Kabupaten</label>
                        <input type="text" class="form-control" placeholder="" name="kabupaten_baru" value="<?php echo $kabupaten_baru;  ?>" required>
                    </div>    
                </div>  
                <h5 class="form-label">Objek Pajak</h5>
                <div class="row g-3">
                    <div class="col">
                        <label class="form-label">Letak Objek Pajak</label>
                        <input type="text" class="form-control" placeholder="" name="letak_op_baru" value="<?php echo $letak_op_baru;  ?>" required>
                    </div>    
                    <div class="col">
                        <label class="form-label">Desa Objek Pajak</label>
                        <input type="text" class="form-control" placeholder="" name="desa_op_baru" value="<?php echo $desa_op_baru;  ?>" required>
                    </div>    
                </div>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">RT</label>
                        <input type="text" class="form-control" placeholder="" name="rt_op_baru" value="<?php echo $rt_op_baru;  ?>" required>
                    </div>    
                    <div class="col-md-3">
                        <label class="form-label">RW</label>
                        <input type="text" class="form-control" placeholder="" name="rw_op_baru" value="<?php echo $rw_op_baru;  ?>" required>
                    </div>    
                    <div class="col-md-6">
                        <label class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" placeholder="" name="kecamatan_baru" value="<?php echo $kecamatan_baru;  ?>" required>
                    </div>    
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label class="form-label">Luas Tanah</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="" name="bumi_baru" value="<?php echo $bumi_baru;  ?>" required>
                            <div class="input-group-text">m<sup>2</sup></div>
                        </div>
                    </div>    
                    <div class="col">
                        <label class="form-label">Luas Bangunan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="" name="bangunan_baru" value="<?php echo $bangunan_baru;  ?>" required>
                            <div class="input-group-text">m<sup>2</sup></div>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="mb-3">
                    <input hidden type="text" class="form-control"placeholder="jenis_pelayanan" name="jenis_pelayanan" value="Data Baru" required>
                </div>
            <div class="d-grid gap-2 mt-3">
                <button name="submit" class="btn btn-success">Simpan</button>	
            </div>
        </form>
    </div>
    <br>
</body>
</html>