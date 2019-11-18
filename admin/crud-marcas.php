<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';

?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->

<?php
 
    include 'modelos/Marca.php';

    $marca = Marca::ningunDato();

    $res=$marca->todasMarcas();

  

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lista de Marcas</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="card ">
                <div class="card-header d-flex bd-highlight ">
                    <h3 class="card-title p-2 flex-grow-1 bd-highlight">Tabla de datos de las Marcas de los productos</h3>

                    <button type="button" class="btn btn-success p-2 bd-highlight" data-toggle="modal" data-target="#modal-agregar-marca">
                        <i class="fas fa-plus"></i>
                        Agregar Nueva Marca
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive ">
                    <table id="example1" class="table table-bordered table-striped  tabla-crud-marcas">
                        <thead>
                            <tr>
                                
                                <th>Marca</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                    <?php 
                    if ($res) {
                        
                        while ($row = $res->fetch_assoc()) {
                    ?>
                            <tr>
                                
                                <td><?php echo $row['marca'] ;?></td>

                                <td>
                                    <a href="#"
                                        class="btn bg-orange editar-registro " data-toggle="modal" data-target="#modal-editar-marca" 
                                        data-id="<?php echo $row['id_marca'] ;?>"
                                        data-marca="<?php echo $row['marca'] ;?>"
                                        >
                                        <i class="fas fa-pen text-light "></i>
                                    </a>
                                    <a href="#" data-id="<?php echo $row['id_marca'] ;?>" data-tipo="marca"
                                        class="btn bg-maroon borrar-registro"  >
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
                                
                                <th>Marca</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>



    <!-- modal agregar marca-->
    <div class="modal fade hide" id="modal-agregar-marca">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Agregar Nueva Marca</h4>
              <button type="button" class="close cancelar-agregar-marca" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
 
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="procesos/procesar-marca.php" method="POST" id="agregar-marca">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" required
                                placeholder="Marca">
                        </div>
                        <div class="hidden" id="errorMarca" role="alert"></div>
                    </div>
    
                        <input type="hidden" name="accion" value="registrar_marca">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger cancelar-agregar-marca" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" id="botonRegistrar">Agregar Marca</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!-- modal editar marca -->
    <div class="modal fade hide" id="modal-editar-marca">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Editar Marca</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
 
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="procesos/procesar-marca.php" method="POST" id="editar-marca">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="marca">Marca</label>
                            <input type="text" class="form-control " id="campo_marca" name="marca" required
                                placeholder="Marca" value="">
                        </div>
                        <div class="hidden" id="errorMarca" role="alert"></div>
                    </div>
    
                        <input type="hidden" name="accion" value="editar_marca">
                        <input type="hidden" name="id" value="" id="id_marca">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" id="botonRegistrar">Guardar Cambios</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.card-footer-->

    <!-- /.card -->
   
</section>
<!-- /.content -->



<?php
    
    require_once 'templates/footer.php';

?>