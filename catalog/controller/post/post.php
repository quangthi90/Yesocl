<?php 
class ControllerPostPost extends Controller {
	private $error = array();

	public function addStatus(){
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->load->model('user/post');
            $this->load->model('tool/image');

            $data = array(
                'content' => $this->request->post['content'],
                'title' => $this->request->post['title'],
                'user_slug' => $this->request->get['user_slug'],
                'author_id' => $this->customer->getId()
            );

            $post = $this->model_user_post->addPost( $data );

            $user = $post->getUser()->formatToCache();

            // avatar
            if ( $user && $user['avatar'] && file_exists(DIR_IMAGE . $user['avatar']) ){
                $avatar = $this->model_tool_image->resize( $user['avatar'], 180, 180 );
            }elseif ( $user && $user['email'] ){
                $avatar = $this->model_tool_image->getGavatar( $user['email'], 180 );
            }else{
                $avatar = $this->model_tool_image->getGavatar( $comment['email'], 180 );
            }

            // thumb
            $thumb = $post->getThumb();
            if ( !empty($thumb) ){
                $image = $this->model_tool_image->resize( $thumb, 400, 250 );
            }else{
                $image = null;
            }

            $post_type = $this->config->get('post')['type']['user'];

            // href
            $data_post_info = array(
                'post_type' => $post_type,
                'post_slug' => $post->getSlug()
            );
            $href = array(
                'comment_list' => $this->extension->path( "CommentList", $data_post_info ),
                'comment_add' => $this->extension->path( "CommentAdd", $data_post_info ),
                'post_like' => $this->extension->path( "PostLike", $data_post_info ),
                'post_detail' => $this->extension->path( "PostPage", $data_post_info )
            );

            $content = html_entity_decode($post->getContent());

            if ( strlen($content) > 200 ){
                $content = substr($content, 0, 200) . '[...]';
            }

            $return_data = array(
                'post' => array(
                    'user' => array(
                        'avatar' => $avatar,
                        'username' => $post->getAuthor()
                    ),
                    'created' => $post->getCreated()->format( $this->language->get('date_format_full') ),
                    'image' => $image,
                    'title' => $post->getTitle(),
                    'content' => $content
                ),
                'href' => $href
            );

			return $this->response->setOutput(json_encode(array(
	            'success' => 'ok',
                'post' => $return_data
	        )));
    	}
		
    	return $this->response->setOutput(json_encode(array(
            'success' => 'not ok',
            'error' => $this->error['warning']
        )));
	}

    public function validate(){
        if ( empty( $this->request->post['content']) ) {
            $this->error['warning'] = $this->language->get( 'error_content' );
        }elseif ( !empty( $this->request->files['thumb'] ) && $this->request->files['thumb']['size'] > 0 ) {
            $this->load->model('tool/image');
            if ( !$this->model_tool_image->isValidImage( $this->request->files['thumb'] ) ) {
                $this->error['warning'] = $this->language->get( 'error_thumb');
            }
        }

        if ( $this->error ) {
            return false;
        }else {
            return true;
        }
    }

    public function like(){
        $data = array();

        if ( !empty($this->request->get['post_slug']) ){
            $data['post_slug'] = $this->request->get['post_slug'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post slug empty'
            )));
        }

        if ( !empty($this->request->get['post_type']) ){
            $data['post_type'] = $this->request->get['post_type'];
        }else{
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: post type empty'
            )));
        }

        $data['likerId'] = $this->customer->getId();
        
        switch ($data['post_type']) {
            case $this->config->get('post')['type']['branch']:
                $this->load->model('branch/post');
                $post = $this->model_branch_post->editPost( $data['post_slug'], $data );
                break;

            case $this->config->get('post')['type']['user']:
                $this->load->model('user/post');
                $post = $this->model_user_post->editPost( $data['post_slug'], $data );
                break;
            
            default:
                break;
        }
        
        return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'like_count' => count($post->getLikerIds())
        )));
    }
    
}
?>