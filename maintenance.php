<?php
session_start();
if (!isset($_SESSION['nama'])) {
  header("Location: index.php");
}
$id = $_GET['id'];
$idx = $_GET['idx'];

include('koneksi.php');
$query = mysqli_query($kon, "select * from maintenance where id='$idx' and id_alat='$id'");
//var_dump($query);
$data = mysqli_fetch_array($query);
$unit		= $data['unit'];
$gedung		= $data['gedung'];
$no_inventaris	= $data['no_inventaris'];
$nama_alat	= $data['nama_alat'];
$merek		= $data['merek'];
$serial		= $data['serial'];
$tanggal	= date('d-m-Y', strtotime($data['tanggal']));
$tipe_maintenance = $data['tipe_maintenance'];
$jenis_maintenance = $data['jenis_maintenance'];
$tindakan 	= $data['tindakan'];
$laporan	= $data['laporan'];
$biaya		= $data['biaya'];
$teknisi	= $data['teknisi'];
$diperbaiki_oleh= $data['diperbaiki_oleh'];
$lapor_tanggal	= date('d-m-Y', strtotime($data['lapor_tanggal']));
$lapor_jam	= $data['lapor_jam'];
$lapor_unit	= $data['lapor_unit'];
$lapor_nama	= $data['lapor_nama'];
$lapor_keluhan	= $data['lapor_keluhan'];
$lapor_kerusakan= $data['lapor_kerusakan'];
$kerja_rencana	= $data['kerja_rencana'];
$kerja_sparepart= $data['kerja_sparepart'];
$serah_tanggal	= date('d-m-Y', strtotime($data['serah_tanggal']));
$serah_jam	= $data['serah_jam'];
$serah_nama	= $data['serah_nama'];
$serah_unit	= $data['serah_unit'];
$kondisi_alat	= $data['kondisi_alat'];
$katagori	= $data['katagori'];
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
  <title>SIMA - Sistem Informasi Manajemen Alkes</title>
</head>

<body class="d-flex flex-column min-vh-100">
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand">
  &ensp;<img src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
  &ensp;Sistem Informasi Manajemen Alkes (SIMA)
  </a>
</nav>

<div class="alert alert-warning" role="alert">
<a href="main.php" class="btn btn-sm btn-outline-primary" role="button">Home</a>
<a href="settings.php" class="btn btn-sm btn-outline-primary" role="button">Settings</a>
<a href="logout.php" class="btn btn-sm btn-outline-danger" role="button">Logout</a>
<span class="navbar-text">
</div>

<div class="card">
  <b><div class="card-header">LAPORAN MAINTENANCE</div></b>
  <div class="card-body">
	<h5><label>Nama Alkes : <?php echo $nama_alat?></label></h5>
	<label>No. Inventaris 	: <?php echo $no_inventaris?></label><br>
	<label>Merek : <?php echo $merek?></label><label>, Serial : <?php echo $serial?></label><br>
			<label>Gedung 		: <?php echo $gedung?></label>
			<label>, Unit 		: <?php echo $unit?></label><br>
			<label>Tanggal 		: <?php echo $tanggal?></label>
	<hr>
	<label>Maintenance : <?php echo $tipe_maintenance." - ".$jenis_maintenance." - ".$tindakan?></label><br>
	<label>Katagori : <?php echo $katagori; ?></label><br>
	<hr>

	<div class="row">
    	<div class="col">
  		<label for="laporan" class="form-label">Laporan</label>
  		<textarea class="form-control" id="laporan" name="laporan" rows="2"> <?php echo $laporan?></textarea>
	</div>
	</div>
	<div class="row">
    	<div class="col">
  		<label for="laporan" class="form-label">Keluhan</label>
  		<textarea class="form-control" id="lapor_keluhan" name="lapor_keluhann" rows="2"><?php echo $lapor_keluhan?></textarea>
	</div>

    	<div class="col">
  		<label for="laporan" class="form-label">Kerusakan</label>
  		<textarea class="form-control" id="lapor_kerusakan" name="lapor_kerusakan" rows="2"><?php echo $lapor_kerusakan?></textarea>
	</div>
	</div>

	<div class="row">
    	<div class="col">
  		<label for="laporan" class="form-label">Rencana</label>
  		<textarea class="form-control" id="kerja_rencana" name="kerja_rencana" rows="2"><?php echo $kerja_rencana?></textarea>
	</div>
    	<div class="col">
  		<label for="laporan" class="form-label">Spareparts</label>
  		<textarea class="form-control" id="kerja_sparepart" name="kerja_sparepart" rows="2"><?php echo $kerja_sparepart?></textarea>
	</div>
	</div>



</p>
<label>KONDISI ALKES : <?php echo $kondisi_alat;?></label><br>
<label>Alkes sudah diproses dan diserahkan tanggal : <?php echo $serah_tanggal .", ". $serah_jam;?></label><br>
<label>Nama Penerima :<?php echo $serah_nama . " - ". $serah_unit; ?></label>
<label>, Unit : <?php echo $unit?></label><br>
<label>Tanggal : <?php echo $tanggal?></label>
<hr>

<a class="btn btn-danger" href="maintenance_alkes.php?id=<?php echo $id; ?>" role="button">Kembali/Cancel</a>

</div>

</div>
</div>

</body>
</html>
<footer class="mt-auto">
<center><div class="alert alert-warning" role="alert"> 2022 (C) Copyright - Prima Medika Hospital</div></center>