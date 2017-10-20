<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
<section class="dashboard-counts no-padding-bottom">
<div class="container-fluid">
  <div class="row bg-white has-shadow">
      <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#menu2">Data</a></li>
          <li><a data-toggle="tab" href="#menu3">Logo</a></li>
          <li><a data-toggle="tab" href="#menu4">Maps</a></li>
      </ul>
              
      <div class="tab-content">
          <div id="menu2" class="tab-pane fade in active">
          <h3>data</h3>
          <?php echo form_open('backend/info/updateData','method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"')?>
            <div class="form-group">
              <label class="control-label col-md-1 col-sm-3 col-xs-12">Title Web</label>
              <div class="col-md-11 col-sm-9 col-xs-12">
                <input type="text" class="form-control" id="title_web" name="title_web">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-1 col-sm-3 col-xs-12">Alamat</label>
              <div class="col-md-11 col-sm-9 col-xs-12">
                <input type="text" class="form-control" id="address" name="address">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-1 col-sm-3 col-xs-12">Phone</label>
              <div class="col-md-11 col-sm-9 col-xs-12">
                <input type="text" class="form-control" id="phone" name="phone">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-1 col-sm-3 col-xs-12">Fax</label>
              <div class="col-md-11 col-sm-9 col-xs-12">
                <input type="text" class="form-control" id="fax" name="fax">
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-1 col-sm-3 col-xs-12">Email</label>
              <div class="col-md-11 col-sm-9 col-xs-12">
                <input type="text" class="form-control" id="email" name="email">
              </div>
            </div>
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-11 col-sm-9 col-xs-12 col-md-offset-1">
                <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
              </div>
            </div>
            </form>
          </div>
          <div id="menu3" class="tab-pane fade">
          <h3>Logo</h3>
          <?php echo form_open('backend/info/updateLogo','method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"')?>
          <div class="form-group">
            <label class="control-label col-md-1 col-sm-3 col-xs-12">Logo</label>
            <div class="col-md-11 col-sm-9 col-xs-12">
              <input type="file" id="urlSlider" name="urlSlider" alt="Logo" data-toggle="tooltip" title="foto ideal 180 x 131 pixel" required>
              <br>
					    <img src="" id="logoImage" width="300px" style="border: 1px solid">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-11 col-sm-9 col-xs-12 col-md-offset-1">
              <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
            </div>
          </div>
          </form>
         </div>
         <div id="menu4" class="tab-pane fade">
          <h3>Maps</h3>
          <?php echo form_open('backend/info/updateMaps','method="post" class="form-horizontal form-label-left" enctype="multipart/form-data"')?>
          <div class="form-group">
            <label class="control-label col-md-1 col-sm-3 col-xs-12">Maps Url</label>
            <div class="col-md-11 col-sm-9 col-xs-12">
            <input type="text" class="form-control" id="map" name="map" required>
          </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-11 col-sm-9 col-xs-12 col-md-offset-1">
              <button type="submit" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
            </div>
          </div>
          </form>
          <iframe align="top" frameborder="0" height="500" scrolling="no" src="" width="100%" id="mapframe"></iframe>
      </div>
  </div>
</div>
</section>

<script type="text/javascript">

	function ajax_list(){
		$.ajax({
			url:"<?php echo base_url();?>backend/info/data_list",
            cache: false,
	        dataType: "json",
            success:function(data) {
            	$('#title_web').val(data[0].title_web);
            	$('#address').val(data[0].addreess);
            	$('#phone').val(data[0].phone);
            	$('#fax').val(data[0].fax);
                $('#email').val(data[0].email);
                $('#map').val(data[0].maps_url);
            	$('#mapframe').attr('src',data[0].maps_url);
                $('#logoImage').attr('src',data[0].logo_url);
            }
        });
	}

	$(document).ready(function(){
		
		ajax_list();

	});
</script>