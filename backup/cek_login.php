<?php
//mengaktifkan session pada php
session_start();

//menghubungkan php dengan koneksi database
include 'koneksi.php';

//menangkap data yang dikirimkan dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);

//menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "SELECT * from akun where username='$username' and password='$password'");
//menghitung jumlah data yang ditentukan
$cek = mysqli_num_rows($login);

//cek apakah username dan password di temukan pada database
if ($cek>0) {
	$data = mysqli_fetch_assoc($login);

	//cek jika user login sebagain admin
	if ($data['level'] =="admin") {
		
		//buat session login dan username
		$_SESSION['username']=$username;
		$_SESSION['level'] ="admin";
		//alihkan ke halaman dashboard admin
		header("location:admin/dashboard.php");

		//cek jika user login sebagai user
	}else if ($data['level'] == "pelayanan") {
		
		//buat session login dan username
		$_SESSION['id_user']=$data['id_user'];
		$_SESSION['username']=$username;
		$_SESSION['level'] ="pelayanan";
		//alihkan ke halaman dashboard pelayanan
		header("location:pelayanan/dashboard.php");
	}else if ($data['level'] == "petugas") {
		
		//buat session login dan username
		$_SESSION['id_user']=$data['id_user'];
		$_SESSION['username']=$username;
		$_SESSION['level'] ="petugas";
		//alihkan ke halaman dashboard pelayanan
		header("location:petugas/dashboard.php");
	}else{
		//alihkan ke halaman login kembali
	header("location:index.php?pesan=gagal"); 
	}
}else{

	//alihkan ke halaman login kembali
	header("location:index.php?pesan=gagal");
}

?>