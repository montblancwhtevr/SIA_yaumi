




<?php
	include "koneksi.php";
	$id_nilai=$_GET['id_nilai'];
	$sql=mysql_query("Delete FROM nilai WHERE id_nilai='$id_nilai'");
	header('location:Input_nilai_kelas_lima.php');
?>