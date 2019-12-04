<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';

?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->

<?php
 
    include 'modelos/Producto.php';

    $ob_prod= Producto::ningunDato();

    $res=$ob_prod->stockBajo();

    $res2=$ob_prod->selectProducto();
    

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Productos con Stock bajo</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card ">
        <div class="card-header">
            <h3 class="card-title">Lista de los Productos con poco Stock</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="example1" class="table table-bordered table-striped  tabla-ver-productos">
                <thead>
                    <tr>

                        <th>producto</th>
                        <th>Imagen</th>
                        <th>Stock</th>
                        <th>Stock Minimo</th>
                        <th>Precio $us.</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>


                    <?php 
                    if ($res) {
                        
                        while ($row = $res->fetch_assoc()) {
                    ?>
                    <tr>

                        <td><?php echo $row['producto'] ;?></td>
                        <td><img src="../img/productos/<?php echo $row['imagen'] ;?>" width="100" height="100"></td>
                        <td><span class=" badge badge-danger"><?php echo $row['stock'] ;?></span></td>
                        <td><?php echo $row['stock_minimo'] ;?></td>
                        <td><?php echo $row['precio_venta'] ;?></td>
                        <td>

                            <a href="#" data-id="<?php echo $row['id_producto'] ;?>" data-toggle="modal"
                                data-target="#modal-stock" data-whatever="@getbootstrap" data-tipo="producto"
                                class="btn bg-info btn-agregar-stock">
                                <i class=" fas fa-plus"></i> Add
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

                        <th>producto</th>
                        <th>Imagen</th>
                        <th>Stock</th>
                        <th>Stock Minimo</th>
                        <th>Precio $us.</th>
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
<div class="modal fade" id="modal-stock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Añadir Stock</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="procesos/procesar-producto.php" id="formulario-actualizar-stock" method="POST">



                <div class="modal-body">

                    <div class="card-body cont-producto">
                        <dl>
                            <dt>Description lists</dt>
                            <dd>A description list is perfect for defining terms.</dd>
                            <dt>Euismod</dt>
                            <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                            <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                            <dt>Malesuada porta</dt>
                            <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                        </dl>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Cantidad:</label>
                        <input type="number" name="cantidad" min="1" max="99" class="form-control" id="modal-cantidad-stock" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="hidden" name="accion" value="add-stock">
                    <input type="hidden" name="id" value="" id="id-producto">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar al Stock</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    
    require_once 'templates/footer.php';

?>