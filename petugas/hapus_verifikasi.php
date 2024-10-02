<?php  

include '../koneksi.php';
//menggambil data dari halaman sebelumnya
$no_pelayanan = $_GET['no_pelayanan'];
$sql = "SELECT * FROM hasil_verifikasi INNER JOIN pelayanan ON hasil_verifikasi.no_pelayanan = pelayanan.no_pelayanan INNER JOIN akun ON hasil_verifikasi.id_user = akun.id_user";
$result = mysqli_query($koneksi,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hapus Data Verifikasi</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
    <link rel="shortcut icon" href="../img/logo_bapenda1.png">
</head>
<body style="background-image: url('../img/bg3.png'); background-size:30em;">
    
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
</body>
</html>
<?php
if (isset($_POST['yakin'])){

//query menghapus data
$query = "DELETE from hasil_verifikasi where no_pelayanan='$no_pelayanan'";
mysqli_query($koneksi, $query);

//mengalihkan ke halaman akun.php
header("location:hasil_verifikasi.php?pesan=hapus");

} else if(isset($_POST['batal'])){
    header("location:hasil_verifikasi.php");
}
?>