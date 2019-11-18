<?php 
    
	include 'admin/modelos/Categoria.php';

	$category=Categoria::nungunDato();

	$result_categoria=$category->selectCategoria();
	

?>

<!-- /TOP HEADER -->

<!-- MAIN HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class="col-md-3">
                <div class="header-logo">
                    <a href="index.php" class="logo">
                        <img src="./img/logo.png" alt="logotipo">
                    </a>
                </div>
            </div>
            <!-- /LOGO -->

            <!-- SEARCH BAR -->
            <div class="col-md-6">
                <div class="header-search">
                    <form action="search.php" id="buscador-por-categoria" method="POST">
                        <select class="input-select" name="categoria">
                            <option value="0">Categorias</option>
                            <?php  	while ($row_category= $result_categoria->fetch_assoc()) {  ?>
                            <option value="<?php echo $row_category['id_categoria']?>">
                                <?php echo $row_category['categoria']?></option>
                            <?php  } ?>

                        </select>
                        <input class="input" name="buscar" id="buscar" value="" placeholder="Buscar Producto" required>
                        <button class="search-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <!-- /SEARCH BAR -->

            <!-- ACCOUNT -->
            <div class="col-md-3 clearfix">
                <div class="header-ctn">
                    <!-- Wishlist -->
                    <div class="menu-toggle">
                        <a href="#">
                            <i class="fa fa-bars"></i>
                            <span>Menu</span>
                        </a>
                    </div>
                    <!-- /Wishlist -->


                    <?php  
                        $num_item=0;
                        if (isset($_SESSION['carrito'])) {
                            
                            foreach ($_SESSION['carrito'] as $row_carrito1) {
                                $num_item+=$row_carrito1['cantidad'];
                            }
                        }
                        
                    ?>
                    <!-- Cart -->
                    <div class="dropdown ">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <i class="fa fa-shopping-cart"></i>
                            <span>Your Cart</span>
                            <div class="qty  qty-items"><?php echo $num_item ?></div>
                        </a>


                        <div class="cart-dropdown  carta-de-carrito">
                            <div id="mi-carrito-lista" class="cart-list ">


                                <?php   


                                if (isset($_SESSION['carrito'])) {
                                    $contador=0;
                                    $total=0;
                                    foreach ($_SESSION['carrito'] as $row_carrito) {
                                ?>
                                <div class="product-widget">
                                    <div class="product-img">
                                        <img src="./img/productos/<?php echo $row_carrito['imagen']?>" alt="">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name">
                                            <a
                                                href="producto.php?id_producto=<?php echo $row_carrito['id_producto']?>"><?php echo $row_carrito['producto']?></a>
                                        </h3>
                                        <h4 class="product-price"><span class="qty "
                                                producto-id="<?php echo $row_carrito['id_producto']?>"><?php echo$row_carrito['cantidad'] ?></span><span
                                                class="qty">x</span> <?php echo $row_carrito['precio_venta'] ?> Bs.
                                        </h4>
                                    </div>
                                    <button class="delete delete-producto-carrito"
                                        producto-id="<?php echo $row_carrito['id_producto'] ?>"><i
                                            class="fa fa-close"></i></button>
                                </div>



                                <?php 
                                    $total += $row_carrito['precio_venta']*$row_carrito['cantidad'];
                                    $contador+=$row_carrito['cantidad'];
                                } 
                            }
                                ?>

                            </div>

                            <?php if (isset($_SESSION['carrito'])) { ?>
                            <div class="cart-summary">
                                <small><span class=" contador-prod"><?php echo $contador ?></span> Item(s)
                                    seleccionados</small>
                                <h5>SUBTOTAL: <span id="total-pagar"><?php echo $total ?></span> Bs.</h5>
                            </div>
                            <div class="cart-btns">
                                <a href="ver-carrito.php">Ver Carrito</a>
                                <a href="pedido.php">Pedido <i class="fa fa-arrow-circle-right"></i></a>
                            </div>

                            <?php 
                            }else{
                                echo "<h3 class=\"sin-producto\">No Tienes Productos Seleccionados</h3>";
                            }
                            
                            ?>
                        </div>
                    </div>
                    <!-- /Cart -->

                    <!-- Menu Toogle -->

                    <!-- /Menu Toogle -->
                </div>
            </div>
            <!-- /ACCOUNT -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</div>
<!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="tienda.php">Tienda</a></li>
                <li><a href="laptops.php">Laptops</a></li>
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="contacto.php">Contacto</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2 class="modal-title text-center">Iniciar Sesion</h2>
            </div>
            <form action="admin/procesos/procesar-cliente.php" method="POST" id="login-ingresar">
                <div class="modal-body">

                    <div class="form-group">
                        <div class="col-8">
                            <label for="recipient-name" class="col-form-label"><i class="fa fa-user"></i> Correo
                                :</label>
                            <input type="text" name="usuario" class="form-control" id="recipient-name"
                                placeholder="Por ejemplo:  correo@dominio.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label"><i class="fa fa-lock"></i> Password:</label>
                        <input type="password" name="password" class="form-control" id="message-text"
                            placeholder="********">
                    </div>
                    <input type="hidden" name="accion" value="ingresar">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>