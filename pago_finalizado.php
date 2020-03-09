

<?php include_once 'includes/templade/header.php'; ?>
<section class="seccion contenedor">
          <h2>Resumen Registro</h2>
      
           <?php 
          
          $resultado = $_GET['exito'];
          
               if($resultado == "true")
               {
                   $paymentId = $_GET['paymentId'];
                   $id_pago = (int)$_GET['id_pago'];
                   echo "El pago se Realizó Correctament <br>";
                   echo "El id es {$paymentId}";
                   
                   require_once('includes/funciones/bd_conexion.php');
               $stmt = $conn->prepare("UPDATE registrados SET pagado=? WHERE id_registrado=?");
               $pagado=1;
               $stmt->bind_param('ii',$pagado, $id_pago);
               $stmt->execute();
               $ID_registro = $stmt->insert_id;
               $stmt->close();
               $conn->close();
                   
                   
               }else
               {
                   echo "El pago no se realizo";
               }
          ?>

</section>

<?php include_once 'includes/templade/footer.php'; ?>