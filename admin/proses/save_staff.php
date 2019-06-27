




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
    echo $nip,$nama,$gender,$lahir,$agama,$alamat,$telepon,$jabatan,$status;

    $sql=mysql_query("INSERT INTO staff VALUES (NULL,'$nip','$nama','$gender','$lahir','$agama','$alamat','$telepon','$jabatan','$status')");


    if ($sql) {
        header('location:../data_staff.php');

    }else {
        echo "salah";
    }
}


?>