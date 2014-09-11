<?php
class ControllerWidgetAccountWidgetUser extends Controller {
	protected function index() {
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/widget/account/widget_user.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/widget/account/widget_user.tpl';
		} else {
			$this->template = 'default/template/widget/account/widget_user.tpl';
		}

    	$this->twig_render();
	}
}
?>