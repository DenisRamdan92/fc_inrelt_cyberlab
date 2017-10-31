	
<section class="dashboard-counts no-padding-bottom">
  <div class="container-fluid">
    <div class="row bg-white has-shadow">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#menu2">Form Input</a></li>
            <li><a data-toggle="tab" href="#menu3">Data</a></li>
            <li><a data-toggle="tab" href="#menu4">Kategori</a></li>
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
                <?php echo form_open('backend/gallery/simpan', "method='post', class='form form-horizontal' id='simpanform', enctype='multipart/form-data'")?>
                <div class="form-group">
                <label class="control-label col-sm-2" for="tema">Tema</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="tema" name="tema" required>
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="kategoriList">Kategori</label>
                <div class="col-sm-10">
                <select name="kategoriList" id="kategoriList" class="form-control" required>
                    <option value=""></option>
                    <?php foreach ($datakategori as $dk) { ?>

                        <option value="<?php echo $dk['id_galeri_kategori']?>"><?php echo $dk['kategori']?></option>

                    <?php } ?>
                </select>
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
            
            <?php foreach ($dataGaleri as $dg) { ?>
                <div class="col-lg-4 col-md-12 col-sm-6 col-xs-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark"><?php echo strtoupper($dg['nama_image'])?></h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="sm-graph-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                        <img src="<?php echo $dg['url_image']?>" width="100%" style="border:1px solid">   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group">
                        <?php echo anchor('backend/gallery/hapus/'.$dg['id_gallery'],"<i class='btn btn-danger btn-xs' id='hapus' name='hapus' title='Hapus'><span class='fa fa-trash'></span> Hapus</i>")?>
                        </div>
                    </div>
                </div>
            <?php } ?>
                
           </div>
           <div id="menu4" class="tab-pane fade">
            <h3>Kategori</h3>

                <!-- Row -->
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-default card-view">
            <div class="panel-wrapper collapse in">
                <div class="panel-body">
                    <div class="table-wrap">
                    <div class="col-md-6">
                        <?php echo form_open('backend/gallery/kategori', "method='post', class='form form-horizontal', id='formKategori'")?>
                        <div class="form-group">
                        <label class="control-label col-sm-2" for="kategorij">Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kategorij" name="kategorij" placeholder="insert kategori" required>
                            <input type="hidden" class="form-control" id="idKategorij" name="idKategorij">
                        </div>
                        </div>
                        <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default" id="simpanj" name="simpanj" >Simpan</button>
                        </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                    <table id="dataKategori" class="table table-hover">
                    <thead>
                    <tr>
                    <th>No.</th>
                    <th style='display:none'>id Kategori</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i = 1;
                    foreach ($datakategori as $dk)
                    {
                    echo "<tr>";
                    echo "<td style='background-color:rgba(136, 135, 135, 0.32);'>".$i."</td>";
                    echo "<td id_jabatan='".$dk['id_galeri_kategori']."' style='display:none'>".$dk['id_galeri_kategori']."</td>";
                    echo "<td>".$dk['kategori']."</td>";
                    echo "<td><i id='editj' name='editj' class='btn btn-warning btn-sm fa fa-edit editj' idEdit='".$dk['id_galeri_kategori']."'></i>";
                    echo anchor('backend/gallery/hapuskategori/'.$dk['id_galeri_kategori'],"<i class='btn btn-danger btn-xs' id='hapusk' name='hapusk' title='Hapus Kategori'><span class='fa fa-trash'></span> Hapus</i></td>");
                    echo "</tr>";
                    $i++;
                    }
                    ?>     
                    </tbody>
                    </table>
                    </div>
                    </div>	
                </div>	
            </div>	
        </div>	
    </div>	
</div>
<!-- /Row -->
           </div>
        </div>
    </div>
  </div>
  
</section>
    
 <!-- jQuery -->
 <script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
 <script type="text/javascript">
	$(document).ready(function(){
        $(document).on('click','#edit',function(){
            var id = $(this).attr('editGallery');
            $('#tema').val(id);
        });
        $(document).on('click','#editj',function(){
        var currentRow = $(this).closest("tr");
        var id = $(this).attr('idEdit');
        var kategori = currentRow.find("td:eq(2)").text();
        $('#kategorij').val(kategori);
        $('#simpanj').html('Edit');
        $('#formKategori').attr('action','<?php echo base_url()?>backend/gallery/EditKategori/'+id);
        });
	});
</script>
