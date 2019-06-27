




<?php
	include "koneksi.php";
	$nip=$_GET['id_staff'];
	$sql=mysql_query("Delete FROM staff WHERE id_staff='$nip'");
	header('location:../data_staff.php');
?>