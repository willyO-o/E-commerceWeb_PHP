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
                <h3 class="breadcrumb-header">Relizar Pedido</h3>

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
        <form action="admin/procesos/procesar-pedido.php" method="post" id="realizar-pedido">
            <div class="row">
                
            <div class="fondo-loader"></div>

                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details <?php echo isset($_SESSION['user']) ? 'hidden': '' ;?>" id="formulario-pedido">
                        <div class="section-title">
                            <h3 class="title">Llena el formulario para realizar Tu pedido <br> <small>(todos los campos
                                    son
                                    obligatorios)</small></h3>
                        </div>



                        

                        <div class="form-group">
                            <input class="input" type="text" name="nombre" placeholder="Nombres" <?php echo isset($_SESSION['user']) ? '': 'required' ;?>>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="apellido" placeholder="Apellidos" <?php echo isset($_SESSION['user']) ? '': 'required' ;?>>
                        </div>
                        <div class="form-group">
                            <input class="input" type="text" name="nit" placeholder="C.I. o NIT" <?php echo isset($_SESSION['user']) ? '': 'required' ;?>>
                        </div>

                        <div class="form-group">
                            <input class="input" type="text" name="direccion" placeholder="Direccion" <?php echo isset($_SESSION['user']) ? '': 'required' ;?>>
                        </div>

                        <div class="form-group">
                            <input class="input" type="tel" name="telefono" placeholder="Telefono" <?php echo isset($_SESSION['user']) ? '': 'required' ;?>>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="ciudad" id="" class="input">
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



                        <div class="form-group">
                            <input class="input" type="email" name="correo" placeholder="E-mail" <?php echo isset($_SESSION['user']) ? '': 'required' ;?>>
                        </div>


                        <div class="form-group">
                            <div class="input-checkbox">
                                <input type="checkbox" id="create-account-password">
                                <label for="create-account-password">
                                    <span></span>
                                    Desea crear Cuenta? <br>
                                </label>
                                <div class="caption">
                                    <p>Por Favor Ingrese su Password</p>
                                    <div class="form-group">
                                        <input class="input" type="password" name="password" placeholder="Password" id="password-pedido">
                                    </div>

                                    <div class="form-group">
                                        <input class="input" type="password" name="confirmPassword" id="confirmPassword-pedido"
                                            placeholder="Confirmar Password">
                                    </div>
                                </div>
                            </div>
                        </div>





                        <div class="form-group">
                            <div class="input-checkbox">
                                <input type="checkbox" id="create-account">
                                <label for="create-account">
                                    <span></span>
                                    He leido los terminos y condiciones <br><a href="#" data-toggle="modal"
                                        data-target="#modal-terminos-condiciones">Leer los Terminos y
                                        condiciones</a>
                                </label>
                                <div class="caption">
                                    <p>He leido y Acepto todos los terminos y condiciones de la pagina</p>
                                    <input type="hidden" name="accion" value="registrar">
                                    <input class="btn primary-btn btn-lg btn-block" type="submit" id="btn-enviar-pedido" >
                                </div>
                            </div>
                        </div>



                    </div>
                    <!-- /Billing Details -->
                    
                    
                </div>



                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Tu Orden</h3>
                    </div>

                    <div class="input-checkbox">
                        <h3>
                            <a class=" " data-toggle="collapse" href="#resumen" role="button" aria-expanded="false"
                                aria-controls="resumen">
                                Mostrar Detalles del pedido <i class="fa fa-angle-down"></i>
                            </a>
                        </h3>
                        <div class="collapse" id="resumen">
                            <div class="card card-body">
                                <div class="order-summary">
                                    <div class="order-col">
                                        <div><strong>PRODUCTO</strong></div>
                                        <div><strong>TOTAL</strong></div>
                                    </div>
                                    <div class="order-products">
                                        <?php if (isset($_SESSION['carrito'])) {
											$can_prod=0;
											$total=0;
											$carri=$_SESSION['carrito'];
											foreach ($carri as $row_car) {?>
												<div class="order-col">
													<div><img class="img-pedido" src="./img/productos/<?php echo $row_car['imagen'] ; ?>"></div>
													<div> <b><?php echo $row_car['cantidad'] ?></b> x <?php echo $row_car['producto'] ?></div>
													<div><?php echo $row_car['precio_venta']*$row_car['cantidad'] ?>  Bs.</div>
												</div>
												

										<?php
											$total+=$row_car['cantidad']*$row_car['precio_venta'];
											$can_prod+=$row_car['cantidad']	;	
											}
										} 
										?>

                                        <div class="order-col">
                                            <div><a class="primary-btn" href="ver-carrito.php"><i class="fa fa-arrow-left"></i> Editar carrtio</a></div>
                                            <div></div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="order-summary">

                        <div class="order-col">
                            <div><strong><span><?php echo isset($_SESSION['carrito']) ? $can_prod : '0' ?></span>
                                    PRODUCTO(S) En el Carrito</strong></div>
                            <div><strong class="order-total"></strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>TOTAL</strong></div>
                            <div><strong class="order-total"><?php echo isset($_SESSION['carrito']) ? $total : '0' ?> Bs.</strong></div>
                        </div>
                    </div>

       
                    <div class="payment-method">
                        <h3 class="title">Elija un tipo de pago</h3>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-1" value="Deposito">
                            <label for="payment-1">
                                <span></span>
                                Deposito Bancario
                            </label>
                            <div class="caption">
                                <p>PcBolivia acepta pagos mediante deposito bancario. Utiliza la siguiente información:
                                </p>

                                <ul class="deposito">
                                    <li> Tipo de cuenta: <b>Cuenta corriente en Bolivianos</b></li>
                                    <li> Nombre de la entidad Bancaria: <b>Banco Unión SA.</b></li>
                                    <li> Titular de la cuenta: <b>PcBolivia.</b></li>
                                    <li> Número de cuenta: <b>10000019113963</b></li>
                                </ul>


                                <small> Solo hasta que confirmemos que usted realizó el deposito, procederemos a la
                                    entrega
                                    del pedido. Si deseas agilizar la tramitación de tu pedido, envíanos el comprobante
                                    del deposito al correo electrónico <b>pcBolivia2019@gmail.com</b></small>

                                <p><small>PcBolivia debe recibir tu pago dentro de los 3 días calendarios siguientes a
                                        tu
                                        compra, ó tu pedido será cancelado.</small></p>
                                <hr>
                            </div>

                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-2" value="Contra-entrega">
                            <label for="payment-2">
                                <span></span>
                                Contra Entrega
                            </label>
                            <div class="caption">
                                <p>El pago se realizará en efectivo en el mismo momento de la entrega del pedido en la
                                    dirección de entrega indicada.
                                    Disponible en Santa Cruz y La Paz, donde efectuamos despachos de forma directa.</p>
                                <h5>Direcciones:</h5>
                                <p><a href="https://www.google.com/maps/@-17.7960733,-63.1844681,16.75z">Juan de Garay
                                        405-383, Santa Cruz de la Sierra</a></p>
                                <p><a
                                        href="https://www.google.com/maps/place/Palacio+de+Comunicaciones,+Avenida+Mariscal+Santa+Cruz,+La+Paz+Zona+1/@-16.499364,-68.1376035,17z/data=!3m1!4b1!4m5!3m4!1s0x915f20711a2b8699:0x2a55724ef7fdf6ec!8m2!3d-16.499364!4d-68.1354095">Palacio
                                        de Comunicaciones, Avenida Mariscal Santa Cruz, La Paz Zona 1</a></p>
                                <p><small>PcBolivia debe recibir tu pago dentro de los 3 días calendarios siguientes a
                                        tu
                                        compra, ó tu pedido será cancelado.</small></p>
                                <hr>
                            </div>
                        </div>
                        <div class="input-radio">
                            <input type="radio" name="payment" id="payment-3" value="Otro">
                            <label for="payment-3">
                                <span></span>
                                Otra forma de pago
                            </label>
                            <div class="caption">
                                <p>Para otra forma de pago puedes comunicarte con nosotros:
                                    Por teléfono: <b>(591-2) 2245877 - 2245872</b> de Lunes a Viernes entre las 8:30 am
                                    y las
                                    6:30 pm Sábado entre las 9:00 am y las 1:00 pm hora boliviana;</p>
                                <p><small>PcBolivia debe recibir tu pago dentro de los 3 días calendarios siguientes a
                                        tu compra, ó tu pedido será cancelado.</small></p>
                                <hr>
                            </div>
                        </div>

                        <div class="alerta-pago alert alert-danger hidden"><b>¡Error!</b> Seleccione un metodo de pago </div>
                    </div>
                            
                    
                    <?php if (isset($_SESSION['user'])) {?>
                        <div class="caption">
                            <p>Realizar Pedido</p>
                            
                            <input class="btn primary-btn btn-lg btn-block" type="submit" >
                        </div>
                     <?php  // echo "</form >";
                    }
                    ?>

                </div>
                <!-- /Order Details -->








            </div>
            <!-- /row -->
        </form>
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->




<!-- modal de terminos y condiciones -->
<div class="modal fade" id="modal-terminos-condiciones" tabindex="-1" role="dialog" aria-labelledby="modalLabelLarge"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalLabelLarge">Terminos y condiciones</h4>
            </div>

            <div class="modal-body">
                Modal content...
            </div>

        </div>
    </div>
</div>


<?php 

	require_once 'inc/layout/footer.php';
?>