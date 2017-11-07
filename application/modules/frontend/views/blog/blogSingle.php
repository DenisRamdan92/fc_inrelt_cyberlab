<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
<div class="page-title parallax parallax4" style="background-position: 50% 88px;"> 
<div class="overlay"></div>            
<div class="container">
    <div class="row">
        <div class="col-md-12">                    
            <div class="page-title-heading">
                <h2 class="title">Blog</h2>
            </div><!-- /.page-title-heading -->
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Blog</li>
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
                <h1 class="bold"><?php echo $blog['title_blog'];?></h1>
                <article class="entry clearfix">
                    <div class="entry-border">
                        <div class="main-post">
                            <div class="wrap-img">
                                
                                <h6><span class="fa fa-user"></span> <?php echo $blog['id_user'];?></h6>
                                <div class="entry-meta">
                                    <span class="date"><a href="#"><?php echo $blog['date_blog'];?></a></span>
                                    <span class="comment"><a href="#"><?php echo $blog['banyak_komentar'];?> comment</a></span>
                                    <span class="tag"><a href="#"><?php echo $blog['title_tag'];?></a></span>
                                </div>
                            </div>  
                            
                            <div class="feature-post">
                                <img src="<?php echo $blog['img_url'];?>" alt="image">
                            </div><!-- /.feature-post -->
                            <div class="entry-content">
                                <?php echo $blog['content_blog'];?>                                  
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

                <div class="comment-post">
                    <?php
                        $this->db->where('id_blog',$blog['id_blog']);
                        $this->db->limit(10);
                        $query = $this->db->get('tbl_comment');
                        $jml = $query->num_rows();
                        $resultComment = $query->result_array();
                    ?>
                    <div class="comment-list-wrap">
                        <h4 class="title comment-title">Comment (<?php echo $jml;?>) </h4>
                        <ul class="comment-list">

                            <?php foreach ($resultComment as $rc) { ?>
                            <li>
                                <article class="comment">
                                    <div class="comment-avatar">
                                        <img src="images/blog/1singlev1.png" alt="">
                                    </div>                  
                                    <div class="comment-detail">
                                        <div class="comment-meta">
                                            <p class="comment-author"><a href="#">
                                                <?php 
                                                $sender = explode('@',$rc['sender']);
                                                echo $sender[0];
                                                ?></a></p> 
                                            <p class="comment-date"><a href=""><?php echo $rc['create_date']?></a></p> 
                                        </div>

                                        <p class="comment-body"><?php echo $rc['content_comment']?></p>
                                    </div><!-- /.comment-detail -->
                                </article><!-- /.comment -->
                            </li>
                            <?php } ?>

                        </ul><!-- /.comment-list -->
                    </div><!-- /.comment-list-wrap -->

                    <div id="respond" class="comment-respond">
                        <h4 class="title comment-title style1">Leave a comment</h4>
                        
                        <?php echo form_open('frontend/blog/commentSend/'.$blog['id_blog'],'class="flat-contact-form" id="contactform5" method="post"') ?>
                            <input type="text" value="" tabindex="1" placeholder="Name*" name="name" id="name" required="" style="">
    
                            <textarea class="type-input" tabindex="3" placeholder="Comment*" name="message" id="message-contact" required=""></textarea>
                    
                            <button type="submit" class="flat-button bg-orange">Post Comment</button>
                
                        </form>
                    
                    </div><!-- /#respond -->
                </div><!-- /.comment-post -->
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