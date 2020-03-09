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
        Listado de Administradores
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li><a href="#">Ejemplo</a></li>
        <li class="active">Listado de Administradores</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los usuarios en esta sección</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Acciones</th>

                </tr>
                </thead>
                <tbody>
              
              <?php 
              try {
                  $sql= "SELECT id_admin, usuario, nombre FROM admins";
                  $resultado = $conn->query($sql);
                  
              } catch (Exception $e) {
                  echo $e->getMessage();
              }
              
            while ($admin = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $admin['usuario'] ?></td>
                        <td><?php echo $admin['nombre'] ?></td>
                        <td>
                            <a href="editar-admin.php?id=<?php echo $admin['id_admin'] ?>" class="btn bg-orange btn-flat margin">
                            <i class="fa fa-pencil"></i>
                            </a>
                             <a href="#" data-id="<?php echo $admin['id_admin'] ?>" data-tipo="admin" class="btn bg-maroon btn-flat margin borrar_registro">
                            <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                  
                      
            <?php } ?>
              
              
              
              
              
                
                
               
                </tbody>
                <tfoot>
                <tr>
                  <th>Usuario</th>
                  <th>Nombre</th>
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