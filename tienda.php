<?php 
	require_once 'inc/layout/header.php';
	require_once 'inc/layout/navegacion.php';
	require_once 'admin/modelos/Categoria.php';
	require_once 'admin/modelos/Marca.php';
	require_once 'admin/modelos/Producto.php';

	$ob_prod=Producto::ningunDato();

	$ob_cat=Categoria::nungunDato();
	$res_cat=$ob_cat->selectCategoriaCantidad();

	$ob_marc=Marca::ningunDato();

	$res_marc=$ob_marc->selectMarcaCantidad();

?>

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Categorias</h3>
                    <div class="checkbox-filter">
                        <div class="input-checkbox">
                            <ul>
                                <?php  while($row_cat=$res_cat->fetch_assoc()){ ?>
                                <li>
                                    <a
                                        href="?id_cat=<?php  echo $row_cat['id_categoria'] ;?>"><?php  echo $row_cat['categoria'] ;?></a>
                                    <small>(<?php  echo $row_cat['cantidad'] ;?>)</small>
                                </li><br>
                                <?php  } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <hr>

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Marcas</h3>
                    <div class="checkbox-filter">
                        <div class="input-checkbox">

                            <ul>
                                <?php  while($row_marc=$res_marc->fetch_assoc()){ ?>
                                <li>
                                    <a
                                        href="?id_marc=<?php  echo $row_marc['id_marca'] ;?>"><?php  echo $row_marc['marca'] ;?></a>
                                    <small>(<?php  echo $row_marc['cantidad'] ;?>)</small>
                                </li><br>
                                <?php  } ?>
                            </ul>
                        </div>

                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->

                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <br>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    <?php if (isset($_GET['id_cat'])) {
					$id_cat=$_GET['id_cat'];

					if(!is_numeric($id_cat)){
						die("ERROR: dato no valido, presione una categoria o marca!!!");
					} 

					$res_prod_cat=$ob_prod->productosCategoria($id_cat);
					

					if(mysqli_num_rows($res_prod_cat)>0){
						while ($row_prod_cat=$res_prod_cat->fetch_assoc()) {?>
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/productos/<?php echo $row_prod_cat['imagen'] ; ?>" alt="producto">
                            </div>
                            <div class="product-body">
                                <p class="product-category"><?php echo $row_prod_cat['categoria'] ; ?></p>
                                <h3 class="product-name"><a
                                        href="producto.php?id_producto=<?php echo $row_prod_cat['id_producto'] ; ?>"><?php echo $row_prod_cat['producto'] ; ?></a>
                                </h3>
                                <h4 class="product-price"><?php echo $row_prod_cat['precio_venta'] ; ?> Bs.</h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">

                                    <button class="quick-view"><a
                                            href="producto.php?id_producto=<?php echo $row_prod_cat['id_producto'] ; ?>"><i
                                                class="fa fa-eye"></i></a><span class="tooltipp">Ver
                                            producto</span></button>

                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button producto-id="<?php echo $row_prod_cat['id_producto'] ; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Añadir al
                                    Carrito</button>
                            </div>
                        </div>
                    </div>
					<div class="clearfix visible-sm visible-xs"></div>
                    <?php 
						}
					}else{
						echo '<h3>No Se Obtuvieron Resultados</h3>';
					}
					
				} else if(isset($_GET['id_marc'])) {
					$id_marc=$_GET['id_marc'];

					if(!is_numeric($id_marc)){
						die("ERROR: dato no valido, presione una categoria o marca!!!");
					} 

					$res_prod_marc=$ob_prod->productosMarca($id_marc);
				
					

					if(mysqli_num_rows($res_prod_marc)>0){
						while ($row_prod_marc=$res_prod_marc->fetch_assoc()) {?>

                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/productos/<?php echo $row_prod_marc['imagen'] ; ?>" alt="producto">
                            </div>
                            <div class="product-body">
                                <p class="product-category"><?php echo $row_prod_marc['marca'] ; ?></p>
                                <h3 class="product-name"><a
                                        href="producto.php?id_producto=<?php echo $row_prod_marc['id_producto'] ; ?>"><?php echo $row_prod_marc['producto'] ; ?></a>
                                </h3>
                                <h4 class="product-price"><?php echo $row_prod_marc['precio_venta'] ; ?> Bs.</h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">

                                    <button class="quick-view"><a
                                            href="producto.php?id_producto=<?php echo $row_prod_marc['id_producto'] ; ?>"><i
                                                class="fa fa-eye"></i></a><span class="tooltipp">Ver
                                            producto</span></button>

                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button producto-id="<?php echo $row_prod_marc['id_producto'] ; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Añadir al
                                    Carrito</button>
                            </div>
                        </div>
                    </div>
					<div class="clearfix visible-sm visible-xs"></div>
                    <?php }
					}else{
						echo '<h3>No Se Obtuvieron Resultados</h3>';

						}
						
				}else{
					$res_prod=$ob_prod->selectProducto();
					while ($row_prod=$res_prod->fetch_assoc()) {?>

                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img" >
                                <img src="./img/productos/<?php echo $row_prod['imagen'] ; ?>" alt="producto">
                            </div>
                            <div class="product-body">
                                <p class="product-category"><?php echo $row_prod['marca'] ; ?></p>
                                <h3 class="product-name"><a
                                        href="producto.php?id_producto=<?php echo $row_prod['id_producto'] ; ?>"><?php echo $row_prod['producto'] ; ?></a>
                                </h3>
                                <h4 class="product-price"><?php echo $row_prod['precio_venta'] ; ?> Bs.</h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">

                                    <button class="quick-view"><a
                                            href="producto.php?id_producto=<?php echo $row_prod['id_producto'] ; ?>"><i
                                                class="fa fa-eye"></i></a><span class="tooltipp">Ver
                                            producto</span></button>

                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button producto-id="<?php echo $row_prod['id_producto'] ; ?>" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Añadir al
                                    Carrito</button>
                            </div>
                        </div>
                    </div>
					<div class="clearfix visible-sm visible-xs"></div>

                    <?php	}

				}
				 ?>
                    <!-- product -->
                    <!-- /product -->

                    <div class="clearfix visible-sm visible-xs"></div>


                    <!-- /product -->
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Mostrando todos los productos</span>
                    <!-- <ul class="store-pagination">
                        <li class="active">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul> -->
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<?php 
	require_once 'inc/layout/footer.php';
?>