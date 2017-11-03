<!-- Slider -->
            <div class="tp-banner-container">
                <div class="tp-banner" >
                    <ul>
                    <?php
                        $this->db->order_by("id_slider","ASC");
                        $quer = $this->db->get("tbl_slider");
                        $result = $quer->result();
                        foreach($result as $res11):
                    ?>
                        <li data-transition="random-static" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                            <img src="<?php echo $res11->url_slider;?>" alt="slider-image" />
                            <div class="tp-caption sfl title-slide center" data-x="130" data-y="210" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">      	                      
                                <?php echo $res11->title;?>
                            </div>  
                            <div class="tp-caption sfr desc-slide center" data-x="108" data-y="280" data-speed="1000" data-start="1500" data-easing="Power3.easeInOut">                       
                                <br> <?php echo wordwrap($res11->content,100,"<br>")?>
                            </div>    
                            <div class="tp-caption sfl flat-button-slider bg-orange" data-x="420" data-y="439" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut">
                                <?php echo anchor('frontend/register','SIGN UP COURSES');?>
                            </div>
                             <div class="tp-caption sfr flat-button-slider" data-x="601" data-y="440" data-speed="1000" data-start="2500" data-easing="Power3.easeInOut">
                                <?php echo anchor('frontend/login','LOG IN COURSES');?>
                             </div>                    
                        </li>
                    <?php endforeach;?>

                    </ul>
                </div>
            </div><!-- /.tp-banner-container -->

            <div class="flat-row course row-bg">
                <div class = "container">
                    <div class="row">
                        <div class="col-md-7 col-sm-12 flat-pdr-100">                       
                            <h1 class="title-course">Choose The Courses Tool You Want To Learn</h1>

                            <p class='flat-lh-25'>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ulla mco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            </p> 

                            <div class="flat-spacer"></div>  

                            <div class="flat-button-container">
                                <?php echo anchor('frontend/courses','VIEW ALL COURSES','class="flat-button orange"');?>
                            </div> 
                        </div>

                        <div class="col-md-5 col-sm-12"> 
                            <ul class = "flat-course-images">
                                <li>
                                    <img src="<?php echo base_url(); ?>assets/frontend/images/index/Cate-01.png" alt="Cate-01"/>
                                </li>

                                <li>
                                    <img src="<?php echo base_url(); ?>assets/frontend/images/index/Cate-02.png" alt="Cate-02"/>
                                </li>

                                <li>
                                    <img src="<?php echo base_url(); ?>assets/frontend/images/index/Cate-03.png" alt="Cate-03"/>
                                </li>

                                <li>
                                    <img src="<?php echo base_url(); ?>assets/frontend/images/index/Cate-04.png" alt="Cate-04"/>
                                </li>

                                <li>
                                    <img src="<?php echo base_url(); ?>assets/frontend/images/index/Cate-05.png" alt="Cate-05"/>
                                </li>

                                <li>
                                    <img src="<?php echo base_url(); ?>assets/frontend/images/index/Cate-06.png" alt="Cate-06"/>
                                </li>
                            </ul>  
                        </div>                    

                    </div>
                </div>
            </div><!-- /.flat-row -->

            <div class = " flat-row popular-course">
                <div class="container">
                    <div class="flat-title-section">
                        <h1 class="title">CyberLAB Courses</h1>                
                    </div>

                    <div class="flat-course-grid button-right">

                    <?php
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

                                <a href="<?php echo base_url('courses/read/').$res11->id_courses;?>"><img src="<?php echo $res11->url_image;?>" alt="Course1"></a>
                            </div><!-- /.featured-post -->

                            <div class="course-content">
                                <h4><a href="<?php echo base_url('courses/read/').$res11->id_courses;?>"><?php echo $res11->title_courses;?></a> </h4>

                                <div class="price"><?php echo number_format($res11->price,2,',','.')?></div>    
                                
                                <!-- <ul class="course-meta review">
                                    <li class="review-stars">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half"></i>
                                        <i class="fa fa-star-o"></i>
                                    </li>

                                </ul> -->
                            </div><!-- /.course-content -->
                        </div>
                    <?php endforeach;?>

                    </div><!-- /.flat-course grid -->
                </div>
            </div>

    	    <div class="container">
                    <div class="flat-title-section">
                        <h1 class="title">CyberLAB Newest Teacher</h1>                
                    </div>
    	    	<div class="row teacher">
                    
                    <?php
                        $this->db->order_by("id_teacher","DESC");
                        $this->db->limit(4);
                        $quer = $this->db->get("tbl_teacher");
                        $result = $quer->result();
                        foreach($result as $res11):
                    ?>

    		        <div class="flat-teacher-team-isotope button-right">
    		       		
    		            <div class="flat-teacher l col-md-3 col-sm-6 flat-hover-zoom">
    		                <div class="entry-image">
    		                    <img src="<?php echo $res11->url_foto;?>"/>
    		                </div>
    		                <div class="content">                               
    		                    <h4 class="name"><?php echo $res11->name;?></h4>
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
    		                            <a href="#" title="skill"><?php echo $res11->main_material;?>&nbsp;&nbsp;&nbsp;&nbsp;</a>
    		                        </li>
    		                        <li class="phone">
    		                            <a href="+61383766284" title="Phone number"><?php echo $res11->telepon;?>&nbsp;&nbsp;&nbsp;&nbsp;</a>
    		                        </li>
    		                        <li class="email">
    		                            <a href="mailto:AlitStudios@gmail.com" title="Email address"><?php echo $res11->email;?>&nbsp;&nbsp;&nbsp;&nbsp;</a>
    		                        </li>
    		                    </ul>

    		                </div>
    		            </div>

    		        </div><!-- /.flat-teacher-team -->
                    <?php endforeach;?>
                </div><!-- / .row -->
    	    </div><!-- / .container -->

              <div class = " flat-row lastest-new">
                <div class="container">
                    <div class="flat-title-section">
                        <h1 class="title">CyberLAB NEWS</h1>                
                    </div>

                    <div class="row post-lastest-new">

                    <?php
                        $this->db->order_by("id_blog","ASC");
                        $this->db->limit(3);
                        $quer = $this->db->query("select a.*,title_tag from tbl_blog a LEFT JOIN tbl_tag b ON a.id_tag = b.id_tag");
                        $result = $quer->result();
                        foreach($result as $res11):
                    ?>

                        <div class="post col-md-4 col-xs-12 col-sm-6 flat-hover-zoom">
                            <div class="featured-post">
                                <div class="entry-image">
                                    <img src="<?php echo $res11->img_url;?>" alt="image">
                                </div>
                            </div>

                            <?php
                            
                                $date=date_create("{$res11->date_blog}");
                                
                            ?>

                            <div class="date-post">
                                <span class="numb"><?php echo date_format($date,"d"); ?></span>
                                <span><?php echo date_format($date,"M"); ?></span>
                                <span style="font-size: 10pt; line-height: 50%; margin-bottom: 7px"><?php echo date_format($date,"Y"); ?></span>
                            </div>

                            <div class="content-post">
                                <h2 class="title-post">
                                    <a href="<?php echo base_url('news/read/').$res11->id_blog;?>"><?php echo $res11->title_blog;?></a>
                                </h2>

                                <div class="entry-content">
                                    <p><?php echo substr($res11->content_blog,0,200)?> . . .</p>
                                </div><!-- /entry-post -->

                                <div class="entry-meta style1">
                                    <p>Posted in:<span><a href="#"> <?php echo $res11->id_user;?></a></span></p>
                                    <p>Tags:<span><a href="#"> <?php echo $res11->title_tag;?></a></span></p>
                                </div>
                            </div><!-- /content-post -->
                        </div>

                    <?php endforeach;?>  

                    </div>

                </div>
            </div><!-- /.latest-new -->

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

            <section class="flat-row news-letter">
                <div class="container">

                    <div class="news-letter-form">
                        <div class="widget-mailchimb">
                            <h1 class="widget-title">NEWSLETTER</h1>
                            <p>Subscribe now and receive weekly newsletter with educational materials, new courses, interesting posts, popular books and much more!</p>
                            <?php echo form_open('frontend/main/newsletter',"method='post'")?>
                                    <div id="subscribe-content">
                                        <div class="input-wrap email">
                                            <input type="text" id="subscribe-email" name="subscribe-email" placeholder="Your Email Here">
                                        </div>
                                        <div class="button-wrap">
                                            <button type="submit" id="subscribe-button" class="subscribe-button" title="Subscribe now"> SUBSCRIBE </button>
                                        </div>
                                    </div>
                                    <div id="subscribe-msg"></div>
                                </form>
                           
                        </div>
                    </div>
                </div>
            </section>