<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** 
 * @MongoDB\EmbeddedDocument
 * @SOLR\Document(collection="meta") 
 */
Class Meta {
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
	private $firstname;
	
	/** 
	 * @MongoDB\String 
	 * @Solr\Field(type="string")
	 */
	private $lastname;

	public function getId(){
		return $this->id;
	}

	public function setFirstname( $firstname ){
		$this->firstname = $firstname;
	}

	public function getFirstname(){
		return $this->firstname;
	}

	public function setLastname( $lastname ){
		$this->lastname = $lastname;
	}

	public function getLastname(){
		return $this->lastname;
	}
}