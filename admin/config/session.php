<?php

function usuarioAutenticado()
{
    if (!revisarUsuario()) {
        header('location: ../index.php');

    }
}
function revisarUsuario()
{
    return (isset($_SESSION['user']) && $_SESSION['user']=='admin' );
}
session_start();
usuarioAutenticado();


?>