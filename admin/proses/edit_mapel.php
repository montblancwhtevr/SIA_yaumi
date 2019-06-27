




<?php
	include "koneksi.php";
if(isset($_POST['save'])){
	$id_mapel = $_POST['id_mapel'];
    $nama_mapel = $_POST['nama_mapel'];
    $kode_mapel = $_POST['kode_mapel'];
    $jenis = $_POST['jenis'];
    $kkm = $_POST['kkm'];
    $kelas = $_POST['kelas'];
    $guru = $_POST['guru'];
    
    echo $id_mapel,$nama_mapel, $kode_mapel, $jenis,$kkm, $kelas, $guru;

	$sql=mysql_query("UPDATE mapel SET kode_mapel ='$kode_mapel', jenis_mapel = '$jenis', nama_mapel = '$nama_mapel', kkm = '$kkm', kode_kelas = '$kelas', nip = '$guru'  WHERE id_mapel ='$id_mapel'");
	
	if ($sql) {
        header('location:../data_mapel.php');

    }else {
        echo "salah";
    }
}
?>