<?php require_once('controlsesion.php'); ?>
<?php $titulo = "Inicio"; ?>

<?php require_once('fijo_html.php'); ?>
<head>
<?php require_once('fijo_head.php'); ?>
</head>

<body class="page-header-fixed ">
<?php require_once('fijo_header.php'); ?>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<?php require_once('fijo_sidebar.php'); ?>
	<!-- BEGIN CONTENT -->

	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">

			<!--
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-sitemap"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php
 						  	/*require_once('datosaccesodbdns.php');
 						  	$conexion = mysqli_connect($host, $usuario, $clave, $db);
 						  	if (mysqli_connect_errno()) {
 						  		$errors['errordb'] = 'Fallo al intentar conectar con la base de datos';
 						  	}else{
 						  		if( $consulta = mysqli_prepare($conexion, "SELECT * FROM records WHERE domain_id=".$_SESSION['iddominio'].";") ){*/
 						  			/* La ejecuto */
 						  			/*if(!mysqli_stmt_execute($consulta)){
 						  				$errors['errordb'] = 'Fallo al intentar consultar la base de datos';
 						  			}
 						  			mysqli_stmt_store_result($consulta);
 						  			$filasdevueltas = mysqli_stmt_num_rows($consulta);
 						    		printf($filasdevueltas);*/
 				    				/* Cierro consulta */
 				    				/*mysqli_stmt_close($consulta);
 				    			}else{
 				    				$errors['errordb'] = 'Fallo al intentar consultar la base de datos';
 				    			}
 				    		}
 				    		mysqli_close($conexion);*/
 								?>
							</div>
							<div class="desc">
								 Registros DNS
							</div>
						</div>
						<a class="more" href="dns-registros.php">
						Ver Todos <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			-->

				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-user"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php
 						  	require_once('datosaccesodbpostfix.php');
 						  	$conexion = mysqli_connect($host, $usuario, $clave, $db);
 						  	if (mysqli_connect_errno()) {
 						  		$errors['errordb'] = 'Fallo al intentar conectar con la base de datos';
 						  	}else{
 						  		if( $consulta = mysqli_prepare($conexion, "SELECT * FROM mailbox") ){
 						  			/* La ejecuto */
 						  			if(!mysqli_stmt_execute($consulta)){
 						  				$errors['errordb'] = 'Fallo al intentar consultar la base de datos';
 						  			}
 						  			mysqli_stmt_store_result($consulta);
 						  			$filasdevueltas = mysqli_stmt_num_rows($consulta);
 						    		printf($filasdevueltas);
 				    				/* Cierro consulta */
 				    				mysqli_stmt_close($consulta);
 				    			}else{
 				    				$errors['errordb'] = 'Fallo al intentar consultar la base de datos';
 				    			}
 				    		}
 				    		mysqli_close($conexion);
 								?>
							</div>
							<div class="desc">
								 Usuarios de Mail
							</div>
						</div>
						<a class="more" href="usuarios.php">
						Ver Todos <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>

				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-star"></i>
						</div>
						<div class="details">
							<div class="number">
								<?php
 						  	require_once('datosaccesodb.php');
 						  	$conexion = mysqli_connect($host, $usuario, $clave, $db);
 						  	if (mysqli_connect_errno()) {
 						  		$errors['errordb'] = 'Fallo al intentar conectar con la base de datos';
 						  	}else{
 						  		if( $consulta = mysqli_prepare($conexion, "SELECT * FROM usuarios") ){
 						  			/* La ejecuto */
 						  			if(!mysqli_stmt_execute($consulta)){
 						  				$errors['errordb'] = 'Fallo al intentar consultar la base de datos';
 						  			}
 						  			mysqli_stmt_store_result($consulta);
 						  			$filasdevueltas = mysqli_stmt_num_rows($consulta);
 						    		printf($filasdevueltas);
 				    				/* Cierro consulta */
 				    				mysqli_stmt_close($consulta);
 				    			}else{
 				    				$errors['errordb'] = 'Fallo al intentar consultar la base de datos';
 				    			}
 				    		}
 				    		mysqli_close($conexion);
 								?>
							</div>
							<div class="desc">
								 Administradores
							</div>
						</div>
						<a class="more" href="administradores.php">
						Ver Todos <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>

			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<?php require_once('fijo_footer.php'); ?>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<?php require_once('fijo_javascripts.php'); ?>
<!-- PAGE JAVASCRIPTS -->
<script src="assets/scripts/core/metronic.js" type="text/javascript"></script>
<script src="assets/scripts/core/layout.js" type="text/javascript"></script>
<script>
      jQuery(document).ready(function() {
        Metronic.init(); // init metronic core components
		 		Layout.init(); // init current layout
      });
   </script>
<!-- END PAGE JAVASCRIPTS -->
<!-- END JAVASCRIPTS -->
</body>
<?php require_once('fijo_htmlfin.php'); ?>