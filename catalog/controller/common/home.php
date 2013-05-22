<?php  
class ControllerCommonHome extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = $this->config->get('config_url');
		}

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		
		$this->data['heading_title'] = $this->config->get('config_title');

		$this->load->model( 'company/company' );
		$this->load->model('tool/image');

		$company = $this->model_company_company->getCompanyBySlug( $this->config->get('company')['default']['slug'] );

		if ( $company ){
			$company_posts = $company->getPosts();
		}

		$this->data['posts'] = array();
		foreach ( $company_posts as $post ) {
			if ( $post->getUser() && $this->customer->getAvatar() ){
				$avatar = $this->model_tool_image->resize( $this->customer->getAvatar(), 180, 180 );
			}else{
				$avatar = $this->model_tool_image->getGavatar( $post->getEmail(), 180 );
			}

			$this->data['posts'][] = array(
				'author' => $post->getAuthor(),
				'avatar' => $avatar,
				'title' => $post->getTitle(),
				'content' => html_entity_decode($post->getContent())
			);
		}
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/home.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/home.tpl';
		} else {
			$this->template = 'default/template/common/home.tpl';
		}
		
		$this->children = array(
			'common/sidebar_control',			
			// 'common/content_top',
			// 'common/content_bottom',
			'common/footer',
			'common/header'
		);
										
		$this->response->setOutput($this->twig_render());
	}
}
?>