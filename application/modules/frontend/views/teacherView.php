<div class="page-title parallax parallax4"> 
        	<div class="overlay"></div>            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">OUR TEACHERS</h2>
                        </div><!-- /.page-title-heading -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Courses Grid</li>
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
    	            <li class=""><a data-filter=".d" href="#">D</a></li>
    	            <li class=""><a data-filter=".e" href="#">E</a></li>
    	            <li class=""><a data-filter=".f" href="#">F</a></li>
    	            <li class=""><a data-filter=".i" href="#">I</a></li>
    	            <li class=""><a data-filter=".j" href="#">J</a></li>
    	            <li class=""><a data-filter=".k" href="#">K</a></li>
    	            <li class=""><a data-filter=".l" href="#">L</a></li>
    	            <li class=""><a data-filter=".m" href="#">M</a></li>
    	            <li class=""><a data-filter=".n" href="#">N</a></li>
    	            <li class=""><a data-filter=".o" href="#">O</a></li>
    	            <li class=""><a data-filter=".p" href="#">P</a></li>
    	            <li class=""><a data-filter=".q" href="#">Q</a></li>
    	            <li class=""><a data-filter=".r" href="#">R</a></li>
    	            <li class=""><a data-filter=".s" href="#">S</a></li>
    	            <li class=""><a data-filter=".t" href="#">T</a></li>
    	            <li class=""><a data-filter=".u" href="#">U</a></li>
    	            <li class=""><a data-filter=".v" href="#">V</a></li>
    	            <li class=""><a data-filter=".w" href="#">W</a></li>
    	            <li class=""><a data-filter=".x" href="#">X</a></li>
    	            <li class=""><a data-filter=".y" href="#">Y</a></li>
    	            <li class=""><a data-filter=".z" href="#">Z</a></li>
    	        </ul>
    	    	
    	    	<div class="row teacher">

    		        <div class="flat-teacher-team-isotope button-right">
    		       		
						<?php
							foreach($results as $r):
						?>

    		            <div class="flat-teacher r col-md-3 col-sm-6 flat-hover-zoom">
    		                <div class="entry-image">
    		                    <img src="<?php echo $r->url_foto;?>"/>
    		                </div>
    		                <div class="content">                               
    		                    <h4 class="name"><?php echo $r->name;?></h4>
    		                    <ul class="flat-socials">
    		                        <li class="facebook">
    		                            <a href="<?php echo $r->facebook;?>"><i class="fa fa-facebook"></i></a>
    		                        </li>
    		                        <li class="twitter">
    		                            <a href="<?php echo $r->twitter;?>"><i class="fa fa-twitter"></i></a>
    		                        </li>
    		                        <li class="linkedin">
    		                            <a href="<?php echo $r->linkedin;?>"><i class="fa fa-linkedin"></i></a>
    		                        </li>
    		                        <li class="youtube">
    		                            <a href="<?php echo $r->youtube;?>"><i class="fa fa-youtube-play"></i></a>
    		                        </li>
    		                    </ul>
    		                    <ul class="flat-information">
    		                        <li class="position">
    		                            <a href="#" title="position"> <?php echo $r->main_material;?>&nbsp;&nbsp;&nbsp;&nbsp;</a>
    		                        </li>
    		                        <li class="phone">
    		                            <a href="+61383766284" title="Phone number"> <?php echo $r->telepon;?>&nbsp;&nbsp;&nbsp;&nbsp;</a>
    		                        </li>
    		                        <li class="email">
    		                            <a href="mailto:AlitStudios@gmail.com" title="Email address"> <?php echo $r->email;?>&nbsp;&nbsp;&nbsp;&nbsp;</a>
    		                        </li>
    		                    </ul>

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
