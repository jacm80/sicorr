/*!
 * Ext JS Library 3.3.1
 * Copyright(c) 2006-2010 Sencha Inc.
 * licensing@sencha.com
 * http://www.sencha.com/license
 */

Ext.onReady(function( ){

		Ext.BLANK_IMAGE_URL = base_url + '/media/js/ext-3.3.1/resources/images/default/s.gif';
		
    Ext.QuickTips.init( );
    
    // for this demo configure local and remote urls for demo purposes
    var url = { remote: base_url + 'obra/populate_grid' };

    // configure whether filter query is encoded or not (initially)
    var encode = false;
    
    // configure whether filtering is performed locally or remotely (initially)
    var local = true;

    store = new Ext.data.JsonStore({
        // store configs
        autoDestroy: true,
        url: url.remote,
        remoteSort: false,
        sortInfo: {
            field: 'id',
            direction: 'ASC'
        },
        storeId: 'myStore',
        
        // reader configs
        idProperty: 'id',
        root: 'data',
        totalProperty: 'total',
        fields: [
									{ name: 'id', sortType:'asInt', type:'int'	}, 
									{ name: 'numero' 														}, 
									{ name: 'nombre'														}, 
									{ name: 'unidad_ejecutora'									} 
								]
    });

    var filters = new Ext.ux.grid.GridFilters({
        // encode and local configuration options defined previously for easier reuse
        encode: encode, // json encode the filter query
        local: local,   // defaults to false (remote filtering)
        filters: [
									{ type: 'numeric' , dataIndex: 'id'   						 }, 
									{ type: 'string'  , dataIndex: 'numero'			  		 }, 
									{ type: 'string'  , dataIndex: 'nombre'   		 		 }, 
									{ type: 'string'  , dataIndex: 'unidad_ejecutora'  } 
								]
    });    
    
    // use a factory method to reduce code while demonstrating
    // that the GridFilter plugin may be configured with or without
    // the filter types (the filters may be specified on the column model
    var createColModel = function (finish, start) {

        var columns = [
												{ dataIndex: 'id', 					header: 'Id', 					filterable: true 												 }, 
												{ dataIndex: 'numero', 			header: 'Numero', 			id: 'numero', filter: { type: 'string' } }, 
												{ dataIndex: 'nombre', 			header: 'Nombre', 			id: 'nombre', filter: { type: 'string' } },
												{ dataIndex: 'unidad_ejecutora', 			header: 'Unidad Ejecutora', 			id: 'unidad_ejecutora', filter: { type: 'string' } }
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
        colModel: createColModel(4),
        loadMask: true,
        plugins: [filters],
        autoExpandColumn: 'nombre',
				listeners: {
            render: {
                fn: function( ) {
                    store.load({
                        params: {
                            start: 0,
                            limit: 25
                        }
                    });
                }
            }
        },
				sm: new Ext.grid.RowSelectionModel({
					singleSelect: true,
					listeners:{
						rowselect: {
							fn: function(sm,index,record){
											location.href = base_url+'obra/editar/'+record.id;
									}
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
                toggleHandler: function(btn, pressed){
                    var view = grid.getView();
                    view.showPreview = pressed;
                    view.refresh();
                }
            }]
        })
		
    });

		// se agrega un panel y item es donde renderiza el grid
    var panel = new Ext.Panel({
        title: 'Obras',
				renderTo:'grid-consulta',
        height: 400,
        width: 920,
        layout: 'fit',
        items: grid
    }).show( );

});
