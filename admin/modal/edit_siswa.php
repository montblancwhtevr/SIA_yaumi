




<?php
    include "koneksi.php";
	  $modal_nis=$_GET['id_siswa'];
    $sql="select siswa.id_siswa, siswa.nis, siswa.nama, siswa.gender,kelas.kode_kelas, kelas.nama_kelas, siswa.lahir, siswa.agama, siswa.alamat, siswa.status from siswa inner join kelas ON kelas.kode_kelas = siswa.kode_kelas WHERE id_siswa = $modal_nis ";
	  $result = mysql_query($sql);
	  while($row=mysql_fetch_array($result)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit data siswa</h4>
        </div>

        <div class="modal-body">
        	<form action="../admin/proses/edit_siswa.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        	<table>	
                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="NIS">NIS</label></td>
                  <td><input type="number" name="nis"  class="form-control" value="<?php echo $row['nis']; ?>" /></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Nama Siswa">Nama</label></td>
                  <td><input type="text" name="nama"  class="form-control" value="<?php echo $row['nama']; ?>"/></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="gender">Jenis Kelamin</label></td>
                  <td>
                    <select name="gender" class="form-control">
                        <option value="" disabled><?php echo $row['gender']; ?></option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                  </td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="gender">Kelas</label></td>
                  <td>
                    <select name="kelas" class="form-control" >
                        <option value="<?php echo $row['kode_kelas']; ?>" selected><?php echo $row['nama_kelas']; ?></option>
                        <?php  
                            $q = mysql_query("SELECT * FROM kelas");
                            while ($rows = mysql_fetch_array($q)) {
                                echo "<option value='$rows[1]'>$rows[2]</option>";
                            }
                        ?>
                    </select>
                  </td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Tanggal Lahir">Tanggal Lahir</label></td>
                  <td><input type="date" name="tanggal"  class="form-control" value="<?php echo $row['lahir']; ?>" /></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Agama">Agama</label></td>
                  <td><input type="text" name="agama"  class="form-control" value="<?php echo $row['agama']; ?>" /></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Alamat">Alamat</label></td>
                  <td><textarea name="alamat"  class="form-control"><?php echo $row['alamat']; ?></textarea></td>
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

             <?php } ?>

            </div>

           
        </div>
    </div>