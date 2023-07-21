<?php
session_start();
if (!isset($_SESSION['nama'])) {
  header("Location: index.php");}
include('koneksi.php');
?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
  <link rel="stylesheet" href="js_2/jquery-ui.css">

<title>SIMA - Sistem Informasi manajemen Alkes (SIMA)</title>
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
<b><div class="card-header">DATA ALKES DI UNIT PELAYANAN<br></b></br>
<div class="card-header">Silahkan input nama Alkes atau nama Unit pada form dibawah dan tekan tombol cari<br>
<label>Input boleh dikosongkan jika tidak diperlukan dalam pencarian data</label>
<hr>
</p><span align="right"><a class="btn btn-primary" href="registrasi_alkes.php" role="button">+ Add New Data</a>  &ensp;  </span>
	<a class="btn btn-danger"  href="main.php" role="button">Cancel</a>
</p>

<form action="inventaris.php" method="get">
 <label>Nama Alkes : &nbsp; </label></br>
 <input type="text" name="cari"> &nbsp;
 </br><label>Nama Unit : &nbsp; </label></br>
 <input type="text" name="unit">
 <input type="submit" value="&nbsp;Cari&nbsp;">
</form>

<div class="card">
<?php 
if(isset($_GET['cari'])){
 $cari = $_GET['cari'];
 $unit = $_GET['unit'];
 echo "<b>Hasil pencarian : ".$cari." Di Unit ".$unit."</b>";
}
?>

<table class= "table table-hover" border="1">
<tr class="bg-dark" style="color:white">
  <th>No</th>
  <th>Nama_Alkes</th>
  <th>Unit</th>
  <th>Menu</th>
 </tr>

 <?php 
 if(isset($_GET['cari'])){
  $cari = $_GET['cari'];
  $data = mysqli_query($kon,"select * from data_alkes where nama_alkes like '%".$cari."%' and unit like '%".$unit."%'");    
 	}else{
  $data = mysqli_query($kon,"select * from data_alkes");    
	}
 $no = 1;
 while($d = mysqli_fetch_array($data)){
 ?>
<tr>
  <td><?php echo $no++; ?></td>
  <td><?php echo $d['nama_alkes']; ?></td>
  <td><?php echo $d['unit']; ?></td>

  <td>
  <a href="maintenance_alkes.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-outline-success" role="button">Maintenance</a></p>
  <a href="edit_alkes.php?id=<?php echo $d['id']; ?>" class="btn btn-sm btn-outline-warning" role="button">View/Edit</a></p>
  <a href="delete_alkes.php?id=<?php echo $d['id']?>" class="btn btn-sm btn-outline-danger" role="button" data-toggle="tooltip" onclick="return confirm('Hapus data ini?')"  >Delete</a>
  </td>

</tr>
 <?php } ?>
</table>

</div>
</div>

<div class="card-body">
	<a class="btn btn-danger"  href="main.php" role="button">Cancel</a>
</div>

</div>
</div>

</body>
</html>

<footer class="mt-auto">
<center><div class="alert alert-warning" role="alert"> 2023 GM (C) Copyright - Prima Medika Hospital</div></center>