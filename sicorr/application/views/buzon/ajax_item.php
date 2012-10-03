<?php 
   $i=1;
   $profile	= array(
							'Nuevo'		 => array('ico' => 'warning.png'			,	'color'=>'#f9ebc7'),
							'En Proceso' => array('ico' => 'carga_director.png',	'color'=>'#bbeae7'),
							'Procesado'	 => array('ico' => 'procesado2.png'		,	'color'=>'#85bf87')
						 );  

//echo kohana::debug($buzon);
//echo $_SESSION['user_id'];
?> 
<?php foreach($buzon as $b): ?>
<tr onmouseover="$('item<?php echo $i; ?>').style.backgroundColor='#ffff82';" 
	 onmouseout="$('item<?php echo $i; ?>').style.backgroundColor='<?php echo $profile[$b['estatus']]['color'];  ?>';" 
	 id="item<?php echo $i; ?>"
	 style="background-color:<?php echo $profile[$b['estatus']]['color']; ?>;"
	>
   <!--<td>< #php echo $b['id']; ></td>-->

   <?php if  ($_SESSION['grupo_id']==2): ?>
      <!-- -->
      <?php if ($b['revisar']==1): ?>
         <td style="background-color:#FED57D;"><?php echo $b['id']; ?></td>
         <td style="background-color:#FED57D;"><?php echo html::image('media/images/email_go.gif'); ?></td>
       <?php else: ?>
         <td><?php echo $b['id']; ?></td>
         <td><?php echo html::image('media/images/email_go.gif'); ?></td>
	   <?php endif; ?>
      <!-- -->
   <?php else: ?>
      <td><?php echo $b['id']; ?></td>
      <td><?php echo html::image('media/images/email_go.gif'); ?></td>
   <?php endif ?>

   <td><?php echo $b['fecha_recibido']; ?></td>
	<td><?php echo (!empty($b['archivo'])) ? html::image('media/images/attachment16.png') : '&nbsp;' ?>&nbsp;
       <?php 
            $params = NULL;
            if (in_array(Utils::extension($b['archivo']),array('jpg','png','gif'))) $params = array('rel'=>'lightbox');
       ?>
       <?php 
         $thefile =  'media/upload/correspondencias/'.$b['archivo'];
         if (file_exists($thefile)):
       ?>      
         <?php echo (!empty($b['archivo'])) ? html::anchor("media/upload/correspondencias/{$b['archivo']}",$b['nro_oficio'],$params) : 'Sin Cargar'; ?>
      <?php else: ?>
         <?php echo 'Sin Cargar' ?>
      <?php endif; ?>
   </td>
	<td>
       <a href="<?php echo url::base( );?>correspondencia/editar/<?php echo $b['id']; ?>/<?php echo $_SESSION['grupo_id'] ?>">
        <?php echo html::image('media/images/edit.gif'); ?><?php echo $b['asunto']; ?></a>
   </td>
	<td><?php echo html::image('media/images/'.$profile[$b['estatus']]['ico']); ?></td>
	<td><?php echo $b['suscrito']; ?></td>
	<td>
      <?php foreach ($b['instrucciones'] as $k=>$v): ?>
         <?php foreach ($v as $o): ?>
            <li><strong><?php echo $o['dep'] ?>:</strong>&nbsp;<?php echo $k; ?>&nbsp;(<?php echo $o['obs']; ?>)</li>
         <?php endforeach; ?>
      <?php endforeach; ?>
   </td>
	<?php if (count($b['adjuntos'])>0):  ?>
				<!--<tr>-->
               <td>
                  <a href="" onclick="cambiar_estatus_adjuntos('<?php echo $b['id']; ?>','<?php echo $_SESSION['user_id']; ?>'); 
                                      $('R_adj_<?php echo $i; ?>').show( );  
                                      Effect.SlideDown('adj_<?php echo $i; ?>'); 
                                      return false;">
               <?php echo html::image('media/images/lupa.png'); ?></a>
               </td>
				</tr>
				<tr id="R_adj_<?php echo $i; ?>" style="display:none;">
				   <td colspan="9">
				      <?php $aj=1; ?>
					   <div id="adj_<?php echo $i; ?>" style="display:none;margin:0 auto;">
                     <?php include 'adjuntos.php'; ?>
                  </div>
				   </td>
				</tr>
	<?php else: ?>
		   <td>&nbsp;</td>
		</tr>
	<?php endif; ?>
	<?php $i++; ?>
<?php endforeach; ?>
