<?php 
include 'koneksi.php';

$id = $_POST['id'];

if($_POST['upload']){
	$nama = $id."_". $_FILES['file']['name'];
	$x = explode('.', $nama);
	$file_tmp = $_FILES['file']['tmp_name'];
	move_uploaded_file($file_tmp, 'file/'.$nama);
	}

// buat query
$sql = "INSERT INTO daftar_files (id_inventaris, nama_files) VALUE ('$id','$nama')";

$query = mysqli_query($kon, $sql);
if( $query ) {
		header('Location: edit_alkes.php?id='.$id);
		} else {
		echo "Upload file Gagal !";
		
	}

?>