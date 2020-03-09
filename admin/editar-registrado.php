<?php 
    

    $id = $_GET['id'];
    if(!filter_var($id, FILTER_VALIDATE_INT))
    {
        die("Error");
    }

      include_once 'funciones/sessiones.php';
      include_once 'funciones/funciones.php';
      include_once 'templastes/header.php';
      include_once 'templastes/barra.php';
      include_once 'templastes/sidebar.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Registro de Usuario Manual
        <small>Llena el formulario para crear un usuario registrado</small>
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
          <h3 class="box-title">Editar Registro</h3>

          <div class="box-tools pull-right">
          
          </div>
        </div>
        <div class="box-body">
            
            <?php 
            $sql = "SELECT * FROM registrados WHERE id_registrado = $id";
            $resultado = $conn->query($sql);
            $registrados = $resultado->fetch_assoc();
            

            
            ?>
          
            <form class="editar-registrado" role="form" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-registrado.php">
                <div class="box-body">
                    <div class="form-group">
                        <label for="nombre_registrado">Nombre:</label>
                        <input type="text" value="<?php echo $registrados['nombre_registrado'] ?>" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                      <div class="form-group">
                        <label for="apellido">Apellido:</label>
                        <input type="text" value="<?php echo $registrados['apellido_registrado'] ?>"  class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                    </div>
                 <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" value="<?php echo $registrados['email_registrado'] ?>" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    
                    <?php 
                    $pedido = $registrados['pases_articulos'];
                    $boletos = json_decode($pedido, true);
                    
                    
                    
                    ?>
                    
                    <div class="form-group">
                        <div id="paquetes" class="paquetes">
                  <h3>Elige el número de boletos</h3>
                  
                  <section class="precio seccion">
                      <h2>Precios</h2>
                      <div class="contenedor">
                          <ul class="lista-precios clearfix row">
                              <li  class="col-md-4">
                                  <div class="tabla-precio text-center">
                                      <h3>Pase por dia (Viernes)</h3>
                                      <p class="numero">$30</p>
                                      <ul>
                                          <li>Bocadillos Gratios</li>
                                          <li>Todas las conferencias</li>
                                          <li>Todos los talleres</li>
                                      </ul>
                                      <div class="orden">
                                          <label for="pase_dia">Boletos deseados:</label>
                                          <input value="<?php echo $boletos['un_dia']['cantidad'];?>" type="number" min="0" class="form-control" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0" />
                                          <input type="hidden" value="30" name="boletos[un_dia][precio]" />
                                      </div>
                                  </div>
                              </li>
                              <li class="col-md-4">
                                  <div class="tabla-precio text-center">
                                      <h3>Todos los dias</h3>
                                      <p class="numero">$50</p>
                                      <ul>
                                          <li>Bocadillos Gratios</li>
                                          <li>Todas las conferencias</li>
                                          <li>Todos los talleres</li>
                                      </ul>
                                       <div class="orden">
                                          <label for="pase_completo">Boletos deseados:</label>
                                          <input value="<?php echo $boletos['pase_completo']['cantidad'];?>" type="number" min="0" class="form-control" id="pase_completo" size="3" name="boletos[completo][cantidad]" placeholder="0" />
                                          <input type="hidden" value="50" name="boletos[completo][precio]" />
                                      </div>
                                  </div>
                              </li>
                              <li class="col-md-4">
                                  <div class="tabla-precio text-center ">
                                      <h3>Pase por 2 dias (Viernes y Sabado)</h3>
                                      <p class="numero">$45</p>
                                      <ul>
                                          <li>Bocadillos Gratios</li>
                                          <li>Todas las conferencias</li>
                                          <li>Todos los talleres</li>
                                      </ul>
                                       <div class="orden">
                                          <label for="pase_dosdias">Boletos deseados:</label>
                                          <input value="<?php echo $boletos['pase_2dias']['cantidad'];?>" type="number" min="0" class="form-control" id="pase_dosdias" size="3" name="boletos[2dias][cantidad]" placeholder="0" />
                                          <input type="hidden" value="45" name="boletos[2dias][precio]" />
                                      </div>
                                  </div>
                              </li>
                          </ul>
                      </div>
                  </section>
                  
              </div>
                    </div><!--. form-group-->
                  <div id="eventos" class="eventos clearfix">
                         <h3>Elige tus talleres</h3>
                         <div class="caja">
                             <?php 
                             
                             $eventos = $registrados['talleres_registrado'];
                             $id_eventos_registrados = json_decode($eventos, TRUE);
                            
                             
                             try {
                                 
                                 
                                 $sql = " SELECT eventos.*,categoria_evento.cat_evento, invitados.nombre_invitad, invitados.apellido_invitado ";
                                 $sql .= " FROM eventos ";
                                 $sql .= " JOIN categoria_evento ON eventos.id_cat_evento= categoria_evento.id_categoria ";
                                 $sql .= " JOIN invitados ON eventos.id_inv= invitados.invitado_id ";
                                 $sql .= " ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento ";
                                 
                                 $resultado = $conn->query($sql);
                                 
                                 
                             } catch (Exception $ex) {
                              echo $ex->getMessage();   
                             }
                             
                             $eventos_dias = array();
                             while ($eventos = $resultado ->fetch_assoc())
                             {
                                 $fecha = $eventos['fecha_evento'];
                                 setlocale(LC_ALL, 'es_ES');;
                                 $dia_semana = strftime("%A", strtotime($fecha));
                                 
                                 $dia = array(
                                     
                                     'nombre_evento' =>$eventos['nombre_evento'],
                                     'hora' => $eventos['hora_evento'],
                                     'id' => $eventos['evento_id'],
                                     'nombre_invitad' => $eventos['nombre_invitad'],
                                     'apellido_invitado' =>$eventos['apellido_invitado']
                                 );
                                 
                                 $eventos_dias[$dia_semana]['eventos'][$eventos['cat_evento']][]= $dia;
                                 
                                 
                             }    
                             
                             ?>
                             
                             
                             
                             <?php 
                             foreach ($eventos_dias as $dia => $evento){ 
                                 $dia1= utf8_encode($dia);
                                 $dia_m=str_replace('á','a', $dia1)
                                 ?>
                             
                             <div id="<?php echo $dia_m;?>" class="contenido-dia clearfix row">
                                 <h4 class="text-center nombre_dia"><?php echo utf8_encode($dia); ?></h4>
                                 
                                 <?php 
                                 foreach ($evento['eventos'] as $tipo => $evento_dia) :
                                 
                                 ?>
                                 <div class="col-md-4">
                                           <p><?php echo $tipo ?>:</p>
                                           
                                   <?php foreach ($evento_dia as $evento) :?>
                                           <label>
                                               <input <?php echo (in_array( $evento['id'], $id_eventos_registrados['eventos'])? 'checked':''); ?> type="checkbox" class="minimal" name="registro_evento[]" id="<?php echo $evento['id'] ?>" value="<?php echo $evento['id'] ?>">
                                           <time><?php echo $evento['hora'] ?></time> <?php echo utf8_encode($evento['nombre_evento']) ?><br>
                                           <span class="autor"><?php echo $evento['nombre_invitad']." ". $evento['apellido_invitado'] ?></span>
                                           </label>
                                          <?php endforeach;?>
                                       </div>
                                <?php endforeach; ?>      
                               </div> <!--#Contenido-dia-->
                                 <?php  }
                                ?>
                             
                           </div><!--.caja-->
                     </div> <!--#eventos-->
              
                     <div  id="resumen" class="resumen ">
                         <div class="box-header with-border">
                             <h3 class="box-title">Pagos y Extras</h3>
                         </div>
                         <br>
                         
                         <div  class="caja clearfix row">
                             
                             <div class="extras col-md-6">
                                 <div class="orden">
                                     <label for="camisa_evento" >Camisa del evento $10<small>(promocion 7% dto.)</small></label>
                                     <input value="<?php echo $boletos['camisas'] ?>" type="number"  class="form-control" min="0"  id="camisa_evento" name="pedido_extra[camisas][cantidad]" size="3" placeholder="0" />
                                     <input type="hidden" value="10" name="pedido_extra[camisas][precio]" />
                                 </div>
                                 <div class="orden">
                                     <label for="etiquetas" >Paquete de 10 etiquetas $2<small>(HTML5, CSS3, JavaScript)</small></label>
                                     <input value="<?php echo $boletos['etiquetas'] ?>" type="number" class="form-control" min="0"  id="etiquetas" name="pedido_extra[etiquetas][cantidad]" size="3" placeholder="0" />
                                     <input type="hidden"  value="2" name="pedido_extra[etiquetas][precio]" />
                                 </div>
                                 <div class="orden">
                                     <label for="regalo" >Seleccione un regalo</label><br>
                                     
                                     <select id="regalo" name="regalo" required class="form-control seleccionar">
                                         <option value="">- Seleccione un regalo</option>
                                         <option value="2" <?php echo ($registrados['regalo']== 2)? 'selected' : ''?>>Etiquetas</option>
                                         <option value="1" <?php echo ($registrados['regalo']== 1)? 'selected' : ''?>>Pulseras</option>
                                         <option value="3" <?php echo ($registrados['regalo']== 3)? 'selected' : ''?>>Plumas</option>
                                     </select>
                                    
                                 </div>
                                 <br>
                                 <input type="button" id="calcular" name="submit" class="btn btn-success"  value="Calcular"/>
                                 
                             </div> <!-- Extras -->
                             
                             <div class="total col-md-6">
                                 <p>Resumen:</p>
                                 <div id="listaproductos">
                                 

                                 </div>
                                 <p>Total Ya Pagado: <?php echo (float)$registrados['total_pagado']; ?></p>
                                 <p>Total:</p>
                                 <div id="suma-total">
                                     
                                 </div>
                                 
                                 
                             </div><!-- total -->
                             
                         </div><!-- caja -->
                         
                     </div>
                   

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                  <input type="hidden" name="total_pedido" id="total_pedido" value="total_pedido"/>
                  <input type="hidden" name="total_descuento" id="total_descuento" value="total_descuento">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $registrados['id_registrado'] ?>">
                  <input type="hidden" name="fecha_registro" value="<?php echo $registrados['fecha_registrado'] ?>">
                  <button type="submit" id="btnRegistro" class="btn btn-primary" >Guardar</button>
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