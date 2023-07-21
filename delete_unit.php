<?php
include('koneksi.php');
 
$kode = $_GET['kode'];
 
$query = mysqli_query($kon, "DELETE FROM daftar_unit WHERE kode='$kode'");
 
if($query){
 echo 'Data berhasil dihapus. Klik <a href="data_unit.php">di sini</a> untuk ke halaman utama.';
}else{
 echo 'Data gagal diinput. Klik <a href="data_unit.php">di sini</a> untuk ke halaman utama.';
}
 
?>