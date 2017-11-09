
<div class="page-title parallax parallax4" style="background-position: 50% 88px;"> 
<div class="overlay"></div>            
<div class="container">
    <div class="row">
        <div class="col-md-12">                    
            <div class="page-title-heading">
                <h2 class="title">Payment</h2>
            </div><!-- /.page-title-heading -->
            <div class="breadcrumbs">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Payment</li>
                </ul>                   
            </div><!-- /.breadcrumbs --> 
        </div><!-- /.col-md-12 -->  
    </div><!-- /.row -->  
</div><!-- /.container -->                      
</div>

<section class="main-content blog-posts style-v1">
<div class="container">
    <div class="row">
        <div class="col-md-12" id="detailLesson">
            <center>
                <h3>LET'S START</h3>
                <p>try to relax</p>
                <p>--- AND ---</p>
                <p>please check your account, email and make payment.</p>
                <?php 
                if($this->session->userdata('isLoginClient') == true)
                {
                    $stat = $this->session->userdata('name');
                } else {
                    $stat = "Login"; 
                }
                ?>
                <?php echo anchor('frontend/register','<i class="fa fa-sign-in"></i> '.$stat);?>
            </center>
        </div><!-- /col-md-8 -->
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