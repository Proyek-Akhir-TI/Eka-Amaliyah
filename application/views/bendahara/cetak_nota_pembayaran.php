<html>
<title>Nota Pembayaran</title>
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


<html>
<br>
  
  <CENTER><h3>
    NOTA PEMBAYARAN TANGGAL <?php echo tgl_indonesia($pembayaran_all->tanggal_pembayaran);?>
  </h3>
  </CENTER> 
  
<br><br>  
  
Siswa<br>
<body>

                 <table align="center" border="1" width="550" cellpadding="3" cellspacing="0">
                      <tr>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Th. Ajaran</th>
                        <th>Semester</th>
                        
                        
                      </tr>
                      

                    
                      <tr>
                        <td><?php echo $pembayaran_all->nisn;?></td>
                        <td><?php echo $pembayaran_all->nama_siswa;?></td>
                        <td><?php echo $pembayaran_all->kelas;?></td>
                        <td><?php echo $pembayaran_all->jurusan;?></td>
                        <td><?php echo $pembayaran_all->th_ajaran;?></td>
                        <td><?php echo $pembayaran_all->semester;?></td>                
                      </tr>
                     

                   
                  </table>
<br>  

Pembayaran<br>
                  <table align="center" border="1" width="550" cellpadding="3" cellspacing="0">
                      <tr>
                        
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
                      

                   
                      <tr>
                       
                        <td><?php echo tgl_indonesia($pembayaran_all->tanggal_pembayaran);?></td>
                        <td><?php echo rupiah($pembayaran_all->dana_kegiatan);?></td>
                        <td><?php echo rupiah($pembayaran_all->psg);?></td>
                        <td><?php echo rupiah($pembayaran_all->ukk);?></td>
                        <td><?php echo rupiah($pembayaran_all->ujian_uts);?></td>
                        <td><?php echo rupiah($pembayaran_all->ujian_uas);?></td>
                        <td><?php echo rupiah($pembayaran_all->dana_akhir12);?></td>
                        <td><?php echo rupiah($pembayaran_all->jumlah);?></td>
                        <td><?php echo $pembayaran_all->keterangan;?></td>
                      </tr>
                     

                   
                  </table>
</body>
</html>                