<?php 
class ControllerCommonSearch extends Controller { 
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}
		
		$this->load->model('tool/image');
		$this->load->model('user/user');

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$keyword = $this->request->get['keyword'];

		if ( empty($keyword) ){
			return false;
		}

		$users = $this->model_user_user->searchUserByKeyword( array('keyword' => $keyword) );

		foreach ($users as $user) {
			$user_ids[$user->getId()] = $user->getId();
		}

		$users = $this->model_user_user->getUsers( array('user_ids' => $user_ids) );

		$this->data['users'] = array();

		foreach ( $users as $user ) {
			if ( $user->getId() == $this->customer->getId() ){
				continue;
			}

			if ( $user->getMeta() ){
				$meta = $user->getMeta()->formatToCache();
			}else{
				$meta = array();
			}

			$user = $user->formatToCache();

			$user['meta'] = $meta;

			if ( !array_key_exists($user['id'], $this->data['users']) ){
				if ( !empty($user['avatar']) ){
					$user['avatar'] = $this->model_tool_image->resize( $user['avatar'], 180, 180 );
				}elseif ( !empty($user['email']) ){
		            $user['avatar'] = $this->model_tool_image->getGavatar( $user['email'], 180 );
		        }else{
		        	$user['avatar'] = $this->model_tool_image->resize( 'no_user_avatar.png', 180, 180 );
				}

				$this->data['users'][$user['id']] = $user;
			}
		}
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/search.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/search.tpl';
		} else {
			$this->template = 'default/template/common/search.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',
			'common/footer',
			'common/header'
		);
										
		$this->response->setOutput($this->twig_render());
	}
}
?>