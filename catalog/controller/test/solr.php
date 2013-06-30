<?php
Class ControllerTestSolr extends Controller {
	private $error = array();
	
	public function index() {
		$this->load->model('test/solr');
		
		// request
		if ( isset($this->request->post) && $this->validateForm( $this->request->post ) ) {
			$this->model_test_solr->addPost( $this->request->post );
			
			$this->redirect($this->url->link('test/solr'));
		}
		
		$this->data['home'] = $this->url->link('test/solr');
		$this->data['add'] = $this->url->link('test/solr');
		$this->data['delete'] = $this->url->link('test/solr/delete');
		$this->data['search'] = $this->url->link('test/solr/search');
		
		// posts
		$post_data = $this->model_test_solr->getPosts();
		$this->data['posts'] = array();
		foreach ($post_data as $post) {
			$this->data['posts'][] = array(
				'id' => $post->getId(),
				'author' => $post->getAuthor(),
				'content' => $post->getContent(),
				'create' => $post->getCreate()->format('Y-m-d H:i:s'),
			);
		}
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/test/solr.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/test/solr.tpl';
		} else {
			$this->template = 'default/template/test/solr.tpl';
		}
		
		//$this->children = array();
				
		$this->response->setOutput($this->render());
	}
	
	public function delete() {
		$this->load->model('test/solr');
		
		// request
		if (isset( $this->request->get['id'] )) {
			$this->model_test_solr->deletePost( array( 'id' => $this->request->get['id'] ) );
			
			$this->redirect($this->url->link('test/solr'));
		}
	}
	
	public function validateForm( $data = array() ) {
		if ( !isset($data['author']) || utf8_strlen($data['author']) < 1 || utf8_strlen($data['author']) > 50 ) {
			$this->error['author'] = 'error';
		}
		
		if ( !isset($data['content']) || utf8_strlen($data['author']) < 1 || utf8_strlen($data['author']) > 200 ) {
			$this->error['content'] = 'error';
		}
		
		if ( count( $this->error ) ) {
			return false;
		}else {
			return true;
		}
	}

	public function search() {
		$this->load->model('test/solr');
		
		// request
		if (isset( $this->request->get['content'] ) || isset( $this->request->get['author'] )) {
			$this->data['home'] = $this->url->link('test/solr');
			$this->data['delete'] = $this->url->link('test/solr/delete');
			$this->data['search'] = $this->url->link('test/solr/search');
		
			// query
			$query = array();
			if (isset($this->request->get['content'])) {
				$query['content'] = $this->request->get['content'];
			}
			if (isset($this->request->get['author'])) {
				$query['author'] = $this->request->get['author'];
			}
			
			// posts
			$post_data = $this->model_test_solr->searchPosts( $query );
			
			$this->data['posts'] = array();
			foreach ($post_data as $post) {
				$this->data['posts'][] = array(
					'id' => $post->getId(),
					'author' => $post->getAuthor(),
					'content' => $post->getContent(),
					'create' => '',
				);
			}
			
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/test/solr.tpl')) {
				$this->template = $this->config->get('config_template') . '/template/test/solr.tpl';
			} else {
				$this->template = 'default/template/test/solr.tpl';
			}
			
			$this->response->setOutput($this->render());
		}
	}
	
	public function test() {
		$this->load->model('test/solr');
		$this->model_test_solr->test();
	}
	
	public function testupdate() {
		$this->load->model('test/solr');
		$this->model_test_solr->testupdate();
	}
}