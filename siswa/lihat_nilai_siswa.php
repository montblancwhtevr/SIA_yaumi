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
                <img src="icon.png" width="40" height="40" style="float:left;" />
                <a class="navbar-brand" href="#">Sistem Informasi Akademik MA WI Kebarongan</a>
            </div>
            <!-- /.navbar-header -->
            <!-- <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul> -->
                    <!-- /.dropdown-user -->
               <!--  </li> -->
                <!-- /.dropdown -->
           <!--  </ul> -->
            <!-- /.navbar-top-links -->
        </nav>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <div class="sia-profile">
                                <img class="sia-profile-image" src="siswa.jpg" >
                                <h5 style="text-align:center;">YAUMI HASHIFUL INSI</h5>
                                <p style="text-align:center; font-weight:bold;">12650043</p>    
                            </div>
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>                             
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
                    <h3 class="page-header">Selamat datang </h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            List Data Nilai
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
                                $sql="select nilai.id_nilai, mapel.kode_mapel,mapel.nama_mapel, guru.nip, guru.nama, siswa.nis,siswa.nama, mapel.kkm, nilai.absen, nilai.tugas, nilai.uts, nilai.uas, nilai.jumlah, nilai.rata, nilai.status, tahun.kode_ta, tahun.nama_ta, semester.kode_sem, semester.nama_sem, kelas.kode_kelas, kelas.nama_kelas from nilai inner join mapel on mapel.kode_mapel = nilai.kode_mapel inner join guru on guru.nip = nilai.nip inner join siswa on siswa.nis = nilai.nis inner join tahun on tahun.kode_ta = nilai.kode_ta inner join semester on semester.kode_sem = nilai.kode_sem inner join kelas on kelas.kode_kelas = nilai.kode_kelas where siswa.nis = ".$_SESSION['username']."";
                                
                                $result = mysql_query($sql);
                                while($row=mysql_fetch_array($result)){?>
                                    <tr> 
                                    <td><?php echo $row['nis'];?></td>
                                    <td><?php echo $row['nama'];?></td>
                                    <td><?php echo $row['nama_mapel'];?></td>
                                    <td align='center'><?php echo $row['absen'];?></td>
                                    <td align='center'><?php echo $row['tugas'];?></td>
                                    <td align='center'><?php echo $row['uts'];?></td>
                                    <td align='center'><?php echo $row['uas'];?></td>
                                    <td align='center'><?php echo $row['jumlah'];?></td>
                                    <td align='center'><?php echo $row['rata'];?></td>
                                  
                                    
                                    </td>
                                    </tr>
                                    <?php }
                                ?>
                                    </tbody>
                                </table>    
                            </div>
                            <!-- /.table-responsive -->
                            <div class="panel-footer">
                            <a href="download_nilai_siswa.php" class="btn btn-success btn-sm"><i class="fa fa-plus fa-fw"></i>Print</button></a>
        
                            </div>
                        <!-- /.panel footer-->
                        </div>
                        <!-- /.panel-body -->
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

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();

        });

        

   </script>

</body>

</html>

