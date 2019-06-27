




<?php
    include "koneksi.php";
	  $modal_nis=$_GET['id_siswa'];
    $sql="SELECT * FROM siswa inner join kelas ON siswa.id_kelas = kelas.id_kelas WHERE id_siswa = $modal_nis";
	  $result = mysql_query($sql);
	  while($row=mysql_fetch_array($result)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Tambah catatan Ke siswa</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_save_catatan.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        	<table>	
                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="NIS">NIS</label></td>
                  <td><input type="number" name="nis"  class="form-control" value="<?php echo $row['id_siswa']; ?>" /></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Nama Siswa">Nama</label></td>
                  <td><input type="text" name="nama_siswa"  class="form-control" value="<?php echo $row['nama_siswa']; ?>"/></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Waktu">Waktu</label></td>
                  <td><input type="date" name="waktu_catatan" id="waktu_catatan" class="form-control"  /></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Catatan">Catatan</label></td>
                  <td><textarea name="catatan" id="catatan" class="form-control" ></textarea></td>
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

             <?php } ?>

            </div>

           
        </div>
    </div>