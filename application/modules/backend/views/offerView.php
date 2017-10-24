	
<section class="dashboard-counts no-padding-bottom">
  <div class="container-fluid">
    <div class="row bg-white has-shadow">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#menu2">Form Input</a></li>
            <li><a data-toggle="tab" href="#menu3">Data</a></li>
        </ul>
                <?php if ($this->session->flashdata('msg_error')) { ?>
                    <div class="alert margin-bottom-30">
                        <button type="button" class="close" data-dismiss="alert">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Hilangkan</span>
                        </button>
                        <strong>Perhatian !</strong>   <?php echo $this->session->flashdata('msg_error'); ?> 
                    </div>
                <?php } ?>
        <div class="tab-content">
            <div id="menu2" class="tab-pane fade in active">
            <h3>Form Input</h3>
                <?php echo form_open('backend/offer/simpan', "method='post', class='form form-horizontal' id='simpanform', enctype='multipart/form-data'")?>
                <div class="form-group">
                <label class="control-label col-sm-2" for="title">Tema</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" required>
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="content">Konten</label>
                <div class="col-sm-10">
                <textarea name="content" id="content" cols="30" rows="10"></textarea>
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="fileFOto">File</label>
                <div class="col-sm-10">
                <input type="file" id="urlSlider" name="urlSlider" data-toggle="tooltip" title="foto ideal 800 x 800 pixel" required>
                </div>
                </div>
                <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" id="simpan" name="simpan"  required>Simpan</button>
                </div>
                </div>
                </form>
            </div>
            <div id="menu3" class="tab-pane fade">
            <h3>Data</h3>

                <div class="row">
                    <?php foreach ($dataOffer as $dg) { ?>
                        <div class="col-lg-4 col-md-12 col-sm-6 col-xs-12">
                            <div class="panel panel-default card-view">
                                <div class="panel-heading">
                                    <div class="pull-left">
                                        <h6 class="panel-title txt-dark"><?php echo strtoupper($dg['title'])?></h6>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-wrapper collapse in">
                                    <div class="panel-body">
                                        <div class="sm-graph-box">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                <img src="<?php echo $dg['url_foto']?>" width="100%" style="border:1px solid">   
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="counter-wrap text-left">
                                                        <hr>
                                                        <p><?php echo substr($dg['content'],0,200)?> . . .</p>
                                                    </div>	
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-group">
                                    <?php echo anchor('backend/offer/delete/'.$dg['id_offer'],'<span class="fa fa-trash"></span>','class="btn btn-danger btn-xs" title="Hapus"')?>
                                    <button id="editOffer" class="btn btn-warning btn-xs" title="edit" idoffer="<?php echo $dg['id_offer']?>" titleOffer="<?php echo $dg['title']?>" content="<?php echo $dg['content']?>"><span class="fa fa-edit"></span></button>
                                    <button id="detailOffer" class="btn btn-info btn-xs" urlFoto="<?php echo $dg['url_foto']?>" title="Detail" idoffer="<?php echo $dg['id_offer']?>" titleOffer="<?php echo $dg['title']?>" content="<?php echo $dg['content']?>" data-toggle="modal" data-target="#detailModal"><span class="fa fa-eye"></span></button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>  
           </div>
        </div>
    </div>
  </div>
  
</section>


<div id="detailModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="detailTitle"></h4>
      </div>
      <div class="modal-body" id="detailBody">
        <img id="detailImg" src="" width="100%" style="border:1px solid">
        <hr>
        <p id="detailContent"></p>
        <hr>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script src="<?php echo base_url()?>assets/backend/vendors/ckeditor/ckeditor.js"></script>
 <!-- jQuery -->
 <script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
 <script type="text/javascript">
	$(document).ready(function(){
        CKEDITOR.replace('content');
        $(document).on('click','#edit',function(){
            var id = $(this).attr('editGallery');
            $('#tema').val(id);
        });
        $(document).on('click','#editOffer',function(){
        var id = $(this).attr('idoffer');
        var title = $(this).attr('titleOffer');
        var content = $(this).attr('content');
        $('#title').val(title);
        CKEDITOR.instances['content'].setData(content);
        $('#simpanform').attr('action','<?php echo base_url()?>backend/offer/simpan/'+id);
        });

        $(document).on('click','#detailOffer',function(){
        var foto = $(this).attr('urlFoto');
        var title = $(this).attr('titleOffer');
        var content = $(this).attr('content');

        $('#detailTitle').html(title);
        $('#detailImg').attr('src',foto);
        $('#detailContent').html(content);
        });
	});
</script>
