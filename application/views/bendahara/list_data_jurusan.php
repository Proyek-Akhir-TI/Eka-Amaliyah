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
            <h1 class="h3 mb-0 text-gray-800">Data Jurusan</h1>
           
          </div>

          <?php echo $this->session->flashdata('data');?>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo base_url();?>Bendahara/datakelas" class="btn btn-primary"> Data Kelas</a>
				  <a href="<?php echo base_url();?>Bendahara/form_add_jurusan" class="btn btn-primary"><i class="fa fa-pencil"></i> Tambah Jurusan</a></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        
                        <th>Jurusan</th>
                       <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      

                      <?php foreach($kelas as $a){?>
                      <tr>
                        
                        <td><?php echo $a->jurusan;?></td><td>
                          <acronym title="Ubah">
                          <a href="<?php echo base_url();?>Bendahara/form_ubah_jurusan/<?php echo $a->id_jurusan;?>"><i class="fa fa-edit"></i></a></acronym> 
						  || <acronym title="Hapus"><a href="<?php echo base_url();?>Bendahara/hapus_jurusan/<?php echo $a->id_jurusan;?>" onclick="return confirm('Yakin Menghapus Data Ini?')"><i class="fa fa-trash"></i></a></acronym>
                        </td>
                      </tr>
                      <?php }?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->



        <?php $this->load->view('template/foot');?>
      </div>
