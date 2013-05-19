<?php  
class ControllerCommonSidebarControl extends Controller {
	public function index() {		
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/sidebar_control.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/sidebar_control.tpl';
		} else {
			$this->template = 'default/template/common/sidebar_control.tpl';
		}
								
		$this->render();
	}
}
?>