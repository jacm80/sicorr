<a style="display:block; text-align:center;"href="<?php echo url::base( ); ?>contacto/nuevo">Nuevo Contacto</a>
<h3 style="display:block; text-align:center;">Contactos</h3>
<table class="grid">
	<thead>
		<th>id</th>
		<th>Nombre de la Entidad</th>
		<th>Contacto</th>
		<th>Encargado</th>
		<th>Teléfono Celular</th>
		<th>Teléfono Oficina</th>
		<th>Correo Electrónico</th>
		<th>Acci&oacute;n</th>	
	</thead>
	<tbody>
      <?php if (count($contacto)>0): ?>
		<?php $i=0; ?>
		<?php foreach ($contacto as $o):?>
			<tr
				<?php if ($i % 2 != 0): ?>
					class="odd"
				<?php endif?>
				>
				<td><?php echo $o->id; 						?></td>
				<td><?php echo $o->descripcion;       	?></td>
				<td><?php echo $o->organismo->descripcion; 	?></td>
				<td><?php echo $o->representante; 		?></td>
				<td><?php echo $o->telefono_oficina; 	?></td>
				<td><?php echo $o->telefono_celular; 	?></td>
				<td><?php echo $o->email; 					?></td>
				<td class="oper">
					<a href="<?php echo url::base( )?>contacto/editar/<?php echo $o->id ?>" />							
					<?php echo html::image('media/images/edit.gif',array('alt'=>'Editar', 'title'=>'Editar')); ?></a>
					&nbsp;
					<?php if ($_SESSION['grupo_id']==1): ?>
						<a href="<?php echo url::base( )?>contacto/eliminar/<?php echo $o->id ?>" />
						<?php echo html::image('media/images/delete.gif',
                                          array('alt'=>'Eliminar','title'=>'Eliminar','onclick'=>"if (!confirm('Esta realmente seguro?')) return false;")); ?></a>	
					<?php endif; ?>
				</td>
			</tr>
		<?php $i++; ?>
		<?php endforeach ?>
      <?php else: ?>
         <tr>
            <td colspan="8" style="text-align:center;">No hay registros.</td>
         </tr>
      <?php endif; ?>
	</tbody>
</table>
