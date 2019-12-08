
<?php 

include "header.php";

?>

<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<h1 style="color: white">Data Rumah Sakit</h1>
		</div>
	</div>
	<div class="row" style="background-color: rgba(0,0,0, 0.5); border-radius: 25px;">
		<div class="col-sm-8 table-responsive text-center">
			<?php 
			$sql = "SELECT * FROM  user";
			$result = mysqli_query($con, $sql);
			?>
			<table class="table table-bordered" style="background-color: white;">
				<thead>
					<tr>
						<th style="text-align: center;">ID Rumah Sakit</th>
						<th style="text-align: center;">Nama Rumah Sakit</th>
						<th style="text-align: center;">Alamat</th>
						<th style="text-align: center;">Email</th>
					</tr>
				</thead>
				<?php
				while ($row = mysqli_fetch_assoc($result)){ ?>
					<tr>
						<td><?php echo $row['Id_RS'] ?></td>
						<td><?php echo $row['Nama_Rumah_Sakit'] ?></td>
						<td><?php echo $row['Alamat_Rumah_Sakit'] ?></td>
						<td><?php echo $row['email'] ?></td>
					</tr> 
				<?php } ?>
				<?php ?>
			</table>
		</div>

	</div>
	<button type="submit" class="btn btn-danger btn-lg float-right" style="margin-left: 10px">
		<a href="BerandaAdmin.php" style="color: white; text-decoration: none;">Kembali</a>
	</button>
	<button type="submit" class="btn btn-danger btn-lg float-right" >
		<a href="input_ProfilRS_Admin.php" style="color: white; text-decoration: none;">Tambah</a>
	</button>
	<br>
</div>

<?php include "footer.php"; ?>