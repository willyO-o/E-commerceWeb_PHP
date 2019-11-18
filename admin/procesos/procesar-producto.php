<?php

if (isset($_POST['accion'])) {
    
    if ($_POST['accion']=='registrar') {
        

       $directorio='../../img/productos/';

       if (!is_dir($directorio)) {
           mkdir($directorio, 0755,true);     
       }
       
       move_uploaded_file($_FILES['imagen']['tmp_name'] , $directorio.$_FILES['imagen']['name']);
       
       move_uploaded_file($_FILES['imagen1']['tmp_name'] , $directorio.$_FILES['imagen1']['name']);

       move_uploaded_file($_FILES['imagen2']['tmp_name'] , $directorio.$_FILES['imagen2']['name']);

       move_uploaded_file($_FILES['imagen3']['tmp_name'] , $directorio.$_FILES['imagen3']['name']);

       

       $imagen=$_FILES['imagen']['name'];
       
       $imagen1=$_FILES['imagen1']['name'];
       $imagen2=$_FILES['imagen2']['name'];
       $imagen3=$_FILES['imagen3']['name'];

       $producto= filter_var($_POST['producto'], FILTER_SANITIZE_STRING);
       $descripcion= filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
       $caracteristicas= filter_var($_POST['caracteristicas'], FILTER_SANITIZE_STRING);
       $stock= filter_var($_POST['stock'], FILTER_SANITIZE_STRING);
       $stock_minimo= filter_var($_POST['stock_minimo'], FILTER_SANITIZE_STRING);
       $precio= filter_var($_POST['precio'], FILTER_SANITIZE_STRING);
       $garantia= filter_var($_POST['garantia'], FILTER_SANITIZE_STRING);
       $marca= filter_var($_POST['marca'], FILTER_SANITIZE_STRING);
       $categoria= filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);
      

       

       require_once '../modelos/Producto.php';
        
       

       $ob_prod = Producto::soloProducto($producto);

       $res= $ob_prod->existeProducto();


       if($res>0){
           $respuesta = array(
               'respuesta' => 'existe' 
           );
       }else {
           $ob_prod=new Producto($producto,$imagen,$descripcion,$caracteristicas,
           $stock, $stock_minimo, $precio, $garantia,$marca,
           $categoria,  $imagen1,$imagen2,$imagen3);

           $id_prod= $ob_prod->isertProducto();

           if ($id_prod>0) {


                $res_img=$ob_prod->insertImagenes($id_prod);

                $respuesta = array(
                    'respuesta' => 'insertado',
                    'id'=>$id_prod,
                    'producto'=>$producto
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
        
        require_once '../modelos/Producto.php';

        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);

            // $respuesta = array(
            //     'post' => $_POST,
            //     'files' => $_FILES
            // );
    
            
        
           $directorio='../../img/productos/';
    
           if (!is_dir($directorio)) {
               mkdir($directorio, 0755,true);     
           }
           
           $object= Producto::ningunDato();
           
           if ($_FILES['imagen']['size']>0) {
                move_uploaded_file($_FILES['imagen']['tmp_name'] , $directorio.$_FILES['imagen']['name']);
                $imagen=$_FILES['imagen']['name'];

                $res=$object->updateImagen('producto','imagen',$imagen,$id);
                
           }

           

           if ($_FILES['imagen1']['size']>0) {
                move_uploaded_file($_FILES['imagen1']['tmp_name'] , $directorio.$_FILES['imagen1']['name']);
                $imagen1=$_FILES['imagen1']['name'];

                $res1=$object->updateImagen('imagenes','imagen1',$imagen1,$id);
                
            }

            if ($_FILES['imagen2']['size']>0) {
                move_uploaded_file($_FILES['imagen2']['tmp_name'] , $directorio.$_FILES['imagen2']['name']);
                $imagen2=$_FILES['imagen2']['name'];

                $res2=$object->updateImagen('imagenes','imagen2',$imagen2,$id);

            }

            if ($_FILES['imagen3']['size']>0) {
                move_uploaded_file($_FILES['imagen3']['tmp_name'] , $directorio.$_FILES['imagen3']['name']);
                $imagen3=$_FILES['imagen3']['name'];

                $res3=$object->updateImagen('imagenes','imagen3',$imagen3,$id);

            }
            
    
    
           $producto= filter_var($_POST['producto'], FILTER_SANITIZE_STRING);
           $descripcion= filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
           $caracteristicas= filter_var($_POST['caracteristicas'], FILTER_SANITIZE_STRING);
           $stock= filter_var($_POST['stock'], FILTER_SANITIZE_STRING);
           $stock_minimo= filter_var($_POST['stock_minimo'], FILTER_SANITIZE_STRING);
           $precio= filter_var($_POST['precio'], FILTER_SANITIZE_STRING);
           $garantia= filter_var($_POST['garantia'], FILTER_SANITIZE_STRING);
           $marca= filter_var($_POST['marca'], FILTER_SANITIZE_STRING);
           $categoria= filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);
          

           
    
           $ob_prod = Producto::productoId($producto,$id);
    
           $res= $ob_prod->existeProductoId();
    
           
        //    die(json_encode($respuesta));
           if($res>0){
               $respuesta = array(
                   'respuesta' => 'existe' 
               );
               
           }else {
               $ob_prod= Producto::setProducto($producto,$descripcion,$caracteristicas,$stock,
               $stock_minimo, $precio, $garantia,$marca,$categoria,$id);
               
               $res= $ob_prod->updateProducto();
               
               if ($res>0) {
    
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

        require_once '../modelos/Producto.php';

        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        
        $prod =  Producto::soloId($id);

        $resultado=$prod->eliminarProducto();

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


    if ($_POST['accion']=='calificar') {

        require_once '../modelos/Producto.php';

        $nombre= filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
        $email= filter_var($_POST['email'], FILTER_SANITIZE_STRING);
        $calificacion= filter_var($_POST['calificacion'], FILTER_SANITIZE_STRING);
        $resenia= filter_var($_POST['resenia'], FILTER_SANITIZE_STRING);
        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        
        $prod =  Producto::ningunDato();

        $resultado=$prod->añadirResenia($nombre,$email,$resenia,$calificacion,$id);

        if ($resultado==1) {

            $respuesta = array(
                'respuesta' => 'exito'
            );         
        }else {
            $respuesta = array(
                'respuesta' => 'error'
            );
        }

        echo json_encode($respuesta);
        
    }


    if ($_POST['accion']=='carrito') {
        
        session_start();
        $id_prod=filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $qty=filter_var($_POST['qty'], FILTER_SANITIZE_STRING);

        
        $cont=0;
        $k=0;
        $respuesta=array();
        if (isset($_SESSION['carrito'])) {
            
            foreach ($_SESSION['carrito'] as $pod) {
    
                if ($pod['id_producto']==$id_prod) {
                    $cont++;
                    $_SESSION['carrito'][$k]['cantidad'] +=$qty;

                    if ($_SESSION['carrito'][$k]['cantidad']>$_SESSION['carrito'][$k]['stock']) {
                        $_SESSION['carrito'][$k]['cantidad']=$_SESSION['carrito'][$k]['stock'];
                        $qty=0;
                    }

                    $respuesta['producto']=$_SESSION['carrito'][$k];

                }  
                $k++;   
            }
            
        }

        if ($cont==0) {
            require_once '../modelos/Producto.php';

            $ob_prod=Producto::soloId($id_prod);

            $res=($ob_prod->carritoProducto())->fetch_assoc();
            $res['cantidad']=$qty;
            $_SESSION['carrito'][]= $res;

            $respuesta['producto']=$res;
            $respuesta['respuesta']= 'exitoso';
            $respuesta['nuevo']= $k;
            $respuesta['cont']= $cont;

        }elseif($qty==0){

            $respuesta['respuesta']= 'exedido';
            $respuesta['nuevo']= $k;
            $respuesta['cont']= $cont;
        }else{
            $respuesta['respuesta']= 'exitoso';
            $respuesta['nuevo']= $k;
            $respuesta['cont']= $cont;
        }      
        
        echo json_encode($respuesta);

    }



    if ($_POST['accion']=='carrito_quitar'){

        $id_prod=filter_var($_POST['id'], FILTER_SANITIZE_STRING);

        if (!isset($_SESSION)) {
            session_start();
        }
        $cont=0;
        $k=0;
        
        $vacio='existe';
        $cantidad=0;
        $precio=0;
        if (isset($_SESSION['carrito'])) {

            $carrito=$_SESSION['carrito'];
            
            foreach ($carrito as $pod) {
    
                if ($pod['id_producto']==$id_prod) {
                    $cont++;
                    $cantidad=$pod['cantidad'];
                    $precio=$pod['precio_venta'];
                    unset($carrito[$k]);
                }  
                $k++;   
            }

            $carrito=array_values($carrito);
            $_SESSION['carrito']=$carrito;

           
            
            if (count($_SESSION['carrito'])==0) {
                unset($_SESSION['carrito']);
                $vacio='vacio';
            }
            
        }

        
        if ($cont!=0) {
            
            $respuesta=array(
                'respuesta'=>'eliminado',
                'cantidad'=>$cantidad,
                'precio'=>$precio,
                'vacio'=>$vacio,
                'cont'=>$cont
            );
            
        }else{
            $respuesta=array(
                'respuesta'=>'error'
            );
        }


        echo json_encode($respuesta);
    }




    if ($_POST['accion']=='carrito_actualizar') {
        
        session_start();
        $id_prod=filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $qty=filter_var($_POST['qty'], FILTER_SANITIZE_STRING);

        
        $cont=0;
        $k=0;
        $respuesta=array();
        if (isset($_SESSION['carrito'])) {
            
            foreach ($_SESSION['carrito'] as $pod) {
    
                if ($pod['id_producto']==$id_prod) {
                    $cont++;
                    $anterior=$_SESSION['carrito'][$k]['cantidad'];
                    $_SESSION['carrito'][$k]['cantidad']=$qty;

                    $respuesta['producto']=$_SESSION['carrito'][$k];

                }  
                $k++;   
            }
            
        }

        if ($cont>0) {
            $respuesta['respuesta']='exitoso';
            $respuesta['anterior']=$anterior;
        }else{
            $respuesta['respuesta']='error';
        }
        echo json_encode($respuesta);

    }



    if ($_POST['accion']=='stock') {
        
        require_once '../modelos/Producto.php';

        $ob_prod=Producto::ningunDato();

        $res=mysqli_num_rows($ob_prod->stockBajo());

        $respuesta = array(
            'respuesta' =>'exitoso',
            'valor'=>$res
        );

        echo json_encode($respuesta);
    }

    if ($_POST['accion']=='extraer-datos') {

        require_once '../modelos/Producto.php';

        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);

        $ob_prod=Producto::soloId($id);

        $res=($ob_prod->selectProductoID())->fetch_assoc();

        $respuesta = array(
            'producto' => $res
        );

        echo json_encode($respuesta);

    }


    if ($_POST['accion']=='add-stock') {

        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $cantidad= filter_var($_POST['cantidad'], FILTER_SANITIZE_STRING);

        require_once '../modelos/Producto.php';

        $ob_prod=Producto::ningunDato();
        $res=$ob_prod->actualizarStock($id,$cantidad);

        if ($res>0) {
            $respuesta = array(
                'respuesta' => 'exitoso' 
            );
        }else{
            $respuesta = array(
                'respuesta' => 'error' 
            );
        }

        echo json_encode($respuesta);
    }

}



?>