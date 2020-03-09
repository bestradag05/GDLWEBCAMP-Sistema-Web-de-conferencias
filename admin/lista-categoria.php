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
        Listado de Categorías
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li><a href="#">Ejemplo</a></li>
        <li class="active">Listado de Categorías</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los categorías de los eventos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Icono</th>
                  <th>Acciones</th>

                </tr>
                </thead>
                <tbody>
              
              <?php 
              try {
                  $sql= "SELECT * FROM categoria_evento";
                  $resultado = $conn->query($sql);
                  
              } catch (Exception $e) {
                  echo $e->getMessage();
              }
              
            while ($categoria = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $categoria['cat_evento'] ?></td>
                        <td><i class="fa <?php echo $categoria['icono'] ?>"></i></td>
                        <td>
                            <a href="editar-categoria.php?id=<?php echo $categoria['id_categoria'] ?>" class="btn bg-orange btn-flat margin">
                            <i class="fa fa-pencil"></i>
                            </a>
                             <a href="#" data-id="<?php echo $categoria['id_categoria'] ?>" data-tipo="categoria" class="btn bg-maroon btn-flat margin borrar_registro">
                            <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                  
                      
            <?php } ?>
              
              
              
              
              
                
                
               
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Icono</th>
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