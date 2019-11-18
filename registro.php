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
						<h3 class="breadcrumb-header">Registro</h3>

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
								<h3 class="title">Registrarse a la Pagina <br> <small>(todos los campos son obligatorios)</small></h3>
							</div>

							<form action="admin/procesos/procesar-cliente.php" method="post" id="registrar-cliente" disabled="true">

								
								
								<div class="form-group">
									<input class="input" type="text" name="nombre" placeholder="Nombres">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="apellido" placeholder="Apellidos">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="nit" placeholder="C.I. o NIT">
								</div>

								<div class="form-group">
									<input class="input" type="text" name="direccion" placeholder="Direccion">
								</div>

								<div class="form-group">
									<input class="input" type="tel" name="telefono" placeholder="Telefono">
								</div>

								<div class="form-group">
									<select name="ciudad" id="" class="input" >
									<option value="0"><-- Seleccione ciudad --></option>
								<?php while ($rw_c= $ciudades->fetch_assoc()) {?>
									
								
									<option value="<?php echo $rw_c['id_ciudad'] ;?>" > <?php echo $rw_c['ciudad'] ;?></option>
									

								<?php   } ?>
									</select>


								</div>



								<div class="form-group">
									<input class="input" type="email" name="correo" placeholder="E-mail">
								</div>

								
								<div class="form-group">
									<input class="input" type="password" name="password" placeholder="Password">
								</div>

								<div class="form-group">
									<input class="input" type="password" name="confirmPassword" placeholder="Confirmar Password">
								</div>

								
								<div class="form-group">
									<div class="input-checkbox">
										<input type="checkbox" id="create-account">
										<label for="create-account">
											<span></span>
											He leido los terminos y condiciones  <br><a href="">Leer los Terminos y condiciones</a>
										</label>
										<div class="caption">
											<p>He leido y Acepto todos los terminos y condiciones de la pagina</p>
											<input  type="hidden" name="accion" value="registrar">
											<input class="btn primary-btn btn-lg btn-block" type="submit"  name="password" placeholder="Enter Your Password">
										</div>
									</div>
								</div>
							</form>
							
								
						</div>
						<!-- /Billing Details -->

					</div>



					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								<div class="order-col">
									<div>1x Product Name Goes Here</div>
									<div>$980.00</div>
								</div>
								<div class="order-col">
									<div>2x Product Name Goes Here</div>
									<div>$980.00</div>
								</div>
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">$2940.00</strong></div>
							</div>
						</div>
						<div class="payment-method">
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-1">
								<label for="payment-1">
									<span></span>
									Direct Bank Transfer
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-2">
								<label for="payment-2">
									<span></span>
									Cheque Payment
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
							<div class="input-radio">
								<input type="radio" name="payment" id="payment-3">
								<label for="payment-3">
									<span></span>
									Paypal System
								</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="#">terms & conditions</a>
							</label>
						</div>
						<a href="#" class="primary-btn order-submit">Place order</a>
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