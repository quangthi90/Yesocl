<?php
class ControllerApiSeoUrl extends Controller {
	public function index() {
		// Decode URL
		if ( !empty($this->request->get['_route_']) ){
			$_route = $this->request->get['_route_'];
			$_parts = array_filter(explode('/', $_route));

			$routings = $this->config->get('routing');
			foreach ( $routings as $route => $routing ) {
				$request_gets = array();
				$parts = array_filter(explode('/', $routing));
				$is_url = false;
				if ( count($parts) == count($_parts) ){
					$is_url = true;
					foreach ( $parts as $key => $part ) {
						if ( $_parts[$key] != $part ){
							if ( preg_match('/^{/', $part) && preg_match('/}$/', $part) ){
								$param = substr(substr($part, 1), 0, -1);
								$request_gets[$param] = $_parts[$key];
							}else{
								$is_url = false;
								break;
							}
						}
					}
				}
				if ( $is_url ){
					$this->request->get = $request_gets;
					$this->request->get['route'] = $this->config->get('route')[$route];
					break;
				}
			}
			
			if (isset($this->request->get['route'])) {
				return $this->forward($this->request->get['route']);
			}
		}
	}
}
?>