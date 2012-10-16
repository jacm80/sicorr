//var item = 1;
//var adj  = 1;

function cambiar_estatus(el_id,estatus) {
   new Ajax.Request(base_url + 'buzon/cambiar_estatus_adjunto',
                     {
                        method:'post',
                        parameters: { 'xid':el_id,'estatus_id':estatus },
                        onSuccess: function( ) { alert('Estado Cambiado'); }
                     });
}

//----------------------------------------------------------------------------
// Perfil Director 
//----------------------------------------------------------------------------
//
function eliminar_adjunto(item){
   if (confirm('Esta seguro de eliminar el archivo?')){
      $('adj_'+item).remove( );
      new Ajax.Request(base_url+'correspondencia/eliminar_adjunto',
		{
		  method:'post',
		  parameters: 'id='+item,
		  //onSuccess: function(x) { $('adjuntos').insert(x.responseText); adj++; $('add').hide(); } 
	  });
   }
}


function guardar_adjunto( ){
   new Ajax.Updater('x-x',base_url+'correspondencia/guardar_adjunto',{
      method:'post',
      contentType:'application/x-www-form-urlencoded',
      parameters:{
                  item:adj,
                  cid:$F('cid'),
                  documento:$('documento'),
                  mensaje:$F('observacion')
                 },
      insertion: 'before',
      //todo
      onComplete: function(){ _cancelar_instruccion( ); adj++; }
   });
}

function _cancelar_adjunto( ){
   $('botonera').remove( ); 
   $('x-x').remove( ); 
   $('add').show( );
   adj--;
}

function _cancelar_instruccion( ) {
   $('botonera').remove( ); 
   $('x-x').remove( ); 
   $('add').show( );
   item--;
}

/// ??????????????????????????????????????????????????????????
function _get_dependencias( ) {
   var dependencias = [];
   $('frminstruccion').select('input[type=checkbox]').each(function(item) {
      if (item.type == 'checkbox' && item.checked == true) { 
         dependencias[dependencias.length] = parseInt(item.value); 
      } 
	});
   return dependencias;	
}

function guardar_instruccion( ) {
   /**/
   var ary_dependencias = _get_dependencias( );
   new Ajax.Updater('x-x',base_url+'correspondencia/guardar_instruccion',
                        {
                        method:'post',
                        //contentType: 'multipart/form-data',
                        parameters:{ 
                                     item:item,
                                     cid:$F('cid'),
                                     instruccion_id:$F('instruccion_id'),
                                     observaciones:$F('observaciones'),
                                     dependencias: ary_dependencias.join()
                                    },
                        insertion: 'before',
                        onComplete: function(){ _cancelar_instruccion( ); item++; }
                     });
   /**/
}

Event.observe(window,'load',function( ) {
  
   //--------------------------------------------------------------------------------------------
	if (grupo_id == 2) //director 
	{
  		
      Event.observe('adjuntar','click',function( ) {
	  		new Ajax.Request(base_url+'correspondencia/adjuntar',
			{
		 		method:'post',
		 		parameters: 'adj='+adj,
		 		onSuccess: function(x) { $('adjuntos').insert(x.responseText); adj++; $('add').hide(); } 
			});
		});
	}
	//--------------------------------------------------------------------------------------------
	if (grupo_id == 1) //administrador
	{
		Event.observe('agregar-instruccion','click',function( ) {
         var cid = $F('cid');
         new Ajax.Request(base_url+'correspondencia/add_instruccion',
			   {
		 			method:'post',
		 			parameters: 'item='+item,
		 			onSuccess: function(x) { $('instrucciones').insert(x.responseText); $('add').hide( ); item++; } 
	  			}
			);
      
      });
  	}
	//--------------------------------------------------------------------------------------------
   

});
