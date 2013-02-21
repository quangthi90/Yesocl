<?php
namespace Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** 
 * @MongoDB\Document(collection="post")
 * @SOLR\Document(collection="post")
 */
Class post {
	/** 
	 * @MongoDB\Id
	 * @SOLR\UniqueKey
	 * @SOLR\Field(type="id")
	 */
	public $id;
	
	/** 
	 * @MongoDB\String 
	 * @SOLR\Field(type="string")
	 */
	public $author;
	
	/** 
	 * @SOLR\Field(type="string")
	 * @MongoDB\String 
	 */
	public $content;
	
	/** @MongoDB\Date */
	public $create;
	
	/** @MongoDB\Boolean */
	public $status;
	
	public function getId() {
		return $this->id;
	}
	
	public function setAuthor( $author ) {
		$this->author = $author;
	}
	
	public function getAuthor() {
		return $this->author;
	}
	
	public function setContent( $content ) {
		$this->content = $content;
	}
	
	public function getContent() {
		return $this->content;
	}
	
	public function setCreate( $create ) {
		$this->create = $create;
	}
	
	public function getCreate() {
		return $this->create;
	}
	
	public function setStatus( $status ) {
		$this->status = $status;
	}
	
	public function getStatus() {
		return $this->status;
	}
}