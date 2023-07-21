<?php
include('koneksi.php');
 
$id = $_GET['id'];
 
$query = mysqli_query($kon, "DELETE FROM distributor WHERE id='$id'");
 
if($query){
 echo 'Data berhasil dihapus. Klik <a href="data_supplier.php">di sini</a> untuk ke halaman utama.';
}else{
 echo 'Data gagal diinput. Klik <a href="data_supplier.php">di sini</a> untuk ke halaman utama.';
}
 
?>