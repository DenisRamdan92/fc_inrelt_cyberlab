<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
            <div class="blog-title-single">
                <h1 class="bold"><?php echo $lesson['title_lesson']?></h1>
                <article class="entry clearfix">
                    <div class="entry-border">
                        <div class="main-post">  
                            
                            <div class="feature-post">
                                <iframe width="100%" height="500px;" src="<?php echo $lesson['url_video']?>" frameborder="0"></iframe>
                            </div><!-- /.feature-post -->
                            <div class="entry-content">
                                <?php echo $lesson['content_lesson']?>                                 
                            </div><!-- /.entry-post -->

                        </div><!-- /.main-post -->
                        <!-- Wrap-share -->
                        <div class="wrap-share">
                            <div class="share-post">  
                                <h4>Share:</h4>                                 
                                <div id="share"></div>
                            </div><!-- /.share-post -->      
                        </div><!-- /.wrap-share -->
                    </div><!-- /.entry-border -->
                </article><!-- /entry clearfix -->
            </div><!-- /blog-title-single -->

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<script>
    $("#share").jsSocials({
            shareIn: "popup",
            showCount: "inside",
            shares: [{share:"email",
            logo:"<?php echo base_url('assets/frontend/images/email-hi.png');?>"}, 
            {share:"twitter",
            label:"Twitter",
            logo:"<?php echo base_url('assets/frontend/images/twitter-twitter-icon.png');?>"}, 
            {share:"facebook",
            label:"Fb",
            logo:"<?php echo base_url('assets/frontend/images/fb-logo.png');?>"}, 
            {share:"googleplus",
            logo:"<?php echo base_url('assets/frontend/images/google-icon-logo.gif.png');?>"},
            {share:"linkedin",
            logo:"<?php echo base_url('assets/frontend/images/linkedin-icon-0.png');?>"},
            {share:"pinterest",
            logo:"<?php echo base_url('assets/frontend/images/pinterest-4-512.png');?>"},
            {share:"stumbleupon",
            logo:"<?php echo base_url('assets/frontend/images/stumbleupon-icon-0.png');?>"},
            {share:"whatsapp",
            logo:"<?php echo base_url('assets/frontend/images/whatsapp.png');?>"}],
    });

    </script>