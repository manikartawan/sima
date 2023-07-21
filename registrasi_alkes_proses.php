<?php

include("koneksi.php");

if(isset($_POST['Simpan'])){

// ambil data dari formulir
$nama_alkes 		= $_POST['nama_alkes'];
$lokasi 		= $_POST['lokasi'];
$tgl_maintenance 	= $_POST['tgl_maintenance']; 
$unit 			= $_POST['unit'];
$merek 			= $_POST['merek'];
$serial 		= $_POST['serial'];
$tahun_beli 		= $_POST['tahun_beli'];
$harga_beli 		= $_POST['harga_beli'];
$status 		= $_POST['status'];
$status_kalibrasi 	= $_POST['status_kalibrasi'];
$jadwal_maintenance 	= $_POST['jadwal_maintenance'];
$kalibrasi_akhir 	= $_POST['kalibrasi_akhir'];
$kalibrasi_jadwal 	= $_POST['kalibrasi_jadwal'];
$no_kalibrasi 		= $_POST['no_kalibrasi'];
$distributor 		= $_POST['distributor'];
$gambar 		= $_POST['gambar'];

// membuka nomer database
$query = mysqli_query($kon, "select nomer from nomer");
$data = mysqli_fetch_array($query);
$nomer = $data['nomer'];
$fzeropadded = sprintf("%04d", $nomer);

// membuat nomer inventaris
$kode_unit	= substr($unit,0,3); //potong 0 dari depan dan ambil 3 char
$unit 		= substr($unit,3); // potong 3 char dari depan
$no_inventaris 	= $fzeropadded."/".$kode_unit."/".$_POST['lokasi']. "/ALKES/".$_POST['tahun_beli'];

// buat query
$sql = "INSERT INTO data_alkes (no_inventaris,nama_alkes,lokasi,tgl_maintenance,unit,merek,serial,tahun_beli,harga_beli,status,status_kalibrasi,jadwal_maintenance,kalibrasi_akhir, kalibrasi_jadwal,no_kalibrasi,distributor,gambar) VALUE ('$no_inventaris','$nama_alkes','$lokasi','$tgl_maintenance','$unit','$merek','$serial','$tahun_beli','$harga_beli','$status','$status_kalibrasi','$jadwal_maintenance','$kalibrasi_akhir','$kalibrasi_jadwal','$no_kalibrasi','$distributor','$gambar')";

// update nomer urut data
$nomer++;
$query = mysqli_query($kon, "UPDATE nomer SET nomer ='$nomer'");
    
$query = mysqli_query($kon, $sql);
if( $query ) {
	header('Location: inventaris.php?status=sukses');
} else {
	header('Location: inventaris.php?status=gagal');}
} else {
	die("Akses dilarang...");
}

?>