<?php
include "koneksi.php";

if(isset($_POST['save'])){
    $kode_ta = $_POST['kode_ta'];
    $nama_ta = $_POST['nama_ta'];
    $status = $_POST['status'];

    echo $status;

    $sql=mysql_query("INSERT INTO tahun  VALUES (NULL,'$kode_ta','$nama_ta','$status')");


    if ($sql) {
        header('location:../data_tahun.php');

    }else {
        echo "salah";
    }
}

if(isset($_POST['update'])){
    // UPDATE `table_name` SET `column_name` = `new_value' [WHERE condition];
    $id_ta      = $_POST['id_ta'];
    $kode_ta    = $_POST['kode_ta'];
    $nama_ta    = $_POST['nama_ta'];
    $status     = $_POST['status'];

    $query = mysql_query("UPDATE tahun SET 
        kode_ta = '$kode_ta', 
        nama_ta = '$nama_ta',
        status = '$status'
        WHERE id_ta = '$id_ta'");

    if($query){
        header('location:../data_tahun.php');
    }else{
        echo "bah";
    }
}


?>