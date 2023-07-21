<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
$id = $_GET['id'];
?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Photo</title>
</head>

<body>
	<h3>PHOTO DOKUMEN ATAU GAMBAR</h3>
	<canvas width="1" height="1" id="canvas">canvas</canvas>
	<div class="">
	<video autoplay="true" id="video-webcam">Izinkan untuk Mengakses Webcam</video>
	</p><button onclick="takeSnapshot()"> Ambil Gambar </button>
	</div>
		
	<script type="text/javascript">
    	// seleksi elemen video
    	var video = document.querySelector("#video-webcam");

    	// minta izin user
    	navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia ||         navigator.msGetUserMedia || navigator.oGetUserMedia;

    	// jika user memberikan izin
    	if (navigator.getUserMedia) {
        	// jalankan fungsi handleVideo, dan videoError jika izin ditolak
        	navigator.getUserMedia({ video: true }, handleVideo, videoError);
    		}

    	// fungsi ini akan dieksekusi jika  izin telah diberikan
    	function handleVideo(stream) {
        	video.srcObject = stream;
    		}

    	// fungsi ini akan dieksekusi kalau user menolak izin
    	function videoError(e) {
        	// do something
        	alert("Mohon izinkan menggunakan webcam !")
    		}

	function takeSnapshot() {
    		// buat elemen img
    		var canvas = document.getElementById('canvas');
    	var context;

    	// ambil ukuran video
    		var width = video.offsetWidth
            , height = video.offsetHeight;

    	// buat elemen canvas
    	canvas = document.getElementById('canvas');
    	canvas.width = width;
    	canvas.height = height;

    	// ambil gambar dari video dan masukan 
    	// ke dalam canvas
    	context = canvas.getContext('2d');
    	context.drawImage(video, 0, 0, width, height);

    	// render hasil dari canvas ke elemen img
    	img.src = canvas.toDataURL('image/png');
    	document.body.appendChild(img);

	}
</script>
	
		</p><div><input type="button" onclick="uploadEx()" value="Upload" /></div>
		<form method="post" accept-charset="utf-8" name="form1">
		<input name="hidden_data" id='hidden_data' type="hidden"/>
		<input name="nama_file" id='nama_file' value='<?php echo $id;?>' type="hidden"/>
		</form>

		<script>
			function uploadEx() {
				var canvas = document.getElementById("canvas");
				var dataURL = canvas.toDataURL("image/png");
				document.getElementById('hidden_data').value = dataURL;
				var fd = new FormData(document.forms["form1"]);

				var xhr = new XMLHttpRequest();
				xhr.open('POST', 'upload_data.php', true);

				xhr.upload.onprogress = function(e) {
					if (e.lengthComputable) {
						var percentComplete = (e.loaded / e.total) * 100;
						console.log(percentComplete + '% uploaded');
						alert('Succesfully uploaded');
					}
				};

				xhr.onload = function() {

				};
				xhr.send(fd);
			};
		</script>
	</body>
</html>