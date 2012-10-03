<h3>Correspondencias</h3>
<table class="grid" style="width:100%;">
	<thead>
		<tr>
			<th></th>
			<th>Recibido</th>
			<th>Oficio</th>
			<th colspan="2">Asunto</th>
			<th>Suscrito</th>
			<th>Instrucciones</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<!-- registro uno -->
		<tr onmouseover="$('item1').style.backgroundColor='#ffff82';" 
			 onmouseout="$('item1').style.backgroundColor='white';" 
			 id="item1">
			<td><?php echo html::image('media/images/email_go.gif'); ?></td>
			<td>10-10-2011</td>
			<td>41.511</td>
			<td><a href="<?php echo url::base( );?>correspondencia/editar/1/1">Apoyo a la Gobernacion con sonido y audiovisual</a></td>
			<td><?php echo html::image('media/images/warning.png'); ?></td>
			<td>Perencejo Perez</td>
			<td>&nbsp;</td>
			<td>&nbsp;</a>	
			</td>
		</tr>
		<!-- fin registro uno -->
		<!-- registro dos -->
		<tr onmouseover="$('item2').style.backgroundColor='#ffff82';" 
			 onmouseout="$('item2').style.backgroundColor='#bbeae7';"
				style="background-color:#bbeae7;" 
			 id="item2">
			<td><?php echo html::image('media/images/email_go.gif'); ?></td>
			<td>10-10-2011</td>
			<td>41.511</td>
			<td><a href="<?php echo url::base( );?>correspondencia/editar/1/1">Apoyo a la Gobernacion con sonido y audiovisual</a></td>
			<td><?php echo html::image('media/images/carga_director.png'); ?></td>
			<td>Perencejo Perez</td>
			<td>Informar por Escrito, Dar Opinión</td>
			<td>&nbsp;</a>	
			</td>
		</tr>
		<!-- fin registro dos -->
		<!-- registro tres -->
		<tr onmouseover="$('item3').style.backgroundColor='#ffff82';" 
			 onmouseout="$('item3').style.backgroundColor='#85bf87';" 
			 id="item3" style="background-color: #85bf87;">
			<td><?php echo html::image('media/images/email_go.gif'); ?></td>
			<td>10-10-2011</td>
			<td>41.511</td>
			<td><a href="<?php echo url::base( );?>correspondencia/editar/1/1">Apoyo a la Gobernacion con sonido y audiovisual</a></td>
			<td><?php echo html::image('media/images/procesado2.png'); ?></td>
			<td>Perencejo Perez</td>
			<td>Informar por Escrito, Dar Opinión</td>
			<td><a href="#" onclick="Effect.SlideDown('abj_3'); return false;"><?php echo html::image('media/images/lupa.png'); ?></a>	
			</td>
		</tr>
		<tr>
			<td colspan="8">
				<div style="display:none;" id="abj_3">
				<table class="grid" style="width:100%;">
					<thead>
						<tr>
							<th colspan="5" style="background-color:#b5ccdf;color:#1378b2;">
									ARCHIVOS ADJUNTOS&nbsp;<a href="#" onclick="Effect.SlideUp('abj_3'); return false;">
									<?php echo html::image('media/images/lupa_menos.gif'); ?></a></span>
							</th>
						</tr>
						<tr>
							<th>Id</th>
							<th>Descripcion</th>
							<th>Documento</th>
							<th>Director</th>
							<th>Direccion</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>documentos de las especificaciones</td>
							<td><a href="">gobernacion.doc</a></td>
							<td>Yelinet Ramos</td>
							<td>DTPCG</td>
						</tr>
						<tr>
							<td>2</td>
							<td>documentos de las especificaciones</td>
							<td><a href="">gobernacion.doc</a></td>
							<td>Yelinet Ramos</td>
							<td>DTPCG</td>
						</tr>
						<tr>
							<td>3</td>
							<td>documentos de las especificaciones</td>
							<td><a href="">gobernacion.doc</a></td>
							<td>Yelinet Ramos</td>
							<td>DTPCG</td>
						</tr>
					</tbody>
				</table>
				</div>
			</td>
		</tr>
		<!-- fin registro tres -->
	</tbody>
</table>
