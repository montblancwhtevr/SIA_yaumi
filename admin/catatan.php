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

    <title>Sistem Informasi Nilai Akademik SDN Bumiijo Yogyakarta</title>

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
                            <a href="index.php"><i class="fa fa-print fa-fw"></i> Dashboard</a>
                            <a href="data_mapel.php"><i class="fa fa-print fa-fw"></i> Data Mata Pelajaran</a>
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
                    <h3 class="page-header">Selamat datang </h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
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
                                    <th>Kelamin</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
                                    
                                    <th align='center'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                include "koneksi.php";
                                $sql="SELECT * FROM siswa inner join kelas ON siswa.id_kelas = kelas.id_kelas ";
                                $result = mysql_query($sql);;
                                while($row=mysql_fetch_array($result)){?>
                                    <tr>
                                    <td><?php echo $row['id_siswa'];?></td>
                                    <td><?php echo $row['nama_siswa'];?></td>
                                    <td><?php echo $row['gender_siswa'];?></td>
                                    <td><?php echo $row['kelas'];?></td>
                                    <td><?php echo $row['lahir_siswa'];?></td>
                                    <td><?php echo $row['agama'];?></td>
                                    <td><?php echo $row['alamat'];?></td>
                                   
                                    <td align='center'>
                                    <a href="#" class='open_modal' id='<?php echo $row['id_siswa']; ?>'><button type='button' class='btn btn-info btn-circle'><i class='fa fa-edit fa-fw'></i></button></a>
                                    </td>
                                    </tr>
                                    <?php }
                                ?>
                                    </tbody>
                                </table>    
                            </div>
                            <!-- /.table-responsive -->
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

<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

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
    <script type="text/javascript">
       $(document).ready(function () {
        $('#dataTables-example').dataTable();
        $(".open_modal").click(function(e) {
          var m = $(this).attr("id");
               $.ajax({
                       url: "modal_add_catatan.php",
                       type: "GET",
                       data : {id_siswa: m,},
                       success: function (ajaxData){
                       $("#ModalEdit").html(ajaxData);
                       $("#ModalEdit").modal('show',{backdrop: 'true'});
                   }
                   });
            });
          });

        
    </script>
   
</body>

</html>
