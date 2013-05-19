<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** 
 * @MongoDB\Document(db="yesocl", collection="user")
 * @SOLR\Document(collection="user")
 */
Class User {
	/** 
	 * @MongoDB\Id 
	 * @SOLR\Field(type="id")
	 */
	private $id; 

	/** 
	 * @MongoDB\String
	 * @SOLR\Field(type="text")
	 */
	private $username;

	/** @MongoDB\String */
	private $password;

	/** @MongoDB\String */
	private $salt;

	/** 
	 * @MongoDB\EmbedMany(targetDocument="Document\User\Meta\Email") 
	 */
	private $emails = array();

	/** 
	 * @MongoDB\EmbedOne(targetDocument="Meta") 
	 */
    private $meta;

    /** @MongoDB\ReferenceMany(targetDocument="Document\Company\Company", inversedBy="owner") */
    private $companiesCreated = array();

	/** @MongoDB\ReferenceOne(targetDocument="Group", inversedBy="users") */
    private $groupUser;

    /** @MongoDB\ReferenceMany(targetDocument="Document\Group\Group", mappedBy="author") */
	private $groups = array();
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\Date */
	private $created;

	public function getId() {
		return $this->id;
	}

	public function setId( $id ) {
		$this->id = $id;
	}

	public function setUsername( $username ){
		$this->username = $username;
	}

	public function getUsername(){
		return $this->username;
	}

	public function setPassword( $password ){
		$this->password = $password;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setSalt( $salt ){
		$this->salt = $salt;
	}

	public function getSalt(){
		return $this->salt;
	}

	public function addEmail( Meta\Email $email ){
		$this->emails[] = $email;
	}

	public function setEmails( $emails ){
		$this->emails = $emails;
	}

	public function getEmails(){
		return $this->emails;
	}
	
	public function getPrimaryEmail() {
		foreach ($this->emails as $email) {
			if ($email->getPrimary()) {
				return $email;
			}
		}
	}

	public function isExistEmail( $email ) {
		foreach ( $this->emails as $email_data ) {
			if ( strtolower( trim( $email ) ) == $email_data->getEmail() ) {
				return true;
			}
		}

		return false;
	}

	public function setMeta( $meta ){
		$this->meta = $meta;
	}

	public function getMeta(){
		return $this->meta;
	}

	public function getFullname(){
		return $this->meta->getFirstname() . ' ' . $this->meta->getLastname();
	}

	public function setGroupUser( $groupUser ){
		$this->groupUser = $groupUser;
	}

	public function getGroupUser(){
		return $this->groupUser;
	}

	public function addCompanyCreated( \Document\Company\Company $companyCreated ){
		$this->companiesCreated[] = $companyCreated;
	}

	public function setCompaniesCreated( $companiesCreated ){
		$this->companiesCreated = $companiesCreated;
	}

	public function getCompaniesCreated(){
		return $this->companiesCreated;
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

	/**
	* @SOLR\Field(type="text")
	*/
	private $solrUserContent;

	public function setSolrUserContent( $solrContent ){
		$this->solrContent = $solrContent;
	}

	public function getSolrUserContent(){
		$solrContent = "";

		$solrContent .= $this->getUsername() . "  ";

		if ( count($this->getEmails()) > 0 ) {
			foreach ($this->getEmails() as $data) {
		$solrContent .= $data->getEmail() . "  ";
			}
		}

		$solrContent .= $this->meta->getFirstname() . "  ";
		$solrContent .= $this->meta->getLastname() . "  ";


		$this->solrContent = $solrContent;
		return $solrContent;
	}

    // ----------------- Solr Data cache for Embed & Reference Data -------------------
    /**
	* @SOLR\Field(type="text")
	*/
	private $solrEmail;

	public function setSolrEmail( $solr_email ){
		$this->solrEmail = $solr_email;
	}

	public function getSolrEmail(){
		return $this->solrEmail;
	}

	public function getDataSolrEmail(){
		try{
			$this->solrEmail = '';

			foreach ( $this->emails as $email) {
				$this->solrEmail .= $email->getEmail() . ' ';
			}
		}
		catch(Exception $e){
			throw new Exception( 'Have error when add Data for Solr Email!<br>See User Document <b>Function getDataSolrEmail()</b>', 0, $e);
		}
	}

	/**
	* @SOLR\Field(type="text")
	*/
	private $solrFullname;

	public function setSolrFullname( $solr_fullname ){
		$this->solrFullname = $solr_fullname;
	}

	public function getSolrFullname(){
		return $this->solrFullname;
	}

	public function getDataSolrFullname(){
		try{
			$this->solrFullname .= $this->meta->getFirstname() . ' ' . $this->meta->getLastname();
		}
		catch(Exception $e){
			throw new Exception( 'Have error when add Data for Solr Fullname!<br>See User Document <b>Function getDataSolrFullname()</b>', 0, $e);
		}
	}

	/**
	* @SOLR\Field(type="text")
	*/
	private $solrPrimaryEmail;

	public function setSolrPrimaryEmail( $solr_primary_email ){
		$this->solrPrimaryEmail = $solr_primary_email;
	}

	public function getSolrPrimaryEmail(){
		return $this->solrPrimaryEmail;
	}

	public function getDataSolrPrimaryEmail(){
		try{
			$this->solrPrimaryEmail .= $this->getPrimaryEmail()->getEmail();
		}
		catch(Exception $e){
			throw new Exception( 'Have error when add Data for Solr PrimaryEmail!<br>See User Document <b>Function getDataSolrPrimaryEmail()</b>', 0, $e);
		}
	}
	//---------------------------------- end Solr Data Cache --------------------------

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
    	$this->created = new \DateTime();
        $this->getDataSolrEmail();
        $this->getDataSolrFullname();
        $this->getDataSolrPrimaryEmail();
    }

    /** @MongoDB\PreUpdate */
    public function preUpdate()
    {
        $this->getDataSolrEmail();
        $this->getDataSolrFullname();
        $this->getDataSolrPrimaryEmail();
    }
}