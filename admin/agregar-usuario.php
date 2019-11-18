<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';

?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->



<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1>Crear Usuario
                    <small class="text-muted"> (llena el formulario para crear un usuario)</small>
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
                    <h3 class="card-title">Crear usuario <small>(todos los campos son obligatorios)</small></h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="procesos/procesar-usuario.php" method="POST" id="registrar-usuario">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="usuario">Usuario</label>
                            <input type="text" class="form-control" id="usuario" name="usuario" required
                                placeholder="Usuario">
                        </div>
                        <div class="hidden" id="errorNombre" role="alert"></div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required
                                placeholder="Nombre del usuario">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                            
                        </div>
                        <div class="hidden" id="errorPass" role="alert"></div>
                        <div class="form-group">
                            <label for="confirmarPassword">Confirmar Password</label>
                            <input type="password" class="form-control" id="confirmarPassword" name="confirmarPassword" required
                                placeholder="Confirmar Password">
                        </div>
                        <div class="hidden" id="error" role="alert"></div>

                    </div>
                    <!-- /.card-body -->
                    
                    <div class="card-footer d-flex justify-content-between">
                        
                        <input type="hidden" name="accion" value="registrar_usuario">
                        <button type="submit" class="btn btn-primary" id="botonRegistrar">Crear Usuario</button>
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