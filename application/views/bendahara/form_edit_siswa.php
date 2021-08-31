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
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Siswa</h1>
            
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
                <form action="<?php echo base_url();?>Bendahara/update_siswa" method="post">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">NISN</label>
                      <div class="col-sm-9">
                        <input type="hidden" name="id_siswa" value="<?php echo $siswa->id_siswa; ?>" class="form-control">
                        <input type="text" name="nisn" class="form-control" placeholder="NISN" value="<?php echo $siswa->nisn; ?>">
                      <font color="red"><?php echo form_error('nisn'); ?></font>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Siswa </label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $siswa->nama_siswa; ?>" class="form-control" name="nama_siswa" placeholder="Nama Siswa">
                      <font color="red"><?php echo form_error('nama_siswa'); ?></font>
                      </div>
                    </div>

                     <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Tempat Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $siswa->tempat; ?>" class="form-control" name="tempat" placeholder="Tempat Lahir">
                      <font color="red"><?php echo form_error('tempat'); ?></font>
                      </div>
                    </div>

                      <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="datepicker_pembayaran" name="tanggal_lahir" value="<?php echo $siswa->tanggal_lahir; ?>" placeholder="Tanggal Lahir">
                        <font color="red"><?php echo form_error('tanggal_lahir'); ?></font>
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-9">
                        <select name="jenis_kelamin" class="form-control">
                           
                           <?php if($siswa->jenis_kelamin!=null && $siswa->jenis_kelamin=='L'){?> 
                                  <option value="<?php echo $siswa->jenis_kelamin; ?>">Laki-laki</option>
                                    <?php }?>

                            <?php if($siswa->jenis_kelamin!=null && $siswa->jenis_kelamin=='P'){?> 
                                  <option value="<?php echo $siswa->jenis_kelamin; ?>">Perempuan</option>
                                    <?php }?>

                                    <?php if($siswa->jenis_kelamin==null){?> 
                                  <option value="">Pilih Jenis Kelamin</option>
                                    <?php }?>

                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      <font color="red"><?php echo form_error('jenis_kelamin'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Jurusan</label>
                      <div class="col-sm-9">
                        <select name="jurusan" class="form-control">
                          
                           <?php if($siswa->jurusan!=null){?> 
                                  <option value="<?php echo $siswa->jurusan; ?>"><?php echo $siswa->jurusan; ?></option>
                                    <?php }?>

                                    <?php if($siswa->jurusan==null){?> 
                                  <option value="">Pilih Jurusan</option>
                                    <?php }?>

                         <?php foreach ($jurusan as $k) {?>
                          
                          <option value="<?php echo $k->jurusan;?>"><?php echo $k->jurusan;?></option>

                          <?php }?>
                        </select>
                      <font color="red"><?php echo form_error('jurusan'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Kelas</label>
                      <div class="col-sm-9">
                        <select name="kelas" class="form-control">
                           
                          <?php if($siswa->kelas!=null){?> 
                                  <option value="<?php echo $siswa->kelas; ?>"><?php echo $siswa->kelas; ?></option>
                                    <?php }?>

                                    <?php if($siswa->kelas==null){?> 
                                  <option value="">Pilih Kelas</option>
                                    <?php }?>

                          <?php foreach ($kelas as $k) {?>
                          
                          <option value="<?php echo $k->kelas;?>"><?php echo $k->kelas;?></option>

                          <?php }?>
                        </select>
                      <font color="red"><?php echo form_error('kelas'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Tingkat Kelas</label>
                      <div class="col-sm-9">
                        <select name="tingkat" class="form-control">
                           
                          <?php if($siswa->tingkat!=null){?> 
                                  <option value="<?php echo $siswa->tingkat; ?>"><?php echo $siswa->tingkat; ?></option>
                                  <option value="">Pilih Tingkat Kelas</option>
                          <option value="X">X</option>
                          <option value="XI">XI</option>
                          <option value="XII">XII</option>
                          <?php }?>

                                    <?php if($siswa->tingkat==null){?> 
                                  <option value="">Pilih Tingkat Kelas</option>
                          <option value="X">X</option>
                          <option value="XI">XI</option>
                          <option value="XII">XII</option>
                                    <?php }?>

                          
                          
                        </select>
                      <font color="red"><?php echo form_error('kelas'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Tahun Ajaran</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $siswa->tahun_ajaran; ?>" class="form-control" name="tahun_ajaran" placeholder="Tahun Ajaran">
                      <font color="red"><?php echo form_error('tahun_ajaran'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Wali Murid</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $siswa->nama_walimurid; ?>" class="form-control" name="nama_walimurid" placeholder="Nama Wali Murid">
                      <font color="red"><?php echo form_error('nama_walimurid'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">No. Telepon Wali Murid</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="no_telepon_walimurid" value="<?php echo $siswa->no_telepon_walimurid; ?>" placeholder="No. Telepon Wali Murid">
                        <font color="red"><?php echo form_error('no_telepon_walimurid'); ?></font>
                      </div>
                    </div>
                    
                   <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Agama</label>
                      <div class="col-sm-9">
                        <select name="agama" class="form-control">
                           
                           <?php if($siswa->agama!=null){?> 
                                  <option value="<?php echo $siswa->agama; ?>"><?php echo $siswa->agama; ?></option>
                                    <?php }?>

                                    <?php if($siswa->agama==null){?> 
                                  <option value="">Pilih Agama</option>
                                    <?php }?>

                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Buddha">Buddha</option>

                        </select>
                      <font color="red"><?php echo form_error('agama'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <textarea name="alamat" class="form-control"><?php echo $siswa->alamat; ?></textarea>
                        <font color="red"><?php echo form_error('alamat'); ?></font>
                      </div>
                    </div>
                    
                  
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <a class="btn btn-danger" href="<?php echo base_url();?>Bendahara/datasiswa">Cancel</a>
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



