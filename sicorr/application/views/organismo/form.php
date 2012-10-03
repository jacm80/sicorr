<form action="<?php echo url::base( ); ?>organismo/guardar" method="post" id="forga">
	<input type="hidden" id="id" name="id" value="<?php if (isset($id)) echo $id; ?>"/>
	<table id="form" style="width:60%;">
		<tr>
			<td>Descripcion</td>
			<td class="input"><textarea name="descripcion" id="descripcion"><?php if (isset($descripcion)) echo $descripcion; ?></textarea></td>
		</tr>
		<tr>
			<td>Siglas</td>
			<td class="input"><textarea name="siglas" id="siglas"><?php if (isset($siglas)) echo $siglas; ?></textarea></td>
		</tr>
		<tr>
			<td colspan="2" class="td_boton">
				<button id="aceptar" type="button" name="aceptar">Aceptar</button>
				<button id="restablecer" name="restablecer" >Restablecer</button>
			</td>
		</tr>
	</table>
</form>
