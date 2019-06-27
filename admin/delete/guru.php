




<?php
	include "koneksi.php";
	$nip=$_GET['id_guru'];
	$sql=mysql_query("Delete FROM guru WHERE id_guru='$nip'");
	header('location:../data_guru.php');
?>