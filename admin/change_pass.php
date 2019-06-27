<?php  
include 'function.php';

checkUser();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Informasi Akademik MA WI Kebarongan</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../css/plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Modal bootstrap and css -->
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php include('library/header.php');?>
    <?php include('library/sidebar.php');?>        

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header">Setting</h3>
                <div class="row">
                    <div class="col-lg-12">
                        <div >
                            <div >
                                <strong>Ganti Password</strong>
                            </div>
                            <?php
                            //proses ganti password
                            if (isset($_POST['Ganti'])) {
                                $username        = $_POST['username'];
                                $password_lama    = $_POST['password_lama'];
                                $password_baru    = $_POST['password_baru'];
                                $konf_password    = $_POST['konf_password'];
                                //cek old password
                                $query = "SELECT * FROM login WHERE username='$username' AND password='$password_lama'";
                                $sql = mysql_query ($query);
                                $hasil = mysql_num_rows ($sql);
                                if (! $hasil >= 1) {
                                    ?>
                                    <script language="JavaScript">
                                    alert('Password lama tidak sesuai!, silahkan ulang kembali!');
                                    document.location='../admin/change.php';
                                    </script>
                                    <?php
                                    unset($_SESSION['username']);
                                    session_destroy();
                                }
                                //validasi data data kosong
                                else if (empty($_POST['password_baru']) || empty($_POST['konf_password'])) {
                                    echo "<h5><font color=red><center><blink>Ganti Password Gagal! Data Tidak Boleh Kosong.</blink></center></font></h3>";    
                                }
                                //validasi input konfirm password
                                else if (($_POST['password_baru']) != ($_POST['konf_password'])) {
                                    echo "<h5><font color=red><center><blink>Ganti Password Gagal! Password dan Konfirm Password Harus Sama.</blink></center></font></h3>";    
                                }
                                else {
                                //update data
                                    $query = "UPDATE login SET password='$password_baru' WHERE username='$username'";
                                    $sql = mysql_query ($query);
                                //setelah berhasil update
                                    if ($sql) {
                                        echo "<h5><font color=#8BB2D9><center><blink>Ganti Password Berhasil!</blink></center></font></h3>";    
                                    } else {
                                        echo "<h5><font color=red><center>Ganti Password Gagal!</center></font></h3>";    
                                    }
                                }
                            }
                            ?>
                            <form action="#" method="POST" name="form-ganti-password">
                                <table border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <div class="form-group" style="padding-bottom: 10px;">
                                        <tr>
                                            <td>Username</td>
                                            <td><input type="text" class="formcontrol" name="username" id="username" value="<?php echo ($_SESSION['username'])?>"/></td>
                                        </tr>
                                    </div>
                                    <div class="form-group" style="padding-bottom: 10px;">
                                        <tr><td>Password <strong>Lama</strong></td>
                                            <td><input type="password" class="formcontrol" name="password_lama" id="password_lama" /></td>
                                        </tr>
                                    </div>
                                    <div class="form-group" style="padding-bottom: 10px;">
                                        <tr><td>Password <strong>Baru</strong></td>
                                            <td><input type="password" class="formcontrol" name="password_baru" id="password_baru" /></td>
                                        </tr>
                                    </div>
                                    <div class="form-group" style="padding-bottom: 10px;">
                                        <tr><td>Konfirmasi <strong>Password </strong></td>
                                            <td><input type="password" class="formcontrol" name="konf_password" id="konf_password" /></td>
                                        </tr>
                                    </div>

                                    <tr>
                                        <td height="20">&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><button type="submit" name="Ganti" value="Ganti" class="btn btn-success"><span class="glyphicon glyphicon-edit"></span> Ganti</button>

                                            <button type="reset" name="reset" value="Reset"class="btn btn-warning"><span class="glyphicon glyphicon-repeat"></span> Reset</button>
                                        </tr>
                                        <tr>
                                            <td height="32">&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                    </table>
                                </form>
                    </div>
                </div>
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#wrapper -->      
    
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

    </script>
   
</body>

</html>

