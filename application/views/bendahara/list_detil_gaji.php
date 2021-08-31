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
            <h1 class="h3 mb-0 text-gray-800">Detil Gaji: <?php echo $bulan;?></h1>
           
          </div>

          <?php echo $this->session->flashdata('data');?>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo base_url();?>Bendahara/datagaji" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>NIP</th>
                        <th>Nama Karyawan</th>
                        <th>Jam Kerja</th>
                        <th>Bulan</th>
                        <th>Tgl. Pembayaran Gaji</th>
                        <th>Tunjangan Yayasan</th>
                        <th>Potongan BPJS</th>
                        <th>Potongan Simp. Sejahtera</th>
                        <th>Potongan Rumah Infaq</th>
                        <th>Potongan Lain</th>
                        <th>Total Gaji</th>
                        
                        
                      </tr>
                    </thead>
                    <tbody>
                      

                      <?php foreach($detil as $a){?>
                      <tr>
                        <td><?php echo $a->nip;?></td>
                        <td><?php echo $a->nama_karyawan;?></td>
                        <td><?php echo $a->jumlah_jam_kerja;?> Jam</td>
                        <td><?php echo $a->bulan;?></td>
                        <td><?php echo $a->tanggal_pembayaran_gaji;?></td>
                        <td><?php echo $a->tunjangan_yayasan;?></td>
                        <td><?php echo $a->potongan_bpjs;?></td>
                        <td><?php echo $a->potongan_simpanansejahtera;?></td>
                        <td><?php echo $a->potongan_rumahinfaq;?></td>
                        <td><?php echo $a->potongan_lainlain;?></td>
                        <td><?php echo $a->total_gaji;?></td>
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
