<?php

//echo json_encode($_POST);

if (isset($_POST['accion'])) {
    
    if ($_POST['accion']=='pagar') {
        
        require_once '../modelos/Pedido.php';
        require_once '../modelos/Venta.php';
        
        $id_pedido= filter_var($_POST['id'], FILTER_SANITIZE_STRING);

        $ob_pedido=Pedido::soloId($id_pedido);
        $pedido=($ob_pedido->selectPedidoId())->fetch_assoc();

        $tipo_pago=$pedido['tipo_pago'];
        $total_pago=$pedido['total_pago'];
        $id_cliente=$pedido['id_cliente'];

        $ob_venta=new Venta($tipo_pago,$total_pago,$id_cliente);
        $id_venta=$ob_venta->insertVenta();

        $resp_detalle_pedido=$ob_venta->insertDetalleVenta($id_pedido,$id_venta);

        if ($resp_detalle_pedido>0) {

            
            $ob_pedido->updateEstado($id_pedido);
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