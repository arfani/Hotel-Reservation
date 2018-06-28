<?php
	// 1. Menyisipkan file class routeros_api
	include("routeros_api.class.php");

	// 2. Membuat instance (object) dari class routeros_api
	$API = new routeros_api();

	// deklarasi variable untuk koneksi ke mikrotik
	$hostname = "192.168.1.2";
	$username = "rfun";
	$password = "qwerty";

	if (!$API->connect($hostname, $username, $password))
	{
		$koneksi = "Tidak terkoneksi ke Mikrotik";
		echo "<p Style=\"font-size:14px; text-align:center; color:orange;\"><b> $koneksi </b></p>";
	} else {
		{
			$koneksi = "Terkoneksi ke Mikrotik";
			echo "<p Style=\"font-size:14px; text-align:center; color:orange;\"><b> $koneksi </b></p>";
		}
	}
?>
