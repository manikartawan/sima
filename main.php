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
<a href="main.php" class="btn btn-sm btn-outline-primary" role="button">Home</a>
<a href="settings.php" class="btn btn-sm btn-outline-primary" role="button">Settings</a>
<a href="logout.php" class="btn btn-sm btn-outline-danger" role="button">Logout</a>

<span class="navbar-text">
</div>

<div class="card">
  <b><div class="card-header">HOME</div></b>

<div class="card-body">
    <h5 class="card-title">Master Database</h5>
    <p class="card-text">Add, Edit & Delete database Alat, Unit dan Distributor</p>
    <a href="database.php" class="btn btn-primary">&nbsp;&nbsp;Database&nbsp;&nbsp;</a>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <h5 class="card-title">Pengelolaan Inventaris</h5>
    <p class="card-text">Mutasi, recall, maintenance, Add, Edit & Delete Inventaris Alkes</p>
    <a href="inventaris.php" class="btn btn-success">&nbsp;&nbsp;Inventaris&nbsp;&nbsp;</a>
  </div>
</div>


<div class="card">
  <div class="card-body">
    <h5 class="card-title">laporan Maintenance & Kalibrasi</h5>
    <p class="card-text">Add, Edit & Delete Perawatan/Perbaikan Alkes</p>
    <a href="maintenanance.php" class="btn btn-warning">Maintenance</a>
  </div>
</div>

</body>
</html>

<footer class="mt-auto">
<center><div class="alert alert-warning" role="alert"> 2022 (C) Copyright - Prima Medika Hospital</div></center>