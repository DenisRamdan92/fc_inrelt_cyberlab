	
<section class="dashboard-counts no-padding-bottom">
<div class="container-fluid">
  <div class="row bg-white has-shadow">
	  <ul class="nav nav-tabs">
		  <li id="tabform" class="active"><a data-toggle="tab" href="#menu2">Form Input</a></li>
		  <li id="tabform2"><a data-toggle="tab" href="#menu3">Data</a></li>
	  </ul>
			  <?php if ($this->session->flashdata('msg_error_employee')) { ?>
				  <div class="alert margin-bottom-30">
					  <button type="button" class="close" data-dismiss="alert">
						  <span aria-hidden="true">×</span>
						  <span class="sr-only">Hilangkan</span>
					  </button>
					  <strong>Perhatian !</strong>   <?php echo $this->session->flashdata('msg_error_employee'); ?> 
				  </div>
			  <?php } ?>
	  <div class="tab-content">
		  <div id="menu2" class="tab-pane fade in active">
		  <h3>Form Input</h3>
		  <?php echo form_open('backend/employee/simpan', "method='post', class='form form-horizontal' id='simpanform' enctype='multipart/form-data'")?>

		  <div class="form-group">
			<label class="control-label col-sm-2" for="name_employee">Nama:</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="name_employee" name="name_employee">
			  <input type="text" class="form-control" id="id_employee" name="id_employee" style="display:none">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="place_of_birth">Tempat Lahir</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="place_of_birth" name="place_of_birth">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="date_of_birth">Tanggal Lahir</label>
			<div class="col-sm-10">
			  <input type="date" class="form-control" id="date_of_birth" name="date_of_birth">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="address">Alamat</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="address" name="address">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="sex">Jenis Kelamin</label>
			<div class="col-sm-10">
			  <select  class="form-control" id="sex" name="sex">
				  <option value=""></option>
				  <option value="L">Laki - laki</option>
				  <option value="P"> Perempian</option>
			  </select>
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="telp">Telpon</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="telp" name="telp">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="email">Email</label>
			<div class="col-sm-10">
			  <input type="email" class="form-control" id="email" name="email">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="nip">NIP</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="nip" name="nip">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="no_ktp">NO. KTP</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="no_ktp" name="no_ktp">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="religion">Agama</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="religion" name="religion">
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="education">Pendidikan</label>
			<div class="col-sm-10">
			  <input type="text" class="form-control" id="education" name="education">
			</div>
		  </div>
		  <div class="form-group" id="aktiftidak" style="display:none;">
			<label class="control-label col-sm-2" for="status">Status</label>
			<div class="col-sm-10">
			  <select class="form-control" id="status" name="status">
					  <option value="1">Aktif</option>
					  <option value="2">Tidak Aktif</option>
			  </select>
			</div>
		  </div>
		  <div class="form-group">
			<label class="control-label col-sm-2" for="fotoUpload">Foto</label>
			<div class="col-sm-10">
			  <input type="file" id="urlSlider" name="urlSlider" alt="Logo">
			</div>
		  </div>
		  <div class="form-group">        
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-default" id="simpan" name="simpan" >Simpan</button>
			</div>
		  </div>
		</form>
		  </div>
		  <div id="menu3" class="tab-pane fade">
		  <h3>Data</h3>
				  <table id="dataemployee" class="table table-hover">
				  <thead>
				  <tr>
				  <th>No.</th>
				  <th>Aksi</th>
				  <th>Id</th>
				  <th>Nama</th>
				  <th>Tempat Lahir</th>
				  <th>Tgl Lahir</th>
				  <th>Alamat</th>
				  <th>Telpon</th>
				  <th>Email</th>
				  <th>NIP</th>
				  <th>No. Ktp</th>
				  <th>JK</th>
				  <th>Agama</th>
				  <th>Pendidikan</th>
				  <th>status</th>
				  <th>foto</th>
				  </tr>
				  </thead>
				  <tbody>
				  <?php 
				  $i = 1;
				  foreach ($dataemployee as $de)
				  {
				   if ($de['status'] == '1') {
					 $status = "Bekerja";
				   } else $status = "Tidak Bekerja";
				   
				  echo "<tr>";
				  echo "<td style='background-color:rgba(136, 135, 135, 0.32);'>".$i."</td>";
				  echo "<td><i id_employee=".$de['id_employee']." id='edit".$de['id_employee']."' name='edit".$de['id_employee']."' class='btn btn-warning btn-sm fa fa-edit editModal' title='Edit' data-toggle='modal' data-target='#modaledit'></i></td>";
				  echo "<td>".$de['id_employee']."</td>";
				  echo "<td>".$de['name_employee']."</td>";
				  echo "<td>".$de['address']."</td>";
				  echo "<td>".$de['date_of_birth']."</td>";
				  echo "<td>".$de['place_of_birth']."</td>";
				  echo "<td>".$de['telp']."</td>";
				  echo "<td>".$de['email']."</td>";
				  echo "<td>".$de['nip']."</td>";
				  echo "<td>".$de['no_ktp']."</td>";
				  echo "<td>".$de['sex']."</td>";
				  echo "<td>".$de['religion']."</td>";
				  echo "<td>".$de['education']."</td>";
				  echo "<td>".$status."</td>";
				  echo "<td>"."<img src='".$de['url_foto']."' width='100px' style='border:1px solid'>"."</td>";
				  echo "</tr>";
				  $i++;
				  }
				  ?>     
				  </tbody>
				  </table>
		 </div>
	  </div>
  </div>
</div>
</section>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
	  $('#dataemployee').DataTable();
	  
	  $(document).on('click','.editModal',function(){
		  var currentRow = $(this).closest("tr");
		  var id_employee = currentRow.find("td:eq(2)").text();
		  var name_employee = currentRow.find("td:eq(3)").text();
		  var place_of_birth = currentRow.find("td:eq(4)").text();
		  var date_of_birth = currentRow.find("td:eq(5)").text();
		  var address = currentRow.find("td:eq(6)").text();
		  var telp = currentRow.find("td:eq(7)").text();
		  var email = currentRow.find("td:eq(8)").text();
		  var nip = currentRow.find("td:eq(9)").text();
		  var no_ktp = currentRow.find("td:eq(10)").text();
		  var sex = currentRow.find("td:eq(11)").text();
		  var religion = currentRow.find("td:eq(12)").text();
		  var education = currentRow.find("td:eq(13)").text();
		  var status = currentRow.find("td:eq(14)").text();
		  $('#name_employee').val(name_employee);
		  $('#place_of_birth').val(place_of_birth);
		  $('#date_of_birth').val(date_of_birth);
		  $('#address').val(address);
		  $('#sex').val(sex);
		  $('#telp').val(telp);
		  $('#email').val(email);
		  $('#nip').val(nip);
		  $('#no_ktp').val(no_ktp);
		  $('#religion').val(religion);
		  $('#education').val(education);
		  $('#status').val(status);
		  $('#simpan').html('Edit');
		  $('#tabform').attr('class','active');
		  $('#tabform2').attr('class','');
		  $('#menu2').attr('class','tab-pane fade in active');
		  $('#menu3').attr('class','tab-pane fade in');
		  $('#aktiftidak').css('display','');
		  $('#simpanform').attr('action','<?php echo base_url()?>/backend/employee/simpan/'+id_employee);
	  });
  });
</script>
