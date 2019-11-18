<?php

if (isset($_POST['accion'])) {
    
    if ($_POST['accion']=='registrar') {
        
        
        require_once '../modelos/Categoria.php';
        
        $categoria= filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);
        $descripcion= filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);

        $ob_categoria = Categoria::soloCategoria($categoria);

        $res= $ob_categoria->existeCategoria();
        

        if($res>0){
            $respuesta = array(
                'respuesta' => 'existe' 
            );
        }else {
            $ob_categoria=new Categoria($categoria,$descripcion);

            $resultado= $ob_categoria->insertCategoria();
            
            if ($resultado>0) {
                $respuesta = array(
                    'respuesta' => 'insertado',
                    'id'=>$resultado,
                    'categoria'=>$categoria,
                    'descripcion' => $descripcion
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
        
        
        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);

        require_once '../modelos/Categoria.php';
        
        $ob_categoria= Categoria::soloId($id);
        
        $resultado=$ob_categoria->deleteCategoria();
        
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


    if ($_POST['accion']=='actualizar') {
        
        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $categoria= filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);
        $descripcion= filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);

        require_once '../modelos/Categoria.php';

        $ob_categoria=Categoria::todo($categoria,$descripcion, $id);

        $resultado=$ob_categoria ->existeCategoriaId();

        if($resultado>0){
            $respuesta = array(
                'respuesta' => 'existe' 
            );
        }else {

            $res= $ob_categoria->updateCategoria();
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

    if ($_POST['accion']=='extraer-datos') {

        $id= filter_var($_POST['id'], FILTER_SANITIZE_STRING);

        
        include '../modelos/Categoria.php';

        $ob_categoria= Categoria::soloId($id);
        
        $res=($ob_categoria->selectPorId())->fetch_assoc();
        if ($res) {
            
            $respuesta = array(
                'respuesta' => 'exito',
                'id'=>$res['id_categoria'],
                'categoria'=>$res['categoria'],
                'descripcion'=> $res['descripcion']
            
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