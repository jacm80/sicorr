<?php if (count($b['adjuntos'])>0):  ?>
	<!--<tr>-->
      <td>
      <a href="" onclick="cambiar_estatus_adjuntos('<?php echo $b['id']; ?>','<?php echo $_SESSION['user_id']; ?>'); 
                          $('R_adj_<?php echo $i; ?>').show( ); Effect.SlideDown('adj_<?php echo $i; ?>'); return false;">
               <?php echo html::image('media/images/lupa.png'); ?></a>
      </td>
	   </tr>
	   <!-- A PARTIR DE AQUI LA TABLA DE ADJUNTOS -->
      <tr id="R_adj_<?php echo $i; ?>" style="display:none;">
	   <td colspan="9">
		<?php $aj=1; ?>
      <div id="adj_<?php echo $i; ?>" style="display:none;margin:0 auto;"> 
      <table class="grid" style="width:100%;">
      <thead>
	   <!-- BEGIN 1 FILA -->
      <tr>
		   <th colspan="7" style="background-color:#b5ccdf;color:#1378b2;">
			ARCHIVOS ADJUNTOS&nbsp;<a onclick=" $('R_adj_<?php echo $i; ?>').hide( ); return false;">
                                 <?php echo html::image('media/images/lupa_menos.gif'); ?></a>
		   </th>
	   </tr>
	   <!-- END 1 FILA -->
	   <!-- BEGIN 2 FILA -->
      <tr>
	      <th>Id</th>
         <?php if ($_SESSION['grupo_id']==2): ?>
		      <th>Mensaje Enviado</th>
         <?php endif; ?>
         <?php if ($_SESSION['grupo_id']==1): ?>
		      <th>Respuesta</th>
         <?php endif; ?>
		      <th>Documento</th>
         <?php if ($_SESSION['grupo_id']==1): ?>
		      <th>Director</th>
		      <th>Direccion</th>
            <?php endif; ?>
         <?php if ($_SESSION['grupo_id']==2): ?>
            <th>Respuesta</th>
         <?php endif?>
         <th style="width:10%">Estatus</th>
         <th><a href="">&nbsp;</a></th>
      </tr>
	   <!-- END 2 FILA -->
      </thead>
   <tbody>	
	<?php foreach($b['adjuntos'] as $a): ?>
	<tr style="background-color:<?php echo $a['color']; ?>">
      <td><?php echo $a['id']; 		  ?></td>
		<td <?php if ($_SESSION['grupo_id']==1) echo 'style="background-color:#fcefa9"'; ?>><?php echo $a['mensaje'];   ?></td>
		<td>
			<?php if (!empty($a['archivo'])): ?>
					<?php echo html::anchor("media/upload/directores/{$a['dependencia_id']}/{$a['archivo']}",$a['archivo']); ?>
			<?php else: ?>
					<?php echo "<strong style='color:green'>Mensaje</strong>"; ?>
			<?php endif; ?>
         <?php if ($_SESSION['grupo_id']==1): ?>
					<td><?php echo $a['director'];  ?></td>
					<td><?php echo $a['siglas'];    ?></td>
         <?php endif; ?>
         <!-- MENSAJE DEL CONTRALOR -->
         <?php if ($_SESSION['grupo_id']==2): ?>
               <td style="background-color:#fcefa9"><?php echo $a['respuesta']; ?></td>
         <?php endif?>
         <!-- END MENSAJE DEL CONTRALOR -->
               <td>
                  <?php if ($_SESSION['grupo_id']==1): ?>
                  <?php echo form::dropdown(array('id'=>"estatus_id_{$a['id']}",
                                                            'name'=>"estatus_id_{$a['id']}",
                                                            'onchange'=>"cambiar_estatus({$a['id']},this.value);"),
                                                            $a['estatus_adjuntos'],
                                                            (isset($a['estatus_id'])?$a['estatus_id']:0)); ?>
                  <?php else: ?>
                     <strong><?php echo $a['estatus_desc']; ?></strong>
                  <?php endif; ?>
               </td>
               <td><a href="<?php echo  url::base( ); ?>buzon/show_msg_admin" 
                              onclick="xid='<?php echo $a["id"]; ?>'; 
                              Modalbox.show(this.href, {title: 'Enviar Mensaje', width: 350}); 
                              return false;">
                              <?php echo html::image('media/images/book_edit.png'); ?></a>
               </td>
		</tr>
		<?php endforeach; ?>
</tbody>
</table>
</div>
	</td>
	</tr>
<?php else: ?>
		   <td>&nbsp;</td>
	</tr>
<?php endif; ?>
