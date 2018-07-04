<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Login Seguro | Comunicaciones de Red Seguras</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="Fran Puebla" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="assets/css/googlefonts.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2-metronic.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<!--<a href="#">
		<img src="assets/img/logo-big - copia.png" alt=""/>
	</a>-->
	<h3 class="form-title">Login Seguro | Comunicaciones de Red Seguras</h3>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="#" method="post">
		<h3 class="form-title">Ingresar</h3>
		
		<div class="alert alert-danger display-none">
			<button class="close" data-close="alert"></button>
			<span id="txt_login_errores"></span>
		</div>
		
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Usuario</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="username" id="login_username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Clave</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Clave" name="password" id="login_password"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Token</label>
			<div class="input-icon">
				<i class="fa fa-key"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Token" name="token" id="login_token"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn blue pull-right" id="login-submit-btn">
			<img src="assets/img/loaderblue.gif" style="display:none;">Entrar <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
		
		<div class="create-account">
			<p>
				 ¿No tenés cuenta?&nbsp;
				<a href="javascript:;" id="register-btn">
					 Registrate
				</a>
			</p>
		</div>
	</form>
	<!-- END LOGIN FORM -->
	
	<!-- BEGIN REGISTRATION FORM -->
	<form class="register-form" action="#" method="post">
		<h3>Nuevo Usuario</h3>
		
		<div class="alert alert-danger display-none">
			<button class="close" data-close="alert"></button>
			<span id="txt_register_errores"></span>
		</div>
		
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Nombre Completo</label>
			<div class="input-icon">
				<i class="fa fa-font"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="Nombre Completo" name="fullname" id="registro_fullname"/>
			</div>
		</div>
		<!--<div class="form-group">-->
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<!--<label class="control-label visible-ie8 visible-ie9">Email</label>
			<div class="input-icon">
				<i class="fa fa-envelope"></i>
				<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" id="registro_email"/>
				<span class="input-group-addon">@franpuebla.com</span>
			</div>
		</div>-->

		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Email</label>
			<div class="input-group input-icon">
				<i class="fa fa-envelope"></i>
				<!--<i class="fa fa-envelope"><span class="input-group-addon">@franpuebla.com</span></i>-->
				<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email_registro" id="registro_email">
				<span class="input-group-addon">@franpuebla.com</span>
			</div>
		</div>

		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Usuario</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Usuario" name="username" id="registro_username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Clave</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Clave" name="password"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Confirmá tu Clave</label>
			<div class="controls">
				<div class="input-icon">
					<i class="fa fa-check"></i>
					<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Confirmá tu Clave" name="rpassword" id="registro_rpassword"/>
				</div>
			</div>
		</div>
		<div class="form-actions">
			<button id="register-back-btn" type="button" class="btn">
			<i class="m-icon-swapleft"></i> Volver </button>
			<button type="submit" id="register-submit-btn" class="btn blue pull-right">
			<img src="assets/img/loaderblue.gif" style="display:none;">Enviar <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
	<!-- END REGISTRATION FORM -->
	
	<!-- BEGIN QR Y SECRETO -->
	<!--<div id="qr_secreto" style="display:none;">
		<div class="alert alert-success alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
			<p id="txt_registro_exitoso"></p>
		</div>
		<h3 align="center">Generador de Tokens</h3>
		<p align="center">
			 Escaneá el código o ingresalo en tu autenticador.
		</p>
		<p align="center">
			<img id="img_qr_secreto" src="">
		</p>
		<p align="center" style="margin-top:20px;margin-bottom:20px;">
			 <span id="txt_qr_secreto" class="label label-danger" style="font-size: 170%;font-weight: bold;"></span>
		</p>
		<button class="btn green btn-block" onClick="window.location.reload()">Listo</button>
	</div>-->

	<div id="registro_exitoso" style="display:none;">
		<div class="alert alert-success">
			<strong id="txt_registro_exitoso"></strong>
		</div>
		<a href="inicio.php"><button class="btn green btn-block">Volver</button></a>
	</div>
	<!-- END QR Y SECRETO -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2018 &copy; Universidad de Mendoza - Fran Puebla
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
	<script src="assets/plugins/respond.min.js"></script>
	<script src="assets/plugins/excanvas.min.js"></script> 
	<![endif]-->
<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/localization/messages_es.js" type="text/javascript"></script>
<script src="assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/core/app.js" type="text/javascript"></script>
<script src="assets/scripts/custom/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
	jQuery(document).ready(function() {     
	  App.init();
	  Login.init();
	});
</script>

<script type="text/javascript">
	function registrarUsuario(){
	  //Deshabilitamos el botón enviar y colocamos el loader
	  $('#register-submit-btn').addClass('disabled');
	  $('#register-submit-btn').html('<img src="assets/img/loaderblue.gif">');
	  
	  var formData = {
			'fullname' 			: $('#registro_fullname').val(),
			'email' 			: $('#registro_email').val(),
			'username' 			: $('#registro_username').val(),
			'password' 			: $('#register_password').val(),
			'rpassword' 		: $('#registro_rpassword').val()
	  };
	  
	  $.ajax({
			type 		: 'POST',
			url 		: 'registrarusuarioexterno.php',
			data 		: formData,
			dataType 	: 'json'
		}).done(function(data){
			//Al terminar volvemos a la normalidad el botón enviar
			$('#register-submit-btn').html('Enviar <i class="m-icon-swapright m-icon-white">');
			$('#register-submit-btn').removeClass('disabled');

			//Si hubo un error
			if ( !data.success) {
			
				if (data.errors.errordb) {
					alert(data.errors.errordb);
				}
				if (data.errors.fullname) {
					alert(data.errors.fullname);
				}
				if (data.errors.email) {
					alert(data.errors.email);
				}
				if (data.errors.username) {
					alert(data.errors.username);
				}
				if (data.errors.password) {
					alert(data.errors.password);
				}
				if (data.errors.rpassword) {
					alert(data.errors.rpassword);
				}
				if (data.errors.rpasswordmatch) {
					alert(data.errors.rpasswordmatch);
				}
				if (data.errors.usernameexist) {
					//alert(data.errors.usernameexist);
					$('#txt_register_errores').text(data.errors.usernameexist);
					$('.alert-danger', $('.register-form')).show();
				}
				if (data.errors.emailexist) {
					//alert(data.errors.emailexist);
					$('#txt_register_errores').text(data.errors.emailexist);
					$('.alert-danger', $('.register-form')).show();
				}
			} else {

				// Si todo está bien
				$('#txt_registro_exitoso').html(data.message);
				$('#img_qr_secreto').attr("src",data.qr);
				$('#txt_qr_secreto').html(data.secreto);
				$('.register-form').hide();
				//$('#qr_secreto').show();
				$('#registro_exitoso').show();
				

			}
		}).fail(function(data) {
			$('#register-submit-btn').html('Enviar <i class="m-icon-swapright m-icon-white">');
			$('#register-submit-btn').removeClass('disabled');
			alert('Fallo de AJAX');
		});
	}
</script>
<script type="text/javascript">
	function loguearUsuario(){
	  //Deshabilitamos el botón enviar y colocamos el loader
	  $('#login-submit-btn').addClass('disabled');
	  $('#login-submit-btn').html('<img src="assets/img/loaderblue.gif">');
	  
	  var formData = {
			'username' 			: $('#login_username').val(),
			'password' 			: $('#login_password').val(),
			'token' 			: $('#login_token').val()
	  };
	  
	  $.ajax({
			type 		: 'POST',
			url 		: 'loguearusuario.php',
			data 		: formData,
			dataType 	: 'json'
		}).done(function(data){

			//Si hubo un error
			//Volvemos a la normalidad el botón enviar
			$('#login-submit-btn').html('Enviar <i class="m-icon-swapright m-icon-white">');
			$('#login-submit-btn').removeClass('disabled');
			
			if ( !data.success) {
			
				if (data.errors.errordb) {
					alert(data.errors.errordb);
				}
				if (data.errors.username) {
					alert(data.errors.username);
				}
				if (data.errors.password) {
					alert(data.errors.password);
				}
				if (data.errors.token) {
					alert(data.errors.token);
				}
				if (data.errors.wronguserpass) {
					//alert(data.errors.wronguserpass);
					$('#txt_login_errores').text(data.errors.wronguserpass);
					$('.alert-danger', $('.login-form')).show();
				}
				if (data.errors.tokeninvalido) {
					//alert(data.errors.tokeninvalido);
					$('#txt_login_errores').text(data.errors.tokeninvalido);
					$('.alert-danger', $('.login-form')).show();
				}
				
			} else {

				// Si todo está bien
				//alert("Login Correcto: "+data.nombre);
				window.location = 'index.php';
				

			}
		}).fail(function(data) {
			$('#login-submit-btn').html('Enviar <i class="m-icon-swapright m-icon-white">');
			$('#login-submit-btn').removeClass('disabled');
			alert('Fallo de AJAX');
		});
	}
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>