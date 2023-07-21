<?php
include('koneksi.php');
 
$id 			= $_POST['id'];
$tgl_maintenance 	= $_POST['tgl_maintenance']; 
$merek 			= $_POST['merek'];
$serial 		= $_POST['serial'];
$tahun_beli 		= $_POST['tahun_beli'];
$harga_beli 		= $_POST['harga_beli'];
$status 		= $_POST['status'];
$kondisi 		= $_POST['kondisi'];
$status_kalibrasi 	= $_POST['status_kalibrasi'];
$jadwal_maintenance 	= $_POST['jadwal_maintenance'];
$kalibrasi_akhir 	= $_POST['kalibrasi_akhir'];
$kalibrasi_jadwal 	= $_POST['kalibrasi_jadwal'];
$no_kalibrasi 		= $_POST['no_kalibrasi'];
$distributor 		= $_POST['distributor'];

$query = mysqli_query($kon, "UPDATE data_alkes SET 
tgl_maintenance		='$tgl_maintenance',
merek 			='$merek',
serial 			='$serial',
tahun_beli 		='$tahun_beli',
harga_beli 		='$harga_beli',
status 			='$status',
kondisi			='$kondisi',
status_kalibrasi	='$status_kalibrasi',
jadwal_maintenance 	='$jadwal_maintenance',
kalibrasi_akhir 	='$kalibrasi_akhir',
kalibrasi_jadwal 	='$kalibrasi_jadwal',
no_kalibrasi 		='$no_kalibrasi',
distributor 		='$distributor'
WHERE id='$id'");
 
if($query){
 header("Location: inventaris.php");
}else{
 echo 'Data gagal diinput. Klik <a href="inventaris.php">di sini</a> untuk ke halaman depan.';
}

?>