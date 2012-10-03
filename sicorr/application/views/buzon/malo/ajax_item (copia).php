<?php $i=1; ?>
<?php foreach($buzon as $b): ?>
	<?php 
		$profile	= array(
							'Nuevo'		 => array('ico' => 'warning.png'			,	'color'=>'#f9ebc7'),
							'En Proceso' => array('ico' => 'carga_director.png',	'color'=>'#bbeae7'),
							'Procesado'	 => array('ico' => 'procesado2.png'		,	'color'=>'#85bf87')
						 );  
	?>
<tr onmouseover="$('item<?php echo $i; ?>').style.backgroundColor='#ffff82';" 
	 onmouseout="$('item<?php echo $i; ?>').style.backgroundColor='<?php echo $profile[$b['estatus']]['color'];  ?>';" 
	 id="item<?php echo $i; ?>"
	 style="background-color:<?php echo $profile[$b['estatus']]['color']; ?>;"
	>
	<td><?php echo html::image('media/images/email_go.gif'); ?></td>
	<td><?php echo $b['fecha_recibido']; ?></td>
	<td><?php echo (!empty($b['archivo'])) ? html::image('media/images/attachment16.png') : '&nbsp;' ?>&nbsp;
       <?php 
            $params = NULL;
            if (in_array(Utils::extension($b['archivo']),array('jpg','png','gif')))
            {
              $params = array('rel'=>'lightbox');
            }
      ?>
         
      <?php 
         $thefile =  'media/upload/correspondencias/'.$b['archivo'];
         if (file_exists($thefile)):
      ?>      
         <?php echo (!empty($b['archivo'])) ? html::anchor("media/upload/correspondencias/{$b['archivo']}",$b['nro_oficio'],$params) : 'Sin Cargar'; ?>
      <?php else: ?>
      <?php echo 'Sin Cargar' ?>
      <?php endif; ?>
   </td>
	<td><a href="<?php echo url::base( );?>correspondencia/editar/<?php echo $b['id']; ?>/<?php echo $_SESSION['grupo_id'] ?>">
		 <?php echo $b['asunto']; ?></a></td>
	<td><?php echo html::image('media/images/'.$profile[$b['estatus']]['ico']); ?>
	<td><?php echo $b['suscrito']; ?></td>
	<td>
		<?php 
			if (count($b['instrucciones']) > 0 )
			{
				echo implode(', ',$b['instrucciones_keys']);
			} 
			else { echo "&nbsp;";  }
			?>
	</td>
	<?php if (count($b['adjuntos'])>0):  ?>
				<td><a href="#" onclick="Effect.SlideDown('adj_<?php echo $i; ?>'); return false;"><?php echo html::image('media/images/lupa.png'); ?></a></td>
				</tr>
				<?php $aj=1; ?>
				<tr>
				<td colspan="8">
					<div id="adj_<?php echo $i; ?>" style="display:none;">
					<table class="grid" style="width:100%;">
					<thead>
					<tr>
						<th colspan="5" style="background-color:#b5ccdf;color:#1378b2;">
							ARCHIVOS ADJUNTOS&nbsp;<a href="#" onclick="Effect.SlideUp('adj_<?php echo $i; ?>'); return false;">
							<?php echo html::image('media/images/lupa_menos.gif'); ?></a></span>
						</th>
					</tr>
					<tr>
						<th>Id</th>
						<th>Descripcion</th>
						<th>Documento</th>
						<th>Director</th>
						<th>Direccion</th>
					</tr>
					</thead>
					<tbody>	
						<?php foreach($b['adjuntos'] as $a): ?>
							<tr>
								<td><?php echo $a['id']; 		  ?></td>
								<td><?php echo $a['mensaje'];   ?></td>
								<td>
									<?php if (  !empty($a['filename']) ): ?>
										<?php echo html::anchor("media/images/upload/{$_SESSION['user_id']}/{$a['archivo']}",$a['filename']); ?>
									<?php else: ?>
										<?php echo "<strong style='color:green'>Mensaje</strong>"; ?>
									<?php endif; ?>
								<td><?php echo $a['director'];  ?></td>
								<td><?php echo $a['direccion']; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
					</table>
					</div>
				</td>
				</tr>
	<?php else: ?>
		<td>&nbsp;</td>
		</tr>
	<?php endif; ?>
	<?php $i++; ?>
<?php endforeach; ?>
