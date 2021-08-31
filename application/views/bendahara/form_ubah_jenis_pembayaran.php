<?php $this->load->view('template/head');?>

<body id="page-top">
  <div id="wrapper">

<?php $this->load->view('template/sidebaradmin');?>
    
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        
<?php $this->load->view('template/topbar');?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Data Jenis Pembayaran <?php echo $jp_all->jenis_pembayaran;?></h1>
            
          </div>
           <?php echo $this->session->flashdata('datagagal');?>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  
                </div>
                
                <div class="card-body">
                <form action="<?php echo base_url();?>Bendahara/update_jenis_pembayaran" method="post">


                        <input type="hidden" value="<?php echo $jp_all->id_jenis_pembayaran;?>" name="id_jenis_pembayaran" class="form-control">

                        <input type="hidden" name="jenis_pembayaran" required class="form-control" placeholder="Jenis Pembayaran" value="<?php echo $jp_all->jenis_pembayaran;?>">
                     

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Nominal</label>
                      <div class="col-sm-9">
                        <input type="text" name="nominal" required class="form-control" placeholder="Nominal" value="<?php echo $jp_all->nominal;?>">
                      <font color="red"><?php echo form_error('nominal'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Cicilan</label>
                      <div class="col-sm-9">
                        <input type="text" name="cicilan" value="<?php echo $jp_all->cicilan;?>" required class="form-control" placeholder="Cicilan" value="<?php echo set_value('cicilan'); ?>">
                      <font color="red"><?php echo form_error('cicilan'); ?></font>
                      </div>
                    </div>
					
					<div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Cicilan 2</label>
                      <div class="col-sm-9">
                        <input type="text" name="cicilan2" value="<?php echo $jp_all->cicilan2;?>" required class="form-control" placeholder="Cicilan" value="<?php echo set_value('cicilan'); ?>">
                      <font color="red"><?php echo form_error('cicilan2'); ?></font>
                      </div>
                    </div>
                    
                    
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <a class="btn btn-danger" href="<?php echo base_url();?>Bendahara/jenispembayaran">Cancel</a>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                      </div>
                    </div>
                  </form>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->



        <?php $this->load->view('template/foot');?>
      </div>



