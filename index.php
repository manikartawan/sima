<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
  <title>Sistem Informasi Manajemen Alkes</title>
</head>


<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./asset/css/bootstrap.min.css">
    <title>SIMA - Sistem Informasi Manajemen Alkes</title>
</head>
<body>
<br>
    <form action="proses_login.php" method="POST">
        <div class="container" style="height: 500px">
            <div class="row h-100">
                <div class="col-sm-12 my-auto">
                    <div class="card w-50 mx-auto">
                        <div class="card-header bg-dark">
			<center>
				</p>
				<img src="logorspm.png" width="198" height="151" title="Logo of a company" alt="Logo of a company" />
                       		<h2 class="text-white"> S I M A</h2>
                       		<h5 class="text-white"> Sistem Informasi Manajemen Alkes</h5>
			</center>
                        </div>
                        <div class="card-body">
                        <div class="card-body">

                            <div class="form-group">
                                <div class="row">
                                <div class="col col-lg-3">Username</div>
                                <input type="text" name="nama" class="form-control col-md-6">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col col-lg-3">Password</div>
                                    <input type="password" name="sandi" class="form-control col-md-6">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col col-lg-3"> </div>
                                    </p>
				<input type="submit" class="btn btn-primary">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-auto"> </div>
                                    <?php
                                    if (isset($_SESSION['login_gagal'])) {
                                        echo '<div class="alert alert-warning" role="alert">';
                                        echo $_SESSION['login_gagal'];
                                        echo '</div> ';
                                        session_unset();
                                    }
                                    ?>
                                
</div>
</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </form>
</body>

<br><br><center>Versi 1.0 Copyright (C) 2022 - RSU.Prima Medika</center>
</html>