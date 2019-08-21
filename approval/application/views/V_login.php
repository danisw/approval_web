<!DOCTYPE html>
<html>
  <head>
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <!-- Bootstrap -->
  <script src="<?=base_url()?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
 <link rel="stylesheet" href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/css/skins/skin-green.min.css">
   <link rel="stylesheet" href="<?=base_url()?>assets/adminlte/css/skins/skin-green.css">
  </head>
  <body class="hold-transition login-page">
      <div class="login-box">
        <div class="login-logo">
          <b>Welcome ! </b>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form action="Login/auth" method="post">
            <div class="form-group has-feedback">
              <input type="text" class="form-control" name="username" placeholder="Username">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name="password" placeholder="Password">
              
              
            </div>
            <div class="row">
              <div class="col-xs-8">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Remember Me
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" name="login" value="Login" class="btn btn-success btn-block btn-flat">Sign In</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

              <!-- /.social-auth-links -->

          <!-- <a href="index.php/Login/lupa_password">I forgot my password</a><br> -->
         

        </div>
        <!-- /.login-box-body -->
      </div>
      <!-- /.login-box --> 

    <!-- jQuery 2.2.0 -->
    <script src="<?=base_url()?>/assets/plugins/jQuery/jQuery-2.2.0.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="<?=base_url()?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
 <!--    <script src="<?=base_url()?>/assets/plugins/iCheck/icheck.min.js"></script> -->
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>