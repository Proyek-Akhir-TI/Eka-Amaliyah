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
            <h1 class="h3 mb-0 text-gray-800">Data Pembayaran</h1>
           
          </div>

          <?php echo $this->session->flashdata('data');?>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">
				  <form action="<?php echo base_url();?>Bendahara/filterpembayaran" method="get">
					<select name="nama" class="form-control">
                          
						  <option value="">Pilih Siswa</option>
						  <?php foreach($nama_siswa as $m){?> 
                                  
                                  <option value="<?php echo $m->nama_siswa;?>"><?php echo $m->nisn;?>-<?php echo $m->nama_siswa;?></option>
						  <?php }?>  
          </select><br>
						
					<input type="text" autocomplete="off" class="form-control" id="datepicker_pembayaran" name="tanggal" placeholder="Tanggal Awal">
			<br>
          <input type="text" autocomplete="off" class="form-control" id="datepicker_pembayaran_akhir" name="tanggal_akhir" placeholder="Tanggal Akhir">

						<br>
					<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Lihat</button>
					<a href="<?php echo base_url();?>Bendahara/datapembayaran" class="btn btn-primary"><i class="fa fa-search"></i> Data Pembayaran</a>
					<a href="<?php echo base_url();?>Bendahara/nama_siswa" class="btn btn-primary"><i class="fa fa-pencil"></i> Tambah Pembayaran</a>
					</form>
				  
				  
				  </h6>
				  
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Semester</th>
                        <th>Tgl. Pembayaran</th>
                        <th>D. Kegiatan</th>
                        <th>PSG</th>
                         <th>UKK</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>D. Akhir XII</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      

                    <?php foreach($pembayaran_all as $a){?>
                      <tr>
                        <td><?php echo $a->nisn;?></td>
                        <td><acronym title="Lihat History Pembayaran"><a href="<?php echo base_url();?>Bendahara/hasil_history?nisn=<?php echo $a->nisn;?>"><?php echo $a->nama_siswa;?></a></acronym></td>
                        <td><?php echo $a->kelas;?></td>
                        <td><?php echo $a->jurusan;?></td>
                        <td><?php echo $a->semester;?></td>
                        <td><?php echo $a->tanggal_pembayaran;?></td>
                        <td><?php echo $a->dana_kegiatan;?></td>
                        <td><?php echo $a->psg;?></td>
                         <td><?php echo $a->ukk;?></td>
                        <td><?php echo $a->ujian_uts;?></td>
                        <td><?php echo $a->ujian_uas;?></td>
                        <td><?php echo $a->dana_akhir12;?></td>
                        <td><?php echo $a->jumlah;?></td>
                        <td><?php echo $a->keterangan;?></td>
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
