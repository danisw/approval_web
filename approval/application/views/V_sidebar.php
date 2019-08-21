  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>assets/gambar/<?php echo $this->session->userdata('ses_company'); ?>.png" class="img-circle" alt="User Image">
        </div>
         <div class="pull-left info">
           <p><?php echo $this->session->userdata('ses_nama'); ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $this->session->userdata('ses_jabatan'); ?> <?php echo $this->session->userdata('ses_dept'); ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
     <ul class="sidebar-menu">
        <!--- Menu setting based on level user -->
        <?php 
            $level=$this->session->userdata('jabatan');
            switch($level){
            case $level == 1 : ?>
                      <li class="active"><a href="<?=base_url()?>index.php/Page"><i class="fa fa-home"></i> <span>Home</span></a></li>
                     <li><a href="<?=base_url()?>index.php/Request/list_request"><i class="fa fa-reorder"></i> <span>Show Request</span></a></li>
                      <li><a href="<?=base_url()?>index.php/Request/add_request"><i class="fa fa-plus"></i> <span>Add Request</span></a></li>
                     <li><a href="<?=base_url()?>index.php/Request/approve_request"><i class="fa fa-reorder"></i> <span>Approve Request</span></a></li>
                     <?php ; break;
            case $level == 2 : ?>
                    <li class="active"><a href="<?=base_url()?>index.php/Page"><i class="fa fa-home"></i> <span>Home</span></a></li>
                    <li><a href="<?=base_url()?>index.php/Request/list_request"><i class="fa fa-reorder"></i> <span>Show Request</span></a></li>
                    <li><a href="<?=base_url()?>index.php/Request/add_request"><i class="fa fa-plus"></i> <span>Add Request</span></a></li>
                   <?php ; break;
            case $level == 3 : ?>
                    <li class="active"><a href="<?=base_url()?>index.php/Page"><i class="fa fa-home"></i> <span>Home</span></a></li>
                    <li><a href="<?=base_url()?>index.php/Request/list_request"><i class="fa fa-reorder"></i> <span>Show Request</span></a></li>
                    <li><a href="<?=base_url()?>index.php/Request/add_request"><i class="fa fa-plus"></i> <span>Add Request</span></a></li>
                   <?php ; break;
            case $level == 4 : ?>
                    <li class="active"><a href="<?=base_url()?>index.php/Page"><i class="fa fa-home"></i> <span>Home</span></a></li>
                    <li><a href="<?=base_url()?>index.php/Request/list_request"><i class="fa fa-reorder"></i> <span>Show Request</span></a></li>
                    <li><a href="<?=base_url()?>index.php/Request/add_request"><i class="fa fa-plus"></i> <span>Add Request</span></a></li>
                   <li><a href="<?=base_url()?>index.php/Request/approve_request"><i class="fa fa-reorder"></i> <span>Approve Request</span></a></li>
                   <li><a href="<?=base_url()?>index.php/Module/set_module"><i class="fa fa-reorder"></i> <span>Setting Module</span></a></li>
                   <?php ; break;
            default: ?> 
                     <li class="active"><a href="<?=base_url()?>index.php/Page"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <?php ; break;
          }
        ?>
      </ul>
    </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>