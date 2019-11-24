<?php
//var_dump($_POST);

if (isset($_POST['accion'])) {
    
    if ($_POST['accion']=='registrar') {
        session_start();
        if (!isset($_SESSION['carrito'])) {
            $respuesta = array('respuesta' => 'error' );
            die(json_encode($respuesta));
        }
        
        
        $resp=false;
        $tipo_pago= filter_var($_POST['payment'], FILTER_SANITIZE_STRING);

        if (!isset($_SESSION['user'])) {
      


            require_once '../modelos/Cliente.php';
   
        

            $nombre= filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $apellido= filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
            $nit= filter_var($_POST['nit'], FILTER_SANITIZE_STRING);
            $correo= filter_var($_POST['correo'], FILTER_SANITIZE_STRING);
            $telefono= filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
            $password= filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $direccion= filter_var($_POST['direccion'], FILTER_SANITIZE_STRING);
            $id_ciudad= filter_var($_POST['ciudad'], FILTER_SANITIZE_STRING);
    
            
            
    
            if ($password=='') {
    
                $cliente =  Cliente::soloCorreo($correo);
            
                $resultado=$cliente->selectIdPorCorreo(); 
    
                if(mysqli_num_rows($resultado)>0){
                    $array_res=$resultado->fetch_assoc();
                    $id_cliente=$array_res['id_cliente'];
                    $ob_cliente=Cliente::soloId($id_cliente);
                    $cliente=($ob_cliente->selectCiudadID())->fetch_assoc();
                    $ciudad=$cliente['ciudad'];
                    $departamento=$cliente['Departamento'];
    
                    $resp=true;
                   // echo $id_cliente;
                }else{
                    $cliente=new Cliente($nombre,$apellido,$nit,$correo,$password,$telefono,$direccion,$id_ciudad);
                    $res=$cliente->insertCliente();
    
                    if ($res>0) {
    
                        $id_cliente=$res;

                        $ob_cliente=Cliente::soloId($id_cliente);
                        $cliente=($ob_cliente->selectCiudadID())->fetch_assoc();
                        $ciudad=$cliente['ciudad'];
                        $departamento=$cliente['Departamento'];

                        $resp=true;
                        //echo 'no existe insertado sin pass';
                        //echo $id_cliente;
                    } 
    
                    
                }
            }else{
                
                
            $cliente =  Cliente::soloCorreo($correo);
            
            $resultado=$cliente->selectIdPorCorreo();  
                if (mysqli_num_rows($resultado)>0) {
                    $array_res=$resultado->fetch_assoc();
                    $id_cliente=$array_res['id_cliente'];

                    $cliente=Cliente::datosActualizarCliente($nombre,$apellido,$nit,$password,$telefono,$direccion,$id_ciudad,$id_cliente);
                    $cliente->updateClientePedido();

                    $ob_cliente=Cliente::soloId($id_cliente);
                    $cliente=($ob_cliente->selectCiudadID())->fetch_assoc();
                    $ciudad=$cliente['ciudad'];
                    $departamento=$cliente['Departamento'];
                    $resp=true;

                   // echo $departamento." existe actualizado";
                    
                } else {
                    $cliente=new Cliente($nombre,$apellido,$nit,$correo,$password,$telefono,$direccion,$id_ciudad);
                    $res=$cliente->insertCliente();
    
                    if ($res>0) {
                        $id_cliente=$res;

                        $ob_cliente=Cliente::soloId($id_cliente);
                        $cliente=($ob_cliente->selectCiudadID())->fetch_assoc();
                        $ciudad=$cliente['ciudad'];
                        $departamento=$cliente['Departamento'];
                        $resp=true;
                        //echo $id_cliente;
                    }
                    //echo 'insertado con pass';
                    
                }
            }
    
        }else{
            require_once '../modelos/Cliente.php';

            $id_cliente=$_SESSION['id'];
            $resp=true;

            $ob_cliente=Cliente::soloId($id_cliente);
            $cliente=($ob_cliente->selectPorID())->fetch_assoc();
            
            $nombre= $cliente['nombre_cliente'];
            $apellido= $cliente['apellido_cliente'];
            $nit= $cliente['nit'];
            $correo= $cliente['correo'];
            $telefono= $cliente['telefono'];
            $password= $cliente['password'];
            $direccion= $cliente['direccion'];
            $id_ciudad= $cliente['id_ciudad'];
            $ciudad=$cliente['ciudad'];
            $departamento=$cliente['Departamento'];
    

        }


        if ($resp==true ) {
            require_once '../modelos/Pedido.php';


            $carrito =$_SESSION['carrito'];

            $total_pago=0;
            $productos='';
            foreach ($carrito as $row) {
                $total_pago+=$row['precio_venta']*$row['cantidad'];
                $productos.=$row['producto'].", ";
            }
            $productos=rtrim($productos,', ');

            //echo $productos."<hr>";

            //echo $total_pago;


            $ob_pedido=new Pedido($tipo_pago,$productos,$total_pago,'','1',$id_cliente);
            $id_pedido=$ob_pedido->insertPedido();
            if ($id_pedido>0) {

                $ob_pedido=Pedido::ningunDato();
                $res=$ob_pedido->insertDetallePedido($carrito,$id_pedido) ;

                if ($res>0) {

                    ///***correo */
                    $asunto="Solicitud de Pedido de productos a PCBolivia";
                    $header="Content-type: text/html; charset=iso-8859-1\r\n".
                    "MIME-Version: 1.0 \r\n".
                    'From: pcbolivia2019@gmail.com' . "\r\n" .
                    'Reply-To: pcbolivia2019@gmail.com' . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

                    $mensaje="
                    <html>
                    <head>
                        <title>Detalles de Pedido</title>
                    </head>
                    <body>
                        <h1>Hola ".$nombre." ".$apellido."</h1>
                        <h3>!Gracias por comprar en PCBolivia</h3><hr>
                        <h4>Detalles del pedido</h4>
                        <p>Numero de Pedido: ".$id_pedido."</p>
                        <p>Realizado el: ".date('d-m-Y H:i:s')."</p>
                        <p>Tipo de Pago: ".$tipo_pago."</p>
                    
                        <table border='1'>
                            <tr>
                                <td>Producto</td>
                                <td>Cantidad</td>
                                <td>Precio Bs.</td>
                            </tr>";

                            foreach ($carrito as $row_car) {
                                $mensaje.="<tr>";
                                $mensaje.="<td>".$row_car['producto']."</td>";
                                $mensaje.="<td>".$row_car['cantidad']."</td>";
                                $mensaje.="<td>".$row_car['precio_venta']."</td>";
                                $mensaje.="</tr>";
                            }
                            
                            $mensaje.="
                            <tr>
                                <td></td>
                                <td colspan='2'>Total: <b>".$total_pago."</b> Bs.</td>
                            </tr>
                        </table><hr>
                        <h3>Datos del solicitante:</h3>
                        <p>Nombre(s): <b>".$nombre."</b> </p>
                        <p>Apellido(s): <b>".$apellido."</b> </p>
                        <p>NIT o C.I: ".$nit."</p>
                        <p>Telefono: ".$telefono."</p>
                        <p>Direccion: ".$direccion."</p>
                        <p>Ciudad: ".$ciudad."</p>
                        <p>Departamento: ".$departamento."</p>
                        <p>Pais: BOLIVIA</p>
                        <hr>
                        <p>
                            <b>Nota:</b> PcBolivia debe recibir tu pago dentro de los 3 días calendarios siguientes a tu compra, ó tu pedido será cancelado
                        </p>
                        <p>Tambien puedes comunicarte con nosotros: Por teléfono: (591-2) 2245877 - 2245872 de Lunes a Viernes entre las 8:30 am y las 6:30 pm Sábado entre las 9:00 am y las 1:00 pm hora boliviana;</p>
                        <p>Para Agilizar tu pedido puedes Responder a este correo Enviando tu comprobante de deposito... </p>
                    </body>
                    
                    </html>
                    ";

                    ///**correo */
                    //echo $correo;

                    $enviado=@mail($correo,$asunto,$mensaje,$header);

                    $respuesta = array(
                        'respuesta' => 'exitoso',
                        'num_pedido'=>$id_pedido
                    );
                    unset($_SESSION['carrito']);
                }else{
                    $respuesta = array(
                        'respuesta' => 'error'
                    );
                }
            }
        }else{
            $respuesta = array('respuesta' => 'no entro al if resp' );
        }
        
        

        echo json_encode($respuesta);
    }
}



?>