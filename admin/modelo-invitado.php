<?php

if($_POST['registro'] == 'nuevo')
{
    
   // Para verificar si se manda de forma correcto el archivo
   /*  $respuesta =Array(
        'post'=> $_POST,
        'file'=>$_FILES['archivo_imagen']['name']
    
    );
    
    die(json_encode($respuesta));*/
    
    $directorio = "../img/invitados/";
    
    if(!is_dir($directorio))// Si ese directorio no existe
    {
        mkdir($directorio, 0755, true); // se crea el directorio
    }
    
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio.$_FILES['archivo_imagen']['name']))
     {
        $imagen_url =$_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subio Correctamente";
     }else
     {
         $respuesta = array(
             'respuesta' => error_get_last()
         );
    }
    
    $nombre_invitado =$_POST['nombre_invitado'];
    $apellido_invitado =$_POST['apellido_invitado'];
    $biografia =$_POST['biografia'];
    
    

    
    try {
        include_once 'funciones/funciones.php';
        
        $stmt=$conn->prepare("INSERT INTO invitados(nombre_invitad,apellido_invitado, descripcion, url_imagen) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $nombre_invitado, $apellido_invitado,$biografia, $imagen_url);
        $stmt->execute();
        $id_insertado = $stmt->insert_id;
        if($stmt->affected_rows)
        {
            $respuesta = array(
                'respuesta' => 'exito',
                'id_insertado' => $id_insertado,
                'resultado_imagen' =>$imagen_resultado
                
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
    
    $directorio = "../img/invitados/";
    
    if(!is_dir($directorio))// Si ese directorio no existe
    {
        mkdir($directorio, 0755, true); // se crea el directorio
    }
    
    if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio.$_FILES['archivo_imagen']['name']))
     {
        $imagen_url =$_FILES['archivo_imagen']['name'];
        $imagen_resultado = "Se subio Correctamente";
     }else
     {
         $respuesta = array(
             'respuesta' => error_get_last()
         );
    }
    
    $nombre_invitado =$_POST['nombre_invitado'];
    $apellido_invitado =$_POST['apellido_invitado'];
    $biografia =$_POST['biografia'];
    $id_registro = $_POST['id_registro'];
    
    
 
    try {
        include_once 'funciones/funciones.php';
        if($_FILES['archivo_imagen']['size'] > 0)
        {
            //Si cambia la imagen
            $stmt = $conn->prepare("UPDATE invitados SET nombre_invitad = ?, apellido_invitado = ?, descripcion= ?, url_imagen= ?, editado= NOW()  WHERE invitado_id = ?");
            $stmt->bind_param("ssssi", $nombre_invitado, $apellido_invitado, $biografia,$imagen_url,$id_registro );
            
        }else
        {
            // Si no cambia la imagen
            $stmt = $conn->prepare("UPDATE invitados SET nombre_invitad = ?, apellido_invitado = ?, descripcion= ?, editado= NOW()  WHERE invitado_id = ?");
            $stmt->bind_param("sssi", $nombre_invitado, $apellido_invitado, $biografia,$id_registro );
            
        }
        
        
      
        $stmt->execute();
        $registros= $stmt->affected_rows;

        if ($registros > 0) {
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
        
        $stmt=$conn->prepare("DELETE FROM invitados WHERE invitado_id = ? ");
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