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
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Karyawan</h1>
            
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
                <form action="<?php echo base_url();?>Bendahara/insert_karyawan" method="post">
                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">NIK</label>
                      <div class="col-sm-9">
                        <input type="hidden" name="id_karyawan" class="form-control">
                        <input type="hidden" name="id_user" value="<?php echo $jml_user->id_user+1;?>" class="form-control">
                        <input type="text" name="nip" class="form-control" placeholder="NIK" value="<?php echo set_value('nip'); ?>">
                      <font color="red"><?php echo form_error('nip'); ?></font>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Karyawan </label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo set_value('nama_karyawan'); ?>" class="form-control" name="nama_karyawan" placeholder="Nama Karyawan">
                      <font color="red"><?php echo form_error('nama_karyawan'); ?></font>
                      </div>
                    </div>
                    
                    <?php if($count_cek_kepsek!=0 && $count_cek_bendahara!=0){?>
                    <input type="hidden" value="Karyawan" class="form-control" name="jabatan">
                    <?php }?>


                     <?php if($count_cek_kepsek==0 || $count_cek_bendahara==0){?>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Jabatan</label>
                      <div class="col-sm-9">
                        <select name="jabatan" class="form-control">
                        


                           <?php if(set_value('jabatan')!=null){?> 

                                  <option value="<?php echo set_value('jabatan'); ?>"><?php echo set_value('jabatan'); ?></option>

                                  <?php if($count_cek_kepsek==0 && $count_cek_bendahara==0){?>

                                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Karyawan">Karyawan</option>
                                   
                                   <?php }?>

                                   <?php if($count_cek_bendahara!=0 && $count_cek_kepsek==0){?>

                                    <option value="Karyawan">Karyawan</option>
                                    <option value="Kepala Sekolah">Kepala Sekolah</option>

                                   <?php }?>

                                   <?php if($count_cek_kepsek!=0 && $count_cek_bendahara==0){?>

                                    <option value="Karyawan">Karyawan</option>
                                    <option value="Bendahara">Bendahara</option>

                                   <?php }?>
                          
                                    <?php }?>


                                  <?php if(set_value('jabatan')==null){?> 

                                  <option value="">Pilih Jabatan</option>
                                   
                                   <?php if($count_cek_kepsek==0 && $count_cek_bendahara==0){?>

                                    <option value="Kepala Sekolah">Kepala Sekolah</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Karyawan">Karyawan</option>
                                   
                                   <?php }?>

                                   <?php if($count_cek_bendahara!=0 && $count_cek_kepsek==0){?>

                                    <option value="Karyawan">Karyawan</option>
                                    <option value="Kepala Sekolah">Kepala Sekolah</option>

                                   <?php }?>

                                   <?php if($count_cek_kepsek!=0 && $count_cek_bendahara==0){?>

                                    <option value="Karyawan">Karyawan</option>
                                    <option value="Bendahara">Bendahara</option>

                                   <?php }?>
                                    <?php }?>

                                     

                          
                        </select>
                      <font color="red"><?php echo form_error('jabatan'); ?></font>
                      </div>
                    </div>
                  <?php }?>


                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Tempat Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo set_value('tempat_lahir'); ?>" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir">
                      <font color="red"><?php echo form_error('tempat_lahir'); ?></font>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="datepicker" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>" placeholder="Tanggal Lahir">
                        <font color="red"><?php echo form_error('tanggal_lahir'); ?></font>
                      </div>
                    </div>
                     <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">No. Rekening</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="no_rekening" value="<?php echo set_value('no_rekening'); ?>" placeholder="No. Rekening">
                        <font color="red"><?php echo form_error('no_rekening'); ?></font>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">No. Telepon</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="no_telepon" value="<?php echo set_value('no_telepon'); ?>" placeholder="No. Telepon">
                        <font color="red"><?php echo form_error('no_telepon'); ?></font>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Alamat</label>
                      <div class="col-sm-9">
                        <textarea name="alamat" class="form-control"><?php echo set_value('alamat'); ?></textarea>
                        <font color="red"><?php echo form_error('alamat'); ?></font>
                      </div>
                    </div>
                    
                  
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <a class="btn btn-danger" href="<?php echo base_url();?>Bendahara/datakaryawan">Cancel</a>
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



