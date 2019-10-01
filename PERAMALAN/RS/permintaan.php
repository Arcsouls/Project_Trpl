<?php include "header.php"; ?>

<form action="simpandata.php" method="post">
	<fieldset style="width: 25%; margin-bottom: 5px;">
		<legend>Masukkan Data Permintaan</legend>
		<table border="0">
			<tr>
				<td>Bulan </td>
				<td>:</td>
				<td>
					<select name="bulan" required="">
						<option value=""></option>
						<option value="Januari" >Januari</option>
						<option value="Februari" >Februari</option>
						<option value="Maret" >Maret</option>
						<option value="April" >April</option>
						<option value="Mei" >Mei</option>
						<option value="Juni" >Juni</option>
						<option value="Juli" >Juli</option>
						<option value="Agustus" >Agustus</option>
						<option value="September" >September</option>
						<option value="Oktober" >Oktober</option>
						<option value="November" >November</option>
						<option value="Desember" >Desember</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>A </td>
				<td>:</td>
				<td>
					<input type="number" name="A" style="width: 48.5%;" required="">
				</td>
			</tr>
			<tr>
				<td>B </td>
				<td>:</td>
				<td>
					<input type="number" name="B" style="width: 48.5%;" required="">
				</td>
			</tr>
			<tr>
				<td>AB </td>
				<td>:</td>
				<td>
					<input type="number" name="AB" style="width: 48.5%;" required="">
				</td>
			</tr>
			<tr>
				<td>O </td>
				<td>:</td>
				<td>
					<input type="number" name="O" style="width: 48.5%;" required="">
				</td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<input type="submit" name="simpan" value="Simpan">
				</td>
			</tr>
		</table>
	</fieldset>
</form>
<div>
	<a href="./">
		<button>Halaman Utama</button>
	</a>
</div>
<?php include "footer.php"; ?>