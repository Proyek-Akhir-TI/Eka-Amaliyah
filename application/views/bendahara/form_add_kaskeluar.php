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
            <h1 class="h3 mb-0 text-gray-800">Tambah Data Pengeluaran</h1>
            
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
                <form action="<?php echo base_url();?>Bendahara/insert_kaskeluar" method="post">
 
                    <input type="hidden" value="<?php echo $id_kaskeluar;?>" name="id_kaskeluar" class="form-control">

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal Pengeluaran</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="datepicker_pembayaran" name="tanggal_kaskeluar" value="<?php echo set_value('tanggal_kaskeluar'); ?>" placeholder="Tanggal Pengeluaran">
                        <font color="red"><?php echo form_error('tanggal_kaskeluar'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Pembelian Perl. Praktik</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" max="99999999" name="pembelian_peralatanpraktik" class="form-control" id="pembelian_peralatanpraktik" onkeyup="sum();" 
                        
                        <?php if(set_value('pembelian_peralatanpraktik')!=null){?>
                        value="<?php echo set_value('pembelian_peralatanpraktik'); ?>"
                        <?php }?>

                        <?php if(set_value('pembelian_peralatanpraktik')==null){?>
                        value="0"
                        <?php }?>

                        >
                      <font color="red"><?php echo form_error('pembelian_peralatanpraktik'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Pembayaran Wifi</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" max="99999999" name="pembayaran_wifi" class="form-control" id="pembayaran_wifi" onkeyup="sum();" 
                        
                        <?php if(set_value('pembayaran_wifi')!=null){?>
                        value="<?php echo set_value('pembayaran_wifi'); ?>"
                        <?php }?>

                        <?php if(set_value('pembayaran_wifi')==null){?>
                        value="0"
                        <?php }?>

                        >
                      <font color="red"><?php echo form_error('pembayaran_wifi'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Pembayaran Telepon</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" max="99999999" name="pembayaran_telepon" class="form-control" id="pembayaran_telepon" onkeyup="sum();" 
                        
                        <?php if(set_value('pembayaran_telepon')!=null){?>
                        value="<?php echo set_value('pembayaran_telepon'); ?>"
                        <?php }?>

                        <?php if(set_value('pembayaran_telepon')==null){?>
                        value="0"
                        <?php }?>

                        >
                      <font color="red"><?php echo form_error('pembayaran_telepon'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Pembayaran Listrik</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" max="99999999" name="pembayaran_listrik" class="form-control" id="pembayaran_listrik" onkeyup="sum();" 
                        
                        <?php if(set_value('pembayaran_listrik')!=null){?>
                        value="<?php echo set_value('pembayaran_listrik'); ?>"
                        <?php }?>

                        <?php if(set_value('pembayaran_listrik')==null){?>
                        value="0"
                        <?php }?>

                        >
                      <font color="red"><?php echo form_error('pembayaran_listrik'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Belanja ATK</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" max="99999999" name="belanja_atk" class="form-control" id="belanja_atk" onkeyup="sum();" 
                        
                        <?php if(set_value('belanja_atk')!=null){?>
                        value="<?php echo set_value('belanja_atk'); ?>"
                        <?php }?>

                        <?php if(set_value('belanja_atk')==null){?>
                        value="0"
                        <?php }?>

                        >
                      <font color="red"><?php echo form_error('belanja_atk'); ?></font>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="inputPassword3" class="col-sm-3 col-form-label">Keterangan</label>
                      <div class="col-sm-9">
                        <textarea class="form-control" name="ket_keluar"><?php echo set_value('ket_keluar'); ?></textarea>
                        <font color="red"><?php echo form_error('ket_keluar'); ?></font>
                      </div>
                    </div>
                   

                    <div class="form-group row">
                      <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah</label>
                      <div class="col-sm-9">
                        <input type="number" min="0" max="99999999" name="total" class="form-control" id="total" readonly placeholder="Total" value="<?php echo set_value('total'); ?>">
                      <font color="red"><?php echo form_error('total'); ?></font>
                      </div>
                    </div>
                   
                    <div class="form-group row">
                      <div class="col-sm-10">
                        <a class="btn btn-danger" href="<?php echo base_url();?>Bendahara/datakaskeluar">Cancel</a>
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
function sum() {
      var pembelian_peralatanpraktik = document.getElementById('pembelian_peralatanpraktik').value;
      var pembayaran_listrik = document.getElementById('pembayaran_listrik').value;
      var pembayaran_telepon = document.getElementById('pembayaran_telepon').value;
      var pembayaran_wifi = document.getElementById('pembayaran_wifi').value;
      var belanja_atk = document.getElementById('belanja_atk').value;

      var result = parseInt(pembelian_peralatanpraktik) + parseInt(pembayaran_wifi) + parseInt(pembayaran_telepon) + parseInt(pembayaran_listrik) + parseInt(belanja_atk); 

      if (!isNaN(result)) {
         document.getElementById('total').value = result;
      }
}
</script>



        <?php $this->load->view('template/foot');?>
      </div>





