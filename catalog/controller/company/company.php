<?php
class ControllerCompanyCompany extends Controller {
	public function autocomplete() {
		$this->load->model( 'company/company' );

		$sort = 'name';

		if ( isset( $this->request->get['filter_name'] ) ) {
			$filter_name = $this->request->get['filter_name'];
		}else {
			$filter_name = null;
		}

		$data = array(
			'sort' => $sort,
			'filter_name' => $filter_name,
			'start' => 0,
			'limit' => 10,
			);

		$companies = $this->model_company_company->getCompanies( $data );

		$json = array();
		foreach ( $companies as $company ) {
			$json[] = array(
				'id' => $company->getId(),
				'name' => $company->getName(),
				);
		}

		$this->response->setOutput( json_encode( $json ) );
	}
}
?>