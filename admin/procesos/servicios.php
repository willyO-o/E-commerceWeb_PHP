<?php 

    require_once '../modelos/Venta.php';

    $ob_venta=Venta::ningunDato();

    $res=$ob_venta->selectVentaMes();

    $respuesta = array();

    while ($row=$res->fetch_assoc()) {
        
        $registro['mes']=$row['mes'];
        $registro['cantidad']=$row['cantidad'];

        $respuesta[]=$registro;
        
    }
 
    echo json_encode($respuesta);

?>