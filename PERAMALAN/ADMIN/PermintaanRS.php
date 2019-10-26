
<?php 

include "header.php";

?>

<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<h1 style="color: white">Data Permintaan Darah</h1>
		</div>
	</div>
	<div class="row" style="background-color: rgba(0,0,0, 0.5); border-radius: 25px;">
		<div class="col-sm-8 table-responsive text-center">
			<?php 
			$sql = "SELECT * FROM  permintaan p, user r WHERE p.idRS = r.id_RS ";
			$result = mysqli_query($con, $sql);
			?>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th style="text-align: center;">Tanggal</th>
						<th style="text-align: center;">namaRumahSakit</th>
						<th style="text-align: center;">A</th>
						<th style="text-align: center;">B</th>
						<th style="text-align: center;">AB</th>
						<th style="text-align: center;">O</th>
					</tr>
				</thead>
				<?php
				while ($row = mysqli_fetch_assoc($result)){ ?>
					<tr>
						<td><?php echo $row['Bulan_Permintaan'] ?></td>
						<td><?php echo $row['Nama_Rumah_Sakit'] ?></td>
						<td><?php echo $row['Goldar_A'] ?></td>
						<td><?php echo $row['Goldar_B'] ?></td>
						<td><?php echo $row['Goldar_AB'] ?></td>
						<td><?php echo $row['Goldar_O'] ?></td>

					</tr> 
				<?php } ?>
				<?php ?>
			</table>
		</div>

	</div>
	<button type="submit" class="btn btn-danger btn-lg float-right" >
		<a href="BerandaRS.php" style="color: white; text-decoration: none;">Kembali</a>
	</button>
	<br>
</div>

<?php include "footer.php"; ?>