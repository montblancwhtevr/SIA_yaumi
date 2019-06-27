<!DOCTYPE html>
<!-- SESSION START -->
<?php
    ini_set('display_errors','off');

    session_start();
    if (!empty($_SESSION['user_su'])) {
        header('location:super-user/');
    }
    elseif (!empty($_SESSION['admin'])) {
        header('location:admin/');
    }
    elseif (!empty($_SESSION['wali_kelas'])) {
        header('location:wali/');
    }
    elseif (!empty($_SESSION['siswa'])) {
        header('location:siswa/');
    }
?>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Akademik MA WI Kebarongan</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
       <br>
       <div class="row">
			<div class="col-md-6 col-md-offset-3">
				<p align="center"><img src="icon.png" width="80px" height="80px"></p>
				<h3><center><font color="black">
				Sistem Informasi Akademik
				MA WI Kebarongan				
			</font></center></h3>
				<p align="center"><font color="black">
                <em>JL. Buntu-Yogya KM 2 Kebarongan 53294
				<br>Telp. (0274) 524704 email : aliyah@mwi.sch.id</em>
                </font></p>
			</div>
        </div>
		<div class="row">
            <div class="col-md-4 col-md-offset-4">
		        <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="db_login.php" method="post">
                            <fieldset>
                                <div class="form-group" >
                                    <input class="form-control" placeholder="Username" name="username" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div>
                                <?php //GET LOGIN NOTIFICATION
                                    if (!empty($_GET['login_status'])) {
                                        if ($_GET['login_status'] == 1) {
                                            echo '<h5><center><font color="red">PASSWORD Salah!</font></center></h5>';
                                        }
                                        else if ($_GET['login_status'] == 2) {
                                            echo '<h5><center><font color="red">USERNAME tidak terdaftar!</font></center></h5>';
                                        }
                                        else if ($_GET['login_status'] == 3) {
                                            echo '<h5><center><font color="red">USERNAME dan PASSWORD tidak boleh kosong!</font></center></h5>';
                                        }
                                        else if ($_GET['user_change'] == 1) {
                                            echo '<h5><center><font color="green">USERNAME diubah! Login kembali untuk melanjutkan.</font></center></h5>';
                                        }
                                        else if ($_GET['user_change'] == 2) {
                                            echo '<h5><center><font color="green">WTF!</font></center></h5>';
                                        }
                                    }
                                ?>
                                <?php //GET LOGIN NOTIFICATION
                                    if (!empty($_GET['user_change'])) {
                                        if ($_GET['user_change'] == 1) {
                                            echo '<b><font color="green">Data berhasil diubah! Login kembali untuk melanjutkan.</font></b><br>';
                                        }
                                        else if ($_GET['user_change'] == 2) {
                                            echo '<h3><center><font color="red">Data gagal diubah!</font></center></h3>';
                                        }
                                    }
                                ?>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="login" id="login" class="btn btn-lg btn-info btn-block">Login</button>
                            </fieldset>
                    
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>
