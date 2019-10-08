<?php  include "header.php"; ?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center">
			<h1 style="color: white">Data Permintaan Darah</h1>
		</div>
	</div>
	<div class="row" style="background-color: rgba(0,0,0, 0.5); border-radius: 25px;">
		<div class="col-sm-8 col-sm-offset-2 text-center">
			<div class="">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th style="text-align: left;">Tanggal</th>
							<th style="text-align: center;">A</th>
							<th style="text-align: center;">B</th>
							<th style="text-align: center;">AB</th>
							<th style="text-align: center;">O</th>
						</tr>
					</thead>
					<?php 
					$sql = mysqli_query ($con, "SELECT * FROM permintaan") or die (mysqli_error($co));
					if (mysqli_num_rows($sql) > 0) {
						$xa = 0;
						$jumlah_xa = 0;
						$jumlah_ya = 0;
						$jumlah_xxa = 0;
						$jumlah_xya = 0;

						$xb = 0;
						$jumlah_xb = 0;
						$jumlah_yb = 0;
						$jumlah_xxb = 0;
						$jumlah_xyb = 0;

						$xab = 0;
						$jumlah_xab = 0;
						$jumlah_yab = 0;
						$jumlah_xxab = 0;
						$jumlah_xyab = 0;

						$xo = 0;
						$jumlah_xo = 0;
						$jumlah_yo = 0;
						$jumlah_xxo = 0;
						$jumlah_xyo = 0;

						while ($data = mysqli_fetch_array($sql)){
							$jumlah_xa += $xa;
							$jumlah_ya += $data['A'];
							$jumlah_xxa += ($xa * $xa);
							$jumlah_xya += ($xa * $data['A']);

							$jumlah_xb += $xb;
							$jumlah_yb += $data['B'];
							$jumlah_xxb += ($xb * $xb);
							$jumlah_xyb += ($xb * $data['B']);

							$jumlah_xab += $xab;
							$jumlah_yab += $data['AB'];
							$jumlah_xxab += ($xab * $xab);
							$jumlah_xyab += ($xab * $data['AB']);

							$jumlah_xo += $xo;
							$jumlah_yo += $data['O'];
							$jumlah_xxo += ($xo * $xo);
							$jumlah_xyo += ($xo * $data['O']);


							?>
							<tr>
								<td style="text-align: left;"><?=$data['bulan'];?></td>
								<td style="text-align: center;"><?=$data['A'];?></td>
								<td align="center"><?=$data['B'];?></td>
								<td align="center"><?=$data['AB'];?></td>
								<td align="center"><?=$data['O'];?></td>
							</tr>
							<?php 
							$xa++;
							$xb++;
							$xab++;
							$xo++;
						}
						?>
						<!-- <tr>
							<td colspan="2">Jumlah</td>
							<td></td>
							<td><?=$jumlah_xa;?></td>
							<td><?=$jumlah_ya;?></td>
							<td><?=$jumlah_xxa;?></td>
							<td><?=$jumlah_xya;?></td>
							<td></td>
							<td><?=$jumlah_xb;?></td>
							<td><?=$jumlah_yb;?></td>
							<td><?=$jumlah_xxb;?></td>
							<td><?=$jumlah_xyb;?></td>
							<td></td>
							<td><?=$jumlah_xab;?></td>
							<td><?=$jumlah_yab;?></td>
							<td><?=$jumlah_xxab;?></td>
							<td><?=$jumlah_xyab;?></td>
							<td></td>
							<td><?=$jumlah_xo;?></td>
							<td><?=$jumlah_yo;?></td>
							<td><?=$jumlah_xxo;?></td>
							<td><?=$jumlah_xyo;?></td>
						</tr> -->
						<!-- <tr>
							<td colspan="2">Rata - Rata</td>
							<td></td>
							<td>
								<?php 
								$rata2_xa = $jumlah_xa / $xa;
								echo ceil($rata2_xa);
								?>
							</td>
							<td>
								<?php 
								$rata2_ya = $jumlah_ya / $xa;
								echo ceil($rata2_ya);
								?>
							</td>
							<td colspan="3"></td>

							<td>
								<?php 
								$rata2_xb = $jumlah_xb / $xb;
								echo ceil($rata2_xb);
								?>
							</td>
							<td>
								<?php 
								$rata2_yb = $jumlah_yb / $xb;
								echo ceil($rata2_yb);
								?>
							</td>
							<td colspan="3"></td>

							<td>
								<?php 
								$rata2_xab = $jumlah_xab / $xab;
								echo ceil($rata2_xab);
								?>
							</td>
							<td>
								<?php 
								$rata2_yab = $jumlah_yab / $xab;
								echo ceil($rata2_yab);
								?>
							</td>
							<td colspan="3"></td>

							<td>
								<?php 
								$rata2_xo = $jumlah_xo / $xo;
								echo ceil($rata2_xo);
								?>
							</td>
							<td>
								<?php 
								$rata2_yo = $jumlah_yo / $xo;
								echo ceil($rata2_yo);
								?>
							</td>
							<td colspan="2"></td>
						</tr> -->
						<!-- <tr>
							<td colspan="2">B1</td>
							<td colspan="5">
								<?php 
								$b1a = ($jumlah_xya - (($jumlah_xa * $jumlah_ya) /  $xa)) / ($jumlah_xxa - ($jumlah_xa * $jumlah_xa) / $xa);
								echo ceil($b1a);
								?>
							</td>
							<td colspan="5">
								<?php 
								$b1b = ($jumlah_xyb - (($jumlah_xb * $jumlah_yb) /  $xb)) / ($jumlah_xxb - ($jumlah_xb * $jumlah_xb) / $xb);
								echo ceil($b1b);
								?>
							</td>
							<td colspan="5">
								<?php 
								$b1ab = ($jumlah_xyab - (($jumlah_xab * $jumlah_yab) /  $xab)) / ($jumlah_xxab - ($jumlah_xab * $jumlah_xab) / $xab);
								echo ceil($b1ab);
								?>
							</td>
							<td colspan="5">
								<?php 
								$b1o = ($jumlah_xyo - (($jumlah_xo * $jumlah_yo) /  $xo)) / ($jumlah_xxo - ($jumlah_xo * $jumlah_xo) / $xo);
								echo ceil($b1o);
								?>
							</td>
						</tr>
						<tr>
							<td colspan="2">B0</td>
							<td colspan="5">
								<?php 
								$b0a = $rata2_ya - $b1a * $rata2_xa;
								echo ceil($b0a);
								?>
							</td>
							<td colspan="5">
								<?php 
								$b0b = $rata2_yb - $b1b * $rata2_xb;
								echo ceil($b0b);
								?>
							</td>
							<td colspan="5">
								<?php 
								$b0ab = $rata2_yab - $b1ab * $rata2_xab;
								echo ceil($b0ab);
								?>
							</td>
							<td colspan="5">
								<?php 
								$b0o = $rata2_yo - $b1o * $rata2_xo;
								echo ceil($b0o);
								?>
							</td>
						</tr> -->
						<?php 
					}
					?>

				</table>
				<div>
					<?php 
					if (isset($_POST['prediksi'])) {
						$bulan = $_POST['n'];
						$blna = ($xa - 1) +  $bulan;
						$blnb = ($xb - 1) +  $bulan;
						$blnab = ($xab - 1) +  $bulan;
						$blno = ($xo - 1) +  $bulan;
						$prediksia = $b0a + ($b1a * $blna);
						$prediksib = $b0b + ($b1b * $blnb);
						$prediksiab = $b0ab + ($b1ab * $blnab);
						$prediksio = $b0o + ($b1o * $blno);
						?>
						<div class="table">
							<form action="tampilkandata.php" method="post" style="text-align: center">
								<br>
								Prediksi golongan darah A untuk <?=$bulan;?> bulan berikutnya adalah <?=ceil($prediksia);?> <br>
								Prediksi golongan darah B untuk <?=$bulan;?> bulan berikutnya adalah <?=ceil($prediksib);?> <br>
								Prediksi golongan darah AB untuk <?=$bulan;?> bulan berikutnya adalah <?=ceil($prediksiab);?> <br>
								Prediksi golongan darah O untuk <?=$bulan;?> bulan berikutnya adalah <?=ceil($prediksio);?> <br>
								<button class="btn btn-danger" href="tampilkandata.php">Oke</button>
							</form>
						</div>

						<?php 
					}
					?>

				</div>
			</div>
		</div>
	</div>
	<!-- <div class="button-float-left">
		<button class="btn btn-danger" href="tampilkandata.php" >
			<a href="Prediksi.php" style="color: white">prediksi</a>
		</button>
		<button type="submit" class="btn btn-danger" >
			<a href="index.php" style="color: white">Kembali</a>
		</button>
	</div> -->
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#myModal">
		Prediksi
	</button>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form action="tampilkandata.php" method="post" style="text-align: center">
						<label>Prediksi permintaan darah </label> <input type="number" name="n"> <label>bulan selanjutnya </label>
						<br>
						<input class="btn btn-danger" type="submit" name="prediksi" value="Prediksi">
					</form>
				</div>
			</div>
		</div>
	</div>



	<?php include "footer.php"; ?>