<form method="post" action="<?php echo url::base( ); ?>login/login" method="post" id="el" style='height:300px;'>
	<table id="tabla_login">
		<tr>
			<td colspan="2" style="text-align:center;"><?php echo html::image('media/images/llaves.gif'); ?></td>
		</tr>
		<tr>
			<td>Usuario</td>
			<td><input type="text" name="usuario" id="usuario"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" id="password"></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:center;">
         	<button name="aceptar" id="aceptar"><?php echo html::image('media/images/user.gif'); ?>&nbsp;Aceptar</button>
         	<button name="restablecer" id="restablecer"><?php echo html::image('media/images/clear1.png'); ?>&nbsp;Restablecer</button>
			</td>	
      </tr>
	</table>
</form>
