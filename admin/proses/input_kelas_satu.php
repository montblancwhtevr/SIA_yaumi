




<?php
include "koneksi.php";

if(isset($_POST['save'])){
	$modal_nama = $_POST['modal_nama'];
	$modal_mapel = $_POST['modal_mapel'];
    $semester = $_POST['semester'];
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $nilai_absen = $_POST['nilai_absen'];
    $nilai_harian = $_POST['nilai_harian'];
    $nilai_uts = $_POST['nilai_uts'];
    $nilai_uas = $_POST['nilai_uas'];
    $nilai_jumlah = $_POST['nilai_jumlah'];
    $nilai_rata = $_POST['nilai_rata'];

    echo $modal_nama,$modal_mapel,$semester,$tahun_ajaran,$nilai_absen,$nilai_harian,$nilai_uts,$nilai_uas,$nilai_jumlah,$nilai_rata;

    $sql=mysql_query("INSERT INTO nilai  VALUES (NULL,'$modal_nama','$modal_mapel','$nilai_harian','$nilai_absen','$nilai_uts','$nilai_uas','$nilai_jumlah','$nilai_rata','$semester','$tahun_ajaran')");


    if ($sql) {
        header('location:input_nilai_kelas_satu.php');

    }else {
        echo "salah";
    }
}


?>