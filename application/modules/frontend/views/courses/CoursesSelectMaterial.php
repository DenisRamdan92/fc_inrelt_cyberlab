<?php
                    foreach($results as $r):
                ?>

                <div class="flat-course flat-hover-zoom">
                    <div class="featured-post">             
                        <div class="overlay">
                            <div class="link"></div>
                        </div>
                        <div class="entry-image">
                            <a href="courses-single.html"><img src="<?php echo $r->url_image;?>" alt="Course1"></a>
                        </div>
                    </div><!-- /.featured-post -->

                    <div class="course-content">
                        <h4><a href="courses-single.html"><?php echo $r->title_courses;?></a> </h4>

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
                                <h6>Rp.<?php echo number_format($r->price,2,',','.')?></h6>
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

                            <a class="~" href="<?php echo base_url('courses/read/').$r->id_courses;?>">SEE MORE</a>
                        </div><!-- /.course-content -->
                </div>

                    <?php endforeach;?>