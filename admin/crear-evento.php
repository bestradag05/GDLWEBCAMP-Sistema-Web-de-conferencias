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
          
            <form role="form" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-evento.php">
                <div class="box-body">
                    <div class="form-group">
                        <label for="usuario">Titulo Evento:</label>
                        <input type="text" class="form-control " id="titulo_evento" name="titulo_evento" placeholder="Titulo del Evento">
                    </div>
                    <div class="form-group">
                        <label for="usuario">Categoría:</label>
                        <select name="categoria_evento" class="form-control seleccionar" >
                            <option value="0">- Seleccione -</option>
                            <?php 
                            try {
                                
                                $sql="Select * From categoria_evento";
                                $respuesta = $conn->query($sql);
                                
                            while ($cat_evento = $respuesta->fetch_assoc()) { ?>
                                
                            <option value="<?php echo $cat_evento['id_categoria']?>"><?php echo $cat_evento['cat_evento']?></option> 
                               <?php }
                                
                            } catch (Exception $ex) {
                                
                            }
                            
                            
                            ?>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Fecha Evento:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="fecha" name="fecha_evento">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Hora:</label>

                            <div class="input-group">
                                <input type="text" name="hora_evento" class="form-control timepicker">

                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                    <!-- /time Picker -->
                
                 <div class="form-group">
                        <label for="usuario">Invitado o Ponente:</label>
                        <select name="invitado_evento" class="form-control seleccionar" >
                            <option value="0">- Seleccione -</option>
                            <?php 
                            try {
                                
                                $sql="Select invitado_id,nombre_invitad,apellido_invitado From invitados";
                                $respuesta = $conn->query($sql);
                                
                            while ($invitado = $respuesta->fetch_assoc()) { ?>
                                
                            <option value="<?php echo $invitado['invitado_id']?>">
                                <?php echo $invitado['nombre_invitad']." ".$invitado['apellido_invitado']?>
                            </option> 
                               <?php }
                                
                            } catch (Exception $ex) {
                                
                            }
                            
                            
                            ?>
                            
                        </select>
                    </div>
     
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <input type="hidden" name="registro" value="nuevo">
                  <button type="submit"  class="btn btn-primary" >Añadir</button>
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