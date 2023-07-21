<?php 
session_start();
include 'koneksi.php';
$nama = $_POST['nama'];
$sandi = $_POST['sandi'];

$query = mysqli_query($kon, "SELECT * FROM nama_user WHERE nama='$nama' AND sandi=md5('$sandi')");
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
            $_SESSION['nama'] = $data['nama'];
            header("Location: main.php");
    }    else {
    $_SESSION['login_gagal'] = "Username dan password salah" ;
    header("Location: index.php");
    }
 
?>