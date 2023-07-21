<?php
include('koneksi.php');
 
$id 			= $_POST['id'];
$nama_distributor	= $_POST['nama_distributor'];
$alamat			= $_POST['alamat'];
$telepon		= $_POST['telepon'];
$handphone		= $_POST['handphone'];
$email			= $_POST['email'];
$cp			= $_POST['cp'];

$query = mysqli_query($kon, "UPDATE distributor SET 

nama_distributor	='$nama_distributor',
alamat			='$alamat',
telepon			='$telepon',
handphone		='$handphone',
email			='$email',
cp			='$cp'

WHERE id='$id'");
 
if($query){
 header("Location: data_supplier.php");
}else{
 echo 'Data gagal diinput. Klik <a href="data_supplier.php">di sini</a> untuk ke halaman depan.';
}

?>