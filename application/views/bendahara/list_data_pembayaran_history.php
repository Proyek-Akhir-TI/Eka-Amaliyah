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
            <h1 class="h3 mb-0 text-gray-800">History Pembayaran</h1>
           
          </div>

          <?php echo $this->session->flashdata('data');?>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">

                    <form action="<?php echo base_url();?>Bendahara/hasil_history" method="get"> 
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-6 col-form-label">Nama Siswa</label>
                      <div class="col-sm-9">
                        <select name="idsiswa" required class="form-control">

                          <option value="">Pilih Siswa</option>
                                    
                         <?php foreach($nama_siswa as $m){?> 
                                  
                      <option value="<?php echo $m->id_siswa;?>"><?php echo $m->nisn;?> - <?php echo $m->nama_siswa;?></option>
					<?php }?> 

                        </select>
                  
                        <br>

            <select name="semester" required class="form-control">

              <option value="">Pilih Semester</option>
              <option value="Ganjil">Ganjil</option>
              <option value="Genap">Genap</option>
					
                        </select>
                      
                      
                      <br>
                      <input type="submit" value="Lihat" class="btn btn-primary">
                    </form>
                  </div>
                      </div>
                    </div>

                  </h6>
                </div>
               
              </div>
            </div>
          </div>
          <!--Row-->



        <?php $this->load->view('template/foot');?>
      </div>
