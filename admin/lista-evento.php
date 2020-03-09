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
        Listado de Eventos
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li><a href="#">Ejemplo</a></li>
        <li class="active">Listado de Eventos</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los eventos en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Categoría</th>
                  <th>Invitado</th>
                  <th>Acciones</th>
                 
                  
                </tr>
                </thead>
                <tbody>
              
              <?php 
              try {
                  $sql= "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, cat_evento,nombre_invitad, apellido_invitado ";
                  $sql .= " FROM eventos ";
                  $sql .= " INNER JOIN categoria_evento ";
                  $sql .= " ON eventos.id_cat_evento=categoria_evento.id_categoria ";
                  $sql .= " INNER JOIN invitados ";
                  $sql .= " ON eventos.id_inv=invitados.invitado_id ";
                  $sql .= " ORDER BY evento_id ";
                  $resultado = $conn->query($sql);
                  
              } catch (Exception $e) {
                  echo $e->getMessage();
              }
              
            while ($evento = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo utf8_encode($evento['nombre_evento'] )?></td>
                        <td><?php echo $evento['fecha_evento'] ?></td>
                        <td><?php echo $evento['hora_evento'] ?></td>
                        <td><?php echo $evento['cat_evento'] ?></td>
                        <td><?php echo $evento['nombre_invitad']." ". $evento['apellido_invitado'] ?></td>
                        
                        
                        <td>
                            <a href="editar-evento.php?id=<?php echo $evento['evento_id'] ?>" class="btn bg-orange btn-flat margin">
                            <i class="fa fa-pencil"></i>
                            </a>
                             <a href="#" data-id="<?php echo $evento['evento_id'] ?>" data-tipo="evento" class="btn bg-maroon btn-flat margin borrar_registro">
                            <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                  
                      
            <?php } ?>
              
              
              
              
              
                
                
               
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Categoría</th>
                  <th>Invitado</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  </div>
  <!-- /.content-wrapper -->

  <?php include_once '../admin/templastes/footer.php'; ?>