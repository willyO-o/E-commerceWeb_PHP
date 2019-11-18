<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';

?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->

<?php
 
    include 'modelos/Cliente.php';

    $cliente=Cliente::ningunDato();
    $res=$cliente->selectCliente();

  

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Listado de Clientes </h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="row">
        <div class=" col-sm-12">
            <div class="card ">
                <div class="card-header d-flex bd-highlight ">
                    <h3 class="card-title p-2 flex-grow-1 bd-highlight">Listado de Clientes</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive ">
                    <table id="example1" class="table table-bordered table-striped  tabla-crud-pedidos">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>NIT</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Ciudad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php 
                    if ($res) {
                        
                        while ($row = $res->fetch_assoc()) {
                    ?>
                            <tr>

                                <td><?php echo $row['nombre_cliente'] ;?></td>
                                <td><?php echo $row['apellido_cliente'] ;?></td>
                                <td><?php echo $row['nit'] ;?></td>
                                <td><?php echo $row['correo'] ;?></td>
                                <td>
                                    <?php echo $row['telefono']?>                                 
                                </td>
                                <td><?php echo $row['direccion'] ;?></td>
                                <td><?php echo $row['ciudad'] ;?></td>

                                <td><?php echo $row['fecha_registro'] ;?> </td>
                            </tr>
                            <?php 
                        
                        }
                    }
                    ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>NIT</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Direccion</th>
                                <th>Ciudad</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>







 

    <!-- /.card -->

</section>
<!-- /.content -->



<?php
    
    require_once 'templates/footer.php';

?>