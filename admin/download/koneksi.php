<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "rapor_sd";

mysql_connect($server,$username,$password) or die ("koneksi gagal");
mysql_select_db($database) or die("database tidak bisa dibuka");
?>