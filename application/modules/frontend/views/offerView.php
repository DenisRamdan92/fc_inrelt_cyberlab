<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
<div class="page-title parallax parallax4" style="background-position: 50% 88px;"> 
<div class="overlay"></div>            
<div class="container">
    <div class="row">
        <div class="col-md-12">                    
            <div class="page-title-heading">
                <h2 class="title">Offer</h2>
            </div><!-- /.page-title-heading -->
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Offer</li>
                </ul>                   
            </div><!-- /.breadcrumbs --> 
        </div><!-- /.col-md-12 -->  
    </div><!-- /.row -->  
</div><!-- /.container -->                      
</div>

<section class="main-content blog-posts style-v1">
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="blog-title-single">
                <h1 class="bold"><?php echo $offer['title'];?></h1>
                <article class="entry clearfix">
                    <div class="entry-border">
                        <div class="main-post">
                            
                            <div class="feature-post">
                                <img src="<?php echo $offer['url_foto'];?>" alt="image">
                            </div><!-- /.feature-post -->
                            <div class="entry-content">
                                <?php echo $offer['content'];?>                                  
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
        </div><!-- /col-md-8 -->

        <div class="sidebar">
            <div class="widget widget-popular-news">
                <h5 class="widget-title">Recent posts</h5>
                <ul class="popular-news clearfix">
                    <?php
                        $quer = $this->db->query("select * from tbl_blog order by id_blog DESC limit 10");
                        $result = $quer->result();
                        foreach($result as $res11):
                    ?>
                    <li>
                        <div class="thumb">
                            <img src="<?php echo $res11->img_url;?>" width="100px;" class="img-responsive" alt="image">
                        </div>
                        <div class="text">
                            <a href="<?php echo base_url('frontend/blog/read/').$res11->id_blog;?>"><?php echo $res11->title_blog;?></a>
                            <p><?php echo $res11->date_blog;?></p>
                        </div>
                    </li>
                    <?php endforeach;?>

                </ul><!-- /popular-news clearfix -->
            </div><!-- /widget widget-popular-news -->
        </div><!-- /sidebar -->
    </div><!-- /row -->
</div><!-- /container -->
</section>
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