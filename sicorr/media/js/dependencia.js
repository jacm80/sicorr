Event.observe(window,'load', function( ) {
	Event.observe('aceptar','click',function( ) {
		var campos = ['direccion','siglas','usuario_id','color'];
		for (var i=0;i<=3;i++) {
			if ($(campos[i]).value == '') { 
				alert(campos[i]+' no puede estar vacio');
				return;
			}
		}
		$("elform").submit( );
	});	
});
