<?php
session_start();
if (!isset($_SESSION['nama'])) {
  header("Location: index.php");
}
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
<a href="halaman_utama.php" class="btn btn-sm btn-outline-primary" role="button">Home</a>
<a href="settings.php" class="btn btn-sm btn-outline-primary" role="button">Settings</a>
<a href="logout.php" class="btn btn-sm btn-outline-danger" role="button">Logout</a>
&emsp;&emsp;
<a href="halaman_utama.php" class="btn btn-sm btn-outline-success" role="button">Inventaris</a>
<a href="maintenace.php" class="btn btn-sm btn-outline-success" role="button">Maintenace</a>
<a href="laporan.php" class="btn btn-sm btn-outline-success" role="button">Laporan</a>
<a href="data_alkes.php" class="btn btn-sm btn-outline-success" role="button">Alat</a>
<a href="data_unit.php" class="btn btn-sm btn-outline-success" role="button">Unit</a>
<a href="data_supplier.php" class="btn btn-sm btn-outline-success" role="button">Distributor</a>

<span class="navbar-text">
</div>

<div class="card">
  <b><div class="card-header">
    DATA
  </div></b>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>


</body>
</html>

<footer class="mt-auto">
<center><div class="alert alert-warning" role="alert"> 2022 (C) Copyright - Prima Medika Hospital</div></center>