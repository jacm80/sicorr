<?php $ntabs = ($_SESSION['grupo_id']==1) ? 3 : 2 ?>

<?php if ($_SESSION['grupo_id']==1): ?>
	<div style="text-align:right;">

		<div id="btnfinalizado">
			<?php echo html::image('media/images/email_go.gif'); ?>
			<a href="<?php echo url::base( );?>correspondencia/cerrar_proceso/<?php echo $id ?>"><strong>Finalizar Proceso</strong></a>
		</div>
	</div>
<?php endif; ?>
	<!-- LINK DE LOS TABS -->
<div id="tabs">
		<ul>
			<li id="tabHeaderActive"><a href="javascript:void(0)" onClick="toggleTab(1,<?php echo $ntabs; ?>)"><span>Correspondencia</span></a></li>
			<?php if ($_SESSION['grupo_id']==1): ?>
				<li id="tabHeader2">
					<a href="javascript:void(0)" onClick="toggleTab(2,<?php echo $ntabs; ?>)">
					<span>Instrucciones</span></a>
				</li>
				<li id="tabHeader3">
					<a href="javascript:void(0)" onClick="toggleTab(3,<?php echo $ntabs; ?>)">
					<span>Remitidos</span></a>
				</li>
			<?php elseif (in_array($_SESSION['grupo_id'],array(2))): ?>
				<li id="tabHeader2">
					<a href="javascript:void(0)" onClick="toggleTab(2,<?php echo $ntabs; ?>)">
					<span>Remitir</span></a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
	<!-- FIN DE LOS LINKS DE LOS TABS -->
	<div id="tabscontent">

		<div id="tabContent1" class="tabContent" style="display:yes;"><?php include 'show_info.php'; ?></div>

		<?php if ($_SESSION['grupo_id']==1): ?>
         <form method="post" action="<?php echo url::base( ); ?>correspondencia/guardar_instruccion" id="frminstruccion">
            <input type="hidden" name="cid" id="cid" value="<?php echo (isset($id)) ? $id : ''; ?>"/>
			   <div id="tabContent2" class="tabContent" style="display:none;"><?php include 'admin/instrucciones.php'; ?></div>
         </form>
			<div id="tabContent3" class="tabContent" style="display:none;"><?php include 'admin/remitidos.php'; ?></div>
		<?php elseif ($_SESSION['grupo_id']==2): ?>
         <input type="hidden" name="cid" id="cid" value="<?php echo (isset($id)) ? $id : ''; ?>"/>
			<div id="tabContent2" class="tabContent" style="display:none;">
         <form action="<?php echo url::base( ); ?>correspondencia/guardar_adjunto" method="post" id="frmAdjuntar" name="frmAdjuntar" enctype="multipart/form-data">
            <?php include 'director/lista_adjuntos.php'; ?></div>
         </form>
      <?php //else: ?>
		<?php endif; ?>

</div>
