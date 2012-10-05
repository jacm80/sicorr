<a style="display:block; text-align:center;" href="<?php echo url::base( ); ?>usuario/nuevo">Nuevo Usuario</a>
<h3 style="display:block; text-align:center;">Usuarios</h3>
<br />
<table class="grid">
	<thead>
		<th>id</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Cedula</th>
		<th>Accion</th>
	</thead>
	<tbody>
		<?php $i=0; ?>
		<?php foreach ($usuarios as $o):?>
			<tr
				<?php if ($i % 2 != 0): ?>
					class="odd"
				<?php endif?>
				>
				<td><?php echo $o->id; 		   ?></td>
				<td><?php echo $o->nombres;   ?></td>
				<td><?php echo $o->apellidos; ?></td>
				<td><?php echo $o->cedula; 	?></td>
				<td class="oper"><a href="<?php echo url::base( )?>usuario/editar/<?php echo $o->id; ?>" />
							<?php echo html::image('media/images/edit.gif',array('alt'=>'Editar', 'title'=>'Editar')); ?></a>
							&nbsp;
						<a href="<?php echo url::base( )?>usuario/eliminar/<?php echo $o->id; ?>" />
							<?php echo html::image('media/images/delete.gif',
                        array('alt'=>'Eliminar', 'title'=>'Eliminar','onclick'=>"if (!confirm('Esta realmente seguro?')) return false;")); ?></a>
				</td>
			</tr>
		<?php $i++; ?>
		<?php endforeach ?>
	</tbody>
</table>
