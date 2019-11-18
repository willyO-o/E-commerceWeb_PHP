<?php 

	require_once 'inc/layout/header.php';
	require_once 'inc/layout/navegacion.php';
	require_once 'admin/modelos/Producto.php';

	if(isset($_POST['buscar'])){
		$categoria= filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);
		$buscar= filter_var($_POST['buscar'], FILTER_SANITIZE_STRING);
	}else{
		$categoria=1;
		$buscar="";
	}

	$ob_prod=Producto::ningunDato();

    $res=$ob_prod->buscarProducto($buscar,$categoria);
    
    

           
    
   

    //var_dump($_SESSION);
	
?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Resultados de la busqueda</h3>

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
            <?php 
            if(mysqli_num_rows($res)>0){
				echo "<h3>Se obtuvieron ".mysqli_num_rows($res)." resultados:</h3>";
            while ($row_prod_cat=$res->fetch_assoc()) {?>
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="./img/productos/<?php echo $row_prod_cat['imagen'] ; ?>" alt="producto">
                    </div>
                    <div class="product-body">
                        <p class="product-category"><?php echo $row_prod_cat['categoria'] ; ?></p>
                        <h3 class="product-name"><a
                                href="producto.php?id_producto=<?php echo $row_prod_cat['id_producto'] ; ?>"><?php echo $row_prod_cat['producto'] ; ?></a>
                        </h3>
                        <h4 class="product-price"><?php echo $row_prod_cat['precio_venta'] ; ?> $us.</h4>
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
						echo "<h3>No Se Obtuvieron Resultados para la busqueda: ".$buscar." </h3>";
					}
			?>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<?php 
	require_once 'inc/layout/footer.php';
?>