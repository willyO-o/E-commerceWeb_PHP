<?php 

	require_once 'inc/layout/header.php';
	require_once 'inc/layout/navegacion.php';



           
    
   

    //var_dump($_SESSION);
	
?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-6">
                <h3 class="breadcrumb-header">Ver Carrtio de Compras</h3>

            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-12">
                <div class="table-responsive">
                    <h2 > <span class="titulo-ver-carrito"><?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : '0' ?></span> Articulo(s) en tu carrito</h2>
                    <hr>
                    <table class="table" id="ver-carrito">
                        <thead>
                            <tr>

                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio Bs. (Unidad)</th>
                                <th scope="col">Quitar</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                            $suma_total=0;
                            
                            if (isset($_SESSION['carrito'])) { 
                            $carrito=$_SESSION['carrito'];
                            foreach ($carrito as $row_car) {
                                $suma_total+=$row_car['precio_venta']*$row_car['cantidad'];
                                ?>

                            <tr>
                        
                                <td>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <div class="product-img" style="width:8rem">
                                                <img src="./img/productos/<?php echo $row_car['imagen'] ; ?>"
                                                    alt="producto" style="width:100%">
                                            </div>

                                        </div>
                                        <div class="col-xs-9">
                                            <h5 class="product-name"  ><a
                                                    href="producto.php?id_producto=<?php echo $row_car['id_producto'] ; ?>"><?php echo $row_car['producto'] ; ?></a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="qty-label "  >

                                        <div class="" >
                                            <input class="input-ver-carrito" type="number" min="1" max="<?php echo $row_car['stock'] ; ?>"  value="<?php echo $row_car['cantidad'] ; ?>"
                                                producto-id="<?php echo $row_car['id_producto'] ; ?>">

                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <h4  class="ver-carrito-producto-precio-venta" producto-id="<?php echo $row_car['id_producto'] ; ?>"><span><?php echo $row_car['precio_venta'] ; ?></span></h4>
                                </td>
                                <td>
                                    <h3><button class="btn eliminar-ver-carrito" producto-id="<?php echo $row_car['id_producto'] ; ?>"><i class="fa fa-close" aria-hidden="true"></i></button></h3>
                                </td>
                            </tr>

                            <?php
                            }
                        }?>


                        </tbody>
                    </table>
                </div>
                <hr>
                <div class=" row">
                    <div class="col-xs-8"></div>
                    <div class="col-xs-4">
                        <h2>TOTAL: <span class="suma-total"><?php echo $suma_total ?></span> Bs.</h2>
                    </div>
                </div>
                <hr>
                <div class=" row">
                    <div class="col-xs-3">
                        <a class=" btn btn-success" href="tienda.php">Seguir Comprando  </a>
                    </div>
                    <div class="col-xs-6"></div>
                    <div class="col-xs-3">
                        <a class="btn primary-btn <?php echo $suma_total==0 ? "disabled": '' ?>" href="pedido.php" id="btn-pedido-ver-carrito">Realizar  Pedido</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<?php 
	require_once 'inc/layout/footer.php';
?>