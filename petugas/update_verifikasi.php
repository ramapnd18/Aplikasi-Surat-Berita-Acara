<?php 

include '../koneksi.php';

error_reporting();

session_start();
    //menggambil data dari halaman sebelumnya
    $id_verifikasi = $_POST['id_verifikasi']; 
    $no_pelayanan = $_POST['no_pelayanan'];
    $no_surat = $_POST['no_surat']; 
    $status  = $_POST['status']; 
    $hasil = $_POST['hasil']; 
    // $id_user = $_POST['id_user']; 
    $id_user = $_SESSION['id_user'];

    //query mengupdate hasil verifikasi
    $query = "UPDATE hasil_verifikasi SET
    id_verifikasi='$id_verifikasi',
    no_pelayanan='$no_pelayanan', 
    status='$status', 
    hasil='$hasil', 
    id_user='$id_user' 
    where id_verifikasi='$id_verifikasi'";
    mysqli_query($koneksi, $query);

    // //mengalihkan ke halaman data_verifikasi.php
    header("location:hasil_verifikasi.php?pesan=update");
    

?>