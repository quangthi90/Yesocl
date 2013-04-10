<?php
use Document\Company\Post;

class ModelCompanyPost extends Doctrine {
	public function addPost( $company_id, $data = array() ) {
		// Company is required
		$company = $this->dm->getRepository( 'Document\Company\Company' )->find( $company_id );
		if ( empty( $company ) ) {
			return false;
		}

		// Title is required
		if ( !isset( $data['title'] ) || empty( $data['title'] ) ) {
			return false;
		}

		// Author is required
		if ( !isset( $data['user_id'] ) ) {
			return false;
		}
		$user = $this->dm->getRepository( 'Document\User\User' )->find( $data['user_id'] );
		if ( empty( $user ) ) {
			return false;
		}

		// Category is required
		if ( !isset( $data['category'] ) ) {
			return false;
		}
		$category = $this->dm->getRepository( 'Document\Company\Category' )->find( $data['category'] );
		if ( empty( $category ) ) {
			return false;
		}

		// Description is required
		if ( !isset( $data['description'] ) || empty( $data['description'] ) ) {
			return false;
		} 

		// Content is required
		if ( !isset( $data['post_content'] ) || empty( $data['post_content'] ) ) {
			return false;
		} 

		// Status
		if ( isset( $data['status'] ) ) {
			$data['status'] = (int)$data['status'];
		}else {
			$data['status'] = 0;
		}

		$post = new Post();
		$post->setTitle( $data['title'] );
		$post->setUser( $user );
		$post->setCategory( $category );
		$post->setDescription( $data['description'] );
		$post->setContent( $data['post_content'] );
		$post->setStatus( $data['status'] );

		$company->addPost( $post );

		$this->dm->flush();

		return true;
	}

	public function editPost( $post_id, $data = array() ) {
		// Company is required
		$company = $this->dm->getRepository( 'Document\Company\Company' )->findOneBy( array( 'posts.id' => $post_id ) );
		if ( empty( $company ) ) {
			return false;
		}

		// Title is required
		if ( !isset( $data['title'] ) || empty( $data['title'] ) ) {
			return false;
		}

		// Author is required
		if ( !isset( $data['user_id'] ) ) {
			return false;
		}
		$user = $this->dm->getRepository( 'Document\User\User' )->find( $data['user_id'] );
		if ( empty( $user ) ) {
			return false;
		}

		// Category is required
		if ( !isset( $data['category'] ) ) {
			return false;
		}
		$category = $this->dm->getRepository( 'Document\Company\Category' )->find( $data['category'] );
		if ( empty( $category ) ) {
			return false;
		}

		// Description is required
		if ( !isset( $data['description'] ) || empty( $data['description'] ) ) {
			return false;
		} 

		// Content is required
		if ( !isset( $data['post_content'] ) || empty( $data['post_content'] ) ) {
			return false;
		} 

		// Status
		if ( isset( $data['status'] ) ) {
			$data['status'] = (int)$data['status'];
		}else {
			$data['status'] = 0;
		}

		$post = $company->getPostById( $post_id );
		$post->setTitle( $data['title'] );
		$post->setUser( $user );
		$post->setCategory( $category );
		$post->setDescription( $data['description'] );
		$post->setContent( $data['post_content'] );
		$post->setStatus( $data['status'] );

		$this->dm->flush();

		return true;
	}

	public function deletePost( $data = array() ) {
		if ( isset($data['id']) ) {
			if ( count($data['id']) > 0 ){
				$company = $this->dm->getRepository('Document\Company\Company')->findOneBy( array('posts.id' => $data['id'][0]) );
			}
			
			foreach ( $data['id'] as $id ) {
				$company->getPosts()->removeElement( $company->getPostById( $id ) );
			}
		}
		
		$this->dm->flush();
	}
}
?>