<?php
$upload_dir = "upload/";
$img = $_POST['hidden_data'];
$nama_file = $_POST['nama_file'];

$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);

// Nama File dengan waktu
// $file = $upload_dir . mktime() . ".png";
 $file = $upload_dir .$nama_file. ".png";

$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';
?>