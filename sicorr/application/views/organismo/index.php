<a style="display:block; text-align:center;"href="<?php echo url::base( ); ?>organismo/nuevo">Nuevo Organismo</a>
<h3 style="display:block; text-align:center;">Organismo</h3>
<table class="grid">
	<thead>
		<th>id</th>
		<th>Descripci&oacute;n</th>
		<th>Siglas</th>
		<th>Accion</th>
	</thead>
	<tbody>
		<?php $i=0; ?>
		<?php foreach ($organismos as $o):?>
			<tr
				<?php if ($i % 2 != 0): ?>
					class="odd"
				<?php endif?>
				>
				<td><?php echo $o->id; 					?></td>
				<td><?php echo $o->descripcion; ?></td>
				<td><?php echo $o->siglas; 			?></td>
				<td class="oper"><a href="<?php echo url::base( )?>organismo/editar/<?php echo $o->id?>" />
							<?php echo html::image('media/images/edit.gif',array('alt'=>'Editar', 'title'=>'Editar')); ?></a>
						<?php if ($_SESSION['grupo_id']==1): ?>
						&nbsp;
						<a href="<?php echo url::base( )?>organismo/eliminar/<?php echo $o->id?>" />
							<?php echo html::image('media/images/delete.gif',array('alt'=>'Eliminar','title'=>'Eliminar')); ?></a>		
						<?php endif; ?>
				</td>
			</tr>
		<?php $i++; ?>
		<?php endforeach ?>
	</tbody>
</table>
