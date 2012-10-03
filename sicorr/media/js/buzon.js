var xid = '0';


function cambiar_estatus_adjuntos(cid,uid)
{
   new Ajax.Request(base_url + 'buzon/cambiar_estatus_adjuntos',
                     {
                     parameters: { 'cid':cid,'uid':uid },
                     onSuccess: function( ){ /*alert(cid);*/ }
                     });
}

function enviar_resp_admin( ) {
   new Ajax.Request(base_url + 'buzon/guardar_respuesta_adjunto',
                     {
                        method:'post',
                        parameters: { 'xid':xid,'respuesta':$F('respuesta_admin') },
                        onSuccess: function( )
                                    { 
                                    alert('Mensaje enviado'); 
                                    //$('hide_all').hide( );
                                    //$('form-msg-admin').hide( );
                                    Modalbox.hide( );
                                   }
                     });

}

function cambiar_estatus(el_id,estatus) {
   new Ajax.Request(base_url + 'buzon/cambiar_estatus_adjunto',
                     {
                        method:'post',
                        parameters: { 'xid':el_id,'estatus_id':estatus },
                        onSuccess: function( )
                                    { 
                                    alert('Estado Cambiado'); 
                                    //$('hide_all').hide( );
                                    //$('form-msg-admin').hide( );
                                   }
                     });
}
