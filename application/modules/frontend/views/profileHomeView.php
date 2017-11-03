<div class="page-title parallax parallax4"> 
<div class="overlay"></div>            
<div class="container">
    <div class="row">
        <div class="col-md-12">                    
            <div class="page-title-heading">
                <h2 class="title"><?php echo $this->session->userdata('name');?></h2>
            </div><!-- /.page-title-heading -->
            <div class="breadcrumbs">
                <p><b>Welcome to your profile</b></p>                   
            </div><!-- /.breadcrumbs --> 
        </div><!-- /.col-md-12 -->  
    </div><!-- /.row -->  
</div><!-- /.container -->                      
</div><!-- /page-title parallax -->

<section class="main-content blog-posts flat-row course-list have-sidebar">
<div class="container">
    <div class="blog-title clearfix">
        <h1 class="bold">TIME LINE</h1>
    </div>
    <div class="row_course">
        <div class="post-content">

            
        </div>
    <div class="sidebar">

        <div class="widget widget-teacher">
            <h5 class="widget-title">Courses</h5>
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
                            <a href="<?php echo base_url('courses/read/').$res11->id_courses;?>"><?php echo $res11->title_courses;?></a>
                            <p><?php echo $res11->title_material;?></p>
                            <p>Rp.<?php echo number_format($res11->price,2,',','.')?></p>
                        </div>
                    </li>
                <?php  endforeach;?>

            </ul><!-- /popular-news clearfix -->
        </div>
        
        <div class="widget widget-teacher">
            <h5 class="widget-title">Event</h5>
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
                            <a href="<?php echo base_url('courses/read/').$res11->id_courses;?>"><?php echo $res11->title_courses;?></a>
                            <p><?php echo $res11->title_material;?></p>
                            <p>Rp.<?php echo number_format($res11->price,2,',','.')?></p>
                        </div>
                    </li>
                <?php  endforeach;?>

            </ul><!-- /popular-news clearfix -->
        </div>

        
        <div class="widget widget-teacher">
            <h5 class="widget-title">Exam</h5>
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
                            <a href="<?php echo base_url('courses/read/').$res11->id_courses;?>"><?php echo $res11->title_courses;?></a>
                            <p><?php echo $res11->title_material;?></p>
                            <p>Rp.<?php echo number_format($res11->price,2,',','.')?></p>
                        </div>
                    </li>
                <?php  endforeach;?>

            </ul><!-- /popular-news clearfix -->
        </div>

    </div><!-- /sidebar -->

    </div><!-- /row -->
</div><!-- /container -->
</section><!-- /main-content -->
