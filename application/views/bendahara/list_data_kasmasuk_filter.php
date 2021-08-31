<?php 

include 'lib/rupiah.php';
include 'lib/tglindonesia.php';

$this->load->view('template/head');?>

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
                  <h6 class="m-0 font-weight-bold text-primary">
				  <form action="<?php echo base_url();?>Bendahara/filterkasmasuk" method="get">
					
                    <?php if($_GET['id'] == null){?>
              
          <input id = "siswa" class="form-control" type="text" name="label" placeholder="Input Siswa">
          <input class="form-control" type="hidden" name="id">
						   
						  <?php }?>

              
						  
						  <?php if($_GET['id'] != null){?>
          <input id = "siswa" class="form-control" value="<?php echo $nama_siswa_filter->nama_siswa;?>" type="text" name="label" placeholder="Input Siswa">
          <input class="form-control" type="hidden" value="<?php echo $_GET['id'];?>" name="id">
						  <?php }?>
                   
                    <br>
						
					<input type="text" class="form-control" id="datepicker_pembayaran" name="tanggal" placeholder="Tanggal Kas Masuk <?php echo $_GET['tanggal'];?>">	
						<br>
                    
					<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Lihat</button>
					<a href="<?php echo base_url();?>Bendahara/datakasmasuk" class="btn btn-primary"><i class="fa fa-search"></i> Data Kas Masuk</a>
					</form>
				  
				  
				  </h6>
				  
                </div>
                <div class="table-responsive p-3">

                  <?php if($_GET['tanggal'] == null){?>
                  <?php $tgl = $_GET['tanggal'];?>
                  <?php }else{?>
                  <?php $tgl = "Tanggal ".tgl_indonesia($_GET['tanggal']);?>
                  <?php }?>
                  
                  
                  <div align="right">
                  <h4>Total Kas Masuk  <?php echo $tgl;?>: <?php echo rupiah($total);?></h4>
                </div>
                  
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Kode Penerimaan</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
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
                      

                      <?php foreach($kasmasuk as $a){?>
                      <tr>
                        <td><?php echo $a->kode_penerimaan;?></td>
                        <td><?php echo $a->nisn;?></td>
                        <td><?php echo $a->nama_siswa;?></td>
                        <td><?php echo $a->kelas;?></td>
                        <td><?php echo $a->jurusan;?></td>
                        <td><?php echo tgl_indonesia($a->tanggal_pembayaran);?></td>
                        <td><?php echo rupiah($a->dana_kegiatan);?></td>
                        <td><?php echo rupiah($a->psg);?></td>
                        <td><?php echo rupiah($a->ukk);?></td>
                        <td><?php echo rupiah($a->ujian_uts);?></td>
                        <td><?php echo rupiah($a->ujian_uas);?></td>
                        <td><?php echo rupiah($a->dana_akhir12);?></td>
                        <td><?php echo rupiah($a->jumlah);?></td>
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/cupertino/jquery-ui.min.css">
 
 <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    

<script type="text/javascript">
        $(document).ready(function(){
            $( "#siswa" ).autocomplete({
              source: "<?php echo base_url();?>Bendahara/get_autocomplete_kasmasuk",

              select: function (event, ui) {
                $('[name="nama"]').val(ui.item.desc); 
                $('[name="label"]').val(ui.item.label);
                $('[name="id"]').val(ui.item.label2); 
                }

            });
        });
</script>



        <?php $this->load->view('template/foot_autocomplete');?>
      </div>