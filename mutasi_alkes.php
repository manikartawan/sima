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
	<h5 class="card-title">MUTASI ALKES</h5>
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
<Label> Alkes dari Unit </label>
<label><b style="color:red"><?php echo $unit?>, Gd.<?php echo $lokasi?></b> akan dimutasikan ke : </label>
<form action="mutasi_alkes_proses.php" method="post">
<input type="hidden" name="id" value="<?php echo $id?>">
<input type="hidden" name="unit_asal" value="<?php echo $unit?>">
<input type="hidden" name="lokasi_asal" value="<?php echo $lokasi?>">
<input type="hidden" name="no_inventaris" value="<?php echo $no_inventaris?>">
<input type="hidden" name="nama_alkes" value="<?php echo $nama_alkes?>">
<input type="hidden" name="kode_unit" value="<?php echo $kode_unit?>">
<input type="hidden" name="tahun_beli" value="<?php echo $tahun_beli?>">

<div class="row">
    <div class="col-lg-1">
	<label>Gedung :</label>
		<select class="form-select form-select-sm" aria-label=".form-select-sm example" id="lokasi" name="lokasi"   >
  			<option selected>Pilih</option>
  			<option value="D">D</option>
  			<option value="C">C</option>
  			<option value="A">A</option>
  			<option value="B">B</option>
		</select>
    </div>

          <div class="col-lg-3">
	  <label>Nama Unit</label>
            <div class="form-floating mb-3">
		<select id="unit" name="unit" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"  >
    			<?php while ($category = mysqli_fetch_array($all_categories,MYSQLI_ASSOC)):;?>
    			<option value="<?php echo $category["kode"].$category["unit"];?>"> <?php echo $category["unit"]?></option>
    			<?php endwhile;?>
    			<option selected>Pilih</option>
		</select>
            </div>
          </div>

</div>
</p><label>Pastikan nama gedung dan unit sudah benar, Jika sudah benar silahkan tekan tombol simpan,</label>
<hr>

<script type="text/javascript">
 $(document).ready(function() {$('#unit').select2(); });
</script>

<input class="btn btn-primary" type="submit" value="Simpan">
<a class="btn btn-danger" href="inventaris.php" role="button">Cancel</a>
</form>

</div>
</div>
</div>

<b><label> Data History Mutasi Alkes</label></b>
<table class= "table table-hover" border="1">
	<tr class="bg-dark" style="color:white">
		<th>NO</th>
		<th>Tanggal</th>
		<th>Asal</th>
		<th>Tujuan</th>
		</tr>
	<?php 
		$data = mysqli_query($kon,"select * from mutasi where kode_alkes = $id");
		$no = 1;

		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['tanggal']; ?></td>
				<td><?php echo $d['unit_asal']; ?></td>
				<td><?php echo $d['unit_tujuan']; ?></td>
				</td>
			</tr>
			<?php 
						}
	?>
</table>

</div>
</div>




</body>
</html>
<footer class="mt-auto">
<center><div class="alert alert-warning" role="alert"> 2022 (C) Copyright - Prima Medika Hospital</div></center>