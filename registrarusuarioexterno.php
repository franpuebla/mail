<?php
require_once('datosaccesodbpostfix.php');

$errors     = array();  	// array para almacenar errores y validaciones
$data 			= array(); 		// array para devolver datos

//Variables predefinidas
$dominio = "franpuebla.com";

//Conectamos con la DB
$conexion = mysqli_connect($host, $usuario, $clave, $db);
if (mysqli_connect_errno()) {
	$errors['errordb'] = 'Fallo al intentar conectar con la base de datos';
}else{
	//Validaciones
	if (empty($_POST['fullname'])){
		$errors['fullname'] = 'Ingrese un nombre';
	}
	if (empty($_POST['email'])){
		$errors['email'] = 'Ingrese un email';
	}
	if (empty($_POST['password'])){
		$errors['password'] = 'Ingrese una clave';
	}
	if (empty($_POST['rpassword'])){
		$errors['rpassword'] = 'Ingrese un usuario';
	}
	if (!empty($_POST['password']) AND !empty($_POST['rpassword'])){
		if ($_POST['rpassword'] != $_POST['password']){
			$errors['rpasswordmatch'] = 'Las claves no coinciden';
		}
	}
	//Si no hay errores hasta ahora
	if ( empty($errors)) {
		//Armamos el mail
		$local_part = $_POST['email'];
		$email = $_POST['email']."@".$dominio;

		//Compruebo que no haya alguien ya registrado con ese email
		/* Preparo la consulta */
		mysqli_query($conexion, "SET NAMES 'utf8'");
		if( $consulta = mysqli_prepare($conexion, "SELECT * FROM mailbox WHERE username=?") ){

			/* Preparo los parametros "?" s - string, b - blob, i - int, etc */
			mysqli_stmt_bind_param($consulta, "s", $email);

			/* La ejecuto */
			if(!mysqli_stmt_execute($consulta)){
				$errors['errordb'] = 'Fallo al intentar consultar la base de datos';
			}
			mysqli_stmt_store_result($consulta);

			$filasdevueltas = mysqli_stmt_num_rows($consulta);

			if($filasdevueltas > 0){
				$errors['usernameexist'] = 'El email ingresado ya existe';
			}


			/* Cierro consulta */
			mysqli_stmt_close($consulta);
		}else{
			$errors['errordb'] = 'Fallo al intentar consultar la base de datos';
		}
	}

	//Si no hay errores hasta ahora
	if ( empty($errors)) {
		//Ingreso al usuario en la DB
		/* Preparo la consulta */
		if( $consulta = mysqli_prepare($conexion, "INSERT INTO mailbox (username, password, name, maildir, quota, local_part, domain, created, modified, active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)") ){

			//Variables predefinidas
			//$clear = "";
			//$uid = 5000;
			//$gid = 5000;
			//$home = "/home/vmail";
			$quota = 10240000;
			$created = date("Y-m-d H:i:s");
			$modified = date("Y-m-d H:i:s");
			//echo $created;
			$maildir = $dominio."/".$local_part."/";
			//$imapok = 1;
			$password = md5($_POST['password']);
			$passwordmd5 = "{md5raw}".$password;
			$active = 0;
			/*if ($_POST['activo'] == 'true'){
				$active = 1; //1 -> Activo | 0 -> Inactivo
			}else{
				$active = 0; //1 -> Activo | 0 -> Inactivo
			}
			*/
			//$bool2 = 1;

			/* Preparo los parametros "?" s - string, b - blob, i - int, etc */
			mysqli_stmt_bind_param($consulta, "ssssissssi", $email, $passwordmd5, $_POST['fullname'], $maildir, $quota, $local_part, $dominio, $created, $modified, $active);

			/* La ejecuto */
			if(!mysqli_stmt_execute($consulta)){
				$errors['errordb'] = 'Fallo al intentar escribir en la base de datos.'.mysqli_error($conexion);
			}

			/* Cierro consulta */
			mysqli_stmt_close($consulta);

			//ENVIAMOS MAIL DE BIENVENIDA (PARA CREAR ARBOL DE DIRECTORIOS DE MAILDIR)
			$destinatario = $email;
			$asunto = "Bienvenido!";
			$cuerpo = '
			<html>
			<head>
			   <title>Bienvenido al Sistema</title>
			</head>
			<body>
			<h1>Hola '.$_POST['fullname'].'!</h1>
			<p>
			<b>Bienvenido a MAIL.FRANPUEBLA.COM</b>.
			</p>
			</body>
			</html>
			';

			//para el envío en formato HTML
			$headers = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

			//dirección del remitente
			$headers .= "From: Sistema <info@franpuebla.com>\r\n";


			mail($destinatario,$asunto,$cuerpo,$headers);


		}else{
			$errors['errordb'] = 'Fallo al intentar prepara consulta';
		}
	}

	mysqli_close($conexion);

}
// Devolvemos una respuesta

// Si hay errores
if ( !empty($errors)) {
	$data['success'] = false;
	$data['errors']  = $errors;
} else {

	// Si no hay errores
	$data['success'] = true;
	$data['message'] = 'Email registrado!';
}

// Enviamos los datos de respuesta
echo json_encode($data);

?>