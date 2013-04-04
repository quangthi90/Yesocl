<?php
namespace Document\Test;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** 
 * @MongoDB\Document(db="yesocl", collection="test_blog")
 */
Class Blog {
	/** 
	 * @MongoDB\Id
	 */
	private $id; 

	/** 
	 * @MongoDB\String 
	 */
	private $author;

	/** 
	 * @MongoDB\String 
	 */
	private $name;

	/** @MongoDB\ReferenceMany(targetDocument="Post", mappedBy="blogs") */
	private $posts = array();

	public function getId() {
		return $this->id;
	}

	public function setAuthor( $author ){
		$this->author = $author;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function addPost( Post $post ){
		$this->posts[] = $post;
	}

	public function setPosts( $posts ){
		$this->posts = $posts;
	}

	public function getPosts(){
		return $this->posts;
	}
}