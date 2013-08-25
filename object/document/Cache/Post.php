<?php
namespace Document\Cache;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(collection="cache_post") */
Class Post {
	/** @MongoDB\Id */
	private $id;
	
	/** @MongoDB\Date */
	private $created;

	/** @MongoDB\Int */
	private $view;

	/** @MongoDB\string */
	private $postId;

	/** @MongoDB\String */
	private $type;

	/** @MongoDB\String */
	private $typeId;

	public function getId(){
		return $this->id;
	}

	public function setCreated( $created ){
		$this->created = $created;
	}

	public function getCreated(){
		return $this->created;
	}
	
	public function setView( $view ){
		$this->view = $view;
	}

	public function getView(){
		return $this->view;
	}

	public function setPostId( $post_id ){
		$this->postId = (string)$post_id;
	}

	public function getPostId(){
		return $this->postId;
	}
	
	public function setType( $type ){
		$this->type = $type;
	}

	public function getType(){
		return $this->type;
	}

	public function setTypeId( $type_id ){
		$this->typeId = $type_id;
	}

	public function getTypeId(){
		return $this->typeId;
	}
}