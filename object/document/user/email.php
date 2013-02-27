<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** 
 * @MongoDB\EmbeddedDocument
 * @SOLR\Document(collection="email") 
 */
Class Email {
	/** 
	 * @MongoDB\Id 
	 * @SOLR\UniqueKey
	 * @Solr\Field(type="id")
	 */
	private $id; 

	/** 
	 * @MongoDB\String 
	 * @Solr\Field(type="string")
	 */
	private $email;
	
	/** @MongoDB\Boolean */
	private $primary;

	public function getId(){
		return $this->id;
	}

	public function setEmail( $email ){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setPrimary( $primary ){
		$this->primary = $primary;
	}

	public function getPrimary(){
		return $this->primary;
	}
}