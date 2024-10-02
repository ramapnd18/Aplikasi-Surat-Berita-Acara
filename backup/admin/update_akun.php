<?php 

include '../koneksi.php';
//menggambil data dari halaman sebelumnya
$id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $level = $_POST['level'];
    //query mengupdate data
    $query = "UPDATE akun SET id_user='$id_user', username='$username', password='$password',level='$level' where id_user='$id_user'";
    mysqli_query($koneksi, $query);

    //mengalihkan ke halaman akun.php
    header("location:akun.php?pesan=update");


?>