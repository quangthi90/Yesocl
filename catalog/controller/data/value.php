<?php 
class ControllerDataValue extends Controller {
	public function index() {
	}

	public function locationAutoComplete(){
		$json = array();

		if ( !$this->customer->isLogged() ) {
			
		}elseif ( !isset( $this->request->get['keyword'] ) || !is_string( $this->request->get['keyword'] ) ) {

		}elseif ( (utf8_strlen( $this->request->get['keyword'] ) < 1) || (utf8_strlen( $this->request->get['keyword'] ) > 32) ) {

		}else {
			$this->load->model( 'localisation/city' );

			$sort = 'name';

			$data = array(
				'filter_location' => trim( strtolower( $this->request->get['keyword'] ) ),
				// 'sort' => $sort,
			);

			$cities = $this->model_localisation_city->searchLocationByKeyword( $data );
			
			foreach ( $cities as $city ) {
				$json[] = array(
					'name' => $city->getLocation(),
					'id' => $city->getId(),
				);
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function industryAutoComplete() {
		$json = array();

		if ( !$this->customer->isLogged() ) {
			
		}elseif ( !isset( $this->request->get['keyword'] ) || !is_string( $this->request->get['keyword'] ) ) {

		}elseif ( (utf8_strlen( $this->request->get['keyword'] ) < 1) || (utf8_strlen( $this->request->get['keyword'] ) > 32) ) {

		}else {
			$this->load->model( 'data/value' );
			$this->load->model( 'setting/config' );
			$this->model_setting_config->load( $this->config->get( 'datatype_title' ) );

			$sort = 'name';

			$data = array(
				'filter_name' => trim( strtolower( $this->request->get['keyword'] ) ),
				'filter_type_code' => $this->config->get( 'datatype_industry' ),
				'sort' => $sort,
				);

			$industries = $this->model_data_value->getValues( $data );
			
			foreach ( $industries as $industry ) {
				$json[] = array(
					'name' => html_entity_decode( $industry->getName() ),
					'id' => $industry->getId(),
				);
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}
}
?>