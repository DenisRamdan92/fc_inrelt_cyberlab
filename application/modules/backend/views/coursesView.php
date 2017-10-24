<link href="<?php echo base_url();?>assets/backend/vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>

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
                        <table id="table_user" class="table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th width="20px">No</th>
                                    <th width="150px">id</th>
                                    <th width="100px">Kursus</th>
                                    <th width="90px">Pelajaran</th>
                                    <th width="50px">Materi</th>
                                    <th width="230px">Penjelasan</th>
                                    <th width="230px">Harga</th>
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
						<label for="recipient-name" class="control-label mb-10">Pelajaran </label>
						<select class="form-control"  name="id_lesson" id="id_lesson" required="">
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
            var id_lesson =currentRow.find("td:eq(3)").text();
            var content_courses = $.trim($(this).attr("content_courses"));
            var price = $.trim($(this).attr("price"));
            var title_courses = $.trim($(this).attr("title_courses"));
            var id_courses = $.trim($(this).attr("id_courses"));

			$("#select2-id_material-container").text(id_material);
			$("#select2-id_lesson-container").text(id_lesson);
			CKEDITOR.instances['content_courses'].setData(content_courses);
            $("#price").val(price);
            $("#title_courses").val(title_courses);
            $("#id_courses").val(id_courses);
            

            $('#modalPengguna').modal('show');
            $("#title_pengguna").text('Edit Kursus');

	    });
		
	    

	    $(document).on("click","#simpan",function(){
			var judul = $.trim($("#title_pengguna").text());
			if (judul ==  "Tambah Kursus") {
				$.ajax({
					type:"POST",
					error: function(){
						alert('Error!');
					},
					data:"title_courses="+$.trim($("#title_courses").val())+"&id_lesson="+$.trim($("#id_lesson").val())+"&id_material="+$.trim($("#id_material").val())+"&content_courses="+CKEDITOR.instances['content_courses'].getData()+"&price="+$.trim($("#price").val()),
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
					data:"id_courses="+$.trim($("#id_courses").val())+"&title_courses="+$.trim($("#title_courses").val())+"&id_lesson="+$.trim($("#id_lesson").val())+"&id_material="+$.trim($("#id_material").val())+"&content_courses="+CKEDITOR.instances['content_courses'].getData()+"&price="+$.trim($("#price").val()),
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

		$("#id_lesson").select2({
		    minimumInputLength: 3,
		    minimumResultsForSearch: 10,
		    ajax: {
				cache: true,
		        url: "<?php echo base_url();?>backend/courses/lesson_list",
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

	});
</script>

