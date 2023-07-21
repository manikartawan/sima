<?php
include('koneksi.php');
 
$id 			= $_POST['id'];
$nama_alkes 		= $_POST['nama_alkes'];
$no_inventaris 		= $_POST['no_inventaris'];
$lokasi 		= $_POST['lokasi'];
$unit 			= $_POST['unit'];
$tahun_beli		= $_POST['tahun_beli'];
$lokasi_asal 		= $_POST['lokasi_asal'];
$unit_asal		= $_POST['unit_asal'] . " Gd.".$lokasi_asal;
$kode_unit		= $_POST['kode_unit'];
$tanggal		= date('d-m-Y');

// membuat nomer inventaris
$kode_invent	= substr($no_inventaris,0,4); //potong 0 dari depan dan ambil 4 char
$kode_unit	= substr($unit,0,3); //potong 0 dari depan dan ambil 3 char
$no_inventaris 	= $kode_invent."/".$kode_unit."/".$_POST['lokasi']. "/ALKES/".$_POST['tahun_beli'];
$unit		= substr($unit,3); 
$unit_tujuan	= $unit . " Gd.".$lokasi;

// percobaan saja
echo $no_inventaris ."</br>";
echo $unit_asal ."</br>";
echo $unit_tujuan ."</br>";

// buat query
$sql = "INSERT INTO mutasi (kode_alkes,tanggal,unit_asal,unit_tujuan) VALUE ('$id','$tanggal','$unit_asal','$unit_tujuan')";
$query = mysqli_query($kon, $sql);

// update data alkes
$query = mysqli_query($kon, "UPDATE data_alkes SET 
no_inventaris	='$no_inventaris',
lokasi		='$lokasi',
unit		='$unit'
WHERE id='$id'");
 
if($query){
 header("Location: main.php");
}else{
 echo 'Data gagal diinput. Klik <a href="main.php">di sini</a> untuk ke halaman depan.';
}

?>