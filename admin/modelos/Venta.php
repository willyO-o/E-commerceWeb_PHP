<?php
    require_once 'Conectar.php';

class Venta
{
    
    private $tipo_pago;
    private $total_pago;
    private $id_cliente;
    private $id_venta;

    public function __construct($tipo_pago,$total_pago,$id_cliente,$id_venta='') {
        $this->tipo_pago = $tipo_pago;
        $this->total_pago = $total_pago;
        $this->id_cliente = $id_cliente;
        $this->id_venta = $id_venta;
    }



    static function soloId($id)
    {
        return new self('','','',$id);
    }
    

    static function ningunDato()
    {
        return new self('', '', '','');
    }
  

    


        public function insertVenta()   
        {
            $con=new Conexion();
    
            $sql= "INSERT INTO venta VALUES (NULL,'$this->tipo_pago','$this->total_pago',
                    NOW(),'$this->id_cliente') ";
    
            $con->query($sql);
            $res=$con->insert_id;

            $con->close();

            return $res;
        }

        public function selectVenta()   
        {
            $con=new Conexion();
    
            $sql= "SELECT * FROM venta JOIN cliente using(id_cliente)
                    ORDER BY id_venta DESC";
    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function detallesVenta()   
        {
            $con=new Conexion();
    
            $sql= "SELECT * from participa
                JOIN producto USING(id_producto)
                WHERE id_venta='$this->id_venta' ";
    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function selectVentaId()   
        {
            $con=new Conexion();
    
            $sql= "SELECT * FROM venta JOIN cliente USING(id_cliente)
                    WHERE id_venta='$this->id_venta' ";
    
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        
        public function insertDetalleVenta($id_pedido,$id_venta)   
        {
            $con=new Conexion();

            $res=0;
            $sql="SELECT * from participa_pedido 
                    WHERE id_pedido='$id_pedido' ";

            $res_pedido=$con->query($sql); 
            if (mysqli_num_rows($res_pedido)>0) {
                
                while ($row=$res_pedido->fetch_assoc()) {
                    $sql= "INSERT INTO participa VALUES('$id_venta','".$row['id_producto']."','".$row['cantidad_producto']."','".$row['precio']."') ";
                    $con->query($sql);
                    $this->restarStock($row['id_producto'],$row['cantidad_producto']);
                    $res=1;
                }
            }   
    
            $con->close();

            return $res;
        }

        public function restarStock($id_producto,$cantidad)
        {
            $con=new Conexion();

            $sql="UPDATE producto SET stock= stock-'$cantidad' WHERE id_producto= '$id_producto' ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }


        public function selectVentaMes()   
        {
            $con=new Conexion();
    
            $sql= "SELECT ELT(MONTH(fecha_venta), 'Enero', 'Febrero', 'Marzo','Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre') AS mes, COUNT(*) as cantidad
                    FROM venta
                    WHERE fecha_venta >= DATE_SUB(CURDATE(),INTERVAL 7  MONTH) 
                    GROUP BY MONTH(fecha_venta)";
    
            $res=$con->query($sql);

            // SELECT fecha_venta, COUNT(*) as cantidad
            // FROM venta
            // WHERE fecha_venta >= DATE_SUB(CURDATE(),INTERVAL 7  MONTH) 
            // GROUP BY MONTH(fecha_venta)

            $con->close();

            return $res;
        }

    
    

}