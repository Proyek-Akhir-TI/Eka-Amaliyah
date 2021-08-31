<html>
<title>Laporan Data Rekapitulasi</title>
<head>
<h2>Data Rekapitulasi</h2>
<hr color="black">
</head>
<body>
<br><br>
<table align="center" border="1" cellpadding="3" cellspacing="0">

                      <tr>
                        
                        <th>Tanggal</th>
                        <th>Masuk</th>
                        <th>Keluar</th>
                        
                      </tr>                      

                      <?php foreach($rekap as $a){?>
                      <tr>
                        <td><?php echo $a->keterangan;?></a></td>
                        <td><?php echo $a->masuk;?></td>
                        <td><?php echo $a->keluar;?></td>
                      </tr>
                      <?php }?>

            
              <div align="right">
                  <h2>Total: <?php echo $total;?></h2>
                </div>
</body>
</html>