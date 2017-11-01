<div class="page-title parallax parallax4"> 
<div class="overlay"></div>            
<div class="container">
    <div class="row">
        <div class="col-md-12">                    
            <div class="page-title-heading">
                <h2 class="title">COURSES</h2>
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

<section class="main-content blog-posts flat-row course-list have-sidebar">
<div class="container">
    <div class="blog-title clearfix">
        <h1 class="bold">LIST COURSES</h1>
    </div>
    <div class="row_course">
        <div class="post-content">
            <div class="flat-post-ordering clearfix">
                <div class="sort-views">
                    <label class="modern-select">
                        <select name="select_category" class="orderby">
                            <option value="menu_order" selected="selected">Select Category</option>
                            <option value="Accessories">Accessories</option>
                            <option value="mobile_app">Mobile App</option>
                            <option value="fashion_design">Fashion Desin</option>
                            <option value="web_design">Web Design</option>
                        </select>
                    </label>

                    <label class="modern-select">
                         <select name="select_category" class="orderby">
                            <option value="menu_order" selected="selected">Sort by</option>
                            <option value="newest">Newest</option>
                            <option value="oldest">Oldest</option>
                        </select>
                    </label>
                    <div class="list-grid">
                        <a data-layout = "course-grid" class="course-grid-view" href="#"><i class="fa fa-th" aria-hidden="true"></i></a>
                        <a data-layout = "course-list" class="course-list-view active" href="#"><i class="fa fa-list" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>

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
                            <a href="courses-single.html"><img src="<?php echo $r->url_image;?>" alt="Course1"></a>
                        </div>
                    </div><!-- /.featured-post -->

                    <div class="course-content">
                        <h4><a href="courses-single.html"><?php echo $r->title_courses;?></a> </h4>

                        <div class="price">$290</div>    
                        
                        <ul class="course-meta review clearfix">
                            <li class="author">
                                <div class="thumb">
                                    <img src="images/flickr/4.jpg" alt="image">
                                </div>

                                <div class="text">
                                    <a href="#">Michael Windzor</a>
                                    <p>Teacher</p>
                                </div>
                            </li>
                            <li class="review-stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half"></i>
                                <i class="fa fa-star-o"></i>
                            </li>

                            <li>25 Reviews</li>
                        </ul> 

                        <p> Personal time management skills are essential for professional & personal success in any area of life. Those able to successfully implement time management strategies.</p>

                        <ul class="course-meta desc">
                            <li>
                                <h6>1 year</h6>
                                <span> Course</span>
                            </li>

                            <li>
                                <h6>25</h6>
                                <span> Class Size</span>
                            </li>

                            <li>
                                <h6><span class="course-time">7:00 - 10:00</span></h6>
                                <span> Class Duration</span>
                            </li>
                        </ul> 

                            <a class="flat-button orange" href="courses.html">SEE MORE</a>
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
    <div class="sidebar">
        <div class="widget widget-categories">
            <h5 class="widget-title">Material</h5>
            <ul>
            <?php
                $quer = $this->db->get("tbl_material");
                $result = $quer->result();
                foreach($result as $res11):
            ?>

                <li>
                    <a href="#"><?php echo $res11->title_material;?></a>
                    <span class="numb-right">(9)</span>
                </li>

            <?php endforeach;?>

            </ul>
        </div>

        <div class="widget widget-teacher">
            <h5 class="widget-title">Browse by Teacher</h5>
            <div class="text-teacher">
                <p>Lorem ipsum sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <ul class="teacher-news clearfix">

                <li>
                    <div class="thumb">
                        <img src="images/flickr/6.jpg" alt="image">
                    </div>
                    <div class="text">
                        <a href="#">Terry Moore</a>
                        <p>Web Designer</p>
                    </div>
                    <ul class="flat-socials">
                        <li class="facebook">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="twitter">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="linkedin">
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                        <li class="youtube">
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                        </li>
                    </ul>
                </li>

            </ul><!-- /popular-news clearfix -->
        </div>

        <div class="widget widget-featured-courses">
            <h5 class="widget-title">Upcoming Exams</h5>
            <ul class="featured-courses-news clearfix">
                
                <li>
                    <div class="thumb">
                        <img src="images/flickr/9.jpg" alt="image">
                    </div>
                    <div class="text">
                        <a href="#">Swift Programming for Beginners</a>
                        <p>Sarah Johnson</p>
                    </div>
                    <div class="review-rating">
                        <div class="flat-money">
                            <p>$170</p>
                        </div>
                        <ul class="flat-reviews">
                            <li class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                            </li>
                            <li class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                            </li>
                            <li class="star">
                                <a href="#"><i class="fa fa-star"></i></a>
                            </li>
                            <li class="star">
                                <a href="#"><i class="fa fa-star-half-o"></i></a>
                            </li>
                             <li class="star">
                                <a href="#"><i class="fa fa-star-o"></i></a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul><!-- /popular-news clearfix -->
        </div><!-- /widget widget-popular-news -->
    </div><!-- /sidebar -->

    </div><!-- /row -->
</div><!-- /container -->
</section><!-- /main-content -->
