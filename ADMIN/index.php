<?php include "Function.php";
require 'Function.php';

if (isset($_POST["login"])) {
	$Username = $_POST["Username"]; // inisialisasi username
	$password = $_POST["password"]; // inisialisasi password
	
	$result =  mysqli_query($con,"SELECT * FROM admin where Username = '$Username' and password = '$password'");
	$cek = mysqli_num_rows($result);
	$result2 =  mysqli_query($con,"SELECT * FROM user where Username = '$Username' and password = '$password'");
	$cek2 = mysqli_num_rows($result2);
	if ( $cek > 0 ) {
		// $_SESSION["user_id"] = $row_user["id_RS"];
		header("Location: BerandaAdmin.php");
		exit;
	} elseif ($cek2 > 0) {
		$data = mysqli_fetch_array($result2);
		session_start(); 
		$_SESSION['login'] =true;
		$_SESSION["user_id"] = $data['Id_RS'];
		header("Location: BerandaRS.php");
		exit;
	} else {
		echo "<script>
		alert('Username atau password yang ada masukkan salah');
		</script>";
	}
	$error = true;

}


?>
<!DOCTYPE html>
<html>
<head>
	
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/Style2.css" >
	<link rel="shortcut icon" href="../Image/logo.png">
	<title>Manajemen Permintaan Stok Darah</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<!--===============================================================================================-->
</head>
<body>
	<div class="limiter">
		<div class="container-login100" style="background: transparent;min-height: 0px; ">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="Post">
					<span class="login100-form-title p-b-26">
						Welcome To 
					</span>
					<span class="login100-form-title p-b-48">
						Manajemen Permintaan Stok Darah
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="Username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="login">
								Login
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../endor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>
