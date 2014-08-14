<?php
class ControllerFinanceExport extends Controller {
	private $route = 'finance/export';

	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_export')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/export' );
		// Column
		$this->data['column_name'] = $this->language->get('column_name');
		$this->data['column_action'] = $this->language->get('column_action');
		// Text
		$this->data['text_from'] = $this->language->get('text_from');
		$this->data['text_to'] = $this->language->get('text_to');

		$this->load->model( 'finance/finance' );
		$this->load->model( 'finance/date' );
		// Dates
		$this->data['dates'] = array();
		$lDates = $this->model_finance_date->getAllDates();
		foreach ( $lDates as $oDate ) {
			$this->data['dates'][$oDate->getYear()] = $oDate->getYear();
		}
		sort($this->data['dates']);
		// Export types
		$this->data['exports'] = array();
		$aExports = $this->config->get('finance')['export'];
		foreach ( $aExports as $key => $sExport ) {
			$this->data['exports'][] = array(
				'name' => $sExport,
				'href' => $this->url->link('finance/export/' . $key, 'token=' . $this->session->data['token'], 'SSL'),
				'text' => $this->language->get('button_export'),
				'icon' => ' icon-circle-arrow-up'
			);
		}

		$this->document->setTitle( $this->language->get('heading_title') );

		$this->template = 'finance/export.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput( $this->render() );
	}

	private function result( $aLinks = array() ){
		$this->load->language( 'finance/export_result' );

		$this->data['button_back'] = $this->language->get('button_back');
		$this->data['column_name'] = $this->language->get('column_name');

		$this->data['back'] = $this->url->link('finance/export', 'token=' . $this->session->data['token'], 'SSL');
		
		$this->data['links'] = array();
		foreach ( $aLinks as $sName => $sLink ) {
			$this->data['links'][] = array(
				'name' => $sName,
				'text' => $this->language->get('text_download'),
				'href' => HTTP_CATALOG . 'download/' . $sName,
				'icon' => 'icon-circle-arrow-down',
			);
		}

		$this->template = 'finance/export_result.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput( $this->render() );
	}

	public function longterm(){
		if ( empty($this->request->get['from']) ){
			exit('Param From is empty');
		}

		if ( empty($this->request->get['to']) ){
			exit('Param To is empty');
		}

		if ( empty($this->request->get['start']) ){
			$iStart = 0;
		}else{
			$iStart = $this->request->get['start'];
		}

		// $this->load->language('finance/export');
		$this->load->model('stock/finance');
		$this->load->model('finance/function');
		$this->load->model('tool/excel');
		// Config functions
		$aFunctions = $this->config->get('finance')['longterm'];
		// Matrix
		$aMatrix = array(
			'A1-A2' => 'STT',
			'B1-B2' => 'Cổ phiếu',
		);
		// Date
		$sRun = "C";
		$aDates = array();
		for ( $iYear = $this->request->get['from']; $iYear <= $this->request->get['to']; $iYear++ ) {
			$sEnd = $sRun;
			for ($i=0; $i < count($aFunctions) - 1; $i++) { 
				$sEnd++;
			}
			// Date
			$sChar = $sRun . "1-" . $sEnd . "1";
			$aMatrix[$sChar] = 'Năm ' . $iYear;
			// Function
			foreach ( $aFunctions as $sFunctionName ) {
				$sChar = $sRun . "2";
				$aMatrix[$sChar] = $sFunctionName;
				$sRun++;
			}
			$aDates[] = $iYear . "-0";
		}
		// Finance Id
		$aFunctionDetails = array();
		foreach ( $aFunctions as $sFunctionName ) {
			$oFunction = $this->model_finance_function->getFunctionByName( $sFunctionName );
			if ( !$oFunction ){
				exit( $sFunctionName . ' is not defined' );
			}
			$aFunctionDetails[$sFunctionName] = $this->model_finance_function->getFunctionDetail($oFunction->getFunction());
		}
		// Stock Finance Info
		$lStockFinances = $this->model_stock_finance->getAllFinances(array(
			'limit' => 100,
			'start' => $iStart * 100
		));
		if ( $lStockFinances->count(true) == 0 ){
			$aLinks = array();
			for ( $i = 1; $i <= $iStart; $i++ ){
				$sName = 'Long Term ' . $i . '.xlsx';
				$aLinks[$sName] = DIR_DOWNLOAD . $sName;
			}
			$this->result( $aLinks );
			return false;
		}
		$iRow = 3;
		// Browsing list Finance Stocks
		foreach ( $lStockFinances as $oStockFinances ) {
			$aMatrix["A".$iRow] = $iRow - 2;
			$aMatrix["B".$iRow] = $oStockFinances->getStock()->getCode();
			$sRun = "C";
			$aCacheFinances = array(); // Backup list Object Finances
			// Browsing list Dates
			foreach ( $aDates as $sDate ) {
				// Browsing list formular for each date
				foreach ( $aFunctionDetails as $aDetails ) {
					// $aNewDetails: array detail of formular after add value
					$aNewDetails = array_map(function($aDetail) use ($oStockFinances, $sDate, &$aCacheFinances){
						if ( $aDetail['is_fi'] ){
							if ( !empty($aCacheFinances[$aDetail['value']]) ){
								return $aCacheFinances[$aDetail['value']]->getValues()[$sDate];
							}
							$aFinanceValues = $oStockFinances->getFinanceByFinanceId($aDetail['value']);
							if ( !$aFinanceValues ){
								return null;
							}
							$aCacheFinances[$aDetail['value']] = $aFinanceValues;
							return $aFinanceValues->getValues()[$sDate];
						}
						return $aDetail['value'];
					}, $aDetails);
					$aMatrix[$sRun.$iRow] = (int)implode('', $aNewDetails); // Calculate o add excel file
					$sRun++;
				}
			}
			$iRow++;
		}

		// Export excel file
		$this->model_tool_excel->createExcelFile( $aMatrix, DIR_DOWNLOAD . 'Long Term ' . ($iStart + 1) . '.xlsx' );

		$url = $this->url->link('finance/export/longterm', 'token=' . $this->session->data['token'] . '&from=' . $this->request->get['from'] . '&to=' . $this->request->get['to'] . '&start=' . ($iStart + 1) );
		$this->redirect($url);
	}

	public function shortterm(){
		if ( empty($this->request->get['from']) ){
			exit('Param From is empty');
		}

		if ( empty($this->request->get['to']) ){
			exit('Param To is empty');
		}

		if ( empty($this->request->get['start']) ){
			$iStart = 0;
		}else{
			$iStart = $this->request->get['start'];
		}

		// $this->load->language('finance/export');
		$this->load->model('stock/finance');
		$this->load->model('finance/function');
		$this->load->model('tool/excel');
		// Config functions
		$aFunctions = $this->config->get('finance')['shortterm'];
		// Matrix
		$aMatrix = array(
			'A1-A3' => 'STT',
			'B1-B3' => 'Cổ phiếu',
		);
		// Date
		$sRun = "C";
		$aDates = array();
		for ( $iYear = $this->request->get['from']; $iYear <= $this->request->get['to']; $iYear++ ) {
			$sEnd = $sRun;
			for ( $i = 0; $i < (count($aFunctions) * 4 - 1); $i++ ) {
				$sEnd++;
			}
			// Date
			$sChar = $sRun . "1-" . $sEnd . "1";
			$aMatrix[$sChar] = 'Năm ' . $iYear;
			// Quarter
			for ( $i = 1; $i <= 4; $i++ ){
				$sEnd = $sRun;
				for ($j=0; $j < (count($aFunctions) - 1); $j++) { 
					$sEnd++;
				}
				$sChar = $sRun . "2-" . $sEnd . "2";
				$aMatrix[$sChar] = 'Quý ' . $i;
				// Function
				foreach ( $aFunctions as $sFunctionName ) {
					$sChar = $sRun . "3";
					$aMatrix[$sChar] = $sFunctionName;
					$sRun++;
				}
				$aDates[] = $iYear . "-" . $i;
			}
		}
		// Finance Id
		$aFunctionDetails = array();
		foreach ( $aFunctions as $sFunctionName ) {
			$oFunction = $this->model_finance_function->getFunctionByName( $sFunctionName );
			if ( !$oFunction ){
				exit( $sFunctionName . ' is not defined' );
			}
			$aFunctionDetails[$sFunctionName] = $this->model_finance_function->getFunctionDetail($oFunction->getFunction());
		}
		// Stock Finance Info
		$lStockFinances = $this->model_stock_finance->getAllFinances(array(
			'limit' => 100,
			'start' => $iStart * 100
		));
		if ( $lStockFinances->count(true) == 0 ){
			$aLinks = array();
			for ( $i = 1; $i <= $iStart; $i++ ){
				$sName = 'Short Term ' . $i . '.xlsx';
				$aLinks[$sName] = DIR_DOWNLOAD . $sName;
			}
			$this->result( $aLinks );
			return false;
		}
		$iRow = 4;
		// Browsing list Finance Stocks
		foreach ( $lStockFinances as $oStockFinances ) {
			$aMatrix["A".$iRow] = $iRow - 3;
			$aMatrix["B".$iRow] = $oStockFinances->getStock()->getCode();
			$sRun = "C";
			$aCacheFinances = array(); // Backup list Object Finances
			// Browsing list Dates
			foreach ( $aDates as $sDate ) {
				// Browsing list formular for each date
				foreach ( $aFunctionDetails as $aDetails ) {
					// $aNewDetails: array detail of formular after add value
					$aNewDetails = array_map(function($aDetail) use ($oStockFinances, $sDate, &$aCacheFinances){
						if ( $aDetail['is_fi'] ){
							if ( !empty($aCacheFinances[$aDetail['value']]) ){
								return $aCacheFinances[$aDetail['value']]->getValues()[$sDate];
							}
							$aFinanceValues = $oStockFinances->getFinanceByFinanceId($aDetail['value']);
							if ( !$aFinanceValues ){
								return null;
							}
							$aCacheFinances[$aDetail['value']] = $aFinanceValues;
							return $aFinanceValues->getValues()[$sDate];
						}
						return $aDetail['value'];
					}, $aDetails);
					$aMatrix[$sRun.$iRow] = (int)implode('', $aNewDetails); // Calculate o add excel file
					$sRun++;
				}
			}
			$iRow++;
		}
		// Export excel file
		$this->model_tool_excel->createExcelFile( $aMatrix, DIR_DOWNLOAD . 'Short Term ' . ($iStart + 1) . '.xlsx' );

		$url = $this->url->link('finance/export/shortterm', 'token=' . $this->session->data['token'] . '&from=' . $this->request->get['from'] . '&to=' . $this->request->get['to'] . '&start=' . ($iStart + 1) );
		$this->redirect($url);
	}
}
?>