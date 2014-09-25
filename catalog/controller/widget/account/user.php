<?php
class ControllerWidgetAccountUser extends Controller {
	protected function index() {
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/widget/account/user_control.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/widget/account/user_control.tpl';
		} else {
			$this->template = 'default/template/widget/account/user_control.tpl';
		}

    	$this->twig_render();
	}
}
?>