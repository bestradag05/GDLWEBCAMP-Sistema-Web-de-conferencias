<?php


include_once 'funciones/funciones.php';

if($_POST['registro'] == 'nuevo')
{
    
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
//BOLETOS
$boletos_adquitidos = $_POST['boletos'];
// CAMISAS y ETIQUTAS
$camisas =$_POST['pedido_extra']['camisas']['cantidad'];
$etiquetas =$_POST['pedido_extra']['etiquetas']['cantidad'];


$pedido = productos_json($boletos_adquitidos, $camisas, $etiquetas);

$total = $_POST['total_pedido'];
$regalo =$_POST['regalo'];

$eventos = $_POST['registro_evento'];
$registro_eventos = eventos_json($eventos);

    try {
        
        
        $stmt=$conn->prepare("INSERT INTO registrados(nombre_registrado,apellido_registrado, email_registrado, fecha_registrado, pases_articulos, talleres_registrado, regalo, total_pagado, pagado) VALUES (?,?,?,NOW(),?,?,?,?,1)");
        $stmt->bind_param("sssssis", $nombre, $apellido,$email,$pedido, $registro_eventos,$regalo,$total );
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if($stmt->affected_rows)
        {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado
                
            );
            
        }else
        {
            
            $respuesta = array(
                'respuesta' => 'error'
                
            );
            
        }
        $stmt->close();
        $conn->close();
        
    } catch (Exception $e) {
        echo "Error: ". $e->getMessage();
    }

     die(json_encode($respuesta));
    
}

if($_POST['registro'] == 'actualizar')
{
    
    
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
//BOLETOS
$boletos_adquitidos = $_POST['boletos'];
// CAMISAS y ETIQUTAS
$camisas =$_POST['pedido_extra']['camisas']['cantidad'];
$etiquetas =$_POST['pedido_extra']['etiquetas']['cantidad'];


$pedido = productos_json($boletos_adquitidos, $camisas, $etiquetas);

$total = $_POST['total_pedido'];
$regalo =$_POST['regalo'];

$eventos = $_POST['registro_evento'];
$registro_eventos = eventos_json($eventos);   

$fecha_registro = $_POST['fecha_registro'];
$id_registro = $_POST['id_registro'];




    try {
      
        
      
        $stmt = $conn->prepare("UPDATE registrados SET nombre_registrado=?,apellido_registrado =?, email_registrado =?, fecha_registrado=?, pases_articulos=?, talleres_registrado=?, regalo=?, total_pagado=?, pagado=1  WHERE id_registrado= ?");
        $stmt->bind_param("ssssssisi", $nombre, $apellido,$email, $fecha_registro,$pedido, $registro_eventos,$regalo,$total, $id_registro);

        $stmt->execute();

        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id_registro
            );
        }else
        {
            
            $respuesta = array(
                'respuesta' => 'error'
                
            );
            
        }
        $stmt->close();
        $conn->close();
        
    } catch (Exception $e) {
        echo "Error: ". $e->getMessage();
    }

     die(json_encode($respuesta));
    

     
    
}


if($_POST['registro'] == 'eliminar')
{
    

    $id_eliminar = (int) $_POST['id'];
    
    
    try {
        
        $stmt=$conn->prepare("DELETE FROM registrados WHERE id_registrado = ? ");
        $stmt->bind_param("i", $id_eliminar);
        $stmt->execute();
        
        if($stmt->affected_rows)
        {
                $respuesta = array(
                 'respuesta' => 'exito',
                  'id' => $id_eliminar
                 );  
        }else
        {
            $respuesta = array(
                'respuesta' => 'Error'
                
            );
        }
        $stmt->close();
        $conn->close();
        
    } catch (Exception $ex) {
        
        $respuesta = array(
                'respuesta' => 'Error: '.$ex->getMessage()
                
            );
    }
     
    die(json_encode($respuesta));
    
}


if($_POST['registro'] == 'logeo')
{
   $usuario =$_POST['usuario'];
   $password = $_POST['password'];
   
   
    try {
        include_once 'funciones/funciones.php';
        
        $stmt=$conn->prepare("SELECT * FROM admins WHERE usuario=?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin, $editado);
        if($stmt->affected_rows)
        {
            $existe = $stmt->fetch();
            if($existe)
            {
                 if(password_verify($password, $password_admin))
                 {
                     session_start();
                     $_SESSION['usuario']=$usuario_admin;
                     $_SESSION['nombre']=$nombre_admin;
                     
                     $respuesta = array(
                 'respuesta' => 'exito',
                  'usuario' => $nombre_admin
                 );
                 }else
                 {
                     $respuesta = array(
                    'respuesta' => 'error'
                    );
                     
                 }
                
            
                
            }else
            {
                  $respuesta = array(
                    'respuesta' => 'error'
                );
            }
           
            
        }
        $stmt->close();
        $conn->close();
        
    } catch (Exception $e) {
        echo "Error: ". $e->getMessage();
    }

     die(json_encode($respuesta));
   
}




?>