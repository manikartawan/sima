<?php
session_start();
if (!isset($_SESSION['nama'])) {
  header("Location: index.php");
	}
include('koneksi.php');
$kode = (isset($_GET['kode']))?$_GET['kode']:'';

$query = mysqli_query($kon, "select * from daftar_unit where kode='$kode'");
//var_dump($query); --> untuk test saja
$data = mysqli_fetch_array($query);
$kode = $data['kode'];

$kode = $data['kode'];
$unit = $data['unit'];
$gedung = $data['gedung'];

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

</p>


<div class="card">
<b><div class="card-header">EDIT DAFTAR UNIT / BAGIAN</div></b>
<div class="card-body">

<form action="edit_unit_proses.php" method="post">
	<input type="hidden" name="kode" value="<?php echo $kode ?>">

	<div class="mb-3"><label for="unit" class="form-label">Nama Unit / Bagian</label>
	<input type="text" class="form-control" id="unit" name="unit" value="<?php echo $unit?>" required></div>

	<a>Lokasi / Gedung  : &nbsp;</a>
	  <select id="gedung" name="gedung" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
	  <option selected><?php echo $gedung?></option>
	  <option value="A">A</option>
	  <option value="B">B</option>
	  <option value="C">C</option>
	  <option value="D">D</option>
	</select>
	

<input class="btn btn-primary" type="submit" value="Simpan">
<a class="btn btn-danger" href="data_unit.php" role="button">Cancel</a>
</form>

</div>
</div>

</body>
</html>

<footer class="mt-auto">
<center><div class="alert alert-warning" role="alert"> 2022 (C) Copyright - Prima Medika Hospital</div></center>