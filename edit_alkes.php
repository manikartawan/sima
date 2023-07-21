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

$sql3 = "SELECT * FROM distributor";
$all_categories3 = mysqli_query($kon,$sql3);

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
<h5 class="card-title">INFORMASI ALKES</h5>
<h6 class="card-title">No.Invent : <?php echo $no_inventaris?></h6>
</div>

<div class="card-body">
<a class="btn btn-warning" href="mutasi_alkes.php?id=<?php echo $id ?>" role="button">Mutasi</a>&nbsp;
<a class="btn btn-warning" href="recall_alkes.php?id=<?php echo $id ?>" role="button" data-toggle="tooltip" onclick="return confirm('Recall (penarikan kembali) alkes ini?')" >ReCall</a>&nbsp;
<a class="btn btn-danger" href="inventaris.php" role="button">Cancel</a>
<hr>
</p>

<form action="edit_alkes_proses.php" method="post">
<input type="hidden" name="id" value="<?php echo $id ?>">
<input type="hidden" name="no_inventaris" value="<?php echo $no_inventaris?>">
<input type="hidden" name="nama_alkes" value="<?php echo $nama_alkes?>">
<input type="hidden" name="lokasi" value="<?php echo $lokasi?>">
<input type="hidden" name="unit" value="<?php echo $unit?>">

	<div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingTextInput2"  value="<?php echo $nama_alkes?>" disabled>
              <label for="floatingTextInput2">jenis Alkes</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingTextInput2" id="merek" name="merek" value="<?php echo $merek?>">
              <label for="floatingTextInput2">Merek</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="date1" name="distributor" value="<?php echo $distributor?>">
              <label for="floatingTextInput2">Distributor</label>
            </div>
          </div>
	</div>

	<div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingTextInput1" id="serial" name="serial" value="<?php echo $serial?>" >
              <label for="floatingTextInput1">Serial</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="floatingTextInput2" name="tahun_beli" value="<?php echo $tahun_beli?>">
              <label for="floatingTextInput2">Tahun</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="floatingTextInput2" id="harga_beli" name="harga_beli" value="<?php echo $harga_beli?>">
              <label for="floatingTextInput2">Harga</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingTextInput2" value="<?php echo $lokasi?>" disabled>
              <label for="floatingTextInput2">Gedung</label>
            </div>
          </div>
	</div>

        <div class="row">
          <div class="col-lg-3">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingTextInput2" value="<?php echo $unit?>" disabled>
              <label for="floatingTextInput2">Unit</label>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="form-floating mb-3">
  			<select id="status" name="status" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
  				<option selected><?php echo $status?></option>
 				<option value="Milik RS">Milik RS</option>
  				<option value="KSO">KSO</option>
  				<option value="Sewa">Sewa</option>
  				<option value="Hibah">Hibah</option>
			</select>
              <label for="floatingTextInput2">Status</label>
            </div>
          </div>
	<div class="col-lg-3">
            <div class="form-floating mb-3">
  		<select id="kondisi" name="kondisi" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
  			<option selected><?php echo $kondisi?></option>
  			<option value="Baik">Baik</option>
  			<option value="Rusak">Rusak</option>
  			<option value="Maintenance">Maintenance</option>
		</select>
              <label for="floatingTextInput2">Kondisi</label>
            </div>
          </div>
	</div>

	<div class="row">
          <div class="col">
            <div class="form-floating mb-3">
  		<select id="status_kalibrasi" name="status_kalibrasi" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
  		<option selected><?php echo $status_kalibrasi?></option>
  		<option value="Terkalibrasi">Terkalibrasi</option>
  		<option value="Proses Kalibrasi">Proses Kalibrasi</option>
  		<option value="Tidak Terkalibrasi">Tidak Terkalibrasi</option>
		</select>
              <label for="floatingTextInput1">Kalibrasi</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="date1" name="kalibrasi_akhir" value="<?php echo $kalibrasi_akhir?>">
              <label for="floatingTextInput2">Tgl kalibrasi</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="floatingTextInput2" id="no_kalibrasi" name="no_kalibrasi" value="<?php echo $no_kalibrasi?>">
              <label for="floatingTextInput2">Sertifikat</label>
            </div>
          </div>
	</div>

	<label>Rencana Maintenance & Kalibrasi</label>

	<div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="date2" name="tgl_maintenance" value="<?php echo $tgl_maintenance?>" >
              <label for="floatingTextInput1">Selesai</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="date3" name="jadwal_maintenance" value="<?php echo $jadwal_maintenance?>">
              <label for="floatingTextInput2">Rencana</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="date4" name="kalibrasi_jadwal" value="<?php echo $kalibrasi_jadwal?>">
              <label for="floatingTextInput2">Kalibrasi</label>
            </div>
          </div>
	</div>


</p>
<input class="btn btn-primary" type="submit" value="Simpan">&nbsp;
<a class="btn btn-danger" href="inventaris.php" role="button">Cancel</a>
</form>

</div> 
</div> 
</div> 


<div class="card">
<b><div class="card-header">UPLOAD FILES KE SERVER</div></b>
</p><form action="files_upload.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $id ?>">&nbsp;
		<input type="file" name="file">
		<input type="submit" name="upload" value="Upload">
</form>	
</div>

<table class= "table table-hover" border="1">
	<tr class="bg-dark" style="color:white">
		<th>NO</th>
		<th>Nama File</th>
		<th>Action</th>
		</tr>
	<?php 
		$data = mysqli_query($kon,"select * from daftar_files where id_inventaris = $id");
		$no = 1;

		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['nama_files']; ?></td>
				<td>	
					<a href="file/<?php echo $d['nama_files']?>" >Lihat File</a> | 
					<a href="inventaris_file_delete.php?id=<?php echo $d['id']?>&id_user=<?php echo $id_user?>" onclick="return confirm('Hapus data ini?')">Delete</a></td>
				</td>
			</tr>
			<?php 
						}
	?>
</table>

</div>
</div>

<script type="text/javascript">
 $(document).ready(function() {
     $('#distributor').select2();
 });
</script>


</div>
</div>

</body>
</html>
<footer class="mt-auto">
<center><div class="alert alert-warning" role="alert"> 2022 (C) Copyright - Prima Medika Hospital</div></center>