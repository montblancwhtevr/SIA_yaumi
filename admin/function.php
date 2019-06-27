<?php  
include 'koneksi.php';
session_start();

 function checkUser(){
	if($_SESSION['username'] == null){
		header('Location: ../index.php');
	}
}
$waktu=time()+25200;
	$expired=900; //waktu timeout (detik)
	if(isset($_SESSION['username'])){ //jika dalam keadaan login
	if($waktu < $_SESSION['timeout']){ //jika waktu sekarang kurang dari sesi timeout
	unset($_SESSION['timeout']); //hapus sesi timeout yang lama ,buat sesi timeout yang baru
	$_SESSION['timeout']=$waktu+900;}
	else{
		session_destroy();
		echo "<script>alert('session kamu sudah habis,silahkan login kembali!');history.go(-1);</script>";}}
		else{
			echo "<script>alert('kamu harus login dulu untuk mengakses halaman ini!'');history.go(-1);</script>";} 

?>