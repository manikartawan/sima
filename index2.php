<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print QRCODE</title>
</head>
<body>
    <script type="text/javascript">
        function print_page() {
            var ButtonControl = document.getElementById("btnprint");
            ButtonControl.style.visibility = "hidden";
            window.print();
        }
    </script>

<table border="0">
<tr>
<td>
<?php

 $no_inv 	= $_GET['no_inventaris'];
 $nama_alkes	= $_GET['nama_alkes'];
	 	
 include "phpqrcode/qrlib.php"; 
 $tempdir = "temp/";
 if (!file_exists($tempdir))
    mkdir($tempdir);
    $codeContents = 'https://www.maribelajarcoding.com'; 
    QRcode::png($codeContents, $tempdir.'007_2.png', QR_ECLEVEL_L, 2); 
    echo '<img src="'.$tempdir.'007_2.png"/>'; 
?>
</td>
<td>
<?php
echo "<b>"."RSU.PRIMA MEDIKA"."</b><br>";
echo $nama_alkes ."<br>";
echo $no_inv ."<br>";

?>
</td>
</tr>
</table>

<input type="button" id="btnprint" value="Print this Page" onclick="print_page()" />

</body>
</html>

