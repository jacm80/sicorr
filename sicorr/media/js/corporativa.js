function enviar_motivo( ) {
   new Ajax.Request(base_url + 'corporativa/guardar_motivo',
                     {
                        method:'post',
                        parameters: { 'xid':xid,'motivo':$F('motivo') },
                        onSuccess: function( ) { 
                                       alert('Mensaje enviado'); 
                                       Modalbox.hide( );
                                   }
                     });
}


function cambiar_estatus(xid,enviada) {
   new Ajax.Request(base_url + 'corporativa/cambiar_estatus',
                    {
                     method:'post',
                     parameters: { 'xid':xid,'enviada':enviada },
                     onSuccess: function( ) { alert('Estatus cambiado'); }
                    });

}
