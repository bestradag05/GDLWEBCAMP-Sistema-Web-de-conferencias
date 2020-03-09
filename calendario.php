<?php include_once 'includes/templade/header.php'; ?>



      
      <section class="seccion contenedor">
          <h2>Calendario  de eventos</h2>
         
          <?php
          
          try {
              
              require_once('includes/funciones/bd_conexion.php');
              $sql ="SELECT e.*,ce.cat_evento,icono, inv.nombre_invitad, inv.apellido_invitado FROM eventos AS e 
                  INNER JOIN categoria_evento AS ce ON ce.id_categoria=e.id_cat_evento
                  INNER JOIN invitados As inv ON inv.invitado_id=ce.id_categoria ;";
              $resultado = $conn->query($sql);
          } catch (Exception $exc) {
             echo $exc->getMessage();
          }
                    
          ?>
          
          <div class="calendario">
              <?php
              
              $calendario =array();
              while($eventos= $resultado->fetch_assoc()){ 
              
                  $fecha=$eventos['fecha_evento'];
              $evento = array(
              'titulo' => $eventos['nombre_evento'],
              'fecha' => $eventos['fecha_evento'],
              'hora' =>$eventos['hora_evento'],
              'categoria' => $eventos['cat_evento'],
               'icono' => "fas" . " ".$eventos['icono'],
              'invitado' => $eventos['nombre_invitad']." ". $eventos['apellido_invitado']
              );
              
          
              $calendario[$fecha][]= $evento;//para ordenar por fechas, se coloca
                                             // el primer [] para agruparlos por ese parametro
                 
               ?>
              
              <?php } ?>
              
              <?php
              foreach($calendario as $dia =>$lista_eventos) { //Ingresas al dia y el '=>' es para ingresar al valor del?>
                                                              <!--del dia del arreglo, debido a que se agupan por dias. -->
              <h3 >
                  <i class="fa fa-calendar-alt"></i>
                  
                  <?php
                  // Unix, para cambiar a español el formato de la fecha
                  // cambiando el servidor
                  
                  setlocale(LC_TIME, 'es_ES.UTF-8');
                  
                  //windows, para cambiar a español el formato de la fecha
                  //cambiando el servidor
                  
                  setlocale(LC_TIME, 'spanish');
                  
                  echo utf8_encode(strftime( "%A, %d de %B del %Y", strtotime($dia)));// cambiar formato de fecha, "inicialmente era solo echo $dia ?>
              </h3>
                                                              
                 <?php foreach ($lista_eventos as $evento) {?>    
                                                              
                <div class="dia">
                    <p class="titulo"><?php echo utf8_encode($evento['titulo']) ?></p>
                    <p class="hora">
                     <i class="fas fa-clock" aria-hidden="true" ></i>
                        <?php echo $evento['fecha']." ".$evento["hora"] ?></p>
                    <p class="categoria">
                        <i class="<?php echo $evento['icono'];?>" aria-hidden="true" ></i>
                        <?php echo $evento['categoria'] ?></p>
                    <p class="invitado">
                        <i class="fas fa-user" aria-hidden="true" ></i>
                        <?php echo $evento['invitado'] ?></p>
                    
             
                  </div>
                                                              
                 <?php } // fin foreach evento?>                                             
              
              <?php } // fin foreach de dias ?>
              
            
          </div>
          
          <?php
          $conn->close();
          ?>
          
      </section>
  
<?php include_once 'includes/templade/footer.php'; ?>