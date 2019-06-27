




<?php
    include "koneksi.php";
    $nip=$_GET['id_guru'];
    $sql="SELECT * FROM guru WHERE id_guru = $nip";
    $result = mysql_query($sql);
    while($row=mysql_fetch_array($result)){
?>

<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit data guru</h4>
        </div>

        <div class="modal-body">
          <form action="../admin/proses/edit_guru.php" name="modal_popup" enctype="multipart/form-data" method="POST">
          <table> 
                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="NIP">NIP</label></td>
                  <td><input type="number" name="nip"  class="form-control" value="<?php echo $row['nip']; ?>" /></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Nama guru">Nama</label></td>
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
                  <td><label for="Tanggal Lahir">Tanggal Lahir</label></td>
                  <td><input type="date" name="lahir"  class="form-control" value="<?php echo $row['lahir']; ?>" /></td>
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
                  <td><label for="Telepon">Nomor Telepon</label></td>
                  <td><input type="number" name="telepon"  class="form-control" value="<?php echo $row['telepon']; ?>"/></td>
                  </tr>
                </div>

                <div class="form-group" style="padding-bottom: 10px;">
                  <tr>  
                  <td><label for="Jabatan">Jabatan</label></td>
                  <td>
                    <select name="jabatan" class="form-control" >
                        <option value=""><?php echo $row['jabatan']; ?></option>
                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                        <option value="PNS">Guru PNS</option>
                        <option value="Guru Honorer">Guru Honorer</option>
                        <option value="Staff">Staff</option>
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

             <?php } ?>

            </div>

           
        </div>
    </div>