<?php
$asunto="Solicitud de Pedido de productos a PCBolivia";
$header="MIME-Version: 1.0 \r\n". 'From:PCBolivia <marco.chambi20@gmail.com>' . "\r\n" . 'Reply-To: marco.chambi20@gmail.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
$mensaje="Holaaaa probandooo";
$correo="marcos.chambi20@gmail.com";

if (@mail($correo,$asunto,$mensaje,$header)) {
    echo 'enviado';
}else {
    
    echo 'no enviado';
}

?>