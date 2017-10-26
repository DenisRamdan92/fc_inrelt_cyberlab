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
                                    <th width="100%">Aksi</th>
                                    <th width="100%">Nama</th>
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
        <h4 class="modal-title" id="myModalLabel"><span id="title_pegawai">Tambah Tag</span></h4>
      </div>
      <div class="modal-body">
		<form id="frm">

        <div class="row">
		<div class="col-md-12">
		<br>
		Title Tag :
		</div>
		</div>
		<div class="row">
		<div class="col-md-12">
		<input type="text" class="form-control" id="title_tag">
		<input type="hidden" class="form-control" id="id_tag">
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
            "url": "<?php echo base_url('backend/tags/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0,1], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });

	$("#add_pegawai").click(function(){
		$("#title_pegawai").text('Tambah Tag');
		$("#loading").hide();
		$("#frm").trigger('reset');
		$("#add_hidden").click();
	});

	$("#simpan").click(function(){

		if($.trim($("#title_tag").val()).length<1){
			alert('Nama tag harus diisi!');
			return false;
		}

		var judul = $.trim($("#title_pegawai").text());
		if(judul=='Tambah Tag'){
		$.ajax({
			type:"POST",
			error: function(){
				alert('Error!');
			},
			data:"title_tag="+$.trim($("#title_tag").val()),
			url:"<?php echo base_url();?>backend/tags/insert",
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

		}else if(judul=='Edit Tag'){

			var id = $.trim($("#id_tag").val());
			var title = $.trim($("#title_tag").val());
			$.ajax({
			type:"POST",
			error: function(){
				alert('Error!');
			},
			beforeSend: function(){
				$("#loading").show();
			},
			data:"title_tag="+title+"&id_tag="+id,
			url:"<?php echo base_url();?>backend/tags/update",
			success: function(){
				$("#loading").hide();
				$("#close").click();
				employee.ajax.reload();
			}
			});

		}

	});
	
	$(document).on("click","#delete_btn",function(){
		var id = $.trim($(this).attr("id_tag"));
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
			data:"id_tag="+id,
			url:"<?php echo base_url();?>backend/tags/delete",
			success: function(){
				$("#loading").show();
				employee.ajax.reload();
			}
			});

		}else{

		}
	});

	$(document).on("click","#edit_btn",function(){
		var id = $.trim($(this).attr("id_tag"));
		var title = $.trim($(this).attr("title_tag"));

		$("#title_pegawai").text('Edit Tag');
		$("#id_tag").val(id);
		$("#title_tag").val(title);
		$("#add_hidden").click();
	});


});
	</script>

