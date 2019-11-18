<?php 
	require_once 'inc/layout/header.php';
	require_once 'inc/layout/navegacion.php';
	require_once 'admin/modelos/Cliente.php';

	$ob_cliente= Cliente::ningunDato();

	$ciudades=$ob_cliente->selectCiudad();
?>
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Contacto</h3>

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

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Llena el Formulario <br> <small>(todos los campos son obligatorios)</small></h3>
							</div>

							<form action="admin/procesos/procesar-cliente.php" method="post" id="contactar" >

								
								<div class="form-group">
									<input class="input" type="text" name="nombre" placeholder="Nombres" required>
								</div>
								<div class="form-group">
									<input class="input" type="email" name="email" placeholder="Corrreo electronico" required>
								</div>				

								<div class="form-group">
									<input class="input" type="tel" name="telefono" placeholder="Telefono" required>
								</div>
								<div class="form-group">
									<textarea class="input" name="mensaje"  cols="30" rows="20" placeholder="Mensaje" required></textarea>
								</div>

								<input  type="hidden" name="accion" value="contactar">
								<input class="btn primary-btn btn-lg btn-block" type="submit" >
			
							</form>
							
								
						</div>
						<!-- /Billing Details -->

					</div>



					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">

						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>La Paz</strong></div>
								<div><strong></strong></div>
							</div>
							<div class="order-products">
								<div class="order-col">
									<div><i class="fa fa-phone"></i>  <a href="tel:+5912245872">2245872</a></div>
									<div></div>
								</div>
								<div class="order-col">
									<div><i class="fa fa-envelope-o" ></i>  <a href="mailto:PcBolivia2019@deemail.com">PcBolivia2019@gmail.com</a></div>
									<div></div>
								</div>
							</div>
							<div class="order-col">
								<div><i class="fa fa-map-marker" aria-hidden="true"> </i> <a href="https://www.google.com/maps/place/Palacio+de+Comunicaciones,+Avenida+Mariscal+Santa+Cruz,+La+Paz+Zona+1/@-16.499364,-68.1376035,17z/data=!3m1!4b1!4m5!3m4!1s0x915f20711a2b8699:0x2a55724ef7fdf6ec!8m2!3d-16.499364!4d-68.1354095">Palacio de Comunicaciones, Avenida Mariscal Santa Cruz, La Paz Zona 1</a></div>
								<div><strong></strong></div>
							</div>
							<hr>
							<div class="order-col">
								<div><strong>Santa Cruz</strong></div>
								<div><strong class="order-total"></strong></div>
							</div>
							<div class="order-products">
								<div class="order-col">
									<div><i class="fa fa-phone"></i> <a href="tel:+5912245872">2245877</a></div>
									<div></div>
								</div>
								<div class="order-col">
									<div><i class="fa fa-envelope-o" ></i>  <a href="mailto:PcBolivia2019@deemail.com">PcBolivia2019SC@gmail.com</a></div>
									<div></div>
								</div>
							</div>
							<div class="order-col">
								<div><i class="fa fa-map-marker" aria-hidden="true"></i> <a href="https://www.google.com/maps/@-17.7960733,-63.1844681,16.75z">Juan de Garay 405-383, Santa Cruz de la Sierra</a></div>
								<div><strong></strong></div>
							</div>
						</div>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


<?php 

	require_once 'inc/layout/footer.php';
?>