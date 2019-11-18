<?php
    require_once 'templates/header.php';
    require_once 'templates/barra.php';
    require_once 'templates/aside.php';

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
            <h3 class="card-title">Title</h3>


        </div>


        

        <div class="card-body">


        
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Line Chart</h3>

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