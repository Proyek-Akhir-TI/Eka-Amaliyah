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
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Kelas</h1>
            
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
                <form action="<?php echo base_url();?>Bendahara/insert_kelas" method="post">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Kelas</label>
                      <div class="col-sm-9">
                        <input type="hidden" name="id_kelas" class="form-control">
                        <input type="text" name="kelas" required class="form-control" placeholder="kelas" value="<?php echo set_value('kelas'); ?>">
                      <font color="red"><?php echo form_error('kelas'); ?></font>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Jurusan</label>
                      <div class="col-sm-9">
					   <select name="jurusan" required class="form-control">

						  <option value="">Pilih Jurusan</option>
                           <?php foreach($jurusan as $m){?> 

                     <option value="<?php echo $m->jurusan;?>"><?php echo $m->jurusan;?></option>
                                   
                                   
						   <?php }?>   
                        </select>
                        <font color="red"><?php echo form_error('jurusan'); ?></font>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <a class="btn btn-danger" href="<?php echo base_url();?>Bendahara/datakelas">Cancel</a>
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



