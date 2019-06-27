<!-- 




<?php
include "koneksi.php";

if(isset($_POST['save'])){
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $gender = $_POST['gender'];   
    $tanggal = $_POST['tanggal'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];
    $status = $_POST['status'];
    // $password = $_POST['password'];
    echo $nis,$nama,$gender,$tanggal,$agama,$alamat,$kelas;

    $sql=mysql_query("INSERT INTO siswa  VALUES (NULL,'$nis','$nama','$gender','$tanggal','$agama','$alamat','$kelas','$status')");
    // $sql=mysql_query("INSERT INTO login VALUES('','$nis','$nama','$password',2)");

    if ($sql) {
        header('location:../data_siswa.php');

    }else {
        echo "salah";
    }
}
?> -->

<?php
  $namafolder="C:/xampp/htdocs/SIA/siswa/foto/"; //tempat menyimpan file
  include 'koneksi.php';
  if (!empty($_FILES["foto"]["tmp_name"]))
  {
    $jenis_gambar=$_FILES['foto']['type'];
    $nama=$_POST['nama'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];   
    $tanggal = $_POST['tanggal'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];
    $status = $_POST['status'];
    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" ||$jenis_gambar=="image/x-png")
    {           
        $gambar = $namafolder . basename($_FILES['foto']['name']);       
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $gambar)) {
            header('location:../data_siswa.php');
            $sql="INSERT INTO siswa  VALUES (NULL,'$nis','$nama','$username','$password','$gender','$tanggal','$agama','$alamat','$kelas','$status','$gambar')";
            $res=mysql_query($sql) or die (mysql_error());
        } else {
           echo "Gambar gagal dikirim";
        }
   } else {
        echo "Jenis gambar yang anda kirim salah. Harus .jpg";
   }
} else {
    echo "Anda belum memilih gambar";
}
?>