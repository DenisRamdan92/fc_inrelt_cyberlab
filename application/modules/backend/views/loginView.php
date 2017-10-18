<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Cyberlab Forensics | Administrator System</title>
        <meta name="author" content="Yogi Gumbira"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- vector map CSS -->
        <link href="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>



        <!-- Custom CSS -->
        <link href="<?php echo base_url(); ?>assets/backend/dist/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!--Preloader-->
        <div class="preloader-it">
            <div class="la-anim-1"></div>
        </div>
        <!--/Preloader-->

        <div class="wrapper pa-0">

            <!-- Main Content -->
            <div class="page-wrapper pa-0 ma-0">
                <div class="container-fluid">
                    <!-- Row -->
                    <div class="table-struct full-width full-height">
                        <div class="table-cell vertical-align-middle">
                            <div class="auth-form  ml-auto mr-auto no-float">
                                <div class="panel panel-default card-view mb-0">
                                    <div class="panel-heading">
                                        <div class="pull-left">
                                            <!-- <img src/assets/images/asset-02.png" class="img-responsive"> -->
                                            <h6 class="panel-title txt-dark">Sign In</h6>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="panel-wrapper collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-xs-12">
                                                    <div class="form-wrap">
                                                            <?php echo form_open('backend/Login/login',"method='post'")?>
                                                                <?php if ($this->session->flashdata('msg_error_login')) { ?>
                                                                    <div class="alert alert-danger margin-bottom-30">
                                                                        <button type="button" class="close" data-dismiss="alert">
                                                                            <span aria-hidden="true">×</span>
                                                                            <span class="sr-only">Hilangkan</span>
                                                                        </button>
                                                                        <strong>Perhatian !</strong>   <?php echo $this->session->flashdata('msg_error_login'); ?> 
                                                                    </div>
                                                                <?php } ?>
                                                                <div class="form-group">
                                                                        
                                                                    <label class="control-label mb-10" for="exampleInputEmail_2">Nama pengguna </label> <label style="color: red"><?php echo form_error('username') ?></label>
                                                                    <div class="input-group">
                                                                        <input type="text" name="username" class="form-control" id="exampleInputEmail_2" value="yogi<?php echo set_value('username');
                                                                if (isset($_COOKIE['remember_me'])) {
                                                                    echo $_COOKIE['remember_me'];
                                                                } ?>">
                                                                        <div class="input-group-addon"><i class="icon-user-following"></i></div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    
                                                                    <label class="control-label mb-10" for="exampleInputpwd_2">Kata sandi </label> <label style="color: red"><?php echo form_error('password') ?></label>
                                                                    <div class="input-group">
                                                                        <input type="password" name="password" class="form-control" id="exampleInputpwd_2" value="bismillah1994<?php echo set_value('password') ?>">
                                                                        <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="checkbox checkbox-success pr-10 pull-left">
                                                                        <input id="checkbox_2"  type="checkbox" <?php if (isset($_COOKIE['remember_me'])) {
                                                                    echo 'checked="checked"';
                                                                } else {
                                                                    echo '';
                                                                } ?>>
                                                                        <label for="checkbox_2"> Biarkan saya tetap masuk </label>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit" name="masuk" class="btn btn-success btn-block">Masuk</button>
                                                                </div>
                                                                <div class="form-group mb-0">
                                                                    <center>
                                                                        <small style="font-size: 10px;">RSUD Cikalong Wetan, Kab Bandung Barat Jawa Barat</small>
                                                                    </center>

                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->	
                </div>

            </div>
            <!-- /Main Content -->

        </div>
        <!-- /#wrapper -->

        <!-- JavaScript -->

        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/backend/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

        <!-- Slimscroll JavaScript -->
        <script src="<?php echo base_url(); ?>assets/backend/dist/js/jquery.slimscroll.js"></script>

        <!-- Fancy Dropdown JS -->
        <script src="<?php echo base_url(); ?>assets/backend/dist/js/dropdown-bootstrap-extended.js"></script>

        <!-- Init JavaScript -->
        <script src="<?php echo base_url(); ?>assets/backend/dist/js/init.js"></script>
    </body>
</html>
