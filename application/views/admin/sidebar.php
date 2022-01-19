<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="<?php echo base_url('Karyawan_profile')?>" class="brand-link">
    <span class="brand-text font-weight-light"><?php echo $this->session->userdata('nama')?></span>
    <span class="brand-text font-weight-light"></span>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href="<?php echo base_url('dashboard')?>" class="nav-link">
              <i class="fas fa-home"></i>
              <p>Beranda</p>
            </a>
        </li>
        <!-- <li class="nav-header">Master Data</li>
        <li class="nav-item">
            <a href="<?php echo base_url('admin_data')?>" class="nav-link">
              <i class="fas fa-users"></i>
              <p>Data List Sebaran Lokasi Wifi</p>
            </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo base_url('KLO_jawaban')?>" class="nav-link">
            <i class="fas fa-chart-line"></i>
            <p>Detail Lokasi Wifi</p>
          </a>
        </li>
        <li class="nav-header">OTHER</li> -->
        <li class="nav-item">
          <a href="<?php echo base_url('auth/destroy')?>" class="nav-link">
            <i class="nav-icon fas fa-arrow-circle-right"></i>
            <p>
              Logout
            </p>
          </a>
        </li>
    	</ul>
    </nav>
  </div>
</aside>
