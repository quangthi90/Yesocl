<?php 
class ControllerDataValue extends Controller {
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
				if ( !$city->getLocation() ){
					continue;
				}
				
				$json[] = array(
					'name' => $city->getLocation(),
					'id' => $city->getId(),
				);
			}
		}

		$this->response->setOutput( json_encode( $json ) );
	}

	public function search() {
		$json = array();

		if ( !$this->customer->isLogged() || empty($this->request->get['type']) ) {
			$this->response->setOutput( json_encode($json) );
		}

		if ( empty($this->request->get['keyword']) ) {
			$this->response->setOutput( json_encode($json) );
		}

		$this->load->model('tool/search');
		$aValues = $this->model_tool_search->searchDataValueByKeyword( 
			$this->request->get['type'], 
			array('keyword' => trim(strtolower($this->request->get['keyword'])))
		);
		
		foreach ( $aValues as $oValue ) {
			$json[] = array(
				'name' => html_entity_decode( $oValue->getName() ),
				'id' => $oValue->getId(),
			);
		}

		$this->response->setOutput( json_encode($json) );
	}
}
?>