<link href="<?php echo base_url();?>assets/backend/vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>

<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                        <table id="table_user" class="table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th width="20px">No</th>
									<th width="150px">Aksi</th>
                                    <th width="150px">Blog</th>
                                    <th width="100px">Konten Komen</th>
                                    <th width="90px">Pengirim</th>
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
<script type="text/javascript">
	$(document).ready(function(){
		$.fn.modal.Constructor.prototype.enforceFocus = function() {};
		
		var pengguna = $('#table_user').DataTable({ 
        	"processing": true, //Feature control the processing indicator.
        	"serverSide": true, //Feature control DataTables' server-side processing mode.
        	"order": [], //Initial no order.
 
        	// Load data for the table's content from an Ajax source
        	"ajax": {
            	"url": "<?php echo base_url()?>backend/blog/ajax_listComment",
            	"type": "POST"
        	},
 
	        //Set column definition initialisation properties.
    	    "columnDefs": [
        		{ 
            		"targets": [ 0,1,2,3,4], //first column / numbering column
            		"orderable": false, //set not orderable
        		},
       	 	],
 
	    });

        $(document).on("click","#delete_btn",function(){
			var id_comment = $.trim($(this).attr("id_comment"));
			var c = confirm("Yakin hapus data ini?");

			if(c){
				$.ajax({
					type:"POST",
					error: function(){
						alert('Error!');
					},
					data:"id_comment="+id_comment,
					url:"<?php echo base_url();?>backend/blog/deleteComment",
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


	});
</script>

