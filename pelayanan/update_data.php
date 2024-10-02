<?php 

include '../koneksi.php';

error_reporting(0);

session_start();

    //menggambil data dari halaman sebelumnya
    $no_pelayanan = $_POST['no_pelayanan'];
    $jenis_pelayanan = $_POST['jenis_pelayanan']; 
    $id_data_lama = $_POST['id_data_lama'];
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
    $id_data_baru = $_POST['id_data_baru']; 
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

    //query mengupdate data pelayanan
    $query = "UPDATE pelayanan SET no_pelayanan='$no_pelayanan', jenis_pelayanan='$jenis_pelayanan', id_data_lama='$id_data_lama', id_data_baru='$id_data_baru', perubah='$perubah' where no_pelayanan='$no_pelayanan'";
    mysqli_query($koneksi, $query);
    
    $result = mysqli_query($koneksi,"SELECT * FROM pelayanan where no_pelayanan='$no_pelayanan'");
    $data = mysqli_fetch_assoc($result);

    if($data['jenis_pelayanan']=='Data Baru' ){
        //query mengupdate data baru
    $query = "UPDATE data_baru SET 
    id_data_baru='$id_data_baru',
    nop_baru='$nop_baru', 
    nama_wp_baru='$nama_wp_baru', 
    alamat_baru='$alamat_baru', 
    desa_wp_baru='$desa_wp_baru', 
    rt_wp_baru='$rt_wp_baru', 
    rw_wp_baru='$rw_wp_baru', 
    kabupaten_baru='$kabupaten_baru', 
    letak_op_baru='$letak_op_baru', 
    desa_op_baru='$desa_op_baru', 
    rt_op_baru='$rt_op_baru', 
    rw_op_baru='$rw_op_baru', 
    kecamatan_baru='$kecamatan_baru', 
    bumi_baru='$bumi_baru', 
    bangunan_baru='$bangunan_baru' 
    where id_data_baru='$id_data_baru'";
    mysqli_query($koneksi, $query);
    
    }
    if($data['jenis_pelayanan']=='Pembetulan' ){
        //query mengupdate data lama
    $query = "UPDATE data_lama SET
    id_data_lama='$id_data_lama',
    nop_lama='$nop_lama',
    nama_wp_lama='$nama_wp_lama', 
    alamat_lama='$alamat_lama', 
    desa_wp_lama='$desa_wp_lama', 
    rt_wp_lama='$rt_wp_lama', 
    rw_wp_lama='$rw_wp_lama', 
    kabupaten_lama='$kabupaten_lama', 
    letak_op_lama='$letak_op_lama', 
    desa_op_lama='$desa_op_lama', 
    rt_op_lama='$rt_op_lama', 
    rw_op_lama='$rw_op_lama', 
    kecamatan_lama='$kecamatan_lama', 
    bumi_lama='$bumi_lama',
    bangunan_lama='$bangunan_lama' 
    where id_data_lama='$id_data_lama'";
    mysqli_query($koneksi, $query);

    //query mengupdate data baru
    $query = "UPDATE data_baru SET 
    id_data_baru='$id_data_baru',
    nop_baru='$nop_baru', 
    nama_wp_baru='$nama_wp_baru', 
    alamat_baru='$alamat_baru', 
    desa_wp_baru='$desa_wp_baru', 
    rt_wp_baru='$rt_wp_baru', 
    rw_wp_baru='$rw_wp_baru', 
    kabupaten_baru='$kabupaten_baru', 
    letak_op_baru='$letak_op_baru', 
    desa_op_baru='$desa_op_baru', 
    rt_op_baru='$rt_op_baru', 
    rw_op_baru='$rw_op_baru', 
    kecamatan_baru='$kecamatan_baru', 
    bumi_baru='$bumi_baru', 
    bangunan_baru='$bangunan_baru' 
    where id_data_baru='$id_data_baru'";
    mysqli_query($koneksi, $query);
    
    }
    if($data['jenis_pelayanan']=='Pembatalan' ){
        //query mengupdate data lama
    $query = "UPDATE data_lama SET
    id_data_lama='$id_data_lama',
    nop_lama='$nop_lama',
    nama_wp_lama='$nama_wp_lama', 
    alamat_lama='$alamat_lama', 
    desa_wp_lama='$desa_wp_lama', 
    rt_wp_lama='$rt_wp_lama', 
    rw_wp_lama='$rw_wp_lama', 
    kabupaten_lama='$kabupaten_lama', 
    letak_op_lama='$letak_op_lama', 
    desa_op_lama='$desa_op_lama', 
    rt_op_lama='$rt_op_lama', 
    rw_op_lama='$rw_op_lama', 
    kecamatan_lama='$kecamatan_lama', 
    bumi_lama='$bumi_lama',
    bangunan_lama='$bangunan_lama' 
    where id_data_lama='$id_data_lama'";
    mysqli_query($koneksi, $query);
    }
    

    


    //mengalihkan ke halaman data_verifikasi.php
    header("location:data_verifikasi.php?pesan=update");
    

?>