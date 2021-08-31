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
            <h1 class="h3 mb-0 text-gray-800">Input Data Pembayaran</h1>
           
          </div>

          <?php echo $this->session->flashdata('data');?>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">
				  <form action="<?php echo base_url();?>Bendahara/form_add_pembayaran" method="get">
					<select name="nama" class="form-control">
                          
						  <option value="">Pilih Siswa</option>
						  <?php foreach($nama as $m){?> 
                                  
          <option value="<?php echo $m->nama_siswa;?>"><?php echo $m->nisn;?>-<?php echo $m->nama_siswa;?></option>
						  <?php }?>  
          </select><br>
						
						<br>
					<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Pilih</button>
					</form>
				  
				  
				  </h6>
				  
                </div>
                
              </div>
            </div>
          </div>
          <!--Row-->



        <?php $this->load->view('template/foot');?>
      </div>
