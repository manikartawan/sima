<?php

include("koneksi.php");

if(isset($_POST['Simpan'])){

// ambil data dari formulir
$kode	= $_POST['kode'];
$unit	= $_POST['unit'];
$gedung	= $_POST['gedung'];

// buat query
$sql = "INSERT INTO daftar_unit (unit, gedung) VALUE ('$unit','$gedung')";
   
$query = mysqli_query($kon, $sql);
if( $query ) {
	header('Location: data_unit.php?status=sukses');
} else {
	header('Location: data_unit.php?status=gagal');}
} else {
	die("Akses dilarang...");
}

?>