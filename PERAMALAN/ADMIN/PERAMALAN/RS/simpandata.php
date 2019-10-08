<?php 
include "koneksi.php";
if (isset($_POST['simpan'])) {
	$bulan = $_POST['bulan'];
	$A = $_POST['A'];
	$B = $_POST['B'];
	$AB = $_POST['AB'];
	$O = $_POST['O'];
	$sql = mysqli_query($con, "INSERT INTO permintaan VALUES (null, '$bulan', '$A', '$B', '$AB', '$O')") or 
	die(mysqli_error($con));
	if($sql){
		echo "<script>alert('Berhasil menambahkan data'); window.location='./';</script>";
	}
}
 ?>
