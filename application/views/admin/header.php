<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown show">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <!-- <?php if ($this->session->userdata('image') == '' || $this->session->userdata('image') == null): ?>
                  <img src="<?= base_url()?>assets/dist/img/user2-160x160.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <?php else: ?>
                  <img src="<?= base_url('assets/img/user/'.$this->session->userdata('image'))?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <?php endif ?> -->
              <div class="media-body">
                      <!-- <h3 class="dropdown-item-title">
                        <?php if($this->session->userdata('user_id')){echo $this->session->userdata('fullName');}?>
                      </h3> -->
                      <form action="<?php echo base_url('admin/edit_profile/'.$id);?>" method="post">
                        <!-- <button href="" class="btn btn-block btn-outline-primary btn-xs mt-3">Edit Profile</button> -->
                      </form>
                </div>
              </div>
            </div>
          </a>
        </div>
      </li>
    </ul>
  </nav>
