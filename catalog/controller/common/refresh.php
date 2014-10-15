<?php
class ControllerCommonRefresh extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$this->data['heading_title'] = $this->config->get('config_title');

		// set selected menu
		$this->session->setFlash( 'menu', 'refresh' );

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/refresh.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/refresh.tpl';
		} else {
			$this->template = 'default/template/common/refresh.tpl';
		}

		$this->children = array(
			'layout/basic/leftsidebar',
			'layout/basic/rightsidebar',
			'layout/basic/navbar',
			'layout/basic/footer'
		);

		$this->response->setOutput($this->twig_render());
	}

	public function setOption() {
		$oLoggedUser = $this->customer->getUser();
		if ($oLoggedUser) {
			// Check exit $_GET['option']
			if (isset($this->request->get['option']) && isset($this->config->get('whatsnew')['option'][$this->request->get['option']])) {
				$this->load->model( 'user/setting' );
	        	$this->model_user_setting->setPrivateSetting($oLoggedUser->getId(), array('config_display_whatsnew' => $this->request->get['option']));
			}
		}
		// Redirect
        $this->redirect($this->extension->path('RefreshPage'));
	}
}
?>