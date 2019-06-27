<?php  

 function checkUser(){

	include 'koneksi.php';
	session_start();
	if($_SESSION['username'] == null){
		header('Location: ../index.php');
	}
}

?>