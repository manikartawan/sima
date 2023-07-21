<?php

include("koneksi.php");

if(isset($_POST['Simpan'])){

// ambil data dari formulir
$id 			= $_POST['id'];
$nama_distributor	= $_POST['nama_distributor'];
$alamat			= $_POST['alamat'];
$telepon		= $_POST['telepon'];
$handphone		= $_POST['handphone'];
$email			= $_POST['email'];
$cp			= $_POST['cp'];

// buat query
$sql = "INSERT INTO distributor (nama_distributor,alamat,telepon,handphone,email,cp) VALUE
('$nama_distributor','$alamat','$telepon','$handphone','$email','$cp')";
   
$query = mysqli_query($kon, $sql);
if( $query ) {
	header('Location: data_supplier.php?status=sukses');
} else {
	header('Location: data_supplier.php?status=gagal');}
} else {
	die("Akses dilarang...");
}

?>