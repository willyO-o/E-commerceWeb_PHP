<?php
 
if (isset($_POST['accion'])) {
    
    if ($_POST['accion']=='registrar') {
        
        

        require_once '../modelos/Cliente.php';
   
        

        $nombre= filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $apellido= filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
        $nit= filter_var($_POST['nit'], FILTER_SANITIZE_STRING);
        $correo= filter_var($_POST['correo'], FILTER_SANITIZE_STRING);
        $telefono= filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
        $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $direccion= filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
        $id_ciudad= filter_var($_POST['ciudad'], FILTER_SANITIZE_STRING);
  

        $cliente =  Cliente::soloCorreo($correo);
        
        $resultado=$cliente->existeCorreo();  
        if ($resultado>0) {
            $respuesta = array(
                'respuesta' => 'existe'  
            );
            
        } else {
            $cliente=new Cliente($nombre,$apellido,$nit,$correo,$password,$telefono,$direccion,$id_ciudad);
            $res=$cliente->insertCliente();

            if ($res>0) {
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


    if ($_POST['accion']=='actualizar') {
        
        

        require_once '../modelos/Cliente.php';
   
        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $nit= filter_var($_POST['nit'], FILTER_SANITIZE_STRING);
        $telefono= filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
        $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        $direccion= filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
        $id_ciudad= filter_var($_POST['ciudad'], FILTER_SANITIZE_STRING);

        if ($password!='') {
            $cliente =  Cliente::passwordId($password,$id);

            $res_pass=$cliente->updatePassword();
        }
        
        
        $cliente=Cliente::datosActualizar($nit,$telefono,$direccion,$id_ciudad,$id);

        $resultado=$cliente->updateCliente();  

        if ($resultado) {

            $respuesta = array(
                'respuesta' => 'actualizado'  
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'  
            );
        }
            
        echo json_encode($respuesta);
    }


    
    if ($_POST['accion']=='ingresar') {
        
        

        require_once '../modelos/Conectar.php';

        $usuario= filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
        $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        
        try {
            $con=new Conexion();
            
            $sql1="SELECT * FROM usuario WHERE usuario='$usuario' AND estado=1 ";

            $sql2="SELECT * FROM cliente WHERE correo='$usuario' ";

            $res_adm=$con->query($sql1);

            $res_cli=$con->query($sql2);

            $num_row_adm=mysqli_num_rows($res_adm); 
            $num_row_cli=mysqli_num_rows($res_cli); 

            
            $respuesta_admin=$res_adm->fetch_assoc();
            $id_us=$respuesta_admin['id_usuario'];
            $nombre=$respuesta_admin['nombre'];
            $password_us=$respuesta_admin['password'];

            $respuesta_cliente=$res_cli->fetch_assoc();
            $id_cli=$respuesta_cliente['id_cliente'];
            $nombre_cli=$respuesta_cliente['nombre_cliente'];
            $password_cli=$respuesta_cliente['password'];
           
            
            if ($num_row_adm==1 && password_verify($password,$password_us)) {
                session_start();

                $_SESSION['user']='admin';
                $_SESSION['id']=$id_us;
                $_SESSION['nombre']= $nombre;

                $respuesta = array(
                    'respuesta' => 'exito'  ,
                    'tipo'=>$_SESSION['user'],
                    'id'=>$id_us,
                    'nombre'=>$nombre
                );
                $con->query("UPDATE  usuario  SET ultima_conexion=NOW() WHERE id_usuario='$id_us' ");

            }else if ($num_row_cli==1 &&  password_verify($password,$password_cli)) {

                session_start();
                $_SESSION['user']='cliente';
                $_SESSION['id']=$id_cli;
                $_SESSION['nombre']= $nombre_cli;

                $respuesta = array(
                    'respuesta' => 'exito'  ,
                    'tipo'=>$_SESSION['user'],
                    'id'=>$id_cli,
                    'nombre'=>$nombre_cli
                );
            }else{
                $respuesta = array(
                    'respuesta' => 'error'  
                );
            }

            $con->close();

            
            
            
        } catch (Exception $e) {
            echo "error".$e->getMessage();
        }

    
        echo json_encode($respuesta);
        
    }


    if ($_POST['accion']=='contactar') {
            
            

        require_once '../modelos/Cliente.php';

        

        $nombre= filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $email= filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $telefono= filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
        $mensaje= filter_var($_POST['mensaje'], FILTER_SANITIZE_STRING);


        $cliente =  Cliente::ningunDato();
        
        
        $res=$cliente->insertContacto($nombre,$email,$telefono,$mensaje); 

        if ($res>0) {
            $respuesta = array(
                'respuesta' => 'insertado'  
            );
        } else {
            $respuesta = array(
                'respuesta' => 'error'  
            );
        }

        echo json_encode($respuesta);
            
    }
        
}






?>