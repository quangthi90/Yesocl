<?php
class ControllerWidgetCommonLeftSidebar extends Controller {
	public function index() {
		$oLoggedUser = $this->customer->getUser();

		if ( !$oLoggedUser || !$oLoggedUser->getBranches() || $oLoggedUser->getBranches()->count() == 0 ){
			$this->data['show_branch_menu'] = false;
		}else{
			$this->data['show_branch_menu'] = true;
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/left_sidebar.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/left_sidebar.tpl';
		} else {
			$this->template = 'default/template/common/left_sidebar.tpl';
		}

		$this->response->setOutput($this->twig_render());
	}
}
?>