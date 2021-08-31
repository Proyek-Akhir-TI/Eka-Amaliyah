    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      
      <?php if($this->session->userdata('level')==1){?>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>Bendahara">
      <?php }?>

      <?php if($this->session->userdata('level')==2){?>
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>Kepsek">
      <?php }?>

        <div class="sidebar-brand-icon">
          <img src="<?php echo base_url();?>assets/themabaru/img/logo/logo2.png">
        </div>

        <?php if($this->session->userdata('level')==1){?> 
        <div class="sidebar-brand-text mx-3">Bendahara</div>
        <?php }?>

        <?php if($this->session->userdata('level')==2){?> 
        <div class="sidebar-brand-text mx-3">Kepala Sekolah</div>
        <?php }?>

      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        
        <?php if($this->session->userdata('level')==1){?>
        <a class="nav-link" href="<?php echo base_url();?>Bendahara">
        <?php }?>

        <?php if($this->session->userdata('level')==2){?>
        <a class="nav-link" href="<?php echo base_url();?>Kepsek">
        <?php }?>


          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      


      <!--sidebar admin-->
    <?php if($this->session->userdata('level')==1){?>
      
       <li class="nav-item">
       <a class="nav-link" href="<?php echo base_url();?>Bendahara/datakaryawan">
          <i class="fas fa-book"></i>
          <span>Data Karyawan</span></a>
      </li>
	  
	  <li class="nav-item">
       <a class="nav-link" href="<?php echo base_url();?>Bendahara/datakelas">
          <i class="fas fa-book"></i>
          <span>Data Kelas</span></a>
      </li>

      <li class="nav-item">
       <a class="nav-link" href="<?php echo base_url();?>Bendahara/datasiswa">
          <i class="fas fa-users"></i>
          <span>Data Siswa</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Manajemen Sekolah</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu</h6>
            <a class="collapse-item" href="<?php echo base_url();?>Bendahara/jenispembayaran">Jenis Pembayaran</a>
            <a class="collapse-item" href="<?php echo base_url();?>Bendahara/datapembayaran">Pembayaran</a>
             <a class="collapse-item" href="<?php echo base_url();?>Bendahara/datapembayaran_history">History Pembayaran</a>
            <a class="collapse-item" href="<?php echo base_url();?>Bendahara/datagaji">Data Gaji</a>
            <a class="collapse-item" href="<?php echo base_url();?>Bendahara/datakasmasuk">Kas Masuk</a>
            <a class="collapse-item" href="<?php echo base_url();?>Bendahara/datakaskeluar">Kas Keluar</a>
            <a class="collapse-item" href="<?php echo base_url();?>Bendahara/datarekapitulasi">Data Rekapitulasi</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <?php }?>


    <!--sidebar kepsek-->
    <?php if($this->session->userdata('level')==2){?>
      
      <li class="nav-item">
       <a class="nav-link" href="<?php echo base_url();?>Kepsek/datakaryawan">
          <i class="fas fa-book"></i>
          <span>Data Karyawan</span></a>
      </li>

      <li class="nav-item">
       <a class="nav-link" href="<?php echo base_url();?>Kepsek/datasiswa">
          <i class="fas fa-book"></i>
          <span>Data Siswa</span></a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="far fa-fw fa-window-maximize"></i>
          <span>Manajemen Sekolah</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu</h6>
             <a class="collapse-item" href="<?php echo base_url();?>Kepsek/datakasmasuk">Kas Masuk</a>
             <a class="collapse-item" href="<?php echo base_url();?>Kepsek/datakaskeluar">Kas Keluar</a>
             <a class="collapse-item" href="<?php echo base_url();?>Kepsek/datarekapitulasi">Data Rekapitulasi</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <?php }?>