	<?php
class ControllerApiSeoUrl extends Controller {
	public function index() {
		if ( !empty($this->request->get['_route_']) ){
			$_route = $this->request->get['_route_'];

			$routings = $this->config->get('routing');
		}

		// Decode URL
		if ( !empty($this->request->get['_route_']) ){
			$_route = $this->request->get['_route_'];
			$_parts = array_filter(explode('/', $_route));
			array_unshift($_parts, "services");

			$routings = $this->config->get('routing');
			
			foreach ( $routings as $route => $routing ) {
				$request_gets = array();
				$parts = array_filter(explode('/', $routing));

				$is_url = true;
				if ( count($parts) != 0 || count($_parts) != 0 ) $is_url = false;

				for ( $key = 0; $key < count($parts); $key++ ){
					$part = $parts[$key];
					$is_url = true;
					if ( $_parts[$key] && $_parts[$key] != $part ){
						if ( preg_match('/^{/', $part) && preg_match('/}$/', $part) ){
							if ( ($parts[$key+1] && $parts[$key+1] == $_parts[$key]) || !$_parts[$key] ){
								unset($parts[$key]);
								$key++;
							}else{
								$param = substr(substr($part, 1), 0, -1);
								$request_gets[$param] = $_parts[$key];
							}
						}else{
							$is_url = false;
							break;
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