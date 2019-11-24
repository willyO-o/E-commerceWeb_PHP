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
                        <h3 class="title">Registrarse a la Pagina <br> <small>(todos los campos son
                                obligatorios)</small></h3>
                    </div>

                    <form action="admin/procesos/procesar-cliente.php" method="post" id="registrar-cliente"
                        disabled="true">



                        <div class="form-group">
                            <input class="input" type="text" name="nombre" placeholder="Nombres" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="apellido" placeholder="Apellidos" required>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="nit" placeholder="C.I. o NIT" required>
                        </div>

                        <div class="form-group">
                            <input class="input" type="text" name="direccion" placeholder="Direccion" required>
                        </div>

                        <div class="form-group">
                            <input class="input" type="tel" name="telefono" placeholder="Telefono" required>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
									<select name="ciudad" id="ciudad" class="input">
                                        <option value="0">
                                            <-- Seleccione ciudad -->
                                        </option>
                                        <?php while ($rw_c= $ciudades->fetch_assoc()) {?>


                                        <option value="<?php echo $rw_c['id_ciudad'] ;?>">
                                            <?php echo $rw_c['ciudad'] ;?></option>


                                        <?php   } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="input" disabled>
                                        <option>Bolivia</option>
                                    </select>
                                </div>
                            </div>


                        </div>
						<div class="alerta-ciudad alert alert-danger hidden"></div>



                        <div class="form-group">
                            <input class="input" type="email" name="correo" placeholder="E-mail" required>
                        </div>


                        <div class="form-group">
                            <input class="input" type="password" name="password" placeholder="Password" id="password-pedido" required>
                        </div>

                        <div class="form-group">
                            <input class="input" type="password" name="confirmPassword"  id="confirmPassword-pedido"
                                placeholder="Confirmar Password" required>
                        </div>
						<div class="alerta-contrasenia alert alert-danger hidden"></div>
                        <div class="alerta-contrasenia2 alert alert-danger hidden"></div>

                        <div class="form-group">
                            <div class="input-checkbox">
                                <input type="checkbox" id="create-account">
                                <label for="create-account">
                                    <span></span>
                                    He leido los terminos y condiciones <br><a href="#"data-toggle="modal"
                                        data-target="#modal-terminos-condiciones">Leer los Terminos y
                                        condiciones</a>
                                </label>
                                <div class="caption">
                                    <p>He leido y Acepto todos los terminos y condiciones de la pagina</p>
                                    <input type="hidden" name="accion" value="registrar">
                                    <input class="btn primary-btn btn-lg btn-block" type="submit" id="btn-enviar-pedido" value="Enviar">
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
                    <h3 class="title">Publicidad...</h3>
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