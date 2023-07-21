<?php
include('koneksi.php');

$id = $_GET['id'];

$query = mysqli_query($kon, "UPDATE data_alkes SET kondisi ='Recall' WHERE id='$id'");

if($query){header("Location: inventaris.php");
}else{echo 'Data gagal diproses untuk recall. Klik <a href="main.php">di sini</a> untuk ke halaman depan.';
}
?>