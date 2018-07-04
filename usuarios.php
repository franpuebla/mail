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
								<i class="fa fa-edit"></i>Usuarios
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="btn-group">
									<a href="nuevousuario.php"><button class="btn green">
									Nuevo <i class="fa fa-plus"></i>
									</button></a>
								</div>
							</div>
							<table class="table table-striped table-hover table-bordered" id="usuarios">
							<thead>
							<tr>
								<th>
									 Nombre
								</th>
								<th>
									 Mail
								</th>
								<th>
									 Activo
								</th>
								<th>
									 Editar
								</th>
								<th>
									 Eliminar
								</th>
								<th style='display:none;'>
									 ID
								</th>
							</tr>
							</thead>
							<tbody>
							<?php
							//Conectamos con la DB
							$conexion = mysqli_connect($host, $usuario, $clave, $db);
							if (mysqli_connect_errno()) {
								$errors['errordb'] = 'Fallo al intentar conectar con la base de datos';
							}else{
								mysqli_query($conexion, "SET NAMES 'utf8'");
								if( $consulta = mysqli_prepare($conexion, "SELECT username, name, maildir, active FROM mailbox;") ){

									/* La ejecuto */
									if(!mysqli_stmt_execute($consulta)){
										$errors['errordb'] = 'Fallo al intentar consultar la base de datos';
									}
									mysqli_stmt_store_result($consulta);

									$filasdevueltas = mysqli_stmt_num_rows($consulta);

									mysqli_stmt_bind_result($consulta, $email, $nombre, $maildir, $activo);

									while(mysqli_stmt_fetch($consulta)){
										echo "<tr>";

										echo "<td>";
										echo $nombre;
										echo "</td>";
										echo "<td>";
										echo $email;
										echo "</td>";
										echo "<td>";
										if ($activo){
											echo "Si";
										}else{
											echo "No";
										}
										echo "</td>";
										echo "<td>";
										echo "<a class='edit' href='editarusuario.php?username=".$email."'>Editar</a>";
										echo "</td>";
										echo "<td>";
										echo "<a class='delete' href='eliminarusuario.php?username=".$email."' onclick='return confirm(\"¿Seguro que desea eliminar este usuario?\")'>Eliminar</a>";
										echo "</td>";

										echo "<td style='display:none;'>";
										//echo "<input disabled type='text' class='form-control input-big' value='".$id."'>";
										echo $email;
										echo "</td>";

										echo "</tr>";
									}


									/* Cierro consulta */
									mysqli_stmt_close($consulta);
								}else{
									$errors['errordb'] = 'Fallo al intentar consultar la base de datos';
								}

							}

							mysqli_close($conexion);

							?>
							</tbody>
							</table>
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
<script type="text/javascript" src="assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/tabletools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/scripts/core/metronic.js" type="text/javascript"></script>
<script src="assets/scripts/core/layout.js" type="text/javascript"></script>
<script src="assets/scripts/custom/usuarios.js"></script>

<script>
  jQuery(document).ready(function() {
     Metronic.init(); // init metronic core components
		 Layout.init(); // init current layout
		 TablaUsuarios.init();
  });
</script>

<script type="text/javascript">

</script>
<!-- END PAGE JAVASCRIPTS -->
<!-- END JAVASCRIPTS -->
</body>
<?php require_once('fijo_htmlfin.php'); ?>