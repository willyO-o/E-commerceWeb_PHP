<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';

    if (isset($_GET['accion'])) {
        if ($_GET['accion']=='editar') {
            if (!filter_var($_GET['id_user'], FILTER_VALIDATE_INT)) {
                die('Error: no valido');
            }

            $id= filter_var($_GET['id_user'], FILTER_SANITIZE_STRING);
            require_once 'modelos/Usuario.php';

            $usuario= Usuario::solo_id_us($id);

            $res=($usuario->datosUsuario())->fetch_assoc();
           
        }
        else{
            header('location: ver-usuarios.php');
          }
    }
?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->



<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1>Editar Usuario
                    <small class="text-muted"> <br>(llena el formulario para editar los datos de un usuario)</small>
                </h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->


    <div class="row">

        <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Editar usuario <small>(todos los campos son obligatorios)</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                
                <form role="form" action="procesos/procesar-usuario.php" method="POST" id="editar-usuario">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" required value="<?php  echo isset($res['usuario']) ? $res['usuario'] : '' ;?>"
                                placeholder="Usuario">
                        </div>
                        <div class="hidden" id="errorNombre" role="alert"></div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php  echo isset($res['nombre']) ? $res['nombre'] : '' ;?>"
                                placeholder="Nombre del usuario">
                        </div>
                        <div class="form-group">
                            <label for="password">Nuevo Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                            
                        </div>
                        <div class="hidden" id="errorPass" role="alert"></div>
                        <div class="form-group">
                            <label for="confirmarPassword">Confirmar Nuevo Password</label>
                            <input type="password" class="form-control" id="confirmarPassword" name="confirmarPassword" required
                                placeholder="Confirmar Password">
                        </div>
                        <div class="hidden" id="error" role="alert"></div>

                    </div>
                    <!-- /.card-body -->
                    
                    <div class="card-footer d-flex justify-content-between">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="hidden" name="accion" value="editar_usuario">
                        <button type="submit" class="btn btn-primary" id="botonRegistrar">Guardar Cambios</button>
                        <a href="ver-usuarios.php" class="btn btn-danger" >Cancelar</a>
                    </div>
                </form>

               
            </div>
            <!-- /.card -->



        </div>


    </div>
    <!-- /.card-body -->
    <!-- /.card -->

</section>
<!-- /.content -->

<?php
    require_once 'templates/footer.php';

?>