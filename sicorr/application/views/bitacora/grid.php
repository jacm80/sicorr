<?php if (count($bitacora)>0): ?>
<?php $i=0; ?>
	<?php foreach ($bitacora as $b):?>
	<tr
		<?php if ($i % 2 != 0): ?>
		   class="odd"
		<?php endif?>
	 >
		<td><?php echo $b['id']; 			     ?></td>
		<td><?php echo $b['descripcion'];    ?></td>
		<td><?php echo $b['fechahora'];      ?></td>
		<td><?php echo $b['nombre_usuario']; ?></td>
	</tr>
	<?php $i++; ?>
<?php endforeach ?>
<?php else: ?>
   <tr>
      <td colspan="4" style="text-align:center;">No hay registros.</td>
   </tr>
<?php endif; ?>
