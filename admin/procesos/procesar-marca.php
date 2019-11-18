<?php

if (isset($_POST['accion'])) {
    
    if ($_POST['accion']=='registrar_marca') {

        require_once '../modelos/Marca.php';
        
        $marca= filter_var($_POST['marca'], FILTER_SANITIZE_STRING);

        $ob_marca = Marca::soloMarca($marca);

        $res= $ob_marca->existeMarca();

        if($res>0){
            $respuesta = array(
                'respuesta' => 'existe' 
            );
        }else {
            $ob_marca=new Marca($marca);

            $resultado= $ob_marca->insertMarca();
            if ($resultado>0) {
                $respuesta = array(
                    'respuesta' => 'insertado',
                    'id'=>$resultado,
                    'marca'=>$marca
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
        
        $id_marca= filter_var($_POST['id'], FILTER_SANITIZE_STRING);

        require_once '../modelos/Marca.php';
        
        $ob_marca= Marca::solo_id_marca($id_marca);

        $resultado=$ob_marca->deletetMarca();
        
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

    if ($_POST['accion']=='editar_marca') {

        $id_marca= filter_var($_POST['id'], FILTER_SANITIZE_STRING);
        $marca= filter_var($_POST['marca'], FILTER_SANITIZE_STRING);

        require_once '../modelos/Marca.php';

        $ob_marca=Marca::marcaId($marca,$id_marca);

        $resultado=$ob_marca ->existeMarcaId();

        if($resultado>0){
            $respuesta = array(
                'respuesta' => 'existe' 
            );
        }else {

            $res= $ob_marca->updateMarca();
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
}





?>