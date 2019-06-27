




<?php
	include "koneksi.php";
	$id_mapel=$_GET['id_mapel'];
	$sql=mysql_query("Delete FROM mapel WHERE id_mapel='$id_mapel'");
	header('location:../data_mapel.php');
?>