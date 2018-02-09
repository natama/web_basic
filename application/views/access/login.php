<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>E-JPC</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="<?=base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/bootstrap/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/dist/css/AdminLTE.min.css');?>" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/plugins/iCheck/square/blue.css');?>" rel="stylesheet" type="text/css" />
  </head>
  
  <body class="login-page">
    <div class="login-box">
      <?php 
            echo validation_errors('<div class="alert alert-danger"><button class="close" data-dismiss="alert" type="button">×</button>','</div>');
            echo form_open('access/do_login'); 
        ?>
      <div class="login-box-body">

        <div class="login-logo">
          <img src="<?=base_url('gambar/nissan.png');?>" alt="User Image"/><br>
          <a href="<?=base_url();?>"><b>E-JPC</b></a>
        </div>

        <div class="social-auth-links text-center">
            Jl. Soekarno Hatta No.382, Bandung 40266 <br>Telp : (022) 5207777
        </div>

          <div class="form-group has-feedback">
              <input type="text" name="username" 
                     class="form-control" placeholder="Username" autofocus="" value="<?php echo set_value('username'); ?>"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
              <input type="password" name="password" 
                     class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
              <div class="col-xs-12">
                  <button type="submit" class="btn btn-primary btn-block btn-flat"><b>Masuk</b></button>
              </div><!-- /.col -->
          </div>
        <?php echo form_close();?>
        
        
        <div class="social-auth-links text-center">
          <p>E-JPC &copy; 2017
              <br>
             Versi 1.0.0 
          </p>
        </div><!-- /.social-auth-links -->
      </div><!-- /.login-box-body -->
      
    </div><!-- /.login-box -->


    <script src="<?=base_url('assets/plugins/jQuery/jQuery-2.1.3.min.js');?>"></script> 
    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <script src="<?=base_url('assets/plugins/iCheck/icheck.min.js');?>" type="text/javascript"></script>
   
  </body>
  
</html>
