<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url();?>assets/themabaru/img/logo/logo.png" rel="icon">
  
  <?php if($this->session->userdata('level')==1){?>
  <title>Bendahara</title>
  <?php }?>

  <?php if($this->session->userdata('level')==2){?>
  <title>Kepala Sekolah</title>
  <?php }?>

  <link href="<?php echo base_url();?>assets/themabaru/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="<?php echo base_url();?>assets/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/themabaru/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
 <link href="<?php echo base_url();?>assets/datepicker/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url();?>assets/themabaru/css/ruang-admin.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/themabaru/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

