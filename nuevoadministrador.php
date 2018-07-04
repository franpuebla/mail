<?php require_once('controlsesion.php'); ?>
<?php require_once('datosaccesodbsadmin.php'); ?>
<?php $titulo = "Administradores"; ?>

<?php require_once('fijo_html.php'); ?>
<head>
<?php require_once('fijo_head.php'); ?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/plugins/select2/select2.css"/>
<link rel="stylesheet" href="assets/plugins/data-tables/DT_bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
</head>

<body class="page-header-fixed ">
<?php require_once('fijo_header.php'); ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<?php require_once('fijo_sidebar.php'); ?>
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						Administradores
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="inicio.php">Inicio</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="administradores.php">Administradores</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Nuevo</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box blue">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-edit"></i>Nuevo Administrador
							</div>
						</div>
						<div class="portlet-body">
							<!-- BEGIN REGISTRATION FORM -->
							<form class="register-form" action="#" method="post">
								<h3>Nuevo Administrador</h3>

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
								<div class="form-group">
									<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
									<label class="control-label visible-ie8 visible-ie9">Email</label>
									<div class="input-icon">
										<i class="fa fa-envelope"></i>
										<input class="form-control placeholder-no-fix" type="text" placeholder="Email" name="email" id="registro_email"/>
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
									<a href="administradores.php"><button id="register-back-btn" type="button" class="btn">
									<i class="m-icon-swapleft"></i> Volver </button></a>
									<button type="submit" id="register-submit-btn" class="btn blue pull-right">
									<img src="assets/img/loaderblue.gif" style="display:none;">Enviar <i class="m-icon-swapright m-icon-white"></i>
									</button>
								</div>
							</form>
							<!-- END REGISTRATION FORM -->

							<!-- BEGIN QR Y SECRETO -->
								<div id="qr_secreto" style="display:none;">
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
								</div>
							<!-- END QR Y SECRETO -->

							<!-- REGISTRO EXITOSO -->
							<!--<div id="registro_exitoso" style="display:none;">
								<div class="alert alert-success">
									<strong id="txt_registro_exitoso"></strong>
								</div>
								<a href="administradores.php"><button class="btn green btn-block">Volver</button></a>
							</div>-->
							<!-- END REGISTRO EXITOSO -->

						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT -->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php require_once('fijo_footer.php'); ?>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<?php require_once('fijo_javascripts.php'); ?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/localization/messages_es.js" type="text/javascript"></script>
<script src="assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/core/metronic.js" type="text/javascript"></script>
<script src="assets/scripts/core/layout.js" type="text/javascript"></script>
<script src="assets/scripts/custom/nuevoadministrador.js"></script>

<script>
  jQuery(document).ready(function() {
     Metronic.init(); // init metronic core components
		 Layout.init(); // init current layout
		 NuevoAdministrador.init();
  });
</script>

<script type="text/javascript">
	function registrarUsuario(){
	  //Deshabilitamos el botón enviar y colocamos el loader
	  $('#register-submit-btn').addClass('disabled');
	  $('#register-submit-btn').html('<img src="assets/img/loaderblue.gif">');

	  var formData = {
			'fullname' 			: $('#registro_fullname').val(),
			'email' 				: $('#registro_email').val(),
			'username' 			: $('#registro_username').val(),
			'password' 			: $('#register_password').val(),
			'rpassword' 		: $('#registro_rpassword').val()
	  };

	  $.ajax({
			type 		: 'POST',
			url 		: 'registraradministrador.php',
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
				$('#qr_secreto').show();


			}
		}).fail(function(data) {
			$('#register-submit-btn').html('Enviar <i class="m-icon-swapright m-icon-white">');
			$('#register-submit-btn').removeClass('disabled');
			alert('Fallo de AJAX');
		});
	}
</script>
<!-- END PAGE JAVASCRIPTS -->
<!-- END JAVASCRIPTS -->
</body>
<?php require_once('fijo_htmlfin.php'); ?>