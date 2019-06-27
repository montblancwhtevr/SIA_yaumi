




<?php
include "koneksi.php";

if(isset($_POST['save'])){
    $kode_mapel = $_POST['kode_mapel'];
    $nama_mapel = $_POST['nama_mapel'];
    $jenis = $_POST['jenis'];
    $kkm = $_POST['kkm'];
    $kelas = $_POST['kelas'];
    $guru = $_POST['guru'];
    echo $kode_mapel,$nama_mapel,$jenis,$kkm,$kelas,$guru;

    $sql=mysql_query("INSERT INTO mapel  VALUES (NULL,'$kode_mapel','$jenis','$nama_mapel','$kkm','$kelas','$guru')");


    if ($sql) {
        header('location:../data_mapel.php');

    }else {
        echo "salah";
    }
}


?>