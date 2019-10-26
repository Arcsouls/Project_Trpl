<?php  include "header.php"; ?>

<?php

require 'Function.php';


if (isset($_POST["submit"])) {

	$Goldar_A = $_POST['Goldar_A'];//// inisialisasi gol darah a
	$Goldar_B = $_POST['Goldar_B']; // inisialisasi gol darah b
	$Goldar_AB = $_POST['Goldar_AB'];// inisialisasi gol darah ab
	$Goldar_O = $_POST['Goldar_O'];// inisialisasi gol darah o
	$Bulan_Permintaan = $_POST['Bulan_Permintaan'];//inisialisasi bulan

	
	//Mengechek bulan yang sama 
	$hasil = mysqli_query($con, "SELECT Bulan_Permintaan FROM permintaan where Bulan_Permintaan = '$Bulan_Permintaan' ");
	if (mysqli_fetch_assoc($hasil)) {
		if ($Goldar_A > 0) {
			mysqli_query($con,"UPDATE `permintaan` SET `Goldar_A`= `Goldar_A`+'$Goldar_A'  WHERE Bulan_Permintaan = '$Bulan_Permintaan'"); 
		}elseif ($Goldar_B > 0) {
			mysqli_query($con,"UPDATE `permintaan` SET `Goldar_B`= `Goldar_B`+'$Goldar_B'  WHERE Bulan_Permintaan = '$Bulan_Permintaan'"); 
		}elseif ($Goldar_AB > 0) {
			mysqli_query($con,"UPDATE `permintaan` SET `Goldar_AB`= `Goldar_AB`+'$Goldar_AB'  WHERE Bulan_Permintaan = '$Bulan_Permintaan'");
		}elseif ($Goldar_O > 0) {
			mysqli_query($con,"UPDATE `permintaan` SET `Goldar_O`= `Goldar_O`+ '$Goldar_O'  WHERE Bulan_Permintaan = '$Bulan_Permintaan'");
		}
	}else{
		//Menambahkan data pemintaan darah baru
		mysqli_query($con, "INSERT INTO `permintaan`(`Goldar_A`,`Goldar_B`,`Goldar_AB`,`Goldar_O`,`Bulan_Permintaan`) VALUES ('$Goldar_A','$Goldar_B','$Goldar_AB','$Goldar_O','$Bulan_Permintaan')");
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
			$sql = ("SELECT * FROM permintaan where idRS = '1'") or die (mysqli_error($co));
			$result = mysqli_query ($con,$sql); 
			?>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th style="text-align: center;">A</th>
						<th style="text-align: center;">B</th>
						<th style="text-align: center;">AB</th>
						<th style="text-align: center;">O</th>
					</tr>
				</thead>
				<?php
				while ($data = mysqli_fetch_assoc($result)){
					?>
					<tr>
						<td style="text-align: center;"><?=$data['Goldar_A'];?></td>
						<td align="center"><?=$data['Goldar_B'];?></td>
						<td align="center"><?=$data['Goldar_AB'];?></td>
						<td align="center"><?=$data['Goldar_O'];?></td>
					</tr>
					<?php 
				}
				?>
				<?php 
				?>
				<table class=" table" style="background-color: transparent; margin-top: 0; ">
					<tr style="">
						<th>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Goldar_A" name="Pesan_GoldarA">
								Pesan
							</button>	
						</th>
						<th>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Goldar_B" name="Pesan_GoldarB">
								Pesan
							</button>		
						</th>
						<th>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Goldar_AB" name="Pesan_GoldarAB">
								Pesan
							</button>		
						</th>
						<th >
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Goldar_O" name= "Pesan_GoldarO">
								Pesan
							</button>	
						</th>
					</tr>
				</table>
			</table>
		</div>
		
	</div>
	<button type="submit" class="btn btn-danger btn-lg float-right" >
		<a href="BerandaRS.php" style="color: white; text-decoration: none;">Kembali</a>
	</button>
	<br>
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
						<div class="form-group">
							<label>Masukkan Jumlah Darah Golongan A</label>
							<br>
							<label>Tanggal</label><input type="month" id="n " name="Bulan_Permintaan" required>  
							<input type="number" id="n" name="Goldar_A" placeholder="Jumlah" required> 
						</div>
						<button type='submit' name="submit" class="btn btn-danger">Pesan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="Goldar_B" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<br>
					<form method="post" action="" style="text-align: center">
						<div class="form-group">
							<label>Masukkan Jumlah Darah Golongan B</label>
							<br>
							<label>Tanggal</label><input type="month" id="n " name="Bulan_Permintaan" required>  
							<input type="number" id="n" name="Goldar_B" placeholder="Jumlah" required> 
						</div>
						<button type='submit' name="submit" class="btn btn-danger">Pesan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="Goldar_AB" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<br>
					<form method="post" action="" style="text-align: center">
						<div class="form-group">
							<label>Masukkan Jumlah Darah Golongan AB</label>
							<br>
							<label>Tanggal</label><input type="month" id="n " name="Bulan_Permintaan" required>  
							<input type="number" id="n" name="Goldar_AB" placeholder="Jumlah" required> 
						</div>
						<button type='submit' name="submit" class="btn btn-danger">Pesan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="Goldar_O" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<br>
					<form method="post" action="" style="text-align: center">
						<div class="form-group">
							<label>Masukkan Jumlah Darah Golongan O</label>
							<br>
							<label>Tanggal</label><input type="month" id="n " name="Bulan_Permintaan" required>  
							<input type="number" id="n" name="Goldar_O" placeholder="Jumlah" required> 
						</div>
						<button type='submit' name="submit" class="btn btn-danger">Pesan</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php include "footer.php"; ?>