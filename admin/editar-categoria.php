<?php 
      include_once 'funciones/sessiones.php';
      include_once 'funciones/funciones.php';
      include_once 'templastes/header.php';
      include_once 'templastes/barra.php';
      include_once 'templastes/sidebar.php';
      
      
      $id=$_GET['id'];
      
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
        Editar Categoria
        <small>Llena el formulario para Editar un Categoría</small>
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
          <h3 class="box-title">Editar Categoría</h3>

          <div class="box-tools pull-right">
          
          </div>
        </div>
        <div class="box-body">
          
            <?php 
            
            try {
                
            
                $sql ="SELECT * FROM categoria_evento WHERE id_categoria= $id ";
                $resultado= $conn->query($sql);
                $categoria = $resultado->fetch_assoc();
                
           
            } catch (Exception $ex) {
                
                $ex->getMessage();
            }
            
            ?>
            
            <form role="form" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-categoria.php">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" value="<?php echo $categoria['cat_evento']?>" placeholder="Categoría">
                    </div>
                    
                    <div class="form-group iconpicker-container">
                        <label for="">Icono:</label>
                        <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-book"></i>
                        </div>
                            <input type="text" id="icono" name="icono" class="form-control pull-right" placeholder="fa-icon" value="<?php echo $categoria['icono']?>">
                         </div>   
                    </div>
                   

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_categoria" value="<?php echo $id ;?>">
                  <button type="submit" id="crear_registro" class="btn btn-primary" >Guardar</button>
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