<h3 style="display:block; text-align:center;">REGISTRO DE NUEVO USUARIO</h3> <br>
<form action="<?php echo url::base( ); ?>usuario/guardar" method="post" id="frm">
	<input type="hidden" id="id" name="id" value="<?php if (isset($id)) echo $id; ?>"/>
	<table id="form" style="width:80%;">	
	<tr>
		<td>Usuario</td>
		<td class="input"><input name="usuario" id="usuario" value="<?php if (isset($usuario)) echo $usuario; ?>"/></td>
	</tr>
	<tr>
		<td>Nombre</td>
		<td class="input"><input name="nombres" id="nombres" value="<?php if (isset($nombres)) echo $nombres; ?>"/></td>
	</tr>
	<tr>
		<td>Apellido</td>
		<td class="input"><input name="apellidos" id="apellidos" value="<?php if (isset($apellidos)) echo $apellidos; ?>"/></td>
	</tr>
	<tr>
		<td>Cedula</td>
		<td class="input"><input name="cedula" id="cedula" value="<?php if (isset($cedula)) echo $cedula; ?>"/></td>
	</tr>	
	<tr>
		<td>Password</td>
		<td class="input"><input name="password" id="password" value="<?php if (isset($password)) echo $password; ?>"/></td>
	</tr>
	<tr>
		<td>Confirmar Password</td>
		<td class="input"><input	name="confirmar_password" id="confirmar_password" value="<?php if (isset($password)) echo $password; ?>"/></td>
	</tr>
	<tr>
		<td>Grupo</td>
		<td class="input"><?php echo form::dropdown(array('id'=>'grupo_id','name'=>'grupo_id'),$grupos,(isset($grupo_id))?$grupo_id:0) ?></td>
	</tr>	
	<tr>
		<td colspan="2" class="td_boton">
			<button id="aceptar" 	name="aceptar"	type="button">Aceptar</button>
			<button id="restablecer" name="restablecer" type="reset">Restablecer</button>
		</td>
	</tr>
	</table>
</form>
