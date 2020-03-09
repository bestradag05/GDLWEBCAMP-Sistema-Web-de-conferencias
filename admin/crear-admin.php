<?php 
      include_once 'funciones/sessiones.php';
      include_once 'funciones/funciones.php';
      include_once 'templastes/header.php';
      include_once 'templastes/barra.php';
      include_once 'templastes/sidebar.php';
?>


  <!-- =============================================== -->


  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Crear Administrador
        <small>Llena el formulario para crear un administrador</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <div class="row">
        <div class="col-md-8">
            
        
    
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Crear Administrador</h3>

          <div class="box-tools pull-right">
          
          </div>
        </div>
        <div class="box-body">
          
            <form role="form" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-admin.php">
                <div class="box-body">
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" id="Usuario" name="usuario" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu Nombre Completo">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password para Iniciar Secion">
                    </div>
                    
                     <div class="form-group">
                        <label for="password">Repetir Password:</label>
                        <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Password para Iniciar Secion">
                        <span id="resultado_password" class="help-block" ></span>
                    </div>
     
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <input type="hidden" name="registro" value="nuevo">
                  <button type="submit" id="crear_registro_admin" class="btn btn-primary" >Añadir</button>
              </div>
            </form>

        </div>

      </div>
      <!-- /.box -->

    </section>
    
    </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include_once '../admin/templastes/footer.php'; ?>