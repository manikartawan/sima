<?php
$hostname = "localhost";
$database = "sima";
$username = "gungmanik";
$password = "gm484095";
$kon = mysqli_connect($hostname, $username, $password, $database);
// script cek koneksi
if (!$kon) {
    die("Koneksi Tidak Berhasil: " . mysqli_connect_error());
}
?>