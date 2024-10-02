<?php
//memanggil menghubungkan file koneksi
include 'koneksi.php';

//melaporkan error
error_reporting(0);

//mengaktifkan session pada php
session_start();

//cek jika username ada 
if (isset($_SESSION['username'])) {
	header("Location: index.php");
}

//cek jika user menekan tombol register
if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $level = $_POST['level'];
 
	//cek apakah password dengan cpassword sesuai dan sama
	if ($password == $cpassword) {
		//menyeleksi data register dengan username di database
		$sql = "SELECT * from akun where username='$username'";
		$result = mysqli_query($koneksi, $sql);

		//cek apakah username sudah ada di data base
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO akun (id_user,username, password, level)
			values ('','$username','$password','$level')";
			$result = mysqli_query($koneksi, $sql);

			//cek jika berhasil menambahkan data
			if ($result) {
				echo "<script>alert('Selamat, registrasi berhasil')</script>";
				$username = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
                $level = "";
	
				//gagal menambahkan data
			}else{
				echo "<script>alert('Woops!, Terjadi Kesalahan')</script>";
			}
	
			//jika username telah terdaftar
		}else{
			echo "<script>alert('Woops!, Username Sudah Terdaftar')</script>";
		}
	
		//jika password dan cpassword tidak sesuai
	}else{
		echo "<script>alert('Woops!, Password Tidak Sesuai')</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Pendaftaran</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">
    <link rel="shortcut icon" href="img/logo_bapenda1.png">
</head>
<body style="background-image: url('img/background.jpg');">
	<center class="tulisan_login" style="font-size: 2rem; font-weight: 800; margin: 150px 0px 50px 0px; color:white;">Pendaftaran</center>
	<div class="border border-start-9 shadow-lg p-3 mb-5 bg-body-tertiary rounded"  style="width:300px; margin: auto;">
		<form action=""method="POST" class="login-email">
			<div class="d-grid gap-2">
				<label>Nama Pengguna</label>
				<input type="text" class="form-control" placeholder="Nama Pengguna" name="username" value="<?php echo $username;  ?>" required>
			</div>
			<div class="d-grid gap-2">
				<label>Kata Sandi</label>
				<input type="password" class="form-control" placeholder="Kata Sandi" name="password" value="<?php echo $_POST['password'];  ?>" required>
			</div>
			<div class="d-grid gap-2">
				<label>Konfirmasi Kata Sandi</label>
				<input type="password" class="form-control" placeholder="Konfirmasi Kata Sandi" name="cpassword" value="<?php echo $_POST['cpassword'];  ?>" required>
			</div>
            <div class="d-grid gap-2">
				<label>Jenis Akun</label>
                <select name="level" id="" class="form-control">
                    <option value="">Pilih</option>
                    <option value="pelayanan">Pelayanan</option>
                    <option value="petugas">Petugas Verifikasi</option>
                </select>
			</div>
			<div class="d-grid gap-2">
				<button name="submit" class="btn btn-success" style="margin-top: 10px;">Daftar</button>	
			</div>
		</form>
		<p class="">Anda sudah punya akun? <a href="index.php">Masuk</a></p> 
	</div>
</body>
</html>
