<?php
session_start();
if (!isset($_SESSION['nama'])) {
  header("Location: index.php");
	}

include('koneksi.php');
$sql = "SELECT * FROM daftar_unit";
$all_categories = mysqli_query($kon,$sql);

$sql2 = "SELECT * FROM nama_alat";
$all_categories2 = mysqli_query($kon,$sql2);

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
<a href="inventaris.php" class="btn btn-sm btn-outline-primary" role="button">Home</a>
<a href="settings.php" class="btn btn-sm btn-outline-primary" role="button">Settings</a>
<a href="logout.php" class="btn btn-sm btn-outline-danger" role="button">Logout</a>

<span class="navbar-text">
</div>

<div class="card">
<div class="card-header">
<h5 class="card-title">REGISTRASI ALKES</h5>
</div>

<div class="card-body">

<form action="registrasi_alkes_proses.php" method="post">
	
	<div class="row">

          <div class="col-lg-3">
	  <label>Nama Unit</label>
            <div class="form-floating mb-3">
		<select id="unit" name="unit" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"  >
    			<?php while ($category = mysqli_fetch_array($all_categories,MYSQLI_ASSOC)):;?>
    			<option value="<?php echo $category["kode"].$category["unit"];?>"> <?php echo $category["unit"]?></option>
    			<?php endwhile;?>
    			<option selected>Silahkan Pilih</option>
		</select>
            </div>
          </div>

          <div class="col-lg-3">
	  <label>Jenis Alkes</label>
         	<div class="form-floating mb-3">
		<select id="nama_alkes" name="nama_alkes" class="form-select form-select-lg mb-3"  aria-label=".form-select-lg example" >
    		  <?php while ($category2 = mysqli_fetch_array($all_categories2,MYSQLI_ASSOC)):;?>
    		  <option value="<?php echo $category2["nama_alat"];?>"> <?php echo $category2["nama_alat"]?></option>
    		  <?php endwhile;?>
    		  <option selected>Silahkan Pilih</option>
		</select>
            	</div>
          </div>
   	</div>

        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="merek" name="merek">
              <label for="floatingTextInput1">Merek</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="serial" name="serial">
              <label for="floatingTextInput2">No.Serial</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="tahun_beli" name="tahun_beli">
              <label for="floatingTextInput2">Tahun Beli</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="harga_beli" name="harga_beli">
              <label for="floatingTextInput1">Harga Beli</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
  		<select id="status" name="status" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
  			<option value="Milik RS">Milik RS</option>
  			<option value="KSO">KSO</option>
  			<option value="Sewa">Sewa</option>
  			<option value="Hibah">Hibah</option>
  			<option selected>Silahkan Pilih</option>
		</select>
              <label for="floatingTextInput1">Status Milik</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
 		 <select id="lokasi" name="lokasi" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
  			<option value="A">A</option>
  			<option value="B">B</option>
  			<option value="C">C</option>
  			<option value="D">D</option>
  			<option selected>Silahkan Pilih</option>
		</select>
              <label for="floatingTextInput2">Gedung</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
  			<select id="status_kalibrasi" name="status_kalibrasi" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
			  <option value="Terkalibrasi">Terkalibrasi</option>
			  <option value="Proses Kalibrasi">Proses Kalibrasi</option>
			  <option value="Tidak Terkalibrasi">Tidak Terkalibrasi</option>
			  <option selected>Silahkan Pilih</option>
			</select>
              <label for="floatingTextInput1">Status kalibrasi</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="date3" name="kalibrasi_akhir">
              <label for="floatingTextInput2">Tgl.Kalibrasi</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="number" class="form-control" id="date4" name="kalibrasi_jadwal">
              <label for="floatingTextInput2">Re-Kalibrasi</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="no_kalibrasi" name="no_kalibrasi">
              <label for="floatingTextInput1">Sertifikat.Kalibrasi</label>
            </div>
          </div>
         </div>

        <div class="row">
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="date" name="tgl_maintenance">
              <label for="floatingTextInput1">Tgl.Maintenance</label>
            </div>
          </div>
          <div class="col">
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="date2" name="jadwal_maintenance">
              <label for="floatingTextInput2">Jadwal Maintenance</label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3">
	  <label>Nama Distributor</label>
            <div class="form-floating mb-3">
		<select id="distributor" name="distributor" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"  >
		    <?php while ($category3 = mysqli_fetch_array($all_categories3,MYSQLI_ASSOC)):;?>
		    <option value="<?php echo $category3["nama_distributor"];?>"> <?php echo $category3["nama_distributor"]?></option>
		    <?php endwhile;?>
		    <option selected>Silahkan pilih</option>
		</select>
            </div>
          </div>
         </div>

<input class="btn btn-primary" type="submit" value="Simpan" name="Simpan">
<a class="btn btn-danger" href="inventaris.php" role="button">Cancel</a>

</form>

<script type="text/javascript">
 $(document).ready(function() {
     $('#nama_alkes').select2();
 });
</script>

<script type="text/javascript">
 $(document).ready(function() {
     $('#unit').select2();
 });
</script>

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