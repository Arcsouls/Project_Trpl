<?php include 'header.php'  ?>
<?php
require 'Function.php';
session_start();
$id_author = $_SESSION['user_id'];

if (isset($_POST["Simpan"])) {
	$Username = $_POST['Username'];//inisialisasi nama
	$Email = $_POST['email'];//inisialisasi email
	$Alamat_Rumah_Sakit = $_POST['Alamat'];
	$Password = $_POST['Password'];
	
	$gass = mysqli_query($con,"SELECT * FROM user where Id_RS = '$id_author' ");
	$row = mysqli_fetch_assoc($gass);

	mysqli_query($con,"UPDATE `user` SET  `email`='$Email',`Alamat_Rumah_Sakit` = '$Alamat_Rumah_Sakit',`Username`= '$Username',`Password`='$Password'WHERE Id_RS ='$id_author'");
	header("Location: ProfilRS.php");	
}
?>

<body>
	<div class="container">
		<?php 
		$sql = "SELECT * FROM  user where Id_RS = $id_author";
		$result = mysqli_query($con, $sql);
		?>
		<form class="well form-horizontal" action="" method="post"  >
			<fieldset>
				<?php
				while ($row = mysqli_fetch_assoc($result)){ ?> 		

					<div class="form-group">
						<label class="col-md-4 control-label" style="color: white">Nama Rumah Sakit</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"><?php echo $row['Nama_Rumah_Sakit'] ?></i></span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label" style="color: white">ID Rumah Sakit</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"><?php echo $row['Id_RS'] ?></i></span>
							</div>
						</div>
					</div>				
					<!-- Text input-->

					<div class="form-group">
						<label class="col-md-4 control-label" style="color: white">Username</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input  name="Username" placeholder="Username" class="form-control"  type="text" value="<?php echo $row['Username'] ?>">
							</div>
						</div>
					</div>

					<!-- Text input-->

					<div class="form-group" >
						<label class="col-md-4 control-label" style="color: white">Password</label> 
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input name="Password" placeholder="Password" class="form-control"  type="password" value="<?php echo $row['Password'] ?>">
							</div>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" style="color: white">E-Mail</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
								<input name="email" placeholder="E-Mail" class="form-control"  type="text" value="<?php echo $row['email'] ?>">
							</div>
						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" style="color: white">Alamat</label>  
						<div class="col-md-4 inputGroupContainer">
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
								<input name="Alamat" placeholder="Alamat" class="form-control"  type="text" value="<?php echo $row['Alamat_Rumah_Sakit'] ?>">
							</div>
						</div>
					</div>
				</fieldset>
				<button class="btn btn-danger btn-lg float-right" style="margin-left: 10px" >
					<a href="BerandaRS.php" style="color: white; text-decoration: none;">Kembali</a>
				</button>
				<button type="submit" name="Simpan" class="btn btn-danger btn-lg float-right" >
					<a style="color: white; text-decoration: none;">Simpan</a>
				</form>
			<?php } ?>
			<?php ?>

		</button>

	</div>
    </div><!-- /.container -->