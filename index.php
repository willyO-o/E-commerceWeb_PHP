<?php 

	require_once 'inc/layout/header.php';
	require_once 'inc/layout/navegacion.php';
	require_once 'admin/modelos/Producto.php';
	

	$productos=Producto::ningunDato();

	$resultado_productos=$productos->selectProducto();

	$resultado_masVendidos=$productos->masVendidos();


?>
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="laptops">
							</div>
							<div class="shop-body">
								<h3>Laptops<br>Coleccion</h3>
								<a href="#" class="cta-btn">Comprar Ahora <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="accesorios">
							</div>
							<div class="shop-body">
								<h3>Accessorios<br>Coleccion</h3>
								<a href="tienda.php?id_cat=8" class="cta-btn">Comprar Ahora <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/componentes.jpg" alt="componentes">
							</div>
							<div class="shop-body">
								<h3>Todos los<br>Productos</h3>
								<a href="tienda.php" class="cta-btn">Comprar Ahora <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Nuevos productos</h3>
							
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->

									<?php while ($row_new = $resultado_productos->fetch_assoc()) { ?>
											
										
										<div class="product">
											<div class="product-img">
												<img src="./img/productos/<?php echo $row_new['imagen'];?>">
												<div class="product-label">
													<span class="new">Nuevo</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $row_new['categoria']?></p>
												<h3 class="product-name"><a href="producto.php?id_producto=<?php echo $row_new['id_producto']?>"><?php echo $row_new['producto']?></a></h3>
												<h4 class="product-price"><?php echo $row_new['precio_venta']?> Bs.</del></h4>
												<div class="product-rating">
												<?php 
													$productos=Producto::soloId($row_new['id_producto']);
													$califi=($productos->selectCalificacion())->fetch_assoc(); 
													for ($i=0; $i <5 ; $i++) { 
														if ($i<$califi['calificacion']) { ?>

															<i class="fa fa-star"></i>
														<?php }else{ ?>
															<i class="fa fa-star-o "></i>
												<?php		}
													}
												?>

												
													
												</div>
												<div class="product-btns">
					
													<button class="quick-view"><a href="producto.php?id_producto=<?php echo $row_new['id_producto']?>"><i class="fa fa-eye"></i></a><span class="tooltipp">Ver producto</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button producto-id="<?php echo $row_new['id_producto']?>" class="add-to-cart-btn" <?php echo $row_new['stock']<1 ?'disabled': ''?>><i class="fa fa-shopping-cart"></i> añadir al carrito</button>
											</div>
										</div>
										<!-- /product -->
									<?php }  ?>
									
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
						<h2 class="text-uppercase">Faltan</h2>
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3 id="dias"></h3>
										<span>Dias</span>
									</div>
								</li>
								<li>
									<div>
										<h3 id="horas"></h3>
										<span>Horas</span>
									</div>
								</li>
								<li>
									<div>
										<h3 id="minutos"></h3>
										<span>Minutos</span>
									</div>
								</li>
								<li>
									<div>
										<h3 id="segundos"></h3>
										<span>Segundos</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">Ofertas De Fin de Año</h2>
							<p>Venta Navideña con el 10% de Descuento</p>
							<a class="primary-btn cta-btn" href="tienda.php">Comprar ahora</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top Ventas</h3>
							<div class="section-nav">
							
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<?php while ($row_new = $resultado_masVendidos->fetch_assoc()) { ?>
											
										
											<div class="product">
												<div class="product-img">
													<img src="./img/productos/<?php echo $row_new['imagen'];?>">
													<div class="product-label">
														<span class="new">Top</span>
													</div>
												</div>
												<div class="product-body">
													<p class="product-category"><?php echo $row_new['categoria']?></p>
													<h3 class="product-name"><a href="producto.php?id_producto=<?php echo $row_new['id_producto']?>"><?php echo $row_new['producto']?></a></h3>
													<h4 class="product-price"><?php echo $row_new['precio_venta']?> Bs.</del></h4>
													<div class="product-rating">
													<?php 
														$productos=Producto::soloId($row_new['id_producto']);
														$califi=($productos->selectCalificacion())->fetch_assoc(); 
														for ($i=0; $i <5 ; $i++) { 
															if ($i<$califi['calificacion']) { ?>
	
																<i class="fa fa-star"></i>
															<?php }else{ ?>
																<i class="fa fa-star-o "></i>
													<?php		}
														}
													?>
	
													
														
													</div>
													<div class="product-btns">
						
														<button class="quick-view"><a href="producto.php?id_producto=<?php echo $row_new['id_producto']?>"><i class="fa fa-eye"></i></a><span class="tooltipp">Ver producto</span></button>
													</div>
												</div>
												<div class="add-to-cart">
													<button producto-id="<?php echo $row_new['id_producto']?>" class="add-to-cart-btn" <?php echo $row_new['stock']<1 ?'disabled': ''?>><i class="fa fa-shopping-cart"></i> añadir al carrito</button>
												</div>
											</div>
											<!-- /product -->
										<?php }  ?>
										
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->

		<!-- /SECTION -->




<?php 
	require_once 'inc/layout/footer.php';
?>