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
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Jenis Pembayaran</h1>
            
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
                <form action="<?php echo base_url();?>Bendahara/insert_jenis_pembayaran" method="post">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Pembayaran</label>
                      <div class="col-sm-9">
                        <input type="hidden" name="id_jenis_pembayaran" class="form-control">
                        <input type="text" name="jenis_pembayaran" required class="form-control" placeholder="Jenis Pembayaran" value="<?php echo set_value('jenis_pembayaran'); ?>">
                      <font color="red"><?php echo form_error('jenis_pembayaran'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Nominal</label>
                      <div class="col-sm-9">
                        <input type="text" name="nominal" required class="form-control" placeholder="Nominal" value="<?php echo set_value('nominal'); ?>">
                      <font color="red"><?php echo form_error('nominal'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Cicilan</label>
                      <div class="col-sm-9">
                        <input type="text" name="cicilan" required class="form-control" placeholder="Cicilan" value="<?php echo set_value('cicilan'); ?>">
                      <font color="red"><?php echo form_error('cicilan'); ?></font>
                      </div>
                    </div>
					
					<div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Cicilan 2</label>
                      <div class="col-sm-9">
                        <input type="text" name="cicilan2" required class="form-control" placeholder="Cicilan 2" value="<?php echo set_value('cicilan2'); ?>">
                      <font color="red"><?php echo form_error('cicilan2'); ?></font>
                      </div>
                    </div>
                    
                    
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <a class="btn btn-danger" href="<?php echo base_url();?>Bendahara/jenispembayaran">Cancel</a>
                        <button type="submit" class="btn btn-primary">Tambah</button>
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



