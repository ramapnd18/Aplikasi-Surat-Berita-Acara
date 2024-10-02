<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cetak Berita Acara</title>
    <link rel="stylesheet" type="text/css" href="ba.css">
    <link rel="shortcut icon" href="../img/logo_bapenda1.png">
    <style>
        input {
            border: 0px solid #d66 ;
            float: left;
            width: calc(100% - 20px);
            font-family: Footlight MT;
            font-size: 100%;
            text-transform: uppercase;
            color:black;
        }
        .input{
            border: 1px solid black;
            font-family: Footlight MT;
            padding:none;
        }
    </style>
</head>
<body>
    <?php
include '../koneksi.php';
//
error_reporting(0);
//mengaktifkan session pada php
session_start();
//
if ($_SESSION['level']=="") {
	header("location:../index.php?pesan=login");
}
    $id_verifikasi = $_GET['id_verifikasi'];
    $result = mysqli_query($koneksi,"SELECT * FROM hasil_verifikasi 
    INNER JOIN pelayanan ON hasil_verifikasi.no_pelayanan = pelayanan.no_pelayanan 
    INNER JOIN akun ON hasil_verifikasi.id_user = akun.id_user
    INNER JOIN data_baru ON pelayanan.id_data_baru = data_baru.id_data_baru
    INNER JOIN data_lama ON pelayanan.id_data_lama = data_lama.id_data_lama
    where id_verifikasi ='$id_verifikasi'");
while ($data = mysqli_fetch_assoc($result)) {
    ?>
    <table style="margin:auto;" cellspacing="0" border="0" >
    <tr>
        <td style="width: 17px;"></td>
        <td style="width: 24px;"></td>
        <td style="width: 39px;"></td>
        <td style="width: 138px;"></td>
        <td style="width: 11px;"></td>
        <td style="width: 36px;"></td>
        <td style="width: 73px;"></td>
        <td style="width: 43px;"></td>
        <td style="width: 83px;"></td>
        <td style="width: 36px;"></td>
        <td style="width: 68px;"></td>
        <td style="width: 105px;"></td>
        <td style="width: 45px;"></td>
        <td style="width: 84px;"></td>
        <td style="width: 130px;"></td>
        <td style="width: 14px;"></td>
    </tr>
    <tr>
        <td colspan="3" rowspan="2" style="border-bottom: 4px solid black;"><img src="pangadaran.png" class="logo"></td>
        <td colspan="13" style="padding: 6px; font-weight: bold; font-family: Calibri; font-size: 150%;" align="center">PEMERINTAH KABUPATEN PANGANDARAN</td>
    </tr>
    <tr >
        <td colspan="13 " style="border-bottom: 4px solid black;padding: 6px; font-weight: bold; font-family: Calibri; font-size: 150%;" align="center">BADAN PENDAPATAN DAERAH</td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="13" align="center" style="padding: 6px; font-weight: bold; font-family: Calibri; font-size: 100%;"><u>BERITA ACARA VERIFIKASI</u> </td>
        <td></td>
    </tr>
    <tr>
        <td colspan="16"><br></td>
    </tr>
    <tr>
        <td></td>
        <td ><strong>1.</strong></td>
        <td colspan="2"><strong>DASAR PENELITIAN</strong></td>
        <td colspan="13"></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2">No. Surat Permohonan</td>
        <td></td>
        <td>:</td>
        <td colspan="4" class="input"><input type="text" value="<?php echo $data['id_verifikasi']?>" disabled></td>
        <td></td>
        <td colspan="2">No. Pelayanan</td>
        <td colspan="2" class="input"><input type="text" value="<?php echo $data['no_pelayanan']?>" disabled></td>
        <td></td>
    </tr> 
    <tr>
        <td colspan="16" style="border-bottom: 4px solid black;"></td>
    </tr>
    <tr>
        <td></td>
        <td><strong>2.</strong></td>
        <td colspan="2"><strong>OBJEK PAJAK</strong></td>
        <td colspan="12"></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2">Nop</td>
        <td></td>
        <td>:</td>
        <td class="input" colspan="5"><input type="text" value="<?php echo $data['nop_lama']?>" disabled></td>
        <td colspan="5"></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2">Nama Subjek Pajak</td>
        <td></td>
        <td>:</td>
        <td class="input" colspan="6"><input type="text" value="<?php echo $data['nama_wp_lama']?>" disabled></td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2">Alamat Subjek Pajak</td>
        <td></td>
        <td>:</td>
        <td class="input" colspan="9"><input type="text" value="<?php echo $data['alamat_lama']?>" disabled></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="5"></td>
        <td>RT.</td>
        <td class="input"><input type="text" value="<?php echo $data['rt_wp_lama']?>" disabled></td>
        <td>RW.</td>
        <td class="input"><input type="text" value="<?php echo $data['rw_wp_lama']?>" disabled></td>
        <td colspan="2"></td>
        <td>KEL./DES.</td>
        <td colspan="3" class="input"><input type="text" value="<?php echo $data['desa_wp_lama']?>" disabled></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="11"></td>
        <td>KAB./KOTA.</td>
        <td colspan="3" class="input"><input type="text" value="<?php echo $data['kabupaten_lama']?>" disabled></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2">Alamat Objek Pajak</td>
        <td></td>
        <td>:</td>
        <td class="input" colspan="9"><input type="text" value="<?php echo $data['letak_op_lama']?>" disabled></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="5"></td>
        <td>RT.</td>
        <td class="input"><input type="text" value="<?php echo $data['rt_op_lama']?>" disabled></td>
        <td>RW.</td>
        <td class="input"><input type="text" value="<?php echo $data['rw_op_lama']?>" disabled></td>
        <td colspan="2"></td>
        <td>KEL./DES.</td>
        <td colspan="3" class="input"><input type="text" value="<?php echo $data['desa_op_lama']?>" disabled></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="11"></td>
        <td>KEC.</td>
        <td colspan="3" class="input"><input type="text" value="<?php echo $data['kecamatan_lama']?>" disabled></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2">Luas Tanah/ bangunan</td>
        <td></td>
        <td >:LT</td>
        <td colspan="2"class="input"><input type="text" value="<?php echo $data['bumi_lama']?>" disabled></td>
        <td></td>
        <td>:LB</td>
        <td class="input"><input type="text" value="<?php echo $data['bangunan_lama']?>" disabled></td>
        <td colspan="5"></td>
    </tr>
    <tr>
        <td colspan="16" style="border-bottom: 4px solid black;"></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td></td>
        <td><strong>3.</strong></td>
        <td colspan="2"><strong>JENIS PELAYANAN</strong></td>
        <td></td>
        <td >:</td>
        <td colspan="5"class="input"><input type="text" value="<?php echo $data['jenis_pelayanan']?>" disabled></td>
    </tr>
    <tr>
        <td colspan="16" style="border-bottom: 4px solid black;"></td>
    </tr>
    <tr>
        <td></td>
        <td><strong>4.</strong></td>
        <td colspan="4"><strong>LAPORAN HASIL VERIFIKASI</strong></td>
        <td colspan="10"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="14" rowspan="">
            <textarea name="hasil" id="hasil" cols="100" rows="7" style="border: none; font-family: calibri; font-size:110%; color: black;" disabled>
-<?php echo $data['hasil']?></textarea></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="16" style="border-bottom: 4px solid black;"></td>
    </tr>
    <tr>
        <td></td>
        <td><strong>5.</strong></td>
        <td colspan="2"><strong>KESIMPULAN</strong></td>
        <td colspan="12"></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="13">a. Berdasarkan hasil Verifikasi serta dokumen pendukung lainya untuk permohonan tersebut:</td>
        <td></td>
    </tr>
    <tr>
        <td colspan="6"></td>
        <td colspan="9"></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2">Nop</td>
        <td></td>
        <td>:</td>
        <td class="input" colspan="5"><input type="text" value="<?php echo $data['nop_baru']?>" disabled></td>
        <td colspan="5"></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2">Nama Subjek Pajak</td>
        <td></td>
        <td>:</td>
        <td class="input" colspan="6"><input type="text" value="<?php echo $data['nama_wp_baru']?>" disabled></td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2">Alamat Subjek Pajak</td>
        <td></td>
        <td>:</td>
        <td class="input" colspan="9"><input type="text" value="<?php echo $data['alamat_baru']?>" disabled></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="5"></td>
        <td>RT.</td>
        <td class="input"><input type="text" value="<?php echo $data['rt_wp_baru']?>" disabled></td>
        <td>RW.</td>
        <td class="input"><input type="text" value="<?php echo $data['rw_wp_baru']?>" disabled></td>
        <td colspan="2"></td>
        <td>KEL./DES.</td>
        <td colspan="3" class="input"><input type="text" value="<?php echo $data['desa_wp_baru']?>" disabled></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="11"></td>
        <td>KAB./KOTA.</td>
        <td colspan="3" class="input"><input type="text" value="<?php echo $data['kabupaten_baru']?>" disabled></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2">Alamat Objek Pajak</td>
        <td></td>
        <td>:</td>
        <td class="input" colspan="9"><input type="text" value="<?php echo $data['letak_op_baru']?>" disabled></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="5"></td>
        <td>RT.</td>
        <td class="input"><input type="text" value="<?php echo $data['rt_op_baru']?>" disabled></td>
        <td>RW.</td>
        <td class="input"><input type="text" value="<?php echo $data['rw_op_baru']?>" disabled></td>
        <td colspan="2"></td>
        <td>KEL./DES.</td>
        <td colspan="3" class="input"><input type="text" value="<?php echo $data['desa_op_baru']?>" disabled></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="16"></td>
    </tr>
    <tr>
        <td colspan="11"></td>
        <td>KEC.</td>
        <td colspan="3" class="input"><input type="text" value="<?php echo $data['kecamatan_baru']?>" disabled></td>
        <td></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2">Luas Tanah/ bangunan</td>
        <td></td>
        <td >:LT</td>
        <td colspan="2"class="input"><input type="text" value="<?php echo $data['bumi_baru']?>" disabled></td>
        <td></td>
        <td>:LB</td>
        <td class="input"><input type="text" value="<?php echo $data['bangunan_baru']?>" disabled></td>
        <td colspan="5"></td>
    </tr>
    <tr>
        <td colspan="16" style="border-bottom: 4px solid black;"></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="13">b. apabila dikemudian hari ada yang berlainan dengan data sebagai dasar penerbitan ini, maka akan dilakukan peninjauan kembali.											
        </td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="13">c. berita acara ini sebagai dasar untuk proses selanjutnya
        </td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="5">Diverifikasi lapangan pada tanggal</td>
        <td colspan="3" style="border-bottom: 1px solid black;"></td>
        <td ></td>
        <td colspan="3" >Dibuat Di desa</td>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="11"></td>
        <td colspan="2">pada tanggal:</td>
        <td colspan="2" style="border-bottom: 1px solid black;"></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td align="center" colspan="2">Petugas Desa</td>
        <td colspan="8"></td>
        <td align="center" colspan="3">Petugas verifikasi</td>
    </tr>
    <tr>
        <td colspan="7"></td>
        <td colspan="4">Mengetahui</td>
    </tr>
    <tr>
        <td colspan="7"></td>
        <td colspan="4">Kepala Desa <?php echo $data['desa_op_baru']?></td>
    </tr>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td><br></td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td colspan="2" style="border-bottom: 1px solid black;"></td>
        <td colspan="9"></td>
        <td colspan="2" style="border-bottom: 1px solid black; font-family: Footlight MT;"><input type="text" value="<?php echo $data['username']?>" disabled></td>
    </tr>
    <tr>
        <td colspan="7"></td>
        <td colspan="3" style="border-bottom: 1px solid black;"><br></td>
    </tr>
    <tr>
        <td colspan="16" style="border-bottom: 4px solid black; height: 5px;"></td>
    </tr>
    </table>


<?php } ?>

<script type="text/javascript">
    window.print(); 
  </script>

</body>
</html>