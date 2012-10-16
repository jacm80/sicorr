<?php if (isset($_SESSION['user_id'])): ?>
	<!--<h1>< echo $_SESSION['user_id']; ></h1>-->
	<?php if ($_SESSION['user_id']>0): ?>
	<div class="menu">
		<ul>
         <?php if ($_SESSION['grupo_id']==3): ?>
			   <li><a href="<?php echo url::base( )?>correspondencia/index" id="current">Home</a></li>
         <?php elseif ($_SESSION['grupo_id']==4): ?>
			   <li><a href="<?php echo url::base( )?>corporativa" id="current">Home</a></li>
         <?php else: ?>
			   <li><a href="<?php echo url::base( )?>buzon" id="current">Home</a></li>
         <?php endif; ?>
	   <?php if ($_SESSION['grupo_id']<4): ?>
			<li><a href="#">Archivo</a><!-- id="current"-->
				<ul>
					<li><a href="<?php echo url::base( );?>organismo">Organismos</a></li>
					<li><a href="<?php echo url::base( );?>dependencia">Dependencias</a></li>
					<li><a href="<?php echo url::base( );?>contacto">Contactos</a></li>
			   </ul>
		  </li>
         <?php endif; ?>
			<li><a href="#">Procesos</a>
            <ul>
               <?php if ($_SESSION['grupo_id']==1): ?>
                  <li><a href="<?php echo url::base( ); ?>correspondencia/procesadas">Correspondencias NO Enviadas</a></li>
               <?php endif; ?>
	            <?php if ($_SESSION['grupo_id']<4): ?>
                  <li><a href="<?php echo url::base( ); ?>consulta">Consulta de Correspondencia</a></li>
                  <li><a href="<?php echo url::base( ); ?>correspondencia/nuevo">Registrar Correspondencia</a></li>
                  <li><a href="<?php echo url::base( ); ?>reporte">Reporte de Correspondencia</a></li>
               <!-- <li><a href="<php echo url::base( ); ?>historico">Historicos de Correspondencias</a></li> -->
               <?php endif; ?>
               <li><a href="<?php echo url::base( ); ?>login/logout">Cerrar Session</a></li>
            </ul>
         </li>
			<?php if (isset($_SESSION['grupo_id'])):  ?>
				<?php if ($_SESSION['grupo_id']==1): ?>
				<li><a href="#">Administrador</a>
					<ul>
               	<li><a href="<?php echo url::base( ); ?>graficos">Estadisticas</a></li>
               	<li><a href="<?php echo url::base( ); ?>usuario">Usuarios del Sistema</a></li>
               	<li><a href="<?php echo url::base( ); ?>bitacora">Bitacora del Sistema</a></li>
               	<li><a href="<?php echo url::base( ); ?>mantenimiento/backup">Respaldo Manual</a></li>

               </ul>
               <li><a href="#" ?>Historico</a>
                        <ul>
               	         <li><a href="<?php echo url::base( ); ?>media/upload/correspondencias">Correspondencia cargadas</a></li>
               	         <li><a href="<?php echo url::base( ); ?>media/upload/directores">Adjuntos de Directores</a></li>
                        </ul>
                  </li>
				</li>
				<?php endif; ?>
			<?php endif; ?>
		</ul>
	</div>
	<?php endif; ?>
<?php endif; ?>
