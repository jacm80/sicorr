<style>h2{text-align:center;}</style>
<h2>Sistema de Gestión de Correspondencia</h2>
<h2>REPORTES</h2>
<br />
<br />
<form id="frmR" method="post" action="<?php echo url::base( ); ?>reporte/correspondenciaxfecha"	>
<table style="margin:0 auto; border: 2px solid #CCCCCB; border-radius: 20px; padding: 8px;">
	<tbody>
	   <tr>
		  <td style="background-color:#CCCCCB; padding: 4px;">Fecha Inicio:</td>
		  <td><input id="fecha_inicio" name="fecha_inicio" type="text" /></td>
		  <td style="background-color:#CCCCCB; padding: 4px;">Fecha Fin:</td>
		  <td><input id="fecha_fin" name="fecha_fin" type="text" /></td> 
	   </tr>  
  </tbody>
</table>
<br />
<div style="text-align:center;">
<!-- <a href="<php echo url::base( ); ?>reporte/correspondenciaxfecha">IMPRIMIR</a> -->
   <button name="btnenviar" type="submit"><?php echo html::image('media/images/pdf.png');?>&nbsp;Enviar</button>
</div>
</form>
