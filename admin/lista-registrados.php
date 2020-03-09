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
        Listado de Personas Registradas
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li><a href="#">Ejemplo</a></li>
        <li class="active">Listado de Personas Registradas</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Maneja los visitantes registrados</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="registros" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha</th>
                  <th>Artículos</th>
                  <th>Talleres</th>
                  <th>Regalo</th>
                  <th>Compra</th>
                  <th>Acciones</th>
                  

                </tr>
                </thead>
                <tbody>
              
              <?php 
              try {
                  $sql= "SELECT registrados.*, regalos.nombre_regalo FROM registrados ";
                  $sql .=" INNER JOIN regalos ";
                  $sql .=" ON  registrados.regalo= regalos.ID_regalo";
                  $resultado = $conn->query($sql);
                  
              } catch (Exception $e) {
                  echo $e->getMessage();
              }
              
            while ($registrado = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td>
                            <?php echo $registrado['nombre_registrado']." ". $registrado['apellido_registrado'] ;
                                 echo '<br>';
                                    $pagado = $registrado['pagado'];
                                    if($pagado)
                                    {
                                        echo '<span class="badge bg-green">Pagado</span>';
                                    }else
                                    {
                                        echo '<span class="badge bg-red">No Pagado</span>';
                                    }
                                    
                                    ?>
                            
                        </td>
                        <td><?php echo $registrado['email_registrado'] ?></td>
                        <td><?php echo $registrado['fecha_registrado'] ?></td>
                        <td>
                            <?php  
                            $articulos = json_decode($registrado['pases_articulos'], true);
                            
                            
                            
                            $arreglo_articulos = array(
                                'un_dia' => 'Pase 1 dia',
                                'pase_2dias' => 'Pase 2 dias',
                                'pase_completo'=> 'Pase Completo',
                                'camisas' => 'Camisas',
                                'etiquetas' => 'Etiquetas'
                            );
                            foreach ($articulos as $llave => $articulo)
                            {
                                
                                if(is_array($articulo) && array_key_exists('cantidad', $articulo)){ //pasamos la llave a revisar y dónde queremos revisar.
                                            echo "<b>" . $articulo['cantidad'] . "</b>" . " " .$arreglo_articulos[$llave] . "<br>";
                                        }else {
                                            echo "<b>" . $articulo . "</b>" . " " .$arreglo_articulos[$llave] . "<br>";
                                        }

                                
                                
                            }
                            
                                
                            
                            ?>
                        </td>
                        <td><?php
                        
                        $eventos_resultado = $registrado['talleres_registrado'];
                        $talleres = json_decode($eventos_resultado, true);  
                        
                        $talleres = implode("', '", $talleres['eventos']);
                        $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE clave IN ('$talleres') OR evento_id IN ('$talleres')";
                        
                        $resultado_talleres = $conn->query($sql_talleres);
                        
                        while($eventos = $resultado_talleres->fetch_assoc())
                        {
                            echo utf8_encode($eventos['nombre_evento']." ".$eventos['fecha_evento']." ".$eventos['hora_evento']. "<br>");
                        }
                         
                        ?></td>
                        <td><?php echo $registrado['nombre_regalo'] ?></td>
                        <td>$ <?php echo $registrado['total_pagado'] ?></td>
                        
                        <td>
                            <a href="editar-registrado.php?id=<?php echo $registrado['id_registrado'] ?>" class="btn bg-orange btn-flat margin">
                            <i class="fa fa-pencil"></i>
                            </a>
                             <a href="#" data-id="<?php echo $registrado['id_registrado'] ?>" data-tipo="registrado" class="btn bg-maroon btn-flat margin borrar_registro">
                            <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                  
                      
            <?php } ?>
              
              
              
              
              
                
                
               
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Fecha</th>
                  <th>Artículos</th>
                  <th>Talleres</th>
                  <th>Regalo</th>
                  <th>Compra</th>
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