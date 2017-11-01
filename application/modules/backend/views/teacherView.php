	
<section class="dashboard-counts no-padding-bottom">
<div class="container-fluid">
  <div class="row bg-white has-shadow">
	  <ul class="nav nav-tabs">
		  <li class="active" id="tabform"><a data-toggle="tab" href="#menu2">Form Input</a></li>
		  <li id="tabform2"><a data-toggle="tab" href="#menu3">Data</a></li>
	  </ul>
			  <?php if ($this->session->flashdata('msg_error')) { ?>
				  <div class="alert margin-bottom-30">
					  <button type="button" class="close" data-dismiss="alert">
						  <span aria-hidden="true">×</span>
						  <span class="sr-only">Hilangkan</span>
					  </button>
					  <strong>Perhatian !</strong>   <?php echo $this->session->flashdata('msg_error'); ?> 
				  </div>
			  <?php } ?>
			  
	  <div class="tab-content">
		  <div id="menu2" class="tab-pane fade in active">
		  <h3>Form Input</h3>
			  <?php echo form_open('backend/teacher/simpan', "method='post', class='form form-horizontal' id='simpanform', enctype='multipart/form-data'")?>
			  
			  <div class="form-group">
			  <label class="control-label col-sm-2" for="name">Nama</label>
			  <div class="col-sm-10">
			  <input type="text" class="form-control" id="name" name="name" required>
			  </div>
			  </div>

			  <div class="form-group">
			  <label class="control-label col-sm-2" for="primarySkill">Primary Skill</label>
			  <div class="col-sm-10">
			  <input type="text" class="form-control" id="primarySkill" name="primarySkill" required>
			  </div>
			  </div>

			  <div class="form-group">
			  <label class="control-label col-sm-2" for="phone">Phone</label>
			  <div class="col-sm-10">
			  <input type="text" class="form-control" id="phone" name="phone" required>
			  </div>
			  </div>

			  <div class="form-group">
			  <label class="control-label col-sm-2" for="email">Email</label>
			  <div class="col-sm-10">
			  <input type="text" class="form-control" id="email" name="email" required>
			  </div>
			  </div>

			  <div class="form-group">
			  <label class="control-label col-sm-2" for="facebook">Facebook Link</label>
			  <div class="col-sm-10">
			  <input type="text" class="form-control" id="facebook" name="facebook" required>
			  </div>
			  </div>

			  <div class="form-group">
			  <label class="control-label col-sm-2" for="twitter">Twitter Link</label>
			  <div class="col-sm-10">
			  <input type="text" class="form-control" id="twitter" name="twitter" required>
			  </div>
			  </div>

			  <div class="form-group">
			  <label class="control-label col-sm-2" for="linkedin">LinkedIn</label>
			  <div class="col-sm-10">
			  <input type="text" class="form-control" id="linkedin" name="linkedin" required>
			  </div>
			  </div>

			  <div class="form-group">
			  <label class="control-label col-sm-2" for="youtube">Youtube Link Chanel</label>
			  <div class="col-sm-10">
			  <input type="text" class="form-control" id="youtube" name="youtube" required>
			  </div>
			  </div>

			  <div class="form-group">
			  <label class="control-label col-sm-2" for="description">Deskripsi</label>
			  <div class="col-sm-10">
			  <input type="text" class="form-control" id="description" name="description" required>
			  </div>
			  </div>

			  <div class="form-group">
			  <label class="control-label col-sm-2" for="status">Status</label>
			  <div class="col-sm-10">
				<select name="status" id="status" class="form-control">
					<option value="1">Aktif</option>
					<option value="0">Tidak Aktif</option>
				</select>
			  </div>
			  </div>

			  <div class="form-group">
			  <label class="control-label col-sm-2" for="urlSlider">File</label>
			  <div class="col-sm-10">
			  <input type="file" id="urlSlider" name="urlSlider" data-toggle="tooltip" title="foto ideal 800 x 800 pixel" required>
			  </div>
			  </div>

			  
			  <div class="form-group">        
			  <div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-default" id="simpan" name="simpan"  required>Simpan</button>
			  </div>
			  </div>
			  </form>
		  </div>
		  <div id="menu3" class="tab-pane fade">
		  <h3>Data</h3>

		  <div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
							<table id="dataemployee" class="table table-hover">
							<thead>
							<tr>
							<th>No.</th>
							<th>Aksi</th>
							<th>Id</th>
							<th>Nama</th>
							<th>Deskripsi</th>
							<th>Primary Skill</th>
							<th>phone</th>
							<th>email</th>
							<th style="display:none">facebook</th>
							<th style="display:none">twitter</th>
							<th style="display:none">linkedin</th>
							<th style="display:none">youtube</th>
							<th>status</th>
							<th>foto</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$i = 1;
							foreach ($datateacher as $de)
							{
								if ($de['status'] == 1) {
									$statusstr = 'Aktif';
								} else {
									$statusstr = 'Tidak Aktif';
								}
								echo "<tr>";
								echo "<td style='background-color:rgba(136, 135, 135, 0.32);'>".$i."</td>";
								echo "<td><i id_teacher=".$de['id_teacher']." id='edit".$de['id_teacher']."' name='edit".$de['id_teacher']."' statusTeacher='".$de['status']."' class='btn btn-warning btn-sm fa fa-edit editModal' title='Edit' data-toggle='modal' data-target='#modaledit'></i></td>";
								echo "<td>".$de['id_teacher']."</td>";
								echo "<td>".$de['name']."</td>";
								echo "<td>".$de['description']."</td>";
								echo "<td>".$de['main_material']."</td>";
								echo "<td>".$de['telepon']."</td>";
								echo "<td>".$de['email']."</td>";
								echo "<td style='display:none'>".$de['facebook']."</td>";
								echo "<td style='display:none'>".$de['twitter']."</td>";
								echo "<td style='display:none'>".$de['linkedin']."</td>";
								echo "<td style='display:none'>".$de['youtube']."</td>";
								echo "<td>".$statusstr."</td>";
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
			</div>
			<!-- /Row -->
			  
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
		  var name = currentRow.find("td:eq(3)").text();
		  var id = $(this).attr('id_teacher');
		  var description  = currentRow.find("td:eq(4)").text();
		  var mainMaterial  = currentRow.find("td:eq(5)").text();
		  var telepon  = currentRow.find("td:eq(6)").text();
		  var email  = currentRow.find("td:eq(7)").text();
		  var facebook  = currentRow.find("td:eq(8)").text();
		  var twitter  = currentRow.find("td:eq(9)").text();
		  var linkedin  = currentRow.find("td:eq(10)").text();
		  var youtube  = currentRow.find("td:eq(11)").text();
		  var status = $(this).attr('statusTeacher');
		  $('#name').val(name);
		  $('#description').val(description);
		  $('#primarySkill').val(mainMaterial);
		  $('#phone').val(telepon);
		  $('#email').val(email);
		  $('#facebook').val(facebook);
		  $('#twitter').val(twitter);
		  $('#linkedin').val(linkedin);
		  $('#youtube').val(youtube);
		  $('#status').val(status);
		  $('#simpan').html('Edit');
		  $('#tabform').attr('class','active');
		  $('#tabform2').attr('class','');
		  $('#menu2').attr('class','tab-pane fade in active');
		  $('#menu3').attr('class','tab-pane fade in');
		  $('#simpanform').attr('action','<?php echo base_url()?>/backend/teacher/simpan/'+id);
	  });
  });
</script>
