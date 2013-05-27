<?php
namespace Document\Company;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\EmbeddedDocument */
Class Post {
	/** @MongoDB\Id */
	private $id;

	/** @MongoDB\String */
	private $title;

	/** @MongoDB\ReferenceOne(targetDocument="Category", inversedBy="posts") */
	private $category;

	/** @MongoDB\String */
	private $description;

	/** @MongoDB\String */
	private $content;

	/** @MongoDB\String */
	private $thumb;
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\Date */
	private $created;

	/** @MongoDB\Date */
	private $updated;

	/** @MongoDB\String */
	private $author;

	/** @MongoDB\String */
	private $email;
	
	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User", inversedBy="posts") */
    private $user;

	/** @MongoDB\EmbedMany(targetDocument="Comment") */
	private $comments = array();

	/** @MongoDB\String */
	private $slug;

	/**
	 * Get Comment By ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: MongoDB ID
	 * @return:
	 * 		- Object Comment
	 * 		- null if not found
	 */
	public function getCommentById( $comment_id ){
		foreach ( $this->comments as $comment ){
			if ( $comment->getId() === $comment_id ){
				return  $comment;
			}
		}
		
		return null;
	}

	public function getId(){
		return $this->id;
	}
	
	public function setTitle( $title ){
		$this->title = $title;
	}

	public function getTitle(){
		return $this->title;
	}
	
	public function setCategory( $category ){
		$this->category = $category;
	}

	public function getCategory(){
		return $this->category;
	}

	public function setDescription( $description ){
		$this->description = $description;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setContent( $content ){
		$this->content = $content;
	}

	public function getContent(){
		return $this->content;
	}

	public function setThumb( $thumb ){
		$this->thumb = $thumb;
	}

	public function getThumb(){
		return $this->thumb;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setCreated( $created ){
		$this->created = $created;
	}

	public function getCreated(){
		return $this->created;
	}

	/** @MongoDB\PrePersist */
	public function prePersist(){
		$this->created = new \DateTime();
	}

	/** @MongoDB\PreUpdate */
	public function preUpdate(){
		$this->updated = new \DateTime();
	}

	public function setAuthor( $author ){
		$this->author = $author;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setEmail( $email ){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setUser( $user ){
		$this->user = $user;
		$this->author = $user->getUsername();
		$this->email = $user->getPrimaryEmail()->getEmail();
	}

	public function getUser(){
		return $this->user;
	}

	public function addComment( Comment $comment ){
		$this->comments[] = $comment;
	}

	public function setComments( $comments ){
		$this->comments = $comments;
	}

	public function getComments(){
		return $this->comments;
	}

	public function setSlug( $slug ){
		$this->slug = $slug;
	}

	public function getSlug(){
		return $this->slug;
	}

	/**
	* Format array to save to Cache
	* 05/26/2013
	* @author: Bommer <bommer@bommerdesign.com>
	* @param:
	*	- image tool: catalog/model/tool/image
	*	- url lib: class url in library
	*	- bool include comment: cache all comments of post
	* @return: array Post & Comments
	*	Ex:
	*		array = {"id", "author", "avatar", "title", "content", "created", "comment_count", "href_user", "href_post", "href_status", 
	*			"comments" => array{"author", "avatar", "content", "created", "href_user"
	*			}
	*		}
	*/
	public function formatToCache( $image_tool, $url_lib, $include_comment = true ){
		if ( $this->getUser() && $this->getUser()->getAvatar() ){
			$avatar = $image_tool->resize( $this->getUser()->getAvatar(), 180, 180 );
		}else{
			$avatar = $image_tool->getGavatar( $this->getEmail(), 180 );
		}

		$comment_count = count( $this->getComments() );

		$post_data = array(
			'id'			=> $this->getId(),
			'author' 		=> $this->getAuthor(),
			'avatar' 		=> $avatar,
			'title' 		=> $this->getTitle(),
			'content' 		=> html_entity_decode($this->getContent()),
			'created'		=> $this->getCreated(),
			'comment_count' => $comment_count,
			'href_user'		=> $url_lib->link('account/edit', 'user_slug=' . $this->getUser()->getSlug(), 'SSL'),
			'href_post'		=> $url_lib->link('post/detail', 'post_slug=' . $this->getSlug(), 'SSL'),
			'href_status'	=> $url_lib->link('post/post/getCommentByPost', '', 'SSL')
		);

		if ( $include_comment == true ){
			$post_data['comments'] = array();

			foreach ( $this->getComments() as $comment ) {
				if ( $comment->getUser() && $comment->getUser()->getAvatar() ){
					$avatar = $image_tool->resize( $this->customer->getAvatar(), 180, 180 );
				}else{
					$avatar = $image_tool->getGavatar( $comment->getEmail(), 180 );
				}

				$post_data['comments'][] = array(
					'author' 		=> $this->getAuthor(),
					'avatar' 		=> $avatar,
					'content' 		=> html_entity_decode($comment->getContent()),
					'created'		=> $comment->getCreated()->format('h:i d/m/Y'),
					'href_user'		=> $url_lib->link('account/edit', $this->getUser()->getSlug(), 'SSL')
				);
			}
		}

		return $post_data;
	}
}