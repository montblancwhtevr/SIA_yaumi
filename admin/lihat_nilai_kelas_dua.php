<!--<?php
    session_start();
    if(!isset($_SESSION['id_petugas'])){
        print "<meta http-equiv='refresh' content='0;url=../index.php'>";
    }
?>
-->

<?php  
include 'koneksi.php';

if(isset($_POST['tampil'])){
    $mapel = $_POST['modal_kelas'];

    // echo $mapel;

    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Nilai Online SDN Bumiijo Yogyakarta</title>

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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Sistem Informasi Nilai Akademik SDN Bumiijo Yogyakarta</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                            <a href="data_mapel.php"><i class="fa fa-file-o fa-fw"></i> Data Mata Pelajaran</a>
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-tasks fa-fw"></i>Data Kelas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="kelas_satu.php"><i class="fa fa-check fa-fw"></i>Kelas 1</a>
                                </li>
                                <li>
                                    <a href="kelas_dua.php"><i class="fa fa-check fa-fw"></i>Kelas 2</a>
                                </li>
								<li>
                                    <a href="kelas_tiga.php"><i class="fa fa-check fa-fw"></i>Kelas 3</a>
                                </li>
                                <li>
                                    <a href="kelas_empat.php"><i class="fa fa-check fa-fw"></i>Kelas 4</a>
                                </li>
                                <li>
                                    <a href="kelas_lima.php"><i class="fa fa-check fa-fw"></i>Kelas 5</a>
                                </li>
                                <li>
                                    <a href="kelas_enam.php"><i class="fa fa-check fa-fw"></i>Kelas 6</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Data Nilai Kelas 2</h3>
                    <div class="form-group" style="padding-bottom: 10px;">
                    <form name="view-mapel" enctype="multipart/form-data" method="POST">   
                      <tr>  
                      <td><label for="gender">Mata Pelajaran</label></td>
                      <td>
                        <select name="modal_kelas" class="form-control-drop">
                            <option value="" selected disabled>--</option>
                            <?php
                                include "koneksi.php";  
                                $q = mysql_query("SELECT * FROM mapel");
                                while ($row = mysql_fetch_array($q)) {
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                }
                            ?>
                        </select>
                        <div class="">
                            <button class="btn btn-success" type="submit" id="tampil" name="tampil">
                                Confirm
                            </button>
                        </div>
                    </form>
                    </div>
                <br></br>
                <div class="row">
                    <div class="col-lg-12">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            List Data Siswa
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                                <thead>
                                    <tr>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Mapel</th>
                                    <th>Presensi</th>
                                    <th>Harian</th>
                                    <th>UTS</th>
                                    <th>UAS</th>
                                    <th>Jumlah</th>
                                    <th>Rata-rata</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                include "koneksi.php";
                                $sql="select siswa.id_siswa, nilai.id_siswa, siswa.nama_siswa, nilai.id_mapel,mapel.mapel, nilai.harian, nilai.absen, nilai.uts, nilai.uas, nilai.jumlah, nilai.rata  from siswa inner join nilai ON siswa.id_siswa = nilai.id_siswa inner join mapel on nilai.id_mapel = mapel.id_mapel where id_kelas=2";
                                $result = mysql_query($sql);;
                                while($row=mysql_fetch_array($result)){?>
                                    <tr>
                                    <td><?php echo $row['id_siswa'];?></td>
                                    <td><?php echo $row['nama_siswa'];?></td>
                                    <td><?php echo $row['id_mapel'];?></td>
                                    <td align='center'><?php echo $row['absen'];?></td>
                                    <td align='center'><?php echo $row['harian'];?></td>
                                    <td align='center'><?php echo $row['uts'];?></td>
                                    <td align='center'><?php echo $row['uas'];?></td>
                                    <td align='center'><?php echo $row['jumlah'];?></td>
                                    <td align='center'><?php echo $row['rata'];?></td>
                                    
                                    </tr>
                                    <?php }
                                ?>
                                    </tbody>
                                </table>    
                            </div>
                            <!-- /.table-responsive -->
                            <div class="panel-footer">
                            <a href="download/download_nilai_kelas_dua.php" class="btn btn-success btn-sm" ><i class="fa fa-plus fa-fw"></i>Print Nilai</button></a>    
                            </div>
                        <!-- /.panel footer-->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>

                </div>
            </div>    
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
