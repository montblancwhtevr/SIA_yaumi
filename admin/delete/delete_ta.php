<?php
	include "koneksi.php";
	$m_id_ta=$_GET['id_ta'];
	$sql=mysql_query("Delete FROM tahun WHERE id_ta='$m_id_ta'");
	header('location:../data_tahun.php');
?>