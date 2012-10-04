<script type="text/javascript">

function vaciar_bitacora( ){
   if (confirm('Esta seguro? queda a su entera responsabilidad')) {
      location.href='<?php echo url::base( ); ?>bitacora/vaciar_bitacora';
      alert('Tabla Bitacora vaciada con exito');
   }
}

</script>

<h3 style="display:block; text-align:center;">Bitacora del Sistema</h3>

<?php include 'auditoria.php'; ?>

<br />
<table class="grid">
	<thead>
		<th>id</th>
		<th>Descripci&oacute;n</th>
		<th>Fecha y Hora</th>
		<th>Usuario</th>
	</thead>
	<tbody id="table_data">
		<?php $i=0; ?>
		<?php foreach ($bitacora as $b):?>
			<tr
				<?php if ($i % 2 != 0): ?>
					class="odd"
				<?php endif?>
				>
				<td><?php echo $b->id; 			     ?></td>
				<td><?php echo $b->descripcion;    ?></td>
				<td><?php echo $b->fechahora;      ?></td>
				<td><?php echo $b->nombre_usuario; ?></td>
			</tr>
		<?php $i++; ?>
		<?php endforeach ?>
	</tbody>
</table>
<br />
<div style="text-align:center;"><button 
onclick="vaciar_bitacora( );">
<?php echo html::image('media/images/delete.gif'); ?>
&nbsp;Vaciar informacion de la Bitacora</button></div>
