<style>
#th_asunto { width: 200px; }
</style>
<a style="display:block; text-align:center;"href="<?php echo url::base( ); ?>correspondencia/nuevo">Nueva Correspondencia</a>
<h3 style="display:block; text-align:center;">Correspondencias</h3>
<table class="grid">
	<thead>
		<th>id</th>
		<!-- <th>Fecha Recibido</th> -->
		<th>Fecha Oficio</th>
		<th>No. Oficio</th>
		<th id="th_asunto">Asunto</th>
		<th>Contacto</th>
		<th>Suscrito</th>
		<th>Accion</th>
	</thead>
	<tbody>
		<?php $i=0; ?>
		<?php foreach ($correspondencias as $o):?>
			<tr
				<?php if ($i % 2 != 0): ?>
					class="odd"
				<?php endif?>
				>
				<td><?php echo $o['id']; 				    ?></td>
				<!-- <td><?php #echo $o['fecha_recibido'];    ?>--></td>
				<td><?php echo $o['fecha_oficio']; 		 ?></td>
				<td>
               <?php echo html::image('media/images/pdf.png'); ?>
               <?php echo $o['nro_oficio']; ?>
            </td>
				<td style="width:200px;"><p><?php echo $o['asunto']; 			    ?></p></td>
				<td><?php echo $o['contacto'];     	    ?></td>
				<td><?php echo $o['suscrito']; 			 ?></td>
				<td class="oper">
				   <?php echo form::dropdown(array(),array(0=>'No enviado',1=>'Entregado'),0); ?>
            </td>
			</tr>
		<?php $i++; ?>
		<?php endforeach ?>
	</tbody>
</table>
