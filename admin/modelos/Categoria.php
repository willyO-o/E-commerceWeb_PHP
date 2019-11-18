<?php

require_once 'Conectar.php';

class Categoria 
{
    private $categoria;
    private $descripcion;
    private $id_categoria;

    public function __construct($categoria,$descripcion,$id_categoria='') {
        $this->categoria = $categoria;
        $this->descripcion = $descripcion;
        $this->id_categoria = $id_categoria;
    }


    static function nungunDato()
    {
        return new self('','','');
    }

    static function soloId($id)
    {
        return new self('','',$id);
    }

    static function soloCategoria($categoria)   
    {
        return new self($categoria,'','');
    }

    static function todo($categoria,$descripcion, $id)
    {
        return new self($categoria,$descripcion,$id);
    }

    
    public function insertCategoria()
    {
        $con=new Conexion();

        $sql="INSERT INTO categoria(categoria,descripcion) VALUES('$this->categoria','$this->descripcion') ";

        $con->query($sql);
        $res=$con->insert_id;
        $con->close();

        return $res;
    }

    public function selectCategoria()
    {
        $con=new Conexion();

        $sql="SELECT * FROM categoria";

        $res=$con->query($sql);

        $con->close();

        return $res;
    }
    

    public function selectCategoriaCantidad()
    {
        $con=new Conexion();

        $sql="SELECT id_categoria,categoria,count(*) as cantidad 
                FROM categoria
                JOIN producto USING(id_categoria)
                GROUP BY id_categoria";

        $res=$con->query($sql);

        $con->close();

        return $res;
    }

    public function updateCategoria()
    {

        $con =new Conexion();
        $sql = "UPDATE categoria SET categoria='$this->categoria', descripcion='$this->descripcion' WHERE id_categoria='$this->id_categoria' ";

        $res=$con->query($sql,$con->affected_rows);

        $con->close();

        return $res;
    }

    public function deleteCategoria()
    {

        $con =new Conexion();
        $sql = "DELETE FROM categoria WHERE id_categoria='$this->id_categoria' ";

        $res=$con->query($sql,$con->affected_rows);

        $con->close();

        return $res;
    }


    public function existeCategoria()
    {
        $con=new Conexion();

        $sql="SELECT categoria FROM categoria WHERE UPPER(categoria)=UPPER('$this->categoria')";

        $res=$con->query($sql);
    
        $con->close();
        
        return $row_cnt = mysqli_num_rows($res);   
    }

    public function existeCategoriaId()
    {
        $con=new Conexion();

        $sql="SELECT categoria FROM categoria WHERE UPPER(categoria)=UPPER('$this->categoria') AND id_categoria != '$this->id_categoria' ";

        $res=$con->query($sql);
    
        $con->close();
        
        return $row_cnt = mysqli_num_rows($res);   
    }

    public function selectIdCategoria()
    {
        $con=new Conexion();

        $sql="SELECT id_categoria,categoria FROM categoria";

        $res=$con->query($sql);

        $con->close();

        return $res;
    }

    public function selectPorId()
    {
        $con=new Conexion();
        $sql= "SELECT * FROM categoria WHERE id_categoria= '$this->id_categoria' ";

        $res =$con->query($sql);
        $con->close();
        return $res;
    }

    

}





?>