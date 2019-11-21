<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';

    require_once 'modelos/Venta.php';

    $ob_venta=Venta::ningunDato();
    $cantidad_venta=$ob_venta->selectCantidades('venta');
    $cantidad_cliente=$ob_venta->selectCantidades('cliente');
    $cantidad_pedidos=$ob_venta->selectCantidades('pedido');
    $cantidad_contacto=$ob_venta->selectCantidades('contacto');

    //echo $cantidad_cliente;

?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->



<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Panel de Control</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Resumen de transacciones</h3>


        </div>


        

        <div class="card-body">

        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $cantidad_venta ?></h3>

                <p>Total Ventas</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="crud-ventas.php" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $cantidad_pedidos ?></h3>

                <p>Total Pedidos</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
              <a href="crud-pedidos.php" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $cantidad_cliente ?></h3>

                <p>Total Clientes</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="ver-usuarios.php" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $cantidad_contacto ?></h3>

                <p>Total Mensajes</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-email"></i>
              </div>
              <a href="contacto.php" class="small-box-footer">Mas informacion <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <hr>
        
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Estadisticas de Ventas</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="lineChart" style="height:250px; min-height:250px"></canvas>
                    </div>
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