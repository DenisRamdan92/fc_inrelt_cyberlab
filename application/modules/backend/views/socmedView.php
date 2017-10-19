<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Row -->
<div class="row">
    
        <div class="col-md-12">
			<div class="form-group">
				<label class="control-label mb-10" for="exampleInputuname_1">LinkedIn</label>
				<div class="input-group">
					<div class="input-group-addon" style="color: #61F36B; background-color: white"><i class="fa fa-linkedin"></i></div>
					<input type="text" class="form-control" id="linkedin" placeholder="linkedin">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label mb-10" for="exampleInputEmail_1">Twitter</label>
				<div class="input-group">
					<div class="input-group-addon" style="color: #459ED1; background-color: white"><i class="fa fa-twitter"></i></div>
					<input type="text" class="form-control" id="twitter" placeholder="twitter">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label mb-10" for="exampleInputpwd_1">Facebook</label>
				<div class="input-group">
					<div class="input-group-addon"  style="color: #405AF6; background-color: white"><i class="fa fa-facebook"></i></div>
					<input type="text" class="form-control" id="facebook" placeholder="url facebook">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label mb-10" for="exampleInputpwd_1">Google Plus</label>
				<div class="input-group">
					<div class="input-group-addon" style="color: #D64040; background-color: white"><i class="fa fa-google-plus"></i></div>
					<input type="text" class="form-control" id="google_plus" placeholder="google Plus">
				</div>
			</div>
			<button type="button" id="simpan" class="btn btn-success mr-10 col-md-12"><span class="fa fa-save"></span> Simpan</button>
	    </div>
</div>
<!-- /Row -->

<script type="text/javascript">

	function ajax_list(){
		$.ajax({
			url:"<?php echo base_url();?>backend/socmed/data_list",
            cache: false,
	        dataType: "json",
            success:function(data) {
            	$('#linkedin').val(data[0].linkedin);
            	$('#twitter').val(data[0].twitter);
            	$('#facebook').val(data[0].facebook);
            	$('#google_plus').val(data[0].google_plus);
            }
        });
	}

	$(document).ready(function(){
		
		ajax_list();

	    $(document).on("click","#simpan",function(){
			$.ajax({
				type:"POST",
				error: function(){
					alert('Error!');
				},
				data:"linkedin="+$.trim($("#linkedin").val())+"&twitter="+$.trim($("#twitter").val())+"&facebook="+$.trim($("#facebook").val())+"&google_plus="+$.trim($("#google_plus").val())+"&instagram="+$.trim($("#instagram").val()),
				url:"<?php echo base_url();?>backend/socmed/update",
				dataType:"json",
				beforeSend: function(){
				$("#loading").show();
				},
				success: function(data){
					if(data.error=='1'){
						alert(data.message);
						$("#loading").hide();
					}else{
						alert('Data Berhasil Disimpan.');
						$("#loading").hide();
					}
				}
			});
	    });

	});
</script>