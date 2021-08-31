<html>
<title>Laporan Data Rekapitulasi</title>
<head>

<?php 

include 'lib/rupiah.php';
include 'lib/tglindonesia.php';
?>

<table border="0" cellpadding="7" cellspacing="0">

<tr>
<th>
<img src="b.jpeg" width="75" height="100">
</th>

<th align="center" width="340">
<strong>
YAYASAN PENDIDIKAN SOSIAL DAN KEAGAMAAN<BR>
SEKOLAH MENENGAH KEJURUAN<BR>
NURUT TAQWA<BR>
</strong>
<font size="1">TERAKREDITASI B<br>
Jl. Rogojampi-Songgon Dsn. Cemoro Ds. Balak Kec. Songgon-Banyuwangi.
</strong>
</th>

<th>
<img src="a.jpeg" width="100" height="100">
</th>

</tr>

<tr>

<td width="100">
<font size="2">
NSS : 402052516047
</font>
</td>
<td align="center">
<font size="2">
NIS : 40058 0
</font>
</td>
<td width="100"> 
<font size="2">
NPSN : 69775463<
</font>  
</td>

</tr>

</table>

<hr color="black">
</head>


<body><br>

Nama: <?php echo $siswa_select;?><br>
Kelas: <?php echo $kls;?><br>
Semester: <?php echo $_GET['semester'];?><br><br>

<?php if($hasil_nisn != 0){?>
<h3>Status Pembayaran</h3>
                  <table align="center" border="1" width="550" cellpadding="3" cellspacing="0">
                   
                      <tr>
                       
                       <th>Keterangan</th>
                       <th>Status</th>
                        
                      </tr>
                       
                      <tr>
                        <td>Dana Kegiatan</td>
                      <td><?php echo $dankeg;?></td>
                      </tr>

                      <?php if($tingkat == 'XI'){?>
                      <tr>
                        <td>PSG</td>
                       <td><?php echo $psg;?></td>
                      </tr>
                      <?php }else{?>

                      <?php }?>

                      <?php if($tingkat == 'X' || $tingkat == 'XI'){?>   
                      <tr>
                        <td>UKK</td>
                       <td><?php echo $ukk;?></td>
                      </tr>
                      <?php }else{?>
                      
                      <?php }?>

                      <tr>
                        <td>Ujian UTS</td>
                        <td><?php echo $uts;?></td>
                      </tr>

                      <tr>
                        <td>Ujian UAS</td>
                        <td><?php echo $uas;?></td>
                      </tr>

                  <?php if($tingkat == 'XII'){?>
                      <tr>
                        <td>Dana Akhir Kelas XII</td>
                        <td><?php echo $akhir;?></td>
                      </tr>
                  <?php }else{?>
                  
                  <?php }?>

                   
                  </table>
        

      <?php } else{?>
         <h3>Status Pembayaran</h3>
         <table align="center" border="1" width="550" cellpadding="3" cellspacing="0">
                    
                      <tr>
                       
                       <th>Keterangan</th>
                       <th>Status</th>
                        
                      </tr>
                  
                       
                      <tr>
                      <td>Dana Kegiatan</td>
                      <td>Belum Bayar</td>
                      </tr>

                      <?php if($tingkat == 'XI'){?>
                      <tr>
                        <td>PSG</td>
                       <td><?php echo $psg;?></td>
                      </tr>
                      <?php }else{?>

                      <?php }?>

                      <?php if($tingkat == 'X' || $tingkat == 'XI'){?>   
                      <tr>
                        <td>UKK</td>
                       <td><?php echo $ukk;?></td>
                      </tr>
                      <?php }else{?>
                      
                      <?php }?>

                      <tr>
                        <td>Ujian UTS</td>
                        <td>Belum Bayar</td>
                      </tr>

                      <tr>
                        <td>Ujian UAS</td>
                        <td>Belum Bayar</td>
                      </tr>

                  <?php if($tingkat == 'XII'){?>
                      <tr>
                        <td>Dana Akhir Kelas XII</td>
                        <td><?php echo $akhir;?></td>
                      </tr>
                  <?php }else{?>
                  
                  <?php }?>

                    
                  </table>
      
      <?php }?>
</body>
</html>