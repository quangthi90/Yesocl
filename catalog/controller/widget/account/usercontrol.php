<?php
class ControllerWidgetAccountUserControl extends Controller {
	protected function index() {
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/widget/account/usercontrol.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/widget/account/usercontrol.tpl';
		} else {
			$this->template = 'default/template/widget/account/usercontrol.tpl';
		}

    	$this->twig_render();
	}
}
?>