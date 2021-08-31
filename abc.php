<?php
// membaca data1, data2, dan data3 dari form
$req = "notifikasi";
$namapackage = "artdroid.com.simufer";
$pesan = "Tes Via cURL 46";
$iduser = "3";

// pengiriman ke situsku.com via CURL
$url = "http://kioscodingbwi.000webhostapp.com/notifikasi/notif.php";

$curlHandle = curl_init();
curl_setopt($curlHandle, CURLOPT_URL, $url);
curl_setopt($curlHandle, CURLOPT_POSTFIELDS, "req=".$req."&namapackage=".$namapackage."&pesan=".$pesan."&iduser=".$iduser);
curl_setopt($curlHandle, CURLOPT_HEADER, 0);
curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);
curl_setopt($curlHandle, CURLOPT_POST, 1);
curl_exec($curlHandle);
curl_close($curlHandle);

//echo "<meta http-equiv='refresh' content='1; url=localhost/inventaris/'>";

?>