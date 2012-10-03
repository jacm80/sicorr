<h3>BIENVENIDO AL REGISTRO DE CORRESPONDENCIA</h3> 
<br />
<form action="<?php echo url::base( ); ?>correspondencia/guardar" method="post" name="frmupload" enctype="multipart/form-data" id="frmupload">
	<input type="hidden" id="id" name="id" value="<?php if (isset($id)) echo $id; ?>"/>
	<table id="form">
	    <tr>
			<td>Fecha de Recibido: </td>
			<td class="input">
			  <input name="fecha_recibido" id="fecha_recibido" value="<?php if (isset($fecha_recibido)) echo $fecha_recibido; ?>"/>
			</td>
		</tr>
		<tr>
			<td>Fecha de Oficio:</td>
			<td class="input"><input name="fecha_oficio" id="fecha_oficio" value="<?php if (isset($fecha_oficio)) echo $fecha_oficio; ?>"/></td>
		</tr>	
		<tr>
			<td>Numero de Oficio:</td>
			<td class="input"><input name="nro_oficio" id="nro_oficio" value="<?php if (isset($nro_oficio)) echo $nro_oficio; ?>"/></td>
		</tr>
		<tr>
			<td>Suscrito por:</td>
			<td class="input"><input name="suscrito" id="suscrito" value="<?php if (isset($suscrito)) echo $suscrito; ?>" style="width:80%;" /></td>
		</tr>
		<tr>
			<td>Asunto:</td>
			<td class="input"><textarea id="asunto" name="asunto" style="width: 80%;"><?php if (isset($asunto)) echo $asunto; ?></textarea></td>
		</tr>
		<tr>
			<td>Archivo Digital</td>
			<td class="input"><input type="file" name="archivo" id="archivo" style="width: 80%;"/></td>
		</tr>
		<tr>
			<td>Organismo:</td>
			<td class="input"><?php echo form::dropdown(array('id'=>'organismo_id','name'=>'organismo_id'),$organismos,(isset($organismo_id))?$organismo_id:0) ?></td>
		</tr>
		<tr>
			<td>Contactos:</td>
			<?php if (uri::segment(2)=='editar'): ?>
				<?php echo '<td class="input">' . form::dropdown(array('id'=>'contacto_id','name'=>'contacto_id'),
												isset($contactos)?$contactos:array(),(isset($contacto_id))?$contacto_id:0) .'</td>' ?>
			<?php else: ?>
				  <td class="input"><div id="contactos_div"></div></td>
			<?php endif ?>
		</tr>
      <!--
		<tr>
			<td>Estado:</td>
			<td class="input">
				<span style="color: #093475;">EN PROCESO</span>
			</td>
		</tr>
      -->
		<tr>
			<td colspan="2" class="td_boton">
				<button id="aceptar" 	 name="aceptar" type="button"><?php echo html::image('media/images/disk.png');?>&nbsp;Aceptar</button>
				<button id="restablecer" name="restablecer" type="reset"><?php echo html::image('media/images/clear1.png');?>&nbsp;Restablecer</button>
			</td>
		</tr>
	</table>
</form>
