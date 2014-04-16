<?php
class ControllerApiConfig extends Controller {
	public function getRoutings() {
		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'routing' => $this->config->get('routing')
        )));
	}
}
?>