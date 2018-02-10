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
  <body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">
      
	<?php include('menu.php')?>
	

    <!--Pembuka Konten Wrapper-->
	<div class="content-wrapper"> 
        <!-- Pembuka Konten Utama -->
        <section class="content">
          <!-- Info boxes -->