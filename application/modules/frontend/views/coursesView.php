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
                    <li>Courses</li>
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
                        <select name="select_category" class="orderby" id="orderby">
                            <option value="*" selected="selected">Select Material</option>

                                <?php
                                    $quer = $this->db->query("select * from tbl_material");
                                    $result = $quer->result();
                                    foreach($result as $res11):
                                ?>

                                    <option value="<?php echo $res11->id_material;?>"><?php echo $res11->title_material;?></option>

                                <?php endforeach;?>
                        </select>
                    </label>

                    <!-- <label class="modern-select">
                         <select name="select_category" class="orderby" id="orderby1">
                            <option value="*" selected="selected">Sort by</option>
                            <option value="newest">Newest</option>
                            <option value="oldest">Oldest</option>
                        </select>
                    </label> -->
                </div>
            </div>

            <div class="post-warp clearfix" id="coursesList">
            
                <?php
                    foreach($results as $r):
                ?>

                <div class="flat-course flat-hover-zoom">
                    <div class="featured-post">             
                        <div class="overlay">
                            <div class="link"></div>
                        </div>
                        <div class="entry-image">
                            <a href="<?php echo base_url('frontend/courses/read/').$r->id_courses;?>"><img src="<?php echo $r->url_image;?>" alt="Course1"></a>
                        </div>
                    </div><!-- /.featured-post -->

                    <div class="course-content">
                        <h4><a href="<?php echo base_url('frontend/courses/read/').$r->id_courses;?>"><?php echo $r->title_courses;?></a> </h4>

                        <div class="price">Rp.<?php echo number_format($r->price,2,',','.')?></div>    
                        
                        <ul class="course-meta review clearfix">
                            <li class="author">
                                <div class="thumb">
                                    <img src="<?php echo $r->url_foto;?>" alt="image">
                                </div>

                                <div class="text">
                                    <a href="#"><?php echo $r->name;?></a>
                                    <p>Teacher</p>
                                </div>
                            </li>

                        </ul> 

                        <?php echo substr($r->content_courses,0,100)."...";?>

                        <ul class="course-meta desc">
                            <li>
                                <h6>
                                <?php 
                                if ($r->price == null)
                                {
                                    echo "Free";
                                } else {
                                    echo "Rp.".number_format($r->price,2,',','.');
                                }
                                ?>
                                </h6>
                                <span> Price</span>
                            </li>

                            <li>
                                <h6><?php echo $r->jumlah_lesson;?></h6>
                                <span> Lesson</span>
                            </li>

                            <li>
                                <h6><span class="course-time"><?php echo $r->title_material;?></span></h6>
                                <span> Material</span>
                            </li>
                        </ul> 

                            <a class="~" href="<?php echo base_url('frontend/courses/read/').$r->id_courses;?>">SEE MORE</a>
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
                $quer = $this->db->query("select *,count(id_courses) as jumlah_courses from tbl_material a LEFT JOIN tbl_courses b ON a.id_material = b.id_material group by a.id_material");
                $result = $quer->result();
                foreach($result as $res11):
            ?>

                <li>
                    <a href="javascript:void(0)" id_material="<?php echo $res11->id_material;?>" class="orderby1"><?php echo $res11->title_material;?></a>
                    <span class="numb-right">(<?php echo $res11->jumlah_courses;?>)</span>
                </li>

            <?php endforeach;?>

            </ul>
        </div>

        <div class="widget widget-teacher">
            <h5 class="widget-title">Last Post</h5>
            <div class="text-teacher">
                <p>Last Post from Professionals teacher</p>
            </div>
            <ul class="teacher-news clearfix">

                <?php
                    $quer = $this->db->query("select * from tbl_courses a left join tbl_material b on a.id_material = b.id_material order by a.id_courses DESC limit 3");
                    $result = $quer->result();
                    foreach($result as $res11):
                ?>
                    <li>
                        <div class="thumb">
                            <img src="<?php echo $res11->url_image;?>" alt="image">
                        </div>
                        <div class="text">
                            <a href="<?php echo base_url('frontend/courses/read/').$res11->id_courses;?>"><?php echo $res11->title_courses;?></a>
                            <p><?php echo $res11->title_material;?></p>
                            <p>
                            <?php
                                if ($res11->price == null)
                                {
                                    echo "Free";
                                } else {
                                    echo "Rp.".number_format($res11->price,2,',','.');
                                }
                            ?>
                            </p>
                        </div>
                    </li>
                <?php  endforeach;?>

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
<script>
    $(document).ready(function(){
        $(document).on('change','#orderby',function(){
            var values = $(this).val();
            $('#coursesList').load("<?php echo base_url()?>frontend/courses/coursesList/"+values);
        });
        $(document).on('click','.orderby1',function(){
            var values = $(this).attr('id_material');
            $('#coursesList').load("<?php echo base_url()?>frontend/courses/coursesList/"+values);
        });
    });
</script>
