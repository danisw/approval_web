  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>E</b>APP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>E-APPROVAL</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?=base_url()?>assets/gambar/<?php echo $this->session->userdata('ses_company'); ?>.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $this->session->userdata('ses_nama'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?=base_url()?>assets/gambar/<?php echo $this->session->userdata('ses_company'); ?>.png" class="img-circle" alt="User Image">

                <p>
                
                   <p><?php echo $this->session->userdata('ses_nama'); ?></p>
                   <p><?php echo $this->session->userdata('ses_id'); ?></p>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">

                <div class="pull-right">
                  <a href="<?php echo base_url('index.php/Login/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>

            </ul>

          </li>

        </ul>
      </div>
    </nav>
  </header>