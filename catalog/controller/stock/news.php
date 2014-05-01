<?php  
class ControllerStockNews extends Controller {
	public function index() {
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$this->data['base'] = $this->config->get('config_ssl');
		} else {
			$this->data['base'] = HTTP_SERVER;
		}

		$this->document->setTitle($this->config->get('config_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		
		$sStockCode = $this->config->get('branch')['code']['stock'];
		
		$this->load->model('branch/branch');
		$this->load->model('branch/post');
		$this->load->model('tool/object');
		
		$lPosts = null;
		$aPosts = array();

		$oBranch = $this->model_branch_branch->getBranch( array('branch_code' => $sStockCode) );
		if ( $oBranch ){
			$aCategoryIds = $oBranch->getIsBranchCategories( true, true );
			if ( count($aCategoryIds) > 0 ){
				$lPosts = $this->model_branch_post->getPosts(array(
					'limit' => 20,
					'branch_id' => $oBranch->getId(),
					'category_ids' => $aCategoryIds
				));
			}
		}
		
		if ( $lPosts ){
			$aPosts = $this->model_tool_object->formatPosts( $lPosts );
		}

		$this->data['posts'] = $aPosts['posts'];
		$this->data['users'] = $aPosts['users'];

		// set selected menu
		$this->session->setFlash( 'menu', 'stock' );

		// Title
		$this->data['heading_title'] = gettext('News of Stock');

		// Don't show column profile
		$this->data['current_user_id'] = $this->customer->getId();
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/account/wal.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/account/wall.tpl';
		} else {
			$this->template = 'default/template/account/wall.tpl';
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