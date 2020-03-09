<?php

if($_POST['registro'] == 'nuevo')
{
    
    
    $nombre =$_POST['nombre_categoria'];
    $icono= $_POST['icono'];

    
    try {
        include_once 'funciones/funciones.php';
        
        $stmt=$conn->prepare("INSERT INTO categoria_evento(cat_evento,icono) VALUES (?,?)");
        $stmt->bind_param("ss", $nombre, $icono);
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
    
   
    $id= $_POST['id_categoria'];
    $nombre =$_POST['nombre_categoria'];
    $icono= $_POST['icono'];
    
    
 
    try {
        include_once 'funciones/funciones.php';
        
      
        $stmt = $conn->prepare("UPDATE categoria_evento SET cat_evento = ?, icono = ?, editado= NOW()  WHERE id_categoria = ?");
        $stmt->bind_param("ssi", $nombre, $icono, $id);

        $stmt->execute();

        if ($stmt->affected_rows) {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_actualizado' => $id
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
        
        $stmt=$conn->prepare("DELETE FROM categoria_evento WHERE id_categoria = ? ");
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