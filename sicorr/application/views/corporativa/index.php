<style>
#th_asunto { width: 200px; }
</style>
<h3 style="display:block; text-align:center;">Correspondencias Procesadas</h3>
<table class="grid">
	<thead>
		<th style="width:5%;">id</th>
		<!-- <th>Fecha Recibido</th> -->
		<th style="width:10%;">Fecha Oficio</th>
		<th style="width:10%;">No. Oficio</th>
		<th id="th_asunto" style="width:20%;">Asunto</th>
		<th style="width:20%;">Contacto</th>
		<th style="width:10%;">Suscrito</th>
		<th style="width:20%;">Accion</th>
	</thead>
	<tbody>
		<?php $i=0; ?>
		<?php foreach ($correspondencias as $c):?>
			<tr
				<?php if ($i % 2 != 0): ?>
					class="odd"
				<?php endif; ?>
				>
				<td><?php echo $c['id']; 				?></td>
				<td><?php echo $c['fecha_oficio']; 	?></td>
				<td><?php echo $c['nro_oficio'];    ?></td>
				<td style="width:200px;">
               <p>
               <?php echo $c['asunto']; ?>
               </p>
            </td>
				<td><?php echo $c['contacto'];  ?></td>
				<td><?php echo $c['suscrito'];  ?></td>
				<td class="oper">
               <div id="aviso_<?php echo $c['id']?>" style="/*border: 1px solid black;*/">
			            <?php echo form::dropdown(array('id'       =>'enviada_'.$c['id'],
                                                     'name'     =>'enviada',
                                                     'onchange' =>"cambiar_estatus({$c['id']},\$F('enviada_".$c['id']."'))"),
                                                      array(0   =>'No enviado',1=>'Entregado'),($c['enviada']==1)?1:0); ?>
               <a href="<?php echo  url::base( ); ?>corporativa/motivo" 
                              onclick="xid='<?php echo $c["id"]; ?>'; 
                              Modalbox.show(this.href, {title: 'Enviar Mensaje', width: 350}); 
                              return false;">
                        <?php echo html::image('media/images/book_edit.png'); ?>
               </a>
                  <?php if (!empty($c['motivo_corporativa'])): ?>
                  <?php echo html::image(array(
                  'onclick' => "$('motivo_corporativa_".$c['id']."').show( ); $('aviso_".$c['id']."').hide( );",
                                               'src'     => 'media/images/warning.png',
                                               'id'      => 'aviso_ico_'.$c['id']
                                               )); ?>
                  <?php endif; ?>
               </div>
               <div id="motivo_corporativa_<?php echo $c['id']; ?>" style="border:1px solid #1378B2; background:#FFCE6B;display:none;">
                  <div style="background-color:#c48403; padding:2px;">
                     <strong style="color:white;">MOTIVO</strong>
                     <?php echo html::image(array('src'=>'media/images/arrow_refresh.png',
                                              'onclick'=>"$('motivo_corporativa_".$c['id']."').hide( ); $('aviso_".$c['id']."').show( );")); ?>
                  </div>
                  <div style="padding:8px;"><?php echo $c['motivo_corporativa']; ?></div>
               </div>
            </td>
			</tr>
		<?php $i++; ?>
		<?php endforeach; ?>
	</tbody>
</table>
