<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';

    

    if (isset($_GET['accion'])) {
      if ($_GET['accion']=='editar') {
          if (!filter_var($_GET['id_prod'], FILTER_VALIDATE_INT)) {
              die('Error: no valido');
          }

          require_once 'modelos/Marca.php';
          require_once 'modelos/Categoria.php';
          require_once 'modelos/Producto.php';

          $id= filter_var($_GET['id_prod'], FILTER_SANITIZE_STRING);

          $ob_marca=Marca::ningunDato();
          $res_marca=$ob_marca->todasMarcas();

          $ob_categoria=Categoria::nungunDato();
          $res_categoria=$ob_categoria->selectCategoria();

          $ob_producto=Producto::soloId($id);
          $res_pro=($ob_producto->datosProducto())->fetch_assoc();

         
      }else{
        header('location: ver-productos.php');
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
                <h1>Editar Producto <br>
                    <small class="text-muted"> (llena el formulario para Editar un producto)</small>
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
                <h3 class="card-title">Editar Producto </h3>
              </div>
              <!-- /.card-header -->
              
              <!-- form start -->
              <form role="form" id="editar-producto" method="POST" action="procesos/procesar-producto.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="producto">Nombre Producto</label>
                    <input name="producto" type="text" class="form-control"  placeholder="Producto" required value="<?php echo $res_pro['producto'] ;?>">
                  </div>
                  
                  <div class="form-group">
                    <label for="imagen">Cambiar imagen pricipal</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="imagen" type="file" class="custom-file-input" >
                        <label class="custom-file-label" for="imagen">Buscar imagen</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="imagen">Imagen principal actual</label> <br>
                      <img src="../img/productos/<?php echo $res_pro['imagen'] ;?>" width="150" height="150">
                  </div>


                  <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion"   rows="5" class="form-control" placeholder="Descripcion" required> <?php echo $res_pro['descripcion_prod'] ;?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="caracteristicas">Caracteristicas</label>
                    <textarea name="caracteristicas"   rows="10" class="form-control" placeholder="Caracteristicas" required ><?php echo $res_pro['caracteristicas_prod'] ;?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="stock">Cantidad en Stock</label>
                    <input name="stock" type="number" class="form-control" min="0" placeholder="Stock" required value="<?php echo $res_pro['stock'] ;?>">
                  </div>

                  <div class="form-group">
                    <label for="stock_minimo">Cantidad minima de Stock </label>
                    <input name="stock_minimo" type="number" class="form-control"  min="0" placeholder="Stock minimo" required value="<?php echo $res_pro['stock_minimo'] ;?>">
                  </div>

                  <div class="form-group">
                    <label for="precio">Precio de Venta <small>(solo numero) $us.</small></label>
                    <input name="precio" type="number" class="form-control"  min="0" step="0.01"placeholder="por ejemplo 100.50" required value="<?php echo $res_pro['precio_venta'] ;?>">
                  </div>

                  <div class="form-group">
                    <label for="garantia">Tiempo de garantia</label>
                    <input name="garantia" type="text" class="form-control"  min="0" placeholder="Por ejemplo: 2 años" required value="<?php echo $res_pro['garantia'] ;?>">
                  </div>

                  <div class="form-group">
                    <label for="garantia">Seleccione Marca</label>
                    <select name="marca" id="" class="form-control">
                        <option value="0" ><-- Seleccione --> </option>
                        <?php
                        while ($row_marca=$res_marca->fetch_assoc()) { ?>

                            <option value="<?php echo $row_marca['id_marca']; ?>" <?php echo $res_pro['id_marca'] == ($row_marca['id_marca']) ? 'selected' : '' ;?> ><?php echo $row_marca['marca']; ?></option>
                        
                        <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="garantia">Seleccione categoria</label>
                    <select name="categoria" id="" class="form-control">
                        <option value="0" ><-- Seleccione --> </option>
                      <?php
                        while ($row_categoria=$res_categoria->fetch_assoc()) { ?>

                          <option value="<?php echo $row_categoria['id_categoria']; ?>" <?php echo $res_pro['id_categoria'] == ($row_categoria['id_categoria']) ? 'selected' : '' ;?> ><?php echo $row_categoria['categoria'] ;?></option>
                        
                      <?php } ?>
                    </select>
                  </div>

                  <h4>Imagenes Secundarias <small>(opcional)</small></h4>
                  <div class="form-group">
                    <label for="imagen1">Cambiar 2da imagen</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="imagen1" type="file" class="custom-file-input"  >
                        <label class="custom-file-label" for="imagen">Buscar imagen</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="imagen">2da imagen actual</label> <br>
                      <img src="../img/productos/<?php echo  $res_pro['imagen1']!='' ? $res_pro['imagen1'] : 'sin-imagen.jpg'  ;?>" width="150"   alt=" no hay imagen">
                  </div>

                  <div class="form-group">
                    <label for="imagen2">Cambiar 3da imagen</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="imagen2" type="file" class="custom-file-input"  >
                        <label class="custom-file-label" for="imagen">Buscar imagen</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="imagen">3da imagen actual</label> <br>
                      <img src="../img/productos/<?php echo  $res_pro['imagen2']!='' ? $res_pro['imagen2'] : 'sin-imagen.jpg'  ;?>" width="150"  alt=" no hay imagen">
                  </div>

                  </div>
                  <div class="form-group">
                    <label for="imagen3">Cambiar 4da imagen</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="imagen3" type="file" class="custom-file-input"  >
                        <label class="custom-file-label" for="imagen">Buscar imagen</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="imagen">4ta imagen actual</label> <br>
                      <img src="../img/productos/<?php echo  $res_pro['imagen3']!='' ? $res_pro['imagen3'] : 'sin-imagen.jpg'  ;?>" width="150"  alt=" no hay imagen">
                  </div>
                
                <input type="hidden" name="accion" value="actualizar">
                <input type="hidden" name="id" value="<?php echo $res_pro['id_producto']; ?>">
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