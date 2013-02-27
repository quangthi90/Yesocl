<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;
use Document\User\Email;

/** 
 * @MongoDB\Document(db="yesocl", collection="user")
 * @SOLR\Document(collection="user")
 */
Class User {
	/** 
	 * @MongoDB\Id 
	 * @SOLR\UniqueKey
	 * @Solr\Field(type="id")
	 */
	private $id; 
	
	/**
	 * @SOLR\Field(type="string");
	 */
	private $primaryEmail;

	/** @MongoDB\EmbedMany(targetDocument="Email") */
	private $emails = array();
	
	/** @MongoDB\String */
	private $password;
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\Date */
	private $created;
	
	/** @MongoDB\ReferenceOne(targetDocument="Group", inversedBy="users") */
    private $groupUser;
	
	/** @MongoDB\EmbedOne(targetDocument="Meta") */
    private $meta;
	
	/** @MongoDB\ReferenceMany(targetDocument="Document\Group\Group", mappedBy="author") */
	private $groups = array();
	
	/**
	 * Get Primary Email
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: empty
	 * @return: 
	 * 		string email have primary key
	 * 		null if not found email with primary key
	 */
	public function getPrimaryEmail( $isObject = false){
		foreach ( $this->emails as $email ){
			if ( $email->getPrimary() === true ){
				if ( $isObject ) {
					return $email;
				}else {
					return $email->getEmail();
				}
			}
		}
		return null;
	}
	
	/**
	 * Check exit Email
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: string Email
	 * @return: boolean
	 */
	public function isExistEmail( $email ){
		foreach ( $this->emails as $data ){
			if ( $data->getEmail() === $email ){
				return true;
			}
		}
		
		return false;
	}
	
	/**
	 * Get Full name
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @return: 
	 * 		string full name
	 */
	public function getFullname(){
		return $this->meta->getFirstname() . ' ' . $this->meta->getLastname();
	}

	public function setId( $id ){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setPrimaryEmail( $primary_email ){
		// disable old primary email
		foreach ( $this->emails as $key => $email ){
			if ( $email->getPrimary() === true ){
				$this->emails[$key]->setPrimary( false );
			}
		}
		
		// check exist emails
		if ( $this->isExistEmail( $primary_email ) ) {
			foreach ($this->emails as $key => $email) {
				if ( $email->getEmail() === $primary_email ){
					$this->emails[$key]->setPrimary( true );
				}
			}
		}else {
			$new_primary_email = new Email();
			$new_primary_email->setEmail( $primary_email );
			$new_primary_email->setPrimary( true );
			$this->emails->addEmail( $new_primary_email );
		}
	}

	public function addEmail( Email $email ){
		$this->emails[] = $email;
	}

	public function setEmails( $emails ){
		$this->emails = $emails;
	}

	public function getEmails(){
		return $this->emails;
	}

	public function setPassword( $password ){
		$this->password = $password;
	}

	public function getPassword(){
		return $this->password;
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

	public function setGroupUser( $groupUser ){
		$this->groupUser = $groupUser;
	}

	public function getGroupUser(){
		return $this->groupUser;
	}

	public function setMeta( $meta ){
		$this->meta = $meta;
	}

	public function getMeta(){
		return $this->meta;
	}

	public function addGroup( \Document\Group\Group $group ){
		$this->groups[] = $group;
	}

	public function setGroups( $groups ){
		$this->groups = $groups;
	}

	public function getGroups(){
		return $this->groups;
	}
}