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
                    <h3 class="page-header">Selamat datang </h3>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            List Data Staff
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                                <thead>
                                    <tr>
                               <!--      <th>No</th> -->
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>JK</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Jabatan</th>
                                    <th>Status</th>
                                    <th align='center'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                include "koneksi.php";
                                $sql="SELECT * FROM staff";
                                $result = mysql_query($sql);;
                                while($row=mysql_fetch_array($result)){?>
                                    <tr>
                                    <td><?php echo $row['nip'];?></td>
                                    <td><?php echo $row['nama'];?></td>
                                    <td align='center'><?php echo $row['gender'];?></td>
                                    <td align='center'><?php echo $row['lahir'];?></td>
                                    <td align='center'><?php echo $row['agama'];?></td>
                                    <td align='center'><?php echo $row['alamat'];?></td>
                                    <td align='center'><?php echo $row['telepon'];?></td>
                                    <td align='center'><?php echo $row['jabatan'];?></td>
                                    <td align='center'><?php echo $row['status'];?></td>
                                    <td align='center'>
                                    <a href="#" class='open_modal' id='<?php echo $row['id_staff']; ?>'><button type='button' class='btn btn-success btn-circle'><i class='fa fa-edit fa-fw'></i></button></a>
                                    <a href="#" onclick="confirm_modal('delete/staff.php?&id_staff=<?php echo $row['id_staff']; ?>');"><button type='button' class='btn btn-danger btn-circle'><i class='fa fa-trash-o'></i></button></a>
                                    </td>
                                    </tr>
                                    <?php }
                                ?>
                                    </tbody>
                                </table>    
                            </div>
                            <!-- /.table-responsive -->
                            <div class="panel-footer">
                            <a href="#" class="btn btn-success btn-sm" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus fa-fw"></i>Tambah Staff</button></a>
                            
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
            <h4 class="modal-title" id="myModalLabel">Tambah Staff</h4>
        </div>

        <div class="modal-body">
          <form action="proses/save_staff.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <table>
                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="NIS">NIP</label></td>
                  <td><input type="number" name="nip"  class="form-control" placeholder="Nomor staff" required/></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Nama staff">Nama</label></td>
                  <td><input type="text" name="nama"  class="form-control" placeholder="Nama staff" required/></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="gender">Jenis Kelamin</label></td>
                  <td>
                    <select name="gender" class="form-control">
                        <option value="" selected disabled>--</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                  </td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Tanggal lahir">Tanggal Lahir</label></td>
                  <td><input type="date" name="lahir"  class="form-control" placeholder="Tanggal Lahir" required/></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>
                  <td><label for="Agama">Agama</label></td>
                  <td><input type="text" name="agama"  class="form-control" placeholder="Agama" required/></input></td>
                  </tr>  
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>
                  <td><label for="Alamat">Alamat</label></td>
                  <td><textarea name="alamat"  class="form-control" placeholder="Alamat" required/></textarea></td>
                  </tr>  
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Telepon">Nomor Telepon</label></td>
                  <td><input type="number" name="telepon"  class="form-control" placeholder="Nomor Telepon" required/></td>
                  </tr>
                </div>
                
                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="jabatan">Jabatan</label></td>
                  <td>
                    <select name="jabatan" class="form-control">
                        <option value="" selected disabled>--</option>
                        <option value="Bendahara">Bendahara</option>
                        <option value="Petugas TU">Petugas TU</option>
                    </select>
                  </td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Status">Status</label></td>
                  <td><input type="radio" name="status" value="aktif" checked/> Aktif
                      <input type="radio" name="status" value="nonaktif" /> Nonaktif</td>
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
        <h4 class="modal-title" style="text-align:center;">Apakah anda yakin akan menghapus data ini ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
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
                       url: "modal/edit_staff.php",
                       type: "GET",
                       data : {id_staff: m,},
                       success: function (ajaxData){
                       $("#ModalEdit").html(ajaxData);
                       $("#ModalEdit").modal('show',{backdrop: 'true'});
                   }
                   });
            });
          });

        function confirm_modal(delete_url)
        {
          $('#modal_delete').modal('show', {backdrop: 'static'});
          document.getElementById('delete_link').setAttribute('href' , delete_url);
        }
    </script>
   
</body>

</html>

