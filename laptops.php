<?php 
	require_once 'inc/layout/header.php';
    require_once 'inc/layout/navegacion.php';
    
	require_once 'admin/modelos/Marca.php';
    require_once 'admin/modelos/Producto.php';
    
    $ob_prod=Producto::ningunDato();
    if (isset($_GET['id_marc']) && is_numeric($_GET['id_marc'])) {
        $id=$_GET['id_marc'];
        $res_prod_marc=$ob_prod->selectLaptopsMarca($id);

    }else{
        $res_prod_marc=$ob_prod->selectLaptops();
    }

	$ob_marc=Marca::ningunDato();

	$res_marc=$ob_marc->selectMarcaCantidadLaptop();

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

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Laptops por Marca</h3>
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
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sort By:
                            <select class="input-select">
                                <option value="0">Popular</option>
                                <option value="1">Position</option>
                            </select>
                        </label>

                        <label>
                            Show:
                            <select class="input-select">
                                <option value="0">20</option>
                                <option value="1">50</option>
                            </select>
                        </label>
                    </div>
                    <ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                    </ul>
                </div>
                <!-- /store top filter -->
                                    
                <!-- store products -->
                <div class="row">
                    <?php
					if(mysqli_num_rows($res_prod_marc)>0){
						while ($row_prod_cat=$res_prod_marc->fetch_assoc()) {?>
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
					?>

					
				
			
                    <!-- product -->
                    <!-- /product -->

                    <div class="clearfix visible-sm visible-xs"></div>


                    <!-- /product -->
                </div>
                <!-- /store products -->

                    <?php  if(mysqli_num_rows($res_prod_marc)>0){?>
                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Showing 20-100 products</span>
                    <ul class="store-pagination">
                        <li class="active">1</li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </div>

                    <?php } ?>
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