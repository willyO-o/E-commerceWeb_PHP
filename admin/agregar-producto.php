<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';

    require_once 'modelos/Marca.php';
    require_once 'modelos/Categoria.php';

    $ob_marca=Marca::ningunDato();
    $res_marca=$ob_marca->todasMarcas();

    $ob_categoria=Categoria::nungunDato();
    $res_categoria=$ob_categoria->selectCategoria();

    
    

?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->



<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-8">
                <h1>Agregar Producto <br>
                    <small class="text-muted"> (llena el formulario para Agregar un producto)</small>
                </h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->


    <div class="row">

        <div class="col-md-8 col-sm-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Agregar Producto </h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form role="form" id="registrar-producto" method="POST" action="procesos/procesar-producto.php"
                    enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="producto">Nombre Producto</label>
                            <input name="producto" type="text" class="form-control" placeholder="Producto" required>
                        </div>

                        <div class="form-group">
                            <label for="imagen">Subir imagen pricipal</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="imagen" type="file" class="custom-file-input" required>
                                    <label class="custom-file-label" for="imagen">Buscar imagen</label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <textarea name="descripcion" rows="5" class="form-control" placeholder="Descripcion"
                                required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="caracteristicas">Caracteristicas</label>
                            <textarea name="caracteristicas" rows="10" class="form-control"
                                placeholder="Caracteristicas" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="stock">Cantidad en Stock</label>
                            <input name="stock" type="number" class="form-control" min="0" placeholder="Stock" required>
                        </div>

                        <div class="form-group">
                            <label for="stock_minimo">Cantidad minima de Stock </label>
                            <input name="stock_minimo" type="number" class="form-control" min="0"
                                placeholder="Stock minimo" required>
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio de Venta <small>(solo numero) $us.</small></label>
                            <input name="precio" type="number" class="form-control" min="0" step="0.01"
                                placeholder="por ejemplo 100.50" required>
                        </div>

                        <div class="form-group">
                            <label for="garantia">Tiempo de garantia</label>
                            <input name="garantia" type="text" class="form-control" min="0"
                                placeholder="Por ejemplo: 2 años" required>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="marca">Seleccione Marca</label>
                                    <select name="marca" id="" class="form-control">
                                        <option value="0" selected>
                                            <-- Seleccione -->
                                        </option>
                                        <?php
                        while ($row_marca=$res_marca->fetch_assoc()) { ?>

                                        <option value="<?php echo $row_marca['id_marca']; ?>">
                                            <?php echo $row_marca['marca']; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                <label for="garantia">Seleccione categoria</label>
                            <select name="categoria" id="" class="form-control">
                                <option value="0" selected>
                                    <-- Seleccione -->
                                </option>
                                <?php
                        while ($row_categoria=$res_categoria->fetch_assoc()) { ?>

                                <option value="<?php echo $row_categoria['id_categoria']; ?>">
                                    <?php echo $row_categoria['categoria'] ;?></option>

                                <?php } ?>
                            </select>
                                </div>
                            </div>
                        </div>

               

                        <h4>Imagenes Secundarias </h4>
                        <div class="form-group">
                            <label for="imagen1">Subir 2da imagen</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="imagen1" type="file" class="custom-file-input" required>
                                    <label class="custom-file-label" for="imagen">Buscar imagen</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="imagen2">Subir 3da imagen</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="imagen2" type="file" class="custom-file-input" required>
                                    <label class="custom-file-label" for="imagen">Buscar imagen</label>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="imagen3">Subir 4da imagen</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="imagen3" type="file" class="custom-file-input" required>
                                    <label class="custom-file-label" for="imagen">Buscar imagen</label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="accion" value="registrar">
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        <a href="ver-productos.php" class="btn btn-danger">Cancelar</a>
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