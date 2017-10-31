<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>

<!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label mb-10" for="exampleInputuname_1">title</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="title_about" placeholder="title about">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10" for="exampleInputpwd_1">Content</label>
                            <div class="input-group">
                                <textarea name="content" class="form-control" id="content" id="" cols="100" rows="100"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label mb-10" for="exampleInputpwd_1">Url Video</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="url_video" placeholder="https://www.youtube.com/embed/HndV87XpkWg">
                            </div>
                        </div>
                        <iframe width="100%" id="framevideo" height="500" src="" frameborder="0" allowfullscreen></iframe>
                        <button type="button" id="simpan" class="btn btn-success mr-10 col-md-12"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                </div>	
            </div>	
        </div>	
    </div>	
</div>
<!-- /Row -->

<script src="<?php echo base_url()?>assets/backend/vendors/ckeditor/ckeditor.js"></script>
<script type="text/javascript">

	function ajax_list(){
		$.ajax({
			url:"<?php echo base_url();?>backend/about/data_list",
            cache: false,
	        dataType: "json",
            success:function(data) {
            	$('#title_about').val(data[0].title);
                CKEDITOR.instances['content'].setData(data[0].content);
            	$('#url_video').val(data[0].url_video);
                $('#framevideo').attr('src',data[0].url_video);
            }
        });
	}

	$(document).ready(function(){

        CKEDITOR.replace('content');
		
		ajax_list();

        

	    $(document).on("click","#simpan",function(){
            var content = CKEDITOR.instances['content'].getData();
			$.ajax({
				type:"POST",
				error: function(){
					alert('Error!');
				},
				data:"title_about="+$("#title_about").val()+"&content="+content+"&url_video="+$.trim($("#url_video").val()),
				url:"<?php echo base_url();?>backend/about/update",
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