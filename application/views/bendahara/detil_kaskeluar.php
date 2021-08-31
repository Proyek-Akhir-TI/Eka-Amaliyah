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
            <h1 class="h3 mb-0 text-gray-800">Rincian Tanggal Pengeluaran: <?php echo $tgl;?></h1>
           
          </div>

          <?php echo $this->session->flashdata('data');?>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"><a href="<?php echo base_url();?>Bendahara/datakaskeluar" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a></h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Kode Pengeluaran</th>
                        <th>Keterangan</th>
                        <th>Gaji Karyawan</th>
                        <th>Nama Karyawan</th>
                        <th>Tanggal Pengeluaran</th>
                        <th>Pembelian Per. Praktik</th>
                        <th>Pembayaran Wifi</th>
                        <th>Pembayaran Telepon</th>
                        <th>Pembayaran Listrik</th>
                        <th>Belanja ATK</th>
                        <th>Jumlah</th>
                        

                      </tr>
                    </thead>
                    <tbody>
                      

                      <?php foreach($pengeluaran as $a){?>
                      <tr>
                        <td><?php echo $a->kode_pengeluaran;?></td>
                        <td><?php echo $a->ket_keluar;?></td>
                        <td><?php echo $a->gaji_karyawan;?></td>
                        <td><?php echo $a->nama_karyawan;?></td>
                        <td><?php echo $a->tanggal_kaskeluar;?></td>
                        <td><?php echo $a->pembelian_peralatanpraktik;?></td>
                        <td><?php echo $a->pembayaran_wifi;?></td>
                        <td><?php echo $a->pembayaran_telepon;?></td>
                        <td><?php echo $a->pembayaran_listrik;?></td>
                        <td><?php echo $a->belanja_atk;?></td>
                        <td><?php echo $a->total;?></td>
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
