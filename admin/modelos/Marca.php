<?php

    require_once ('Conectar.php');

class Marca 
{
    private $marca;
    private $id_marca;
   

    public function __construct($marca,$id_marca='') {
        $this->marca = $marca;
        $this->id_marca = $id_marca;
    }


    static function ningunDato()
    {
        return new self('','');
    }

    static function solo_id_marca($id)
    {
        return new self('',$id);
    }

    static function soloMarca($marca)
    {
        return new self($marca,'');
    }


    static function marcaId($marca,$id)
    {
        return new self($marca,$id);
    }

    public function todasMarcas()
    {
        $con=new Conexion();

        $sql="SELECT * FROM marca";

        $res= $con->query($sql);
        $con->close();

        return $res;
    }

   

    public function selectMarcaCantidad()
        {
            $con=new Conexion();

            $sql=" SELECT id_marca,marca,count(*) as cantidad 
                    FROM marca
                    JOIN producto USING(id_marca)
                    GROUP BY id_marca";

            $res= $con->query($sql);
            $con->close();

            return $res;
        }


        public function selectMarcaCantidadLaptop()
        {
            $con=new Conexion();

            $sql=" SELECT id_marca,marca,count(*) as cantidad 
                    FROM marca
                    JOIN producto USING(id_marca)
                    WHERE id_categoria=16 
                    GROUP BY id_marca";

            $res= $con->query($sql);
            $con->close();

            return $res;
        }     

    public function existeMarca()
    {
        $con=new Conexion();

        $sql="SELECT UPPER(marca) FROM marca WHERE marca=UPPER('$this->marca')";

        $res=$con->query($sql);
    
        $con->close();
        
        return $row_cnt = mysqli_num_rows($res);   
    }

    public function existeMarcaId()
    {
        $con=new Conexion();

        $sql="SELECT UPPER(marca) FROM marca WHERE marca=UPPER('$this->marca') AND id_marca != '$this->id_marca' ";

        $res=$con->query($sql);
    
        $con->close();
        
        return $row_cnt = mysqli_num_rows($res);   
    }

    public function insertMarca()
    {

        $con =new Conexion();
        $sql = "INSERT INTO marca(marca) VALUES('$this->marca')";

        $con->query($sql);
        $res=$con->insert_id;

        $con->close();

        return $res;
    }

    public function updateMarca()
    {

        $con =new Conexion();
        $sql = "UPDATE marca SET marca='$this->marca' WHERE id_marca='$this->id_marca' ";

        $res=$con->query($sql,$con->affected_rows);

        $con->close();

        return $res;
    }

    public function deletetMarca()
    {

        $con =new Conexion();
        $sql = "DELETE FROM marca WHERE id_marca='$this->id_marca' ";

        $res=$con->query($sql,$con->affected_rows);

        $con->close();

        return $res;
    }

    
}

?>