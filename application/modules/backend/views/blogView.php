	

<div class="row">
	<div class="col-md-12">
		<section class="dashboard-counts no-padding-bottom">
			<div class="container-fluid">
			<div class="row bg-white has-shadow">
				<ul class="nav nav-tabs">
					<li id="tabform" class="active"><a data-toggle="tab" href="#menu2">Form Input</a></li>
					<li id="tabform2"><a data-toggle="tab" href="#menu3">Data</a></li>
					<li id="tabform3"><a data-toggle="tab" href="#menu4">Tag</a></li>
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
					<?php echo form_open('backend/blog/simpan','method="post"  class="form-horizontal col-md-12 " id="formBlog" enctype="multipart/form-data"')?>
					<div class="form-group">
						<input type="text" class="form-control" id="title_blog" name="title_blog" placeholder="Enter Judul" required>
					</div>
					<div class="form-group">
						<select class="form-control" id="id_tag" name="id_tag" required>
							<option value=""></option>
							<?php foreach ($datatag as $dk) { ?>
							<option value="<?php echo $dk['id_tag']?>"><?php echo $dk['title_tag']?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">         
						<textarea  rows="12" cols="12" class="form-control" id="content_blog" name="content_blog" placeholder="Enter Deskripsi" required></textarea>
					</div>
					<div class="form-group">
							<input type="file" id="urlSlider" name="urlSlider" data-toggle="tooltip" title="foto ideal 900 x 400 pixel" required>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default" id="simpan" required>Simpan</button>
					</div>
					</form>
					</div>
					<div id="menu3" class="tab-pane fade">
					<h3>Data</h3>
						<div class="row">
							
						<table id="dataBlog" class="table table-hover" width="100%">
								<thead>
								<tr>
								<th>No.</th>
								<th>Aksi</th>
								<th>Foto</th>
								<th>Judul</th>
								<th>Tanggal</th>
								<th>Konten</th>
								<th>tag</th>
								<th>User</th>
								</tr>
								</thead>
								<tbody>
								<?php 
								$i = 1;
								foreach ($datablog as $db)
								{
								$url = $db['img_url'];
								echo "<tr>";
								echo "<td style='background-color:rgba(136, 135, 135, 0.32);'>".$i."</td>";
								echo "<td>"."<button class='btn btn-primary btn-xs' id='editDataBlog' idBlog='".$db['id_blog']."'>Edit</button>";
								echo anchor('backend/blog/hapus/'.$db['id_blog'],"<i class='btn btn-danger btn-xs' id='hapus' name='hapus' title='Hapus'><span class='fa fa-trash'></span> Hapus</i></td>");
								echo "<td>"."<img src='$url' width='200px' style='border:1px solid'>"."</td>";
								echo "<td>".$db['title_blog']."</td>";
								echo "<td>".$db['date_blog']."</td>";
								echo "<td>".$db['content_blog']."</td>";
								echo "<td>".$db['id_tag']."</td>";
								echo "<td>".$db['id_user']."</td>";
								echo "</tr>";
								$i++;
								}
								?>     
								</tbody>
								</table>
						</div>    
					</div>
					<div id="menu4" class="tab-pane fade">
					<h3>Tag</h3>						
					<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-default card-view">
									<div class="panel-wrapper collapse in">
										<div class="panel-body">
										<div class="row">
														<div class="col-md-6">
															<?php echo form_open('backend/blog/insertTag', "method='post', class='form form-horizontal', id='formKategori'")?>
															<div class="form-group">
															<label class="control-label col-sm-2" for="tag">Tag</label>
															<div class="col-sm-10">
																<input type="text" class="form-control" id="title_tag" name="title_tag" placeholder="insert kategori" required>
																<input type="hidden" class="form-control" id="id_tag" name="id_tag">
															</div>
															</div>
															<div class="form-group">        
															<div class="col-sm-offset-2 col-sm-10">
																<button type="submit" class="btn btn-default" id="simpanj" name="simpanj" >Simpan</button>
															</div>
															</div>
															</form>
														</div>
														<div class="col-md-6">
														<table id="dataKategori" class="table table-hover">
														<thead>
														<tr>
														<th>No.</th>
														<th style='display:none'>id tag</th>
														<th>Tag</th>
														<th>Aksi</th>
														</tr>
														</thead>
														<tbody>
														<?php 
														$i = 1;
														foreach ($datatag as $dk)
														{
														echo "<tr>";
														echo "<td style='background-color:rgba(136, 135, 135, 0.32);'>".$i."</td>";
														echo "<td id_jabatan='".$dk['id_tag']."' style='display:none'>".$dk['id_tag']."</td>";
														echo "<td>".$dk['title_tag']."</td>";
														echo "<td><i id='editj' name='editj' idtag='".$dk['id_tag']."' class='btn btn-warning btn-sm fa fa-edit editj'></i>";
														echo anchor('backend/blog/deleteTag/'.$dk['id_tag'],"<i class='btn btn-danger btn-xs' id='hapusk' name='hapusk' title='Hapus Kategori'><span class='fa fa-trash'></span> Hapus</i></td>");
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
							</div>	
						</div>
						<!-- /Row -->
				</div>
			</div>
			</div>
			</section>
	</div>
</div>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>assets/backend/vendors/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
        CKEDITOR.replace('content_blog');
      $('#dataBlog').DataTable();

    $(document).on('click','#editDataBlog',function(){
        var currentRow = $(this).closest("tr");
        var id = $(this).attr('idBlog');
        var title = currentRow.find("td:eq(3)").text();
        var content = currentRow.find("td:eq(5)").text();
        var id_tag = currentRow.find("td:eq(6)").text();
        $('#title_blog').val(title);
		$('#id_tag').val(id_tag);
        CKEDITOR.instances['content_blog'].setData(content);
        $('#simpan').html('Edit');
        $('#tabform').attr('class','active');
        $('#tabform2').attr('class','');
        $('#menu2').attr('class','tab-pane fade in active');
        $('#menu3').attr('class','tab-pane fade in');
        $('#formBlog').attr('action','<?php echo base_url()?>/backend/blog/simpan/'+id);

    });
    $(document).on('click','#editj',function(){
        var currentRow = $(this).closest("tr");
        var title = currentRow.find("td:eq(2)").text();
		var id = $(this).attr('idtag');
        $('#title_tag').val(title);
        $('#simpanj').html('Edit');
        $('#formKategori').attr('action','<?php echo base_url()?>/backend/blog/insertTag/'+id);

    });
  });
</script>
