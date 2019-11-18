<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';

?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->

<?php
 
    include 'modelos/Venta.php';

    $venta=Venta::ningunDato();

    $res=$venta->selectVenta();

  

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lista de Ventas Registradas</h1>
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
                    <h3 class="card-title p-2 flex-grow-1 bd-highlight">Listado de ventas</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive ">
                    <table id="example1" class="table table-bordered table-striped  tabla-crud-pedidos">
                        <thead>
                            <tr>
                                <th># Venta</th>
                                <th>Tipo de pago</th>
                                <th>Total Bs.</th>
                                <th>Fecha</th>
                                <th>Correo Cliente</th>
                                <th>C.I o NIT</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php 
                    if ($res) {
                        
                        while ($row = $res->fetch_assoc()) {
                    ?>
                            <tr>

                                <td><?php echo $row['id_venta'] ;?></td>
                                <td><?php echo $row['tipo_pago'] ;?></td>
                                <td><?php echo $row['total_pago'] ;?></td>
                                <td><?php echo $row['fecha_venta'] ;?></td>
                                <td><?php echo $row['correo'] ;?></td>
                                <td><?php echo $row['nit'] ;?></td>

                                <td>
                                    <a href="ver-venta.php?id=<?php echo $row['id_venta'] ;?>"  
                                        class="btn bg-olive hover" data-toggle="tooltip" data-placement="left" title="Ver Detalles de Venta">
                                        <i class=" fas fa-eye"></i> 
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
                                <th># Pedido</th>
                                <th>Tipo de pago</th>
                                <th>Total Bs.</th>
                                <th>Fecha</th>
                                <th>Correo Cliente</th>
                                <th>C.I o NIT</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>









    <!-- modal editar catgoria-->

    <!-- /.card -->

</section>
<!-- /.content -->



<?php
    
    require_once 'templates/footer.php';

?>