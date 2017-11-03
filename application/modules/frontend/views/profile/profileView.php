<div class="page-title parallax parallax4"> 
<div class="overlay"></div>            
<div class="container">
    <div class="row">
        <div class="col-md-12">                    
            <div class="page-title-heading">
                <h2 class="title"><?php echo $this->session->userdata('name');?></h2>
            </div><!-- /.page-title-heading -->
            <div class="breadcrumbs">
                <p><b>Welcome to your profile</b></p>                   
            </div><!-- /.breadcrumbs --> 
        </div><!-- /.col-md-12 -->  
    </div><!-- /.row -->  
</div><!-- /.container -->                      
</div><!-- /page-title parallax -->

<section class="main-content blog-posts blog-grid have-sidebar">
<div class="container">
    <div class="blog-title">
        <h1 class="bold">PROFILE</h1>
    </div>

    <div class="post-content">
        
        <div class="post-wrap clearfix">
                <div class="content-post">

                    <h2 class="title-post">
                        <span class="fa fa-map-marker"></span> <a href="#">Place of birth : <?php echo $student['place_of_birth']?></a>
                    </h2>

                </div>
                <hr>
                <div class="content-post">

                    <h2 class="title-post">
                        <span class="fa fa-calendar"></span> <a href="#">Date of birth : <?php echo $student['date_of_birth']?></a>
                    </h2>

                </div>
                <hr>
                <div class="content-post">

                    <h2 class="title-post">
                        <span class="fa fa-map-marker"></span> <a href="#">Address : <?php echo $student['address']?></a>
                    </h2>

                </div>
                <hr>
                <div class="content-post">

                    <h2 class="title-post">
                        <span class="fa fa-globe"></span> <a href="#">Country : <?php echo $student['country']?></a>
                    </h2>

                </div>
                <hr>
                <div class="content-post">

                    <h2 class="title-post">
                        <span class="fa fa-phone"></span> <a href="#">Phone : <?php echo $student['telp']?></a>
                    </h2>

                </div>
                <hr>
                <div class="content-post">

                    <h2 class="title-post">
                        <span class="fa fa-envelope"></span> <a href="#">Email : <?php echo $student['email']?></a>
                    </h2>

                </div><!-- /content-post -->
                <hr>
                <div class="content-post">

                    <h2 class="title-post">
                        <span class="fa fa-user"></span> <a href="#">Gender : <?php echo $student['gender']?></a>
                    </h2>

                </div>
                <hr>
                <div class="content-post">

                    <h2 class="title-post">
                        <span class="fa fa-calendar"></span> <a href="#">Create Date : <?php echo $student['create_date']?></a>
                    </h2>

                </div><!-- /content-post -->
                <hr>
                <div class="content-post">

                    <h2 class="title-post">
                        <span class="fa fa-graduation-cap"></span> <a href="#">Last Edu : <?php echo $student['last_edu']?></a>
                    </h2>

                </div>
                <hr>
                <div class="content-post">

                    <h2 class="title-post">
                        <span class="fa fa-star"></span> <a href="#">Insteresting To : <?php echo $student['insteresting_to']?></a>
                    </h2>

                </div>
                <hr>
                <div class="content-post">

                    <h2 class="title-post">
                        <span class="fa fa-star-o"></span> <a href="#">Testimonials : <?php echo $student['testimonials']?></a>
                    </h2>

                </div>
                <hr>
                <div class="content-post">

                    <h2 class="title-post">
                        <span class="fa fa-wechat"></span> <a href="#">Sugestion : <?php echo $student['sugestion']?></a>
                    </h2>

                </div><!-- /content-post -->
        
        </div><!-- /post-wrap -->
          
    </div>

        <div class="sidebar">
            <div class="widget widget-popular-news">
                <h5 class="widget-title"><?php echo $student['name']?> detail profile</h5>
                <ul class="popular-news clearfix">
                    <li>
                            <img src="<?php echo $student['url_foto']?>" class="img-thumbnail" alt="image">
                        <div class="text">
                            <a href="#"> Name : <?php echo $student['name']?></a>
                            <br><br>
                            <p><span class="fa fa-map-marker"></span> Address : <?php echo $student['address']?></p>
                            <p><span class="fa fa-check"></span> Insteresting to : <?php echo $student['insteresting_to']?></p>
                            <p><span class="fa fa-envelope"></span> Email : <?php echo $student['email']?></p>
                            <p><span class="fa fa-phone"></span> Phone : <?php echo $student['telp']?></p>
                        </div>
                    </li>
                </ul><!-- /popular-news clearfix -->
            </div><!-- /widget widget-popular-news -->
        </div><!-- /sidebar -->
    </div><!-- /row -->
</section>