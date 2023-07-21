<?php
include('koneksi.php');
 
$id = $_GET['id'];
$id_user = $_GET['id_user'];


$query = mysqli_query($kon, "DELETE FROM daftar_files WHERE id='$id'");
 
if($query){
 	header('Location: edit_alkes.php?id='.$id_user);
}else{
 echo 'Data gagal diinput. Klik <a href="inventaris.php">di sini</a> untuk ke halaman utama.';
}
 
?>