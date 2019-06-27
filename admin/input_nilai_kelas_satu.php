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
                    <h3 class="page-header">Selamat datang </h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            List Data Siswa Kelas 1
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
                                    <th align='center'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                include "koneksi.php";
                                $sql="select nilai.id_nilai, mapel.kode_mapel, guru.nip, guru.nama, siswa.nis,siswa.nama, mapel.kkm, nilai.absen, nilai.tugas, nilai.uts, nilai.uas, nilai.jumlah, nilai.rata, nilai.status, tahun.kode_ta, tahun.nama_ta, semester.kode_sem, semester.nama_sem, kelas.kode_kelas, kelas.nama_kelas from nilai inner join mapel on mapel.kode_mapel = nilai.kode_mapel inner join guru on guru.nip = nilai.nip inner join siswa on siswa.nis = nilai.nis inner join tahun on tahun.kode_ta = nilai.kode_ta inner join semester on semester.kode_sem = nilai.kode_sem inner join kelas on kelas.kode_kelas = nilai.kode_kelas where id_kelas='K11'";
                                
                                $result = mysql_query($sql);;
                                while($row=mysql_fetch_array($result)){?>
                                    <tr>
                                    
                                    <td><?php echo $row['nis'];?></td>
                                    <td><?php echo $row['nama'];?></td>
                                    <td><?php echo $row['nip'];?></td>
                                    <td align='center'><?php echo $row['absen'];?></td>
                                    <td align='center'><?php echo $row['harian'];?></td>
                                    <td align='center'><?php echo $row['uts'];?></td>
                                    <td align='center'><?php echo $row['uas'];?></td>
                                    <td align='center'><?php echo $row['jumlah'];?></td>
                                    <td align='center'><?php echo $row['rata'];?></td>
                                    <td align='center'>
                                    <a href="#" class='open_modal' id='<?php echo $row['id_nilai']; ?>'><button type='button' class='btn btn-danger btn-circle'><i class='fa fa-edit fa-fw'></i></button></a>
                                    <a href="#" onclick="confirm_modal('delete/nilai_kelas_satu.php?&id_nilai=<?php echo $row['id_nilai']; ?>');"><button type='button' class='btn btn-danger btn-circle'><i class='fa fa-trash-o'></i></button></a>
                                    </td>
                                    </tr>
                                    <?php }
                                ?>
                                    </tbody>
                                </table>    
                            </div>
                            <!-- /.table-responsive -->
                            <div class="panel-footer">
                            <a href="#" class="btn btn-success btn-sm" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus fa-fw"></i>Input Nilai</button></a>
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

        <!-- Modal Popup untuk Add--> 
    <div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Input Nilai Siswa</h4>
            </div>

            <div class="modal-body">
              <form action="proses/nilai_kelas_satu.php" name="modal_popup" enctype="multipart/form-data" method="POST">
                
                    <table>
                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="modal_nama">Nama</label></td>
                      <td>
                        <select name="modal_nama" class="form-control">
                            <option value="" selected disabled>--</option>
                            <?php  
                                $q = mysql_query("SELECT * FROM siswa where id_kelas=1");
                                while ($row = mysql_fetch_array($q)) {
                                    echo "<option value='$row[0]'>$row[0] - $row[1]</option>";
                                }
                            ?>
                        </select>
                      </td>
                      </tr>
                    </div>

                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="modal_mapel">Mata Pelajaran</label></td>
                      <td>
                        <select name="modal_mapel" class="form-control">
                            <option value="" selected disabled>--</option>
                            <?php  
                                $q = mysql_query("SELECT * FROM mapel");
                                while ($row = mysql_fetch_array($q)) {
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                }
                            ?>
                        </select>
                      </td>
                      </tr>
                    </div>

                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="semester">Semester</label></td>
                      <td>
                        <select name="semester" class="form-control">
                            <option value="" selected disabled>--</option>
                            <option value="Ganjil">1</option>
                            <option value="Genap">2</option>
                        </select>
                      </td>
                      </tr>
                    </div>

                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="tahun-ajaran">Tahun Pelajaran</label></td>
                      <td>
                        <select name="tahun_ajaran" class="form-control">
                            <option value="" selected disabled>--</option>
                            <?php  
                                $q = mysql_query("SELECT * FROM tahun");
                                while ($row = mysql_fetch_array($q)) {
                                    echo "<option value='$row[0]'>$row[1]</option>";
                                }
                            ?>
                        </select>
                      </td>
                      </tr>
                    </div>

                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="Nilai Absen">Nilai Absen</label></td>
                      <td><input type="text" name="nilai_absen" id="nilai_absen" class="form-control" placeholder="0-100" /></td>
                      </tr>
                    </div>
                          
                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="Nilai harian">Nilai Harian</label></td>
                      <td><input type="text" name="nilai_harian" id="nilai_harian" class="form-control" placeholder="0-100" /></td>
                      </tr>
                    </div>

                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="Nilai UTS">Nilai UTS</label></td>
                      <td><input type="text" name="nilai_uts"  id="nilai_uts" class="form-control" placeholder="0-100" /></td>
                      </tr>
                    </div>

                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="Nilai UAS">Nilai UAS</label></td>
                      <td><input type="text" name="nilai_uas"  id="nilai_uas" class="form-control" placeholder="0-100" /></td>
                      </tr>
                    </div>

                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="Nilai jumlah">Jumlah</label></td>
                      <td><input type="text" name="nilai_jumlah" id="nilai_jumlah" class="form-control" /></td>
                      </tr>
                    </div>

                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="Nilai rata">Rata-rata</label></td>
                      <td><input type="text" name="nilai_rata"  id="nilai_rata" class="form-control" /></td>
                      </tr>
                    </div>
                                 
                    </table>
                    
                  <div class="modal-footer">
                      <button class="btn btn-success" type="submit" id="save" name="save">
                          Confirm
                      </button>

                      <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                        Cancel
                      </button>
                  </div>

                  </form>

               

                </div>

               
            </div>
        </div>
    </div>

    <!-- Modal Popup untuk Edit--> 
    <div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

    </div>

    <!-- Modal Popup untuk delete--> 
    <div class="modal fade" id="modal_delete">
      <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
          </div>
                    
          <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
            <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
            <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div> 

    <!-- Javascript untuk popup modal Delete--> 
    <script type="text/javascript">
        function confirm_modal(delete_url)
        {
          $('#modal_delete').modal('show', {backdrop: 'static'});
          document.getElementById('delete_link').setAttribute('href' , delete_url);
        }
    </script>                 

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

        var nilai_absen;
        var nilai_harian;
        var nilai_uts;
        var nilai_uas;

        $('#nilai_absen').on('keyup',function(){
            nilai_absen = $('#nilai_absen').val();
            add();
        });


        $('#nilai_uas').on('keyup',function(){
            nilai_uas = $('#nilai_uas').val();
            add();
        });


        $('#nilai_uts').on('keyup',function(){
            nilai_uts = $('#nilai_uts').val();
            add();
        });


        $('#nilai_harian').on('keyup',function(){
            nilai_harian = $('#nilai_harian').val();
            add();
        });

        $(document).ready(function() {
        $(".open_modal").on('click',function(e) {
          var m = $(this).attr("id");
               $.ajax({
                       url: "modal_edit_nilai_kelas_satu.php",
                       type: "GET",
                       data : {id_nilai: m,},
                       success: function (ajaxData){
                       $("#ModalEdit").html(ajaxData);
                       $("#ModalEdit").modal('show',{backdrop: 'true'});
                        }
                   });
            });
         });

        function add(){
            var add = parseInt(nilai_absen) + parseInt(nilai_harian) + parseInt(nilai_uas) + parseInt(nilai_uts);
            var rata = add/4;
            $('#nilai_jumlah').val(add);
            $('#nilai_rata').val(rata);
        }

        function confirm_modal(delete_url)
        {
          $('#modal_delete').modal('show', {backdrop: 'static'});
          document.getElementById('delete_link').setAttribute('href' , delete_url);
        }
        });
    </script>

</body>

</html>

