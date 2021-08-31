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
            <h1 class="h3 mb-0 text-gray-800">Ubah Data Jurusan</h1>
            
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
                <form action="<?php echo base_url();?>Bendahara/update_jurusan" method="post">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Jurusan</label>
                      <div class="col-sm-9">
                        <input type="hidden" name="id_jurusan" value="<?php echo $jurusan->id_jurusan;?>" class="form-control">
                        <input type="text" name="jurusan" required class="form-control" value="<?php echo $jurusan->jurusan;?>">
                      <font color="red"><?php echo form_error('jurusan'); ?></font>
                      </div>
                    </div>
                    
                    
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <a class="btn btn-danger" href="<?php echo base_url();?>Bendahara/datajurusan">Cancel</a>
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



