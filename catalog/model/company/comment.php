<?php
use Document\AbsObject\Comment;

class ModelCompanyComment extends Doctrine {
	public function addComment( $data ){
		if ( !isset($data['content']) || empty($data['content']) ){
			return null;
		}

		if ( !isset($data['post_id']) || empty($data['post_id']) ){
			return null;
		}

		$company = $this->dm->getRepository('Document\Company\Company')->findOneBy(array(
			'post.id' => $data['post_id']
		));
		
		if ( !$company ){
			return null;
		}
		
		$post = $company->getPostById( $data['post_id'] );
		
		if ( !$post ){
			return null;
		}

		$user_id = $this->customer->getId();
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ){
			return null;
		}
		
		$comment = new Comment();
		$comment->setAuthor( $user->getUsername() );
		$comment->setEmail( $user->getPrimaryEmail()->getEmail() );
		$comment->setUser( $user );
		$comment->setContent( $data['content'] );
		$comment->setStatus( true );
		$this->dm->persist( $comment );

		$post->addComment( $comment );
		$this->dm->flush();

		$this->load->model('tool/cache');
		$this->model_tool_cache->setPost( $post );
		
		return $comment;
	}
}
?>