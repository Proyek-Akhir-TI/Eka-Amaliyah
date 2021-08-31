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
            <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
           
          </div>

          <?php echo $this->session->flashdata('data');?>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo base_url();?>Admin/form_add_siswa" class="btn btn-primary"><i class="fa fa-pencil"></i> Tambah Siswa</a></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th>Wali Murid</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      

                      <?php foreach($siswa as $a){?>
                      <tr>
                        <td><?php echo $a->nisn;?></td>
                        <td><?php echo $a->nama_siswa;?></td>
                        <td><?php echo $a->jenis_kelamin;?></td>
                        <td><?php echo $a->kelas;?></td>
                        <td><?php echo $a->nama_walimurid;?></td>
                        <td><?php echo $a->alamat;?></td>
                        <td>
                          <acronym title="Ubah">
                          <a href="<?php echo base_url();?>Admin/form_edit_siswa/<?php echo $a->id_siswa;?>/<?php echo $a->kelas;?>"><i class="fa fa-edit"></i></a></acronym> || 
                          <acronym title="Hapus">
                          <a href="<?php echo base_url();?>Admin/hapus_siswa/<?php echo $a->id_siswa;?>" onclick="return confirm('Yakin Menghapus Data Ini?')"><i class="fa fa-trash"></i></a></acronym></td>
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
