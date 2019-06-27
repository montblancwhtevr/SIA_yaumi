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
                            List Data Mata Pelajaran
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                            <table class='table table-striped table-bordered table-hover' id='dataTables-example'>
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Status</th>
                                    <th align='center'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                include "koneksi.php";
                                $sql="SELECT
                                      tahun.id_ta,
                                      tahun.kode_ta,
                                      tahun.nama_ta,
                                      tahun.status
                                      FROM
                                      tahun";
                                $result = mysql_query($sql);;
                                while($row=mysql_fetch_array($result)){?>
                                    <tr>
                                    <td><?php echo $row['id_ta'];?></td>
                                    <td><?php echo $row['nama_ta'];?></td>
                                    <td><?php echo $row['status'];?></td>
                                    <td align='center'>
                                    <a href="#" class='open_modal' id='<?php echo $row['id_ta']; ?>'><button type='button' class='btn btn-success btn-circle'><i class='fa fa-edit fa-fw'></i></button></a>
                                    <a href="#" onclick="confirm_modal('delete/delete_ta.php?&id_ta=<?php echo $row['id_ta']; ?>');"><button type='button' class='btn btn-danger btn-circle'><i class='fa fa-trash-o'></i></button></a>
                                    </td>
                                    </tr>
                                    <?php }
                                ?>
                                    </tbody>
                                </table>    
                            </div>
                            <!-- /.table-responsive -->
                            <div class="panel-footer">
                            <a href="#" class="btn btn-success btn-sm" data-target="#ModalAdd" data-toggle="modal"><i class="fa fa-plus fa-fw"></i>Tambah Tahun Ajaran</button></a>
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
            <h4 class="modal-title" id="myModalLabel">Tambah Tahun Ajaran</h4>
        </div>

        <div class="modal-body">
          <form action="proses/save_ta.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <table>
                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="mapel">Kode Tahun Ajaran</label></td>
                  <td><input type="text" name="kode_ta"  class="form-control" placeholder="Kode Tahun Ajaran" required/></td>
                  </tr>
                </div>                      
               
                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Kode mapel">Nama Tahun Ajaran</label></td>
                  <td><input type="text" name="nama_ta"  class="form-control" placeholder="Nama Tahun Ajaran" required /></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Jenis">Status</label></td>
                  <td><!-- <input type="text" name="modal_gender"  class="form-control" placeholder="Jenis Kelamin" required/> -->
                    <select name="status" class="form-control">
                        <option value="" selected disabled>--</option>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Non-aktif</option>
                    </select>
                  </td>
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
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>



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

<!-- Javascript untuk popup modal Edit--> 
              

    <!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    
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

        // DATABALES STATIC NUMBER ORDER
        var t = $('#dataTables-example').DataTable( {
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
        } ],
            "order": [[ 1, 'asc' ]]
        } );

        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();

        // $('#dataTables-example').dataTable();
        $(".open_modal").click(function(e) {
        var m = $(this).attr("id");
           $.ajax({
                   url: "modal/edit_ta.php",
                   type: "GET",
                   data : {id_ta: m,},
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
