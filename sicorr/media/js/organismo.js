Event.observe(window,'load', function( ) {
	Event.observe('aceptar','click',function( ) {
		var campos = ['descripcion','siglas'];	
		for (var i=0;i<=1;i++) {
			if ($(campos[i]).value == '') { 
				alert(campos[i]+' no puede estar vacio');
				$(campos[i]).focus( );
				return;
			}
		}
		$("forga").submit( );
	});	
});
