$(function () {
    'use strict';

    // ************ usuarios*******************
    $('#password').on('input',longitudPassword);
    $('#registrar-usuario').on('input',compararPassword);
    $('#editar-usuario').on('input',compararPassword);

    $('.tabla-ver-usuarios').on('click','.borrar-registro', function name(e) {
        e.preventDefault();

        let id=$(this).attr('data-id');
        let tipo=$(this).attr('data-tipo');
        let padre=$(this).parents('tr');

        eliminarRegisttro(id,tipo,padre);
        
        
    });

   

  


    // cambiar estado
    $('.tabla-ver-usuarios td a[estado]').on('click',  function (e) {
        e.preventDefault();
        let id_us=$(this).attr('data-id');
        let valorEstado=$(this).attr('estado')
        let local=$(this);
         

        if (valorEstado=== '1') {
            valorEstado=0;
        } else {
            valorEstado=1;
        }
        
        let datos={accion:'cambiar_estado',id:id_us, estado:valorEstado};
        Swal.fire({
            title: 'Estas seguro?',
            text: "Desea cambiar el estado del usuario?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, cambiar estado!'
          }).then((result) => {
            if (result.value) {

                $.ajax({
                    method: 'GET',
        
                    url: `procesos/procesar-usuario.php`,
                    
                    data: datos,
                    dataType: 'json',
        
                    success: function (datas) {
                        let resultado=datas;

                        if (resultado.respuesta ==='cambiado') {
                            Swal.fire(
                                'Listo !!',
                                'Estado Cambiado ',
                                'success'
                            );
                            
                           
                            
                            if (valorEstado==1) {
                                local.removeClass('btn-secondary');
                                local.addClass('btn-success');
                                local.html('activo')
                                local.attr('estado','1')
                                
                            } else {
                                
                                local.removeClass('btn-success');
                                local.addClass('btn-secondary');
                                local.html('inactivo');
                                local.attr('estado','0')
                            }
                            
                        } else {
                            Swal.fire(
                                'Error !!',
                                'No se pudo cambiar el estado, intente de nuevo ',
                                'error'
                            );
                        }
                        

                    }
                });
                
            }
        })
        
        
        
        
        
    });


    $('#usuario').on('input',function () {
        let errorDiv=$('#errorNombre');
        let usuario=$('#usuario').val();
          if(usuario.length < 4){
            
            $('#usuario').css({'border':'1px solid red'});
            errorDiv.removeClass();
 
            errorDiv.addClass('alert alert-danger');
            errorDiv.html( 'almenos 4 caracteres');
          }else{
            
            $('#usuario').css({'border':'1px solid silver'});
            errorDiv.removeClass();
            errorDiv.addClass('hidden');
            errorDiv.html('');
          }
    });

    $('#confirmarPassword').on('input',function () {
       
        let password=$('#password').val();
        let confirmPassword=$('#confirmarPassword').val();
        let errorDiv1=$('#error');
        if (password===confirmPassword) {
              
            $('#confirmarPassword').css({'border':'1px solid silver'});
            errorDiv1.removeClass();
            errorDiv1.removeClass('hidden');
            errorDiv1.addClass('alert alert-success');
            errorDiv1.html( "correcto...");
        }else{

            $('#confirmarPassword').css({'border':'1px solid red'});
            errorDiv1.removeClass();
            errorDiv1.removeClass('hidden');
            errorDiv1.addClass('alert alert-danger');
            errorDiv1.html( 'error: las contraseñas no coinciden');
        }
    });


    $('#registrar-usuario').on('submit', function (e) {
       e.preventDefault();

       
       let datos=$(this).serializeArray();


       $.ajax({

        type: $(this).attr('method'),

        data: datos,

        url: $(this).attr('action'),

        dataType: 'json',

        success: function (data) {
            let resultado= data;
            
            if (resultado.respuesta==='existe') {

                Swal.fire(
                    'Error !!',
                    'El Usuario ya existe, intente con otro ',
                    'error'
                  )
                
            } else if (resultado.respuesta ==='insertado') {
                Swal.fire(
                    'Listo !!',
                    'Usuario Creado ',
                    'success'
                    )
    
                    //   refrescarndo el formulario
                      $('#registrar-usuario')[0].reset();

            } else {
                Swal.fire(
                    'Error !!',
                    'El usuario no se inserto, intente de nuevo ',
                    'error'
                )
            }
        }
       });    
    }); 

    $('#editar-usuario').on('submit', function (e) {
        e.preventDefault();
 
        
        let datos=$(this).serializeArray();
 
        $.ajax({
 
         type: $(this).attr('method'),
 
         data: datos,
 
         url: $(this).attr('action'),
 
         dataType: 'json',
 
         success: function (data) {
             let resultado= data;
             
             if (resultado.respuesta==='existe') {
 
                 Swal.fire(
                     'Error !!',
                     'El Usuario ya existe, intente con otro ',
                     'error'
                   )
                 
             } else if (resultado.respuesta ==='actualizado') {
                 Swal.fire(
                     'Listo !!',
                     'Usuario Modificado ',
                     'success'
                     )
     
                     //   refrescarndo el formulario
                       $('#editar-usuario')[0].reset();
                       setTimeout(function(){
                            window.location.href= 'ver-usuarios.php';
                        }, 2000);
                       
 
             } else {
                 Swal.fire(
                     'Error !!',
                     'El usuario no se modifico!, intente de nuevo ',
                     'error'
                 )
             }
        }

        }); 
           
     }); 



    // ************fin  usuarios*******************

    //   *****************marcas*******************
    $('#agregar-marca').on('submit', function (e) {
        e.preventDefault();
 
        
        let datos=$(this).serializeArray();
 
 
        $.ajax({
 
         type: $(this).attr('method'),
 
         data: datos,
 
         url: $(this).attr('action'),
 
         dataType: 'json',
 
         success: function (data) {
             let resultado= data;
             if (resultado.respuesta==='existe') {
 
                 Swal.fire(
                     'Error !!',
                     'La Marca ya existe, intente con otro ',
                     'error'
                   )
                 
             } else if (resultado.respuesta ==='insertado') {
                
                 
                 Swal.fire(
                     'Listo !!',
                     'Marca Añadida ',
                     'success'
                     )
     
                     //   refrescarndo el formulario
                       $('#agregar-marca')[0].reset();
                       agregarFila(resultado.id,resultado.marca);
 
             } else {
                 Swal.fire(
                     'Hubo un Error !!',
                     'Marca no agregada, intente de nuevo ',
                     'error'
                 )
             }
         }
        });    
     }); 

     $('.tabla-crud-marcas').on('click','.borrar-registro', function name(e) {
        e.preventDefault();

        let id=$(this).attr('data-id');
        let tipo=$(this).attr('data-tipo');
        let padre=$(this).parents('tr');

        eliminarRegisttro(id,tipo,padre);
        
        
    });

    $('.tabla-crud-marcas').on('click','.editar-registro',function () {
       let id=$(this).attr('data-id');
       let marca=$(this).attr('data-marca');

       $('#campo_marca').attr('value',marca);
       $('#id_marca').attr('value',id);
              
    });

    $('#editar-marca').on('submit',function (e) {
        e.preventDefault();

        let datos=$(this).serializeArray();
 
        $.ajax({
 
         type: $(this).attr('method'),
 
         data: datos,
 
         url: $(this).attr('action'),
 
         dataType: 'json',
 
         success: function (data) {
             let resultado= data;
             
            //  console.log(resultado);
             if (resultado.respuesta==='existe') {
 
                Swal.fire(
                    'Error !!',
                    'la marca ya existe, intente con otro ',
                    'error'
                  )
                
            } else if (resultado.respuesta ==='actualizado') {
                Swal.fire(
                    'Listo !!',
                    'Marca Modificada ',
                    'success'
                    )
    
                    
                      setTimeout(function(){
                            window.location.href='crud-marcas.php';
                       }, 2000);
                      

            } else {
                Swal.fire(
                    'Error !!',
                    'La marca no se modifico!, intente de nuevo ',
                    'error'
                )
            }
            
             
        }

        }); 
    });
 
    

// ***********************fin marcas************************

// ********** categorias*********************

    $('#agregar-categoria').on('submit', function (e) {
        e.preventDefault();

        
        let datos=$(this).serializeArray();


        $.ajax({

        type: $(this).attr('method'),

        data: datos,

        url: $(this).attr('action'),

        dataType: 'json',

        success: function (data) {
            let resultado= data;
            
            if (resultado.respuesta==='existe') {

                Swal.fire(
                    'Error !!',
                    'La Categoria ya existe, intente con otro ',
                    'error'
                )
                
            } else if (resultado.respuesta ==='insertado') {
                
                
                Swal.fire(
                    'Listo !!',
                    'Categoria Añadida ',
                    'success'
                    )
    
                    //   refrescarndo el formulario
                    $('#agregar-categoria')[0].reset();
                    agregarFilaCategoria(resultado.id,resultado.categoria,resultado.descripcion);

            } else {
                Swal.fire(
                    'Hubo un Error !!',
                    'Categoria no agregada, intente de nuevo ',
                    'error'
                )
            }
        }
        });    
    }); 



    $('.tabla-crud-categorias').on('click','.borrar-registro', function (e) {
        e.preventDefault();

        let id=$(this).attr('data-id');
        let tipo=$(this).attr('data-tipo');
        let padre=$(this).parents('tr');

        eliminarRegisttro(id,tipo,padre);
        
        
    });

    $('.cancelar-agregar-categoria').on('click',function () {
        window.location.href='crud-categorias.php';
        
    });

    $('.tabla-crud-categorias').on('click','.btn-editar-categoria',function () {
        let id=$(this).attr('data-id');

        
        
        let datos={accion:'extraer-datos',id:id};

        $.ajax({
 
            method: 'POST',
    
            data: datos,
    
            url: 'procesos/procesar-categoria.php',
    
            dataType: 'json',
            
            success: function (data) {
                let resultado= data;
                
                
                if (resultado.respuesta ==='exito') {
                   
                    $('#editar-categoria #categoria').attr('value',resultado.categoria);
                    $('#editar-categoria #descripcion').attr('value',resultado.descripcion);
                    $('#editar-categoria #id_categoria').attr('value',resultado.id);

                }
            }
           });  


        
    });

    $('#editar-categoria').on('submit',function (e) {
        e.preventDefault();
        let datos=$(this).serializeArray();
 
        $.ajax({
 
         type: $(this).attr('method'),
 
         data: datos,
 
         url: $(this).attr('action'),
 
         dataType: 'json',
 
         success: function (data) {
             let resultado= data;
             
             console.log(resultado);
             if (resultado.respuesta==='existe') {
 
                Swal.fire(
                    'Error !!',
                    'la Categoria ya existe, intente con otro ',
                    'error'
                  )
                
            } else if (resultado.respuesta ==='actualizado') {
                Swal.fire(
                    'Listo !!',
                    'Categoria Modificada ',
                    'success'
                    )
    
                    
                      setTimeout(function(){
                            window.location.href='crud-categorias.php';
                       }, 2000);
                      

            } else {
                Swal.fire(
                    'Error !!',
                    'La Categoria no se modifico!, intente de nuevo ',
                    'error'
                )
            }
            
             
        }

        }); 
        
    });

// ************************fin categorias******************************

// **************************** productos******************************
    $('#registrar-producto').on('submit', function (e) {
        e.preventDefault();

        
        let datos=new FormData(this);


        $.ajax({

        type: $(this).attr('method'),

        data: datos,

        url: $(this).attr('action'),

        dataType: 'json',
        contentType: false,
        processData: false,
        async: true,
        cache: false,

        success: function (data) {
            let resultado= data;
            
            console.log(data);
            
            if (resultado.respuesta==='existe') {

                Swal.fire(
                    'Error !!',
                    'El nombre del producto ya existe, intente con otro ',
                    'error'
                )
                
            } else if (resultado.respuesta ==='insertado') {
                
                
                Swal.fire(
                    'Listo !!',
                    'Producto Añadido ',
                    'success'
                    )

                    //   refrescarndo el formulario
                    $('#registrar-producto')[0].reset();

            } else {
                Swal.fire(
                    'Hubo un Error !!',
                    'Producto no agregado, intente de nuevo ',
                    'error'
                )
            }
        }
        });    
    }); 

    $('.tabla-ver-productos').on('click','.borrar-registro', function (e) {
        e.preventDefault();

        let id=$(this).attr('data-id');
        let tipo=$(this).attr('data-tipo');
        let padre=$(this).parents('tr');

        eliminarRegisttro(id,tipo,padre);
        
        
    });

    $('#editar-producto').on('submit', function (e) {
        e.preventDefault();
 
        
        let datos=new FormData(this);
 
        $.ajax({
 
        type: $(this).attr('method'),
 
        data: datos,
 
        url: $(this).attr('action'),
 
        dataType: 'json',
        contentType: false,
        processData: false,
        async: true,
        cache: false,

 
         success: function (data) {
             let resultado= data;
             
            
             
             if (resultado.respuesta==='existe') {
 
                 Swal.fire(
                     'Error !!',
                     'Ya existe un producto con el mismo nombre, intente con otro ',
                     'error'
                   )
                 
             } else if (resultado.respuesta ==='actualizado') {
                 Swal.fire(
                     'Listo !!',
                     'Producto Modificado ',
                     'success'
                     )
     
                    // refrescarndo el formulario
                    $('#editar-producto')[0].reset();
                        setTimeout(function(){
                        window.location.href= 'ver-productos.php';
                    }, 2000);
                       
 
             } else {
                 Swal.fire(
                     'Error !!',
                     'El Producto no se modifico!, intente de nuevo ',
                     'error'
                 )
             }
        }

        }); 
           
     }); 



    $('.tabla-ver-productos').on('click','.btn-agregar-stock',function () {
        let id=$(this).attr('data-id');

        
        
        let datos={accion:'extraer-datos',id:id};

        //console.log(id);
        

        $.ajax({
 
            method: 'POST',
    
            data: datos,
    
            url: 'procesos/procesar-producto.php',
    
            dataType: 'json',
            
            success: function (data) {
                let resultado= data;
                
                //console.log(resultado);

                let contenedor=$('#modal-stock .cont-producto');
                $('#modal-stock #id-producto').attr('value',id);

                //console.log(contenedorId);
                

                let html=`
                    <dl>
                        <dt>Producto:</dt>
                        <dd>${resultado.producto.producto}</dd>
                        <dt>Stock Actual:</dt>
                        <dd>${resultado.producto.stock}</dd>
                        <dt>Precio:</dt>
                        <dd>${resultado.producto.precio_venta}</dd>
                        <dt>Marca</dt>
                        <dd>${resultado.producto.marca}</dd>
                    </dl>
                `;

                contenedor.html(html);
                   
                
            }
           });  


        
    });

    $('#formulario-actualizar-stock').on('submit',function (e) {
        e.preventDefault();

        let datos=$(this).serializeArray();


        $.ajax({

            type: $(this).attr('method'),

            data: datos,
    
            url: $(this).attr('action'),
    
            dataType: 'json',

            success: function (data) {
                let resultado= data;
                
                //console.log(data);
                
                if (resultado.respuesta==='exitoso') {

                    Swal.fire(
                        'Listo !!',
                        'Stock Actualizado',
                        'success'
                    )

                    $('#formulario-actualizar-stock')[0].reset();
                    
                } else {
                    Swal.fire(
                        'Hubo un Error !!',
                        'Intente de nuevo ',
                        'error'
                    )
                }
            }
        });   

    })


    // validar campo stok
    $('#modal-stock #modal-cantidad-stock').on('input',function () {
        this.value = this.value.replace(/[^0-9]/g,'');
    });

// **************************** fin productos******************************



// ****************************** pagos  *******************


$('.btn-ver-pagar').on('click', function name() {

    let boton =$(this);

    let id=$(this).attr('data-id');
    let estado= $('span.badge-pill');
    
    let datos={ accion:'pagar', id:id};
    //console.log(boton);
    
    

    Swal.fire({
        title: 'Desea cambiar el estado a Pagado?',
        text: "Esta accion no se puede deshacer!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, confirmar!'
      }).then((result) => {
        if (result.value) {

            $.ajax({
                method: 'POST',
    
                url: `procesos/procesar-venta.php`,
                
                data: datos,
                dataType: 'json',
    
                success: function (datas) {
                    let resultado=datas;
                    //console.log(resultado);
                    

                    if (resultado.respuesta =='exitoso') {

                        Swal.fire(
                            'Listo !!',
                            'Venta Registrada',
                            'success'
                        );

                        estado.removeClass('badge-primary');
                        estado.addClass('badge-success');
                        estado.html('Pagado');
                        boton.attr('disabled','disabled');
                        boton.attr('data-id','');
                    } else {
                        Swal.fire(
                            'Error !!',
                            'Ocurrio un error, intente de nuevo',
                            'error'
                        );
                    }
                    

                }
            });
            
        }
    })
    
    
    
    
    
});


$('.tabla-crud-pedidos').on('click','.btn-pagar', function name(e) {
    e.preventDefault();

    let boton =$(this);

    let id=$(this).attr('data-id');
    let estado=$(this).parents('tr').find('.badge');
    
    let datos={ accion:'pagar', id:id};
    //console.log(boton);
    
    

    Swal.fire({
        title: 'Desea cambiar el estado a Pagado?',
        text: "Esta accion no se puede deshacer!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, confirmar!'
      }).then((result) => {
        if (result.value) {

            $.ajax({
                method: 'POST',
    
                url: `procesos/procesar-venta.php`,
                
                data: datos,
                dataType: 'json',
    
                success: function (datas) {
                    let resultado=datas;
                    //console.log(resultado);
                    

                    if (resultado.respuesta =='exitoso') {

                        Swal.fire(
                            'Listo !!',
                            'Venta Registrada',
                            'success'
                        );

                        estado.removeClass('badge-primary');
                        estado.addClass('badge-success');
                        estado.html('Pagado');
                        boton.attr('disabled','disabled');
                        boton.attr('data-id','');
                    } else {
                        Swal.fire(
                            'Error !!',
                            'Ocurrio un error, intente de nuevo',
                            'error'
                        );
                    }
                    

                }
            });
            
        }
    })
    
    
    
    
    
});

// ****************************** pagos  *******************



    function longitudPassword() {
        let errorDiv=$('#errorPass');
        let password=$('#password').val();
        let confirmPassword=$('#confirmarPassword').val();
        let errorDiv1=$('#error');

          if(password.length < 8){
            
            $('#password').css({'border':'1px solid red'});
            errorDiv.removeClass();
 
            errorDiv.addClass('alert alert-danger');
            errorDiv.html( 'almenos 8 caracteres');
          }else{
            
            $('#password').css({'border':'1px solid silver'});
            errorDiv.removeClass();
            errorDiv.addClass('hidden');
            errorDiv.html( '');
          }
   
  
          if (password===confirmPassword) {
              
              $('#confirmarPassword').css({'border':'1px solid silver'});
              errorDiv1.removeClass();
              errorDiv1.removeClass('hidden');
              errorDiv1.addClass('alert alert-success');
              errorDiv1.html( "correcto...");
          }else{
  
              $('#confirmarPassword').css({'border':'1px solid red'});
              errorDiv1.removeClass();
              errorDiv1.removeClass('hidden');
              errorDiv1.addClass('alert alert-danger');
              errorDiv1.html( 'error: las contraseñas no coinciden');
          }
    }

    function compararPassword() {

        let usuario=$('#usuario').val();
        let botonRegistrar=$('#botonRegistrar');
       let confirmPassword=$('#confirmarPassword').val();
       let password=$('#password').val();

        if(password===confirmPassword && usuario.length>3 && password.length>7){
            botonRegistrar.removeAttr('disabled');
            
        }else{
            botonRegistrar.attr('disabled', true); 
        }
        
    }

    function agregarFila(id, marca) {

        let htmlTags = `
        <tr>
            <td>  ${marca}  </td>

            <td>
                <a href="#"
                    class="btn bg-orange  " data-toggle="modal" data-target="#modal-editar-marca" 
                    data-id="${id}"
                    data-marca="${marca}"
                    >
                    <i class="fas fa-pen text-light "></i>
                </a>
                <a href="#" data-id="${id}" data-tipo="eliminar"
                    class="btn bg-maroon " >
                    <i class=" fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>`;
           
        $('.tabla-crud-marcas tbody').append(htmlTags);
    }

    function agregarFilaCategoria(id,categoria,descripcion) {

        let htmlTags = `
        <tr>
            <td>  ${categoria}  </td>
            <td>  ${descripcion}  </td>
            <td>
                <a href="#"
                    class="btn bg-orange btn-editar-categoria" data-toggle="modal" 
                    data-target="#modal-editar-categoria" 
                    data-id="${id}"
                    >
                    <i class="fas fa-pen text-light "></i>
                </a>
                <a href="#" data-id="${id}" data-tipo="categoria"
                    class="btn bg-maroon " >
                    <i class=" fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>`;
           
        $('.tabla-crud-categorias tbody').append(htmlTags);
    }


    // eliminar para cuaalquier tabla
    function eliminarRegisttro(id,tipo,padre) {
        
        let datos={accion:'borrar',id:id};
        
        Swal.fire({
            title: 'Estas seguro?',
            text: "Esta accion no se puede deshacer!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!'
          }).then((result) => {
            if (result.value) {

                $.ajax({
                    method: 'POST',
        
                    url: `procesos/procesar-${tipo}.php`,
                    
                    data: datos,
                    dataType: 'json',
        
                    success: function (datas) {
                        let resultado=datas;

                        if (resultado.respuesta ==='eliminado') {
                            Swal.fire(
                                'Listo !!',
                                tipo+' Eliminado',
                                'success'
                            );
                            padre.remove();
                        } else {
                            Swal.fire(
                                'Error !!',
                                'El '+tipo+' no se elimino, intente de nuevo',
                                'error'
                            );
                        }
                        

                    }
                });
                
            }
        })
        
        
    }

    $(document).ready(function(){

        let alerta=$('.alerta-stock');

        let datos={accion:'stock'};
        
        $.ajax({
            method: 'POST',

            url: `procesos/procesar-producto.php`,
            
            data: datos,
            dataType: 'json',

            success: function (datas) {
                let resultado=datas;
                //console.log(resultado);
                

                if (resultado.respuesta ==='exitoso') {
                    if (resultado.valor>0) {
                        
                        alerta.addClass('badge-danger');
                    }else{
                        alerta.addClass('badge-info')
                    }
                    alerta.html(resultado.valor);
                }
            }
        });
        
    });


    
});


$(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for glyphicon and font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var glyph = $this.hasClass('glyphicon')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (glyph) {
        $this.toggleClass('glyphicon-star')
        $this.toggleClass('glyphicon-star-empty')
      }

      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })



    


});


$(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.

    $.getJSON('procesos/servicios.php',function (datas) {
        
        let resultado=datas;
        let meses=[];
        let cantidad=[];
        resultado.forEach(element=>{
            meses.push(element.mes);
            cantidad.push(element.cantidad);
        });
        // console.log(meses);
        // console.log(cantidad);
        
        
        
    //    console.log(datas);
       var areaChartData = {
        labels  : meses,
        datasets: [
          {
            label               : 'Digital Goods',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : cantidad
          },
          {
  
          },
        ]
      }

      var areaChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines : {
              display : false,
            }
          }],
          yAxes: [{
            gridLines : {
              display : false,
            }
          }]
        }
      }
  
      // This will get the first returned node in the jQuery collection.
  
  
      //-------------
      //- LINE CHART -
      //--------------
      var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
      var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
      var lineChartData = jQuery.extend(true, {}, areaChartData)
      lineChartData.datasets[0].fill = false;
      lineChartData.datasets[1].fill = false;
      lineChartOptions.datasetFill = false
  
      var lineChart = new Chart(lineChartCanvas, { 
        type: 'line',
        data: lineChartData, 
        options: lineChartOptions
      })
    });

    

 

   
})

