<!-- -->
<div id="hide_all" style="display:none;">
<div style="display:none; background-color: white;  position:absolute; right:508px; top: 300px;" id="form-msg-admin">
   <form style="padding: 30px;">
   <table style="border: 1px solid blue; padding: 4px;">
      <tr>
         <td>Mensaje</td>
         <td><textarea id="respuesta_admin" name="respuesta_admin"></textarea></td>
      </tr>
      <tr style="text-align:center;">
         <td colspan="2">
            <input type="button" value="Enviar" onclick="enviar_resp_admin( );" />
            <input type="button" value="Cancelar" onclick="$('hide_all').style.display='none';$('form-msg-admin').hide( );"/>
         </td>
      </tr>
   </table>
   </form>
</div>
</div>
<!-- -->

<h3>Correspondencias</h3>
<table class="grid" style="width:100%;">
	<thead>
		<tr>
         <th>ID</th>
			<th></th>
			<th style="width:10%;">Recibido</th>
			<th style="width:15%;">Oficio</th>
			<th colspan="2">Asunto</th>
			<th>Suscrito</th>
			<th style="width:30%;">Instrucciones</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody id="mibuzon">
		<?php include 'ajax_item.php'; ?>
	</tbody>
</table>
