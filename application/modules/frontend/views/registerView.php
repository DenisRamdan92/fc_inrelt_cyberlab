<div class="page-title parallax parallax4"> 
        	<!-- <div class="overlay"></div> -->     
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <br><br><br><br>                    
                        <div class="page-title-heading">
                            <h2 class="title">LOGIN & REGISTRATION</h2>
                        </div><!-- /.page-title-heading -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li>Login & Registration</li>
                            </ul>                   
                        </div><!-- /.breadcrumbs --> 
                    </div><!-- /.col-md-12 -->  
                </div><!-- /.row --> 
            </div><!-- /.container -->                      
        </div><!-- /page-title parallax -->
    	
        <!-- About -->
            <section class="flat-row pad-top-100 flat-about">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1>Log In</h1>
                            <h3>Already a Member? Log in here.</h3>
                            <?php echo form_open('frontend/register/logincek','medhod="post"')?>
                                <?php if ($this->session->flashdata('msg_error')) { ?>
                                    <div class="alert alert-danger margin-bottom-30">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <span aria-hidden="true">×</span>
                                            <span class="sr-only">Hilangkan</span>
                                        </button>
                                        <strong>Perhatian !</strong>   <?php echo $this->session->flashdata('msg_error'); ?> 
                                    </div>
                                <?php } ?>
                                
                                <div class="form-group" id="login-login-group">
                                    <label for="login-input-login">Login</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    </div>
                                 </div>
                                
                                <div class="form-group" id="login-password-group">
                                    <label for="login-input-password">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
                                        <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    </div>
                                </div>
                                
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>

                                <button type="submit" class="flat-button">Log In</button>
                                <a href="#" class="pull-right">Lost your password?</a>
                            </form>
                        </div>

                        <div class="col-sm-6">
                            <h1>Register</h1>
                            <h3>Do not have an account? Register here.</h3>
                            <form role="form" name="register-form" id="register-form">
                                
                                <div class="form-group" id="register-login-group">
                                <label for="register-input-login">Choose Your Login</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="register-input-login" placeholder="Username">
                                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    </div>
                                </div>

                                <div class="form-group" id="register-email-group">
                                <label for="register-input-email">Email</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="register-input-email" placeholder="john.doe@gmail.com">
                                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    </div>
                                </div>
                                
                                <button type="submit" class="flat-button">Register</button>
                            </form>
                        </div>

                    </div>
                </div><!-- /.container -->   
            </section>