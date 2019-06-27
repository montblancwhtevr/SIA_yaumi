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
    <title>Sistem Informasi Akademik MA WI Kebarongan </title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <?php 
    include('library/header.php');
    include('library/sidebar.php');
    ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3><?php
                    date_default_timezone_set("Asia/Jakarta");
                    $b = time();
                    $hour = date("G",$b);
                    if ($hour>=0 && $hour<=11){
                        echo "Assalamu'alaikum ... Selamat Pagi :)";
                        }
                    elseif ($hour >=12 && $hour<=14){
                        echo "Assalamu'alaikum ... Selamat Siang :)";
                        }
                    elseif ($hour >=15 && $hour<=17){
                        echo "Assalamu'alaikum ... Selamat Sore :)";
                        }
                    elseif ($hour >=17 && $hour<=18){
                        echo "Assalamu'alaikum ... Selamat Petang :)";
                        }
                    elseif ($hour >=19 && $hour<=23){
                        echo "Assalamu'alaikum ... Selamat Malam :)";
                        }
                    ?><h3>
                    <h4 class="page-header">Hello <?php echo($_SESSION['nama'])?>, Selamat datang di Sistem Informasi Akademik MA WI.<br>
                    Silahkan klik menu pilihan yang berada di sebelah kiri atau pilih ikon-ikon di bawah ini.</h4>
                    <div class="col-lg-4 col-md-6" style=" width: 250px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-th fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php
                                    include "koneksi.php";
                                    $result=mysql_query("SELECT * FROM siswa"); echo "".mysql_num_rows($result)
                                    ?>
                                    </div>
                                    <div>Jumlah Siswa</div>
                                </div>
                            </div>
                        </div>
                        <a href="data_siswa.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6" style=" width: 250px;">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php
                                    include "koneksi.php";
                                    $result=mysql_query("SELECT * FROM guru"); echo "".mysql_num_rows($result)
                                    ?>
                                    </div>
                                    <div>Jumlah Guru</div>
                                </div>
                            </div>
                        </div>
                        <a href="data_guru.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6" style=" width: 250px;">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php
                                    include "koneksi.php";
                                    $result=mysql_query("SELECT * FROM staff"); echo "".mysql_num_rows($result)
                                    ?>
                                    </div>
                                    <div>Jumlah Staff</div>
                                </div>
                            </div>
                        </div>
                        <a href="data_staff.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6" style=" width: 250px;">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-codepen fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php
                                    include "koneksi.php";
                                    $result=mysql_query("SELECT * FROM kelas"); echo "".mysql_num_rows($result)
                                    ?>
                                    </div>
                                    <div>Jumlah Kelas</div>
                                </div>
                            </div>
                        </div>
                        <a href="data_kelas.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6" style=" width: 250px;">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-font fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php
                                    include "koneksi.php";
                                    $result=mysql_query("SELECT * FROM siswa"); echo "".mysql_num_rows($result)
                                    ?>
                                    </div>
                                    <div>Catatan</div>
                                </div>
                            </div>
                        </div>
                        <a href="catatan.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6" style=" width: 250px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cog fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php
                                    include "koneksi.php";
                                    $result=mysql_query("SELECT * FROM siswa"); echo "".mysql_num_rows($result)
                                    ?>
                                    </div>
                                    <div>Akademik</div>
                                </div>
                            </div>
                        </div>
                        <a href="data_akademik.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6" style=" width: 250px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cog fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php
                                    include "koneksi.php";
                                    $result=mysql_query("SELECT * FROM siswa"); echo "".mysql_num_rows($result)
                                    ?>
                                    </div>
                                    <div>Presensi</div>
                                </div>
                            </div>
                        </div>
                        <a href="data_presensi.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    </div>

                    <div class="col-lg-4 col-md-6" style=" width: 250px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cog fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                    <?php
                                    include "koneksi.php";
                                    $result=mysql_query("SELECT * FROM siswa"); echo "".mysql_num_rows($result)
                                    ?>
                                    </div>
                                    <div>Upload</div>
                                </div>
                            </div>
                        </div>
                        <a href="data_akademik.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                    </div>
                
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>
