<?php
include("koneksi.php");

if(!isset($_POST['Simpan'])){

// ambil data dari formulir
$id_alat	= $_POST['id_alat'];
$unit		= $_POST['unit'];
$gedung		= $_POST['gedung'];
$no_inventaris	= $_POST['no_inventaris'];
$nama_alat	= $_POST['nama_alat'];
$merek		= $_POST['merek'];
$serial		= $_POST['serial'];
$tanggal	= date('d-m-Y', strtotime($_POST['tanggal']));
$tipe_maintenance = $_POST['tipe_maintenance'];
$jenis_maintenance = $_POST['jenis_maintenance'];
$tindakan 	= $_POST['tindakan'];
$laporan	= $_POST['laporan'];
$biaya		= $_POST['biaya'];
$teknisi	= $_POST['teknisi'];
$diperbaiki_oleh= $_POST['diperbaiki_oleh'];
$lapor_tanggal	= date('d-m-Y', strtotime($_POST['lapor_tanggal']));
$lapor_jam	= $_POST['lapor_jam'];
$lapor_unit	= $_POST['lapor_unit'];
$lapor_nama	= $_POST['lapor_nama'];
$lapor_keluhan	= $_POST['lapor_keluhan'];
$lapor_kerusakan= $_POST['lapor_kerusakan'];
$kerja_rencana	= $_POST['kerja_rencana'];
$kerja_sparepart= $_POST['kerja_sparepart'];
$serah_tanggal	= date('d-m-Y', strtotime($_POST['serah_tanggal']));
$serah_jam	= $_POST['serah_jam'];
$serah_nama	= $_POST['serah_nama'];
$serah_unit	= $_POST['serah_unit'];
$kondisi_alat	= $_POST['kondisi_alat'];
$katagori	= $_POST['katagori'];

// buat query
$sql = "INSERT INTO maintenance (
	id_alat,
	unit,
	gedung,
	no_inventaris,
	nama_alat,
	merek,
	serial,
	tanggal,
	tipe_maintenance,
	jenis_maintenance,
	tindakan,
	laporan,
	biaya,
	teknisi,
	diperbaiki_oleh,
	lapor_tanggal,
	lapor_jam,
	lapor_unit,
	lapor_nama,
	lapor_keluhan,
	lapor_kerusakan,
	kerja_rencana,
	kerja_sparepart,
	serah_tanggal,
	serah_jam,
	serah_unit,
	serah_nama,
	kondisi_alat,
	katagori
	) VALUE (
	'$id_alat',
	'$unit',
	'$gedung',
	'$no_inventaris',
	'$nama_alat',
	'$merek',
	'$serial',
	'$tanggal',
	'$tipe_maintenance',
	'$jenis_maintenance',
	'$tindakan',
	'$laporan',
	'$biaya',
	'$teknisi',
	'$diperbaiki_oleh',
	'$lapor_tanggal',
	'$lapor_unit',
	'$lapor_jam',	
	'$lapor_nama',
	'$lapor_keluhan',
	'$lapor_kerusakan',
	'$kerja_rencana',
	'$kerja_sparepart',
	'$serah_tanggal',
	'$serah_jam',
	'$serah_unit',
	'$serah_nama',
	'$kondisi_alat',
	'$katagori'
	)";
$query = mysqli_query($kon, $sql);
if($query) {
	header('Location: inventaris.php?status=sukses');
} else {
	header('Location: inventaris.php?status=gagal');}
} else {
	die("Akses dilarang...");
}
?>