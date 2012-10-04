Event.observe(window,'load',function( ){
	
   calendar.set('fecha');

   Event.observe('filtrar','click',function( ) {  
	  		new Ajax.Request(base_url+'bitacora/filtrar',
					{
		 				method:'post',
		 				parameters: { 'usuario_id':$F('usuario_id'),'nreg':$F('nreg'),'fecha':$F('fecha') },
		 				onSuccess: function(x){ $('table_data').innerHTML = x.responseText; } 
	 				}
				);
  		});

});
