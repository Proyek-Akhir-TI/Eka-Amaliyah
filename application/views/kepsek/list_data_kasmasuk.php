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
            <h1 class="h3 mb-0 text-gray-800">Data Kas Masuk</h1>
           
          </div>

          <?php echo $this->session->flashdata('data');?>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <!--<h6 class="m-0 font-weight-bold text-primary"><a href="<?php //echo base_url();?>Bendahara/form_add_pembayaran" class="btn btn-primary"><i class="fa fa-pencil"></i> Tambah Pembayaran</a></h6>-->
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        
                        <th>Tgl. Kas Masuk</th>
                        <th>Jumlah</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      

                      <?php foreach($kasmasuk as $a){?>
                      <tr>
                        <td><a href="<?php echo base_url();?>Kepsek/detil_kasmasuk/<?php echo $a->tgl;?>/<?php echo $a->kode;?>"><?php echo $a->tgl;?></a></td>
                        
                        <td><?php echo $a->jumtot;?></td>
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
