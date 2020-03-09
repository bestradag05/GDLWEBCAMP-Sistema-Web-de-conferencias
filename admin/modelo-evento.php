<?php

if($_POST['registro'] == 'nuevo')
{
    
    
    $titulo_evento =$_POST['titulo_evento'];
    $categoria_id= $_POST['categoria_evento'];
    $fecha= $_POST['fecha_evento'];
    $fecha_formateada= date('Y-m-d', strtotime($fecha)); // Se convierte la fecha para que el orden este igual que la base de datos
    $hora= $_POST['hora_evento'];
    $invitado_id= $_POST['invitado_evento'];
    
    $hora_formateada = date('H:i', strtotime($hora));
    
    try {
        include_once 'funciones/funciones.php';
        
        $stmt=$conn->prepare("INSERT INTO eventos(nombre_evento,fecha_evento,hora_evento, id_cat_evento, id_inv) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssii", $titulo_evento,$fecha_formateada,$hora_formateada, $categoria_id, $invitado_id);
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
    

     $titulo_evento =$_POST['titulo_evento'];
    $categoria_id= $_POST['categoria_evento'];
    $fecha= $_POST['fecha_evento'];
    $fecha_formateada= date('Y-m-d', strtotime($fecha)); // Se convierte la fecha para que el orden este igual que la base de datos
    $hora= $_POST['hora_evento'];
    $invitado_id= $_POST['invitado_evento'];
    $id_registro = $_POST['id_registro'];
    
    $hora_formateada = date('H:i', strtotime($hora));
    
    
 
    try {
        include_once 'funciones/funciones.php';
        
      
        $stmt = $conn->prepare("UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento= ? , id_cat_evento = ?, id_inv = ?, editado= NOW()  WHERE evento_id = ?");
        $stmt->bind_param("sssiii", $titulo_evento, $fecha_formateada, $hora_formateada, $categoria_id, $invitado_id, $id_registro);

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
    
    include_once 'funciones/funciones.php';
    try {
        
        $stmt=$conn->prepare("DELETE FROM eventos WHERE evento_id = ? ");
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