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
            <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
           
          </div>

          <?php echo $this->session->flashdata('auth');?>

          <div class="row mb-3">
            <!-- Data Siswa Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      
                      <?php if($this->session->userdata('level')==1){?>
                      <a href="<?php echo base_url();?>Bendahara/datasiswa" class="text-xs font-weight-bold text-uppercase mb-1">Data Siswa</a>
                      <?php }?>

                      <?php if($this->session->userdata('level')==2){?>
                      <a href="<?php echo base_url();?>Kepsek/datasiswa" class="text-xs font-weight-bold text-uppercase mb-1">Data Siswa</a>
                      <?php }?>
                      
                      
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $jml_siswa;?></div>
                        </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      
                      <?php if($this->session->userdata('level')==1){?>
                      <a href="<?php echo base_url();?>Bendahara/datakaryawan" class="text-xs font-weight-bold text-uppercase mb-1">Data Karyawan</a>
                      <?php }?>

                      <?php if($this->session->userdata('level')==2){?>
                      <a href="<?php echo base_url();?>Kepsek/datakaryawan" class="text-xs font-weight-bold text-uppercase mb-1">Data Karyawan</a>
                      <?php }?>

                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_karyawan;?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                       
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      
                      <?php if($this->session->userdata('level')==1){?>
                      <a href="<?php echo base_url();?>Bendahara/datakasmasuk" class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Kasmasuk</a>
                      <?php }?>

                      <?php if($this->session->userdata('level')==2){?>
                      <a href="<?php echo base_url();?>Kepsek/datakasmasuk" class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Kasmasuk</a>
                      <?php }?>

                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo rupiah($jml_kasmasuk->jumlah_kasmasuk);?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                       
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

             <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      
                      <?php if($this->session->userdata('level')==1){?>
                      <a href="<?php echo base_url();?>Bendahara/datakaskeluar" class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Kas Keluar</a>
                      <?php }?>

                      <?php if($this->session->userdata('level')==2){?>
                      <a href="<?php echo base_url();?>Kepsek/datakaskeluar" class="text-xs font-weight-bold text-uppercase mb-1">Jumlah Kas Keluar</a>
                      <?php }?>

                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo rupiah($jml_kaskeluar->total);?></div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                       
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-money fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
            

            <!-- Grafik -->
            <div class="col-xl-6 col-lg-7">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Kas Masuk
                  <br><br>
                  
                  <form method="get">
                  <select name="bulan" required class="form-control">
                  <option value="">Pilih Bulan</option>
                  <option value="01">Januari</option>
                  <option value="02">Februari</option>
                  <option value="03">Maret</option>
                  <option value="04">April</option>
                  <option value="05">Mei</option>
                  <option value="06">Juni</option>
                  <option value="07">Juli</option>
                  <option value="08">Agustus</option>
                  <option value="09">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                  </select>
                  <br>
                  <?php if(isset($_GET['tahun'])){?>
                    <input type="text" required value="<?php echo $_GET['tahun'];?>" placeholder="Tahun" class="form-control" name="tahun">
                  <?php }else{?>
                    <input type="text" required placeholder="Tahun" class="form-control" name="tahun">
                  <?php }?>
                  
                  <br>
                  <input type="submit" value="Lihat" class="btn btn-primary">
                  </form>
                  
                  </h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                      aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="Pemasukan"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-lg-7">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafik Kas Keluar
                  <br><br>
                  
                  <form method="get">
                  <select name="bulan_keluar" required class="form-control">
                  <option value="">Pilih Bulan</option>
                  <option value="01">Januari</option>
                  <option value="02">Februari</option>
                  <option value="03">Maret</option>
                  <option value="04">April</option>
                  <option value="05">Mei</option>
                  <option value="06">Juni</option>
                  <option value="07">Juli</option>
                  <option value="08">Agustus</option>
                  <option value="09">September</option>
                  <option value="10">Oktober</option>
                  <option value="11">November</option>
                  <option value="12">Desember</option>
                  </select>
                  <br>
                  <?php if(isset($_GET['tahun_keluar'])){?>
                    <input type="text" required value="<?php echo $_GET['tahun_keluar'];?>" placeholder="Tahun" class="form-control" name="tahun_keluar">
                  <?php }else{?>
                    <input type="text" required placeholder="Tahun" class="form-control" name="tahun_keluar">
                  <?php }?>
                  <br>
                  <input type="submit" value="Lihat" class="btn btn-primary">
                  </form>
                  
                  </h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                      aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="Pengeluaran"></canvas>
                  </div>
                </div>
              </div>
            </div>
           
            </div>
            
          </div>
          <!--Row-->

         

        </div>
        <!---Container Fluid-->

<?php
include 'lib/koneksi.php';

if(isset($_GET['bulan'])){
 
  $bln = $_GET['bulan'];
  $thn = $_GET['tahun'];

  $tgl = mysqli_query($con, "select tanggal_kasmasuk from tb_kasmasuk where tanggal_kasmasuk like '%$thn-$bln-%'");
  $jumlah = mysqli_query($con, "select jumlah_kasmasuk from tb_kasmasuk where tanggal_kasmasuk like '%$thn-$bln-%'");
  
  $tglkaskeluar = mysqli_query($con, "select tanggal_kaskeluar from tb_kaskeluar");
  $jumlahkaskeluar = mysqli_query($con, "select total from tb_kaskeluar");  
}
elseif(isset($_GET['bulan_keluar'])){
 
  $thn_kel = $_GET['tahun_keluar'];
  $bln_kel = $_GET['bulan_keluar'];

  $tgl = mysqli_query($con, "select tanggal_kasmasuk from tb_kasmasuk");
  $jumlah = mysqli_query($con, "select jumlah_kasmasuk from tb_kasmasuk");
  
  $tglkaskeluar = mysqli_query($con, "select tanggal_kaskeluar from tb_kaskeluar where tanggal_kaskeluar like '%$thn_kel-$bln_kel-%'");
  $jumlahkaskeluar = mysqli_query($con, "select total from tb_kaskeluar where tanggal_kaskeluar like '%$thn_kel-$bln_kel-%'");  
}else{
$tgl = mysqli_query($con, "select tanggal_kasmasuk from tb_kasmasuk");
$jumlah = mysqli_query($con, "select jumlah_kasmasuk from tb_kasmasuk");

$tglkaskeluar = mysqli_query($con, "select tanggal_kaskeluar from tb_kaskeluar");
$jumlahkaskeluar = mysqli_query($con, "select total from tb_kaskeluar");
}
?>

<script src="<?php echo base_url();?>assets/themabaru/vendor/chart.js/Chart.min.js"></script>
  
        <script>

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

// Area Chart Example
var ctx = document.getElementById("Pemasukan");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [<?php while ($p21 = mysqli_fetch_array($tgl)) { echo '"' . $p21['tanggal_kasmasuk'] . '",';}?>],
    datasets: [{
      label: "Pemasukan",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.5)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?php while ($p2 = mysqli_fetch_array($jumlah)) { echo '' . $p2['jumlah_kasmasuk'] . ',';}?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp ' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});


var ctx = document.getElementById("Pengeluaran");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [<?php while ($p21 = mysqli_fetch_array($tglkaskeluar)) { echo '"' . $p21['tanggal_kaskeluar'] . '",';}?>],
    datasets: [{
      label: "Pengeluaran",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.5)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [<?php while ($p2 = mysqli_fetch_array($jumlahkaskeluar)) { echo '' . $p2['total'] . ',';}?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp ' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp ' + number_format(tooltipItem.yLabel);
        }
      }
    }
  }
});

        </script>




        <?php $this->load->view('template/foot');?>
      </div>
