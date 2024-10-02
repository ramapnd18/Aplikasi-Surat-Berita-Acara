<?php
	$koneksi = mysqli_connect("localhost", "root", "", "bapenda");

	if (mysqli_connect_error()) {
		echo "Koneksi databasse gagal :" .mysqli_connect_error();
	}
?>