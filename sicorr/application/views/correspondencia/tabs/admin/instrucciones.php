<style>
	#detail
	{
		width: 100%;
	}
	#detail thead th 
	{
		background-color:#1378b2;
		color: white;
		font-size: 10pt;
	}
	#detail tbody td { padding: 4px; }
</style>
<!-- -->
<table id="detail">
	<thead>
		<tr>
			<th>#</th>
			<th>Descripcion</th>
			<th colspan="2">Observacion</th>
		</tr>
	</thead>
	<tbody id="instrucciones">
		<?php if (!empty($instrucciones)):  ?>
			<?php $j=1 ?>
			<?php foreach ($instrucciones as $k=>$v): ?>
			<tr   
               <?php if ($j % 2 == 0): ?>
                  style="background-color:#85bf87;"
               <?php else: ?>
                  style="background-color:#bbeae7;"
               <?php endif ?>
            >
				<td><?php echo $j; ?></td>
				<td><?php echo $k; ?></td>
				<td colspan="2">
               <?php foreach ($v as $o): ?>
                  <li><strong><?php echo $o['dep'] ?>:</strong>&nbsp;<?php echo $o['obs']; ?></li>
               <?php endforeach ?>
            </td>
			</tr>
			<?php $j++; ?>
			<?php endforeach ?>
		<?php endif ?>
	</tbody>
	<tfoot>
		<tr id="add">
			<td colspan="4" style="text-align:right;background-color:#b5ccdf">
				<a id="agregar-instruccion" style="font-weight:bold;font-size:10pt;text-decoration:none;color:#093475; cursor: pointer;">
					<?php echo html::image('media/images/btn_add.gif',array('alt'=>'Agregar','title'=>'Agregar')); ?>AGREGAR</a>
			</td>	
		</tr>
	</tfoot>
</table>
