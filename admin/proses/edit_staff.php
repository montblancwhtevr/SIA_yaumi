




<?php
	include "koneksi.php";
if(isset($_POST['save'])){
	$nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];   
    $lahir = $_POST['lahir'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $jabatan = $_POST['jabatan'];
    $status = $_POST['status'];


	$sql=mysql_query("UPDATE staff SET nama = '$nama', gender = '$gender', lahir = '$lahir', agama = '$agama', alamat = '$alamat' , telepon = '$telepon' , jabatan = '$jabatan' , status = '$status' WHERE nip = '$nip'");
	
	if ($sql) {
        header('location:../data_staff.php');

    }else {
        echo "salah";
    }
}
?>