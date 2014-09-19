<?php
class ControllerCommonLayout extends Controller {
	public function leftSideBar() {
		$oLoggedUser = $this->customer->getUser();

		if ( !$oLoggedUser || !$oLoggedUser->getBranches() || $oLoggedUser->getBranches()->count() == 0 ){
			$this->data['show_branch_menu'] = false;
		}else{
			$this->data['show_branch_menu'] = true;
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/layout/left_sidebar.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/layout/left_sidebar.tpl';
		} else {
			$this->template = 'default/template/common/layout/left_sidebar.tpl';
		}

		$this->response->setOutput($this->twig_render());
	}

	public function rightSideBar() {
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/layout/right_sidebar.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/layout/right_sidebar.tpl';
		} else {
			$this->template = 'default/template/common/layout/right_sidebar.tpl';
		}

		$this->twig_render();
	}

	public function navbar() {
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/layout/navbar.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/layout/navbar.tpl';
		} else {
			$this->template = 'default/template/common/layout/navbar.tpl';
		}
		
		$this->twig_render();
	}

	public function footer() {
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/layout/footer.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/layout/footer.tpl';
		} else {
			$this->template = 'default/template/common/layout/footer.tpl';
		}
		
		$this->twig_render();
	}
}
?>