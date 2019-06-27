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

    <?php include('library/header.php');?>
    <?php include('library/sidebar.php');?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Data Akademik</h3>
                    <div class="form-group" style="padding-bottom: 10px;">
                    <form name="view-mapel" enctype="multipart/form-data" method="POST">   
                      <tr>  
                      <td><label for="gender">Pilih Kelas</label></td>
                      <td>
                        <select name="modal_kelas" class="form-control-drop">
                            <option value="" selected disabled>--</option>
                            <?php
                                include "koneksi.php";  
                                $q = mysql_query("SELECT * FROM kelas");
                                while ($row = mysql_fetch_array($q)) {
                                    echo "<option value='$row[1]'>$row[2]</option>";
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
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            List Data Siswa
                        </div>
                        <!-- /.panel-heading -->
                        <body>
                        <form action='proses/naik_kelas.php' method='post'>   
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                                <thead>
                                    <tr>
                                    <th>Check</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>JK</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
                                    <th>Kelas</th>
                                    <th>Status</th>
                                   <!--  <th align='center'>Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                include "koneksi.php";
                                $sql="select siswa.id_siswa, siswa.nis, siswa.nama, siswa.gender, kelas.nama_kelas, siswa.lahir, siswa.agama, siswa.alamat, siswa.status from siswa inner join kelas ON kelas.kode_kelas = siswa.kode_kelas ";
                                $result = mysql_query($sql);;
                                while($row=mysql_fetch_array($result)){?>
                                    <tr>
                                    <td align='center'><input type="checkbox" name='naik[]' value="<?php echo $row['id_siswa'] ?>"></td>
                                    <td><?php echo $row['nis'];?></td>
                                    <td><?php echo $row['nama'];?></td>
                                    <td><?php echo $row['gender'];?></td>
                                    <td><?php echo $row['lahir'];?></td>
                                    <td><?php echo $row['agama'];?></td>
                                    <td><?php echo $row['alamat'];?></td>
                                    <td><?php echo $row['nama_kelas'];?></td>
                                    <td><?php echo $row['status'];?></td>
                                   
                                    <!-- <td align='center'>
                                    <a href="#" class='open_modal' id='<?php echo $row['id_siswa']; ?>'><button type='button' class='btn btn-success btn-circle'><i class='fa fa-edit fa-fw'></i></button></a>
                                    <a href="#" onclick="confirm_modal('delete/siswa.php?&id_siswa=<?php echo $row['id_siswa']; ?>');"><button type='button' class='btn btn-danger btn-circle'><i class='fa fa-trash-o'></i></button></a>
                                    </td> -->
                                    </tr>
                                    <?php }
                                ?>
                                    </tbody>
                                </table>    
                            </div>
                            <!-- /.table-responsive -->
                            <div class="panel-footer">
                            <input class="btn btn-success btn-sm" type='submit' name='submit' value='Naik Kelas' />    
                            <input class="btn btn-success btn-sm" type='reset' value='Reset'>
                            </div>
                        <!-- /.panel footer-->
                        </form>
                        </div>
                        </body>
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
