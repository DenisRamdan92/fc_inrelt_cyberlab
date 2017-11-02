<style>
/* Style the Image Used to Trigger the Modal */
.myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

.myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 999999; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption { 
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}

</style>
<div class="page-title parallax parallax4"> 
        	<div class="overlay"></div>            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">OUR GALLERY</h2>
                        </div><!-- /.page-title-heading -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Gallery</li>
                            </ul>                   
                        </div><!-- /.breadcrumbs --> 
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /page-title parallax -->

        <section class="flat-row pad-top-96 pad-bottom-100">
    	    <div class="container">
    			<ul class="portfolio-filter">
    	            <li class="active"><a data-filter="*" href="#">ALL</a></li>
    	            <li class=""><a data-filter=".a" href="#">A</a></li>
    	            <li class=""><a data-filter=".b" href="#">B</a></li>
    	            <li class=""><a data-filter=".c" href="#">C</a></li>
    	        </ul>
    	    	
    	    	<div class="row teacher">

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
    	        </div><!-- / .row -->

    	        <form method="post">
					<div class="blog-pagination">
						<ul class="flat-pagination">
							<?php echo $links; ?>                              
						</ul><!-- /.flat-pagination -->
					</div>
            	</form>
    	    </div><!-- / .container -->
        </section>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>

<script>


$(document).ready(function(){
    $(document).on('click','#myImg',function(){
       var src = $(this).attr('src')
       var alt = $(this).attr('alt')
       $('#myModal').css('display','block');
       $('#img01').attr('src',src);
       $('#caption').html(alt);
    });

    $(document).on('click','.close',function(){
        $('#myModal').css('display','none');
    });
});
</script>