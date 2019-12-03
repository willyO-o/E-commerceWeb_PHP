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
    
    if (isset($_GET['id_cat'])) {
        $id_cat=$_GET['id_cat'];

        if(!is_numeric($id_cat)){
            die("ERROR: dato no valido!!!");
        } 
        $res_prod=$ob_prod->productosCategoria($id_cat);  

    } else if(isset($_GET['id_marc'])) {
        $id_marc=$_GET['id_marc'];

        if(!is_numeric($id_marc)){
            die("ERROR: dato no valido!!!");
        } 
        $res_prod=$ob_prod->productosMarca($id_marc);

    }else{
        $res_prod=$ob_prod->selectProducto();
    }

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
                    <!-- product -->
                    <?php if(mysqli_num_rows($res_prod)>0){
						while ($row=$res_prod->fetch_assoc()) {?>
                    <div class="col-md-4 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                <img src="./img/productos/<?php echo $row['imagen'] ; ?>" alt="producto">
                            </div>
                            <div class="product-body">
                                <p class="product-category"><?php echo $row['categoria'] ; ?></p>
                                <h3 class="product-name"><a
                                        href="producto.php?id_producto=<?php echo $row['id_producto'] ; ?>"><?php echo $row['producto'] ; ?></a>
                                </h3>
                                <h4 class="product-price"><?php echo $row['precio_venta'] ; ?> Bs.</h4>
                                <div class="product-rating">
                                    <?php 
										$productos=Producto::soloId($row['id_producto']);
										$califi=($productos->selectCalificacion())->fetch_assoc(); 
											for ($i=0; $i <5 ; $i++) { 
												if ($i<$califi['calificacion']) { ?>

                                                <i class="fa fa-star"></i>
                                        <?php   }else{ ?>
                                                    <i class="fa fa-star-o "></i>
                                    <?php	    }
													}
												?>
                                </div>
                                <div class="product-btns">

                                    <button class="quick-view"><a
                                            href="producto.php?id_producto=<?php echo $row['id_producto'] ; ?>"><i
                                                class="fa fa-eye"></i></a><span class="tooltipp">Ver
                                            producto</span></button>

                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button producto-id="<?php echo $row['id_producto'] ; ?>" class="add-to-cart-btn" <?php echo $row['stock']<1 ?'disabled': ''?>><i
                                        class="fa fa-shopping-cart" ></i> Añadir al
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