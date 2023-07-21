<?php
session_start();
if (!isset($_SESSION['nama'])) {
  header("Location: index.php");
	}
include('koneksi.php');
$id_alat = (isset($_GET['id_alat']))?$_GET['id_alat']:'';

$query = mysqli_query($kon, "select * from nama_alat where id_alat='$id_alat'");
//var_dump($query); --> untuk test saja
$data = mysqli_fetch_array($query);
$id_alat = $data['id_alat'];

$nama_alat = $data['nama_alat'];
$lifeinyears = $data['lifeinyears'];
$liveinunits = $data['liveinunits'];
$meausure = $data['meausure'];

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
<b><div class="card-header">EDIT DAFTAR NAMA ALKES</div></b>
<div class="card-body">

<form action="edit_alat_proses.php" method="post">
	<input type="hidden" name="id_alat" value="<?php echo $id_alat ?>">

	<div class="mb-3"><label for="nama_alat" class="form-label">Nama Alat Kesehatan (ALKES)</label>
	<input type="text" class="form-control" id="nama_alat" name="nama_alat" value="<?php echo $nama_alat?>" required></div>

	<div class="mb-3"><label for="lifeinyears" class="form-label">Life In Years</label>
	<input type="text" class="form-control" id="lifeinyears" name="lifeinyears" value="<?php echo $lifeinyears?>" required></div>
	
	<div class="mb-3"><label for="liveinunits" class="form-label">Live In Units</label>
	<input type="text" class="form-control" id="liveinunits" name="liveinunits" value="<?php echo $liveinunits?>" required></div>

	<div class="mb-3"><label for="meausure" class="form-label">Meausure</label>
	<input type="text" class="form-control" id="meausure" name="meausure" value="<?php echo $meausure?>" required></div>

<input class="btn btn-primary" type="submit" value="Simpan">
<a class="btn btn-danger" href="data_alkes.php" role="button">Cancel</a>
</form>

</div>
</div>

</body>
</html>

<footer class="mt-auto">
<center><div class="alert alert-warning" role="alert"> 2022 (C) Copyright - Prima Medika Hospital</div></center>