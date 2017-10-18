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
                                    <th width="150px">Nama</th>
                                    <th width="100px">Username</th>
                                    <th width="90px">Group Pengguna</th>
                                    <th width="50px">Status</th>
                                    <th width="230px">Action</th>
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
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h5 class="modal-title" id="title_pengguna"> </h5>
			</div>
			<div class="modal-body">
				<form id="frm" data-toggle="validator" role="form">
					<input type="hidden" name="id_user" id="id_user">
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Pegawai </label>
						<select class="form-control"  name="pegawai" id="id_pegawai" required="">
							<option value="" ></option>
						</select>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Group Pengguna </label>
						<select class="form-control"  name="group" id="id_group" required="">
							<option value=""></option>
						</select>
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Username </label>
						<input type="text" class="form-control"  name="username" id="username" required="">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Password </label>
						<input type="password" class="form-control"  name="password" id="password" required="">
					</div>
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Status </label>
						<select class="form-control"  name="status" id="status" required="">
							<option value=""></option>
							<option value="1">Aktif</option>
							<option value="2">Tidak Aktif</option>
						</select>
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

<script type="text/javascript">
	$(document).ready(function(){
		$.fn.modal.Constructor.prototype.enforceFocus = function() {};
		
		var pengguna = $('#table_user').DataTable({ 
        	"processing": true, //Feature control the processing indicator.
        	"serverSide": true, //Feature control DataTables' server-side processing mode.
        	"order": [], //Initial no order.
 
        	// Load data for the table's content from an Ajax source
        	"ajax": {
            	"url": "<?php echo base_url()?>backend/user/ajax_list",
            	"type": "POST"
        	},
 
	        //Set column definition initialisation properties.
    	    "columnDefs": [
        		{ 
            		"targets": [ 0,1,2,3,4,5], //first column / numbering column
            		"orderable": false, //set not orderable
        		},
       	 	],
 
	    });

        $(document).on("click","#edit_pengguna",function(){
            var id_employee = $.trim($(this).attr("id_employee"));
            var id_user = $.trim($(this).attr("id_user"));
            var nama = $.trim($(this).attr("nama"));
            var id_group = $.trim($(this).attr("id_group"));
            var group_name = $.trim($(this).attr("group_name"));
            var username = $.trim($(this).attr("username"));
            var password = $.trim($(this).attr("password"));
            var status = $.trim($(this).attr("status"));

            $("#id_pegawai").val(id_employee);
			$("#select2-id_pegawai-container").text(nama);
            $("#id_group").val(id_group);
			$("#select2-id_group-container").text(group_name);

            $("#username").val(username);
            $("#password").val('');
            $("#id_user").val(id_user);
            $("#status").val(status).change();
            

            $('#modalPengguna').modal('show');
            $("#title_pengguna").text('Edit Pengguna');

	    });
		
	    $(document).on("click","#add_pengguna",function(){
            $('#modalPengguna').modal('show');
            $("#title_pengguna").text('Tambah Pengguna');
			$("#frm").trigger('reset');
			$("#id_pegawai").text('');
			$("#id_group").text('');
	    });

	    $(document).on("click","#simpan",function(){
			var judul = $.trim($("#title_pengguna").text());
			if (judul ==  "Tambah Pengguna") {
				$.ajax({
					type:"POST",
					error: function(){
						alert('Error!');
					},
					data:"id_employee="+$.trim($("#id_pegawai").val())+"&id_group="+$.trim($("#id_group").val())+"&username="+$.trim($("#username").val())+"&password="+$.trim($("#password").val())+"&password="+$.trim($("#password").val())+"&status="+$.trim($("#status").val()),
					url:"<?php echo base_url();?>backend/user/insert",
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

			else if (judul ==  "Edit Pengguna") {
				$.ajax({
					type:"POST",
					error: function(){
						alert('Error!');
					},
					data:"id_employee="+$.trim($("#id_pegawai").val())+"&id_group="+$.trim($("#id_group").val())+"&username="+$.trim($("#username").val())+"&password="+$.trim($("#password").val())+"&password="+$.trim($("#password").val())+"&id_user="+$.trim($("#id_user").val())+"&status="+$.trim($("#status").val()),
					url:"<?php echo base_url();?>backend/user/update",
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
			var id_user = $.trim($(this).attr("id_user"));
			var c = confirm("Yakin hapus data ini?");

			if(c){
				$.ajax({
					type:"POST",
					error: function(){
						alert('Error!');
					},
					data:"id_user="+id_user,
					url:"<?php echo base_url();?>backend/user/delete",
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

		$("#id_pegawai").select2({
		    minimumInputLength: 3,
		    minimumResultsForSearch: 10,
		    ajax: {
				cache: true,
		        url: "<?php echo base_url();?>backend/user/pegawai",
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

		$("#id_group").select2({
		    minimumInputLength: 3,
		    minimumResultsForSearch: 10,
		    ajax: {
				cache: true,
		        url: "<?php echo base_url();?>backend/user/group",
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

