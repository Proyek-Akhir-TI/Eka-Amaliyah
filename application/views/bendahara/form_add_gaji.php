<?php $this->load->view('template/head');
include 'lib/rupiah.php';
?>

<body id="page-top">
  <div id="wrapper">

<?php $this->load->view('template/sidebaradmin');?>
    
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        
<?php $this->load->view('template/topbar');?>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Gaji</h1>
            
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
                <form action="<?php echo base_url();?>Bendahara/insert_gaji" method="post">
     
                  <?php if(set_value('nip')!=null){?>
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Karyawan</label>
                      <div class="col-sm-9">
                        <select  name="nip" id="nip" onchange="return autofill();" class="form-control">
                           
                            
                                  <option value="<?php echo set_value('nip'); ?>"><?php echo set_value('nip'); ?></option>
                                    
                        </select>
                      <font color="red"><?php echo form_error('nip'); ?></font>
                      </div>
                    </div>
                    <?php }?>


                  <?php if(set_value('nip')==null){?>
                  <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Karyawan</label>
                      <div class="col-sm-9">
                        <select name="nip" id="nip" onchange="return autofill();" class="form-control">

                          <option value="">Pilih Karyawan</option>

                          <?php

                          foreach ($record as $b)
                          {
                             
                              echo "<option value = '$b->nip'>$b->nama_karyawan</option>";
                          }
                          ?>

                        </select>

                      <font color="red"><?php echo form_error('nip'); ?></font>
                      </div>
                    </div>
                    <?php }?>

                    <input type="hidden" readonly value="<?php echo set_value('nama_karyawan');?>" name="nama_karyawan" id="nama_karyawan" class="form-control">

                    <input type="hidden" readonly value="<?php echo set_value('no_telepon');?>" name="no_telepon" id="no_telepon" class="form-control">
                    
                    
                    <input type="hidden" value="<?php echo $id_gaji;?>" name="id_gaji" class="form-control">

                   <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">NIP</label>
                      <div class="col-sm-9">
                        <input type="text" readonly class="form-control" id="nip_karyawan" name="nip" value="<?php echo set_value('nip'); ?>" placeholder="NIP">
                        <font color="red"><?php echo form_error('nip'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal Pembayaran Gaji</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="datepicker_pembayaran" name="tanggal_pembayaran_gaji" value="<?php echo set_value('tanggal_pembayaran_gaji'); ?>" placeholder="Tanggal Pembayaran Gaji">
                        <font color="red"><?php echo form_error('tanggal_pembayaran_gaji'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Jam Kerja</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" max="99999999" name="jumlah_jam_kerja" class="form-control" id="jumlah_jam_kerja" onkeyup="sum();" placeholder="Gaji Pokok" 
                        
                        <?php if(set_value('jumlah_jam_kerja')!=null){?>
                        value="<?php echo set_value('jumlah_jam_kerja'); ?>"
                        <?php }?>

                        <?php if(set_value('jumlah_jam_kerja')==null){?>
                        value="0"
                        <?php }?>

                        >
                      <font color="red"><?php echo form_error('jumlah_jam_kerja'); ?></font>
                      </div>
                    </div>

                   

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Tunjangan Yayasan</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" max="99999999" name="tunjangan_yayasan" class="form-control" id="tunjangan_yayasan" onkeyup="sum();" placeholder="Tunjangan Yayasan" 
                        
                        <?php if(set_value('tunjangan_yayasan')!=null){?>
                        value="<?php echo set_value('tunjangan_yayasan'); ?>"
                        <?php }?>

                        <?php if(set_value('tunjangan_yayasan')==null){?>
                        value="0"
                        <?php }?>

                        >
                      <font color="red"><?php echo form_error('tunjangan_yayasan'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Potongan BPJS</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" max="99999999" name="potongan_bpjs" class="form-control" id="potongan_bpjs" onkeyup="sum();" placeholder="Potongan Koperasi" 
                        
                        <?php if(set_value('potongan_bpjs')!=null){?>
                        value="<?php echo set_value('potongan_bpjs'); ?>"
                        <?php }?>

                        <?php if(set_value('potongan_bpjs')==null){?>
                        value="0"
                        <?php }?>

                        >
                      <font color="red"><?php echo form_error('potongan_bpjs'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Potongan Simp. Sejahtera</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" max="99999999" name="potongan_simpanansejahtera" onkeyup="sum();" class="form-control" id="potongan_simpanansejahtera" 
                        
                        <?php if(set_value('potongan_simpanansejahtera')!=null){?>
                        value="<?php echo set_value('potongan_simpanansejahtera'); ?>"
                        <?php }?>

                        <?php if(set_value('potongan_simpanansejahtera')==null){?>
                        value="0"
                        <?php }?>

                        >
                      <font color="red"><?php echo form_error('potongan_simpanansejahtera'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Potongan Rumah Infaq</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" max="99999999" name="potongan_rumahinfaq" class="form-control" onkeyup="sum();" id="potongan_rumahinfaq" 
                        
                        <?php if(set_value('potongan_rumahinfaq')!=null){?>
                        value="<?php echo set_value('potongan_rumahinfaq'); ?>"
                        <?php }?>

                        <?php if(set_value('potongan_rumahinfaq')==null){?>
                        value="0"
                        <?php }?>

                        >
                      <font color="red"><?php echo form_error('potongan_rumahinfaq'); ?></font>
                      </div>
                    </div>

                    

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Potongan Lain</label>
                      <div class="col-sm-9">
                        <input type="number" onkeyup="sum();" min="0" max="99999999" name="potongan_lainlain" class="form-control" id="potongan_lainlain" 
                        
                        <?php if(set_value('potongan_lainlain')!=null){?>
                        value="<?php echo set_value('potongan_lainlain'); ?>"
                        <?php }?>

                        <?php if(set_value('potongan_lainlain')==null){?>
                        value="0"
                        <?php }?>

                        >
                      <font color="red"><?php echo form_error('potongan_lainlain'); ?></font>
                      </div>
                    </div>


                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Total Gaji</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" max="99999999" name="total_gaji" class="form-control" id="total_gaji" readonly placeholder="Total Gaji" value="<?php echo set_value('total_gaji'); ?>">
                      <font color="red"><?php echo form_error('total_gaji'); ?></font>
                      </div>
                    </div>
                 
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <a class="btn btn-danger" href="<?php echo base_url();?>Bendahara/datagaji">Cancel</a>
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




<script>
    function autofill(){
        var nip =document.getElementById('nip').value;
        $.ajax({
                       url:"<?php echo base_url();?>Bendahara/autocomplete_gaji",
                       data:'&nip='+nip,
                       success:function(data){
                           var hasil = JSON.parse(data);  
                    
            $.each(hasil, function(key,val){ 
                
               document.getElementById('nip').value=val.nip;
               document.getElementById('nip_karyawan').value=val.nip;
               document.getElementById('nama_karyawan').value=val.nama_karyawan;
               document.getElementById('no_telepon').value=val.no_telepon;
               //document.getElementById('nisn').value=val.nisn;
               //document.getElementById('kelas').value=val.kelas;
               //document.getElementById('jurusan').value=val.jurusan;
                          
                    
                });
            }
                   });
                  
    }
</script>


<script>
function sum() {
      var jumlah_jam_kerja = document.getElementById('jumlah_jam_kerja').value;
      var tunjangan_yayasan = document.getElementById('tunjangan_yayasan').value;
      var potongan_bpjs = document.getElementById('potongan_bpjs').value;
      var potongan_simpanansejahtera = document.getElementById('potongan_simpanansejahtera').value;
      var potongan_rumahinfaq = document.getElementById('potongan_rumahinfaq').value;
      var potongan_lainlain = document.getElementById('potongan_lainlain').value;

      var potongan = parseInt(potongan_bpjs) + parseInt(potongan_simpanansejahtera) + parseInt(potongan_rumahinfaq) + parseInt(potongan_lainlain);

      var gaji = parseInt(jumlah_jam_kerja * 35000) + parseInt(tunjangan_yayasan);

      var total = parseInt(gaji) - parseInt(potongan); 

      if (!isNaN(total)) {
         document.getElementById('total_gaji').value = total;
      }
}
</script>



 

        <?php $this->load->view('template/foot');?>
      </div>





