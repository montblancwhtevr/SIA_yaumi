<?php 
include "koneksi.php";
include "excel_reader2.php";

$target = basename($_FILES['fileexcel']['name']);
move_uploaded_file($_FILES['fileexcel']['tmp_name'], $target);

chmod($_FILES['fileexcel']['name'],0777);

$data = new Spreadsheet_Excel_Reader($_FILES['fileexcel']['name'],false);

$jumlah_baris = $data->rowcount($sheet_index=0);


$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){
 
	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	// id_siswa	nis	nama	username	password	gender	lahir	agama	alamat	kode_kelas	status	foto_siswa	tahun_ajaran
	$id_siswa     	= $data->val($i, 1);
	$nis   			= $data->val($i, 2);
	$nama  			= $data->val($i, 3);
	$username  		= $data->val($i, 4);
	$password  		= $data->val($i, 5);
	$gender  		= $data->val($i, 6);
	$lahir  		= $data->val($i, 7);
	$agama  		= $data->val($i, 8);
	$alamat  		= $data->val($i, 9);
	$kode_kelas  	= $data->val($i, 10);
	$status  		= $data->val($i, 11);
	$foto_siswa  	= $data->val($i, 12);
	$tahun_ajaran  	= $data->val($i, 13);
 
	$sql="INSERT INTO siswa  VALUES (NULL,'$nis','$nama','$username','$password','$gender','$lahir','$agama','$alamat','$kode_kelas','$status','$foto_siswa', '$tahun_ajaran')";
    $res=mysql_query($sql) or die (mysql_error());
	$berhasil++;

}

if($berhasil == ($jumlah_baris - 1) ){
	header('location:../admin/data_siswa.php');
}

echo "berhasil".$berhasil;
?>