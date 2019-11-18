<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';

?>

<?php  
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        require_once 'modelos/Cliente.php';
        $id=$_GET['id'];

        $ob_cliente=Cliente::ningunDato();

        $res=($ob_cliente->selectContactoId($id))->fetch_assoc();

    }
?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->



<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Leer Mensaje</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Title</h3>


        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Leer Mensaje de contacto </h3>

                            <div class="card-tools">
                                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i
                                        class="fas fa-chevron-left"></i></a>
                                <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i
                                        class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="mailbox-read-info">
                                <h5>Remitente: <?php echo $res['nombre_contacto']  ?></h5>
                                <h6>Correo: <?php echo $res['email_contacto']  ?>
                                    <span class="mailbox-read-time float-right"><?php echo $res['fecha_contacto']  ?></span></h6>
                            </div>
                            <!-- /.mailbox-read-info -->
                            <div class="mailbox-controls with-border text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                                        data-container="body" title="Delete">
                                        <i class="far fa-trash-alt"></i></button>
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                                        data-container="body" title="Reply">
                                        <i class="fas fa-reply"></i></button>
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                                        data-container="body" title="Forward">
                                        <i class="fas fa-share"></i></button>
                                </div>
                                <!-- /.btn-group -->
                                <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip"
                                    title="Print">
                                    <i class="fas fa-print"></i></button>
                            </div>
                            <!-- /.mailbox-controls -->
                            <div class="mailbox-read-message">

                                <p>
                                <?php echo $res['mensaje_contacto']  ?>
                                </p>
                            </div>
                            <!-- /.mailbox-read-message -->
                        </div>
                        <!-- /.card-body -->
                     
                        <!-- /.card-footer -->
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="button" class="btn btn-default"><i class="fas fa-reply"></i>
                                    Atras</button>
                                <button type="button" class="btn btn-default"><i class="fas fa-share"></i>
                                    Adelante</button>
                            </div>
                            <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i>
                                Borrar</button>
                            <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Imprimir</button>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </div>



    <!-- /.card-body -->
    <div class="card-footer">
        Footer
    </div>

    <!-- /.card -->

</section>
<!-- /.content -->

<?php

    require_once 'templates/footer.php';

?>