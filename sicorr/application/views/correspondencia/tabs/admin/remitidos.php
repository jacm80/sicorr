<table class="grid" style="width:100%">
	<thead>
		<tr>
			<th>No.</th>
			<th>Archivo</th>
			<!-- <th>Usuario</th> -->
			<th>Direccion</th>
			<th>Observacion</th>
			<th style="width: 10%;">Estatus</th>
		</tr>
	<thead>
	<tbody id="adjuntos">
      <?php if (count($adjuntos)>0): ?>
         <?php foreach($adjuntos as $a): ?>
		   <tr style="background-color: #<?php echo $a['color']; ?>;">
			   <td><?php echo $a['no']; ?></td>
			   <td><?php echo (!empty($a['archivo'])) ? html::anchor("media/upload/directores/{$a['grupo_id']}/{$a['archivo']}",$a['archivo']) 
                                                                                    : "<strong style='color:green'>Mensaje</strong>";  ?></td>
			   <!-- <td><php echo $a['director']; ></td>-->
			   <td><?php echo $a['siglas'];   ?></td>
			   <td><?php echo $a['mensaje'];  ?></td>
            <td>
               <?php if ($_SESSION['grupo_id']==1): ?>
               <?php echo form::dropdown(array('id'=>"estatus_id_{$a['adjunto_id']}",
                                                            'name'=>"estatus_id_{$a['adjunto_id']}",
                                                            'onchange'=>"cambiar_estatus({$a['adjunto_id']},this.value);"),
                                                            $a['estatus_adjuntos'],
                                                            (isset($a['estatus_id'])?$a['estatus_id']:0)); ?>
               <?php else: ?>
                  <strong><?php echo $a['estatus_desc']; ?></strong>
               <?php endif; ?>
            </td>
		   </tr>
         <?php endforeach; ?>
      <?php else: ?>
         <tr>
            <td colspan="5" style="text-align:center;background-color:#B5CCDF;">Aun no se han cargado arhivos...</td>
         </tr>
      <?php endif; ?>
	</tbody>
</table>
