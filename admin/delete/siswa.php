




<?php
	include "koneksi.php";
	$nis=$_GET['id_siswa'];
	$sql=mysql_query("Delete FROM siswa WHERE id_siswa='$nis'");
	header('location:../data_siswa.php');
?>