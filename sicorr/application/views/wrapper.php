<html>
	<head>
			<meta http-equiv="content-type" content="text/html; charset=utf-8" />
			<title>Sistema de Gestion de Correspondencia</title>
			<script type="text/javascript">
					var base_url 	= "<?php echo url::base( ); ?>";
					var action_uri = "<?php echo uri::segment(2); ?>";
					var grupo_id 	= <?php echo (isset($_SESSION['grupo_id'])) ? $_SESSION['grupo_id'] : -1 ?>;
               
               <?php 
                  if (isset($js_vars))
                  {
                     foreach ($js_vars as $k=>$v) echo "var $k = $v;\n";
                  }
               ?>
			</script>
			<?php if (isset($prototype)): ?>
				<script type="text/javascript" src="<?php echo url::base( );?>media/js/scriptaculous/lib/prototype.js"></script>
				<script type="text/javascript" src="<?php echo url::base( );?>media/js/scriptaculous/src/scriptaculous.js"></script>
			<?php endif ?>
			<?php 
				echo html::stylesheet(array('media/css/default.css'));
				if (isset($estilos))
				{
					foreach ($estilos as $css) echo HTML::stylesheet(array('media/css/'.$css.'.css')); 
				}
				if (isset($estilos_ext))
				{
					foreach ($estilos_ext as $css) echo HTML::stylesheet(array($css.'.css')); 
				}
				if (isset($js))
				{
					foreach ($js as $js) echo HTML::script(array('media/js/'.$js.'.js'));
				}
			?>
			<link rel="stylesheet" type="text/css" href="/sicorr/media/css/menu_style.css" />
	</head>
	<body>
		<div id="header"></div>
		<?php include 'menu.php'; ?>
      <?php if (isset($_SESSION['user_id'])): ?>
      <div id="breadcrumbs"  style="text-align: right; background: #B5CCDF; padding: 5px;">
         Usuario: <strong><?php echo $_SESSION['user_name']; ?></strong>
         Grupo:   <strong><?php echo $_SESSION['user_grupo']; ?></strong>
      </div>
      <?php endif; ?>
		<div id="content">
			<br />
			<div id="msj"><?php if (isset($_SESSION['msj'])) echo $_SESSION['msj']; ?></div>
      	<br />
      	<div id="error"><?php if (isset($_SESSION['error'])) echo $_SESSION['error']; ?></div>
			<br />
			<?php echo $content; ?>
			<br />
		</div>
		<div id="footer">
			<strong>&copy; Contralor&iacute;a del Estado Barinas
			<br />Direcci&oacute;n T&eacute;cnica - CEB - Contralor&iacute;a 2012 <br /></strong>
		</div>
	</body>
</html>
