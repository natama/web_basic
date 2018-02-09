<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>E-JPC Ver. 0.1</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?=base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/plugins/fontawesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/plugins/ionicons/css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/dist/css/AdminLTE.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/dist/css/skins/_all-skins.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/plugins/iCheck/flat/green.css');?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/select2/select2.min.css">

    <script src="<?=base_url('assets/plugins/jQuery/jQuery-2.1.3.min.js');?>"></script>
    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>    
    <script src='<?=base_url('assets/plugins/fastclick/fastclick.min.js');?>'></script>
    <script src="<?=base_url('assets/dist/js/app.min.js');?>" type="text/javascript"></script>
    
     <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
   
    <script src="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/plugins/iCheck/icheck.min.js');?>" type="text/javascript"></script>
    
    <link href="<?=base_url('assets/js/jquery-ui.css');?>" rel="stylesheet" type="text/css"/>
    
    <script type="text/javascript" src="<?=base_url('assets/js/jquery-ui.min.js');?>"></script>
    <script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>assets/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>assets/plugins/accounting/accounting.min.js" type="text/javascript"></script>

    <script src="<?php echo base_url();?>assets/plugins/select2/select2.full.min.js"></script>

    <script type="text/javascript">
    var login_state = "<?php echo $this->session->userdata('loginstate');?>";
    //console.log(login_state);
    if(login_state != 1){
      window.location = "<?php echo base_url(); ?>access";
    }

    </script>
    
   
  </head>
  <body class="skin-red fixed">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?=base_url();?>" class="logo">E-JPC Ver. 0.1</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?=base_url('assets/dist/img/user.jpg');?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Selamat Datang, <b><?php echo $this->session->userdata('nama');?></b></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?=base_url('assets/dist/img/User-blue.png');?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo $this->session->userdata('username');?> - <?php echo $this->session->userdata('jabatan');?>
                      <small>Member Since : <?php echo $this->session->userdata('time');?></small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?=base_url('access/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=base_url('assets/dist/img/User-blue.png');?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('nama');?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
       
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header bg-red-active">MAIN NAVIGATION</li>
            


            <li>
              <a href="<?=base_url('dashboard');?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

            <?php

            $this->db->select("a.*, b.*");
            $this->db->from("tb_menu a");
            $this->db->join('tb_menu_user b','a.id_menu=b.id_menu');
            $this->db->where("kat_menu", 0);
            $this->db->where("b.id_user", $this->session->userdata('userid'));
            $query = $this->db->get();

            foreach ($query->result() as $row)
            {

              $this->db->select("*");
              $this->db->from("tb_menu");
              $this->db->where("kat_menu", $row->id_menu);
              $sub = $this->db->get();

              if($sub->num_rows() > 0){

                echo '<li class="treeview">';
                echo '<a href="'.base_url().''.$row->link.'">';
                echo '<i class="'.$row->icon.'"></i> <span>'.$row->nama_menu.'</span> <i class="fa fa-angle-left pull-right"></i>';
                echo '</a>';
                echo '<ul class="treeview-menu">';

                  foreach ($sub->result() as $key) {
                    echo '<li class=""><a href="'.base_url().''.$key->link.'"><i class="'.$key->icon.'"></i> '.$key->nama_menu.'</a></li>';
                  }
                  
                
                echo '</ul>';
                echo '</li>';
         


              }
              else{

                  echo '<li>';
                    echo '<a href="'.base_url().''.$row->link.'">';
                      echo '<i class="'.$row->icon.'"></i> <span>'.$row->nama_menu.'</span>';
                    echo '</a>';
                  echo '</li>';

              }


            }


            ?> 


            <?php $level = $this->session->userdata('level');
                if($level==1){
            ?>

             <li class="treeview">
              <a href="#">
                <i class="fa fa-user-secret"></i> <span>Administrator</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url('users');?>"><i class="fa fa-user-plus"></i> <span>Management User</span></a></li>
              </ul>
            </li>
            <?php
              }
            ?>

            <li>
              <a href="<?=base_url('laporan/laporan');?>">
                <i class="fa fa-file-text-o"></i> <span>Laporan</span>
              </a>
            </li>
         
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->