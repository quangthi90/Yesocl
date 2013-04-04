<?php
namespace Document\Test;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="test_post")
 */
Class Post {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $author;

	/** @MongoDB\String */
	private $content;

	/** @MongoDB\ReferenceMany(targetDocument="Blog", inversedBy="posts") */
    private $blogs = array();

	public function getId(){
		return $this->id;
	}

	public function setAuthor( $author ){
		$this->author = $author;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setContent( $content ){
		$this->content = $content;
	}

	public function getContent(){
		return $this->content;
	}

	public function addBlog( Blog $blog ){
		$this->blogs[] = $blog;
	}

	public function setBlogs( $blogs ){
		$this->blogs = $blogs;
	}

	public function getBlogs(){
		return $this->blogs;
	}
}