
<?php include "header.php"; ?>
<?php

require 'Function.php';

if (isset($_POST["Kirim"])) {
	$gass = mysqli_query($con,"SELECT * FROM penambahan_darah");
	$gass2 = mysqli_query($con,"SELECT * FROM Permintaan");
	$row = mysqli_fetch_assoc($gass);
	$row2 = mysqli_fetch_assoc($gass2);
	$Goldar_A = $_POST['Goldar_A'];//// inisialisasi gol darah a
	$Goldar_B = $_POST['Goldar_B']; // inisialisasi gol darah b
	$Goldar_AB = $_POST['Goldar_AB'];// inisialisasi gol darah ab
	$Goldar_O = $_POST['Goldar_O'];// inisialisasi gol darah o
	$Id_RS = $row2['Id_RS'];
	
	if ($Goldar_A< 0 || $Goldar_B< 0 ||$Goldar_AB< 0 ||$Goldar_O< 0   ){
		echo "<script>
		alert('Data salah');
		</script>";
	} else {
		$Tanggal = date('Y-m-d H:i:s');
		mysqli_query($con,"INSERT INTO `penambahan_darah`( `Tanggal`, `A`, `B`, `O`, `AB`, `Id_RumahSakit`) VALUES ('$Tanggal' ,'$Goldar_A','$Goldar_B','$Goldar_O','$Goldar_AB','$Id_RS')");
		mysqli_query($con,"INSERT INTO `riwayat_darah`( `Tangal`, `A`, `B`, `O`, `AB`, `Id_RumahSakit`) VALUES ('$Tanggal' ,'$Goldar_A','$Goldar_B','$Goldar_O','$Goldar_AB','$Id_RS')");
	}
	
}
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
			$sql = "SELECT * FROM  permintaan p, user r WHERE p.Id_RS = r.id_RS order by `Bulan_Permintaan` asc";
			$result = mysqli_query($con, $sql);
			?>
			<table class="table table-bordered" style="background-color: white;">
				<thead>
					<tr>
						<th style="text-align: center;">Tanggal</th>
						<th style="text-align: center;">Nama Rumah Sakit</th>
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
						<th style="background-color: transparent;">
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Goldar_A" name="Pesan_GoldarA">
								Kirim
							</button>
						</th>

					</tr> 
				<?php } ?>
				<?php ?>
			</table>
		</div>

	</div>
	<button type="submit" class="btn btn-danger btn-lg float-right" >
		<a href="BerandaAdmin.php" style="color: white; text-decoration: none;">Kembali</a>
	</button>
	<br>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Button trigger modal -->	
<!-- Modal -->
<div class="modal fade" id="Goldar_A" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<br>
				<form method="post" action="" style="text-align: center">
					<label>Masukkan Jumlah Darah</label>
					<div class="form-group">
						<br>
						<label>Golongan A</label>
						<input type="number" id="n" name="Goldar_A" placeholder="Jumlah" required>
						<br>
						<label>Golongan B</label>
						<input type="number" id="n" name="Goldar_B" placeholder="Jumlah" required>
						<br>
						<label>Golongan AB</label>
						<input type="number" id="n" name="Goldar_AB" placeholder="Jumlah" required>
						<br>
						<label>Golongan O</label>
						<input type="number" id="n" name="Goldar_O" placeholder="Jumlah" required>
					</div> 
					<button type='submit' name="Kirim" class="btn btn-danger">Kirim</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include "footer.php"; ?>