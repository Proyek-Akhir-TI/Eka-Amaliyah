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
            <h1 class="h3 mb-0 text-gray-800">Data Karyawan</h1>
           
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  
                </div>
                
                <div class="card-body">
                <form action="<?php echo base_url();?>Bendahara/update_karyawan" method="post">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">NIK</label>
                      <div class="col-sm-9">
                        <input type="hidden" name="id_karyawan" value="<?php echo $sql->id_karyawan; ?>" class="form-control">
                        <input type="text" name="nip" class="form-control" placeholder="NIK" value="<?php echo $sql->nip; ?>">
                      <font color="red"><?php echo form_error('nip'); ?></font>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Karyawan</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $sql->nama_karyawan; ?>" class="form-control" name="nama_karyawan" placeholder="Nama Karyawan">
                      <font color="red"><?php echo form_error('nama_karyawan'); ?></font>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Jabatan</label>
                      <div class="col-sm-9">
                        <select name="jabatan" class="form-control">

                          <?php if($sql->jabatan!=null){?> 
                          <option value="<?php echo $sql->jabatan; ?>"><?php echo $sql->jabatan; ?></option>
                          <?php }?>

                          <?php if($sql->jabatan==null){?> 
                          <option value="">Pilih Jabatan</option>
                          <?php }?>

                        <option value="Bendahara">Bendahara</option>
                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                        
                          
                        </select>
                      <font color="red"><?php echo form_error('jabatan'); ?></font>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Tempat Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $sql->tempat_lahir; ?>" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                      <font color="red"><?php echo form_error('tempat_lahir'); ?></font>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="datepicker" name="tanggal_lahir" value="<?php echo $sql->tanggal_lahir; ?>" placeholder="Tanggal Lahir">
                        <font color="red"><?php echo form_error('tanggal_lahir'); ?></font>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">No. Rekening</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="no_rekening" value="<?php echo $sql->no_rekening; ?>" placeholder="No. Rekening">
                        <font color="red"><?php echo form_error('no_rekening'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">No. Telepon</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="no_telepon" value="<?php echo $sql->no_telepon; ?>" placeholder="No. Telepon">
                        <font color="red"><?php echo form_error('no_telepon'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <textarea name="alamat" class="form-control"><?php echo $sql->alamat; ?></textarea>
                        <font color="red"><?php echo form_error('alamat'); ?></font>
                      </div>
                    </div>
                    
                  
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <a class="btn btn-danger" href="<?php echo base_url();?>Bendahara/datakaryawan">Cancel</a>
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



