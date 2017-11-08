<script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>
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

<section class="main-content blog-posts blog-grid have-sidebar">
<div class="container">
    <div class="blog-title">
        <h1 class="bold">PROGRESS</h1>
    </div>

    <div class="post-content">
        
        <div class="post-wrap clearfix">
        
        </div><!-- /post-wrap -->
          
    </div>

        <div class="sidebar">
            <div class="widget widget-popular-news">
                <h5 class="widget-title"><?php echo $student['name']?> detail profile</h5>
                <ul class="popular-news clearfix">
                    <li>
                            <img src="<?php echo $student['url_foto']?>" class="img-thumbnail" alt="image">
                        <div class="text">
                            <a href="#"> Name : <?php echo $student['name']?></a>
                            <br><br>
                            <p><span class="fa fa-map-marker"></span> Address : <?php echo $student['address']?></p>
                            <p><span class="fa fa-check"></span> Insteresting to : <?php echo $student['insteresting_to']?></p>
                            <p><span class="fa fa-envelope"></span> Email : <?php echo $student['email']?></p>
                            <p><span class="fa fa-phone"></span> Phone : <?php echo $student['telp']?></p>
                            <hr>
                            <button type="button" class="flat-button" data-toggle="modal" data-target="#editProfile">Edit Profile</button>
                        </div>
                    </li>
                </ul><!-- /popular-news clearfix -->
            </div><!-- /widget widget-popular-news -->
            <div class="widget widget-teacher">
                <h5 class="widget-title">SCORE</h5>
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
</section>

    <!-- Modal -->
    <div id="editProfile" class="modal fade" role="dialog" style="z-index: 999999999;">
        <div class="modal-dialog modal-lg">

        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Profile <small><img id="loading" style="display:none;" src="<?php echo base_url()?>assets/frontend/images/loading.gif"></small></h4>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
                        <li><a data-toggle="tab" href="#menu1">Social Media</a></li>
                        <li><a data-toggle="tab" href="#menu2">Word</a></li>
                    </ul>   
                
                    <div class="tab-content">
                        <input type="hidden" id="id_student" value="<?php echo $this->session->userdata('id_student');?>">
                        <div id="profile" class="tab-pane fade in active">
                            <br>
                            <h3>Profile</h3>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $student['name']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="place_of_birth" placeholder="Place of Birth" value="<?php echo $student['place_of_birth']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" id="date_of_birth" placeholder="Date Of Birth" value="<?php echo $student['date_of_birth']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="country" placeholder="Country" value="<?php echo $student['country']?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="<?php echo $student['gender']?>"><?php echo $student['gender']?></option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <textarea name="address" id="address" style="height:75px;" placeholder="address"><?php echo $student['address']?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <br>
                            <h3>Social Media</h3>
                            <div class="row">
                                <form action="#">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="phone" placeholder="Phone" value="<?php echo $student['telp']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $student['email']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="public_username" placeholder="Public Username" value="<?php echo $student['public_username']?>">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <br>
                            <h3>Word</h3>
                            <div class="row">
                                <form action="#">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="last_edu" placeholder="Last Education" value="<?php echo $student['last_edu']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="insteresting_to" placeholder="Insteresting To" value="<?php echo $student['insteresting_to']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="testimonials" placeholder="Testimonials" value="<?php echo $student['testimonials']?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="sugestion" placeholder="Sugestion" value="<?php echo $student['sugestion']?>">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-sm-12">
                            <button class="flat-button" id="save">Save Change</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<script type="text/javascript">
        $(document).ready(function(){
            $(document).on("click","#save",function(){
                $.ajax({
                    type:"POST",
                    error: function(){
                        alert('Error!');
                    },
                    data:"name="+$.trim($("#name").val())+"&place_of_birth="+$.trim($("#place_of_birth").val())+"&date_of_birth="+$.trim($("#date_of_birth").val())+"&country="+$.trim($("#country").val())+"&gender="+$.trim($('#gender').val())+"&address="+$.trim($('#address').val())+"&id_student="+$.trim($('#id_student').val())+"&phone="+$.trim($('#phone').val())+"&email="+$.trim($('#email').val())+"&public_username="+$.trim($('#public_username').val())+"&last_edu="+$.trim($('#last_edu').val())+"&insteresting_to="+$.trim($('#insteresting_to').val())+"&testimonials="+$.trim($('#testimonials').val())+"&sugestion="+$.trim($('#sugestion').val()),
                    url:"<?php echo base_url();?>frontend/profile/insert",
                    dataType:"json",
                    beforeSend: function(){
                    $("#loading").show();
                    },
                    success: function(data){
                        if(data.error=='1'){
                            alert(data.message);
                            $("#loading").hide();
                        }else{
                            $("#close").click();
                            $("#loading").hide();
                        }
                    }
                });
            });
        });
</script>