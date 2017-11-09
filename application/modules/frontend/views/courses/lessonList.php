
<div class="page-title parallax parallax4" style="background-position: 50% 88px;"> 
<div class="overlay"></div>            
<div class="container">
    <div class="row">
        <div class="col-md-12">                    
            <div class="page-title-heading">
                <h2 class="title">Lesson</h2>
            </div><!-- /.page-title-heading -->
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Lesson</li>
                </ul>                   
            </div><!-- /.breadcrumbs --> 
        </div><!-- /.col-md-12 -->  
    </div><!-- /.row -->  
</div><!-- /.container -->                      
</div>

<section class="main-content blog-posts style-v1">
<div class="container">
    <div class="row">
        <div class="col-md-8" id="detailLesson">
            <center>
                <h3>LET'S START</h3>
                <p>try to relax</p>
                <p>Click one of the lessons on the side.</p>
            </center>
        </div><!-- /col-md-8 -->
        <div class="sidebar">
            <div class="widget widget-popular-news">
                <h5 class="widget-title">Lesson List</h5>
                <ul class="popular-news clearfix">
                    <?php
                    $id = $this->uri->segment(4);
                        $query = $this->db->query("SELECT * FROM tbl_courses a LEFT JOIN tbl_dtl_lesson_courses b ON a.id_courses = b.id_courses LEFT JOIN tbl_lesson c ON b.id_lesson = c.id_lesson where b.id_courses = '$id' ");
                        $result = $query->result_array();
                        foreach($result as $res11):
                    ?>
                    <li>
                        <div class="thumb">
                            <img src="<?php echo $res11['url_image'];?>" width="100px;" class="img-responsive" alt="image">
                        </div>
                        <div class="text">
                            <a href="javascript:void[0]" class="lessonSelect" id_lesson="<?php echo $res11['id_lesson'];?>"><?php echo $res11['title_lesson'];?></a>
                            <p><?php echo $res11['leng_time'];?></p>
                        </div>
                    </li>
                    <?php endforeach;?>

                </ul><!-- /popular-news clearfix -->
            </div><!-- /widget widget-popular-news -->
        </div><!-- /sidebar -->
    </div>
</div><!-- /container -->
</section>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>
<script>
    $(document).ready(function(){
        $(document).on('click','.lessonSelect',function(){
            var id = $(this).attr('id_lesson');
            $('#detailLesson').load("<?php echo base_url()?>frontend/courses/readLesson/"+id);
        });
    });
    </script>