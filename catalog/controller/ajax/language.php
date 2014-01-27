<?php
class ControllerAjaxLanguage extends Controller {
	public function setLanguage() {
		if ( empty($this->request->post['language']) ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'language is empty'
	        )));
		}

		$language = $this->request->post['language'];

		setcookie('language', $language, time() + 60 * 60 * 24 * 30, '/', $this->request->server['HTTP_HOST']);
		print($this->request->cookie['language']); exit;
		return $this->response->setOutput(json_encode(array(
            'success' => 'ok'
        )));
	}
}
?>