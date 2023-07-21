<?php
include('koneksi.php');
 
$id_alat 		= $_POST['id_alat'];
$nama_alat		= $_POST['nama_alat'];
$lifeinyears		= $_POST['lifeinyears'];
$liveinunits		= $_POST['liveinunits'];
$meausure		= $_POST['meausure'];

$query = mysqli_query($kon, "UPDATE nama_alat SET 

nama_alat		='$nama_alat',
lifeinyears		='$lifeinyears',
liveinunits		='$liveinunits',
meausure		='$meausure'

WHERE id_alat='$id_alat'");
 
if($query){
 header("Location: data_alkes.php");
}else{
 echo 'Data gagal diinput. Klik <a href="data_alkes.php">di sini</a> untuk ke halaman depan.';
}

?>