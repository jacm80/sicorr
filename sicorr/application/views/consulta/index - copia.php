<h3 ="/sicorr/contacto/nuevo" style="display:block; text-align:center;">SISTEMA DE GESTIÓN DE CORRESPONDENCIA</h3> <br>
<table id="grid">
  <tbody>
	 <td><a href="<?php echo url::base( ); ?>correspondencia"> Registrar Correspondencia </a></td>
    <td><a href="<?php echo url::base( );?>organismo">Organismos</a></td>
    <td><a href="<?php echo url::base( );?>consulta">Consulta</a></td>
    <td><a href="<?php echo url::base( );?>contacto">Registrar Contacto</a></td>
    <td><a href="<?php echo url::base( );?>menu">Ir al Menú</a></td>
    <td><a href="<?php echo url::base( ); ?>reporte"> Reporte </a>
    <td><a href="<?php echo url::base( );?>login">Salir</a></td>
  </tbody>
</table>
<br>
<br />
<div style="text-align:center;">
	Solicitudes:
	<?php echo form::dropdown(array('id'=>'estado_correspondencia_id','name'=>'estado_correspondencia_id'),$estados_correspondencias,0); ?>
</div>
<br />

<table border="1" style="text-align:center;margin: 0 auto;">
	<thead>
		<tr>
			<th>id</th>
			<th>Fecha Recibido</th>
			<th>Fecha Oficio</th>
			<th>No Oficio</th>
			<th>Contacto</th>
			<th>Asunto</th>
			<th>Suscrito</th>
			<th>Dependencia</th>
         <th>Estado</th>
		</tr>
	</thead>
	<tbody id="data_corr">
		<tr id="search">

		</tr>
	</tbody>
</table>
