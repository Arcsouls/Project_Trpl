<?php 

include "header.php";

?>
<?php

require 'Function.php';
session_start();
$id_author = $_SESSION['user_id']; ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<h1 style="color: white">Data Pemasukkan Darah</h1>
		</div>
	</div>
	<div class="row" style="background-color: rgba(0,0,0, 0.5); border-radius: 25px;">
		<div class="col-sm-8 table-responsive text-center">
			<?php 
			$sql = "SELECT * FROM  penambahan_darah WHERE Id_RumahSakit ='$id_author'";
			$result = mysqli_query($con, $sql);
			?>
			<table class="table table-bordered" style="background-color: white;">
				<thead>
					<tr>
						<th style="text-align: center;">Tanggal</th>
						<th style="text-align: center;">A</th>
						<th style="text-align: center;">B</th>
						<th style="text-align: center;">AB</th>
						<th style="text-align: center;">O</th>
					</tr>
				</thead>
				<?php
				while ($row = mysqli_fetch_assoc($result)){ ?>
					<tr>
						<td><?php echo $row['Tanggal'] ?></td>
						<td><?php echo $row['A'] ?></td>
						<td><?php echo $row['B'] ?></td>
						<td><?php echo $row['AB'] ?></td>
						<td><?php echo $row['O'] ?></td>

					</tr> 
				<?php } ?>
				<?php ?>
			</table>
		</div>

	</div>
	<button type="submit" class="btn btn-danger btn-lg float-right" >
		<a href="Riwayat.php" style="color: white; text-decoration: none;">Kembali</a>
	</button>
	<br>
</div>

<?php include "footer.php"; ?>