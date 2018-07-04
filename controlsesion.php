<?php 
	session_start(); 
	if(!isset($_SESSION['usuario'])) { //Comprobamos que la sesión se haya iniciado
		header("Location: login.php");
	}
?>