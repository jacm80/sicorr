<?php

		private function __set_extjs($js_action)
		{
			$this->view->estilos_ext = array(
														// css por defecto de extjs
														'/media/js/ext-3.3.1/resources/css/ext-all',
														// para el tema en gris
														'/media/js/ext-3.3.1/resources/css/xtheme-gray',
				 										'/media/js/ext-3.3.1/examples/ux/gridfilters/css/GridFilters',
				 										'/media/js/ext-3.3.1/examples/ux/gridfilters/css/RangeMenu',
				 										'/media/js/ext-3.3.1/examples/shared/examples',
														'/media/css/lightbox/css/lightbox'
														);
			$this->view->javascript = array(
														// librerias base
														'/ext-3.3.1/adapter/ext/ext-base',
		  												'/ext-3.3.1/ext-all-debug',
														// idioma español
														'/ext-3.3.1/src/locale/ext-lang-es',
														// plugins
														'/ext-3.3.1/examples/ux/gridfilters/menu/RangeMenu',
		  												'/ext-3.3.1/examples/ux/gridfilters/menu/ListMenu',
														'/ext-3.3.1/examples/ux/gridfilters/GridFilters',
														'/ext-3.3.1/examples/ux/gridfilters/filter/Filter',
														'/ext-3.3.1/examples/ux/gridfilters/filter/StringFilter',
														'/ext-3.3.1/examples/ux/gridfilters/filter/DateFilter',
														'/ext-3.3.1/examples/ux/gridfilters/filter/ListFilter',
														'/ext-3.3.1/examples/ux/gridfilters/filter/NumericFilter',
														'/ext-3.3.1/examples/ux/gridfilters/filter/BooleanFilter',
														// page specific --> 
														'/ext-3.3.1/examples/shared/examples',
														$js_action
														);
		}

		public function populate_bandeja( )
		{  
			$sql = "SELECT * FROM (
							SELECT 
										 dse.id AS solicitud_id,
										 dse.codigo_control,
										   p.nombre AS nombre_proyecto,
									   dse.numero_decreto,
										 dse.fecha_gaceta AS fecha_decreto,
										(
											SELECT COALESCE(
											(SELECT dep.perfil_id
		 								 	 FROM decreto_movimientos dm,
														decreto_expropiacion_perfil dep 
		 								 	 WHERE 
													dm.decreto_expropiacion_perfil_id = dep.id AND
													dm.decreto_solicitud_expropiacion_id = solicitud_id AND dm.enviado = 1
		 								 	 ORDER BY dm.id DESC LIMIT 1),4)
										 ) AS perfil_id,
										 (
											SELECT dpe.porcentaje_ejecucion 
											FROM 	
													decreto_proceso_expropiacion dpe, 
													decreto_solicitud_expropiacion dse,
													decreto_expropiacion_actividad dea
											WHERE 
													dpe.decreto_solicitud_expropiacion_id=dse.id AND
													dpe.decreto_expropiacion_actividad_id=dea.id AND
													dea.descripcion = '{$this->actividad_que_finaliza_decreto}'
										 ) AS xestatus,
										(SELECT COALESCE(xestatus,0)) AS porc_ejecucion,
										IF ((SELECT (porc_ejecucion) < 100),'EN EJECUCION','TERMINADO') AS estatus
							FROM decreto_solicitud_expropiacion dse, proyectos p
							WHERE
									dse.proyecto_id = p.id
							) bandeja";
			if ($_SESSION['perfil_id']<>1)
			{ 
				$sql.=" WHERE bandeja.perfil_id = {$_SESSION['perfil_id']}";
			}
			$decretos = $this->db->query($sql);
			foreach ($decretos as $d)
			{
				$data[ ] = array(
													'id'		    			=> 	$d->solicitud_id,
													'numero_control'	=> 	$d->codigo_control,
													'proyecto'				=> 	$d->nombre_proyecto,
													'numero_decreto' 	=> 	$d->numero_decreto,
													'fecha_decreto'		=> 	($d->fecha_decreto=='0000-00-00') ? '' : $d->fecha_decreto,
													'estatus'					=>	$d->estatus
												);
			}
			$data = (!isset($data)) ? array( ) : $data;
			echo '{total:' . sizeof($data) .', data:'.json_encode($data) . ' }';	
		}
		

		public function index( )
		{
			$content 	= new View('decreto_expropiacion/grid-view');
			$this->view->content = $content;
			$this->__set_extjs('consulta_decreto_expropiacion');
			$this->view->render(TRUE);
		}

?>
