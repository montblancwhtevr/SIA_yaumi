<?php
session_start();
include 'koneksi.php';
//waktu sekarang GMT+7
$waktu=time()+25200;
//waktu timeout (detik)
$expired=900;

$username = $_POST['username'];
$password = $_POST['password'];

	
	if ($username&&$password) //cek apakah ada form yang kosong
	{
		$get_data_admin = mysql_query("SELECT * FROM login WHERE username='$username'");
		$check_data_admin = mysql_num_rows($get_data_admin);

		if ($check_data_admin!=0) //jika data admin ada
		{
			while ($row = mysql_fetch_assoc($get_data_admin)){
				$dbusername = $row['username'];
				$dbpassword = $row['password'];
				$dbnama = $row['nama'];
				$dbfoto = $row['foto'];
			}
			if ($username==$dbusername&&$password==$dbpassword){
				$_SESSION['username']=$username;
				$_SESSION['nama']=$dbnama;
				$_SESSION['foto']=$dbfoto;
				$_SESSION['timeout']=$waktu+$expired;
				// $update_log = mysql_query("UPDATE tb_admin SET online='1' WHERE username='$username'");
				header("location:admin/");
			}
			elseif ($password!=$dbpassword){
				header("location:index.php?login_status=1");
			}
			else{
				header("location:index.php?login_status=2");
			}
		}
		else //jika data admin tidak ada cek data wali
		{
			$get_data_wali = mysql_query("SELECT * FROM wali_kelas WHERE username='$username'");
			$cek_data_wali = mysql_num_rows($get_data_wali);

			if ($cek_data_wali!=0) //jika data ins ada
			{
				while ($row = mysql_fetch_assoc($get_data_wali)){
					$dbusername = $row['username'];
					$dbpassword = $row['password'];
				}
				if ($username==$dbusername&&$password==$dbpassword){
					$_SESSION['username']=$username;
					$_SESSION['timeout']=$waktu+$expired;
					// $update_log = mysql_query("UPDATE wali SET online='1' WHERE username='$username'");
					header("location:wali/");
				}
				elseif ($password!=$dbpassword){
					header("location:index.php?login_status=1");
				}
				else{
					header("location:index.php?login_status=2");
				}
			}
			else  //jika data wali tidak ada cek data siswa
			{
				$get_data_siswa = mysql_query("SELECT * FROM siswa WHERE username='$username'");
				$cek_data_siswa = mysql_num_rows($get_data_siswa);

				if ($cek_data_siswa!=0) //jika data siswa ada
				{
					while ($row = mysql_fetch_assoc($get_data_siswa)){
						$dbusername = $row['username'];
						$dbpassword = $row['password'];
						$dbnama = $row['nama'];
						$dbnis = $row['nis'];
					}
					if ($username==$dbusername&&$password==$dbpassword){
						$_SESSION['username']=$username;
						$_SESSION['nama']=$dbnama;
						$_SESSION['nis']=$dbnis;
						$_SESSION['timeout']=$waktu+$expired;
						// $update_log = mysql_query("UPDATE siswa SET online='1' WHERE username='$username'");
						header("location:siswa/");
					}
					elseif ($password!=$dbpassword){
						header("location:index.php?login_status=1");
					}						
					else{
						header("location:index.php?login_status=2");
					}
				}
				else  //jika data siswa tidak ada cek data su
				{
					$get_data_su = mysql_query($conn ,"SELECT * FROM admin WHERE username='$username'");
					$cek_data_su = mysql_num_rows($get_data_su);

					if ($cek_data_su!=0) //jika data su ada
					{
						while ($row = mysql_fetch_assoc($get_data_su)){
							$dbusername = $row['username'];
							$dbpassword = $row['password'];
						}
						if ($username==$dbusername&&$password==$dbpassword){
							$_SESSION['username']=$username;
							$_SESSION['timeout']=$waktu+$expired;
							//$update_log = mysql_query($conn,"UPDATE tb_su SET online='1' WHERE user_su='$username'");
							header("location:./super-user/dashboard");
						}
						elseif ($password!=$dbpassword){
							header("location:index.php?login_status=1");
						}
						else{
							header("location:index.php?login_status=2");
						}
					}
					else
					{
						//apabila data tidak ada dari ketiga tabel
						header("location:index.php?login_status=2");
					}
				}
			}
		}
	}
	else
	{
		//apabila terjadi error
		header("location:index.php?login_status=3");
	}
?>