<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Electro - HTML Ecommerce Template</title>

    <!-- Google font -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/css.css">
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">

    <meta name="theme-color" content="#fafafa">
    <link rel="shortcut icon" href="icon.png"> 
    <link rel="stylesheet" href="css/estilos.css">
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css">


</head>

<body>

    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +591 2245872 (ficticio)</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> PcBolivia2019@gmail.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i>  La Paz Zona 1 #1234</a></li>
                </ul>
                <ul class="header-links pull-right">
                    <?php 
                        if (!isset($_SESSION['user'])) { ?>
                    
                        <li><a href="registro.php"><i class="fa fa-registered"></i> Registro</a></li>
                        <li><a data-toggle="modal" data-target="#login"><i class="fa fa-user-o"></i>Login</a></li>

                    <?php }else{ ?>
                        <li><a href="index.php?salir=true"><i class="fa fa-sign-out"></i>Cerrar Session</a></li>

                    <?php } ?>
                </ul>
            </div>
        </div>



