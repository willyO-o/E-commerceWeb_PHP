<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';

?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->

<?php
 
    include 'modelos/Categoria.php';

    $categoria=Categoria::nungunDato();

    $res=$categoria->selectCategoria();

  

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Lista de Categorias</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="row">
        <div class="col-xl-10 col-sm-12">
            <div class="card ">
                <div class="card-header d-flex bd-highlight ">
                    <h3 class="card-title p-2 flex-grow-1 bd-highlight">Tabla de datos de las Categorias de los
                        productos</h3>

                    <button type="button" class="btn btn-success p-2 bd-highlight" data-toggle="modal"
                        data-target="#modal-agregar-categoria">
                        <i class="fas fa-plus"></i>
                        Agregar Nueva Categoria
                    </button>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive ">
                    <table id="example1" class="table table-bordered table-striped  tabla-crud-categorias">
                        <thead>
                            <tr>
                                <th>Categoria</th>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>


                            <?php 
                    if ($res) {
                        
                        while ($row = $res->fetch_assoc()) {
                    ?>
                            <tr>

                                <td><?php echo $row['categoria'] ;?></td>
                                <td><?php echo $row['descripcion'] ;?></td>

                                <td>
                                    <a href="#" class="btn bg-orange  btn-editar-categoria" data-toggle="modal"
                                        data-target="#modal-editar-categoria" 
                                        data-id="<?php echo $row['id_categoria'] ;?>"
                                    >
                                        <i class="fas fa-pen text-light "></i>
                                    </a>
                                    <a href="#" data-id="<?php echo $row['id_categoria'] ;?>" data-tipo="categoria"
                                        class="btn bg-maroon borrar-registro">
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
                                <th>Categoria</th>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>







    <!-- modal agregar catgoria-->
    <div class="modal fade hide" id="modal-agregar-categoria">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Nueva Categoria</h4>
                    <button type="button" class="close cancelar-agregar-categoria" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="procesos/procesar-categoria.php" method="POST" id="agregar-categoria">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <input type="text" class="form-control" id="categoria" name="categoria" required
                                    placeholder="Categoria">
                            </div>
                            <div class="hidden" id="errorNombre" role="alert"></div>

                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required
                                    placeholder="Descripcion de la categoria">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <input type="hidden" name="accion" value="registrar">

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger cancelar-agregar-categoria" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="botonRegistrar">Agregar Categoria</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>



    <!-- modal editar catgoria-->
    <div class="modal fade hide" id="modal-editar-categoria">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Categoria</h4>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="procesos/procesar-categoria.php" method="POST" id="editar-categoria">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <input type="text" class="form-control" id="categoria" name="categoria" required
                                    placeholder="Categoria" value="">
                            </div>
                            <div class="hidden" id="errorNombre" role="alert"></div>

                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" required
                                    placeholder="Descripcion de la categoria" value="">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <input type="hidden" name="accion" value="actualizar">
                        <input type="hidden" name="id" value="" id="id_categoria">

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" id="botonRegistrar">Guardar
                                Cambios</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.card-footer-->
    </div>





    <!-- modal editar catgoria-->

    <!-- /.card -->

</section>
<!-- /.content -->



<?php
    
    require_once 'templates/footer.php';

?>