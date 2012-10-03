Event.observe(window,'load', function( ) {
	Event.observe('aceptar','click',function( ) {
		var campos = ['descripcion','cargo','representante','telefono_celular','telefono_oficina','email'];	
		for (var i=0;i<=1;i++) {
			if ($(campos[i]).value == '') { 
				alert(campos[i]+' no puede estar vacio');
				$(campos[i]).focus( );
				return;
			}
		}
      if ($F('organismo_id') == 0) { alert('seleccione el organismo'); return; }
		$("frmContacto").submit( );
	});	
});
