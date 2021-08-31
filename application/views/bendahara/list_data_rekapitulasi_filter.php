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
            <h1 class="h3 mb-0 text-gray-800">Data Rekapitulasi</h1>
           
          </div>

          <?php echo $this->session->flashdata('data');?>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">

        <form action="<?php echo base_url();?>Bendahara/filter_rekapitulasi" method="get">
            
          <?php if($_GET['tanggal']!=null){?>            
            <input type="text" autocomplete="off" class="form-control" id="datepicker_pembayaran" name="tanggal" value="<?php echo $_GET['tanggal'];?>">
            <?php }?>

            <?php if($_GET['tanggal']==null){?>            
            <input type="text" autocomplete="off" class="form-control" id="datepicker_pembayaran" name="tanggal" placeholder="Tanggal Pembayaran Awal <?php echo $_GET['tanggal'];?>">
            <?php }?>
            
            <br>

            <?php if($_GET['tanggal_akhir']!=null){?>            
            <input type="text" autocomplete="off" class="form-control" id="datepicker_pembayaran_akhir" name="tanggal_akhir" value="<?php echo $_GET['tanggal_akhir'];?>">
            <?php }?>

            <?php if($_GET['tanggal_akhir']==null){?>            
            <input type="text" autocomplete="off" class="form-control" id="datepicker_pembayaran_akhir" name="tanggal_akhir" placeholder="Tanggal Pembayaran Akhir <?php echo $_GET['tanggal_akhir'];?>">
            <?php }?>

            <br>
          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Lihat</button>
          <a href="<?php echo base_url();?>Bendahara/datarekapitulasi" class="btn btn-primary"><i class="fa fa-search"></i> Data Rekapitulasi</a>
          <a href="<?php echo base_url();?>Bendahara/cetak_datarekapitulasi_filter?tanggal=<?php echo $_GET['tanggal'];?>&tanggal_akhir=<?php echo $_GET['tanggal_akhir'];?>" class="btn btn-success"><i class="fa fa-print"></i> Cetak Data Rekapitulasi</a>
          </form> 
                  <!--<h6 class="m-0 font-weight-bold text-primary"><a href="<?php //echo base_url();?>Bendahara/form_add_pembayaran" class="btn btn-primary"><i class="fa fa-pencil"></i> Tambah Pembayaran</a></h6>-->
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        
                        <th>Tanggal</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      

                      <?php foreach($rekap as $a){?>
                      <tr>
                        <td><?php echo $a->keterangan;?></a></td>
                        <td><?php echo $a->masuk;?></td>
                        <td><?php echo $a->keluar;?></td>
                      </tr>
                      <?php }?>

                    </tbody>
                  </table>
                </div>
              </div>
            
              <div align="right">
                  <h2>Total: <?php echo $total;?></h2>
                </div>


            </div>
          </div>
          <!--Row-->



        <?php $this->load->view('template/foot');?>
      </div>
