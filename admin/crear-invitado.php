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
        Crear Invitados
        <small>Llena el formulario para añadir un invitados</small>
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
          <h3 class="box-title">Crear Invitados</h3>

          <div class="box-tools pull-right">
          
          </div>
        </div>
        <div class="box-body">
          
            <form role="form" name="guardar-registro" id="guardar-registro-archivo" method="POST" action="modelo-invitado.php" ecntype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="Nombre">
                    </div>
                      <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" placeholder="Apellido">
                    </div>
                    
                   <div class="form-group">
                        <label for="biografia">Biografía:</label>
                        <textarea class="form-control" id="biografia" name="biografia" rows="8" placeholder="Biografía"></textarea>
                    </div>
                    
                  <label for="imagen_invitado">Imagen: </label>
                  <input type="file"  class="form-control" id="imagen_invitado" name="archivo_imagen">

                  <p class="help-block">Añada la imgen del invitado aquí.</p>
                </div>
                   

              
              <!-- /.box-body -->

              <div class="box-footer">
                  <input type="hidden" name="registro" value="nuevo">
                  <button type="submit" id="crear_registro" class="btn btn-primary" >Añadir</button>
              </div>
           </form>
</div>
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