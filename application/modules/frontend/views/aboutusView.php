<div class="page-title parallax parallax4"> 
        	<!-- <div class="overlay"></div> -->     
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <br><br><br><br>                    
                        <div class="page-title-heading">
                            <h2 class="title">ABOUTUS</h2>
                        </div><!-- /.page-title-heading -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Aboutus</li>
                            </ul>                   
                        </div><!-- /.breadcrumbs --> 
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row --> 
            </div><!-- /.container -->                      
        </div><!-- /page-title parallax -->
    	
        <!-- About -->
            <section class="flat-row pad-top-100 flat-about">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="video-wrapper">
                                <iframe width="100%" height="480" src="<?php echo $aboutus['url_video']?>" allowfullscreen=""></iframe>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="flat-title">
                                <h1><?php echo strtoupper($aboutus['title'])?><span></span></h1>
                            </div>
                            <?php echo $aboutus['content']?>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container -->   
            </section>

            <section class="flat-row pad-top-100 flat-about">
                <div class="container">
                    <div class="flat-title-section">
                        <h1 class="title">OUR OFFER</h1>                
                    </div>
                    <div class="row">

                            <div class="row text-center">

                            <?php
                                $this->db->order_by("id_offer","ASC");
                                $quer = $this->db->get("tbl_offer");
                                $result = $quer->result();
                                foreach($result as $res11):
                            ?>

                            <div class="col-sm-3">
                                <p><img src="<?php echo $res11->url_foto;?>" alt=""></p>
                                    <h3><?php echo $res11->title;?></h3>
                                    <p><?php echo substr($res11->content,0,100)?>...</p>
                                <p><a href="<?php echo base_url()?>frontend/offer/read/<?php echo $res11->id_offer;?>" target="_blank" class="flat-button orange">Read More</a></p>
                            </div>

                            <?php endforeach;?>

                    </div><!-- /.row -->
                </div><!-- /.container -->   
            </section>

            <section class="flat-row pad-bottom-100">
                <div class="container">
                    <div class="flat-title-section">
                        <h1 class="title">OUR TEACHER</h1>                
                    </div>

                    <div class="flat-teacher-team button-right">
                        
                        <?php
                            $this->db->order_by("id_teacher","DESC");
                            $quer = $this->db->get("tbl_teacher");
                            $result = $quer->result();
                            foreach($result as $res11):
                        ?>

                        <div class="flat-teacher flat-hover-zoom">
                            <div class="entry-image">
                                <img src="<?php echo $res11->url_foto;?>"/>
                            </div>
                            <div class="content">                               
                                <h4 class="name"><a href="<?php echo base_url('frontend/teacher/detail/').$res11->id_teacher;?>"><?php echo $res11->name;?></a></h4>
                                <ul class="flat-socials">
                                    <li class="facebook">
                                        <a href="<?php echo $res11->facebook;?>"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li class="twitter">
                                        <a href="<?php echo $res11->twitter;?>"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li class="linkedin">
                                        <a href="<?php echo $res11->linkedin;?>"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li class="youtube">
                                        <a href="<?php echo $res11->youtube;?>"><i class="fa fa-youtube-play"></i></a>
                                    </li>
                                </ul>
                                <ul class="flat-information">
                                    <li class="position">
                                        <a href="#" title="position"> <?php echo $res11->main_material;?>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                    </li>
                                    <li class="phone">
                                        <a href="+61383766284" title="Phone number"> <?php echo $res11->telepon;?>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                    </li>
                                    <li class="email">
                                        <a href="mailto:renolburjulius@gmail.com" title="Email address"> <?php echo $res11->email;?>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                    </li>
                                </ul>

                            </div>
                        </div>

                        <?php endforeach;?>
                        
                    </div><!-- /.flat-teacher-team -->
                </div>
            </section>

            <section class="flat-row testimonial">
            <div class="container">
                <div class="testimonial-slider">
                    
                <?php
                    $this->db->order_by("id_student","DESC");
                    $this->db->limit(4);
                    $queryBlog = $this->db->query("SELECT * FROM tbl_student");
                    $result = $queryBlog->result();
                    foreach($result as $res11):
                ?>

                    <div class="testimonial">
                        <div class="testimonial-content">
                            <blockquote>
                                <?php echo $res11->testimonials;?>  
                            </blockquote>
                        </div>
                        <div class="testimonial-meta">
                            <div class="testimonial-author">
                                <strong class="author-name"><?php echo $res11->name;?></strong>
                                <div class="author-info">Insterestng To <?php echo $res11->insteresting_to;?></div>
                            </div>
                        </div>
                    </div>
                    

                    <?php 
                endforeach;
                ?> 

                </div>                
            </div>
            </section>