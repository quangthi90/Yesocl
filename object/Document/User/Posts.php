<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(db="yesocl", collection="user_post") */
Class Posts {
	/** 
	 * @MongoDB\Id
	 */
	private $id;

	/** @MongoDB\ReferenceOne(targetDocument="User", inversedBy="posts") */
	private $user;

	/** @MongoDB\EmbedMany(targetDocument="Post") */
	private $posts = array();

	/**
	 * Get Post By ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: MongoDB ID
	 * @return:
	 * 		- Object Post
	 * 		- null if not found
	 */
	public function getPostById( $post_id ){
		foreach ( $this->posts as $post ){
			if ( $post->getId() === $post_id ){
				return $post;
			}
		}
		
		return null;
	}

	/**
	 * Get Post By Slug
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: string post Slug
	 * @return:
	 * 		- Object Post
	 * 		- null if not found
	 */
	public function getPostBySlug( $post_slug ){
		foreach ( $this->posts as $post ){
			if ( $post->getSlug() == $post_slug ){
				return  $post;
			}
		}
		
		return null;
	}

	public function getPostByCommentId( $comment_id ){
		foreach ( $this->posts as $post ) {
			if ( $post->getCommentById($comment_id) ){
				return $post;
			}
		}

		return null;
	}

	public function getId() {
		return $this->id;
	}

	public function setUser( User $user) {
		return $this->user = $user;
	}

	public function getUser() {
		return $this->user;
	}

	public function addPost( Post $post ){
		$posts = $this->posts->toArray();
		array_unshift($posts, $post);
		$this->posts = $posts;
	}

	public function setPosts( $posts ){
		$this->posts = $posts;
	}

	public function getPosts(){
		return $this->posts;
	}
}