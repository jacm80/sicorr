<tr
	<?php if ($adj % 2 != 0): ?>
		style="background-color:#b5ccdf;"
	<?php else: ?>
		style="background-color:#f7f4f4;"
	<?php endif; ?>
id="x-x">
      <td>
         <?php echo $adj; ?>
         <input type="hidden" id="item_adjunto" name="item" value="<?php echo $adj; ?>" />
      </td>
	   <td><input type="file" name="documento" id="documento" /></td>
	   <td><textarea name="observacion" id="observacion" style="width:100%;"></textarea></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
   </tr>
   <tr id="botonera">
      <td colspan="4" style="text-align:center;">
      <button id="guardar-adjunto" type="button" onclick="$('frmAdjuntar').submit( );">
         <?php echo html::image('media/images/disk.png');?>&nbsp;Guardar
      </button>
      <button id="cancelar" onclick="$('botonera').remove( ); $('x-x').remove( ); $('add').show( );">
         <?php echo html::image('media/images/cancel.png');?>&nbsp;Cancelar
      </button>
      </td>
   </tr>
