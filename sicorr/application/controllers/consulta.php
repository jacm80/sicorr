<?php
	
	class Consulta_controller extends Controller {
		
		var $wrapper;

		public function __construct( )
		{
			parent::__construct( );
			$this->session = Session::instance( );
			$this->wrapper = new View('wrapper');
		}

		private function __set_extjs($js_action)
		{
			$this->wrapper->estilos_ext = array(
														// css por defecto de extjs
														'media/js/ext-3.3.1/resources/css/ext-all',
														// para el tema en gris
														'media/js/ext-3.3.1/resources/css/xtheme-gray',
				 										'media/js/ext-3.3.1/examples/ux/gridfilters/css/GridFilters',
				 										'media/js/ext-3.3.1/examples/ux/gridfilters/css/RangeMenu',
				 										'media/js/ext-3.3.1/examples/shared/examples'
													//	'media/css/lightbox/css/lightbox'
														);
			$this->wrapper->js = array(
												// librerias base
												'ext-3.3.1/adapter/ext/ext-base',
												'ext-3.3.1/ext-all-debug',
												// idioma español
												'ext-3.3.1/src/locale/ext-lang-es',
												// plugins
												'ext-3.3.1/examples/ux/gridfilters/menu/RangeMenu',
		  										'ext-3.3.1/examples/ux/gridfilters/menu/ListMenu',
												'ext-3.3.1/examples/ux/gridfilters/GridFilters',
												'ext-3.3.1/examples/ux/gridfilters/filter/Filter',
												'ext-3.3.1/examples/ux/gridfilters/filter/StringFilter',
												'ext-3.3.1/examples/ux/gridfilters/filter/DateFilter',
												'ext-3.3.1/examples/ux/gridfilters/filter/ListFilter',
												'ext-3.3.1/examples/ux/gridfilters/filter/NumericFilter',
												'ext-3.3.1/examples/ux/gridfilters/filter/BooleanFilter',
												// page specific --> 
												'ext-3.3.1/examples/shared/examples',
												$js_action
												);
		}

		/*----------------------------------*/
		
		private function _get_estados( )
		{
			$data[0] = 'Seleccione';
			$ecs = ORM::factory('estadocorrespondencia')->find_all( );
			foreach($ecs as $ec) $data[$ec->id] = $ec->descripcion;
			return $data;
		}

		public function llenar_grid( )
		{
			$corr = ORM::factory('correspondencia')->find_all( );
			foreach ($corr as $c)
			{
				$data[] = array(
									 'id' 				=> $c->id,
									 'fecha_recibido' => $c->fecha_recibido,
									 'fecha_oficio' 	=> $c->fecha_oficio,
									 'nro_oficio'		=> $c->nro_oficio,
									 'contacto'			=> $c->contacto->descripcion,
									 'asunto'			=> $c->asunto,
									 'suscrito'			=> $c->suscrito,
                            'estado'         => Utils::estado_correspondencia($c->id)
									 //'dependencia'		=> $c->dependencia->direccion,
									 //'estado'			=> $c->estadocorrespondencia->descripcion
								   );
			}
			$data = (!isset($data)) ? array( ) : $data;
			echo '{total:' . sizeof($data) .', data:' . json_encode($data) . ' }';	
		}
	
		public function index( )
		{
			$content = new View('consulta/index');
			$this->wrapper->content = $content;
			$this->__set_extjs('grid_consulta');
			$this->wrapper->render(TRUE);
		}
}
// End Login
