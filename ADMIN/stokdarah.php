<?php  include "header.php"; ?>

<?php

require 'Function.php';
session_start();
$id_author = $_SESSION['user_id'];

if (isset($_POST["submit"])) {

	// var_dump($_POST['Bulan_Permintaan']);
	// die;
	$Goldar_A = $_POST['Goldar_A'];//// inisialisasi gol darah a
	$Goldar_B = $_POST['Goldar_B']; // inisialisasi gol darah b
	$Goldar_AB = $_POST['Goldar_AB'];// inisialisasi gol darah ab
	$Goldar_O = $_POST['Goldar_O'];// inisialisasi gol darah o
	$Bulan_Permintaan = $_POST['Bulan_Permintaan'];//inisialisasi bulan
	$bulanerr = '';
	// $Golongan = $_POST['Golongan'];
	// $Jumlah =  $_POST['Jumlah'];
	$hasil = mysqli_query($con, "SELECT Bulan_Permintaan FROM permintaan where Bulan_Permintaan = '$Bulan_Permintaan' and Id_RS = '$id_author'");
	$hasil2 = mysqli_query($con, "SELECT Bulan_Prediksi FROM prediksi where Bulan_Prediksi = '$Bulan_Permintaan'");

	if ($Goldar_A> 100 || $Goldar_B> 100 ||$Goldar_AB> 100 ||$Goldar_O> 100) {
		echo "<script>
		alert('Data salah');
		</script>";
	} else {
	//mengecheck apakah bulan lebih kecil dari tanggal sekarang
		if ($Bulan_Permintaan < date("Y-m")) {
			echo "<script>
			alert('Data salah');
			</script>";

		}elseif ($Goldar_A< 0 || $Goldar_B< 0 ||$Goldar_AB< 0 ||$Goldar_O< 0   ){
			echo "<script>
			alert('Data salah');
			</script>";

		}else{

			if (mysqli_fetch_assoc($hasil)) { 

				if ($Goldar_A >0 || $Goldar_B  > 0  || $Goldar_AB> 0  ||  $Goldar_O  > 0  ) {
					mysqli_query($con,"UPDATE `permintaan` SET `Goldar_A`= `Goldar_A`+'$Goldar_A', `Goldar_B`= `Goldar_B`+'$Goldar_B',`Goldar_AB`= `Goldar_AB`+'$Goldar_AB', `Goldar_O`= `Goldar_O`+'$Goldar_O'  WHERE Bulan_Permintaan = '$Bulan_Permintaan' and Id_RS = $id_author "); 
				}
			}else{
			//Menambahkan data pemintaan darah baru
				mysqli_query($con, "INSERT INTO `permintaan`(`Goldar_A`,`Goldar_B`,`Goldar_AB`,`Goldar_O`,`Bulan_Permintaan`, `Id_RS`) VALUES ('$Goldar_A','$Goldar_B','$Goldar_AB','$Goldar_O','$Bulan_Permintaan','$id_author')");	

				if (mysqli_fetch_assoc($hasil2)) {
					mysqli_query($con,"UPDATE `prediksi` SET `Goldar_A`= `Goldar_A`+'$Goldar_A', `Goldar_B`= `Goldar_B`+'$Goldar_B',`Goldar_AB`= `Goldar_AB`+'$Goldar_AB', `Goldar_O`= `Goldar_O`+'$Goldar_O'  WHERE Bulan_Prediksi = '$Bulan_Permintaan'"); 
				} else {
					mysqli_query($con, "INSERT INTO `prediksi`(`Goldar_A`,`Goldar_B`,`Goldar_AB`,`Goldar_O`,`Bulan_Prediksi`) VALUES ('$Goldar_A','$Goldar_B','$Goldar_AB','$Goldar_O','$Bulan_Permintaan',)");
				}
			}
		}
	}
}
if (isset($_POST["Tambah"])) {
	$gass = mysqli_query($con,"SELECT * FROM stokdarah where Id_RS = '$id_author' ");
	$gass2 = mysqli_query($con,"SELECT * FROM penambahan_darah where Id_RumahSakit = '$id_author' ");
	$row = mysqli_fetch_assoc($gass);
	// $row2 = mysqli_fetch_assoc($gass2);
	$Golongan = $_POST['Golongan'];// inisialisasi golongan
	$Jumlah =  $_POST['Jumlah'];// inisialisasi Jumlah
	if ($Jumlah < 0){
		echo "<script>
		alert('Data salah');
		</script>";
	} else {
		$Tanggal = date('Y-m-d H:i:s');
		if ($Golongan == 'A') {
			$a = $row['Goldar_A'] + $Jumlah;
			mysqli_query($con,"UPDATE `stokdarah` SET `Goldar_A`= '$a'WHERE Id_RS ='$id_author'");
			mysqli_query($con,"INSERT INTO `penambahan_darah`( `Tanggal`, `A`, `B`, `O`, `AB`, `Id_RumahSakit`) VALUES ('$Tanggal' ,'$Jumlah','0','0','0','$id_author')");
		}else if ($Golongan == 'B') {
			$a = $row['Goldar_B'] + $Jumlah;
			mysqli_query($con,"UPDATE `stokdarah` SET `Goldar_B`= '$a'WHERE Id_RS ='$id_author'");
			mysqli_query($con,"INSERT INTO `penambahan_darah`( `Tanggal`, `A`, `B`, `O`, `AB`, `Id_RumahSakit`) VALUES ('$Tanggal' ,'0','$Jumlah','0','0','$id_author')");
		}else if ($Golongan == 'AB') {
			$a = $row['Goldar_AB'] + $Jumlah;
			mysqli_query($con,"UPDATE `stokdarah` SET `Goldar_AB`= '$a'WHERE Id_RS ='$id_author'");
			mysqli_query($con,"INSERT INTO `penambahan_darah`( `Tanggal`, `A`, `B`, `O`, `AB`, `Id_RumahSakit`) VALUES ('$Tanggal' ,'0','0','$Jumlah','0','$id_author')");
		}else if ($Golongan == 'O') {
			$a = $row['Goldar_O'] + $Jumlah;
			mysqli_query($con,"UPDATE `stokdarah` SET `Goldar_O`= '$a'WHERE Id_RS ='$id_author'");
			mysqli_query($con,"INSERT INTO `penambahan_darah`( `Tanggal`, `A`, `B`, `O`, `AB`, `Id_RumahSakit`) VALUES ('$Tanggal' ,'0','0','0','$Jumlah','$id_author')");
		}
	}	
}

if (isset($_POST["Ambil"])) {
	$gass = mysqli_query($con,"SELECT * FROM stokdarah where Id_RS = '$id_author' ");
	$row = mysqli_fetch_assoc($gass);
	$Golongan = $_POST['Golongan'];// inisialisasi golongan
	$Jumlah =  $_POST['Jumlah'];// inisialisasi Jumlah
	if ($Jumlah< 0){
		echo "<script>
		alert('Data salah');
		</script>";

	}elseif ($row['Goldar_A'] < $Jumlah ) {
		echo "<script>
		alert('Stok darah kurang dari yang diminta');
		</script>";
	}elseif ($row['Goldar_B'] < $Jumlah ) {
		echo "<script>
		alert('Stok darah kurang dari yang diminta');
		</script>";
	}elseif ($row['Goldar_AB'] < $Jumlah ) {
		echo "<script>
		alert('Stok darah kurang dari yang diminta');
		</script>";
	}elseif ($row['Goldar_O'] < $Jumlah ) {
		echo "<script>
		alert('Stok darah kurang dari yang diminta');
		</script>";
	}else {
		$Tanggal = date('Y-m-d H:i:s');
		if ($Golongan == 'A') {
			$a = $row['Goldar_A'] - $Jumlah;
			mysqli_query($con,"UPDATE `stokdarah` SET `Goldar_A`= '$a'WHERE Id_RS ='$id_author'");
			mysqli_query($con,"INSERT INTO `pengambilan_darah`( `Tanggal`, `A`, `B`, `O`, `AB`, `Id_RumahSakit`) VALUES ('$Tanggal' ,'$Jumlah','0','0','0','$id_author')");
		}else if ($Golongan == 'B') {
			$a = $row['Goldar_B'] - $Jumlah;
			mysqli_query($con,"UPDATE `stokdarah` SET `Goldar_B`= '$a'WHERE Id_RS ='$id_author'");
			mysqli_query($con,"INSERT INTO `pengambilan_darah`( `Tanggal`, `A`, `B`, `O`, `AB`, `Id_RumahSakit`) VALUES ('$Tanggal' ,'0','$Jumlah','0','0','$id_author')");
		}else if ($Golongan == 'AB') {
			$a = $row['Goldar_AB'] - $Jumlah;
			mysqli_query($con,"UPDATE `stokdarah` SET `Goldar_AB`= '$a'WHERE Id_RS ='$id_author'");
			mysqli_query($con,"INSERT INTO `pengambilan_darah`( `Tanggal`, `A`, `B`, `O`, `AB`, `Id_RumahSakit`) VALUES ('$Tanggal' ,'0','0','$Jumlah','0','$id_author')");
		}else if ($Golongan == 'O') {
			$a = $row['Goldar_O'] - $Jumlah;
			mysqli_query($con,"UPDATE `stokdarah` SET `Goldar_O`= '$a'WHERE Id_RS ='$id_author'");
			mysqli_query($con,"INSERT INTO `pengambilan_darah`( `Tanggal`, `A`, `B`, `O`, `AB`, `Id_RumahSakit`) VALUES ('$Tanggal' ,'0','0','0','$Jumlah','$id_author')");
		}
	}	
}
?>

<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<h1 style="color: white">Stok Darah</h1>
		</div>
	</div>
	<div class="row" style="background-color: rgba(0,0,0, 0.5); border-radius: 25px;">
		<div class="col-sm-8 table-responsive text-center">
			<?php 
			
			$sql = ("SELECT * FROM stokdarah WHERE Id_RS ='$id_author'") or die (mysqli_error($co));
			$result = mysqli_query ($con,$sql); 
			?>
			<table class="table table-bordered" style="background-color: white;">
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
							<form method="post">
								
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Pesan" name="Pesan_GoldarA">
									Pesan
								</button>
							</form>
						</th>
						<th>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Tambah" name="Pesan_GoldarB">
								Tambah
							</button>		
						</th>
						<th>
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Ambil" name="Pesan_GoldarAB">
								Ambil
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

	<div class="modal fade" id="Pesan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<br>
					<form method="post" action="" style="text-align: center">
						<label>Masukkan Jumlah Darah</label>
						<div class="form-group">
							<br>
							<label>Tanggal</label><input type="month" id="n " name="Bulan_Permintaan" required> 
							<br>
							<?php  
							$gass = mysqli_query($con,"SELECT * FROM stokdarah where Id_RS = '$id_author' ");
							$row = mysqli_fetch_assoc($gass);

							if ($row["Goldar_A"] > 20 ) {
								?>
								<label>Golongan A</label>
								<input type="number" id="n" name="Goldar_A" placeholder="Tidak dapat memesan" disabled>
								<br>
								<?php
							} else { ?>
								<label>Golongan A</label>
								<input type="number" id="n" name="Goldar_A" placeholder="Jumlah" disabled>
								<br>
								<?php
							}
							?>

							<?php  
							$gass = mysqli_query($con,"SELECT * FROM stokdarah where Id_RS = '$id_author' ");
							$row = mysqli_fetch_assoc($gass);

							if ($row["Goldar_B"] > 20 ) {
								?>
								<label>Golongan B</label>
								<input type="number" id="n" name="Goldar_B" placeholder="Tidak Dapat Memesan" readonly>
								<br>
								<?php
							} else { ?>
								<label>Golongan B</label>
								<input type="number" id="n" name="Goldar_B" placeholder="Jumlah" required>
								<br>
								<?php
							}
							?>

							<?php  
							$gass = mysqli_query($con,"SELECT * FROM stokdarah where Id_RS = '$id_author' ");
							$row = mysqli_fetch_assoc($gass);

							if ($row["Goldar_AB"] > 20 ) {
								?>
								<label>Golongan AB</label>
								<input type="number" id="n" name="Goldar_AB" placeholder="Tidak Dapat Memesan" disabled>
								<br>
								<?php
							} else { ?>
								<label>Golongan B</label>
								<label>Golongan AB</label>
								<input type="number" id="n" name="Goldar_AB" placeholder="Jumlah" required>
								<br>
								<?php
							}
							?>

							<?php  
							$gass = mysqli_query($con,"SELECT * FROM stokdarah where Id_RS = '$id_author' ");
							$row = mysqli_fetch_assoc($gass);

							if ($row["Goldar_O"] > 20 ) {
								?>
								<label>Golongan O</label>
								<input type="number" id="n" name="Goldar_O" placeholder="TIdak Dapat Memesan" disabled>
								<?php 
							} else { ?>
								<label>Golongan O</label>
								<input type="number" id="n" name="Goldar_O" placeholder="Jumlah" required>
								<?php
							}
							?>

						</div> 
						<button type='submit' name="submit" class="btn btn-danger">Pesan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<br>
					<form method="post" action="" style="text-align: center">
						<div class="form-group">
							<label>Masukkan Jumlah Darah</label>
							<br>
							<label>Golongan Darah</label>
							<select class=" form-control" name="Golongan" >
								<option disabled selected>Golongan Darah</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="AB">AB</option>
								<option value="O">O</option>
							</select>
							<br> 
							<label>Jumlah</label>
							<input type="number" id="n" name="Jumlah" placeholder="Jumlah" required> 
						</div>
						<button type='submit' name="Tambah" class="btn btn-danger">Tambah</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="Ambil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<br>
					<form method="post" action="" style="text-align: center">
						<div class="form-group">
							<label>Masukkan Jumlah Darah</label>
							<br>
							<label>Golongan Darah</label>
							<select class=" form-control" name="Golongan" >
								<option disabled selected>Golongan Darah</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="AB">AB</option>
								<option value="O">O</option>
							</select>
							<br> 
							<label>Jumlah</label>
							<input type="number" id="n" name="Jumlah" placeholder="Jumlah" required> 
						</div>
						<button type='submit' name="Ambil" class="btn btn-danger">Ambil</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php include "footer.php"; ?>