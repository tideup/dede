<?php
$host ='localhost';
$user ='root';
$pas ='';
$database='grafiksensor';

$konek = mysqli_connect($host,$user,$pas,$database);

if (!$konek)
{
	echo "koneksi ke MYSQL gagal....";
}
?>