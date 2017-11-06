<div class="page-title parallax parallax4"> 
        	<div class="overlay"></div>            
            <div class="container">
                <div class="row">
                    <div class="col-md-12">                    
                        <div class="page-title-heading">
                            <h2 class="title">TEACHER PROFILE</h2>
                        </div><!-- /.page-title-heading -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Teacher</li>
                            </ul>                   
                        </div><!-- /.breadcrumbs --> 
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row -->  
            </div><!-- /.container -->                      
        </div><!-- /page-title parallax -->
        <br>
        <br>
        <br>
        <section id="content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="<?php echo $teacher['url_foto']?>" alt="" class="img-responsive img-rounded">
                    </div>
                    <div class="col-sm-6">
                        <div class="flat-title-section">
                            <h1 class="title"><?php echo $teacher['name']?></h1>                
                        </div>
                        <p>
                            <?php echo $teacher['description']?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <br>
        <br>
        <br>
        <section id="skills">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="contact-content">
                            <div class="contact-address">
                                <div class="style1">                                    
                                <img src="<?php echo base_url()?>assets/frontend/images/icon/c1.png" alt="image">
                                </div> 
                                <div class="details">
                                    <h5>Material Courses</h5>
                                    <p><?php echo $teacher['main_material']?></p>
                                    <p>---</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="contact-content">
                            <div class="contact-address">
                                <div class="style1">
                                    <img src="<?php echo base_url()?>assets/frontend/images/icon/c2.png" alt="image">
                                </div>
                                <div class="details">
                                    <h5>Contact</h5>
                                    <p><?php echo $teacher['telepon']?></p>
                                    <p><?php echo $teacher['email']?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="contact-content">
                            <div class="contact-address">
                                <div class="style1">
                                    <img src="<?php echo base_url()?>assets/frontend/images/icon/c3.png" alt="image">
                                </div>
                                <div class="details">
                                    <h5>Social Media</h5>
                                        <ul class="flat-socials">
                                            <li class="facebook">
                                                <a href="<?php echo $teacher['facebook']?>"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="twitter">
                                                <a href="<?php echo $teacher['twitter']?>"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li class="linkedin">
                                                <a href="<?php echo $teacher['linkedin']?>"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                            <li class="youtube">
                                                <a href="<?php echo $teacher['youtube']?>"><i class="fa fa-youtube-play"></i></a>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div>
        </section>
        <section>
        <div class = " flat-row popular-course">
                <div class="container">
                    <div class="flat-title-section">
                        <h1 class="title">CyberLAB Courses</h1>                
                    </div>

                    <div class="flat-course-grid button-right">

                    <?php
                    $this->db->where('id_teacher',$teacher['id_teacher']);
                        $this->db->order_by("id_courses","DESC");
                        $quer = $this->db->get("tbl_courses");
                        $result = $quer->result();
                        foreach($result as $res11):
                    ?>
                        <div class="flat-course">
                            <div class="featured-post">             
                                <div class="overlay">
                                    <div class="link"></div>
                                </div>

                                <a href="<?php echo base_url('frontend/courses/read/').$res11->id_courses;?>"><img src="<?php echo $res11->url_image;?>" alt="Course1"></a>
                            </div><!-- /.featured-post -->

                            <div class="course-content">
                                <h4><a href="<?php echo base_url('frontend/courses/read/').$res11->id_courses;?>"><?php echo $res11->title_courses;?></a> </h4>

                                <div class="price">
                                
                                <?php 

                                if ($res11->price == null)
                                {
                                    echo "Free";
                                } else {
                                    echo "Rp.".number_format($res11->price,2,',','.');
                                }

                                ?>
                                
                                </div>    
                                
                                <?php
                                    $hasil = 0;
                                    $querySum = $this->db->query("SELECT sum(views) as jumlah_viewer FROM `tbl_courses`");
                                    $resultSum = $querySum->row_array();
                                    $jumlah = $resultSum['jumlah_viewer'];
                                    $hasil = ($res11->views * 100)/$jumlah;
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
                            </div><!-- /.course-content -->
                        </div>
                    <?php endforeach;?>

                    </div><!-- /.flat-course grid -->
                </div>
            </div>
        </section>
