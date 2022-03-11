<?php 
	
	$konek = mysqli_connect("localhost", "root", "", "grafiksensor");

	$suhu = $_GET['DATA'];
	//simpan ke tabel_sensor
	//atur ID selalu 1
	mysqli_query($konek, "ALTER TABLE tabel_sensor AUTO_INCREMENT=1");

	$simpan = mysqli_query($konek, "INSERT INTO tabel_sensor(suhu)VALUES('$suhu')");

	//berikan respon ke nodemcu
	if ($simpan)
		echo "Berhasil disimpan";
	else 
		echo "Hadeh Gagal Tersimpan Ges...";


		
?>