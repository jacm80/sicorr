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
   <td><?php echo $b['id']; ?></td>
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
        <?php echo html::image('media/images/edit.gif'); ?>
		  <?php echo $b['asunto']; ?></a></td>
	<td><?php echo html::image('media/images/'.$profile[$b['estatus']]['ico']); ?></td>
	<td><?php echo $b['suscrito']; ?></td>
	<td>
      <?php foreach ($b['instrucciones'] as $k=>$v): ?>
         <?php foreach ($v as $o): ?>
            <li><strong><?php echo $o['dep'] ?>:</strong>&nbsp;<?php echo $o['obs']; ?></li>
         <?php endforeach ?>
      <?php endforeach ?>
   </td>
	<?php if (count($b['adjuntos'])>0):  ?>
				<td><a href="#" onclick="Effect.SlideDown('adj_<?php echo $i; ?>'); return false;"><?php echo html::image('media/images/lupa.png'); ?></a></td>
				</tr>
				<?php $aj=1; ?>
				<tr>
				<td colspan="9">
					<div id="adj_<?php echo $i; ?>" style="display:none;margin:0 auto;">
					<table class="grid" style="width:100%;">
					<thead>
					<tr>
						<th colspan="7" style="background-color:#b5ccdf;color:#1378b2;">
							ARCHIVOS ADJUNTOS&nbsp;<a href="#" onclick="Effect.SlideUp('adj_<?php echo $i; ?>'); return false;">
							<?php echo html::image('media/images/lupa_menos.gif'); ?></a></span>
						</th>
					</tr>
					<tr>
						<th>Id</th>
                  <?php if ($_SESSION['grupo_id']==2): ?>
						   <th>Mensaje Enviado</th>
                  <?php endif; ?>
                  <?php if ($_SESSION['grupo_id']==1): ?>
						   <th>Respuesta</th>
                  <?php endif; ?>
						<th>Documento</th>
                  <?php if ($_SESSION['grupo_id']==1): ?>
						   <th>Director</th>
						   <th>Direccion</th>
                  <?php endif; ?>
                  <?php if ($_SESSION['grupo_id']==2): ?>
                     <th>Respuesta</th>
                  <?php endif?>
                  <th style="width:10%">Estatus</th>
                  <th><a href="">&nbsp;</a></th>
					</tr>
					</thead>
					<tbody>	
						<?php foreach($b['adjuntos'] as $a): ?>
							<tr>
                        <td><?php echo $a['id']; 		  ?></td>
								<td 

                        <?php if ($_SESSION['grupo_id']==1) echo 'style="background-color:#fcefa9"'; ?>

                        ><?php echo $a['mensaje'];   ?></td>
								<td>
									<?php if (  !empty($a['archivo']) ): ?>
										<?php echo html::anchor("media/upload/directores/{$_SESSION['grupo_id']}/{$a['archivo']}",$a['archivo']); ?>
									<?php else: ?>
										<?php echo "<strong style='color:green'>Mensaje</strong>"; ?>
									<?php endif; ?>
                        <?php if ($_SESSION['grupo_id']==1): ?>
								   <td><?php echo $a['director'];  ?></td>
								   <td><?php echo $a['siglas'];    ?></td>
                        <?php endif; ?>

                        <!-- MENSAJE DEL CONTRALOR -->
                        <?php if ($_SESSION['grupo_id']==2): ?>
                           <td style="background-color:#fcefa9"><?php echo $a['respuesta']; ?></td>
                        <?php endif?>

                        <td><?php echo form::dropdown(array('id'=>"estatus_id_{$a['id']}",
                                                            'name'=>"estatus_id_{$a['id']}",
                                                            'onchange'=>"cambiar_estatus({$a['id']},this.value);"),
                                                            $a['estatus_adjuntos'],
                                                            (isset($a['estatus_id'])?$a['estatus_id']:0)); ?></td>
                        <td><a onclick="xid='<?php echo $a["id"]; ?>'; $('hide_all').style.display='block';$('form-msg-admin').style.display='block';">
                              <?php echo html::image('media/images/book_edit.png'); ?></a></td>
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
