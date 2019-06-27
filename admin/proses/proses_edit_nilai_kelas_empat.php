




<?php
	include "koneksi.php";
if(isset($_POST['save'])){
    $id_nilai = $_POST['id_nilai'];
	$modal_nama = $_POST['modal_nama'];
    $modal_mapel = $_POST['modal_mapel'];
    $absen = $_POST['absen'];
    $harian = $_POST['harian'];
    $uts = $_POST['uts'];
    $uas = $_POST['uas'];
    $jumlah = $_POST['jumlah'];
    $rata = $_POST['rata'];


	$sql=mysql_query("UPDATE nilai SET  absen = '$absen', harian = '$harian', uts = '$uts', uas = '$uas' , jumlah = '$jumlah' , rata = '$rata' WHERE id_nilai = '$id_nilai'");
	
	if ($sql) {
        header('location:input_nilai_kelas_empat.php');

    }else {
        echo "salah";
    }
}
?>