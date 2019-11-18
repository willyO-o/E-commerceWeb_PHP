<?php

    require_once 'Conectar.php';

    class Cliente
    {
        private $nombre_cliente;
        private $apellido_cliente;
        private $nit;
        private $correo;
        private $password;
        private $telefono;
        private $direccion;
        private $id_ciudad;
        private $id_cliente;


        public function __construct($nombre_cliente,$apellido_cliente,$nit,$correo,$password,$telefono,$direccion,$id_ciudad,$id_cliente='') {
            $this->nombre_cliente = $nombre_cliente;
            $this->apellido_cliente = $apellido_cliente;
            $this->nit = $nit;
            $this->correo = $correo;
            $this->password = $password;
            $this->telefono = $telefono;
            $this->direccion = $direccion;
            $this->id_ciudad = $id_ciudad;

            $this->id_cliente = $id_cliente;

        }

        public function ningunDato()
        {
            return new self('','','','','','','','','');
        }

        public function soloId($id)
        {
            return new self('','','','','','','','',$id);
        }

        public function soloCorreo($correo)
        {
            return new self('','','',$correo,'','','','','');
        }

        public function soloCorreoId($correo,$id)
        {
            return new self('','','',$correo,'','','','',$id);
        }

        public function passwordId($password,$id)
        {
            return new self('','','','',$password,'','','',$id);
        }

        public function datosActualizar($nit,$telefono,$direccion,$id_ciudad,$id_cliente)
        {
            return new self('','',$nit,'','',$telefono,$direccion,$id_ciudad,$id_cliente);
        }
        public function datosActualizarCliente($nombre,$apellido,$nit,$password,$telefono,$direccion,$id_ciudad,$id_cliente)
        {
            return new self($nombre,$apellido,$nit,'',$password,$telefono,$direccion,$id_ciudad,$id_cliente);
        }

        public function datosClientePedido($nombre,$apellido,$nit,$correo,$telefono,$direccion,$id_ciudad)
        {
            return new self($nombre,$apellido,$nit,$correo,'',$telefono,$direccion,$id_ciudad,'');
        }

        public function insertCliente()
        {
            $con=new Conexion();
            if ($this->password=='') {

                $sql="INSERT INTO cliente (nombre_cliente,apellido_cliente,nit,correo,fecha_registro,telefono,direccion,id_ciudad)  
                    VALUES('$this->nombre_cliente','$this->apellido_cliente','$this->nit','$this->correo',NOW(),
                    '$this->telefono','$this->direccion','$this->id_ciudad') ";
            }else{

                $opciones = array('cost' => 12 );
                $password_hashed= password_hash($this->password, PASSWORD_BCRYPT ,$opciones);


                $sql="INSERT INTO cliente (nombre_cliente,apellido_cliente,nit,correo,password,fecha_registro,telefono,direccion,id_ciudad)  
                        VALUES('$this->nombre_cliente','$this->apellido_cliente','$this->nit','$this->correo','$password_hashed',NOW(),
                        '$this->telefono','$this->direccion','$this->id_ciudad') ";
            }
            
            $con->query($sql);
            $res=$con->insert_id;

            $con->close();

            return $res;
        }

        public function updateCliente()
        {
            $con=new Conexion();

            $sql=" UPDATE cliente SET nit='$this->nit', telefono= '$this->telefono', 
                    direccion='$this->direccion',id_ciudad='$this->id_ciudad' 
                    WHERE  id_cliente='$this->id_cliente' ";

            $res=$con->query($sql, $con->affected_rows);

            $con->close();

            return $res;

        }
        public function updateClientePedido()
        {
            $con=new Conexion();
            $opciones = array('cost' => 12 );
            $password_hashed= password_hash($this->password, PASSWORD_BCRYPT ,$opciones);


            $sql=" UPDATE cliente SET nombre_cliente='$this->nombre_cliente',apellido_cliente='$this->apellido_cliente',
                    password='$password_hashed',nit='$this->nit', telefono= '$this->telefono', 
                    direccion='$this->direccion',id_ciudad='$this->id_ciudad' 
                    WHERE  id_cliente='$this->id_cliente' ";

            $res=$con->query($sql, $con->affected_rows);

            $con->close();

            return $res;

        }

        public function updatePassword()
        {
            $con=new Conexion();

            $opciones = array('cost' => 12 );
            $password_hashed= password_hash($this->password, PASSWORD_BCRYPT ,$opciones);

            $sql="UPDATE cliente SET password ='$password_hashed' WHERE id_cliente='$this->id_cliente' ";

            $res=$con->query($sql, $con->affected_rows);

            $con->close();
            
            return $res;
        }

        public function existeCorreo()
        {
            $con=new Conexion();

            $sql="SELECT correo FROM cliente WHERE UPPER(correo)= UPPER('$this->correo') ";

            $res=$con->query($sql);

            $con->close();

            return $row_cnt = mysqli_num_rows($res);   
        }

        public function existeCorreoId()
        {
            $con=new Conexion();

            $sql="SELECT correo FROM cliente WHERE UPPER(correo)= UPPER('$this->correo') AND id_cliente != '$this->id_cliente' ";

            $res=$con->query($sql);

            $con->close();

            return $row_cnt = mysqli_num_rows($res);   
        }

        public function selectPorCorreo()
        {
            $con=new Conexion();

            $sql="SELECT * FROM cliente WHERE UPPER(correo)=UPPER('$this->correo') "; 

            $res=$con->query($sql);

            return $res;
        }

        public function selectIdPorCorreo()
        {
            $con=new Conexion();

            $sql="SELECT id_cliente FROM cliente WHERE UPPER(correo)=UPPER('$this->correo') "; 

            $res=$con->query($sql);

            return $res;
        }

        public function selectCiudadCliente()
        {
            $con=new Conexion();

            $sql="SELECT id_ciudad,ciudad  
            FROM ciudad JOIN cliente USING(id_ciudad) 
            WHERE id_cliente = '$this->id_cliente' ";

            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function selectPorID()
        {
            $con=new Conexion();
            $sql= "SELECT * FROM cliente 
                JOIN ciudad USING(id_ciudad) 
                WHERE id_cliente = '$this->id_cliente' ";
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function selectCiudad()
        {
            $con=new Conexion();

            $sql= "SELECT * FROM ciudad";

            $res=$con->query($sql);

            $con->close();

            return $res;
        }



        public function insertContacto($nombre,$email,$telefono,$mensaje)
        {
            $con=new Conexion();

            $sql="INSERT INTO contacto  VALUES(NULL,'$nombre','$email','$telefono','$mensaje',NOW()) ";
            
            $con->query($sql);
            $res=$con->insert_id;

            $con->close();

            return $res;
        }

        public function selectContacto()
        {
            $con=new Conexion();

            $sql="SELECT * FROM contacto";
            
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function selectContactoId($id)
        {
            $con=new Conexion();

            $sql="SELECT * FROM contacto WHERE id_contacto= $id ";
            
            $res=$con->query($sql);

            $con->close();

            return $res;
        }

        public function selectCiudadID()
        {
            $con=new Conexion();
            $sql= "SELECT ciudad,Departamento FROM cliente 
                JOIN ciudad USING(id_ciudad) 
                WHERE id_cliente = '$this->id_cliente' ";
            $res=$con->query($sql);

            $con->close();

            return $res;
        }


        public function selectCliente()
        {
            $con=new Conexion();

            $sql= "SELECT * FROM cliente JOIN ciudad USING(id_ciudad) ";

            $res=$con->query($sql);

            $con->close();

            return $res;
        }


    }
    




?>