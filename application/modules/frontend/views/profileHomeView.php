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

    <?php if ($this->session->flashdata('msg_error')) { ?>
        <div class="alert margin-bottom-30">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">×</span>
                <span class="sr-only">Hilangkan</span>
            </button>
            <strong>Attention !</strong>   <?php echo $this->session->flashdata('msg_error'); ?> 
        </div>
    <?php } ?>

    <div class="blog-title clearfix">
        <h1 class="bold">TIME LINE</h1>
    </div>
    <div class="row_course">
        <div class="post-content">
        <div class="post-warp clearfix" id="coursesList">
            
                <?php
                    foreach($results as $r):
                ?>

                <?php
                    if ($r->isAllowed == 1) {
                        $allow = "";
                        $allowButton = "none";
                    } else {
                        $allow = "none";
                        $allowButton = "";
                    }

                ?>
                <div class="flat-course flat-hover-zoom" style="display=">
                    <div class="featured-post">             
                        <div class="overlay">
                            <div class="link"></div>
                        </div>
                        <div class="entry-image">
                            <a href="<?php echo base_url('frontend/courses/lessonList/').$r->id_courses;?>"><img src="<?php echo $r->url_image;?>" alt="Course1"></a>
                        </div>
                    </div><!-- /.featured-post -->

                    <div class="course-content">
                        
                        <h4><a href="<?php echo base_url() ?>frontend/courses/lessonList/<?php echo $r->id_courses; ?>"><?php echo $r->title_courses;?></a> <p style="display:<?php echo $allow; ?>; color:#E87E04; cursor:pointer;" class="activeAcess" valueOfMoney="<?php echo number_format($r->price,2,',','.')?>" valueOfMoney-o="<?php echo $r->price?>"><b>do not have access <span class="fa fa-unlock"></span></b></p></h4>

                        <div class="price">Rp.<?php echo number_format($r->price,2,',','.')?></div>    
                        
                        <ul class="course-meta review clearfix">
                            <li class="author">
                                <div class="thumb">
                                    <img src="<?php echo $r->url_foto;?>" alt="image">
                                </div>

                                <div class="text">
                                    <a href="#"><?php echo $r->name;?></a>
                                    <p>Teacher</p>
                                </div>
                            </li>

                        </ul> 

                        <?php echo substr($r->content_courses,0,100)."...";?>

                        <ul class="course-meta desc">
                            <li>
                                <h6>
                                <?php 
                                if ($r->price == null)
                                {
                                    echo "Free";
                                } else {
                                    echo "Rp.".number_format($r->price,2,',','.');
                                }
                                ?>
                                </h6>
                                <span> Price</span>
                            </li>

                            <li>
                                <h6><?php echo $r->jumlah_lesson;?></h6>
                                <span> Lesson</span>
                            </li>

                            <li>
                                <h6><span class="course-time"><?php echo $r->title_material;?></span></h6>
                                <span> Material</span>
                            </li>
                        </ul> 

                            <a class="~" style="display:<?php echo $allowButton; ?>" href="<?php echo base_url('frontend/courses/lessonList/').$r->id_courses;?>">LEARN</a>
                        </div><!-- /.course-content -->
                </div>

                    <?php endforeach;?>


            </div><!-- / .post-wrap -->

            <form method="post">
            <div class="blog-pagination">
                <ul class="flat-pagination">
                    <?php echo $links; ?>                              
                </ul><!-- /.flat-pagination -->
            </div>
            </form>
            
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

<!-- Modal -->
<div id="modalCon" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Confirmation</h4>
        </div>
        <div class="modal-body" style="padding:30px;">
            <ul class="nav nav-tabs">
                <li class="active" id="tab1"><a data-toggle="tab" href="#profile">Payment Form</a></li>
                <li id="tab2"><a data-toggle="tab" href="#menu0">Value</a></li>
                <li id="tab3"><a data-toggle="tab" href="#menu1">Details</a></li>
            </ul>   
        
            <div class="tab-content">
            <?php echo form_open('frontend/profile/paymentInsert', "method='post', id='simpanform' enctype='multipart/form-data'")?>
                    <div id="profile" class="tab-pane fade in active">
                        <br>
                        <h3>Payment Form</h3>
                        <div class="row">
                            <div class="form-group col-sm-5">
                                <div class="">
                                    <input type="text" class="form-control" id="confirmation-number" name="confirmation-number" placeholder="Confirmation Number" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-5">
                                <div class="">
                                    <input type="hidden" id="account-of-destination-o" name="account-of-destination-o"> 
                                    <input type="text" class="form-control" id="account-of-destination" name="account-of-destination" placeholder="Account of Destination" readonly required>
                                </div>
                            </div>
                            <div class="form-group col-sm-2">
                                <div class="">
                                    <button class="form_control" id="bankButton"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu0" class="tab-pane fade">
                        <br>
                        <h3>Value</h3>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <div class="input-group">
                                <input type="hidden" id="value-of-money-o" name="value-of-money-o">                            
                                    <span class="input-group-addon">Rp.</span>
                                    <input type="text" class="form-control" id="value-of-money" name="value-of-money" placeholder="Values" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <br>
                        <h3>Proof of Payment</h3>
                        <p><span class="fa fa-question"></span> upload photos to be used as proof of payment</p>                    
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <div class="">
                                    <input type="file" class="urlSlider" id="urlSlider" name="urlSlider" placeholder="Confirmation Number" required>
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <div class="">
                                    <textarea class="form-control" name="information" id="information" cols="3" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input name="send" class="black-btn" value="Confirmation" type="submit">
                </form>
            </div>
     
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input name="send" class="black-btn" value="Confirmation" type="submit">
            </div> -->
        </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="bankList" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bank <small>List</small></h4>
      </div>
      <div class="modal-body">
      <?php
      
        $query = $this->db->get('tbl_bank');
        $result = $query->result_array();
        foreach ($result as $r) { ?>

        <div class="row">
            <div class="col-sm-4">
                <?php echo $r['number_rekening']?>
            </div>
            <div class="col-sm-4">
                <?php echo $r['name_bank']?>
            </div>
            <div class="col-sm-4">
                <button class="flat-button takeBank" name_bank="<?php echo $r['name_bank']?>" number_rekening="<?php echo $r['number_rekening']?>"><span><i class="fa fa-plus"></i></span></button>
            </div>
        </div>
        <hr>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
    $(document).ready(function(){

        $('#menu0').hide();
        $('#menu1').hide();

        $(document).on('click','.activeAcess',function(){
           var valueOfMoney =  $(this).attr('valueOfMoney');
           var valueOfMoney_o =  $(this).attr('valueOfMoney-o');
            $('#modalCon').modal('show');
            $('#header').hide();
            $('#value-of-money').val(valueOfMoney);
            $('#value-of-money-o').val(valueOfMoney_o);
        });
        $('#modalCon').on('hidden.bs.modal', function () {
            $('#header').show();
        });
        $(document).on('click','#bankButton',function(){
            $('#bankList').modal('show');
        });
        $(document).on('click','.takeBank',function(){
            var number_rekening = $(this).attr('number_rekening');
            var name_rekening = $(this).attr('name_bank');
            $('#account-of-destination').val(name_rekening);
            $('#account-of-destination-o').val(number_rekening);
            $('#bankList').modal('hide');
        });
        $(document).on('click','#tab1',function(){
            $('#profile').show();
            $('#menu0').hide();
            $('#menu1').hide();
        });
        $(document).on('click','#tab2',function(){
            $('#menu0').show();
            $('#profile').hide();
            $('#menu1').hide();
        });
        $(document).on('click','#tab3',function(){
            $('#menu1').show();
            $('#profile').hide();
            $('#menu0').hide();
        });
    });
</script>