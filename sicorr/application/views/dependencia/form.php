<h3 style="display:block; text-align:center;">Dependencia Nueva</h3> 
<form action="<?php echo url::base( ); ?>dependencia/guardar" method="post" id="elform">
	<input type="hidden" id="id" name="id" value="<?php if (isset($id)) echo $id; ?>"/>
	<table id="form" style="width:90%;">
	   <tr>
			<td style="width:40%;">Nombre de Direccion: </td>
			<td class="input"><textarea name="direccion" id="direccion" rows="3" cols="40"><?php if (isset($direccion)) echo $direccion; ?></textarea></td>
		</tr>
		<tr>
			<td>Siglas</td>
			<td class="input"><input name="siglas" id="siglas" value="<?php if (isset($siglas)) echo $siglas; ?>" style="width:90%;"/></td>
		</tr>
      <tr>
			<td>Usuario:</td>
			<td class="input">
            <?php echo form::dropdown(array('id'=>'usuario_id','name'=>'usuario_id'),$usuarios,(isset($usuario_id))?$usuario_id:0)?>
         </td>
      </tr>	
		<tr>
			<td>Color</td>
			<td class="input"><input type="text" class="color" id="color" name="color" value="<?php if (isset($color)) echo $color; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="td_boton">
				<button id="aceptar" 	name="aceptar" type="button">Aceptar</button>
				<button id="restablecer" name="restablecer"  type="reset">Restablecer</button>
			</td>
		</tr>
	</table>
</form>
