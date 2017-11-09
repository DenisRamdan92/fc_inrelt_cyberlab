<div class="page-title parallax parallax4"> 
        	<div class="overlay"></div>            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">Courses</h2>
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
    	
        <section class="main-content blog-posts course-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-title-single">
                            <h1 class="bold"><?php echo $courses['title_courses']?></h1>
                            <ul class="course-meta review style2 clearfix">
                                <li class="author">
                                    <div class="thumb">
                                        <img src="<?php echo $courses['url_foto']?>" alt="image">
                                    </div>

                                    <div class="text">
                                        <a href="#"><?php echo $courses['name']?></a>
                                        <p>Teacher</p>
                                    </div>
                                </li>
                                <li class="categories">
                                    <a href="#" class="course-name"><?php echo $courses['title_material']?></a>
                                    <p>Material</p>
                                </li>
                                <?php
                                    $hasil = 0;
                                    $querySum = $this->db->query("SELECT sum(views) as jumlah_viewer FROM `tbl_courses`");
                                    $resultSum = $querySum->row_array();
                                    $jumlah = $resultSum['jumlah_viewer'];
                                    $hasil = ($courses['views'] * 100)/$jumlah;
                                    if ($hasil <= 20){ 
                                        ?>
                                            <ul class="course-meta review">
                                                <li class="review-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </li>
                                            </ul>
                                        <?php } elseif ($hasil > 20 && $hasil <=40) { ?>
                                            <ul class="course-meta review">
                                                <li class="review-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </li>
                                            </ul>
                                        <?php } elseif ($hasil > 40 && $hasil <=60) { ?>
                                        <ul class="course-meta review">
                                            <li class="review-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </li>
                                        </ul>
                                        <?php } elseif ($hasil > 60 && $hasil <=80) { ?>
                                        <ul class="course-meta review">
                                            <li class="review-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </li>
                                        </ul>
                                        <?php } elseif ($hasil > 80) { ?>
                                        <ul class="course-meta review">
                                            <li class="review-stars">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </li>
                                        </ul>
                                        <?php } ?>

                                <li><?php echo $courses['views']?> Reviews</li>
                            </ul>

                            <div class="feature-post">
                            </div><!-- /.feature-post -->
                            <div class="course-widget-price">
                                <h4 class="course-title">COURSE FEATURES</h4>
                                <ul>
                                    <li>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <span>Leason</span>
                                        <span class="time"><?php echo $courses['jumlah_lesson']?></span>
                                    </li>
                                    <li>
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        <span>Level</span>
                                        <span class="time"><?php echo $courses['leveling']?></span>
                                    </li>
                                </ul>
                                <h5 class="bt-course">Price: <span>
                                <?php if ($courses['price'] == null)
                                    {
                                        echo "Free";
                                    } else {
                                        echo "Rp.".number_format($courses['price'] ,2,',','.');
                                    }
                                ?>
                                </span></h5>
                                <a class="flat-button bg-orange" href="<?php echo base_url() ?>frontend/courses/lessonList/<?php echo $courses['id_courses']; ?>">TAKE THIS COURSES</a>
                            </div>
                            <div class="entry-content">
                                <h4 class="title-1 bold">ABOUT THE COURSES</h4>
                                <?php echo $courses['content_courses']?>
                                <ul class="curriculum">
                                        <li class="section">
                                            <h4 class="section-title">Lesson</h4>
                                            <ul class="section-content">
                                                <?php   
                                                    $id_courses = $courses['id_courses'];
                                                    $quer = $this->db->query("select * from tbl_dtl_lesson_courses a left join tbl_lesson b on a.id_lesson = b.id_lesson left join tbl_courses c on a.id_courses = c.id_courses where a.id_courses = '$id_courses'");
                                                    $result = $quer->result();
                                                    foreach($result as $res12):
                                                ?>
                                                <li class="course-lesson">
                                                    <a href="#" class="lesson-title"><?php echo $res12->title_lesson;?></a>
                                                    <a href="<?php echo base_url() ?>frontend/courses/lesson/<?php echo$res12->id_lesson; ?>" class="lesson-preview">Preview</a>
                                                    <div class="fr">
                                                        <span class="duration"><?php echo $res12->leng_time;?></span>
                                                        <?php
                                                            if ($res12->url_video == "") {
                                                                $display = "none";
                                                            } else {
                                                                $display = "";
                                                            }
                                                        ?>
                                                        <span class="attrachment-video" style="display:<?php echo $display;?>">
                                                            Video
                                                        </span>
                                                    </div>
                                                </li>
                                                <?php endforeach;?>
                                            </ul>
                                        </li>
                                    </ul>
                                
                            </div><!-- /.entry-post -->
                        </div><!-- /.main-post -->
                    </div><!-- /col-md-8 -->

                    <div class="sidebar">
                    
                        <div class="widget widget-teacher">
                            <h5 class="widget-title">Teacher</h5>
                            <ul class="teacher-news clearfix">
                                <li>
                                    <div class="thumb">
                                        <img src="<?php echo $courses['url_foto']?>" alt="image">
                                    </div>
                                    <div class="text">
                                        <a href="#"><?php echo $courses['name']?></a>
                                        <p><?php echo $courses['main_material']?></p>
                                    </div>
                                    <ul class="flat-socials">
                                        <li class="facebook">
                                            <a href="<?php echo $courses['facebook']?>"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li class="twitter">
                                            <a href="<?php echo $courses['twitter']?>"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li class="linkedin">
                                            <a href="<?php echo $courses['linkedin']?>"><i class="fa fa-linkedin"></i></a>
                                        </li>
                                        <li class="youtube">
                                            <a href="<?php echo $courses['youtube']?>"><i class="fa fa-youtube-play"></i></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul><!-- /popular-news clearfix -->

                            <div class="text-teacher">
                                <p><?php echo substr($courses['description'],0,300)?> ...</p>
                                <a href="<?php echo base_url()?>frontend/teacher/detail/<?php echo $courses['id_teacher']?>" class="btn btn-xs bg-orange">Read More ></a>
                            </div>
                            
                        </div>
                    </div><!-- /sidebar -->
                </div><!-- /row -->
            </div><!-- /container -->
        </section><!-- /main-content -->