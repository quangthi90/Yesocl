<?php
class ControllerCommonSidebarControl extends Controller {
	public function index() {
		$oLoggedUser = $this->customer->getUser();

		if ( !$oLoggedUser || !$oLoggedUser->getBranches() || $oLoggedUser->getBranches()->count() == 0 ){
			$this->data['show_branch_menu'] = false;
		}else{
			$this->data['show_branch_menu'] = true;
		}

		// Get User Settings
        $this->load->model( 'user/setting' );
        $oSettings = $this->model_user_setting->getSettingByUser($oLoggedUser->getId());
        if ($oSettings) {
            $sWhatSNewOption = $oSettings->getPrivateByKey('config_display_whatsnew');
        }

		$this->data['aWhatSNewOptions'] = array();
		foreach ($this->config->get('whatsnew')['option'] as $option) {
			$this->data['aWhatSNewOptions'][] = array(
				'title' => $this->config->get('whatsnew')['option_title'][$option],
				'option' => $option,
				'enabled' => (($option == $sWhatSNewOption) || ($option == $this->config->get('whatsnew')['option']['all'] && $sWhatSNewOption == NULL)),
				);
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/sidebar_control.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/sidebar_control.tpl';
		} else {
			$this->template = 'default/template/common/sidebar_control.tpl';
		}

		$this->response->setOutput($this->twig_render());
	}
}
?>