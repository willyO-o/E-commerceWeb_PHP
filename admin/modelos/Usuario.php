<?php

    require_once ('Conectar.php');

class Usuario 
{
    private $usuario;
    private $nombre;
    private $password;
    private $estado;
    private $ultima_conexion;
    private $id_usuario;

    public function __construct($usuario,$nombre,$password,$estado='',$ultima_conexion='',$id_usuario='') {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->estado = $estado;
        $this->ultima_conexion = $ultima_conexion;
        $this->id_usuario = $id_usuario;
    }



    static function solo_id_us($id)
    {
        return new self('','','','','',$id);
    }

    


    
    public function conexion_Id($ultima_conexion,$id)
    {
        return new self('','','','',$ultima_conexion,$id);
    }

    static function ningunDato()
    {
        return new self('', '', '', '','','');
    }
    static function soloUsuario($usuario)
    {
        return new self($usuario,'', '', '','','');
    }

    static function idEstado($estado,$id)
    {
        return new self('','', '', $estado,'',$id);
    }

    static function datosActualizar($usuario,$nombre,$password,$id)
    {
        return new self($usuario,$nombre,$password,'','',$id);
    }

    static function soloUsuarioId($usuario,$id)
    {
        return new self($usuario,'', '', '','',$id);
    }



        public function existeUser()   
        {
            $con=new Conexion();
    
            $sql= "SELECT usuario FROM usuario WHERE usuario = '$this->usuario'";
    
            $res=$con->query($sql);
    
            $con->close();
            
    
            return $row_cnt = mysqli_num_rows($res);     
        }


        public function existeUserID()   
        {
            $con=new Conexion();
    
            $sql= "SELECT usuario FROM usuario WHERE usuario = '$this->usuario' AND id_usuario != '$this->id_usuario' " ;
    
            $res=$con->query($sql);
    
            $con->close();
            
    
            return $row_cnt = mysqli_num_rows($res);     
        }

        public function insertUsuario()
        {
        
            $opciones = array('cost' => 12 );
            $password_hashed= password_hash($this->password, PASSWORD_BCRYPT ,$opciones);

            $con =new Conexion();
            $sql = "INSERT INTO usuario VALUES (NULL,'$this->usuario','$this->nombre','$password_hashed',1,NULL)";

            $res=$con->query($sql,$con->affected_rows);

            $con->close();

            return $res;

        }


    public function todosUsuarios()
    {
        $db= new Conexion();

        $sql= "SELECT * FROM usuario";

        $result = $db->query($sql);

        $db->close();
        return $result;
    }



    public function eliminarUsuario()
    {
        $con=new Conexion();

        $sql="DELETE FROM usuario WHERE id_usuario= '$this->id_usuario'";

        $res=$con->query($sql, $con->affected_rows);
        
        $con->close();
        return $res;
    }

    public function cambiarEstado()
    {
        $con=new Conexion();

        $sql="UPDATE usuario SET estado='$this->estado'  WHERE id_usuario='$this->id_usuario'";

        $res=$con->query($sql, $con->affected_rows);

        $con->close();
        return $res;
    }

    public function datosUsuario()
    {
       $con=new Conexion();
       $sql= "SELECT * FROM usuario WHERE id_usuario = '$this->id_usuario'";

       $res=$con->query($sql);

       $con->close();

       return $res;
    }


    public function actualizarUsuario()
    {
        $opciones = array('cost' => 12 );
        $password_hashed= password_hash($this->password, PASSWORD_BCRYPT ,$opciones);

        $con=new Conexion();
        $sql="UPDATE usuario SET usuario='$this->usuario', nombre='$this->nombre', password='$password_hashed' WHERE id_usuario='$this->id_usuario' ";
        
        $res=$con->query($sql, $con->affected_rows);

        $con->close();

        return $res;
    }

    public function ultimaConexion()
    {
        $con=new Conexion();

        $sql="UPDATE usuario SET ultima_conexion='$this->ultima_conexion' WHERE id_usuario= '$this->id_usuario' ";

        $res=$con->query($sql, $con->affected_rows);

        $con-> close();
        return $res;
    }

    
}


?>