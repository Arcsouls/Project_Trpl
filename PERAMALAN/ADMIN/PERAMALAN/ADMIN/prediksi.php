
<?php include "header.php"; ?>


<div class="container" >
	<h1 class="text-muted" style="text-align: center;">DATA PERMINTAAN DARAH</h1>
	<div id ="content2">
		<div class="table">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th style="text-align: left;">Tanggal</th>
						<th>A</th>
						<th>B</th>
						<th>AB</th>
						<th>O</th>
					</tr>
				</thead>
			</div>
		</div>
	</div>


	
<div id="content3" style="position: absolute; bottom: 69px">
	<form action="tampilkandata.php" method="post" style="text-align: center">
		<label>Prediksi permintaan darah </label> <input type="number" name="n"> <label>bulan selanjutnya </label>
		<br>
		<input class="btn btn-danger" type="submit" name="prediksi" value="Prediksi">
	</form>
</div>

<?php include "footer.php"; ?>
