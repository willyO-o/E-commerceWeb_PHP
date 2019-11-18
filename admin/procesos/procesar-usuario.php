<?php

if (isset($_POST['accion'])) {
    if ($_POST['accion']=='registrar_usuario') {
        
        require_once '../modelos/Usuario.php';

        $usuario= filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
        $nombre= filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        
        $user =  Usuario::soloUsuario($usuario);
        
        $resultado=$user->existeUser();  
        if ($resultado>0) {
            $respuesta = array(
                'respuesta' => 'existe'  
            );
            
        } else {
            $user=new Usuario($usuario,$nombre,$password);
            $res=$user->insertUsuario();

            if ($res==1) {
                $respuesta = array(
                    'respuesta' => 'insertado'  
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'  
                );
            }
            
        }

        echo json_encode($respuesta);
        
    }


    if ($_POST['accion']=='editar_usuario') {
        
        require_once '../modelos/Usuario.php';


        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $usuario= filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
        $nombre= filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        
        $user =  Usuario::soloUsuarioID($usuario,$id);
        
        $resultado=$user->existeUserID();  
        if ($resultado>0) {
            $respuesta = array(
                'respuesta' => 'existe'  
            );
            
        } else {
            $user= Usuario::datosActualizar($usuario,$nombre,$password,$id);
            $res=$user->actualizarUsuario();

            if ($res==1) {
                $respuesta = array(
                    'respuesta' => 'actualizado'  
                );
            } else {
                $respuesta = array(
                    'respuesta' => 'error'  
                );
            }
            
        }

        echo json_encode($respuesta);
        
    }


    if ($_POST['accion']=='borrar') {

        require_once '../modelos/Usuario.php';

        $us_id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        
        $user =  Usuario::solo_id_us($us_id);

        $resultado=$user->eliminarUsuario();

        if ($resultado==1) {

            $respuesta = array(
                'respuesta' => 'eliminado'
            );         
        }else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }

        echo json_encode($respuesta);
        
    }

}


if (isset($_GET['accion'])) {
    




    if (isset($_GET['accion'])=='cambiar_estado') {
        require_once '../modelos/Usuario.php';

        $us_id= filter_var($_GET['id'], FILTER_SANITIZE_STRING);
        $estado= filter_var($_GET['estado'], FILTER_SANITIZE_STRING);

        $user= Usuario::idEstado($estado, $us_id);

        $resultado=$user->cambiarEstado();

        if ($resultado==1) {

            $respuesta = array(
                'respuesta' => 'cambiado'
            );         
        }else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }

        echo json_encode($respuesta);

    }
    
}

?>