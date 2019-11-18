<?php
    require_once 'Conectar.php';
class Pedido
{
    
    private $tipo_pago;
    private $productos;
    private $total_pago;
    private $fecha_pedido;
    private $estado_pedido;
    private $id_cliente;
    private $id_pedido;

    public function __construct($tipo_pago,$productos,$total_pago,$fecha_pedido='',$estado_pedido='',$id_cliente,$id_pedido='') {
        $this->tipo_pago = $tipo_pago;
        $this->productos = $productos;
        $this->total_pago = $total_pago;
        $this->fecha_pedido = $fecha_pedido;
        $this->estado_pedido = $estado_pedido;
        $this->id_cliente = $id_cliente;
        $this->id_pedido = $id_pedido;
    }



    static function soloId($id)
    {
        return new self('','','','','','',$id);
    }


    public function estadoId($estado_pedido,$id)
    {
        return new self('','','','',$estado_pedido,'',$id);
    }

    static function ningunDato()
    {
        return new self('', '', '', '','','','');
    }
  


        public function insertPedido()   
        {
            $con=new Conexion();
    
            $sql= "INSERT INTO pedido VALUES (NULL,'$this->tipo_pago','$this->productos','$this->total_pago',
                    NOW(),'$this->estado_pedido','$this->id_cliente') ";
    
            $con->query($sql);
            $res=$con->insert_id;

            $con->close();

            return $res;
        }

        public function selectPedido()   
        {
            $con=new Conexion();
    
            $sql= "SELECT * FROM pedido JOIN cliente using(id_cliente)
                    ORDER BY id_pedido DESC";
    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function selectPedidoId()   
        {
            $con=new Conexion();
    
            $sql= "SELECT * FROM pedido 
                JOIN cliente USING(id_cliente)  
                JOIN ciudad USING(id_ciudad) 
                WHERE id_pedido='$this->id_pedido' ";
    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function updateEstado($id_pedido)   
        {
            $con=new Conexion();
    
            $sql= "UPDATE pedido SET estado_pedido=2 WHERE id_pedido='$id_pedido' ";
    
            $con->query($sql);

            $con->close();
        }

        public function insertDetallePedido($carrito,$id_pedido)   
        {
            $con=new Conexion();

            foreach ($carrito as $row) {

                $sql= "INSERT INTO participa_pedido VALUES ('$id_pedido','".$row['id_producto']."','".$row['cantidad']."','".$row['precio_venta']."') ";
    
                $con->query($sql);
            }

            $res=$con->affected_rows;

            $con->close();

            return $res;
        }

        
        public function updatePedidosVencidos()   
        {
            $con=new Conexion();

            $sql="SELECT id_pedido, DATEDIFF( NOW( ) , fecha_pedido ) diferencia from pedido
                WHERE DATEDIFF( NOW( ) , fecha_pedido )>3 ";
            $resp=$con->query($sql);

            if (mysqli_num_rows($resp)>0) {

                while ($row=$resp->fetch_assoc()) {
                    $sql= "UPDATE pedido SET estado_pedido=0 WHERE id_pedido='".$row['id_pedido']."'";
                    $con->query($sql);
                }
                
            }
    
            $con->close();
        }




        public function selectDetallePedido()   
        {
            $con=new Conexion();
    
            $sql= "SELECT * from participa_pedido 
                    JOIN producto USING(id_producto)
                    WHERE id_pedido='$this->id_pedido' ";
    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }
        

    public function cambiarEstadoPedidoPagado()
    {
        $con=new Conexion();
    
        $sql= "UPDATE pedido SET estado_pedido =2 WHERE id_pedido='$this->id_pedido'";

        $res=$con->query($sql,$con->affected_rows);

        $con->close();

        return $res;
    }
}

?>