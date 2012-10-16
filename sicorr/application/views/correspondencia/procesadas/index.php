<style>
#th_asunto { width: 15%; }
</style>
<h3 style="display:block; text-align:center;">Correspondencias No Enviadas</h3>
<table class="grid">
	<thead>
		<th>id</th>
		<th style="width:12%;">Fecha Recibido</th>
		<th style="width:12%;">Fecha Oficio</th>
		<th>No. Oficio</th>
		<th id="th_asunto">Asunto</th>
		<th>Contacto</th>
		<th>Suscrito</th>
		<th>Motivo</th>
	</thead>
	<tbody>
		<?php $i=0; ?>
		<?php foreach ($correspondencias as $c):?>
			<tr
				<?php if ($i % 2 != 0): ?>
					class="odd"
				<?php endif?>
				>
				<td><?php echo $c['id']; 				    ?></td>
				<td><?php echo $c['fecha_recibido'];    ?></td>
				<td><?php echo $c['fecha_oficio']; 		 ?></td>
				<td><?php echo $c['nro_oficio']; 		 ?></td>
				<td style="width:200px;"><p><?php echo $c['asunto']; 			    ?></p></td>
				<td><?php echo $c['contacto'];     	    ?></td>
				<td><?php echo $c['suscrito']; 			 ?></td>
				<td style="background: #ffce6b;"><?php echo $c['motivo_corporativa'];?></td>
			</tr>
		<?php $i++; ?>
		<?php endforeach ?>
	</tbody>
</table>
