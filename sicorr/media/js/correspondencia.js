//
Event.observe(window,'load',function( ){
  	   calendar.set('fecha_recibido');
  	   calendar.set('fecha_oficio');
	   //--------------------------------------------------------------------------------------------
  	   Event.observe('organismo_id','change',function( ) {  
	  		new Ajax.Request(base_url+'correspondencia/llenar_contactos',
					{
		 				method:'post',
		 				parameters: 'id='+$('organismo_id').value,
		 				onSuccess: function(x){ $('contactos_div').innerHTML = x.responseText; } 
	 				}
				);
  		});

      Event.observe('aceptar','click',function( ) {
			$("frmupload").submit( );
      });

 	});

/*

Event.observe('aceptar','click',function( ) {
			var campos = ['fecha_recibido','fecha_oficio','nro_oficio','suscrito','asunto'];
			for (var i=0;i<=campos.length-1;i++) {
				if ($(campos[i]).length == 0) { 
					alert(campos[i]+' no puede estar vacio');
					return;
				}
			}
			if ($('dependencia_id').value == 0) {
				alert('dependencia no puede quedar vacio'); 
				return; 
			} 
			if ($('estadocorrespondencia_id').value == 0) {
				alert('estado no puede quedar vacio');
				return;
			}	
			if ($('organismo_id').value > 0) {
				if ($('contacto_id').value == 0) {
					alert('contacto no puede estar vacio');
					return;
				}
			}
			else {
				alert('especifique el organismo');
				return;
			}
			$("elform").submit( );
		});
*/
