<?php 
use Document\Group\Post;

class Controllergrouppost extends Controller {
	private $error = array( );
	private $this->limit = 10;
 
	public function index(){
		$this->load->language( 'group/post' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link( 'group/group') );
		}
		
		
		$this->load->model( 'group/post' );

		$this->document->setTitle( $this->language->get('heading_title') );
		
		$this->getList();
	}

	public function insert(){
		$this->load->language( 'group/post' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link( 'group/group') );
		}
		
		$this->load->model( 'group/post' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_group_post->addPost( $this->request->post, $this->request->get['group_id'] ) == false ){
				$this->session->data['error_warning'] = $this->language->get('error_insert');
			
				$this->redirect( $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] ) );
			}
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] ) );
		}

		$this->data['action'] = $this->url->link( 'group/post/insert', 'group_id=' . $this->request->get['group_id'] );
		
		$this->getForm( );
	}

	public function update(){
		$this->load->language( 'group/post' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link( 'group/group') );
		}
		
		$this->load->model( 'group/post' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateForm() ){
			if ( $this->model_group_post->editPost( $this->request->get['post_id'], $this->request->post ) == false ){
				$this->session->data['error_warning'] = $this->language->get('error_update');
			
				$this->redirect( $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] ) );
			}
			
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] ) );
		}
		
		$this->getForm();
	}
 
	public function delete(){
		$this->load->language( 'group/post' );
		
		if ( !isset($this->request->get['group_id']) ){
			$this->session->data['error_warning'] = $this->language->get('error_group');
			
			$this->redirect( $this->url->link( 'group/group') );
		}
		
		$this->load->model( 'group/post' );

		$this->document->setTitle( $this->language->get('heading_title') );

		// request
		if ( ($this->request->server['REQUEST_METHOD'] == 'POST') && $this->isValidateDelete() ){
			$this->model_group_post->deletePost( $this->request->post );
			$this->session->data['success'] = $this->language->get( 'text_success' );
			$this->redirect( $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] ) );
		}

		$this->getList( );
	}

	private function getList( ){
		// catch error
		if ( isset($this->error['warning']) ){
			$this->data['error_warning'] = $this->error['warning'];

			unset( $this->session->data['error_warning'] );
		} elseif ( isset($this->session->data['error_warning']) ) {
			$this->data['error_warning'] = $this->session->data['error_warning'];
			
			unset( $this->session->data['error_warning'] );
		} else {
			$this->data['error_warning'] = '';
		}
		
		if ( isset($this->session->data['success']) ){
			$this->data['success'] = $this->session->data['success'];
		
			unset( $this->session->data['success'] );
		} else {
			$this->data['success'] = '';
		}
		
		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}
		
		$this->load->model( 'group/post' );
		$post = $this->model_group_post->getPost( $this->request->get['post_id'] );

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_group' ),
			'href'      => $this->url->link( 'group/group' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_post' ),
			'href'      => $this->url->link( 'group/post' ),
      		'separator' => ' :: '
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'group/comment' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text
		$this->data['text_no_results'] = $this->language->get( 'text_no_results' );
		$this->data['text_status'] = $this->language->get( 'text_status' );
		$this->data['text_post'] = $this->language->get( 'text_post' );	
		$this->data['text_action'] = $this->language->get( 'text_action' );
		$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		$this->data['text_edit'] = $this->language->get( 'text_edit' );
		
		// Confirm
		$this->data['confirm_del'] = $this->language->get( 'confirm_del' );
		
		// Button
		$this->data['button_insert'] = $this->language->get( 'button_insert' );
		$this->data['button_delete'] = $this->language->get( 'button_delete' );
		$this->data['button_back'] = $this->language->get( 'button_back' );
		
		// Link
		$this->data['insert'] = $this->url->link( 'group/post/insert', 'group_id=' . $this->request->get['group_id'] );
		$this->data['delete'] = $this->url->link( 'group/post/delete', 'group_id=' . $this->request->get['group_id'] );
		$this->data['back'] = $this->url->link( 'group/group' );

		// Comment
		$comments = $post->getComments();
		
		$post_total = 0;
		
		$this->data['comments'] = array();
		if ( $comments ){
			$post_total = count( $comments );
			for ( $i = (($page - 1) * $this->limit); $i < ($post_total - (($page - 1) * $this->limit)); $i++ ){
				$action = array();
				
				$action[] = array(
					'text' => $this->language->get( 'text_edit' ),
					'href' => $this->url->link( 'group/post/update', 'comment_id=' . $comments[$i]->getId() . '&post_id=' . $this->request->get['post_id'] ),
					'icon' => 'icon-edit',
				);
			
				$this->data['comments'][] = array(
					'id' => $comments[$i]->getId(),
					'name' => $comments[$i]->getName(),
					'action' => $action,
				);
			}
		}
		
		$pagination = new Pagination();
		$pagination->total = $post_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('sale/customer', '&page={page}', 'SSL');
			
		$this->data['pagination'] = $pagination->render();

		$this->template = 'group/post_list.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function getForm(){
		// catch error
		if ( isset($this->error['warning']) ){
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		if ( isset($this->session->data['success']) ){
			$this->data['success'] = $this->session->data['success'];
		
			unset( $this->session->data['success'] );
		} else {
			$this->data['success'] = '';
		}
		
		if ( isset($this->error['error_name']) ) {
			$this->data['error_name'] = $this->error['error_name'];
		} else {
			$this->data['error_name'] = '';
		}

		// breadcrumbs
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'text_home' ),
			'href'      => $this->url->link( 'common/home' ),
      		'separator' => false
   		);
   		$this->data['breadcrumbs'][] = array(
       		'text'      => $this->language->get( 'heading_title' ),
			'href'      => $this->url->link( 'group/post' ),
      		'separator' => ' :: '
   		);

   		// Heading title
		$this->data['heading_title'] = $this->language->get( 'heading_title' );
		
		// Text	
		$this->data['text_enabled'] = $this->language->get( 'text_enabled' );
		$this->data['text_disabled'] = $this->language->get( 'text_disabled' );
		
		// Button
		$this->data['button_save'] = $this->language->get( 'button_save' );
		$this->data['button_cancel'] = $this->language->get( 'button_cancel' );
		
		// Entry
		$this->data['entry_name'] = $this->language->get( 'entry_name' );
		$this->data['entry_groups'] = $this->language->get( 'entry_groups' );
		
		// Link
		$this->data['cancel'] = $this->url->link( 'group/post', 'group_id=' . $this->request->get['group_id'] );
		
		// Load model
		$this->load->model( 'group/group' );
		
		$group = $this->model_group_group->getgroup( $this->request->get['group_id'] );
		
		// post
		$post = new post();
		if ( isset($this->request->get['post_id']) ){
			if ( $group ){
				foreach ( $group->getposts() as $post ){
					if ( $post->getId() == $this->request->get['post_id'] ){
						break;
					}
				}
				
				$this->data['action'] = $this->url->link( 'group/post/update', 'post_id=' . $this->request->get['post_id'] . '&group_id=' . $this->request->get['group_id'] );
			}else {
				$this->redirect( $this->data['cancel'] );
			}
		}

		// Entry name
		if ( isset($this->request->post['post']['name']) ){
			$this->data['name'] = $this->request->post['post']['name'];
		}elseif ( isset($post) ){
			$this->data['name'] = $post->getName();
		}else {
			$this->data['name'] = '';
		}

		$this->template = 'group/post_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
				
		$this->response->setOutput( $this->render() );
	}

	private function isValidateForm(){
		if ( !isset($this->request->post['post']['name']) || strlen($this->request->post['post']['name']) < 3 || strlen($this->request->post['post']['name']) > 128 ){
			$this->error['error_name'] = $this->language->get( 'error_name' );
		}

		if ( $this->error){
			return false;
		}else {
			return true;	
		}
	}

	private function isValidateDelete(){
		if ( !isset($this->request->post['id']) || !is_array( $this->request->post['id']) ){
			$this->error['error_permission'] = $this->language->get( 'error_permission' );
		}

		if ( $this->error){
			return false;
		}else {
			return true;	
		}
	}
}
?>