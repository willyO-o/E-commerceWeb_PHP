<?php

    require_once 'Conectar.php';

    class Producto 
    {
        private $producto;
        private $imagen;
        private $descripcion_prod;
        private $caracteristicas_prod;
        private $stock;
        private $stock_minimo;
        private $precio_venta;
        private $garantia;
        private $id_marca;
        private $id_categoria;

        

        private $imagen1;
        private $imagen2;
        private $imagen3;

        private $id_producto;


        public function __construct($producto,$imagen,$descripcion_prod,$caracteristicas_prod,
                                    $stock, $stock_minimo, $precio_venta, $garantia,$id_marca,
                                    $id_categoria, $imagen1='',$imagen2='',$imagen3='', $id_producto='') 
        {
            $this->producto = $producto;
            $this->imagen = $imagen;  
            $this->descripcion_prod = $descripcion_prod;  
            $this->caracteristicas_prod = $caracteristicas_prod;  
            $this->stock = $stock;  
            $this->stock_minimo = $stock_minimo;  
            $this->precio_venta = $precio_venta;  
            $this->garantia = $garantia;  
            $this->id_marca = $id_marca;  
            $this->id_categoria = $id_categoria;  
        
            $this->imagen1 = $imagen1; 
            $this->imagen2 = $imagen2; 
            $this->imagen3 = $imagen3;    

            $this->id_producto = $id_producto;  
        }

        static function ningunDato()
        {
            return new self('','','','','','','','','','','','','','');
        }

        static function soloId($id)
        {
            return new self('','','','','','','','','','','','','',$id);
        }

        static function soloProducto($producto)
        {
            return new self($producto,'','','','','','','','','','','','','');
        }
        static function productoId($producto,$id)
        {
            return new self($producto,'','','','','','','','','','','','',$id);
        }

        static function setProducto($producto,$descripcion,$caracteristicas,$stock,
                                    $stock_minimo, $precio, $garantia,$id_marca,$id_categoria,$id)
        {
            return new self($producto,'',$descripcion,$caracteristicas,$stock,$stock_minimo,$precio,$garantia,$id_marca,$id_categoria,'','','',$id);
        }


        public function selectProducto()
        {
            $con=new Conexion();

            $sql="SELECT * FROM producto 
            JOIN categoria USING(id_categoria) 
            JOIN marca USING(id_marca) ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }


        public function isertProducto()
        {
            $con=new Conexion();
            $sql="INSERT INTO producto(producto,imagen,descripcion_prod,caracteristicas_prod,stock,stock_minimo,
                    precio_venta,garantia,id_marca,id_categoria)  
                VALUES('$this->producto','$this->imagen','$this->descripcion_prod','$this->caracteristicas_prod',
                    '$this->stock','$this->stock_minimo','$this->precio_venta','$this->garantia','$this->id_marca','$this->id_categoria') ";

            $con->query($sql);
            $res=$con->insert_id;

            $con->close();

            return $res;
        }

        public function insertImagenes($id)
        {
            $con=new Conexion();
            $sql="INSERT INTO imagenes  VALUES('" .$id. "','$this->imagen1','$this->imagen2','$this->imagen3') ";
            $res=$con->query($sql, $con->affected_rows );

            $con->close();

            return $res;
        }

        public function eliminarProducto()
        {
            $con=new Conexion();

            $sql="DELETE FROM producto WHERE id_producto= '$this->id_producto'";

            $res=$con->query($sql, $con->affected_rows);
            
            $con->close();
            return $res;
        }

        public function updateProducto()
        {
            $con=new Conexion();

            $sql= "UPDATE producto SET producto='$this->producto',descripcion_prod='$this->descripcion_prod',
                    caracteristicas_prod='$this->caracteristicas_prod',stock='$this->stock', stock_minimo ='$this->stock_minimo',
                    precio_venta='$this->precio_venta', garantia='$this->garantia',id_marca='$this->id_marca', id_categoria='$this->id_categoria' 
                    WHERE id_producto='$this->id_producto' ";

            $res=$con->query($sql, $con->affected_rows);

            $con->close();

            return $res;
        }

  


        public function existeProducto()
        {
            $con=new Conexion();

            $sql="SELECT producto FROM producto WHERE UPPER(producto)=UPPER('$this->producto')";

            $res=$con->query($sql);
        
            $con->close();
            
            return $row_cnt = mysqli_num_rows($res);   
        }

        public function existeProductoId()
        {
            $con=new Conexion();

            $sql="SELECT producto FROM producto WHERE UPPER(producto)=UPPER('$this->producto') AND id_producto != '$this->id_producto' ";

            $res=$con->query($sql);
        
            $con->close();
            
            return $row_cnt = mysqli_num_rows($res);   
        }
            

        public function datosProducto()
        {
            $con=new Conexion();

            $sql="SELECT * FROM producto 
            JOIN imagenes USING(id_producto)  
            WHERE id_producto='$this->id_producto' ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }

        public function updateImagen($tabla,$campo,$imagen,$id)
        {
            $con=new Conexion();

            $sql= "UPDATE ".$tabla." SET ".$campo." = '".$imagen."' WHERE id_producto = '".$id ."' ";

            $res=$con->query($sql,$con->affected_rows);

            $con->close();

            return $res;
            
        }


        public function nuevosProductos()
        {
            $con=new Conexion();
            $sql="SELECT * FROM producto
                    JOIN categoria USING(id_categoria) 
                    JOIN marca USING(id_marca) 
                    ORDER BY id_producto DESC 
                    LIMIT 0,10 ";

            $res=$con->query($sql);
            $con->close();

            return $res;

        }

        public function selectProductoID()
        {
            $con=new Conexion();

            $sql="SELECT * FROM producto 
            JOIN categoria USING(id_categoria) 
            JOIN marca USING(id_marca) 
            JOIN imagenes USING(id_producto) 
            WHERE id_producto='$this->id_producto'";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }

        public function productosRelacionados($id_marca,$id_categoria)
        {
            $con=new Conexion();

            $sql="SELECT * FROM producto 
                JOIN categoria USING(id_categoria) 
                JOIN marca USING(id_marca) 
                WHERE id_marca='$id_marca' OR id_categoria='$id_categoria' 
                ORDER BY RAND() LIMIT 4 ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }

        public function productosMarca($id_marca)
        {
            $con=new Conexion();

            $sql="SELECT * FROM producto 
                JOIN categoria USING(id_categoria) 
                JOIN marca USING(id_marca) 
                WHERE id_marca='$id_marca'  ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }

        public function productosCategoria($id_categoria)
        {
            $con=new Conexion();

            $sql="SELECT * FROM producto 
                JOIN categoria USING(id_categoria) 
                JOIN marca USING(id_marca) 
                WHERE  id_categoria='$id_categoria' ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }

        public function buscarProducto($buscar,$id_categoria)
        {
            $con=new Conexion();

            $sql="SELECT * FROM producto 
                JOIN categoria USING(id_categoria) 
                JOIN marca USING(id_marca) 
                WHERE producto LIKE '%".$buscar."%' AND id_categoria='$id_categoria' ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }

        public function añadirResenia($nombre,$email,$resenia,$calificacion,$id)
        {
            $con=new Conexion();

            $sql="INSERT INTO resenia VALUES(NULL,'$nombre','$email','$resenia','$calificacion',NOW(),'$id') ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }

        public function selectResenia()
        {
            $con=new Conexion();

            $sql="SELECT * FROM resenia 
                WHERE id_producto='$this->id_producto' ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }

        public function selectCalificacion()
        {
            $con=new Conexion();

            $sql="SELECT ROUND(AVG(calificacion),1) as calificacion FROM resenia 
                WHERE id_producto='$this->id_producto' ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }


        public function valorResenia()
        {
            $con=new Conexion();

            $resultado = array();

            $sql="SELECT ROUND(AVG(calificacion),1) as prom,  COUNT(*) as cant
                    FROM resenia 
                    WHERE id_producto='$this->id_producto'  ";

            $res=($con->query($sql))->fetch_assoc();

            $resultado['promedio']=$res['prom'];
            $resultado['cantidad']=$res['cant'];

            for ($i=1; $i <=5 ; $i++) { 
                $sql="SELECT COUNT(*) as num FROM resenia WHERE calificacion=".$i." AND id_producto='$this->id_producto' ";

                $res=($con->query($sql))->fetch_assoc();
                $resultado['num'.$i]=$res['num'];

            }

            $con->close();

            return $resultado;
        }


        public function carritoProducto()
        {
            $con=new Conexion();

            $sql="SELECT id_producto, producto,precio_venta,stock, imagen FROM producto WHERE id_producto='$this->id_producto' ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }


        public function stockBajo()
        {
            $con=new Conexion();

            $sql="SELECT * from producto
                    WHERE stock <=stock_minimo ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }
        
        public function actualizarStock($id,$stock)
        {
            $con=new Conexion();

            $sql="UPDATE producto SET stock=stock+$stock WHERE id_producto= $id  ";

            $res=$con->query($sql,$con->affected_rows);
            $con->close();

            return $res;
        }


        public function masVendidos()
        {
            $con=new Conexion();

            $sql="SELECT *
                FROM producto
                JOIN(SELECT id_producto
                FROM participa 
                GROUP BY id_producto
                ORDER by SUM(cantidad_pro) DESC 
                LIMIT 6) e USING(id_producto)
                JOIN marca USING(id_marca)
                JOIN categoria USING(id_categoria) ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }


        public function selectLaptops()
        {
            $con=new Conexion();

            $sql="SELECT * FROM producto 
                JOIN marca USING(id_marca) 
                JOIN categoria USING(id_categoria) 
                WHERE id_categoria = 16 ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }

        public function selectLaptopsMarca($id)
        {
            $con=new Conexion();

            $sql="SELECT * FROM producto 
                JOIN marca USING(id_marca) 
                JOIN categoria USING(id_categoria) 
                WHERE id_categoria = 16 AND id_marca=$id ";

            $res=$con->query($sql);
            $con->close();

            return $res;
        }

    }
    


?>