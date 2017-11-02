<link href="<?php echo base_url();?>assets/backend/vendors/bower_components/select2/dist/css/select2.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/bower_components/select2/dist/js/select2.full.js"></script>

<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-heading">
                <div class="pull-left">
                    <h6 class="panel-title txt-dark"><button type="button" id="add_pengguna" class="btn btn-success">[ + ] tambah</button></h6>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <table id="table_user" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th width="20px">No</th>
                                    <th width="150px">id</th>
                                    <th width="150px">Guru</th>
                                    <th width="100px">Kursus</th>
                                    <th width="50px">Materi</th>
                                    <th width="230px">Penjelasan</th>
                                    <th width="230px">Harga</th>
									<th width="230px">foto</th>
                                    <th width="230px">Aksi</th>
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
<!-- Modal -->
<div class="modal fade" id="modalPengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-lg" role="document" style="width:100%">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="title_pengguna"> Tambah Kursus</h5>
			</div>
			<div class="modal-body">
				<form id="frm" data-toggle="validator" role="form">
					<input type="hidden" name="id_courses" id="id_courses">
                    <div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Judul Kursus </label>
						<input type="text" class="form-control"  name="title_courses" id="title_courses" required="">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Guru </label>
						<select class="form-control"  name="id_teacher" id="id_teacher" required="">
							<option value="" ></option>
						</select>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Materi </label>
						<select class="form-control"  name="id_material" id="id_material" required="">
							<option value=""></option>
						</select>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Penjelasan </label>
						<input type="text" class="form-control"  name="content_courses" id="content_courses" required="">
					</div>
                    <div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Harga </label>
						<input type="text" class="form-control"  name="price" id="price" required="">
					</div>
				</form>
			</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-success" id="simpan">Simpan</button>
				</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="title_pengguna"> Tambah Foto</h5>
			</div>
			<div class="modal-body">
				
				<?php echo form_open('backend/courses/updateFoto', "method='post', class='form form-horizontal' id='simpanform', enctype='multipart/form-data'")?>
					<div class="form-group">
						<label class="control-label col-sm-2" for="fileFOto">File</label>
						<div class="col-sm-10">
							<input type="file" class="form-control" id="urlSlider" name="urlSlider" data-toggle="tooltip" title="foto ideal 800 x 800 pixel" required>
						</div>
					</div>
					<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default form-control" id="simpanfoto" name="simpanfoto"  required>Simpan</button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="pelajaranModel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Pelajaran</h4>
      </div>
      <div class="modal-body" id="pelajaranModalBody">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
    </div>

  </div>
</div>

<script src="<?php echo base_url()?>assets/backend/vendors/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$.fn.modal.Constructor.prototype.enforceFocus = function() {};
            CKEDITOR.replace('content_courses');
		var pengguna = $('#table_user').DataTable({ 
        	"processing": true, //Feature control the processing indicator.
        	"serverSide": true, //Feature control DataTables' server-side processing mode.
        	"order": [], //Initial no order.
 
        	// Load data for the table's content from an Ajax source
        	"ajax": {
            	"url": "<?php echo base_url()?>backend/courses/ajax_list",
            	"type": "POST"
        	},
 
	        //Set column definition initialisation properties.
    	    "columnDefs": [
        		{ 
            		"targets": [ 0,1,2,3,4,5,6,7], //first column / numbering column
            		"orderable": false, //set not orderable
        		},
       	 	],
 
	    });

        $(document).on("click","#add_pengguna",function(){
            $('#modalPengguna').modal('show');
            $("#title_pengguna").text('Tambah Kursus');
			$("#frm").trigger('reset');
			$("#select2-id_material-container").text("");
			$("#select2-id_lesson-container").text("");
			CKEDITOR.instances['content_courses'].setData('');
			$("#content_curses").val('');
			$("#price").val('');
	    });

        $(document).on("click","#edit_pengguna",function(){
			var currentRow = $(this).closest("tr");
            var id_material = currentRow.find("td:eq(4)").text();
            var id_teacher =currentRow.find("td:eq(2)").text();
            var content_courses = $.trim($(this).attr("content_courses"));
            var price = $.trim($(this).attr("price"));
            var title_courses = $.trim($(this).attr("title_courses"));
            var id_courses = $.trim($(this).attr("id_courses"));

			$("#select2-id_material-container").text(id_material);
			$("#select2-id_teacher-container").text(id_teacher);
			CKEDITOR.instances['content_courses'].setData(content_courses);
            $("#price").val(price);
            $("#title_courses").val(title_courses);
            $("#id_courses").val(id_courses);
            

            $('#modalPengguna').modal('show');
            $("#title_pengguna").text('Edit Kursus');

	    });

		$(document).on("click","#edit_pengguna_foto",function(){
            var id_courses = $.trim($(this).attr("id_courses"));

			$('#simpanform').attr('action','<?php echo base_url()?>backend/courses/updateFoto/'+id_courses);
            $('#modalfoto').modal('show');

	    });
		
	    

	    $(document).on("click","#simpan",function(){
			var judul = $.trim($("#title_pengguna").text());
			if (judul ==  "Tambah Kursus") {
				$.ajax({
					type:"POST",
					error: function(){
						alert('Error!');
					},
					data:"title_courses="+$.trim($("#title_courses").val())+"&id_lesson="+$.trim($("#id_lesson").val())+"&id_material="+$.trim($("#id_material").val())+"&content_courses="+CKEDITOR.instances['content_courses'].getData()+"&price="+$.trim($("#price").val())+"&id_teacher="+$.trim($('#id_teacher').val()),
					url:"<?php echo base_url();?>backend/courses/insert",
					dataType:"json",
					beforeSend: function(){
					$("#loading").show();
					},
					success: function(data){
						if(data.error=='1'){
							alert(data.message);
							$("#loading").hide();
						}else{
							pengguna.ajax.reload();
							$("#close").click();
							$("#loading").hide();
						}
					}
				});
			}

			else if (judul ==  "Edit Kursus") {
				$.ajax({
					type:"POST",
					error: function(){
						alert('Error!');
					},
					data:"id_courses="+$.trim($("#id_courses").val())+"&title_courses="+$.trim($("#title_courses").val())+"&id_lesson="+$.trim($("#id_lesson").val())+"&id_material="+$.trim($("#id_material").val())+"&content_courses="+CKEDITOR.instances['content_courses'].getData()+"&price="+$.trim($("#price").val())+"&id_teacher="+$.trim($('#id_teacher').val()),
					url:"<?php echo base_url();?>backend/courses/update",
					dataType:"json",
					beforeSend: function(){
					$("#loading").show();
					},
					success: function(data){
						if(data.error=='1'){
							alert(data.message);
							$("#loading").hide();
						}else{
							pengguna.ajax.reload();
							$("#close").click();
							$("#loading").hide();
						}
					}
				});
			}
	    });

        $(document).on("click","#delete_pengguna",function(){
			var id_courses = $.trim($(this).attr("id_courses"));
			var c = confirm("Yakin hapus data ini?");

			if(c){
				$.ajax({
					type:"POST",
					error: function(){
						alert('Error!');
					},
					data:"id_courses="+id_courses,
					url:"<?php echo base_url();?>backend/courses/delete",
					dataType:"json",
					beforeSend: function(){
					$("#loading").show();
					},
					success: function(data){
						if(data.error=='1'){
							alert(data.message);
							$("#loading").hide();
						}else{
							pengguna.ajax.reload();
							$("#close").click();
							$("#loading").hide();
						}
					}
				});
			}
		});
		$(document).on("click","#tambahPelajaranButton",function(){
			$('#tambahpelajaranModal').modal('show');
		});

		$("#id_material").select2({
		    minimumInputLength: 3,
		    minimumResultsForSearch: 10,
		    ajax: {
				cache: true,
		        url: "<?php echo base_url();?>backend/courses/material_list",
		        dataType: "json",
		        type: "GET",
		        data: function (params) {

		            var queryParameters = {
		                term: params.term
		            }
		            return queryParameters;
		        },
		        processResults: function (data) {
		            return {
		                results: $.map(data, function (item) {
		                    return {
		                        text: item.itemName,
		                        id: item.id
		                    }
		                })
		            };
		        }
		    }
		});
		$("#id_teacher").select2({
		    minimumInputLength: 3,
		    minimumResultsForSearch: 10,
		    ajax: {
				cache: true,
		        url: "<?php echo base_url();?>backend/courses/teacher_list",
		        dataType: "json",
		        type: "GET",
		        data: function (params) {

		            var queryParameters = {
		                term: params.term
		            }
		            return queryParameters;
		        },
		        processResults: function (data) {
		            return {
		                results: $.map(data, function (item) {
		                    return {
		                        text: item.itemName,
		                        id: item.id
		                    }
		                })
		            };
		        }
		    }
		});
		$(document).on("click","#pelajaranCourses",function(){
			var id_courses = $.trim($(this).attr("id_courses"));
			$('#pelajaranModalBody').load('<?php echo base_url()?>/backend/courses/pelajaran/'+id_courses);
			$('#pelajaranModel').modal('show');
		});
		$(document).on("click",".hapusPelajaranModal",function(){
			var id_courses = $.trim($(this).attr("id_courses"));
			var id_lesson = $.trim($(this).attr("id_lesson"));
			var c = confirm("Yakin hapus data ini?");

			if(c){
				$.ajax({
					type:"POST",
					error: function(){
						alert('Error!');
					},
					data:"id_courses="+id_courses+"&id_lesson="+id_lesson,
					url:"<?php echo base_url();?>backend/courses/deletePelajaran",
					dataType:"json",
					beforeSend: function(){
					$("#loading").show();
					},
					success: function(data){
						if(data.error=='1'){
							alert(data.message);
							$("#loading").hide();
						}else{
							pengguna.ajax.reload();
							$("#close").click();
							$("#loading").hide();
						}
					}
				});
			}
			window.location = window.location.href;
		});
	});
</script>

