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
            <h1 class="h3 mb-0 text-gray-800">Data Pembayaran <?php echo $_GET['nama'];?></h1>
           
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
					
					 <?php if($_GET['nama'] == null){?>
                <input id = "siswa" class="form-control" type="text" name="nama" placeholder="Input Siswa"><br>
						  <?php }?>
						  
						  <?php if($_GET['nama'] != null){?>
                
    <input id = "siswa" value="<?php echo $_GET['nama'];?>" class="form-control" type="text" name="label" placeholder="Input Siswa">
    <input class="form-control" type="hidden" name="nama" value="<?php echo $_GET['nama'];?>">
              
              
              <?php }?>
						  
					<br>

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


            <?php if($_GET['th_ajaran']!=null){?>            
            <input type="text" autocomplete="off" required class="form-control" name="th_ajaran" value="<?php echo $_GET['th_ajaran'];?>">
            <?php }?>

            <?php if($_GET['th_ajaran']==null){?>            
              <input type="text" autocomplete="off" required class="form-control" name="th_ajaran" placeholder="Tahun Ajaran">
            <?php }?>

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
                        <th>Th. Ajaran</th>
                        <th>Tgl. Pembayaran</th>
                        <th>D. Kegiatan</th>
                        <th>PSG</th>
                        <th>UKK</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>D. Akhir XII</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      

                    <?php foreach($pembayaran_by_nama as $a){?>
                      <tr>
                        <td><?php echo $a->nisn;?></td>
                        <td><?php echo $a->nama_siswa;?></td>
                        <td><?php echo $a->kelas;?></td>
                        <td><?php echo $a->jurusan;?></td>
                        <td><?php echo $a->th_ajaran;?></td>
                        <td><?php echo tgl_indonesia($a->tanggal_pembayaran);?></td>
                        <td><?php echo rupiah($a->dana_kegiatan);?></td>
                        <td><?php echo rupiah($a->psg);?></td>
                        <td><?php echo rupiah($a->ukk);?></td>
                        <td><?php echo rupiah($a->ujian_uts);?></td>
                        <td><?php echo rupiah($a->ujian_uas);?></td>
                        <td><?php echo rupiah($a->dana_akhir12);?></td>
                        <td><?php echo rupiah($a->jumlah);?></td>
                        <td><?php echo $a->keterangan;?></td>
                        <td><a class="btn btn-success" href="<?php echo base_url();?>Bendahara/cetak_nota_pembayaran/<?php echo $a->id_pembayaran;?>"><i class="fa fa-print"></i></a></td>
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
              source: "<?php echo base_url();?>Bendahara/get_autocomplete",

              select: function (event, ui) {
                $('[name="nama"]').val(ui.item.desc); 
                $('[name="label"]').val(ui.item.label); 
                }

            });
        });
</script>


        <?php $this->load->view('template/foot_autocomplete');?>
</div>