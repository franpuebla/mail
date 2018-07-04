<?php error_reporting(E_ALL); ?>
<?php ini_set('display_errors', 'On'); ?>
<?php require_once('controlsesion.php'); ?>
<?php require_once('datosaccesodbpostfix.php'); ?>
<?php $titulo = "Usuarios"; ?>

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
						Usuarios
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="inicio.php">Inicio</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="usuarios.php">Usuarios</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">Editar</a>
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
								<i class="fa fa-edit"></i>Editar Usuario
							</div>
						</div>
						<div class="portlet-body">
							<!-- BEGIN REGISTRATION FORM -->
							<?php
							//Conectamos con la DB
							$conexion = mysqli_connect($host, $usuario, $clave, $db);
							if (mysqli_connect_errno()) {
								$errors['errordb'] = 'Fallo al intentar conectar con la base de datos';
								echo $errors['errordb'];
							}else{
								mysqli_query($conexion, "SET NAMES 'utf8'");
								if( $consulta = mysqli_prepare($conexion, "SELECT username, name, domain, active FROM mailbox WHERE username=?;") ){

									/* Preparo los parametros "?" s - string, b - blob, i - int, etc */
									mysqli_stmt_bind_param($consulta, "s", $_GET['username']);

									/* La ejecuto */
									if(!mysqli_stmt_execute($consulta)){
										$errors['errordb'] = 'Fallo al intentar consultar la base de datos 1';
										echo $errors['errordb'];
									}
									mysqli_stmt_store_result($consulta);

									$filasdevueltas = mysqli_stmt_num_rows($consulta);

									mysqli_stmt_bind_result($consulta, $email, $nombre, $domain, $activo);

									(mysqli_stmt_fetch($consulta));

									//Separamos usuario de email (queda en $usuarioemail[0])
									$usuarioemail = [];
									$usuarioemail = explode("@",$email);
							?>

								<form class="edit-form" action="#" method="post">
									<h3>Nuevo Usuario</h3>

									<div class="alert alert-danger display-none">
										<button class="close" data-close="alert"></button>
										<span id="txt_register_errores"></span>
									</div>

									<div class="form-group">
										<label class="control-label visible-ie8 visible-ie9">Nombre Completo</label>
										<div class="input-icon input-large margin-top-10">
											<i class="fa fa-font"></i>
											<input class="form-control" type="text" placeholder="Nombre Completo" name="fullname" id="editar_fullname" value="<?php echo $nombre; ?>">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label visible-ie8 visible-ie9">Email</label>
										<div class="input-group input-large margin-top-10">
											<input class="form-control" type="text" placeholder="Email" name="email" id="editar_email" value="<?php echo $usuarioemail[0]; ?>">
											<span class="input-group-addon">@franpuebla.com</span>
										</div>
									</div>

									<div class="form-group">
										<label class="control-label visible-ie8 visible-ie9">Clave</label>
										<div class="input-icon input-large margin-top-10">
											<i class="fa fa-lock"></i>
											<input class="form-control" type="password" autocomplete="off" id="register_password" placeholder="Clave" name="password">
										</div>
									</div>

									<div class="form-group">
										<label class="control-label visible-ie8 visible-ie9">Confirmá tu Clave</label>
										<div class="input-icon input-large margin-top-10">
											<i class="fa fa-check"></i>
											<input class="form-control" type="password" autocomplete="off" placeholder="Confirmá tu Clave" name="rpassword" id="editar_rpassword">
										</div>
									</div>

									<div class="form-group">
										<input type="checkbox" name="activo" id="editar_activo" <?php if($activo){ echo "checked";} ?>/><label> Activo </label>
									</div>

									<div class="form-group" style="display:none;">
										<div class="controls">
											<div class="input-icon">
												<i class="fa fa-check"></i>
												<input class="form-control placeholder-no-fix" type="text" name="username" id="editar_username" value="<?php echo $email; ?>"/>
											</div>
										</div>
									</div>


									<hr>



									<div class="form-actions">
										<a href="usuarios.php"><button id="edit-back-btn" type="button" class="btn">
										<i class="m-icon-swapleft"></i> Volver </button></a>
										<button type="submit" id="edit-submit-btn" class="btn blue pull-right">
										<img src="assets/img/loaderblue.gif" style="display:none;">Enviar <i class="m-icon-swapright m-icon-white"></i>
										</button>
									</div>
								</form>
								<!-- END REGISTRATION FORM -->

								<?php
									/* Cierro consulta */
									mysqli_stmt_close($consulta);
								}else{
									$errors['errordb'] = 'Fallo al intentar consultar la base de datos 2';
									echo $errors['errordb'];
									echo mysqli_error($conexion);
								}

							}
							?>
							<!-- EDICIÓN EXITOSA -->
							<div id="editar_exitoso" style="display:none;">
								<div class="alert alert-success">
									<strong id="txt_editar_exitoso"></strong>
								</div>
								<a href="usuarios.php"><button class="btn green btn-block">Volver</button></a>
							</div>
							<!-- END EDICIÓN EXITOSA -->

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
<script src="assets/scripts/custom/editarusuario.js"></script>

<script>
  jQuery(document).ready(function() {
     Metronic.init(); // init metronic core components
		 Layout.init(); // init current layout
		 EditarUsuario.init();
  });
</script>

<script type="text/javascript">
	function registrarUsuario(){
	  //Deshabilitamos el botón enviar y colocamos el loader
	  $('#edit-submit-btn').addClass('disabled');
	  $('#edit-submit-btn').html('<img src="assets/img/loaderblue.gif">');

	  var formData = {
			'fullname' 			: $('#editar_fullname').val(),
			'email' 				: $('#editar_email').val(),
			'password' 			: $('#register_password').val(),
			'rpassword' 		: $('#editar_rpassword').val(),
			'activo'				: $('#editar_activo').is(':checked'),
			'username' 						: $('#editar_username').val()
	  };

	  $.ajax({
			type 		: 'POST',
			url 		: 'modificarusuario.php',
			data 		: formData,
			dataType 	: 'json'
		}).done(function(data){
			//Al terminar volvemos a la normalidad el botón enviar
			$('#edit-submit-btn').html('Enviar <i class="m-icon-swapright m-icon-white">');
			$('#edit-submit-btn').removeClass('disabled');

			//Si hubo un error
			if ( !data.success) {

				if (data.errors.errordb) {
					alert(data.errors.errordb);
				}
				/*if (data.errors.id) {
					alert(data.errors.id);
				}*/
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
					$('.alert-danger', $('.edit-form')).show();
				}
				if (data.errors.emailexist) {
					//alert(data.errors.emailexist);
					$('#txt_register_errores').text(data.errors.emailexist);
					$('.alert-danger', $('.edit-form')).show();
				}
			} else {

				// Si todo está bien
				$('#txt_editar_exitoso').html(data.message);
				$('.edit-form').hide();
				$('#editar_exitoso').show();


			}
		}).fail(function(data) {
			$('#edit-submit-btn').html('Enviar <i class="m-icon-swapright m-icon-white">');
			$('#edit-submit-btn').removeClass('disabled');
			alert('Fallo de AJAX');
		});
	}
</script>
<!-- END PAGE JAVASCRIPTS -->
<!-- END JAVASCRIPTS -->
</body>
<?php require_once('fijo_htmlfin.php'); ?>