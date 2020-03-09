<?php 
      include_once 'funciones/sessiones.php';
      include_once 'funciones/funciones.php';
      include_once 'templastes/header.php';
      include_once 'templastes/barra.php';
      include_once 'templastes/sidebar.php';
      
      
       $id = $_GET['id'];
      
      if(!filter_var($id,FILTER_VALIDATE_INT))
      {
          die("Error");
      }
      
?>


  <!-- =============================================== -->


  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Administrador
        <small></small>
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
          <h3 class="box-title">Editar Administrador</h3>

          <div class="box-tools pull-right">
          
          </div>
        </div>
        <div class="box-body">
            
            
             <?php
            $sql = "SELECT * FROM eventos WHERE evento_id = $id";
            $resultado = $conn->query($sql);
            $evento = $resultado->fetch_assoc();
            
        
            ?>
            
          
            <form role="form" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-evento.php">
                <div class="box-body">
                    <div class="form-group">
                        <label for="usuario">Titulo Evento:</label>
                        <input type="text" class="form-control " id="titulo_evento" name="titulo_evento" placeholder="Titulo del Evento" value="<?php echo $evento['nombre_evento'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="usuario">Categoría:</label>
                        <select name="categoria_evento" class="form-control seleccionar" >
                            <option value="0">- Seleccione -</option>
                            <?php 
                            try {
                                
                                $categoria_actual= $evento['id_cat_evento'];
                                $sql="Select * From categoria_evento";
                                $respuesta = $conn->query($sql);
                                
                            while ($cat_evento = $respuesta->fetch_assoc()) { 
                                
                            if($cat_evento['id_categoria']== $categoria_actual) {?>
                                
                            <option value="<?php echo $cat_evento['id_categoria']?>" selected><?php echo $cat_evento['cat_evento']?></option> 
                                
                             <?php }else { ?>
                                
                             <option value="<?php echo $cat_evento['id_categoria']?>" ><?php echo $cat_evento['cat_evento']?></option> 
                                    
                              <?php   }
                               }
                                
                            } catch (Exception $ex) {
                                
                            }
                            
                            
                            ?>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Fecha Evento:</label>
                        
                        <?php
                        $fecha = $evento['fecha_evento'];
                        $fecha_formato = date('m/d/Y', strtotime($fecha));
                        ?>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="fecha" name="fecha_evento" value="<?php echo $fecha_formato ?>">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Hora:</label>
                            
                            <?php 
                            $hora = $evento['hora_evento'];
                             $hora_formato = date('h:i a', strtotime($hora));
                            
                            
                            ?>

                            <div class="input-group">
                                <input type="text" name="hora_evento" class="form-control timepicker" value="<?php echo $hora_formato?>">

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
                                
                                $invitado_actual = $evento['id_inv'];
                                $sql="Select invitado_id,nombre_invitad,apellido_invitado From invitados";
                                $respuesta = $conn->query($sql);
                                
                            while ($invitado = $respuesta->fetch_assoc()) {
                                if($invitado['invitado_id'] == $invitado_actual) {?>
                            <option value="<?php echo $invitado['invitado_id'] ?>" selected>
                                            <?php echo $invitado['nombre_invitad'] . " " . $invitado['apellido_invitado'] ?>
                            </option>
                            
                                <?php } else {?>
                            
                            <option value="<?php echo $invitado['invitado_id']?>">
                                <?php echo $invitado['nombre_invitad']." ".$invitado['apellido_invitado']?>
                            </option>
                            
                                <?php }
                             
                               }
                                
                            } catch (Exception $ex) {
                                
                            }
                            
                            
                            ?>
                            
                        </select>
                    </div>
     
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $id ?>">
                  <button type="submit"  class="btn btn-primary" >Guardar</button>
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