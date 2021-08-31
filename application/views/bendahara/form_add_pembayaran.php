<?php $this->load->view('template/head');
include 'lib/rupiah.php';
?>

<body id="page-top">
  <div id="wrapper">

<?php $this->load->view('template/sidebaradmin');?>
    
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        
<?php 

$kls = $siswa->tingkat;

?>


<?php $this->load->view('template/topbar');?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Pembayaran</h1>
            
          </div>
          <?php echo $this->session->flashdata('datagagal');?>
          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  
                </div>
                
                <div class="card-body">

                <form action="<?php echo base_url();?>Bendahara/form_add_pembayaran" method="get">
					<select name="nama" class="form-control">

              <option value="<?php echo $_GET['nama'];?>"><?php echo $_GET['nama'];?></option>            
						  <option value="">Pilih Siswa</option>
						  <?php foreach($nama as $m){?> 
                                  
          <option value="<?php echo $m->nama_siswa;?>"><?php echo $m->nisn;?>-<?php echo $m->nama_siswa;?></option>
						  <?php }?>  
          </select>
						
						<br>
					<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Pilih</button>
					</form>
          
          <br>

                <form action="<?php echo base_url();?>Bendahara/insert_pembayaran" method="post">



                     <?php if(set_value('nisn')!=null){?>
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">NIS</label>
                      <div class="col-sm-9">
                        
                      <input type="text" readonly value="<?php echo set_value('nisn');?>" name="nisn" id="nisn" class="form-control">
                        
                      <font color="red"><?php echo form_error('nisn'); ?></font>
                      
                      </div>
                    
                    </div>
                    <?php }?>

                  <?php if(set_value('nisn')==null){?>
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">NIS</label>
                      <div class="col-sm-9">
                      <input type="text" readonly value="<?php echo $siswa->nisn;?>" name="nisn" id="nisn" class="form-control">
                      <font color="red"><?php echo form_error('nisn'); ?></font>
                      </div>
                    </div>
                    <?php }?>          

                    <?php if(set_value('jurusan')!=null){?>
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Jurusan</label>
                      <div class="col-sm-9">
                     
                       <input type="text" readonly value="<?php echo set_value('jurusan');?>" name="jurusan" id="jurusan" class="form-control">
                     
                      <font color="red"><?php echo form_error('jurusan'); ?></font>
                      </div>
                    </div>
                    <?php }?>


                  <?php if(set_value('jurusan')==null){?>
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Jurusan</label>
                      <div class="col-sm-9">
                       
                       <input type="text" readonly value="<?php echo $siswa->jurusan;?>" placeholder="Jurusan" name="jurusan" id="jurusan" class="form-control">

                       
                      <font color="red"><?php echo form_error('jurusan'); ?></font>
                      </div>
                    </div>
                    <?php }?>


                    <?php if(set_value('kelas')!=null){?>
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Kelas</label>
                      <div class="col-sm-9">
                     
                       <input type="text" readonly value="<?php echo set_value('kelas');?>" name="kelas" id="kelas" class="form-control">
                     
                      <font color="red"><?php echo form_error('kelas'); ?></font>
                      </div>
                    </div>
                    <?php }?>


                  <?php if(set_value('kelas')==null){?>
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Kelas</label>
                      <div class="col-sm-9">
                       
                       <input type="text" readonly value="<?php echo $siswa->kelas;?>" placeholder="Kelas" name="kelas" id="kelas" class="form-control">

                       
                      <font color="red"><?php echo form_error('kelas'); ?></font>
                      </div>
                    </div>
                    <?php }?>

                    
                  

                    <input type="hidden" readonly value="<?php echo $siswa->nama_siswa;?>" name="nama_siswa" id="nama_siswa" class="form-control">

                    <input type="hidden" readonly value="<?php echo $siswa->id_siswa;?>" name="id_siswa" id="id_siswa" class="form-control">

                    <input type="hidden" readonly value="<?php echo $siswa->no_telepon_walimurid;?>" name="no_telepon_walimurid" id="no_telepon_walimurid" class="form-control">
                    
                    
                    <input type="hidden" value="<?php echo $id_pem;?>" name="id_pembayaran" class="form-control">
					
                    
					<div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Pembayaran</label>
                      <div class="col-sm-9">

                      <?php if(set_value('tanggal_pembayaran')==null){?>
                       <input type="text" autocomplete="off" value="<?php echo set_value('tanggal_pembayaran');?>" class="form-control" id="datepicker_pembayaran" name="tanggal_pembayaran" placeholder="Tanggal Pembayaran">
                      <?php }?>

                      <?php if(set_value('tanggal_pembayaran')!=null){?>
                        <input type="text" autocomplete="off" value="<?php echo set_value('tanggal_pembayaran');?>" class="form-control" id="datepicker_pembayaran" name="tanggal_pembayaran" placeholder="Tanggal Pembayaran">
                      <?php }?>
                      <font color="red"><?php echo form_error('dana_kegiatan'); ?></font>
                      </div>
                    </div>
					
					
					<div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Semester</label>
                      <div class="col-sm-9">
					 
                     <select name="semester" required class="form-control">
                     
						<?php if(set_value('semester')!=null){?>
					 <option value="<?php echo set_value('semester');?>"><?php echo set_value('semester');?></option>
						<?php }?>
						
						<?php if(set_value('semester')==null){?>
					 <option value="">Pilih Semester</option>
						<?php }?>
						
                          <option value = "Ganjil">Ganjil</option>
                          <option value = "Genap">Genap</option>
						
						
                        </select>

                        <font color="red"><?php echo form_error('semester'); ?></font>
                      </div>
                    </div>
					
                    <hr color="black">

          <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Dana Kegiatan</label>
                      <div class="col-sm-9">

                      <?php if(set_value('dana_kegiatan')==null){?>
                       <input type="radio" value="Lunas" name="dana_kegiatan"> Lunas
					           
					  <?php }?>

                      <?php if(set_value('dana_kegiatan')!=null){?>
					  
					  <?php if(set_value('dana_kegiatan') == 'Lunas'){?>
                        <input type="radio" value="Lunas" checked name="dana_kegiatan"> Lunas
					  <?php }?>
					  
            <?php }?>
                      <font color="red"><?php echo form_error('dana_kegiatan'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Cicilan Dana Kegiatan</label>
                      <div class="col-sm-9">

            <?php if(set_value('dana_kegiatan_cicilan') == null){?>
              <input type="text" class="form-control" name="dana_kegiatan_cicilan" placeholder="Cicilan Dana Kegiatan">
            <?php }?>

            <?php if(set_value('dana_kegiatan_cicilan') != null){?>
            
            <input type="text" class="form-control" value="<?php echo set_value('dana_kegiatan_cicilan');?>" name="dana_kegiatan_cicilan" placeholder="Cicilan Dana Kegiatan">
            
            <?php }?>
                      <font color="red"><?php echo form_error('dana_kegiatan_cicilan'); ?></font>
                      </div>
                    </div>

            <hr color="black">


        <?php if($kls == 'XI'){?>  
            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">PSG</label>
            <div class="col-sm-9">
					  
					  <?php if(set_value('psg') == null){?>
                  <input type="radio" value="Lunas" name="psg"> Lunas
					   <?php }?>

            <?php if(set_value('psg')!=null){?>
					  
					  <input type="radio" value="Lunas" checked name="psg"> Lunas
					   
					  <?php }?>

            <font color="red"><?php echo form_error('psg'); ?></font>
                      </div>
                    </div>

            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Cicilan PSG</label>
            <div class="col-sm-9">
            
            <?php if(set_value('psg_cicilan') == null){?>
                  <input type="text" name="psg_cicilan" class="form-control" placeholder="Cicilan PSG">
             <?php }?>

        <?php if(set_value('psg_cicilan') != null){?>
                  <input type="text" value="<?php echo set_value('psg_cicilan');?>" name="psg_cicilan" class="form-control" placeholder="Cicilan PSG">
             <?php }?>

            <font color="red"><?php echo form_error('psg_cicilan'); ?></font>
                      </div>
                    </div>

            <hr color="black"> 
        <?php }else{?>
        
        <?php }?>

        <?php if($kls == 'XI' || $kls == 'X'){?>
            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">UKK</label>
            <div class="col-sm-9">
            
            <?php if(set_value('ukk') == null){?>
                  <input type="radio" value="Lunas" name="ukk"> Lunas
             <?php }?>

            <?php if(set_value('ukk')!=null){?>
            
            <input type="radio" value="Lunas" checked name="ukk"> Lunas
             
            <?php }?>

            <font color="red"><?php echo form_error('ukk'); ?></font>
                      </div>
                    </div>

            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Cicilan UKK</label>
            <div class="col-sm-9">
            
            <?php if(set_value('ukk_cicilan') == null){?>
                  <input type="text" name="ukk_cicilan" class="form-control" placeholder="Cicilan UKK">
             <?php }?>

        <?php if(set_value('ukk_cicilan') != null){?>
                  <input type="text" value="<?php echo set_value('ukk_cicilan');?>" name="ukk_cicilan" class="form-control" placeholder="Cicilan UKK">
             <?php }?>

            <font color="red"><?php echo form_error('ukk_cicilan'); ?></font>
                      </div>
                    </div>

            <hr color="black"> 
        <?php }else{?>
        
        <?php }?>      

              <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Ujian UTS</label>
                      <div class="col-sm-9">
					  
					  <?php if(set_value('ujian_uts') == null){?>
               <input type="radio" value="Lunas" name="ujian_uts"> Lunas
					 <?php }?>

            <?php if(set_value('ujian_uts') != null){?>
					  
					  <input type="radio" value="Lunas" checked name="ujian_uts"> Lunas
					  
            <?php }?>
					  
            <font color="red"><?php echo form_error('ujian_uts'); ?></font>
                      </div>
                    </div>

          <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Cicilan Ujian UTS</label>
                      <div class="col-sm-9">
            
            <?php if(set_value('ujian_uts_cicilan') == null){?>
               <input type="text" class="form-control" placeholder="Cicilan Ujian UTS" name="ujian_uts_cicilan">
             <?php }?>

            <?php if(set_value('ujian_uts_cicilan')!=null){?>
            <input type="text" value="<?php echo set_value('ujian_uts_cicilan');?>" class="form-control" placeholder="Cicilan Ujian UTS" name="ujian_uts_cicilan">
            <?php }?>
            
            <font color="red"><?php echo form_error('ujian_uts_cicilan'); ?></font>
                      </div>
                    </div>
					
            <hr color="black">

            <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Ujian UAS</label>
                      <div class="col-sm-9">
					  
					  <?php if(set_value('ujian_uas') == null){?>
            <input type="radio" value="Lunas" name="ujian_uas"> Lunas
					   <?php }?>

            <?php if(set_value('ujian_uas')!=null){?>
					  <input type="radio" value="Lunas" checked name="ujian_uas"> Lunas
					  <?php }?>

                       <font color="red"><?php echo form_error('ujian_uas'); ?></font>
                      </div>
                    </div>

          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-3 col-form-label">Cicilan Ujian UAS</label>
                      <div class="col-sm-9">
            
            <?php if(set_value('ujian_uas_cicilan') == null){?>
            <input type="text" name="ujian_uas_cicilan" name="ujian_uas_cicilan" class="form-control" placeholder="Cicilan Ujian UAS">
             <?php }?>

            <?php if(set_value('ujian_uas_cicilan') != null){?>
            <input type="text" name="ujian_uas_cicilan" value="<?php echo set_value('ujian_uas_cicilan');?>" name="ujian_uas_cicilan" class="form-control" placeholder="Cicilan Ujian UAS">
             <?php }?>

            <font color="red"><?php echo form_error('ujian_uas_cicilan'); ?></font>
                      </div>
                    </div>

            <hr color="black">
           

            <?php if($kls == 'XII'){?>
              <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Dana Akhir Kelas XII</label>
                      <div class="col-sm-9">
					  
					  <?php if(set_value('dana_akhir12') == null){?>
            <input type="radio" value="Lunas" name="dana_akhir12"> Lunas
					  <?php }?>

            <?php if(set_value('dana_akhir12')!=null){?>
					  
					  <input type="radio" value="Lunas" checked name="dana_akhir12"> Lunas
					  
            <?php }?>

                       <font color="red"><?php echo form_error('dana_akhir12'); ?></font>
                      </div>
                    </div>

              <div class="form-group row">
              <label for="inputEmail3" class="col-sm-3 col-form-label">Cicilan Dana Akhir Kelas XII</label>
                      <div class="col-sm-9">
            
            <?php if(set_value('dana_akhir12_cicilan') == null){?>
            <input type="text" class="form-control" placeholder="Cicilan Dana Akhir Lelas 12" name="dana_akhir12_cicilan">
            <?php }?>

            <?php if(set_value('dana_akhir12_cicilan') != null){?>
            <input type="text" class="form-control" value="<?php echo set_value('dana_akhir12_cicilan');?>" placeholder="Cicilan Dana Akhir Lelas 12" name="dana_akhir12_cicilan">
            <?php }?>

              <font color="red"><?php echo form_error('dana_akhir12_cicilan'); ?></font>
                      </div>
                    </div>
            <?php }else{?>
            
            <?php }?>
                   
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <a class="btn btn-danger" href="<?php echo base_url();?>Bendahara/datapembayaran">Cancel</a>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                      </div>
                    </div>
                  </form>
                </div>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

<script src="<?php echo base_url();?>assets/themabaru/vendor/jquery/jquery.min.js"></script>
<script>
    function autofill(){
        var id_siswa =document.getElementById('id_siswa').value;
        $.ajax({
                       url:"<?php echo base_url();?>Bendahara/autocomplete",
                       data:'&id_siswa='+id_siswa,
                       success:function(data){
                           var hasil = JSON.parse(data);  
                    
            $.each(hasil, function(key,val){ 
                
               document.getElementById('id_siswa').value=val.id_siswa;
               document.getElementById('nama_siswa').value=val.nama_siswa;
               document.getElementById('nisn').value=val.nisn;
               document.getElementById('kelas').value=val.kelas;
               document.getElementById('jurusan').value=val.jurusan;
               document.getElementById('no_telepon_walimurid').value=val.no_telepon_walimurid;
               var kls = val.kelas;
                          
                    
                });
            }
                   });

        $.ajax({
                       url:"<?php echo base_url();?>Bendahara/hitung_pembayaran",
                       data:'&id_siswa='+id_siswa,
                       success:function(data){
                           var hasil2 = JSON.parse(data);  
                    
            $.each(hasil2, function(key,val){
               document.getElementById('total_saat_ini').value=val.tot;
               
                });
            }
                   });
                  
    }
</script>


<script>

function sum() {

      var dana_kegiatan = document.getElementById('dana_kegiatan').value;
      var psg = document.getElementById('psg').value;
       var ukk = document.getElementById('ukk').value;
      var ujian_uas = document.getElementById('ujian_uas').value;
      var ujian_uts = document.getElementById('ujian_uts').value;
      var dana_akhir12 = document.getElementById('dana_akhir12').value;

      if (!isNaN(result)) {
         document.getElementById('jumlah').value = result;
      }
 
       var spp3 = document.getElementById('spp').value;

               document.getElementById('ket').value=spp3;                          
}
</script>




<!--<script>
  $(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
    // Kita sembunyikan dulu untuk loadingnya
    $("#loading").hide();
    $("#loading_siswa").hide();
    
    $("#jurusan").change(function(){ // Ketika user mengganti atau memilih data provinsi
      $("#kelas").hide();
      $("#id_siswa").hide(); // Sembunyikan dulu combobox kota nya
      $("#loading").show();
      $("#loading_siswa").show(); // Tampilkan loadingnya
    
      $.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "<?php //echo base_url();?>Bendahara/listkelas", // Isi dengan url/path file php yang dituju
        data: {jurusan : $("#jurusan").val()}, // data yang akan dikirim ke file yang dituju
        dataType: "json",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ // Ketika proses pengiriman berhasil
          $("#loading").hide(); // Sembunyikan loadingnya

          // set isi dari combobox kota
          // lalu munculkan kembali combobox kotanya
          $("#kelas").html(response.list_kelas).show();
          $("#id_siswa").html(response.list_siswa).show();
        },
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
        }
      });
    });
  });
  </script>-->

 

        <?php $this->load->view('template/foot');?>
      </div>





