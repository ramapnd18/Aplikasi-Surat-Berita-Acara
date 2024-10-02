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
	<title>Ubah Pengguna</title>
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
		<h1 align="center" style="color:white;">Ubah Data Verifikasi Objek Pajak</h1>
	</div>

	<br>
	<?php  
include '../koneksi.php';
$no_pelayanan = $_GET['no_pelayanan'];
$sql = "SELECT * FROM pelayanan INNER JOIN data_baru ON pelayanan.id_data_baru = data_baru.id_data_baru INNER JOIN data_lama ON pelayanan.id_data_lama = data_lama.id_data_lama where no_pelayanan='$no_pelayanan'";
$result = mysqli_query($koneksi, $sql);
$nomor = 1;
while ($data = mysqli_fetch_assoc($result)) {
	?>
	<div class="border border-start-9 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width: 1000px; margin:auto;">
        <form action="update_data.php" method="POST" class="row">
            <div class="mb-3">
                <input type="hidden" class="form-control"placeholder="no_pelayanan" name="no_pelayanan"  value="<?php echo $data['no_pelayanan']?>" >
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis Pelayanan</label>      
                <input type="text" class="form-control"placeholder="Jenis pelayanan" name="jenis_pelayanan" value="<?php echo $data['jenis_pelayanan']?>" readonly>
            </div>
            <div class="border border-start-0 shadow-lg p-3  bg-body-tertiary  rounded card-body" style="width:300px; margin:auto;">
                <div class="mb-3">
                    <input type="hidden" class="form-control"placeholder="id_data_lama" name="id_data_lama" value="<?php echo $data['id_data_lama']?>" >
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Nomor objek pajak lama</label>
                    <input type="text" class="form-control" placeholder="Nop Lama" name="nop_lama" value="<?php echo $data['nop_lama']?>" >
                </div>    
                <h5 class="form-label">Wajib Pajak</h5>
                <div class="row g-3">
                    <div class="col">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="nama" name="nama_wp_lama" value="<?php echo $data['nama_wp_lama']?>" >
                    </div>    
                    <div class="col">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" placeholder="alamat" name="alamat_lama" value="<?php echo $data['alamat_lama']?>" >
                    </div>    
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Desa</label>
                        <input type="text" class="form-control" placeholder="desa" name="desa_wp_lama" value="<?php echo $data['desa_wp_lama']?>" >
                    </div>    
                    <div class="col-md-2">
                        <label class="form-label">RT</label>
                        <input type="text" class="form-control" placeholder="rt" name="rt_wp_lama" value="<?php echo $data['rt_wp_lama']?>" >
                    </div>    
                    <div class="col-md-2">
                        <label class="form-label">RW</label>
                        <input type="text" class="form-control" placeholder="rw" name="rw_wp_lama" value="<?php echo $data['rw_wp_lama']?>" >
                    </div>    
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Kabupaten</label>
                        <input type="text" class="form-control" placeholder="Kabupaten" name="kabupaten_lama" value="<?php echo $data['kabupaten_lama']?>" >
                    </div>    
                </div>
                <h5 class="form-label">Objek Pajak</h5>
                <div class="row g-3">
                    <div class="col">
                        <label class="form-label">Letak Objek Pajak</label>
                        <input type="text" class="form-control" placeholder="Letak" name="letak_op_lama" value="<?php echo $data['letak_op_lama']?>" >
                    </div>    
                    <div class="col">
                        <label class="form-label">Desa Objek Pajak</label>
                        <input type="text" class="form-control" placeholder="Desa" name="desa_op_lama" value="<?php echo $data['desa_op_lama']?>" >
                    </div>    
                </div>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">RT</label>
                        <input type="text" class="form-control" placeholder="rt" name="rt_op_lama" value="<?php echo $data['rt_op_lama']?>" >
                    </div>    
                    <div class="col-md-3">
                        <label class="form-label">RW</label>
                        <input type="text" class="form-control" placeholder="rw" name="rw_op_lama" value="<?php echo $data['rw_op_lama']?>" >
                    </div>    
                    <div class="col-md-6">
                        <label class="form-label">Kecamatan </label>
                        <input type="text" class="form-control" placeholder="Kecamtan" name="kecamatan_lama" value="<?php echo $data['kecamatan_lama']?>" >
                    </div>    
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label class="form-label">Luas Tanah</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Bumi" name="bumi_lama" value="<?php echo $data['bumi_lama']?>" >
                            <div class="input-group-text">m<sup>2</sup></div>
                        </div>
                    </div>    
                    <div class="col">
                        <label class="form-label">Luas Bangunan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Bangunan" name="bangunan_lama" value="<?php echo $data['bangunan_lama']?>" >
                            <div class="input-group-text">m<sup>2</sup></div>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="border border-start shadow-lg p-3  bg-body-tertiary rounded card-body" style="width:300px; margin:auto;">
                <div class="mb-3">
                    <input type="hidden" class="form-control"placeholder="id_data_baru" name="id_data_baru" value="<?php echo $data['id_data_baru']?>" >
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor objek pajak baru</label>
                    <input type="text" class="form-control" placeholder="Nop baru" name="nop_baru" value="<?php echo $data['nop_baru']?>" >
                </div>    
                <h5 class="form-label">Wajib Pajak</h5>
                <div class="row g-3">
                    <div class="col">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="nama_wp_baru" value="<?php echo $data['nama_wp_baru']?>" >
                    </div>    
                    <div class="col">
                        <label class="form-label">Alamat</label>
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat_baru" value="<?php echo $data['alamat_baru']?>" >
                    </div>    
                </div>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Desa</label>
                        <input type="text" class="form-control" placeholder="Desa" name="desa_wp_baru" value="<?php echo $data['desa_wp_baru']?>" >
                    </div>    
                    <div class="col-md-2">
                        <label class="form-label">RT</label>
                        <input type="text" class="form-control" placeholder="rt" name="rt_wp_baru" value="<?php echo $data['rt_wp_baru']?>" >
                    </div>    
                    <div class="col-md-2">
                        <label class="form-label">RW</label>
                        <input type="text" class="form-control" placeholder="rw" name="rw_wp_baru" value="<?php echo $data['rw_wp_baru']?>" >
                    </div>    
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Kabupaten</label>
                        <input type="text" class="form-control" placeholder="Kabupaten" name="kabupaten_baru" value="<?php echo $data['kabupaten_baru']?>" >
                    </div>    
                </div>
                <h5 class="form-label">Objek Pajak</h5>
                <div class="row g-3">
                    <div class="col">
                        <label class="form-label">Letak Objek Pajak</label>
                        <input type="text" class="form-control" placeholder="Letak " name="letak_op_baru" value="<?php echo $data['letak_op_baru']?>" >
                    </div>    
                    <div class="col">
                        <label class="form-label">Desa Objek Pajak</label>
                        <input type="text" class="form-control" placeholder="Desa" name="desa_op_baru" value="<?php echo $data['desa_op_baru']?>" >
                    </div>    
                </div>
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">RT</label>
                        <input type="text" class="form-control" placeholder="rt" name="rt_op_baru" value="<?php echo $data['rt_op_baru']?>" >
                    </div>    
                    <div class="col-md-3">
                        <label class="form-label">RW</label>
                        <input type="text" class="form-control" placeholder="rw" name="rw_op_baru" value="<?php echo $data['rw_op_baru']?>" >
                    </div>    
                    <div class="col-md-6">
                        <label class="form-label">Kecamatan </label>
                        <input type="text" class="form-control" placeholder="Kecamtan " name="kecamatan_baru" value="<?php echo $data['kecamatan_baru']?>" >
                    </div>    
                </div>
                <div class="row g-3">
                    <div class="col">
                        <label class="form-label">Luas Tanah</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Bumi" name="bumi_baru" value="<?php echo $data['bumi_baru']?>" >
                            <div class="input-group-text">m<sup>2</sup></div>
                        </div>
                    </div>    
                    <div class="col">
                        <label class="form-label">Luas Bangunan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Bangunan" name="bangunan_baru" value="<?php echo $data['bangunan_baru']?>" >
                            <div class="input-group-text">m<sup>2</sup></div>
                        </div>
                    </div> 
                </div>
                
            </div>
            <div class="d-grid gap-2 mt-3">
                <button name="submit" class="btn btn-success">Simpan</button>	
            </div>
        </form>
        <a href="data_verifikasi.php" class="tombol"><button class="btn btn-primary" style="padding:0px 5px; margin-top: 5px;">Lihat semua data <--</button></a>
    </div>
<?php } ?>



</body>
</html>