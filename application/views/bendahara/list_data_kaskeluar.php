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
            <h1 class="h3 mb-0 text-gray-800">Data Kas Keluar</h1>
           
          </div>

          <?php echo $this->session->flashdata('data');?>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">

                      <form action="<?php echo base_url();?>Bendahara/filterkaskeluar" method="get">
            
            <input type="text" autocomplete="off" class="form-control" id="datepicker_pembayaran" name="tanggal" placeholder="Tanggal Awal">
      <br>
          <input type="text" autocomplete="off" class="form-control" id="datepicker_pembayaran_akhir" name="tanggal_akhir" placeholder="Tanggal Akhir">
            
          <br>
          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Lihat</button>
          <a href="<?php echo base_url();?>Bendahara/datakaskeluar" class="btn btn-primary"><i class="fa fa-search"></i> Data Kas Keluar</a>
          

                    <a href="<?php echo base_url();?>Bendahara/form_add_kaskeluar" class="btn btn-primary"><i class="fa fa-pencil"></i> Tambah Kas Keluar</a></h6>
                </form>

                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Tgl. Kas Keluar</th>
                        
                        <th>Jumlah</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      

                      <?php foreach($kaskeluar as $a){?>
                      <tr>
                        <td><a href="<?php echo base_url();?>Bendahara/detil_kaskeluar/<?php echo $a->tgl;?>/<?php echo $a->kode;?>"><?php echo $a->tgl;?></a></td>
                        
                        <td><?php echo $a->jumtot;?></td>
                      </tr>
                      <?php }?>

                    </tbody>
                  </table>
                </div>

                <div align="right">
                  <h2>Total Kas Keluar: <?php echo $total;?></h2>
                </div>

              </div>
            </div>
          </div>
          <!--Row-->



        <?php $this->load->view('template/foot');?>
      </div>
