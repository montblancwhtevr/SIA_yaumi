




<?php
	include "koneksi.php";
if(isset($_POST['save'])){
	$nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];   
    $tanggal = $_POST['tanggal'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];
    $status = $_POST['status'];

    echo $nis,$nama,$gender,$tanggal,$agama,$alamat,$kelas ;

	$sql=mysql_query("UPDATE siswa SET nama = '$nama', gender = '$gender', lahir = '$tanggal', agama = '$agama', alamat = '$alamat' , kode_kelas = '$kelas' , status = '$status' WHERE nis = '$nis'");
	
	if ($sql) {
        header('location:../data_siswa.php');

    }else {
        echo "salah";
    }
}
?>