<?php  
class ControllerPostDetail extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));

		$this->data['heading_title'] = $this->config->get('config_title');

		if ( empty($this->request->get['post_type']) ){
			print("post type is empty!"); exit;
		}

		if ( empty($this->request->get['post_slug']) ){
			print("post slug is empty!"); exit;
		}

		$is_user = false;

		switch ($this->request->get['post_type']) {
			case $this->config->get('post')['type']['branch']:
				$this->load->model('branch/post');
				$oPost = $this->model_branch_post->getPost( $this->request->get, true );
				$this->data['post_type'] = $this->config->get('common')['type']['branch'];
				break;

			case $this->config->get('post')['type']['user']:
				$is_user = true;
				$this->load->model('user/post');
				$oPost = $this->model_user_post->getPost( $this->request->get, true );
				$this->data['post_type'] = $this->config->get('common')['type']['user'];
				break;

			case $this->config->get('post')['type']['stock']:
				$is_user = false;
				$this->load->model('stock/post');
				$oPost = $this->model_stock_post->getPost( $this->request->get, true );
				$this->data['post_type'] = $this->config->get('common')['type']['stock'];
				break;
			
			default:
				$oPost = null;
				break;
		}

		$sModel = $this->request->get['post_type'] . '/comment';
        $this->load->model($sModel);
        $this->load->model('tool/object');

		$sModelLink = 'model_' . $this->request->get['post_type'] . '_post';
		$oPost = $this->$sModelLink->getPost( $this->request->get, true );

		$this->data['post_type'] = $this->request->get['post_type'];

		if ( !$oPost ){
			print("not found post!"); exit;
		}

		$this->data['post'] = $this->model_tool_object->formatPost( $oPost );
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/post/detail.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/post/detail.tpl';
		} else {
			$this->template = 'default/template/post/detail.tpl';
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