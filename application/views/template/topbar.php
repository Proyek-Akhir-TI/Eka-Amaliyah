<!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
           
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
               
                <span class="ml-2 d-none d-lg-inline text-white small">Halo, <?php echo $this->session->userdata('username');?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?php echo base_url();?>Auth/logout">
                  Logout
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->