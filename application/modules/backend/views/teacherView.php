<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
				
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <table id="table_pegawai" class="table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th width="230px">Action</th>
                                    <th width="50px">No</th>
                                    <th width="50px">ID</th>
                                    <th width="150px">Nama</th>
                                    <th width="150px">Username</th>
                                    <th width="150px">Tempat lahir</th>
                                    <th width="150px">Tanggal lahir</th>
                                    <th width="150px">Negara</th>
                                    <th width="50px">Jenis Kelamin</th>
                                    <th width="150px">Alamat</th>
                                    <th width="150px">Pendidikan Terakhir</th>
                                    <th width="150px">Tertarik Pada</th>
                                    <th width="150px">Telepon</th>
                                    <th width="150px">Email</th>
                                    <th width="150px">Tanggal Pembuatan</th>

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

<div class="modal fade" id="modal-default">
<div class="modal-dialog">
  <div class="modal-content">
	<div class="modal-header">
	  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span></button>
	  <h4 class="modal-title"><span id="judul">Tambah Data</span> <small>Image slide</small></h4>
	</div>
	<div class="modal-body">
  <form action="<?php echo base_url('admin/galeri/slide/save_galeri');?>" method="POST" id="uploadform">
	  <input type="hidden" id="id_slide" name="id">
	<input type="hidden" id="img_name" name="img_name">
	   <input type="hidden" id="is_edit" name="is_edit">
	   <div class="row">
		  <div class="col-md-12">
		  Caption
			<!-- Custom Tabs -->
			<div class="nav-tabs-custom">
			  <ul class="nav nav-tabs">
				<li class="active"><a href="#tab_1" data-toggle="tab">Indonesia</a></li>
				<li><a href="#tab_2" data-toggle="tab">Inggris</a></li>
			  </ul>
			  <div class="tab-content">
				<div class="tab-pane active" id="tab_1">
				  <textarea size="50" name="konten_id" type="text" id="konten_id" placeholder="" class="form-control" required></textarea>
				</div>
				<!-- /.tab-pane -->
				<div class="tab-pane" id="tab_2">
				  <textarea size="50" name="konten_en" type="text" id="konten_en" placeholder="" class="form-control" required></textarea>
				</div>
				<!-- /.tab-pane -->
			  </div>
			  <!-- /.tab-content -->
			</div>
			<!-- nav-tabs-custom -->
		  </div>
		  <!-- /.col -->
		</div>
		   <div class="form-group">
			  <div class="row">
		<div class="col-sm-12">
		  Image file: <span id="image_file"></span><br>
		  <input type="file" name="image" class="form-control" />
		</div>
		</div>
	  </div>
	</div>
	<div class="modal-footer">
	  <button id="close" type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
	  <input id="simpan" type="submit" class="btn btn-primary" value="Simpan">
	</div>
  </form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<button id="add_hidden" style="display:none" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalAddJabatan" data-backdrop="static">
		  Click
</button>
<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
		$(document).ready(function(){
		

		var employee = $('#table_pegawai').DataTable({ 
		scrollX: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo base_url('backend/student/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });

	// $("#add_pegawai").click(function(){
	// 	$("#title_pegawai").text('Tambah pegawai');
	// 	$("#loading").hide();
	// 	$("#frm").trigger('reset');
	// 	$("#add_hidden").click();
	// });

	$("#simpan").click(function(){

		if($.trim($("#nama").val()).length<1){
			alert('Nama pegawai harus diisi!');
			return false;
		}

		var judul = $.trim($("#title_pegawai").text());
		if(judul=='Tambah pegawai'){
		$.ajax({
			type:"POST",
			error: function(){
				alert('Error!');
			},
			data:"jns="+$("#jns").val()+"&agama="+$("#agama").val()+"&nama="+$.trim($("#nama").val())+"&nip="+$.trim($("#nip").val())+"&nokktp="+$.trim($("#nokktp").val())+"&tmp="+$.trim($("#tmp").val())+"&tgl="+$.trim($("#tgl").val())+"&al="+$.trim($("#al").val())+"&tel="+$.trim($("#tel").val())+"&em="+$.trim($("#em").val())+"&stat="+$.trim($("#stat").val())+"&id_unit="+$.trim($("#idunit").val())+"&edu="+$.trim($("#edu").val()),
			url:"<?php echo base_url();?>backend/employee/insert",
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

		}else if(judul=='Edit Siswa'){

			var id = $.trim($("#id_employee").val());
			var nj = $.trim($("#nj").val());
			$.ajax({
			type:"POST",
			error: function(){
				alert('Error!');
			},
			beforeSend: function(){
				$("#loading").show();
			},
			data:"name_student="+$.trim($("#nama").val())+"&id_siswa="+$.trim($("#id_siswa").val())+"&username="+$.trim($("#username").val())+"&jns="+$.trim($("#jns").val())+"&tmp="+$.trim($("#tmp").val())+"&tgl="+$.trim($("#tgl").val())+"&negara="+$.trim($("#negara").val())+"&alamat="+$.trim($("#al").val())+"&edu="+$.trim($("#edu").val())+"&tel="+$.trim($("#tel").val())+"&em="+$.trim($("#em").val())+"&tertarikpada="+$.trim($("#tertarikpada").val()),
			url:"<?php echo base_url();?>backend/student/update",
			success: function(){
				$("#loading").hide();
				$("#close").click();
				employee.ajax.reload();
			}
			});

		}

	});
	
	$(document).on("click","#delete_btn",function(){
		var id = $.trim($(this).attr("id_student"));
		var nj = $.trim($(this).attr("name_student"));
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
			data:"id_student="+id+"&name_Student="+nj,
			url:"<?php echo base_url();?>backend/student/delete",
			success: function(){
				$("#loading").show();
				employee.ajax.reload();
			}
			});

		}else{

		}
	});

	$(document).on("click","#edit_btn",function(){
		var gender = $.trim($(this).attr("jns"));
		var id = $.trim($(this).attr("noid"));
		var name_student = $.trim($(this).attr("name_student"));
		var place_of_birth = $.trim($(this).attr("place_of_birth"));
		var date_of_birth = $.trim($(this).attr("date_of_birth"));
		var address = $.trim($(this).attr("address"));
		var telp = $.trim($(this).attr("telp"));
		var em = $.trim($(this).attr("email"));
		var public_username = $.trim($(this).attr("public_username"));
		var country = $.trim($(this).attr("country"));
		var gender = $.trim($(this).attr("gender"));
		var last_edu = $.trim($(this).attr("last_edu"));
        var edu = $.trim($(this).attr("last_edu"));
		var jns = $.trim($(this).attr("jns"));
		var insteresting_to = $.trim($(this).attr("insteresting_to"));
		
		/*
		data:"id_employee="+id+"&nama="+$.trim($("#nama").val())+"&idjab="+$.trim($("#idjab").val())+"&iddept="+$.trim($("#iddept").val())+"&nip="+$.trim($("#nip").val())+"&nokktp="+$.trim($("#nokktp").val())+"&tmp="+$.trim($("#tmp").val())+"&tgl="+$.trim($("#tgl").val())+"&al="+$.trim($("#al").val())+"&tel="+$.trim($("#tel").val())+"&em="+$.trim($("#em").val())+"&stat="+$.trim($("#stat").val()),
		*/

		$("#title_pegawai").text('Edit Siswa');
		$("#id_siswa").val(id);
		$("#nama").val(name_student);
		$("#username").val(public_username);
		$("#jns").val(jns).change();
		$("#tmp").val(place_of_birth);
		$("#tgl").val(date_of_birth);
		$("#negara").val(country);
		$("#al").val(address);
		$("#edu").val(edu);
        $("#tel").val(telp);
        $("#em").val(em);
        $("#tertarikpada").val(insteresting_to);
		$("#add_hidden").click();
	});


});
	</script>

