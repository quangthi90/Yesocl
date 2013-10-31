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

	public function degreeAutoComplete() {
		$json = array();

		if ( !$this->customer->isLogged() ) {
			
		}elseif ( !isset( $this->request->get['keyword'] ) || !is_string( $this->request->get['keyword'] ) ) {

		}elseif ( (utf8_strlen( $this->request->get['keyword'] ) < 1) || (utf8_strlen( $this->request->get['keyword'] ) > 32) ) {

		}else {
			$this->load->model( 'data/value' );

			$sort = 'name';

			$data = array(
				'filter_name' => trim( strtolower( $this->request->get['keyword'] ) ),
				'filter_type_code' => $this->config->get( 'datatype_degree' ),
				'sort' => $sort,
			);

			$degrees = $this->model_data_value->getValues( $data );
			
			foreach ( $degrees as $degree ) {
				$json[] = array(
					'name' => html_entity_decode( $degree->getName() ),
					'id' => $degree->getId(),
				);
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function schoolAutoComplete() {
		$json = array();

		if ( !$this->customer->isLogged() ) {
			
		}elseif ( !isset( $this->request->get['keyword'] ) || !is_string( $this->request->get['keyword'] ) ) {

		}elseif ( (utf8_strlen( $this->request->get['keyword'] ) < 1) || (utf8_strlen( $this->request->get['keyword'] ) > 32) ) {

		}else {
			$this->load->model( 'data/value' );

			$sort = 'name';

			$data = array(
				'filter_name' => trim( strtolower( $this->request->get['keyword'] ) ),
				'filter_type_code' => $this->config->get( 'datatype_school' ),
				'sort' => $sort,
			);

			$degrees = $this->model_data_value->getValues( $data );
			
			foreach ( $degrees as $degree ) {
				$json[] = array(
					'name' => html_entity_decode( $degree->getName() ),
					'id' => $degree->getId(),
				);
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function fieldOfStudyAutoComplete() {
		$json = array();

		if ( !$this->customer->isLogged() ) {
			
		}elseif ( !isset( $this->request->get['keyword'] ) || !is_string( $this->request->get['keyword'] ) ) {

		}elseif ( (utf8_strlen( $this->request->get['keyword'] ) < 1) || (utf8_strlen( $this->request->get['keyword'] ) > 32) ) {

		}else {
			$this->load->model( 'data/value' );

			$sort = 'name';

			$data = array(
				'filter_name' => trim( strtolower( $this->request->get['keyword'] ) ),
				'filter_type_code' => $this->config->get( 'datatype_fieldofstudy' ),
				'sort' => $sort,
			);

			$degrees = $this->model_data_value->getValues( $data );
			
			foreach ( $degrees as $degree ) {
				$json[] = array(
					'name' => html_entity_decode( $degree->getName() ),
					'id' => $degree->getId(),
				);
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}
}
?>