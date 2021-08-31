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
<body>
<center>
<h4>DATA REKAPITULASI TAHUN <?php echo date('Y');?> </h4><br>
</center>
<table align="center" border="1" width="550" cellpadding="3" cellspacing="0">

                      <tr>
                        
                        <th align="center">Tanggal</th>
                        <th align="center">Masuk</th>
                        <th align="center">Keluar</th>
                       
                        
                      </tr>                      

                      <?php foreach($rekap as $a){?>
                      <tr>
                        <td><?php echo tgl_indonesia($a->keterangan);?></a></td>
                        <td><?php echo rupiah($a->masuk);?></td>
                        <td><?php echo rupiah($a->keluar);?></td>
                        
                      </tr>
                      <?php }?>

                      <tr>

                      <td colspan="1" bgcolor="black"></td>
                       <td>Total Saldo</td>
                       <td><?php echo rupiah($total);?></td> 

                      </tr>

            
</body>
</html>