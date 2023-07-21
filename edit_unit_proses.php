<?php
include('koneksi.php');
 
$kode 	= $_POST['kode'];
$unit	= $_POST['unit'];
$gedung	= $_POST['gedung'];

$query = mysqli_query($kon, "UPDATE daftar_unit SET 

unit	='$unit',
gedung	='$gedung'

WHERE kode='$kode'");
 
if($query){
 header("Location: data_unit.php");
}else{
 echo 'Data gagal diinput. Klik <a href="data_unit.php">di sini</a> untuk ke halaman depan.';
}

?>