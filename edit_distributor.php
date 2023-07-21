<?php
session_start();
if (!isset($_SESSION['nama'])) {
  header("Location: index.php");
	}
include('koneksi.php');
$id = (isset($_GET['id']))?$_GET['id']:'';

$query = mysqli_query($kon, "select * from distributor where id='$id'");
//var_dump($query); --> untuk test saja
$data = mysqli_fetch_array($query);
$id = $data['id'];

$nama_distributor = $data['nama_distributor'];
$alamat = $data['alamat'];
$telepon = $data['telepon'];
$handphone = $data['handphone'];
$email = $data['email'];
$cp = $data['cp'];

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
<b><div class="card-header">EDIT DAFTAR DISTRIBUTOR</div></b>
<div class="card-body">

<form action="edit_distributor_proses.php" method="post">
	<input type="hidden" name="id" value="<?php echo $id ?>">

	<div class="mb-3"><label for="nama_distributor" class="form-label">Nama Perusahaan</label>
	<input type="text" class="form-control" id="nama_distributor" name="nama_distributor" value="<?php echo $nama_distributor?>" required></div>

	<div class="mb-3"><label for="alamat" class="form-label">Alamat Perusahaan</label>
	<input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat?>" required></div>
	
	<div class="mb-3"><label for="telepon" class="form-label">Telepon Perusahaan</label>
	<input type="number" class="form-control" id="telepon" name="telepon" value="<?php echo $telepon?>" required></div>

	<div class="mb-3"><label for="handphone" class="form-label">Handphone Contact Person / Perusahaan</label>
	<input type="number" class="form-control" id="handphone" name="handphone" value="<?php echo $handphone?>" required></div>
	
	<div class="mb-3"><label for="telepon" class="form-label">alamat E-Mail Perusahaan</label>
	<input type="text" class="form-control" id="email" name="email" value="<?php echo $email?>" required></div>

	<div class="mb-3"><label for="cp" class="form-label">Contact Person/Manajer Perusahaan</label>
	<input type="text" class="form-control" id="cp" name="cp" value="<?php echo $cp?>" required></div>


<input class="btn btn-primary" type="submit" value="Simpan">
<a class="btn btn-danger" href="data_supplier.php" role="button">Cancel</a>
</form>

</div>
</div>

</body>
</html>

<footer class="mt-auto">
<center><div class="alert alert-warning" role="alert"> 2022 (C) Copyright - Prima Medika Hospital</div></center>