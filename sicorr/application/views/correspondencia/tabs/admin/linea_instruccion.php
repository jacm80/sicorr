<tr
	<?php if ($item % 2 != 0): ?>
				style="background-color:#b5ccdf;"
	<?php else: ?>
				style="background-color:#f7f4f4;"
	<?php endif; ?>
   id="x-x">
   <td><?php echo $item; ?></td>
	<td><?php echo form::dropdown(array('id'=>"instruccion_id",'name'=>'instruccion_id'),
						isset($instrucciones) ? $instrucciones:array(),
						isset($instrucciones_id) ? $instrucciones_id:0); ?></td>
	<td><textarea id="observaciones" name="observaciones" style="width:100%; height:100%;"></textarea></td>
	<td style="text-align:left;width:15%;">
		<?php foreach($dependencias as $d): ?>
			<div>
			   <input type="checkbox" id="dependencias" name="dependencias[]" value="<?php echo $d['id']; ?>">	
			   <strong><?php echo $d['siglas']; ?></strong>
         </div>
		<?php endforeach; ?>
		<ul>
	</td>
</tr>
<tr id="botonera">
   <td colspan="4" style="text-align:center;">
      <button id="guardar-instruccion" onClick="guardar_instruccion( );" type="button">
      <?php echo html::image('media/images/disk.png');?>&nbsp;Guardar</button>
      <button id="cancelar" onclick="$('botonera').remove( ); $('x-x').remove( ); $('add').show( );">
         <?php echo html::image('media/images/cancel.png');?>&nbsp;Cancelar</button>
   </td>
</tr>
