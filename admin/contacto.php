<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';

?>
<!-- /.navbar -->
<?php

    require_once 'modelos/Cliente.php';

    $ob_contacto=Cliente::ningunDato();

    $res=$ob_contacto->selectContacto();
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Contacto Inbox</h1>
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de los mensajes</h3>


        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Inbox</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control" placeholder="Search Mail" disabled>
                                    <div class="input-group-append">
                                        <div class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                        class="far fa-square"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm" disabled><i
                                            class="far fa-trash-alt"></i></button>
                                    <button type="button" class="btn btn-default btn-sm" disabled><i
                                            class="fas fa-reply"></i></button>
                                    <button type="button" class="btn btn-default btn-sm" disabled><i
                                            class="fas fa-share"></i></button>
                                </div>
                                <!-- /.btn-group -->
                                <button type="button" class="btn btn-default btn-sm"><i
                                        class="fas fa-sync-alt"></i></button>
                                <div class="float-right">
                                    1-5/<?php echo mysqli_num_rows($res) ?>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm"><i
                                                class="fas fa-chevron-left"></i></button>
                                        <button type="button" class="btn btn-default btn-sm"><i
                                                class="fas fa-chevron-right"></i></button>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.float-right -->
                            </div>
                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <tbody>

                                    <?php
                                        $contador=1;
                                            while ($row=$res->fetch_assoc()) {      
                                    ?>


                                        <tr>
                                            <td>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" value="" id="check<?php echo $contador ?>">
                                                    <label for="check<?php echo $contador ?>"></label>
                                                </div>
                                            </td>
                                            <?php $contador++ ?>
                                            <td class="mailbox-name"><a href="read-mail.php?id=<?php echo $row['id_contacto'] ?>"><?php echo $row['nombre_contacto'] ?></a></td>
                                            <td class="mailbox-subject">
                                                <?php echo substr($row['mensaje_contacto'],0,20)."..." ?>
                                            </td>
                                            
                                            <td class="mailbox-date"><?php echo date("d/m/Y h:i:s", strtotime($row['fecha_contacto'])) ?></td>
                                        </tr>
                                    <?php  }?>
                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer p-0">
                            <div class="mailbox-controls">
                                <!-- Check all button -->
                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i
                                        class="far fa-square"></i>
                                </button>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm" disabled><i
                                            class="far fa-trash-alt" ></i></button>
                                    <button type="button" class="btn btn-default btn-sm" disabled><i
                                            class="fas fa-reply"></i></button>
                                    <button type="button" class="btn btn-default btn-sm" disabled><i
                                            class="fas fa-share"></i></button>
                                </div>
                                <!-- /.btn-group -->
                                <button type="button" class="btn btn-default btn-sm"><i
                                        class="fas fa-sync-alt"></i></button>
                                <div class="float-right">
                                    1-5/<?php echo mysqli_num_rows($res) ?>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm"><i
                                                class="fas fa-chevron-left"></i></button>
                                        <button type="button" class="btn btn-default btn-sm"><i
                                                class="fas fa-chevron-right"></i></button>
                                    </div>
                                    <!-- /.btn-group -->
                                </div>
                                <!-- /.float-right -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
    </div>



    <!-- /.card-body -->
   

    <!-- /.card -->

</section>
<!-- /.content -->

<?php

    require_once 'templates/footer.php';

?>