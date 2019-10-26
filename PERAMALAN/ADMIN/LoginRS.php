<?php 

require 'Function.php';

if (isset($_POST["login"])) {
	$Username = $_POST["Username"]; // inisialisasi username
	$password = $_POST["password"]; // inisialisasi password

	$result =  mysqli_query($con,"SELECT * FROM user where Username = '$Username' and password = '$password'");
	$cek = mysqli_num_rows($result);
	if ( $cek > 0 ) {

		header("Location: BerandaRS.php");
		exit;
	}

	$error = true;
}


?>
<!DOCTYPE html>
<html>
<head>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="../Image/logo.png">
	<title>Manajemen Permintaan Stok Darah</title>
	<style type="text/css">
		@font-face {
			font-family: "BebasNeue-Regular";
			src: url('../BebasNeue-Regular.ttf');
		}

		* {
			font-family: "BebasNeue-Regular";
		}
	</style>
</head>
<body style="background-image: url(../Image/bgRS.png); background-size: cover; background-repeat: no-repeat; background-attachment: fixed;">
	<div class="container">
		<br>
		<div class="row">
			<div class="col-sm-12" >
				<a href="index.php">
					<img src="../Image/back.png" class="float-right w-10">
				</a>
			</div>
		</div>
		<br>
		<br>
		<div class="row" style="position: absolute; z-index: 99">
			<div class="col-md-4" style="padding-right: 0">
				<img src="../Image/bgRS.png" class="w-100" style="height: 400px; border-radius: 20px; filter:grayscale(100%); z-index: 1">
			</div>
			<div class="col-md-4 text-center" style="color: white;" >
				<br>
				<h1 style="font-size: 45pt">RUMAH SAKIT</h1> 
			</div>

		</div>
		<div class="row col-sm-10" style="position: absolute; z-index: 99; padding-top: 90px; margin-left: 200px;">
			<div class="col-sm-6" style="background-color: rgba(0,0,0, 0.5); border-radius: 20px; ">
				<br>
				<?php if (isset($error)) : ?>
					<p style="color: red; font-style: italic;">username / password salah</p>
				<?php endif; ?>
				<form method="post" action="">
					<div class=" col-sm-10 form-group" style="margin: 0">
						<br>
						<label style="color: white; font-size: 30px">Username</label> 
						<input class="col-sm-12 form-control" type="text" name="Username" style="background-color: grey; color: white" required> 
						<br>
						<label style="color: white; font-size: 30px">Password</label>
						<input class="col-sm-12 form-control" type="password" name="password" style="background-color: grey; color: white" >
						<br>
						<button type="submit" name="login" class="btn btn-danger" style="float: right;">login</button>
						<br>
					</div>
				</form>
			</div>
		</div>		
	</div>
</div>
</body>
</html>