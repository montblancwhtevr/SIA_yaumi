




<?php
include "koneksi.php";

if(isset($_POST['save'])){
    $nis = $_POST['nis'];
    $waktu_catatan = $_POST['waktu_catatan'];   
    $catatan = $_POST['catatan'];
    echo $nis,$waktu_catatan,$catatan;

    $sql=mysql_query("INSERT INTO catatan VALUES (NULL,'$nis','$waktu_catatan','$catatan')");

    if ($sql) {
        header('location:catatan.php');

    }else {
        echo "salah";
    }
}


?>