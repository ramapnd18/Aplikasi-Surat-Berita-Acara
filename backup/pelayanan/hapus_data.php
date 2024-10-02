<?php  

include '../koneksi.php';
//menggambil data dari halaman sebelumnya
$no_pelayanan = $_GET['no_pelayanan'];
$sql = "SELECT * FROM pelayanan INNER JOIN data_baru ON pelayanan.id_data_baru = data_baru.id_data_baru INNER JOIN data_lama ON pelayanan.id_data_lama = data_lama.id_data_lama where no_pelayanan='$no_pelayanan'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($result);
$nop_baru = $data['nop_baru'];
$nop_lama = $data['nop_lama'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hapus</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="shortcut icon" href="../img/logo_bapenda1.png">
</head>
</head>
<body>
    
</body>
</html>
    <div class="border border-start-9 shadow-lg p-3 mb-5 bg-body-tertiary rounded" style="width:350px; margin:auto; margin-top:50px ;">
        <h1 align="center">Yakin dihapus?</h1>
        <form action="" method="post">
        <div class="d-grid gap-2 mb-3">
		<button name="yakin" class="btn btn-danger">Yakin</button>
		</div>
        <div class="d-grid gap-2 mb-3">
        <button name="batal" class="btn btn-success">Batal</button>			
		</div>
        </form>
    </div>
<?php
if (isset($_POST['yakin'])){

//query menghapus data
$query = "DELETE from hasil_verifikasi where no_pelayanan='$no_pelayanan'";
mysqli_query($koneksi, $query);
$query = "DELETE from pelayanan where no_pelayanan='$no_pelayanan'";
mysqli_query($koneksi, $query);
    if($nop_lama!=""){
        $query = "DELETE from data_lama where nop_lama='$nop_lama'";
        mysqli_query($koneksi, $query);
    }
    if($nop_baru!=""){
        $query = "DELETE from data_baru where nop_baru='$nop_baru'";
        mysqli_query($koneksi, $query);
    }
//mengalihkan ke halaman akun.php
header("location:data_verifikasi.php?pesan=hapus");

} else if(isset($_POST['batal'])){
    header("location:data_verifikasi.php");
}
?>