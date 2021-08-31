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
            <h1 class="h3 mb-0 text-gray-800">Rincian Tanggal Penerimaan: <?php echo $tgl;?></h1>
           
          </div>

          <?php echo $this->session->flashdata('data');?>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo base_url();?>Kepsek/datakasmasuk" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Tgl. Pembayaran</th>
                        <th>D. Kegiatan</th>
                        <th>D. Praktikum</th>
                        <th>SPP</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Seragam</th>
                        <th>Buku Lks</th>
                        <th>D. Akhir XII</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>

                      </tr>
                    </thead>
                    <tbody>
                      

                      <?php foreach($pembayaran as $a){?>
                      <tr>
                        
                        <td><?php echo $a->nisn;?></td>
                        <td><?php echo $a->nama_siswa;?></td>
                        <td><?php echo $a->kelas;?></td>
                        <td><?php echo $a->jurusan;?></td>
                        <td><?php echo $a->tanggal_pembayaran;?></td>
                        <td><?php echo $a->dana_kegiatan;?></td>
                        <td><?php echo $a->dana_praktikum;?></td>
                        <td><?php echo $a->spp;?></td>
                        <td><?php echo $a->ujian_uts;?></td>
                        <td><?php echo $a->ujian_uas;?></td>
                        <td><?php echo $a->pembayaran_seragam;?></td>
                        <td><?php echo $a->buku_lks;?></td>
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
