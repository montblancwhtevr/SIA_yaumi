




<?php
    include "koneksi.php";
	$id_ta=$_GET['id_ta'];
	$sql="SELECT * FROM tahun WHERE id_ta = '$id_ta'";
  $result = mysql_query($sql);;
  while($row=mysql_fetch_array($result)){?>
?>

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
                  <td><input type="hidden" name="id_ta"  class="form-control" placeholder="Kode Tahun Ajaran" value="<?php echo $row['id_ta']; ?>" required/></td>
                  </tr>
                </div>   
                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="mapel">Kode Tahun Ajaran</label></td>
                  <td><input type="text" name="kode_ta"  class="form-control" placeholder="Kode Tahun Ajaran" value="<?php echo $row['kode_ta']; ?>" required/></td>
                  </tr>
                </div>                      
               
                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Kode mapel">Nama Tahun Ajaran</label></td>
                  <td><input type="text" name="nama_ta"  class="form-control" placeholder="Nama Tahun Ajaran"  value="<?php echo $row['nama_ta']; ?>" required /></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Jenis">Status</label></td>
                  <td><!-- <input type="text" name="modal_gender"  class="form-control" placeholder="Jenis Kelamin" required/> -->
                    <select name="status" class="form-control">
                        <option value="aktif" <?=  $row['status']=='aktif'? 'selected':'' ?> >Aktif</option>
                        <option value="nonaktif" <?=  $row['status']=='nonaktif'? 'selected':'' ?> >Non-aktif</option>
                    </select>
                  </td>
                  </tr>
                </div>

                </table>
              <div class="modal-footer">
                  <button class="btn btn-success" type="submit" id="update" name="update">
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