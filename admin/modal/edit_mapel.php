




<?php
    include "koneksi.php";
	$id_mapel=$_GET['id_mapel'];
	$sql="select mapel.id_mapel, mapel.kode_mapel,mapel.nama_mapel, mapel.jenis_mapel, mapel.kkm, kelas.kode_kelas,kelas.nama_kelas ,guru.nip, guru.nama from mapel inner join kelas on kelas.kode_kelas = mapel.kode_kelas inner join guru on mapel.nip = guru.nip where id_mapel = '$id_mapel'";
  $result = mysql_query($sql);;
  while($row=mysql_fetch_array($result)){?>
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit data Mata Pelajaran</h4>
        </div>

        <div class="modal-body">
        	<form action="proses/edit_mapel.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		<table>
                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><input type="hidden" name="id_mapel"  class="form-control" value="<?php echo $row['id_mapel']; ?>" /></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="mapel">Mata Pelajaran</label></td>
                  <td><input type="text" name="nama_mapel"  class="form-control" value="<?php echo $row['nama_mapel']; ?>" /></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Kode Mapel">Kode</label></td>
                  <td><input type="text" name="kode_mapel"  class="form-control" value="<?php echo $row['kode_mapel']; ?>" /></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="jenis">Jenis</label></td>
                  <td>
                    <select name="jenis" class="form-control">
                        <option value=""><?php echo $row['jenis_mapel']; ?></option>
                        <option value="Pesantren">Pesantren</option>
                        <option value="Negara">Negara</option>
                    </select>
                  </td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="kkm">KKM</label></td>
                  <td><input type="text" name="kkm"  class="form-control" value="<?php echo $row['kkm']; ?>" /></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="kelas">Kelas</label></td>
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
                  <td><label for="guru">Guru</label></td>
                  <td>
                    <select name="guru" class="form-control" >
                        <option value="<?php echo $row['nip']; ?>" selected><?php echo $row['nama']; ?></option>
                        <?php  
                            $q = mysql_query("SELECT * FROM guru");
                            while ($rows = mysql_fetch_array($q)) {
                                echo "<option value='$rows[1]'>$rows[2]</option>";
                            }
                        ?>
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
              <?php } ?>
            </div>

           
        </div>
    </div>