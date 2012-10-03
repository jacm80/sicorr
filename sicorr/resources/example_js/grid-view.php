<div id="content">
		<div style="margin:0 auto;display:block; text-align:center;">
    <?php if(in_array($_SESSION['perfil_id'],array(4))):?>
			<a href="<?php echo url::base( ) ?>decreto_expropiacion/nuevo">NUEVA SOLICITUD DE DECRETO DE EXPROPIACION</a>
   	<?php endif ?>
	</div>
	<br />
	<div id="grid-consulta" style="margin-left: 20px;"></div>
</div>
<br />
