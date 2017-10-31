	
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
			  <label class="control-label col-sm-2" for="description">Deskripsi</label>
			  <div class="col-sm-10">
			  <input type="text" class="form-control" id="description" name="description" required>
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
							<th>foto</th>
							</tr>
							</thead>
							<tbody>
							<?php 
							$i = 1;
							foreach ($datateacher as $de)
							{
							echo "<tr>";
							echo "<td style='background-color:rgba(136, 135, 135, 0.32);'>".$i."</td>";
							echo "<td><i id_teacher=".$de['id_teacher']." id='edit".$de['id_teacher']."' name='edit".$de['id_teacher']."' class='btn btn-warning btn-sm fa fa-edit editModal' title='Edit' data-toggle='modal' data-target='#modaledit'></i></td>";
							echo "<td>".$de['id_teacher']."</td>";
							echo "<td>".$de['name']."</td>";
							echo "<td>".$de['description']."</td>";
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
	  $(document).on('click','.editModal',function(){
			var currentRow = $(this).closest("tr");
		  var name = currentRow.find("td:eq(3)").text();
		  var id = $(this).attr('id_teacher');
		  var description  = currentRow.find("td:eq(4)").text();
		  
		  $('#name').val(name);
		  $('#description').val(description);
		  $('#simpan').html('Edit');
		  $('#tabform').attr('class','active');
		  $('#tabform2').attr('class','');
		  $('#menu2').attr('class','tab-pane fade in active');
		  $('#menu3').attr('class','tab-pane fade in');
		  $('#simpanform').attr('action','<?php echo base_url()?>/backend/teacher/simpan/'+id);
	  });
  });
</script>
