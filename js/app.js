$(function () {
    'use strict';
    
    
    // colocando la clase activa a la navegacion
    let url = window.location.pathname, 
    urlRegExp = new RegExp(url.replace(/\/$/,'') + "$"); 
    $('#navigation ul.main-nav  li a').each(function(){

        if(urlRegExp.test(this.href.replace(/\/$/,''))){
            $(this).parents('li').addClass('active');
        }
    });

    //$("#navigation ul.main-nav  li:has(a[href$='"+window.location.pathname+"'])").addClass("active");

  
 

     $('#editar-cliente').on('submit', function (e) {
        e.preventDefault();
 
        
        let datos=$(this).serializeArray();
 
 
        $.ajax({
 
         type: $(this).attr('method'),
 
         data: datos,
 
         url: $(this).attr('action'),
 
         dataType: 'json',
 
         success: function (data) {
             let resultado= data;
             
             //console.log(resultado);
             
            if (resultado.respuesta ==='actualizado') {
                 Swal.fire(
                     'Listo !!',
                     'Datos modificados.. ',
                     'success'
                     )
     
                     setTimeout(() => {
                        window.location.href= 'index.php';
                     }, 2000);
                     
                       
 
             } else {
                 Swal.fire(
                     'Error !!',
                     'No se Actualizo, intente de nuevo ',
                     'error'
                 )
             }
         }
        });    
     }); 

     
     $('#login-ingresar').on('submit', function (e) {
        e.preventDefault();
        
        
 
        
        let datos=$(this).serializeArray();
 
 
        $.ajax({
 
         type: $(this).attr('method'),
 
         data: datos,
 
         url: $(this).attr('action'),
 
         dataType: 'json',
 
         success: function (data) {
             let resultado= data;
             
             //console.log(resultado);
             
            if (resultado.respuesta ==='exito') {
                 Swal.fire(
                     'Listo !!',
                     'Bienvenido '+resultado.nombre,
                     'success'
                     )
     
                    
                    setTimeout(() => {

                        if (resultado.tipo==='admin') {
                            window.location.href= 'admin/index.php';
                        }else{
                            location.reload();
                       }
                        
                    }, 2000);
                     
                       
 
             } else {
                 Swal.fire(
                     'Error !!',
                     'correo o passowrd incorrectos, intente de nuevo ',
                     'error'
                 )
             }
         }
        });    
     }); 




    //  procesar reseña

     $('#reseña-producto').on('submit', function (e) {
        e.preventDefault();
        
        
 
        
        let datos=$(this).serializeArray();
 
 
        $.ajax({
 
         type: $(this).attr('method'),
 
         data: datos,
 
         url: $(this).attr('action'),
 
         dataType: 'json',
 
         success: function (data) {
             let resultado= data;
   
             
            if (resultado.respuesta ==='exito') {
                 Swal.fire(
                     'Listo !!',
                     'Gracias por calificar este producto ',
                     'success'
                     )
     
                    document.querySelector('#reseña-producto').reset();
 
             } else {
                 Swal.fire(
                     'Error !!',
                     'ocurrio un error al procesar la reseña, intente de nuevo ',
                     'error'
                 )
             }
         }
        });    
     }); 


     //newsletter
     $('#mc-embedded-subscribe-form').on('submit',function (e) {
         e.preventDefault();

        Swal.fire({
            title: 'Gracias Por Suscribirte.',
            width: 600,
            padding: '3em',
            background: '#fff ',
            backdrop: `
            #1e1f29be
            center left
            no-repeat
            `
        })

        document.querySelector('#mc-embedded-subscribe-form').reset();
     });


    //  contacto
     $('#contactar').on('submit', function (e) {
        e.preventDefault();
 
        
        let datos=$(this).serializeArray();
 
 
        $.ajax({
 
         type: $(this).attr('method'),
 
         data: datos,
 
         url: $(this).attr('action'),
 
         dataType: 'json',
 
         success: function (data) {
             let resultado= data;
             
             //console.log(resultado);
             
            if (resultado.respuesta ==='insertado') {
                 Swal.fire(
                     'Listo !!',
                     'Gracias por contactarnos, le responderemos a la brevedad Posible',
                     'success'
                     )

                     $('#contactar')[0].reset();
                       
 
            } else {
                 Swal.fire(
                     'Error !!',
                     'Ocurrio un error, intente de nuevo ',
                     'error'
                 )
             }
         }
        });    
     }); 


 
    
});

