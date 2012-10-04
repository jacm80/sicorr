<table class="grid" style="width:100%">
	<thead>
		<tr>
			<th>Id</th>
			<th>Archivo</th>
			<th>Usuario</th>
			<th>Direccion</th>
			<th>Observacion</th>
		</tr>
	<thead>
	<tbody id="adjuntos">
      <?php if (count($adjuntos)>0): ?>
         <?php foreach($adjuntos as $a): ?>
		   <tr style="background-color: #<?php echo $a['color']; ?>;">
			   <td><?php echo $a['no']; ?></td>
			   <td><?php echo (!empty($a['archivo'])) ? html::anchor("media/upload/directores/{$a['grupo_id']}/{$a['archivo']}",$a['archivo']) 
                                                                                    : "<strong style='color:green'>Mensaje</strong>";  ?></td>
			   <td><?php echo $a['director']; ?></td>
			   <td><?php echo $a['siglas'];   ?></td>
			   <td><?php echo $a['mensaje'];  ?></td>
		   </tr>
         <?php endforeach; ?>
      <?php else: ?>
         <tr>
            <td colspan="5" style="text-align:center;background-color:#B5CCDF;">Aun no se han cargado arhivos...</td>
         </tr>
      <?php endif; ?>
	</tbody>
</table>
