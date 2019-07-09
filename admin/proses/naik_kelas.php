




<?php
include "koneksi.php";
$jumlah = count($_POST["naik"]);

echo $jumlah;

for ($i=0; $i < $jumlah; $i++) { 

	$id_siswa[$i] = $_POST["naik"][$i];
	echo "idne".$id_siswa[$i]."<br>";

	$sql_kelas 	= mysql_query("SELECT kelas.kode_kelas FROM kelas
		INNER JOIN siswa ON siswa.kode_kelas = kelas.kode_kelas
		WHERE siswa.id_siswa = $id_siswa[$i] ");
	$row 		= mysql_fetch_array($sql_kelas);
	$kode_kelas[] = $row['kode_kelas'];
}
	foreach ($kode_kelas as $key => $value) {
	    $sql=mysql_query("UPDATE siswa SET kode_kelas = $value+1 WHERE id_siswa = $id_siswa[$key] ");
	}

    if ($sql) {
        // header('location:../data_akademik.php');

    }else {
        echo "salah";
    }
?>