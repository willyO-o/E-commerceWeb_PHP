<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';

?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->

<?php
 
    include 'modelos/Usuario.php';

    $user= Usuario::ningunDato();

    $res=$user->todosUsuarios();
    

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lista de Usuarios</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card ">
            <div class="card-header">
              <h3 class="card-title">Tabla de datos de los Usuarios con acceso al panel de control</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped  tabla-ver-usuarios">
                <thead>
                <tr>
                  
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Ultima Conexion</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                
                <?php 
                    if ($res) {
                        
                        while ($row = $res->fetch_assoc()) {
                    ?>
                        <tr>
                            
                            <td><?php echo $row['usuario'] ;?></td>
                            <td><?php echo $row['nombre'] ;?></td>
                            <td><?php echo $row['ultima_conexion'] ;?></td>
                            <td>
                                <a href="#" data-id="<?php echo $row['id_usuario'] ;?>" estado="<?php echo $row['estado'] ;?>"  class="btn btn-<?php echo $row['estado'] == (1) ? 'success' : 'secondary'  ;?> btn-lg " role="button" aria-pressed="true">
                                    <?php echo $row['estado'] == (1) ? 'activo' : 'inactivo'  ;?>
                                </a>
                            
                            </td>
                            
                            <td>
                                <a href="editar-usuario.php?accion=editar&&id_user=<?php echo $row['id_usuario'] ;?>" class="btn bg-orange  ">
                                    <i class="fas fa-user-edit text-light "></i>
                                </a>
                                <a href="#" data-id="<?php echo $row['id_usuario'] ;?>" data-tipo="usuario" class="btn bg-maroon borrar-registro">
                                    <i class=" fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php 
                        
                        }
                    }
                    ?>
           
                </tbody>
                <tfoot>
                <tr>
                  
                  <th>Usuario</th>
                  <th>Nombre</th>
                  <th>Ultima Conexion</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>


   
    <!-- /.card-body -->
    <div class="card-footer">
        
    </div>
    <!-- /.card-footer-->

    <!-- /.card -->

</section>
<!-- /.content -->

<?php
    
    require_once 'templates/footer.php';

?>