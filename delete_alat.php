<?php
include('koneksi.php');
 
$id_alat = $_GET['id_alat'];
 
$query = mysqli_query($kon, "DELETE FROM nama_alat WHERE id_alat='$id_alat'");
 
if($query){
 echo 'Data berhasil dihapus. Klik <a href="data_alkes.php">di sini</a> untuk ke halaman utama.';
}else{
 echo 'Data gagal diinput. Klik <a href="data_alkes.php">di sini</a> untuk ke halaman utama.';
}
 
?>