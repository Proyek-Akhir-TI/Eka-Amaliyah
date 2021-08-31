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
                        <select name="idsiswa" class="form-control">

                          <?php if($_GET['idsiswa'] != 0){?>
                          <option value="<?php echo $_GET['idsiswa'];?>"><?php echo $nisn_select?> - <?php echo $siswa_select?></option>
                          <?php }else {?>
                          <option value="">Pilih Siswa</option>
                          <?php }?>

                          <option value="">Pilih Siswa</option>
                          
                          <?php foreach($nama_siswa as $m){?> 
                                  
                      <option value="<?php echo $m->id_siswa;?>"><?php echo $m->nisn;?> - <?php echo $m->nama_siswa;?></option>

					<?php }?> 

                        </select>

                        <br>
<label for="inputPassword3" class="col-sm-6 col-form-label">Semester</label>
                        <br>
<select name="semester" required class="form-control">

<option value="<?php echo $_GET['semester'];?>"><?php echo $_GET['semester'];?></option>                         
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
				
				
				

        <div class="card mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <div class="table-responsive p-3">
				 <h3>Data Pembayaran</h3><br>
         Nama: <?php echo $siswa_select;?><br>
         Kelas: <?php echo $kls;?><br>
         Semester: <?php echo $_GET['semester'];?><br><br>
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                       
                       <th>Keterangan</th>
                        <th>Tgl. Pembayaran</th>
                        <th>Jumlah</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      

                      <?php foreach($detil_nogroup as $ab){?>
                      <tr>
                        
                        <td><?php echo $ab->ket;?></td>
                        <td><a href="<?php echo base_url();?>Bendahara/detil_pembayaran_history/<?php echo $ab->idsis;?>/<?php echo $_GET['semester'];?>"><?php echo $ab->tgl;?></a></td>
                        <td><?php echo $ab->jum;?></td>

                      </tr>
                      <?php }?>

                    </tbody>
                  </table>
                   </div>
				</div>
				</div>


        <?php if($hasil_nisn != 0){?>
        <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="table-responsive p-3">
         <h3>Status Pembayaran</h3>
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                       
                       <th>Keterangan</th>
                       <th>Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                       
                      <tr>
                        <td>Dana Kegiatan</td>
                      <td><?php echo $dankeg;?></td>
                      </tr>

                      <?php if($tingkat == 'XI'){?>
                      <tr>
                        <td>PSG</td>
                       <td><?php echo $psg;?></td>
                      </tr>
                      <?php }else{?>

                      <?php }?>

                      <?php if($tingkat == 'X' || $tingkat == 'XI'){?>   
                      <tr>
                        <td>UKK</td>
                       <td><?php echo $ukk;?></td>
                      </tr>
                      <?php }else{?>
                      
                      <?php }?>

                      <tr>
                        <td>Ujian UTS</td>
                        <td><?php echo $uts;?></td>
                      </tr>

                      <tr>
                        <td>Ujian UAS</td>
                        <td><?php echo $uas;?></td>
                      </tr>

                  <?php if($tingkat == 'XII'){?>
                      <tr>
                        <td>Dana Akhir Kelas XII</td>
                        <td><?php echo $akhir;?></td>
                      </tr>
                  <?php }else{?>
                  
                  <?php }?>

                    </tbody>
                  </table>
                </div>
        </div>
        </div>

      <?php } else{?>

        <div class="card mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <div class="table-responsive p-3">
         <h3>Status Pembayaran</h3>
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                       
                       <th>Keterangan</th>
                       <th>Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                       
                      <tr>
                      <td>Dana Kegiatan</td>
                      <td>Belum Bayar</td>
                      </tr>

                      <?php if($tingkat == 'XI'){?>
                      <tr>
                        <td>PSG</td>
                       <td><?php echo $psg;?></td>
                      </tr>
                      <?php }else{?>

                      <?php }?>

                      <?php if($tingkat == 'X' || $tingkat == 'XI'){?>   
                      <tr>
                        <td>UKK</td>
                       <td><?php echo $ukk;?></td>
                      </tr>
                      <?php }else{?>
                      
                      <?php }?>

                      <tr>
                        <td>Ujian UTS</td>
                        <td>Belum Bayar</td>
                      </tr>

                      <tr>
                        <td>Ujian UAS</td>
                        <td>Belum Bayar</td>
                      </tr>

                  <?php if($tingkat == 'XII'){?>
                      <tr>
                        <td>Dana Akhir Kelas XII</td>
                        <td><?php echo $akhir;?></td>
                      </tr>
                  <?php }else{?>
                  
                  <?php }?>

                    </tbody>
                  </table>
                </div>
        </div>
        </div>

      <?php }?>


              </div>
            </div>
          </div>
          <!--Row-->



        <?php $this->load->view('template/foot');?>
      </div>
