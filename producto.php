<?php 
	require_once 'inc/layout/header.php';
	require_once 'inc/layout/navegacion.php';


	if (isset($_GET['id_producto'])) {
		$id_producto=$_GET['id_producto'];
		require_once 'admin/modelos/Producto.php';
		if (!is_numeric($id_producto)) {
			die('error de id');
		}
		$productos=Producto::soloId($id_producto);
		$res_pr=($productos->selectProductoID())->fetch_assoc();
		$res_resen=$productos->selectResenia();




		$res_rel=$productos->productosRelacionados($res_pr['id_marca'],$res_pr['id_categoria']);

		$resp_resenia=$productos->valorResenia();



	}
	else {
		die('error: No hay un producto definido a buscar');
	}
	



?>
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h2>Ver Producto</h2>
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
            <!-- Product main img -->
            <div class="col-md-5 col-md-push-2">
                <div id="product-main-img">
                    <div class="product-preview">
                        <img src="img/productos/<?php echo $res_pr['imagen'] ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="img/productos/<?php echo $res_pr['imagen1'] ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="img/productos/<?php echo $res_pr['imagen2'] ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="img/productos/<?php echo $res_pr['imagen3'] ?>" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product main img -->

            <!-- Product thumb imgs -->
            <div class="col-md-2  col-md-pull-5">
                <div id="product-imgs">
                    <div class="product-preview">
                        <img src="img/productos/<?php echo $res_pr['imagen'] ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="img/productos/<?php echo $res_pr['imagen1'] ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="img/productos/<?php echo $res_pr['imagen2'] ?>" alt="">
                    </div>

                    <div class="product-preview">
                        <img src="img/productos/<?php echo $res_pr['imagen3'] ?>" alt="">
                    </div>
                </div>
            </div>
            <!-- /Product thumb imgs -->

            <!-- Product details -->
            <div class="col-md-5">
                <div class="product-details">
                    <h2 class="product-name"><?php echo $res_pr['producto'] ?></h2>
                    <div>
                        <div class="product-rating">

                            <?php

                                for ($i=0; $i <5 ; $i++) { 
                                    if ($i<$resp_resenia['promedio']) { 

                                        echo "<i class=\"fa fa-star\"></i>";
                                    }else{
                                        echo "<i class=\"fa fa-star-o \"></i>";
                                    }
                                }
                            ?>

                        </div>
                        <a class="review-link" href="#"><?php echo $resp_resenia['cantidad']?> Reseña(s) </a>
                    </div>
                    <div>
                        <h3 class="product-price"><?php echo $res_pr['precio_venta'] ?> Bs. <del
                                class="product-old-price"><?php echo $res_pr['precio_venta']*1.1 ?> Bs.</del></h3>
                        <span class="product-available"><?php echo $res_pr['stock']>0 ? 'En Stock' : 'Sin Stock' ?>
                            (<?php echo $res_pr['stock']?>)</span>
                    </div>



                    <div class="add-to-cart">
                        <div class="qty-label">
                            Cantidad
                            <div class="input-number">
                                <input type="number" min="1" max="<?php echo $res_pr['stock'] ?>"
                                    class="input-cantidad-producto" value="1" required>
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>

                            </div>
                        </div>
                        <br><br>
                        <button producto-id="<?php echo $res_pr['id_producto'] ; ?>" class="add-to-cart-btn" <?php echo $res_pr['stock']<1 ?'disabled': ''?>><i
                                class="fa fa-shopping-cart"></i> Añadir al Carrito</button>
                    </div>



                    <ul class="product-links">
                        <li>Categoria:</li>
                        <li><a><?php echo $res_pr['categoria'] ?></a></li>
                    </ul>

                    <ul class="product-links">
                        <li>Compartir:</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                    </ul>
                    
                    <span class="product-available" href="#"> Garantia: <?php echo $res_pr['garantia']?>  </span>
                </div>
                
            </div>
            <!-- /Product details -->

            <!-- Product tab -->
            <div class="col-md-12">
                <div id="product-tab">
                    <!-- product tab nav -->
                    <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Descripcion</a></li>
                        <li><a data-toggle="tab" href="#tab2">Caracteristicas</a></li>
                        <li><a data-toggle="tab" href="#tab3">Reseñas (<?php echo $resp_resenia['cantidad']?>)</a></li>
                    </ul>
                    <!-- /product tab nav -->

                    <!-- product tab content -->
                    <div class="tab-content">
                        <!-- tab1  -->
                        <div id="tab1" class="tab-pane fade in active">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><?php echo $res_pr['descripcion_prod'] ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- /tab1  -->
                        <?php 
									$carac_prod =explode("," ,$res_pr['caracteristicas_prod']);

								  ?>

                        <!-- tab2  -->
                        <div id="tab2" class="tab-pane fade in">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php foreach ($carac_prod as $valor) { ?>

                                    <p><?php echo $valor ?></p>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /tab2  -->

                        <!-- tab3  -->
                        <div id="tab3" class="tab-pane fade in">
                            <div class="row">
                                <!-- Rating -->
                                <div class="col-md-3">
                                    <div id="rating">
                                        <div class="rating-avg">
                                            <span><?php echo $resp_resenia['promedio']!=''? $resp_resenia['promedio']: '0' ?></span>
                                            <div class="rating-stars">

                                                <?php 
													for ($i=0; $i <5 ; $i++) { 
														if ($i<$resp_resenia['promedio']) { 

															echo "<i class=\"fa fa-star\"></i>";
														}else{
															echo "<i class=\"fa fa-star-o \"></i>";
														}
													}
												?>

                                            </div>
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div
                                                        style="width: <?php echo (($resp_resenia['num5']/$resp_resenia['cantidad'])*100) ?>%;">
                                                    </div>
                                                </div>
                                                <span class="sum"><?php echo $resp_resenia['num5'] ?></span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div
                                                        style="width:  <?php echo (($resp_resenia['num4']/$resp_resenia['cantidad'])*100) ?>%;">
                                                    </div>
                                                </div>
                                                <span class="sum"><?php echo $resp_resenia['num4'] ?></span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div
                                                        style="width:  <?php echo (($resp_resenia['num3']/$resp_resenia['cantidad'])*100) ?>%;">
                                                    </div>
                                                </div>
                                                <span class="sum"><?php echo $resp_resenia['num3'] ?></span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div
                                                        style="width:  <?php echo (($resp_resenia['num2']/$resp_resenia['cantidad'])*100) ?>%;">
                                                    </div>
                                                </div>
                                                <span class="sum"><?php echo $resp_resenia['num2'] ?></span>
                                            </li>
                                            <li>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="rating-progress">
                                                    <div
                                                        style="width:  <?php echo (($resp_resenia['num1']/$resp_resenia['cantidad'])*100) ?>%;">
                                                    </div>
                                                </div>
                                                <span class="sum"><?php echo $resp_resenia['num1'] ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- /Rating -->

                                <!-- Reviews -->
                                <div class="col-md-6">
                                    <div id="reviews">
                                        <ul class="reviews">

                                            <?php 
												if (mysqli_num_rows($res_resen)>0) {
													while ($row_res=$res_resen->fetch_assoc()) {
													
												?>
                                            <li>
                                                <div class="review-heading">
                                                    <h5 class="name"><?php echo $row_res['nombre_res']; ?></h5>
                                                    <p class="date"><?php echo $row_res['fecha_resenia']; ?></p>
                                                    <div class="review-rating">

                                                        <?php 
															for ($i=0; $i <5 ; $i++) { 
																if ($i<$row_res['calificacion']) { 

																	echo "<i class=\"fa fa-star\"></i>";
																}else{
																	echo "<i class=\"fa fa-star-o empty\"></i>";
																}
															}
															?>

                                                    </div>
                                                </div>
                                                <div class="review-body">
                                                    <p><?php echo $row_res['resenia']; ?></p>
                                                </div>
                                            </li>

                                            <?php }
												}else{
													echo "<h5>No existen Reseñas de este producto Aun</h5>";
												} ?>

                                        </ul>


                                        
                                    </div>
                                </div>
                                <!-- /Reviews -->

                                <!-- Review Form -->
                                <div class="col-md-3">
                                    <div id="review-form">
                                        <h4>Calificar Producto</h4>
                                        <form class="review-form" action="admin/procesos/procesar-producto.php"
                                            method="POST" id="reseña-producto">
                                            <input class="input" type="text" name="nombre" placeholder="Tu nombre"
                                                required>
                                            <input class="input" type="email" name="email" placeholder="Tu Email"
                                                required>
                                            <textarea class="input" placeholder="Tu Reseña" name="resenia"></textarea>
                                            <div class="input-rating">
                                                <span>Tu Calificacion </span>
                                                <div class="stars">
                                                    <input id="star5" name="calificacion" value="5" type="radio"><label
                                                        for="star5"></label>
                                                    <input id="star4" name="calificacion" value="4" type="radio"><label
                                                        for="star4"></label>
                                                    <input id="star3" name="calificacion" value="3" type="radio"><label
                                                        for="star3"></label>
                                                    <input id="star2" name="calificacion" value="2" type="radio"><label
                                                        for="star2"></label>
                                                    <input id="star1" name="calificacion" value="1" type="radio"><label
                                                        for="star1"></label>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $id_producto ;?>">
                                            <input type="hidden" name="accion" value="calificar">
                                            <button type="submit" class="primary-btn">Enviar</button>
                                        </form>
                                    </div>
                                </div>
                                <!-- /Review Form -->
                            </div>
                        </div>
                        <!-- /tab3  -->
                    </div>
                    <!-- /product tab content  -->
                </div>
            </div>
            <!-- /product tab -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Productos Relacionados</h3>
                </div>
            </div>
            <?php while ($row_rel=$res_rel->fetch_assoc()) { ?>


            <!-- product -->
            <div class="col-md-3 col-xs-6">
                <div class="product">
                    <div class="product-img">
                        <img src="img/productos/<?php echo$row_rel['imagen'] ?>	" alt="">
                        <div class="product-label">
                            <span class="sale"><i class="fa fa-star"></i></span>
                        </div>
                    </div>
                    <div class="product-body">
                        <p class="product-category"><?php echo$row_rel['categoria'] ?> </p>
                        <h3 class="product-name"><a
                                href="producto.php?id_producto=<?php echo $row_rel['id_producto'] ; ?>"><?php echo$row_rel['producto'] ?>
                            </a></h3>
                        <h4 class="product-price"><?php echo$row_rel['precio_venta'] ?> Bs.</h4>
                        <div class="product-rating">
                            <?php 
								$productos=Producto::soloId($row_rel['id_producto']);
								$califi=($productos->selectCalificacion())->fetch_assoc(); 
								for ($i=0; $i <5 ; $i++) { 
                                    if ($i<$califi['calificacion']) { ?>

                                        <i class="fa fa-star"></i>
                                    <?php }else{ ?>
                                        <i class="fa fa-star-o "></i>
                                <?php 
                                        }
                                } 
                                ?>

                        </div>
                        <div class="product-btns">
                            <button class="quick-view"><a
                                    href="producto.php?id_producto=<?php echo $row_rel['id_producto'] ; ?>"><i
                                        class="fa fa-eye"></i></a><span class="tooltipp">Ver producto</span></button>

                        </div>
                    </div>
                    <div class="add-to-cart">
                        <button producto-id="<?php echo $row_rel['id_producto'];?>" class="add-to-cart-btn" <?php echo $row_rel['stock']<1 ?'disabled': ''?>><i
                                class="fa fa-shopping-cart"></i> Añadir al carrito</button>
                    </div>
                </div>
            </div>
            <!-- /product -->

            <?php } ?>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /Section -->
<?php 
	require_once 'inc/layout/footer.php';
?>