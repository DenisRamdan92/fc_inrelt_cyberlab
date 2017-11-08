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

    <script type="text/javascript" src="<?php echo base_url();?>assets/frontend/javascript/jquery.min.js"></script>
    
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

                                <p><i class="color:blue;">Welcome to</i> <i style="color:orange"><?php echo $info['title_web']?></i>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $info['phone']?>&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $info['email']?></p>
                                
                            </div>
                            <div class="right-bar">
                                <ul class="flat-socials">
                                    <li class="google-plus">
                                        <?php echo anchor('frontend/register/logout','<i class="fa fa-sign-out"></i> Logout');?>
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
                                <li <?php echo active_url1("Profile",2);?>>
                                    <?php echo anchor('frontend/profile','Home');?>
                                </li>
                            
                                <li <?php echo active_url1("profile",3);?>>
                                    <?php echo anchor('frontend/profile/profile','Profile');?>
                                </li>
                                
                                <li <?php echo active_url1("info",3);?>>
                                    <?php echo anchor('frontend/profile/info','Info');?>
                                </li>

                            </ul><!-- /.menu -->
                        </nav><!-- /.mainnav -->    
                    </div><!-- /.nav-wrap -->
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
                            <div class="widget widget_tweets clearfix">
                                <h5 class="widget-title">QUICK LINK</h5>
                                <?php echo $aboutus['content']?>
                            </div><!-- /.widget-recent-tweets -->
                        </div><!-- /.col-md-2 -->

                        <div class="col-md-3">
                            <div class="widget widget_tweets clearfix">
                                <h5 class="widget-title">LATEST COURSES</h5>
                                <?php echo $aboutus['content']?>
                            </div><!-- /.widget-recent-tweets -->
                        </div><!-- /.col-md-2 -->

                        <div class="col-md-3">
                            <div class="widget widget_tweets clearfix">
                                <h5 class="widget-title">POPULAR COURSES</h5>
                                <?php echo $aboutus['content']?>
                            </div><!-- /.widget-recent-tweets -->
                        </div><!-- /.col-md-2 -->

                        <div class="col-md-3">
                            <div class="widget widget_tweets clearfix">
                                <h5 class="widget-title">LATEST COMMANT</h5>
                                <?php echo $aboutus['content']?>
                            </div><!-- /.widget-recent-tweets -->
                        </div><!-- /.col-md-2 -->
                    </div><!-- /.row -->
                    <hr>
                    <div class="row">
                        <div class="col-md-4">  
                            <div class="widget widget-text">
                                <iframe src="<?php echo $aboutus['url_video']?>" frameborder="0" width="100%" height="200px"></iframe>
                                <ul>
                                    <li class="address"><a href="#"><?php echo $info['addreess']?></li>
                                    <li class="phone"><a href="#"><?php echo $info['phone']?></a></li>
                                    <li class="email"><a href="#"><?php echo $info['email']?></a></li>  
                                </ul> 
                            </div><!-- /.widget -->      
                        </div>

                        <div class="col-md-4">
                            <div class="widget widget_tweets clearfix">
                                <h5 class="widget-title"><?php echo $aboutus['title']?></h5>
                                <?php echo $aboutus['content']?>
                            </div><!-- /.widget-recent-tweets -->
                        </div><!-- /.col-md-2 -->

                        <div class="col-md-4">
                            <div class="widget widget-quick-contact">
                                <h5 class="widget-title">Apply For a Teacher</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                    <?php echo form_open('frontend/main/contactSend',"method='post'")?>
                                            
                                            <input type="text" value="" tabindex="3" placeholder="Your Name" name="name" id="email-contact" required="">
                                            <input type="email" value="" tabindex="3" placeholder="Your Email" name="email" id="email-contact" required="">
                                            <input type="text" value="" tabindex="3" placeholder="Your Subject" name="subject" id="email-contact" required="">
                                           
                                            <textarea class="type-input" tabindex="4" placeholder="Message" name="message" id="message-contact" required=""></textarea> 
                                            <br/><br/><br/>
                                            <div class="submit-wrap">
                                            <button type="submit" class="flat-button bg-orange"><i class="fa fa-long-arrow-right"></i></button>
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
                            <p>Copyright © 2017. Powered by Inrelt<span><a href="#">  </a></span>. All Rights Reserved.</p>
                        </div>
                    </div><!-- /.container-bottom -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>
    </div><!-- /. boxed -->


        <!-- Javascript -->
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