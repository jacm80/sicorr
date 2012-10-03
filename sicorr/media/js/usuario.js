Event.observe(window,'load', function( ) {
	Event.observe('aceptar','click',function( ) {
		var campos = ['usuario','nombres','apellidos','cedula','password','confirmar_password'];
		for (var i=0;i<=5;i++) {
			if ($(campos[i]).value == '') { 
				alert(campos[i]+' no puede estar vacio');
				$(campos[i]).focus( );
				return;
			}
		}
		if ( $('password').value != $('confirmar_password').value )
		{
			alert ('confirme el password');
			$('confirmar_password').focus( );
			return;
		}
		if ($('grupo_id').value == 0){
			alert('grupo no puede estar vacio');
			return;
		}
		$("frm").submit( );
	});	
});
