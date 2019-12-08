<?php include 'header.php'  ?>
<?php
require 'Function.php';
$nameErr = $EmailErr = $AlamatErr = $PasswordErr = $RSErr= "";
$username = $email = $RSname = $alamat = "";
if (isset($_POST["Tambah"])) {
	$Username = $_POST['Username'];//inisialisasi nama
	$Email = $_POST['email'];//inisialisasi email
	$Alamat_Rumah_Sakit = $_POST['Alamat'];
	$Password = $_POST['Password'];
	$Nama_Rumah_Sakit = $_POST['Nama_Rumah_Sakit'];
	// $Limit_Stok = $_POST['Limit_Stok'];
	$gass = mysqli_query($con,"SELECT * FROM user");
	$row = mysqli_fetch_assoc($gass);
	
	if (empty($Username) && empty($Email) && empty($Alamat_Rumah_Sakit) && empty($Password) && empty($Nama_Rumah_Sakit)) {
		echo "<script>
		alert('Data tidak boleh Kosong');
		</script>";
	} else {
		if (empty($Username)) {
			$nameErr = "Kolom harus di isi";
		} else {
    // check if name only contains letters and whitespace
			if (!preg_match("/^[a-zA-Z ]*$/",$Username)) {
				$nameErr = "Only letters and white space allowed"; 
			} else {
				$username = $Username;
			}
		}

		if (empty($Email)) {
			$EmailErr = "Kolom harus di isi";
		} else {
    // check if e-mail address is well-formed
			if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
				$EmailErr = "Invalid email format";
			} else {
				$email = $Email;
			}
		}

		if (empty($Alamat_Rumah_Sakit)) {
			$AlamatErr = "Kolom harus di isi";
		}else {
			$alamat = $Alamat_Rumah_Sakit;
		}

		if (empty($Password)) {
			$PasswordErr = "Kolom harus di isi";
		}
		if (empty($Nama_Rumah_Sakit)) {
			$RSErr = "Kolom harus di isi";
		} else {
			if (!preg_match("/^[a-zA-Z ]*$/",$Nama_Rumah_Sakit)) {
				$RSErr = "Only letters and white space allowed"; 
			} else {
				$RSname = $Nama_Rumah_Sakit;
			}
		}
		mysqli_query($con,"INSERT INTO `user`( `Nama_Rumah_Sakit`, `Alamat_Rumah_Sakit`, `email`, `Username`, `Password`) VALUES ('$Nama_Rumah_Sakit','$Alamat_Rumah_Sakit','$Email','$Username','$Password')");
		header("Location: ProfilRS_Admin.php");	
	}


	
}

?>

<body>
	<div class="container">

		<form class="well form-horizontal" action=" " method="post"  id="contact_form">
			<fieldset>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" style="color: white">Nama RS</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input  name="Nama_Rumah_Sakit" placeholder="Nama RS" class="form-control"  type="text">
							<label style="color: #ff5a00"><?php echo $RSErr;?></span></label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" style="color: white">Username</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input  name="Username" placeholder="Username" class="form-control"  type="text"value="<?php echo $username;?>">
							<label style="color: #ff5a00"><?php echo $nameErr;?></span></label>
						</div>
					</div>
				</div>

				<!-- Text input-->

				<div class="form-group">
					<label class="col-md-4 control-label" style="color: white">Password</label> 
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input name="Password" placeholder="Password" class="form-control"  type="password">
							<label style="color: #ff5a00"><?php echo $PasswordErr;?></span></label>
						</div>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" style="color: white">E-Mail</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input name="email" placeholder="E-Mail" class="form-control"  type="text" value="<?php echo $email;?>">
							<label style="color: #ff5a00"><?php echo $EmailErr;?></span></label>
						</div>
					</div>
				</div>

				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" style="color: white">Alamat</label>  
					<div class="col-md-4 inputGroupContainer">
						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
							<input name="Alamat" placeholder="Alamat" class="form-control"  type="text" value="<?php echo $alamat;?>">
							<label style="color: #ff5a00"><?php echo $AlamatErr;?></span></label>
						</div>
					</div>
				</div>
			</fieldset>
			<button type="submit" class="btn btn-danger btn-lg float-right" style="margin-left: 10px" >
				<a href="ProfilRS_Admin.php" style="color: white; text-decoration: none;">Kembali</a>
			</button>
			<button type="submit" class="btn btn-danger btn-lg float-right" name="Tambah">
				<a style="color: white; text-decoration: none;">Tambah</a>
			</button>
		</form>

	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<br>

</div>

