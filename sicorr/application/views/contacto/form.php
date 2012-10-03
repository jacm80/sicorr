<h3 style="display:block; text-align:center;">REGISTRO DE CONTACTOS</h3>
<br />
<form action="<?php echo url::base( ); ?>contacto/guardar" method="post" id="frmContacto">
	<input type="hidden" id="id" name="id" value="<?php if (isset($id)) echo $id; ?>"/>	
	<table id="form" style="width:80%">
	    <tr>
			<td>Nombre de la Entidad </td>
			<td class="input"><textarea name="descripcion" id="descripcion"><?php if (isset($descripcion)) echo $descripcion; ?></textarea></td>
		</tr>
		<tr>
			<td>Organismo:</td>
			<td class="input"><?php echo form::dropdown(array('id'=>'organismo_id','name'=>'organismo_id'),$organismos,(isset($organismo_id))?$organismo_id:0) ?></td>
		</tr>
		<tr>
			<td>Cargo del Encargado</td>
			<td class="input"><input	name="cargo" id="cargo" value="<?php if (isset($cargo)) echo $cargo; ?>"/></td>
		</tr>
		<tr>
			<td>Nombre del Encargado </td>
			<td class="input"><input name="representante" id="representante" value="<?php if (isset($representante)) echo $representante; ?>"/></td>
		</tr>
		<tr>
			<td>Teléfono Celular</td>
			<td class="input"><input name="telefono_celular" id="telefono_celular" value="<?php if (isset($telefono_celular)) echo $telefono_celular; ?>"/></td>
		</tr>	
		<tr>
			<td>Teléfono Oficina</td>
			<td class="input"><input name="telefono_oficina" id="telefono_oficina" value="<?php if (isset($telefono_oficina)) echo $telefono_oficina; ?>"/></td>
		</tr>
		<tr>
			<td>Correo Eletrónico</td>
			<td class="input"><input	name="email" id="email" value="<?php if (isset($email)) echo $email; ?>"/></td>
		</tr>
		<tr>
			<td colspan="2" class="td_boton">
				<button id="aceptar" 	 name="aceptar" type="button">Aceptar</button>
				<button id="restablecer" name="restablecer"  type="reset">Restablecer</button>
			</td>
		</tr>
	</table>
</form>
