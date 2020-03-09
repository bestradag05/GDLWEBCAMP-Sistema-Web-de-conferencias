<?php 

      session_start();
     
      if(isset($_GET['cerrar_sesion']))
      {
          session_destroy();
      }
      include_once 'funciones/funciones.php';
      include_once 'templastes/header.php';

?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>GDL</b>WebCamp</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Iniciar Sesion Aqui</p>
    
    
    <form  name="login-admin-form" id="login-admin" method="POST" action="login-admin.php">
      <div class="form-group has-feedback">
          <input type="text" class="form-control" name="usuario" placeholder="Usuario">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-12 ">
          <input type="hidden" name="registro" value="logeo">
          <button type="submit" name="login_admin" class="btn btn-primary btn-block btn-flat">Iniciar Sesión</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
   
  <?php include_once 'templastes/footer.php'; ?>
