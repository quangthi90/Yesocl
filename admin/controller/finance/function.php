<?php
class ControllerFinanceFunction extends Controller {
	private $error = array( );
	private $limit = 10;
	private $route = 'finance/function';

	public function index(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_view')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/function' );
		$this->load->model( 'finance/function' );

		$this->document->setTitle( $this->language->get('heading_title') );

		$this->getList();
	}

	public function insert(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_insert')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/function' );
		$this->load->model( 'finance/function' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			$this->model_finance_function->addFunction( $this->request->post );

			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('finance/function', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->data['action'] = $this->url->link( 'finance/function/insert', 'token=' . $this->session->data['token'], 'sSL' );

		$this->getForm();
	}

	public function update(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_edit')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/function' );
		$this->load->model( 'finance/function' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm(true) ){
			$this->model_finance_function->editFunction( $this->request->get['function_id'], $this->request->post );

			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('finance/function', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->getForm();
	}

	public function delete(){
		if ( !$this->user->hasPermission($this->route, $this->config->get('action_delete')) ) {
			return $this->forward('error/permission');
		}

		$this->load->language( 'finance/function' );
		$this->load->model( 'finance/function' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_finance_function->deleteFunctions( $this->request->post );

			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link('finance/function', 'token=' . $this->session->data['token'], 'sSL') );
		}

		$this->getList( );
	}

	private function getList( ){
		// catch error
		if ( isset($this->error['warning']) ){
			$this->data['error_warning'] = $this->error['warning'];

			unset( $this->session->data['error_warning'] );
		} elseif ( isset($this->session->data['error_warning']) ) {
			$this->data['error_warning'] = $this->session->data['error_warning'];

			unset( $this->session->data['error_warning'] );
		} else {
			$this->data['error_warning'] = '';
		}

		if ( isset($this->session->data['success']) ){
			$this->data['success'] = $this->session->data['success'];

			unset( $this->session->data['success'] );
		} else {
			$this->data['success'] = '';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link( 'finance/function', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );

		// Text
		$this->data['text_no_results'] = $this->language->get('text_no_results');
		$this->data['text_edit'] = $this->language->get('text_edit');

		// Column
		$this->data['column_name'] = $this->language->get('column_name');
		$this->data['column_owner'] = $this->language->get('column_owner');
		$this->data['column_action'] = $this->language->get('column_action');

		// Confirm
		$this->data['confirm_del'] = $this->language->get('confirm_del');

		// Button
		$this->data['button_insert'] = $this->language->get('button_insert');
		$this->data['button_delete'] = $this->language->get('button_delete');

		// Link
		$this->data['insert'] = $this->url->link( 'finance/function/insert', 'token=' . $this->session->data['token'], 'sSL' );
		$this->data['delete'] = $this->url->link( 'finance/function/delete', 'token=' . $this->session->data['token'], 'sSL' );

		// finance
		$aData = array(
			'start' => ($page - 1) * $this->limit,
			'limit' => $this->limit
		);

		$lFunctions = $this->model_finance_function->getFunctions( $aData );

		$iFunctionTotal = $lFunctions->count();

		$this->data['functions'] = array();
		if ( $lFunctions ){
			foreach ( $lFunctions as $oFunction ){
				$action = array();

				$action[] = array(
					'text' => $this->language->get('text_edit'),
					'href' => $this->url->link( 'finance/function/update', 'function_id=' . $oFunction->getId() . '&token=' . $this->session->data['token'], 'sSL' ),
					'icon' => 'icon-edit',
				);

				$this->data['functions'][] = array(
					'id' => $oFunction->getId(),
					'name' => $oFunction->getName(),
					'owner' => $oFunction->getOwner()->getFullname() . ' (' . $oFunction->getOwner()->getPrimaryEmail()->getEmail() . ')',
					'action' => $action,
				);
			}
		}

		$pagination = new Pagination();
		$pagination->total = $iFunctionTotal;
		$pagination->page = $page;
		$pagination->limit = $this->limit;
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('finance/function', '&page={page}' . '&token=' . $this->session->data['token'], 'sSL');

		$this->data['pagination'] = $pagination->render();

		$this->template = 'finance/function_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput( $this->render() );
	}

	private function getForm(){
		// catch error
		if ( isset($this->error['warning']) ){
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if ( isset($this->session->data['success']) ){
			$this->data['success'] = $this->session->data['success'];

			unset( $this->session->data['success'] );
		} else {
			$this->data['success'] = '';
		}

		if ( isset($this->error['error_name']) ) {
			$this->data['error_name'] = $this->error['error_name'];
		} else {
			$this->data['error_name'] = '';
		}

		if ( isset($this->error['error_owner']) ) {
			$this->data['error_owner'] = $this->error['error_owner'];
		} else {
			$this->data['error_owner'] = '';
		}

		if ( isset($this->error['error_function']) ) {
			$this->data['error_function'] = $this->error['error_function'];
		} else {
			$this->data['error_function'] = '';
		}

		$idFunction = $this->request->get['function_id'];

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link( 'common/home', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link( 'finance/function', 'token=' . $this->session->data['token'], 'sSL' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get('heading_title');

		// Text
		// $this->data['text_enabled'] = $this->language->get('text_enabled');
		// $this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_true'] = $this->language->get('text_true');
		$this->data['text_false'] = $this->language->get('text_false');

		// Button
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');

		// Entry
		$this->data['entry_name'] = $this->language->get('entry_name');
		$this->data['entry_owner'] = $this->language->get('entry_owner');
		$this->data['entry_function'] = $this->language->get('entry_function');

		// Link
		$this->data['cancel'] = $this->url->link( 'finance/function', 'token=' . $this->session->data['token'], 'sSL' );

		// function
		if ( isset($this->request->get['function_id']) ){
			$oFunction = $this->model_finance_function->getFunction( $idFunction );
			if ( $oFunction ){
				$this->data['action'] = $this->url->link( 'finance/function/update', 'function_id=' . $idFunction . '&token=' . $this->session->data['token'], 'sSL' );
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['name']) ){
			$this->data['name'] = $this->request->post['name'];
		}elseif ( isset($oFunction) ){
			$this->data['name'] = $oFunction->getName();
		}else {
			$this->data['name'] = '';
		}

		// Entry Owner
		if ( isset($this->request->post['owner_id']) ){
			$this->data['owner_id'] = $this->request->post['owner_id'];
			$this->data['owner'] = $this->request->post['owner'];
		}elseif ( isset($oFunction) ){
			$this->data['owner_id'] = $oFunction->getOwner()->getId();
			$this->data['owner'] = $oFunction->getOwner()->getFullname() . ' (' . $oFunction->getOwner()->getPrimaryEmail()->getEmail() . ')';
		}else {
			$this->data['owner_id'] = '';
			$this->data['owner'] = '';
		}

		// Entry function
		if ( isset($this->request->post['function']) ){
			$this->data['function'] = $this->request->post['function'];
		}elseif ( isset($oFunction) ){
			$this->data['function'] = $oFunction->getFunction();
		}else {
			$this->data['function'] = '';
		}

		$this->data['token'] = $this->session->data['token'];

		$this->template = 'finance/function_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm( $bIsEdit = false ){
		if ( !isset($this->request->post['name']) || strlen($this->request->post['name']) < 1 || strlen($this->request->post['name']) > 128 ){
			$this->error['error_name'] = $this->language->get( 'error_name' );
		}

		if ( empty($this->request->post['owner_id']) ){
			$this->error['error_owner'] = $this->language->get( 'error_owner' );
		}

		if ( !isset($this->request->post['function']) || !$this->isValidateFunction($this->request->post['function']) ){
			$this->error['error_function'] = $this->language->get( 'error_function' );
		}

		if ( $this->error){
			return false;
		}else {
			return true;
		}
	}

	private function isValidateFunction( $function ) {
		$this->load->model('finance/function');

		return $this->model_finance_function->isValidateFunction( $function );
	}

	private function isValidateDelete(){
		if ( !isset($this->request->post['id']) || !is_array( $this->request->post['id']) ){
			$this->error['error_permission'] = $this->language->get( 'error_permission' );
		}

		if ( $this->error){
			return false;
		}else {
			return true;
		}
	}

	private function test() {
		if ( isset($this->request->get['function_id']) ){
			$oFunction = $this->model_finance_function->getFunction( $this->request->get['function_id'] );
			$aFunction = $oFunction->formatToCache();

			// GET FUNCTION
			$strFunction = $aFunction['function'];

			// REFORMAT FUNCTION
			// 1. REMOVE BACKSPACE
			$strFunction = str_replace(' ', '', $strFunction);
			// 2. ADD BACKSPACE
			$aSearch = array( "+", "-", "*", "/", "(", ")" );
			foreach ($aSearch as $tmp) {
				$strFunction = str_replace($tmp, " " . $tmp . " ", $strFunction);
			}
			// 3. REMOVE BACKSPACE
			$strFunction = str_replace("  ", " ", $strFunction);

			// echo '<pre>';var_dump($strFunction);

			// SPIT TO ARRAY
			$arrFunction = explode(' ', $strFunction);

			// SORT ARRAY
			$arrSortFunction = array();
			$aStack = array();
			$iLayer = 0;
			$currentOperator = array();
			$isDown = false;
			foreach ($arrFunction as $value) {
				// DEFINE STACK IF NOT EXIST
				if (empty($aStack[$iLayer])) {
					$aStack[$iLayer] = array();
				}

				switch ($value) {
					case '+':
					case '-':
						if ($currentOperator[$iLayer] == '/' || $currentOperator[$iLayer] == '*') {
							$aStack[$iLayer][] = $currentOperator[$iLayer];
						}elseif ($currentOperator[$iLayer] == '+' || $currentOperator[$iLayer] == '-') {
							$aStack[$iLayer][] = $currentOperator[$iLayer];
						}
						$currentOperator[$iLayer] = $value;
						break;
					case '*':
					case '/':
						if ($currentOperator[$iLayer] == '/' || $currentOperator[$iLayer] == '*') {
							$aStack[$iLayer][] = $currentOperator[$iLayer];
						}elseif ($currentOperator[$iLayer] == '+' || $currentOperator[$iLayer] == '-') {
							$iLayer++;
							$isDown = true;
						}
						$currentOperator[$iLayer] = $value;
						break;
					case '(':
						$iLayer++;
						break;
					case ')':
						if ($currentOperator[$iLayer] != '') {
							$aStack[$iLayer][] = $currentOperator[$iLayer];
						}
						$aStack[$iLayer - 1] = array_merge($aStack[$iLayer - 1], $aStack[$iLayer]);
						// DOWN STACK
						unset($aStack[$iLayer]);
						$iLayer--;
						break;
					default:
						$aStack[$iLayer][] = $value;
						// ISDOWN PROGESS
						if ($isDown) {
							if ($currentOperator[$iLayer] != '') {
								$aStack[$iLayer][] = $currentOperator[$iLayer];
							}
							$aStack[$iLayer - 1] = array_merge($aStack[$iLayer - 1], $aStack[$iLayer]);
							// RESET CURRENT STACK
							// $aStack[$iLayer] = array();
							// $currentOperator[$iLayer] = '';
							unset($aStack[$iLayer]);
							// DOWN STACK
							$iLayer--;
						}
						break;
				}
			}

			// COLLECT DATA
			for ($i = count($aStack) - 1; $i >= 0; $i--) {
				if ($currentOperator[$i] != '') {
					$aStack[$i][] = $currentOperator[$i];
				}
				if (!empty($aStack[$i]) && $i != 0) {
					$aStack[$i-1] = array_merge($aStack[$i-1], $aStack[$i]);
				}
			}

			// REVERSE ARRAY
			$arrSortFunction = $aStack[0];

			// GENERATE TREE
			$arrTreeFunction = array();
			$treeStack = array();
			$iLever = 0;
			while ($token = array_pop($arrSortFunction)) {
				switch ($token) {
					case '+':
					case '-':
					case '*':
					case '/':
						if (!isset($treeStack[$iLever][0])) {
						}elseif (!isset($treeStack[$iLever][2]) || !isset($treeStack[$iLever][1])) {
							$iLever++;
							$treeStack[$iLever] = array();
						}
						$treeStack[$iLever][0] = $token;
						break;
					default:
						if (!isset($treeStack[$iLever][2])) {
							$treeStack[$iLever][2] = $token;
						}elseif (!isset($treeStack[$iLever][1])) {
							$treeStack[$iLever][1] = $token;
							if ($iLever > 0) {
								for ($i=$iLever; $i > 0; $i--) {
									if (!isset($treeStack[$i - 1][2])) {
										$treeStack[$i - 1][2] = $treeStack[$i];
										// CLEAR NOTE
										unset($treeStack[$i]);
										$iLever--;
										break;
									}elseif (!isset($treeStack[$i - 1][1])) {
										$treeStack[$i - 1][1] = $treeStack[$i];
										// CLEAR NOTE
										unset($treeStack[$i]);
										$iLever--;
									}
								}
							}
						}
						break;
				}
			}

			// CACULATOR

			echo '<pre>';var_dump($treeStack);
		}

		exit();
	}
}
?>