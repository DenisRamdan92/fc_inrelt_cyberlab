<div class="page-title parallax parallax4"> 
<div class="overlay"></div>            
<div class="container">
    <div class="row">
        <div class="col-md-12">                    
            <div class="page-title-heading">
                <h2 class="title">Blog</h2>
            </div><!-- /.page-title-heading -->
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Blog</li>
                </ul>                   
            </div><!-- /.breadcrumbs --> 
        </div><!-- /.col-md-12 -->  
    </div><!-- /.row -->  
</div><!-- /.container -->                      
</div><!-- /page-title parallax -->

<section class="main-content blog-posts flat-row course-list have-sidebar">
<div class="container">
    <div class="blog-title clearfix">
        <h1 class="bold">LIST BLOG</h1>
    </div>
    <div class="row">
        <div class="col-md-12">

            <div class="post-warp clearfix">
            
                <?php
                    foreach($results as $r):
                ?>

                <div class="flat-course flat-hover-zoom">
                    <div class="featured-post">             
                        <div class="overlay">
                            <div class="link"></div>
                        </div>
                        <div class="entry-image">
                            <a href="courses-single.html"><img src="<?php echo $r->img_url;?>" alt="Course1"></a>
                        </div>
                    </div><!-- /.featured-post -->

                    <div class="course-content">
                        <h4><a href="courses-single.html"><?php echo $r->title_blog;?></a> </h4>
  
                        
                        <ul class="course-meta review clearfix">
                            <li class="author">
                                <div class="thumb">
                                </div>

                                <div class="text">
                                    <a href="#"><?php echo $r->date_blog;?></a>
                                    <p>Date Blog</p>
                                </div>
                            </li>

                        </ul> 

                        <?php echo substr($r->content_blog,0,200)."...";?>

                        <ul class="course-meta desc">
                            <li>
                                <h6><span class="fa fa-user"></span></h6>
                                <span> <?php echo $r->id_user;?></span>
                            </li>

                            <li>
                                <h6><span class="fa fa-tag"></span></h6>
                                <span> <?php echo $r->title_tag;?></span>
                            </li>

                            <li>
                                <h6><span class="fa fa-comments"></span></h6>
                                <span> <?php echo $r->banyak_komentar;?></span>
                            </li>
                        </ul> 

                            <a class="flat-button orange" href="<?php echo base_url('frontend/blog/read/').$r->id_blog;?>">SEE MORE</a>
                        </div><!-- /.course-content -->
                </div>

                    <?php endforeach;?>


            </div><!-- / .post-wrap -->

            <form method="post">
            <div class="blog-pagination">
                <ul class="flat-pagination">
                    <?php echo $links; ?>                              
                </ul><!-- /.flat-pagination -->
            </div>
            </form>
            
        </div>

    </div><!-- /row -->
</div><!-- /container -->
</section><!-- /main-content -->
