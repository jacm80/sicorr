<?php 
   $i=1;
   $profile	= array(
							'Nuevo'		 => array('ico' => 'warning.png'			,	'color'=>'#f9ebc7'),
							'En Proceso' => array('ico' => 'carga_director.png',	'color'=>'#bbeae7'),
							'Procesado'	 => array('ico' => 'procesado2.png'		,	'color'=>'#85bf87')
						 );  
?> 

<?php if (count($buzon)>0): ?>
<?php foreach($buzon as $b): ?>
<tr onmouseover="$('item<?php echo $i; ?>').style.backgroundColor='#ffff82';" 
	 onmouseout="$('item<?php echo $i; ?>').style.backgroundColor='<?php echo $profile[$b['estatus']]['color'];  ?>';" 
	 id="item<?php echo $i; ?>"
	 style="background-color:<?php echo $profile[$b['estatus']]['color']; ?>;"
	>
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
   <?php include 'adjuntos.php'; ?>
	<?php $i++; ?>
<?php endforeach; ?>
<?php else: ?>
   <tr>
      <td colspan="8" style="text-align:center;">No hay correspondencias</td>
   </tr>
<?php endif; ?>
