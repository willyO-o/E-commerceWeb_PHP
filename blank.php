<?php 
	session_start();
	if (isset($_GET['salir'])) {
		session_unset();
		session_destroy();
		header('location: index.php');
	}
?>