<?php
session_start();
if (!isset($_SESSION['nama'])) {
  header("Location: index.php");
	}
include('koneksi.php');
$id = (isset($_GET['id']))?$_GET['id']:'';
$query = mysqli_query($kon, "select * from data_alkes where id='$id'");
//var_dump($query); --> untuk test saja

$data = mysqli_fetch_array($query);
$id = $data['id'];
$no_inventaris = $data['no_inventaris'];
$nama_alkes = $data['nama_alkes'];
$merek = $data['merek'];
$serial = $data['serial'];
$tahun_beli = $data['tahun_beli'];
$harga_beli = $data['harga_beli'];
$status = $data['status'];
$lokasi = $data['lokasi'];
$unit = $data['unit'];
$kondisi = $data['kondisi'];
$status_kalibrasi = $data['status_kalibrasi'];
$tgl_maintenance = $data['tgl_maintenance'];
$jadwal_maintenance = $data['jadwal_maintenance'];
$kalibrasi_akhir = $data['kalibrasi_akhir'];
$kalibrasi_jadwal = $data['kalibrasi_jadwal'];
$no_kalibrasi = $data['no_kalibrasi'];
$link_kalibrasi = $data['link_kalibrasi'];
$distributor = $data['distributor'];
$nomer= $data['nomer'];
$kode_unit = $data['kode_unit'];
$gambar = $data['gambar'];
$id_user=$id;

$sql = "SELECT * FROM daftar_unit";
$all_categories = mysqli_query($kon,$sql);
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./asset/css/bootstrap.min.css">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

 	<script> $( function() { $( "#date" ).datepicker({dateFormat: "dd-mm-yy" }); } );</script>
 	<script> $( function() { $( "#date2" ).datepicker({dateFormat: "dd-mm-yy" }); } );</script>
 	<script> $( function() { $( "#date3" ).datepicker({dateFormat: "dd-mm-yy" }); } );</script>
 	<script> $( function() { $( "#date4" ).datepicker({dateFormat: "dd-mm-yy" }); } );</script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>


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
	<div class="card-header">
	<h5 class="card-title">FORMULIR MAINTENANCE ALKES</h5>
</div>

<div class="card-body">

<div class="card">
	<div class="card-header">
	<h6 class="card-title">No.Invent : <?php echo $no_inventaris?></h6>
	<h6 class="card-title">Lokasi Alkes : Unit <?php echo $unit. " - Gedung  ". $lokasi    ?> </h6>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Data Alkes</th>
      <th scope="col">Merek</th>
      <th scope="col">No.Seri</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><h6 class="card-title"><?php echo $nama_alkes?></h6></th>
      <td><h6 class="card-title"><?php echo $merek?></h6></td>
      <td><h6 class="card-title"><?php echo $serial?></h6></td>
    </tr>
  </tbody>
</table>
</div>
</div>

<div class="card-body">
<form action="maintenance_alkes_proses.php" method="post">

<input type="hidden" name="id_alat" value="<?php echo $id?>">
<input type="hidden" name="unit" value="<?php echo $unit?>">
<input type="hidden" name="gedung" value="<?php echo $lokasi?>">
<input type="hidden" name="no_inventaris" value="<?php echo $no_inventaris?>">
<input type="hidden" name="nama_alat" value="<?php echo $nama_alkes?>">
<input type="hidden" name="merek" value="<?php echo $merek?>">
<input type="hidden" name="serial" value="<?php echo $serial?>">

<div class="row">
    	<div class="col">
		<label>Tgl Maintenace</label>
		<input type="date" class="form-control" id="tanggal" name="tanggal">
	</div>
	<div class="col">
		<label>Tipe Mnt.</label>
 		 <select id="tipe_maintenance" name="tipe_maintenance" class="form-select">
  			<option value="Planned">Planned</option>
  			<option value="Unplanned">Unplanned</option>
  			<option selected>Pilih</option>
		</select>
	</div>
	<div class="col">
		<label>Jenis Mnt.</label>
 		 <select id="jenis_maintenance" name="jenis_maintenance" class="form-select">
  			<option value="Preventive">Preventive</option>
  			<option value="Corrective">Corrective</option>
  			<option value="Emergency">Emergency</option>
  			<option selected>Pilih</option>
		</select>
            </div>
</div>

</br>
<div class="row">
    	<div class="col">
		<label>Tindakan</label>
 		 <select id="tindakan" name="tindakan" class="form-select">
  			<option value="Running Maintenance">Running Maintenance</option>
  			<option value="Breakdown Maintenance">Breakdown Maintenance</option>
  			<option selected>Pilih</option>
		</select>
	</div>
	<div class="col">
		<label>Report</label>
 		 <select id="report" name="report" class="form-select">
  			<option value="On Progress">On Progress</option>
  			<option value="B">B</option>
  			<option value="C">C</option>
  			<option value="D">D</option>
  			<option selected>Pilih</option>
		</select>
	</div>
	<div class="col">
		<label>Katagori</label>
 		 <select id="katagori" name="katagori" class="form-select">
  			<option value="Small Overhaul">Small Overhaul</option>
  			<option value="Minor Overhaul">Minor Overhaul</option>
  			<option value="Major Overhaul">Major Overhaul</option>
  			<option selected>Pilih</option>
		</select>
	</div>

<div class="row">

</div>

</p>
<div class="row">
    	<div class="col">
  		<label for="laporan" class="form-label">Laporan</label>
  		<textarea class="form-control" id="laporan" name="laporan" rows="3"></textarea>
	</div>
</div>

</p>
<div class="row">
    	<div class="col">
		<label>Biaya</label>
		<input type="number" class="form-control" id="biaya" name="biaya">
	</div>
    	<div class="col">
		<label>Teknisi</label>
 		 <select id="teknisi" name="teknisi" class="form-select">
  			<option selected value="Elektromedis">Elektromedis</option>
  			<option value="Teknisi Umum">Teknisi Umum</option>
		</select>
	</div>
    	<div class="col">
		<label>Diperbaiki</label>
 		 <select id="diperbaiki_oleh" name="diperbaiki_oleh" class="form-select">
  			<option selected value="Intern">Intern</option>
  			<option value="Vendor Alkes">Vendor Alkes</option>
  			<option value="Instansi Lain">Instansi Lain</option>
		</select>
	</div>

</div>

</p>
<div class="row">
    	<div class="col">
		<label>Tgl Lapor</label>
		<input type="date" class="form-control" id="lapor_tanggal" name="lapor_tanggal">
	</div>
    	<div class="col">
		<label>Jam Lapor</label>
		<input type="time" class="form-control" id="lapor_jam" name="lapor_jam">
	</div>
</div>

<div class="row">
	<div class="col">
		<label>Unit Pelapor</label>
		<input type="text" class="form-control" id="lapor_unit" name="lapor_unit">
	</div>
	<div class="col">
		<label>Nama Pelapor</label>
		<input type="text" class="form-control" id="lapor_nama" name="lapor_nama">
            </div>
</div>

</p>
<div class="row">
    	<div class="col">
  		<label for="lapor_keluhan" class="form-label">Permasalahan</label>
  		<textarea class="form-control" id="lapor_keluhan" name="lapor_keluhan" rows="3"></textarea>
	</div>
    	<div class="col">
  		<label for="kerusakan" class="form-label">Kerusakan</label>
  		<textarea class="form-control" id="kerusakan"name="kerusakan" rows="3"></textarea>
	</div>
</div>

</p>
<div class="row">
    	<div class="col">
  		<label for="kerja_rencana" class="form-label">Rencana Kerja</label>
  		<textarea class="form-control" id="kerja_rencana" name="kerja_rencana"  rows="3"></textarea>
	</div>
    	<div class="col">
  		<label for="kerja_sparepart" class="form-label">Sparepart</label>
  		<textarea class="form-control" id="kerja_sparepart" name="kerja_sparepart" rows="3"></textarea>
	</div>
</div>


</p>
<label>Data dibawah diisi setelah proses maintenance selesai dan Alkes sudah diserahkan kepada : </label><hr>
<div class="row">
    	<div class="col">
		<label>Tgl Serah</label>
		<input type="date" class="form-control" id="serah_tanggal" name="serah_tanggal">
	</div>
    	<div class="col">
		<label>Jam Serah</label>
		<input type="time" class="form-control" id="serah_jam" name="serah_jam">
	</div>
</div>

<div class="row">
	<div class="col">
		<label>Nama</label>
		<input type="text" class="form-control" id="serah_nama" name="serah_nama">
	</div>
	<div class="col">
		<label>Unit</label>
		<input type="text" class="form-control" id="serah_unit" name="serah_unit">
            </div>
</div>


</p>
<div class="row">
	<div class="col-lg-3">
		<label>Kondisi Alat</label>
 		 <select id="kondisi_alat" name="kondisi_alat" class="form-select">
  			<option value="Baik">Baik</option>
  			<option value="Rusak">Rusak</option>
  			<option value="Recall">Recall</option>
  			<option selected>Pilih</option>
		</select>
	</div>
</div>



</div>
<script type="text/javascript">
 $(document).ready(function() {$('#unit').select2(); });
</script>

<div class="card-body">
</p><label>Pastikan data yang diinput sudah benar, Jika sudah benar silahkan tekan tombol simpan</label>
<hr>
<input class="btn btn-primary" type="submit" value="Simpan">
<a class="btn btn-danger" href="inventaris.php" role="button">Cancel</a>
</form>
</div>

<div class="card-body">
<b><label>History Maintenance Alkes</label></b>
<table class= "table table-hover" border="1">
	<tr class="bg-dark" style="color:white">
		<th>NO</th>
		<th>Tanggal</th>
		<th>Tipe</th>
		<th>Menu</th>
		</tr>
	<?php 
		$data = mysqli_query($kon,"select * from maintenance where id_alat = $id");
		$no = 1;

		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['tanggal']; ?></td>
				<td><?php echo $d['tipe_maintenance']. " - " . $d['report'] ;  ?></td>
				<td><a href="maintenance_alkes_view.php?idx=<?php echo $d['id']; ?>&id=<?php echo $id; ?>  " class="btn btn-sm btn-outline-warning" role="button">Detail</a></td>
	
				</td>
			</tr>
			<?php 
	}
	?>
</table>
</div>

</div>
</div>

</body>
</html>
<footer class="mt-auto">
<center><div class="alert alert-warning" role="alert"> 2022 (C) Copyright - Prima Medika Hospital</div></center>