<?php if(isset($_POST['submit'])):
    

          $nombre= $_POST['nombre'];
          $apellido= $_POST['apellido'];
          $email= $_POST['email'];
          $regalo= $_POST['regalo'];
          $total= $_POST['total_pedido'];
          $fecha= date('Y-m-d H:i:s');
          //pedidos
          $boletos = $_POST['boletos'];
          $camisas = $_POST['pedido_camisa'];
          $etiquetas = $_POST['pedido_etiquetas'];
          include_once 'includes/funciones/funciones.php'; 
          $pedido= productos_json($boletos,$camisas,$etiquetas);
          
          //eventos
          $eventos = $_POST['registro'];
          $registro = eventos_json($eventos);
           
          try {
                require_once('includes/funciones/bd_conexion.php');
               $stmt = $conn->prepare("INSERT INTO registrados(nombre_registrado, apellido_registrado, email_registrado, fecha_registrado, pases_articulos, talleres_registrados, regalo, total_pagado) VALUES(?,?,?,?,?,?,?,?)");
               $stmt->bind_param('ssssssis', $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
               $stmt->execute();
               $stmt->close();
               $conn->close();
               header ("Location: validar_registro.php?exitoso=1");
            } catch (Exception $e){
                echo $e->getMessage();
            }
          
          
          
          
          
endif; ?>
<?php include_once 'includes/templade/header.php'; ?>
<section class="seccion contenedor">
          <h2>Resumen Registro</h2>
      
          

</section>

<?php include_once 'includes/templade/footer.php'; ?>