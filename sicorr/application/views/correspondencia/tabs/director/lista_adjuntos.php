<?php $RUTA = "media/upload/directores/$dependencia_id"; ?>
<table class="grid" style="width:100%;">
	<thead>
		<tr>
			<th>Id</th>
			<th>Archivo</th>
			<th>Observacion</th>
         <th style="width: 15%;">Estatus</th>
         <th>--</th>
		</tr>
	</thead>
	<tbody id="adjuntos">
      <?php 
         $i=1; 
      ?>
      <?php foreach ($adjuntos as $aa): ?>
		<tr
         <?php if ($i % 2 == 0) echo ' class="tr_verde"'?>
         id="adj_<?php echo $aa['adjunto_id']; ?>" >
			<td><?php echo $i; ?></td>
			<td><?php echo $aa['archivo'] ? html::anchor("$RUTA/{$aa['archivo']}",$aa['archivo'],array('alt'=>'imagen','id'=>$aa['archivo'])) : 'mensaje' ; ?></td>
			<td><?php echo $aa['mensaje']; ?></td>
			<td><?php echo $aa['estatus']; ?></td>
         <td style="text-align:center;">
               <a href="#" onclick="eliminar_adjunto('<?php echo $aa['adjunto_id']; ?>');">
                  <?php echo html::image('media/images/delete.png',array('alt'=>'Eliminar Archivo','title'=>'Eliminar Archivo')); ?>
               </a>
         </td>
		</tr>
      <?php $i++; ?>
      <?php endforeach; ?>
	</tbody>
	<tfoot>
		<tr id="add">
			<td colspan="5" style="text-align:right;background-color:#b5ccdf">
				<a href="#" id="adjuntar" style="font-weight:bold;font-size:10pt;text-decoration:none;color:#093475">
					<?php echo html::image('media/images/btn_add.gif',array('alt'=>'Adjuntar Archivo','title'=>'Adjuntar Archivo')); ?>Adjuntar Archivo</a>
			</td>	
		</tr>
	</tfoot>
</table>
