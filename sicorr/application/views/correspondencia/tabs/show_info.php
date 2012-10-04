<table id="form" style="width: 100%;">
      <tr>
         <td><strong>ID</strong></td>
         <td style="background-color:#F9EBC7;"><strong><?php if (isset($id)) echo $id; ?></strong></td>
      </tr>
	   <tr>
			<td style="width:30%">Fecha de Recibido: </td>
			<td class="input"><?php if (isset($fecha_recibido)) echo $fecha_recibido; ?></td>
		</tr>
		<tr>
			<td>Fecha de Oficio:</td>
			<td class="input"><?php if (isset($fecha_oficio)) echo $fecha_oficio; ?></td>
		</tr>	
		<tr>
			<td>Numero de Oficio:</td>
			<td style="background-color:#F9EBC7;"><?php if (isset($nro_oficio)) echo $nro_oficio; ?></td>
		</tr>
		<tr>
			<td>Suscrito por:</td>
			<td class="input"><?php if (isset($suscrito)) echo '<strong>'.strtoupper($suscrito). '</strong>'; ?></td>
		</tr>
		<tr>
			<td>Archivo Digital</td>
			<td class="input">
				<?php
               $RUTA = 'media/upload/correspondencias'; 
               if (isset($archivo)) 
               echo html::anchor("$RUTA/$archivo",$archivo,array('alt'=>'imagen','id'=>$id)); ?>
			</td>
		</tr>
		<tr>
			<td>Asunto:</td>
			<td class="input"><?php if (isset($asunto)) echo $asunto; ?></td>
		</tr>
		<tr>
			<td>Organismo:</td>
			<td class="input"><?php echo (isset($organismo)) ? $organismo : ''?></td>
		</tr>
		<tr>
			<td>Contactos:</td>
			<td class="input"><?php echo (isset($contacto)) ? $contacto : ''?></td>
		</tr>
</table>
<br />
<?php if ($_SESSION['grupo_id']==1): ?>
   <div style="text-align:center;">
      <button onclick="location.href=base_url+'correspondencia/editar_info/<?php echo $id;?>'">
      <?php echo html::image('media/images/edit.gif');?>&nbsp;Editar Informaci&oacute;n</button>
   </div>
<?php else: ?>
   <?php if (($_SESSION['grupo_id']==2) AND ($canChange)): ?>
    <div style="text-align:center;">
      <button onclick="location.href=base_url+'correspondencia/editar_info/<?php echo $id;?>'">
      <?php echo html::image('media/images/edit.gif');?>&nbsp;Editar Informaci&oacute;n</button>
    </div>
   <?php endif; ?> 
<?php endif; ?>
