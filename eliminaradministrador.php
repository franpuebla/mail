<?php require_once('controlsesion.php'); ?>

<?php
//Conectamos con la DB

require_once('datosaccesodb.php');
$conexion = mysqli_connect($host, $usuario, $clave, $db);
if (mysqli_connect_errno()) {
	echo "Fallo al intentar conectar con la base de datos: (" . mysqli_connect_errno() . ")";
	die();
}
mysqli_query($conexion, "SET NAMES 'utf8'");


//Borramos el lugar
$sql = "DELETE FROM usuarios WHERE id=".$_GET['id'];
if (!mysqli_query($conexion, $sql)){
	echo "Fallo al intentar borrar lugar: (" . mysqli_connect_errno() . ")";
	die();
}
mysqli_close($conexion);
header("Location: administradores.php");
?>