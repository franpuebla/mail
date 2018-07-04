<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<ul class="page-sidebar-menu" data-auto-scroll="false" data-auto-speed="200">
			<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
			<li class="sidebar-toggler-wrapper">
				<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				<div class="sidebar-toggler">
				</div>
				<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			</li>
			<li class="start <?php if(isset($titulo) AND ($titulo == "Inicio")) echo 'active'; ?>">
				<a href="inicio.php">
				<i class="fa fa-home"></i>
				<span class="title">Inicio</span>
				<?php if(isset($titulo) AND ($titulo == "Inicio")) echo '<span class="selected"></span>'; ?>
				</a>
			</li>

			<!--
			<li class="<?php// if(isset($titulo) AND ($titulo == "DNS")) echo 'active'; ?>">
				<a href="dns-registros.php">
				<i class="fa fa-sitemap"></i>
				<span class="title">DNS</span>
				<?php //if(isset($titulo) AND ($titulo == "DNS")) echo '<span class="selected"></span>'; ?>
				</a>
			</li>
			-->

			<li class="<?php if(isset($titulo) AND ($titulo == "Usuarios")) echo 'active'; ?>">
				<a href="usuarios.php">
				<i class="fa fa-user"></i>
				<span class="title">Usuarios (Correo)</span>
				<?php if(isset($titulo) AND ($titulo == "Usuarios")) echo '<span class="selected"></span>'; ?>
				</a>
			</li>

			<li class="last <?php if(isset($titulo) AND ($titulo == "Administradores")) echo 'active'; ?>">
				<a href="administradores.php">
				<i class="fa fa-star"></i>
				<span class="title">Administradores</span>
				<?php if(isset($titulo) AND ($titulo == "Administradores")) echo '<span class="selected"></span>'; ?>
				</a>
			</li>

		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>
<!-- END SIDEBAR -->