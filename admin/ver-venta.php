<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';
    

    if (isset($_GET['id'])) {
        $id=$_GET['id'];
        if (!is_numeric($id)) {
           die('ERROR de datos'); 
        }
        require_once 'modelos/Venta.php';
        $ob_venta=Venta::soloId($id);
        $venta=($ob_venta->selectVentaId())->fetch_assoc();
        $detalles=$ob_venta->detallesVenta();
        
        //var_dump($detalles);

    }else{
        die('Error');
    }



?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->



<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detalles de la Venta</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               


                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-concierge-bell"></i> Numero de Venta: <b><?php echo $venta['id_venta']; ?></b>
                                <small class="float-right">Fecha de Venta: <b><?php echo $venta['fecha_venta']; ?></b></small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            Datos del Cliente
                            <address>
                                <strong>Nombre</strong><br>
                                Direccion<br>
                                Telefono<br>
                                C.I o NIT<br>
                                Correo
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            Cliente
                            <address>
                                <strong><?php echo $venta['nombre_cliente'];?> <?php echo $venta['apellido_cliente'] ?></strong><br>
                                <?php echo $venta['direccion']; ?><br>
                                <?php echo $venta['telefono']; ?><br>
                                <?php echo $venta['nit']; ?><br>
                                <?php echo $venta['correo']; ?>
                            </address>
                            
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Resumen de Venta</b><br>
                            <br>
                            <b>Tipo de Pago:</b> <?php echo $venta['tipo_pago']; ?><br>
                            <b> Codigo de venta:</b> VDP-<?php echo $venta['id_venta']; ?> <br>
                            <b>Total :</b> <?php echo $venta['total_pago']; ?> Bs.
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Cantidad</th>
                                        <th>Producto</th>
                                        <th>Precio Bs.</th>
                                        <th>Subtotal Bs.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $total=0;
                                    while ($row= $detalles->fetch_assoc()) { ?>
                                        
                                    <tr>
                                        <td><?php echo $row['cantidad_pro'] ?></td>
                                        <td><?php echo $row['producto'] ?></td>
                                        <td><?php echo $row['precio'] ?></td>
                                        <td><?php echo $row['precio']*$row['cantidad_pro'] ?></td>
                                    </tr>

                                    <?php 
                                    $total+=$row['precio']*$row['cantidad_pro'];
                                    } ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Total:</td>
                                        <td><b><?php echo round($total,2) ?></b></td>
                                    </tr>
                                    
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <!-- accepted payments column -->
                        <div class="col-6">
                           
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <p class="lead">Resumen de venta</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th style="width:50%">Subtotal:</th>
                                        <td>Bs. <?php echo round($total-$total*0.13,2) ?></td>
                                    </tr>
                                    <tr>
                                        <th>IVA (13%)</th>
                                        <td>Bs. <?php echo round($total*0.13,2) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Envio:</th>
                                        <td>Bs. 0.00</td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>Bs. <?php echo round($total,2) ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            
                            <a href="fpdf/factura.php?id=<?php echo $id ?>" class="float-right btn btn-primary">
                                    <i class="fas fa-print"></i>
                                    Generar Factura
                            </a>
                           
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.card -->


<!-- /.content -->

<?php

    require_once 'templates/footer.php';

?>