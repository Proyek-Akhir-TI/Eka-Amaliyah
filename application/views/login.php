<?php

$this->load->view('template/head_login');

?>

<!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4"><img src="<?php echo base_url();?>assets/a.jpeg" width="200" height="200"></h1><br>
                    
                    <h1 class="h4 text-gray-900 mb-4"><?php echo $this->session->flashdata('data'); ?><?php echo $this->session->flashdata('auth'); ?></h1>
                  </div>
                  
                  <form method="post" action="<?php echo base_url();?>Auth/login">
                    <div class="form-group">
                      <input type="text" class="form-control" value="<?php echo set_value('username');?>" name="username" placeholder="Username">
                      <font color="red"><?php echo form_error('username');?></font>
                    </div>
                    <div class="form-group">
                      <input type="password" value="<?php echo set_value('password');?>" class="form-control" name="password" placeholder="Password">
                    <font color="red"><?php echo form_error('password');?></font>
                    </div>
                   
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                  </form>
                  
                  <!--<hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="register.html">Create an Account!</a>
                  </div>
                  <div class="text-center">
                  </div>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->

	<?php $this->load->view('template/foot_login'); ?>
