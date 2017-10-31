<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>CyberLAB Forensics</title>

    <meta name="author" content="cyberla-edu.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/stylesheets/bootstrap.css" >

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/frontend/stylesheets/shortcodes.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/stylesheets/style.css">


    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/stylesheets/responsive.css">

    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/frontend/stylesheets/colors/color1.css" id="colors">
	
	<!-- Animation Style -->
    <!-- <link rel="stylesheet" type="text/css" href="stylesheets/animate.css"> -->

    <!-- Favicon and touch icons  -->
    <link href="<?php echo base_url();?>assets/frontend/icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="<?php echo base_url();?>assets/frontend/icon/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon-precomposed" sizes="57x57">
    <link href="<?php echo base_url();?>assets/frontend/images/icon_cyberlab.png" rel="shortcut icon">

    <!--[if lt IE 9]>
        <script src="javascript/html5shiv.js"></script>
        <script src="javascript/respond.min.js"></script>
    <![endif]-->
</head> 
<body class="header-sticky">
    <div class="boxed">
        <div class="windows8">
            <div class="preload-inner">
                <div class="wBall" id="wBall_1">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_2">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_3">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_4">
                    <div class="wInnerBall"></div>
                </div>
                <div class="wBall" id="wBall_5">
                    <div class="wInnerBall"></div>
                </div>
            </div>
        </div>
    	<div class="header-inner-pages">
    		<div class="top">
    			<div class="container">
    				<div class="row">
    					<div class="col-md-12">
    						<div class="text-information">
                                <p>Welcome to <?php echo $info['title_web']?></p>
                            </div>
                            <div class="right-bar">
        						<ul class="flat-information">
        							<li class="phone">
        								<a href="<?php echo $info['phone']?>" title="Phone number"> <?php echo $info['phone']?></a>
        							</li>
        							<li class="email">
        								<a href="mailto:<?php echo $info['email']?>" title="Email address"> <?php echo $info['email']?></a>
        							</li>
                                </ul>
                                <ul class="flat-socials">
                                    <li class="facebook">
                                        <?php echo anchor('frontend/register','<i class="fa fa-user"></i> Register');?>
        							</li>
                                    <li class="gooogle-plus">
                                        <?php echo anchor('frontend/login','<i class="fa fa-lock"></i> login');?>
        							</li>
        						</ul>
                            </div>
    					</div>
    				</div>
    			</div>
    		</div>      
    	</div><!-- /.header-inner-pages -->

    	<!-- Header --> 
    	<header id="header" class="header clearfix"> 
        	<div class="container">
                <div class="header-wrap clearfix">
                    <div id="logo" class="logo">
                        <a href="" rel="home">
                            <img style="width: 200x; margin-left: -15px; margin-top: -10px;" src="<?php echo $info['logo_url']?>" alt="image">
                        </a>
                    </div><!-- /.logo -->            
                    <div class="nav-wrap">
                        <div class="btn-menu">
                            <span></span>
                        </div><!-- //mobile menu button -->
                        <nav id="mainnav" class="mainnav">
                            <ul class="menu"> 
                                <li class="home">
                                    <a href="home">Home</a>
                                </li>
                                
                                <li>
                                    <a href="about">About</a>
                                </li>

                                 <li class="has-sub"><a href="training">Training</a>
                                	<ul class="submenu"> 
                                        <li><a href="training.html">Training</a></li>
                                        <li><a href="training1.html">Training 1</a></li> 
                                        <li><a href="training2.html">Training 2</a></li>   
                                        <li><a href="training3.html">Training 3</a></li>   
                                    </ul><!-- /.submenu -->
                                </li>

                                <li><a href="team">Team</a>              
                                </li>                               

                                <li><a href="product">Product</a>
                                </li>

                                <li><a href="contact">Contact</a>
                                </li>
                            </ul><!-- /.menu -->
                        </nav><!-- /.mainnav -->    
                    </div><!-- /.nav-wrap -->

                    <div id="s" class="show-search">
                            <a href="#"><i class="fa fa-search"></i></a>         
                        </div><!-- /.show-search -->
                    
                    <div class="submenu top-search">
                        <div class="widget widget_search">
                            <form class="search-form">
                                <input type="search" class="search-field" placeholder="Search …">
                                <input type="submit" class="search-submit">
                            </form>
                        </div>
                    </div>
                </div><!-- /.header-inner --> 
            </div>
        </header><!-- /.header -->

        
        <?php echo $contents; ?>
      
            <!-- Footer -->
        <footer class="footer">  
            <div class="footer-widgets">   
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">  
                            <div class="widget widget-text">
                                <img src="<?php echo base_url()?>assets/frontend/images/blog/Footer-01.png" alt="image">
                                <ul>
                                    <li class="address"><a href="#">Jl. Soekarno Hatta No. 693 Bandung</li>
                                    <li class="phone"><a href="#">+62 22 8734 6116</a></li>
                                    <li class="email"><a href="#">info@cyberlab-edu.com</a></li>  
                                </ul> 
                            </div><!-- /.widget -->      
                        </div>

                        <div class="col-md-3">
                            <div class="widget widget_tweets clearfix">
                                <h5 class="widget-title">User Links</h5>
                                <ul class="link-left">
                                    <li>
                                        <a href="#">About Us</a>
                                    </li>
                                    <li>
                                        <a href="#">About</a>
                                    </li>
                                    <li>
                                        <a href="#">Training</a>
                                    </li>
                                    <li>
                                        <a href="#">Team</a>
                                    </li>
                                    <li>
                                        <a href="#">Product</a>
                                    </li>
                                      <li>
                                        <a href="#">FAQs</a>
                                    </li>
                                </ul>
                                <ul class="link-right">
                                    <li>
                                        <a href="#">Become a Trainer</a>
                                    </li>
                                    <li>
                                        <a href="#">Maintenance</a>
                                    </li>
                                    <li>
                                        <a href="#">Language Packs</a>
                                    </li>
                                    <li>
                                        <a href="#">LearnPress</a>
                                    </li>
                                    <li>
                                        <a href="#">Release Status</a>
                                    </li>
                                </ul>
                            </div><!-- /.widget-recent-tweets -->
                        </div><!-- /.col-md-2 -->

                        <div class="col-md-3">
                            <div class="widget widget_recent-courses">
                                <h5 class="widget-title">Recent Training</h5>
                                <ul class="recent-courses-news clearfix">
                                    <li>
                                        <div class="thumb">
                                            <img src="<?php echo base_url()?>assets/frontend/images/blog/Footer-02.png" alt="image">
                                        </div>
                                        <div class="text">
                                            <a href="#">Android Basic Development</a>
                                        </div>
                                        <div class="review-rating">
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
                                            <p>25 Reviews</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="thumb">
                                            <img src="<?php echo base_url()?>assets/frontend/images/blog/Footer-03.png" alt="image">
                                        </div>
                                        <div class="text">
                                            <a href="#">Adobe Digital Basic</a>
                                        </div>
                                        <div class="review-rating">
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
                                            <p>25 Reviews</p>
                                        </div>
                                    </li>
                                </ul>
                            </div><!-- /.widget-quick-contact -->
                        </div><!-- /.col-md-4-->

                        <div class="col-md-3">
                            <div class="widget widget-quick-contact">
                                <h5 class="widget-title">Apply For A Teacher</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="flat-contact-form" id="contactform" method="post" action="./contact/contact-process.php">

                                            <input type="email" value="" tabindex="3" placeholder="Your Email" name="email" id="email-contact" required="">
                                           
                                            <textarea class="type-input" tabindex="4" placeholder="your writing" name="message" id="message-contact" required=""></textarea> 
                                            <br/><br/><br/>
                                            <div class="submit-wrap">
                                            <button class="flat-button bg-orange"><i class="fa fa-long-arrow-right"></i></button>
                                            </div>
                                           
                                        </form><!-- /.comment-form -->     
                                    </div><!-- /.col-md-12 -->
                                </div>
                            </div><!-- /.widget .widget-instagram -->
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.footer-widgets -->
        </footer>

        <a class="go-top">
            <i class="fa fa-chevron-up"></i>
        </a>

        <!-- Bottom -->
        <div class="bottom">
            <div class="container">
                <ul class="flat-socials-v1">
                    <li class="facebook">
                        <a href="<?php echo $socmed['facebook']?>"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class="twitter">
                        <a href="<?php echo $socmed['twitter']?>"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class="linkedin">
                        <a href="<?php echo $socmed['linkedin']?>"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li class="google-plus">
                        <a href="<?php echo $socmed['google_plus']?>"><i class="fa fa-google-plus"></i></a>
                    </li>
                </ul>    
                <div class="row">
                    <div class="container-bottom">
                        <div class="copyright"> 
                            <p>Copyright © 2017. Powered by <span><a href="#">  </a></span>. All Rights Reserved.</p>
                        </div>
                    </div><!-- /.container-bottom -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
    </div><!-- /. boxed -->


        <!-- Javascript -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/javascript/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/javascript/jquery.easing.js"></script> 
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/javascript/owl.carousel.js"></script> 
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/javascript/jquery-waypoints.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/javascript/jquery-countTo.js"></script>    
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/javascript/parallax.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/javascript/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/javascript/jquery-validate.js"></script>     
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/javascript/main.js"></script>

	<!-- Revolution Slider -->
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/javascript/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/javascript/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/javascript/slider.js"></script>
</body>
</html>