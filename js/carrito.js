$(function () {
    'use strict';

    $('.add-to-cart-btn').on('click', function () {

        let id = $(this).attr('producto-id');
        let qty=$('.input-cantidad-producto').val();
        
        //console.log(qty);
        

        if (typeof qty == 'undefined') {
            qty=1;
        }


        let datos = {
            accion: 'carrito',
            id: id,
            qty:qty
        };

        $.ajax({
            method: 'POST',

            url: `admin/procesos/procesar-producto.php`,

            data: datos,
            dataType: 'json',

            success: function (datas) {
                let resultado = datas;

              // console.log(resultado);


                if (resultado.respuesta === 'exitoso') {
                    Swal.fire(
                        'Listo !!',
                        'producto agregado',
                        'success'
                    );

                    if (resultado.nuevo==0) {
                        let html = 
                        `
                            <div class="cart-summary">
                                <small><span class=" contador-prod">0</span> Item(s)
                                    seleccionados</small>
                                <h5>SUBTOTAL: <span id="total-pagar">0</span> Bs.</h5>
                            </div>
                            <div class="cart-btns">
                                <a href="ver-carrito.php">Ver Carrito</a>
                                <a href="pedido.php">Pedido <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        `;
                        
                        $('.carta-de-carrito').append(html);
                        $('.sin-producto').remove();
                        
                    }
                    if (resultado.cont==0) {
                        agregarAlCarrito(resultado.producto.id_producto, resultado.producto.producto,
                            resultado.producto.imagen, resultado.producto.precio_venta,resultado.producto.cantidad);
                    }
                    preciosCantidades(resultado.producto.precio_venta,resultado.producto.id_producto,qty);
                    

                    

                } else if(resultado.respuesta === 'exedido'){
                    Swal.fire(
                        'Error !!',
                        'No se puede agregar mas de este producto al carrito por limite de stock ',
                        'warning'
                    );
                }else{
                    Swal.fire(
                        'Error !!',
                        'Ocurrio un error ',
                        'error'
                    );
                }


            }
        });



    });

    $('#mi-carrito-lista').on('click','.delete-producto-carrito',function () {
        let padre=$(this).parents('.product-widget');
        let id=$(this).attr('producto-id');

        let datos = {
            accion: 'carrito_quitar',
            id: id
        };

        $.ajax({
            method: 'POST',
            url: `admin/procesos/procesar-producto.php`,
            data: datos,
            dataType: 'json',

            success: function (datas) {
                let resultado = datas;

                //console.log(resultado);


                if (resultado.respuesta === 'eliminado') {
                    padre.remove();
                    restarCarrito(resultado.cantidad,resultado.precio);
                    if (resultado.vacio=='vacio') {
                        $('.carta-de-carrito .cart-summary').remove();
                        $('.carta-de-carrito .cart-btns').remove();

                        let html =`<h3 class="sin-producto">No Tienes Productos Seleccionados</h3>`;
                        $('.carta-de-carrito').append(html);
                    }
                } else {
                    Swal.fire(
                        'Error !!',
                        'Ocurrion un error ',
                        'error'
                    );
                }


            }
        });
        
        
    });

    $('#ver-carrito').on('click','.eliminar-ver-carrito',function () {
        let padre=$(this).parents('tr');
        let id=$(this).attr('producto-id');
        //console.log(padre);
        //console.log('click');
        
        

        let datos = {
            accion: 'carrito_quitar',
            id: id
        };


        $.ajax({
            method: 'POST',
            url: `admin/procesos/procesar-producto.php`,
            data: datos,
            dataType: 'json',

            success: function (datas) {
                let resultado = datas;

                //console.log(resultado);


                if (resultado.respuesta === 'eliminado') {
                    padre.remove();
                    $(`.carta-de-carrito .product-price span[producto-id='${id}']`).parents('.product-widget').remove();
                    restarCarrito(resultado.cantidad,resultado.precio);
                    restarTotal(resultado.cantidad,resultado.precio);
                    if (resultado.vacio=='vacio') {
                        $('.carta-de-carrito .cart-summary').remove();
                        $('.carta-de-carrito .cart-btns').remove();
                        
                        $('.titulo-ver-carrito').html('0');
                        let html =`<h3 class="sin-producto">No Tienes Productos Seleccionados</h3>`;
                        $('.carta-de-carrito').append(html);
                        $('#btn-pedido-ver-carrito').addClass('disabled');
                    }
                } else {
                    Swal.fire(
                        'Error !!',
                        'Ocurrion un error ',
                        'error'
                    );
                }


            }
        });
        
    });

    $('#realizar-pedido').on('submit', function (e) {
        e.preventDefault();
        
        $('.fondo-loader').html('<div class="loading-img-ajax"><img  src="css/ajax-loader.gif" alt="loading" /><br/>Un momento, por favor...</div>');
        
 
        
        let datos=$(this).serializeArray();

        //console.log(datos);
        

 
 
        $.ajax({
 
         type: $(this).attr('method'),
 
         data: datos,
 
         url: $(this).attr('action'),
 
         dataType: 'json',
 
         success: function (data) {
             let resultado= data;
             $('.loading-img-ajax').fadeOut(600).html();
            // console.log(resultado);
             
            if (resultado.respuesta ==='exitoso') {
                
                 Swal.fire(
                     'Listo !!',
                     'su pedido fue procesado con exito, Se le ha enviado un correo a su cuenta con los detalles del pedido ',
                     'success'
                    )
                    
                    
                    setTimeout(() => {

   
                        location.href='index.php';

                        
                    }, 5000);
                     
                       
 
             } else {
                
                 Swal.fire(
                     'Error !!',
                     'ocurrio un error ',
                     'error'
                 )
             }
         }
        });    
     }); 



    function agregarAlCarrito(id, producto, imagen, precio,cantidad) {

        let listaCarrito = $('#mi-carrito-lista');

        let htmltag =
            `
                <div class="product-widget">
                    <div class="product-img">
                         <img src="./img/productos/${imagen}" >
                    </div>
                    <div class="product-body">
                        <h3 class="product-name"><a href="producto.php?id_producto=${id}">${producto}</a>
                         </h3>
                        <h4 class="product-price"><span class="qty" producto-id="${id}">0</span><span class="qty">x</span>${precio} Bs.
                        </h4>
                    </div>
                    <button class="delete delete-producto-carrito" producto-id="${id}"><i class="fa fa-close"></i></button>
                </div>
        `;
        listaCarrito.append(htmltag);
        //preciosCantidades(precio,cantidad);

    }

    function preciosCantidades(precio,id,cantidad) {

        
        let tot=$('#total-pagar').text();
        tot=parseFloat((Math.round((Number(tot)+(Number(precio)*Number(cantidad)))*100))/100).toFixed(2);   
        $('#total-pagar').html(tot);


        let cont=$('.contador-prod').text();
        cont=Number(cont)+Number(cantidad);
        $('.contador-prod').html(cont);

        let items=$('.qty-items').text();
        items=Number(items)+Number(cantidad);
        $('.qty-items').html(items);




        let qty=$(`.product-price span[producto-id='${id}']`).text();
        qty=Number(qty)+Number(cantidad);
        $(`.product-price span[producto-id='${id}']`).html(qty);



    }

    function restarTotal(cantidad,precio) {
        let total=Number($('.suma-total').text());
        total=parseFloat((Math.round((total-Number(precio)*Number(cantidad))*100))/100).toFixed(2);
        $('.suma-total').html(total);

    }

    function restarCarrito(cantidad,precio) {
        let tot=$('#total-pagar').text();
        tot=parseFloat((Math.round((Number(tot)-(Number(precio)*Number(cantidad)))*100))/100).toFixed(2);   
        $('#total-pagar').html(tot);


        let cont=$('.contador-prod').text();
        cont=Number(cont)-Number(cantidad);
        $('.contador-prod').html(cont);

        let items=$('.qty-items').text();
        items=Number(items)-Number(cantidad);
        $('.qty-items').html(items);

    }



    $('.input-ver-carrito').on('input', function () { 
        
        this.value = this.value.replace(/[^0-9]/g,'');
        let max=Number($(this).attr('max'));
        
        //console.log(max);
        
        if (this.value=='') {
            $(this).val(1);
        }
        if (this.value>max) {
            $(this).val(max);
        }
	});


    $('.input-ver-carrito').on('change',function () {

        let qty=$(this).val();
        let id_p=$(this).attr('producto-id');

        let datos = {
            accion: 'carrito_actualizar',
            id: id_p,
            qty:qty
        };

        $.ajax({
            method: 'POST',
            url: `admin/procesos/procesar-producto.php`,
            data: datos,
            dataType: 'json',

            success: function (datas) {
                let resultado = datas;

                //console.log(resultado);


                if (resultado.respuesta === 'exitoso') {
                    

                    calularTotalCarrito(resultado.anterior,resultado.producto.cantidad,resultado.producto.precio_venta);

                    actualizarCantidad(resultado.producto.precio_venta,resultado.producto.id_producto,resultado.producto.cantidad,resultado.anterior);
                    

                    

                }else{
                    Swal.fire(
                        'Error !!',
                        'Ocurrio un error ',
                        'error'
                    );
                }


            }
        });
         
    });

    function calularTotalCarrito(anterior,cantidad,precio) {
        
        let tot=$('.suma-total').text();
        tot=parseFloat((Math.round((Number(tot)-(Number(precio)*Number(anterior)))*100))/100).toFixed(2); 
        tot=parseFloat((Math.round((Number(tot)+(Number(precio)*Number(cantidad)))*100))/100).toFixed(2);    
        $('.suma-total').html(tot);
    }

    function actualizarCantidad(precio,id,cantidad,anterior) {

        
        let tot=$('#total-pagar').text();
        tot=parseFloat((Math.round((Number(tot)-(Number(precio)*Number(anterior)))*100))/100).toFixed(2); 
        tot=parseFloat((Math.round((Number(tot)+(Number(precio)*Number(cantidad)))*100))/100).toFixed(2);   
        $('#total-pagar').html(tot);


        let cont=$('.contador-prod').text();
        cont=Number(cont)-Number(anterior)+Number(cantidad);
        $('.contador-prod').html(cont);

        let items=$('.qty-items').text();
        items=Number(items)-Number(anterior)+Number(cantidad);
        $('.qty-items').html(items);



        $(`.product-price span[producto-id='${id}']`).html(cantidad);



    }

});
