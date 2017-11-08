<div class="flat-teacher-team-isotope button-right">
    		       		
	<?php
		foreach($results as $r):
	?>

	<div class="flat-teacher r col-md-3 col-sm-6 flat-hover-zoom">
		<div class="entry-image">
			<img id="myImg" alt="<?php echo $r->nama_image;?>" src="<?php echo $r->url_image;?>"/>
		</div>
		<div class="content">                               
			<h4 class="name text-center"><?php echo $r->nama_image;?></h4>
			<p class="text-center"><?php echo $r->deskripsi_galeri;?></p>
		</div>
	</div>

	<?php endforeach;?>

</div><!-- /.flat-teacher-team -->