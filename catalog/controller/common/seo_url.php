<?php
class ControllerCommonSeoUrl extends Controller {
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

			// Check login
			if ( !$this->customer->isLogged() 
				&& !in_array($route, $this->config->get('ignore')) ){
				return $this->forward('welcome/home');
			}
			
			if (isset($this->request->get['route'])) {
				return $this->forward($this->request->get['route']);
			}
		}
	}
	
	public function rewrite($link) {
		if ($this->config->get('config_seo_url')) {
			$url_data = parse_url(str_replace('&amp;', '&', $link));
		
			$url = ''; 
			
			$data = array();
			
			parse_str($url_data['query'], $data);
			
			foreach ($data as $key => $value) {
				if (isset($data['route'])) {
					if (($data['route'] == 'product/product' && $key == 'product_id') || (($data['route'] == 'product/manufacturer/product' || $data['route'] == 'product/product') && $key == 'manufacturer_id') || ($data['route'] == 'information/information' && $key == 'information_id')) {
						$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE `query` = '" . $this->db->escape($key . '=' . (int)$value) . "'");
					
						if ($query->num_rows) {
							$url .= '/' . $query->row['keyword'];
							
							unset($data[$key]);
						}					
					} elseif ($key == 'path') {
						$categories = explode('_', $value);
						
						foreach ($categories as $category) {
							$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "url_alias WHERE `query` = 'category_id=" . (int)$category . "'");
					
							if ($query->num_rows) {
								$url .= '/' . $query->row['keyword'];
							}							
						}
						
						unset($data[$key]);
					}
				}
			}
		
			if ($url) {
				unset($data['route']);
			
				$query = '';
			
				if ($data) {
					foreach ($data as $key => $value) {
						$query .= '&' . $key . '=' . $value;
					}
					
					if ($query) {
						$query = '?' . trim($query, '&');
					}
				}

				return $url_data['scheme'] . '://' . $url_data['host'] . (isset($url_data['port']) ? ':' . $url_data['port'] : '') . str_replace('/index.php', '', $url_data['path']) . $url . $query;
			} else {
				return $link;
			}
		} else {
			return $link;
		}		
	}	
}
?>