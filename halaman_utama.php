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
  <title>SIMA - Sistem Informasi Manajemen Alkes</title>
  <link rel="stylesheet" href="./asset/fonts/font-awesome.min.css">
  <link rel="stylesheet" href="./asset/css/bootstrap.min.css">


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
  <b><div class="card-header">DATA INVENTARIS ALKES</div></b>
</p><span align="right"><a class="btn btn-primary" href="registrasi_alkes.php" role="button">+ Add New Data</a>  &ensp;  </span></p>
		<div class="table-responsive">
		<table class= "table table-hover" border="1">
		<tr class="bg-dark" style="color:white">
			<th>No</th>
			<th>ID.Inv</th>
			<th>Nama Alkes</th>
			<th>Merek</th>
			<th>Serial</th>
			<th>Lokasi</th>
			<th>Unit</th>
			<th>Menu</th>
		</tr>

		<?php 
		include 'koneksi.php';

		$batas = 50;
		$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
		$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
		$previous = $halaman - 1;
		$next = $halaman + 1;				

		$data = mysqli_query($kon,"select * from data_alkes");
		$jumlah_data = mysqli_num_rows($data);
		$total_halaman = ceil($jumlah_data / $batas);

		$data = mysqli_query($kon,"select * from data_alkes limit $halaman_awal, $batas");
		$no =$halaman_awal + 1;

		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['no_inventaris']; ?></td>
				<td><?php echo $d['nama_alkes']; ?></td>
				<td><?php echo $d['merek']; ?></td>
				<td><?php echo $d['serial']; ?></td>
				<td><?php echo $d['lokasi']; ?></td>
				<td><?php echo $d['unit']; ?></td>
				<td>

<a href="edit_alkes.php?id=<?php echo $d['id']; ?>" title="Edit Data" data-toggle="tooltip"><i class="fa fa-eye"></i></a>&nbsp;
<a href="edit_alkes.php?id=<?php echo $d['id']; ?>" title="Edit Data" data-toggle="tooltip"><i class="fa fa-pencil-square-o"></i></a>&nbsp;
<a href="<?php echo "upload/".$d['id'].".png"; ?>"  title="Photo Alkes" data-toggle="tooltip"><i class="fa fa-camera"></i></a>&nbsp;
<a href="index2.php?no_inventaris=<?php echo $d['no_inventaris']."& nama_alkes=". $d['nama_alkes']  ; ?>"  title="Stiker Alkes" data-toggle="tooltip"><i class="fa fa-barcode"></i></a>&nbsp;
<a href="delete_alkes.php?id=<?php echo $d['id']?>" title="Delete Alkes" data-toggle="tooltip" onclick="return confirm('Hapus data ini?')" ><i class="fa fa-trash"></i></a>
</tr>
			
<?php 
}
?>

	</table>
</div>

<nav>
<ul class="pagination justify-content-center">
<li class="page-item">
<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
</li>
<?php 
for($x=1;$x<=$total_halaman;$x++){
?> 
<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
<?php
}
?>				
<li class="page-item">
	<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
	</li>
	</ul>
</nav>

</div>
</div>

</body>

</html>

<footer class="mt-auto">
<center><div class="alert alert-warning" role="alert"> SIMA Vers.1.00, 2022(C)Copyright - RSU. Prima Medika Hospital</div></center>