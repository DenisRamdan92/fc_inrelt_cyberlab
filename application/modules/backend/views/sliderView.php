<?php echo form_open('backend/slider/simpan', "method='post', class='form form-horizontal' id='simpanform', enctype='multipart/form-data'")?>
<div class="form-group">
<label class="control-label col-sm-2" for="tema">Tema</label>
<div class="col-sm-10">
  <input type="text" class="form-control" id="tema" name="tema" data-toggle="tooltip" title="Di sarankan kurang dari 50 karakter" required>
</div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="deskripsi">Deskripsi</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="deskripsi" name="deskripsi" data-toggle="tooltip" title="Di sarankan kurang dari 100 karakter" required>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="fileFOto">File</label>
  <div class="col-sm-10">
    <input type="file" id="urlSlider" name="urlSlider" data-toggle="tooltip" title="foto ideal 1424 x 772 pixel" required>
  </div>
</div>
<div class="form-group">
  <label class="control-label col-sm-2" for="urutanSlider">Urutan Slider</label>
  <div class="col-sm-10">
    <select name="urutanSlider" id="urutanSlider" class="form-control" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
  </div>
</div>
<div class="form-group">        
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-default" id="simpan" name="simpan"  required>Simpan</button>
  </div>
</div>
</form>
<hr>
<div class="row">
<?php foreach ($dataSlider as $ds) { ?>
    <h3><?php echo $ds['title']?></h3>
    <img src="<?php echo $ds['url_slider']?>" width="100%" height="300px;" style="border:1px solid;">
    <p  style="background:#e6e6e6"><?php echo $ds['content']?></p>
    <hr>
<?php }?>
</div>
