
<?php include_once 'includes/templade/header.php'; ?>

  <section class="seccion contenedor">
      <h2> La mejor conferencia de diseño web en español</h2>
      <p>Praesent rutrum efficitur pharetra. Vivamus scelerisque pretium velit,
      id tempor turpis pulvinar et. Ut bibendum finisbus massa non molestie
      Curabitur urna metus, placerat gravida lacus ut, lacinila congue orci. 
      Maecenas luctus mi at ex blandit vehicula. Morbi porttitor tempues eulismod</p>
      
  </section> <!-- selection -->

  <section class="programa">
      <div class="contenedor-video">
          <video  loop autoplay muted poster="img/bg-talleres.jpg">
              <source src="video/video.mp4" type="video/mp4"/>
              <source src="video/video.webm" type="video/webm"/> 
              <source src="video/video.ogv" type="video/ogg"/> 

          </video>
      </div><!--contenedor video-->
      <div class="contenido-programa">
          <div class="contenedor">
              <div class="programa-evento">
                  <h2>Programa del Evento</h2>
                  
                    <?php
                  try {

                      require_once('includes/funciones/bd_conexion.php');
                      $sql = "SELECT * FROM categoria_evento;";
                      $resultado = $conn->query($sql);
                  } catch (Exception $exc) {
                      echo $exc->getMessage();
                  }
                  ?>
                  
                  <nav class="menu-programa">
                      
                      <?php while($cat= $resultado->fetch_array(MYSQLI_ASSOC)){ ?>
                      
                      <?php $categoria = $cat['cat_evento'];?>
                     
                      <a href="#<?php echo strtolower($categoria) ?>"><i class="fas <?php echo $cat['icono'] ?>" ></i><?php echo $cat['cat_evento']?></a>
                      
                      <?php }?>
                      
                  </nav>
                  
                    <?php
                  try {

                      require_once('includes/funciones/bd_conexion.php');
                      $sql = "SELECT e.*,ce.cat_evento,icono, inv.nombre_invitad, inv.apellido_invitado FROM eventos AS e 
                  INNER JOIN categoria_evento AS ce ON ce.id_categoria=e.id_cat_evento
                  INNER JOIN invitados As inv ON inv.invitado_id=ce.id_categoria AND e.id_cat_evento= 1 
                  ORDER BY e.evento_id LIMIT 2;
                  
                  SELECT e.*,ce.cat_evento,icono, inv.nombre_invitad, inv.apellido_invitado FROM eventos AS e 
                  INNER JOIN categoria_evento AS ce ON ce.id_categoria=e.id_cat_evento
                  INNER JOIN invitados As inv ON inv.invitado_id=ce.id_categoria AND e.id_cat_evento= 2 
                  ORDER BY e.evento_id LIMIT 2;
                  
                   SELECT e.*,ce.cat_evento,icono, inv.nombre_invitad, inv.apellido_invitado FROM eventos AS e 
                  INNER JOIN categoria_evento AS ce ON ce.id_categoria=e.id_cat_evento
                  INNER JOIN invitados As inv ON inv.invitado_id=ce.id_categoria AND e.id_cat_evento= 3 
                  ORDER BY e.evento_id LIMIT 2;";
                   
                  } catch (Exception $exc) {
                      echo $exc->getMessage();
                  }
                  ?>
                  
                  <?php $eventos = $resultado->fetch_assoc() ?>
                  
                  <?php $conn->multi_query($sql); ?>
                  
                  <?php 
                  do
                  {
                      $resultado = $conn->store_result();
                      $row = $resultado->fetch_all(MYSQLI_ASSOC);  ?>
                  
                      <?php $i = 0; ?>
                      <?php  foreach($row as $evento): ?>
                  <?php if($i % 2 == 0 ) {?>
                      <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
                          
                  <?php } ?>
                      <div class="detalle-evento">
                          <h3><?php echo utf8_encode($evento['nombre_evento'])?></h3>
                          <p><i class="fas fa-clock"></i><?php echo $evento['hora_evento']?></p>
                          <p><i class="fas fa-calendar-alt"></i><?php echo $evento['fecha_evento']?></p>
                          <p><i class="fas fa-user"></i><?php echo $evento['nombre_invitad']." ".$evento['apellido_invitado']?></p>
                      </div>

                      
                      <?php if($i % 2 == 1): ?>
                          <a href="calendario.php" class="button float-right">Ver todos</a>
                  </div><!--talleres-->
                   <?php endif; ?>
                  <?php $i++; ?>
                  <?php  endforeach; ?>
                    
               <?php   }while ($conn->more_results() && $conn->next_result());
                    ?>

                  
                  
              </div><!--Programa evento-->
          </div><!--contenedor-->
      </div><!--contenido-programa-->
  </section><!--programa-->
  
<?php include_once 'includes/templade/invitado.php'; ?>
  
  <div class="contador parallax">
      <div class="contenedor">
          <ul class="resumen-evento clearfix">
              <li><p class="numero"></p>Invitados</li>
              <li><p class="numero"></p>Talleres</li>
              <li><p class="numero"></p>Dias</li>
              <li><p class="numero"></p>Conferencias</li>
    
          </ul>
          
      </div>
  </div>
  <section class="precio seccion">
      <h2>Precios</h2>
      <div class="contenedor">
          <ul class="lista-precios clearfix">
              <li>
                  <div class="tabla-precio">
                      <h3>Pase por dia</h3>
                      <p class="numero">$30</p>
                      <ul>
                          <li>Bocadillos Gratios</li>
                          <li>Todas las conferencias</li>
                          <li>Todos los talleres</li>
                      </ul>
                      <a href="#" class="button hollow">Comprar</a>
                  </div>
              </li>
                   <li>
                  <div class="tabla-precio">
                      <h3>Todos los dias</h3>
                      <p class="numero">$50</p>
                      <ul>
                          <li>Bocadillos Gratios</li>
                          <li>Todas las conferencias</li>
                          <li>Todos los talleres</li>
                      </ul>
                      <a href="#" class="button ">Comprar</a>
                  </div>
              </li>
                   <li>
                  <div class="tabla-precio">
                      <h3>Pase por 2 dias</h3>
                      <p class="numero">$45</p>
                      <ul>
                          <li>Bocadillos Gratios</li>
                          <li>Todas las conferencias</li>
                          <li>Todos los talleres</li>
                      </ul>
                      <a href="#" class="button hollow">Comprar</a>
                  </div>
              </li>
          </ul>
      </div>
  </section>
  <div id="mapa" class="mapa">
    
          
  </div>
  
  <section class="seccion">
      <h2>Testimoniales</h2>
      <div class="testimoniales contenedor clearflix">
      <div class="testimonial">
          
          <blockquote>
              <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce
              vehicula ut sem vitae semper. Numllam blandit neque
              eu semper uliamcorper. Duis commodo quam in orci condimenturm ultrices</p>
              <footer class="info-testimonial clearfix">
                  <img src="img/testimonial.jpg" alt="imagen testimonial">
                  <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
              </footer>
          </blockquote>
      </div><!--Testimonial -->
      <div class="testimonial">
          
          <blockquote>
              <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce
              vehicula ut sem vitae semper. Numllam blandit neque
              eu semper uliamcorper. Duis commodo quam in orci condimenturm ultrices</p>
              <footer class="info-testimonial clearfix">
                  <img src="img/testimonial.jpg" alt="imagen testimonial">
                  <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
              </footer>
          </blockquote>
      </div><!--Testimonial -->
      <div class="testimonial">
          
          <blockquote>
              <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce
              vehicula ut sem vitae semper. Numllam blandit neque
              eu semper uliamcorper. Duis commodo quam in orci condimenturm ultrices</p>
              <footer class="info-testimonial clearfix">
                  <img src="img/testimonial.jpg" alt="imagen testimonial">
                  <cite>Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>
              </footer>
          </blockquote>
      </div><!--Testimonial -->
      </div>
</section>

      
      <div class="newsletter parallax">
          <div class="contenido contenedor">
              <p>registrate al newsletter:</p>
              <h3>gdlWebcamp</h3>
              <a href="#mc_embed_signup" class="boton_newsletter button transparente">Registro</a>
              
          </div><!--Conntenido-->
      </div><!--newsletter-->
      
      <section class="seccion">
          <h2>Faltan</h2>
          <div class="cuenta-regresiva contenedor">
              <ul class="clearfix">
                  <li><p class="numero" id="dias"></p>dias</li>
                  <li><p class="numero" id="horas"></p>horas</li>
                  <li><p class="numero" id="minutos"></p>minutos</li>
                  <li><p class="numero" id="segundos"></p>segundos</li>
              </ul>
              
          </div>
      </section>
  
<?php include_once 'includes/templade/footer.php'; ?>
