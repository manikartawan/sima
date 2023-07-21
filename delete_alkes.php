<?php
include('koneksi.php');
 
$id = $_GET['id'];
 
$query = mysqli_query($kon, "DELETE FROM data_alkes WHERE id='$id'");
 
if($query){
 echo 'Data berhasil dihapus. Klik <a href="halaman_utama.php">di sini</a> untuk ke halaman utama.';
}else{
 echo 'Data gagal diinput. Klik <a href="halaman_utama.php">di sini</a> untuk ke halaman utama.';
}
 
?>