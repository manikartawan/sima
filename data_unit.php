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
<a href="database.php" class="btn btn-sm btn-danger">Cancel</a>
<span class="navbar-text">
</div>


<div class="card">
  <b><div class="card-header">DAFTAR UNIT / BAGIAN</div></b>
</div>

</p><span align="right">
<a class="btn btn-primary" href="add_unit.php" role="button">+ Add New Data</a>&ensp;
</span>
</p>
	<table class= "table table-hover" border="1">
		<tr class="bg-dark" style="color:white">
			<th>No</th>
			<th>Kode</th>
			<th>Unit</th>
			<th>Gedung</th>
			<th>Action</th>
		</tr>

		<?php 
		include 'koneksi.php';

		$batas = 50;
		$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
		$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
 
		$previous = $halaman - 1;
		$next = $halaman + 1;				

		$data = mysqli_query($kon,"select * from daftar_unit");
		$jumlah_data = mysqli_num_rows($data);
		$total_halaman = ceil($jumlah_data / $batas);

		$data = mysqli_query($kon,"select * from daftar_unit limit $halaman_awal, $batas");
		$no =$halaman_awal + 1;

		while($d = mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['kode']; ?></td>
				<td><?php echo $d['unit']; ?></td>
				<td><?php echo $d['gedung']; ?></td>
				<td>
					<a href="edit_unit.php?kode=<?php echo $d['kode']; ?>">Edit</a> | 
					<a href="delete_unit.php?kode=<?php echo $d['kode']?>" onclick="return confirm('Hapus data ini?')">Delete</a></td>

				</td>
			</tr>
			<?php 
		}
		?>

	</table>

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
<center><div class="alert alert-warning" role="alert"> 2022 (C) Copyright - Prima Medika Hospital</div></center>
