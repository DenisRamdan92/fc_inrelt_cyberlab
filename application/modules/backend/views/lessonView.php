<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Main Content -->
				<!-- Row -->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default card-view">
							<div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark"><button type="button" id="add_pegawai" class="btn btn-success">[ + ] tambah</button></h6>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<table id="table_pegawai" class="table table-hover table-bordered">
											<thead>
												<tr>
													<th width="200px">Action</th>
													<th width="50px">No</th>
													<th width="50px">id</th>
													<th width="100px">Judul Pelajaran</th>
													<th width="100px">penjelasan</th>
													<th width="100px">Lama Waktu</th>
													<th width="100px">Level</th>
													<th width="200px">Url Video</th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>	
								</div>	
							</div>	
						</div>	
					</div>	
				</div>
				<!-- /Row -->

<div class="modal fade" id="myModalAddJabatan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button id="close_modal_ad" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><span id="title_pegawai">Tambah Pelajaran</span></h4>
      </div>
      <div class="modal-body">
		<form id="frm">

        <div class="row">
		<div class="col-md-12">
		<br>
		Pelajaran :
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<input type="text" class="form-control" id="title_lesson">
		<input type="hidden" class="form-control" id="id_lesson">
		</div>
		</div>
		
		<div class="row">
		<div class="col-md-12">
		<br>
		Penjelasan:
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<textarea name="content_lesson" id="content_lesson" cols="30" rows="10"></textarea>
		</div>
		</div>
		
        <div class="row">
		<div class="col-md-12">
		<br>
		Lama Waktu:
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<input type="text" class="form-control" id="leng_time" placeholder="5 jam">
		</div>
		</div>

        <div class="row">
		<div class="col-md-12">
		<br>
		Level Kesulitan:
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<select id="leveling" name="leveling" class="form-control">
			<option value="easy">Easy</option>
			<option value="medium">Medium</option>
			<option value="hard">Hard</option>
			<option value="expert">Expert</option>
			<option value="pro">Pro</option>
		</select>
		</div>
		</div>

        <div class="row">
		<div class="col-md-12">
		<br>
		Url Video:
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<input type="text" class="form-control" id="url_video">
		</div>
		</div>
        
      </div>
      <div class="modal-footer">
		<div class="row">
		<div class="col-md-5" style="float:left">
		<span id="loading" style="display:none">
		loading ...
		</span>
		</div>
		<div class="col-md-3" style="float:right">
		<span id="print_d">
        <button type="button" class="btn btn-primary" id="simpan">Simpan</button>
		</span>
		</div>
		<div class="col-md-2" style="float:right">
        <button id="close" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
		</form>
		</div>
      </div>
    </div>
  </div>
</div>

<button id="add_hidden" style="display:none" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalAddJabatan" data-backdrop="static">
		  Click
</button>


<div id="videoView" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Video Viewer</h4>
      </div>
      <div class="modal-body">
		<iframe id="videoframe" width="100%" height="500" src="" frameborder="0" allowfullscreen></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script src="<?php echo base_url()?>assets/backend/vendors/ckeditor/ckeditor.js"></script>			
<script>
	$(document).ready(function(){
		
		CKEDITOR.replace('content_lesson');
		var employee = $('#table_pegawai').DataTable({ 
		scrollX: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('backend/courses/ajax_listLesson')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [0,1,2,3,4,5,6,7], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });

	$("#add_pegawai").click(function(){
		$("#title_pegawai").text('Tambah Pelajaran');
		$("#loading").hide();
		$("#frm").trigger('reset');
		$("#add_hidden").click();
	});

	$(document).on('click','#lihat_btn',function(){
		var url = $(this).attr("url_video");
		$("#videoframe").attr('src',url);
	});
	$("#simpan").click(function(){

		if($.trim($("#title_lesson").val()).length<1){
			alert('Pelajaran harus diisi!');
			return false;
		}
		;
		if(CKEDITOR.instances['content_lesson'].getData().length<1){
			alert('Penjelasan harus diisi!');
			return false;
		}

		var judul = $.trim($("#title_pegawai").text());
		if(judul=='Tambah Pelajaran'){
		$.ajax({
			type:"POST",
			error: function(){
				alert('Error!');
			},
			data:"title_lesson="+$("#title_lesson").val()+"&content_lesson="+CKEDITOR.instances['content_lesson'].getData()+"&leng_time="+$("#leng_time").val()+"&url_video="+$("#url_video").val()+"&leveling="+$("#leveling").val(),
			url:"<?php echo base_url();?>backend/courses/insertLesson",
			dataType:"json",
			beforeSend: function(){
				$("#loading").show();
			},
			success: function(data){
				if(data.error=='1'){
					alert(data.message);
					$("#loading").hide();
					}else{
						employee.ajax.reload();
						$("#close").click();
						$("#nj").val('');
						$("#loading").hide();
					}
			}
			});

		}else if(judul=='Edit Pelajaran'){

			var id = $.trim($("#id_lesson").val());
			$.ajax({
			type:"POST",
			error: function(){
				alert('Error!');
			},
			beforeSend: function(){
				$("#loading").show();
			},
			data:"id_leason="+$('#id_leason').val()+"&title_lesson="+$("#title_lesson").val()+"&content_lesson="+CKEDITOR.instances['content_lesson'].getData()+"&leng_time="+$("#leng_time").val()+"&url_video="+$("#url_video").val()+"&leveling="+$("#leveling").val()+"&id_lesson="+$('#id_lesson').val(),
			url:"<?php echo base_url();?>backend/courses/updateLesson",
			success: function(){
				$("#loading").hide();
				$("#close").click();
				employee.ajax.reload();
			}
			});

		}

	});
	
	$(document).on("click","#delete_btn",function(){
		var id = $.trim($(this).attr("id_lesson"));
		var c = confirm("Yakin hapus file ini?");

		if(c){

			$.ajax({
			type:"POST",
			error: function(){
				alert('Error!');
			},
			beforeSend: function(){
				$("#loading").show();
			},
			data:"id_lesson="+id,
			url:"<?php echo base_url();?>backend/courses/deleteLesson",
			success: function(){
				$("#loading").show();
				employee.ajax.reload();
			}
			});

		}else{

		}
	});

	$(document).on("click","#edit_btn",function(){
		var id_lesson = $.trim($(this).attr("id_lesson"));
		var title_lesson = $.trim($(this).attr("title_lesson"));
		var content_lesson = $(this).attr("content_lesson");
		var leng_time = $(this).attr("leng_time");
		var leveling = $(this).attr("leveling");
		var url_video = $(this).attr("url_video");
		
		/*
		data:"id_employee="+id+"&nama="+$.trim($("#nama").val())+"&idjab="+$.trim($("#idjab").val())+"&iddept="+$.trim($("#iddept").val())+"&nip="+$.trim($("#nip").val())+"&nokktp="+$.trim($("#nokktp").val())+"&tmp="+$.trim($("#tmp").val())+"&tgl="+$.trim($("#tgl").val())+"&al="+$.trim($("#al").val())+"&tel="+$.trim($("#tel").val())+"&em="+$.trim($("#em").val())+"&stat="+$.trim($("#stat").val()),
		*/

		$("#title_pegawai").text('Edit Pelajaran');
		$("#id_lesson").val(id_lesson);
		CKEDITOR.instances['content_lesson'].setData(content_lesson);
		$("#title_lesson").val(title_lesson);
		$("#leng_time").val(leng_time);
		$("#levelinng").val(leveling);
		$("#url_video").val(url_video);		
		$("#add_hidden").click();
	});


});
	</script>