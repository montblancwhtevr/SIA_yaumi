




<?php
    include "koneksi.php";
	$id_nilai=$_GET['id_nilai'];
    $sql="select nilai.id_nilai, siswa.id_siswa, nilai.id_siswa, siswa.nama_siswa, nilai.id_mapel, nilai.harian, mapel.mapel, nilai.absen, nilai.uts, nilai.uas, nilai.jumlah, nilai.rata  from nilai inner join siswa ON siswa.id_siswa = nilai.id_siswa inner join mapel ON nilai.id_mapel = mapel.id_mapel WHERE id_nilai = $id_nilai";
                                
    $result = mysql_query($sql);;
    while($row=mysql_fetch_array($result)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Nilai Siswa</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit_nilai_kelas_tiga.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            <td><input type="hidden" name="id_nilai"  value="<?php echo $row['id_nilai']; ?>" /></td>
        	<table>
                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr> 
                      <td><label for="modal_nama">Nama</label></td>
                      <td>
                        <select name="modal_nama" class="form-control">
                            <option value="" selected><?php echo $row['id_siswa']; ?> - <?php echo $row['nama_siswa']; ?></option>
                            <?php  
                                $q = mysql_query("SELECT * FROM siswa where id_kelas=3");
                                while ($rows = mysql_fetch_array($q)) {
                                    echo "<option value='$rows[0]'>$rows[0] - $rows[1]</option>";
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
                            <option value="<?php echo $row['id_mapel']; ?>" selected><?php echo $row['mapel']; ?></option>
                            <?php  
                                $q = mysql_query("SELECT * FROM mapel");
                                while ($rowz = mysql_fetch_array($q)) {
                                    echo "<option value='$rowz[0]'>$rowz[1]</option>";
                                }
                            ?>
                        </select>
                      </td>
                      </tr>
                    </div>

                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="Nilai Absen">Nilai Absen</label></td>
                      <td><input type="text" name="absen" id="absen" class="form-control tambahke" value="<?php echo $row['absen']; ?>" /></td>
                      </tr>
                    </div> 
                          
                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="Nilai harian">Nilai Harian</label></td>
                      <td><input type="text" name="harian" id="harian" class="form-control tambahke" value="<?php echo $row['harian']; ?>" /></td>
                      </tr>
                    </div>

                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="Nilai UTS">Nilai UTS</label></td>
                      <td><input type="text" name="uts"  id="uts" class="form-control tambahke" value="<?php echo $row['uts']; ?>" /></td>
                      </tr>
                    </div>

                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="Nilai UAS">Nilai UAS</label></td>
                      <td><input type="text" name="uas"  id="uas" class="form-control tambahke" value="<?php echo $row['uas']; ?>" /></td>
                      </tr>
                    </div>

                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="Nilai jumlah">Jumlah</label></td>
                      <td><input type="text" name="jumlah" id="jumlah" class="form-control" value="<?php echo $row['jumlah']; ?>" /></td>
                      </tr>
                    </div>

                    <div class="form-group" style="padding-bottom: 10px;">
                      <tr>  
                      <td><label for="Nilai rata">Rata-rata</label></td>
                      <td><input type="text" name="rata"  id="rata" class="form-control" value="<?php echo $row['rata']; ?>" /></td>
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


    <script>
      $(document).ready(function(){

       $('.tambahke').on('keyup',function(){
            absen = parseInt($('#absen').val());
            harian = parseInt($('#harian').val());
            uts = parseInt($('#uts').val());
            uas = parseInt($('#uas').val());

            addneh();
        });

        function addneh(){
            var add1 = absen + harian + uts + uas;
            var rata1 = add1/4;
            $('#jumlah').val(add1);
            $('#rata').val(rata1);
        }
      });
    </script>