<a style="display:block; text-align:center;"href="<?php echo url::base( ); ?>dependencia/nuevo">Nueva Dependencia</a>
<h3 style="display:block; text-align:center;">Dependencias</h3>
<table class="grid">
	<thead>
		<th>id</th>
		<th>Direccion</th>
		<th>Siglas</th>
		<th>Director</th>
		<th>Color</th>
		<th>Accion</th>		
	</thead>
	<tbody>
      <?php if (count($dependencias)>0): ?>
		<?php $i=0; ?>
		<?php foreach ($dependencias as $d):?>
			<tr style='background-color:<?php echo $d['color'];?>'>
				<td><?php echo $d['id']; 		  ?></td>
				<td><?php echo $d['direccion']; ?></td>
				<td><?php echo $d['siglas'];    ?></td>
				<td><?php echo $d['director'];  ?></td>
				<td><?php echo $d['color'];     ?></td>
				<td class="oper"> <a href="<?php echo url::base( )?>dependencia/editar/<?php echo $d['id']; ?>" />
						<?php echo html::image('media/images/edit.gif',array('alt'=>'Editar', 'title'=>'Editar')); ?></a>
						<?php if ($_SESSION['grupo_id']==1): ?>
							&nbsp;			
							<a href="<?php echo url::base( )?>dependencia/eliminar/<?php echo $d['id']; ?>" />
							<?php echo html::image('media/images/delete.gif',
                              array('alt'=>'Eliminar','title'=>'Eliminar','onclick'=>"if (!confirm('Esta realmente seguro?')) return false;")); ?></a>
						<?php endif; ?>	
				</td>
			</tr>
		<?php $i++; ?>
		<?php endforeach ?>
      <?php else: ?>
         <tr>
            <td colspan="6" style="text-align:center;">No hay registros.</td>
         </tr>
      <?php endif; ?>
	</tbody>
</table>
