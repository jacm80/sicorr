/*!
 * Ext JS Library 3.3.1
 * Copyright(c) 2006-2010 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 */

Ext.onReady(function( ){

	Ext.BLANK_IMAGE_URL = base_url + 'media/js/ext-3.3.1/resources/images/default/s.gif';
		
   Ext.QuickTips.init( );
    
   // for this demo configure local and remote urls for demo purposes
   var url = { remote: base_url + 'consulta/llenar_grid' };

   // configure whether filter query is encoded or not (initially)
   var encode = false;
    
    // configure whether filtering is performed locally or remotely (initially)
    var local = true;

    store = new Ext.data.JsonStore({
        // store configs
        autoDestroy: true,
        url: url.remote,
        remoteSort: false,
        sortInfo: { field: 'id',direction: 'ASC' },
        storeId: 'myStore',
        
        // reader configs
        idProperty: 'id',
        root: 'data',
        totalProperty: 'total',
        fields: [
						{ name: 'id', sortType:'asInt', type:'int'	}, 
						{ name: 'fecha_recibido'							}, 
						{ name: 'fecha_oficio' 								}, 
						{ name: 'nro_oficio' 								}, 
						{ name: 'contacto' 									}, 
						{ name: 'asunto'										}, 
						{ name: 'suscrito'									}, 
						/*{ name: 'dependencia'								}, */
						{ name: 'estado'										} 
					 ]
    });

    var filters = new Ext.ux.grid.GridFilters({
        // encode and local configuration options defined previously for easier reuse
        encode: encode, // json encode the filter query
        local: local,   // defaults to false (remote filtering)
        filters: [
						{ type: 'numeric' , dataIndex: 'id'   						}, 
						{ type: 'date'		, dataIndex: 'fecha_recibido'			}, 
						{ type: 'date'		, dataIndex: 'fecha_oficio'   		}, 
						{ type: 'numeric' , dataIndex: 'nro_oficio'  			}, 
						{ type: 'string' 	, dataIndex: 'contacto'  				}, 
						{ type: 'string' 	, dataIndex: 'suscrito'  				}, 
						/* { type: 'string' 	, dataIndex: 'dependencia'  			}, */
						{ type: 'string' 	, dataIndex: 'estado'  					} 
					 ]
    });    
    
    // use a factory method to reduce code while demonstrating
    // that the GridFilter plugin may be configured with or without
    // the filter types (the filters may be specified on the column model
    var createColModel = function (finish, start) {

        var columns = [
								{ dataIndex: 'id',header: 'Id', filterable: true }, 
								{ dataIndex: 'fecha_recibido'	, header: 'Fecha Recibido'	, id: 'fecha_recibido'	, filter: { type: 'date' 	}	}, 
								{ dataIndex: 'fecha_oficio'	, header: 'Fecha Oficio'	, id: 'fecha_oficio'		, filter: { type: 'date' 	} 	},
								{ dataIndex: 'nro_oficio'		, header: 'No. Oficio'		, id: 'nro_oficio'		, filter: { type: 'numeric'} 	},
								{ dataIndex: 'contacto'			, header: 'Contacto'			, id: 'contacto'			, filter: { type: 'string' } 	},
								{ dataIndex: 'suscrito'			, header: 'Suscrito'			, id: 'suscrito'			, filter: { type: 'string' } 	},
							/*	{ dataIndex: 'dependencia'		, header: 'Dependencia'		, id: 'dependencia'		, filter: { type: 'string' } 	}, */
								{ dataIndex: 'estado'			, header: 'Estado'			, id: 'estado'				, filter: { type: 'string' } 	}
							 ];

        return new Ext.grid.ColumnModel({
            columns: columns.slice(start || 0, finish),
            defaults: { sortable: true }
        });
    
		};
    
    var grid = new Ext.grid.GridPanel({
        stripeRows: true,
		  frame:true,
		  border: false,
        store: store,
        colModel: createColModel(7),
        loadMask: true,
        plugins: [filters],
        autoExpandColumn: 'contacto',
				listeners: {
            render: {
                fn: function( ) {
                    store.load({ params: { start: 0, limit: 25 } });
                }
            }
        },
		
			sm: new Ext.grid.RowSelectionModel({
			singleSelect: true,
			listeners:{
				rowselect: {
					fn: function(sm,index,record){ location.href = base_url+'correspondencia/editar/'+record.id+'/3'; }
				}
			}
		}),
		
		// no lo modifiques a menos que sepas lo que haces
      //bbar: [ ]new Ext.PagingToolbar({ store: store, pageSize: 50, plugins: [filters] })
		
		bbar: new Ext.PagingToolbar({
            pageSize: 25,
            store: store,
            displayInfo: true,
            displayMsg: 'Mostrando {0} - {1} de {2}',
            emptyMsg: "No existen registros.",
            items:[
                '-', {
                pressed: true,
                enableToggle:true,
                text: 'Mostrar previsualizaci&oacute;n',
                cls: 'x-btn-text-icon details',
                toggleHandler: function(btn, pressed) {
                    var view = grid.getView( );
                    view.showPreview = pressed;
                    view.refresh( );
                }
            }]
        })
		
    });

	 // se agrega un panel y item es donde renderiza el grid
    var panel = new Ext.Panel({
        title: 'Consulta de Correspondencias',
		  renderTo:'grid-consulta',
        height: 350,
        width: '100%',
        layout: 'fit',
        items: grid
		  //viewConfig: { forceFit: true }
    }).show( );

});
