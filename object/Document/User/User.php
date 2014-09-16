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
	private $forgotten;

	/** @MongoDB\Date */
	private $forgotCreated;

	/** @MongoDB\String */
	private $salt;

	/** @MongoDB\String */
	private $slug;

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

	/** @MongoDB\String */
	private $avatar;

	/** @MongoDB\String */
	private $cover;

	/** @MongoDB\ReferenceOne(targetDocument="Posts", mappedBy="user") */
	private $postData;

	/** @MongoDB\Collection */
	private $friendRequests;

	/** @MongoDB\EmbedMany(targetDocument="Notification") */
	private $notifications = array();

	/** 
	 * @MongoDB\Int
	 */
	private $unRead;

	/** @MongoDB\Boolean */
	private $isSocial;

	/** @MongoDB\String */
	private $token;

	/** @MongoDB\Date */
	private $tokenTime;

	/** @MongoDB\ReferenceMany(targetDocument="Document\Branch\Branch", mappedBy="members") */
	private $branches = array();

	/** @MongoDB\Boolean */
	private $deleted;

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
    	$this->created = new \DateTime();
    	$this->meta->setCurrent('Job Seeker');
        $this->getDataSolrEmail();
        $this->getDataSolrFullname();
        $this->getDataSolrPrimaryEmail();
        $this->deleted = false;
    }

    /** @MongoDB\PreUpdate */
    public function preUpdate()
    {
        $this->getDataSolrEmail();
        $this->getDataSolrFullname();
        $this->getDataSolrPrimaryEmail();
    }

    /**
	* Format array to save to Cache
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @return: array User
	*/
    public function formatToCache(){
    	if ( !$this->getId() ) return array();
		
		$data = array(
			'id'			=> $this->getId(),
			'username' 		=> $this->getUsername(),
			'avatar' 		=> $this->getAvatar(),
			'slug'			=> $this->getSlug(),
			'email' 		=> $this->getPrimaryEmail()->getEmail(),
			'current'		=> $this->getMeta()->getCurrent(),
			'gender'		=> $this->getMeta()->getSex(),
			'cover'			=> $this->getCover()
		);

		return $data;
	}

	/**
	* Get Primary Email
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @return: Object Email
	*/
	public function getPrimaryEmail() {
		foreach ($this->getEmails() as $email) {
			if ($email->getPrimary()) {
				return $email;
			}
		}
		return null;
	}

	/**
	* Check Email is exist
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @param: string email
	* @return: bool
	*	- true: exist
	*	- false: not exist
	*/
	public function isExistEmail( $email ) {
		foreach ( $this->getEmails() as $email_data ) {
			if ( strtolower( trim( $email ) ) == $email_data->getEmail() ) {
				return true;
			}
		}

		return false;
	}

	public function getFriendBySlug( $friend_slug ){
		foreach ( $this->getFriends() as $friend ) {
			if ( $friend->getUser() && $friend->getUser()->getSlug() == $friend_slug){
				return $friend;
			}
		}

		return null;
	}

	/**
	 * Get Notification By ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: MongoDB ID
	 * @return:
	 * 		- Object notification
	 * 		- null if not found
	 */
	public function getNotificationById( $notification_id ){
		foreach ( $this->getNotifications() as $notification ){
			if ( $notification->getId() == $notification_id ){
				return $notification;
			}
		}
		
		return null;
	}

	public function getNotificationByData( $actor_id, $object_id, $action ){
		foreach ( $this->getNotifications() as $notification ){
			if ( $notification->getActor() 
				&& $notification->getActor()->getId() == $actor_id
				&& $notification->getObjectId() == $object_id
				&& $notification->getAction() == $action ){
				return $notification;
			}
		}
		
		return null;
	}

	public function getBranchBySlug( $branch_slug ){
		foreach ( $this->getBranches() as $branch ){
			if ( $branch->getSlug() == $branch_slug ){
				return $branch;
			}
		}
		
		return null;
	}

	public function getId() {
		return $this->id;
	}

	public function setId( $id ) {
		$this->id = $id;
	}

	public function getDeleted() {
		return $this->deleted;
	}

	public function setDeleted( $deleted ) {
		$this->deleted = $deleted;
	}

	public function setUsername( $username ){
		$this->username = $username;
	}

	public function getUsername(){
		if ( !$this->username ){
			return $this->getFullname();
		}
		return $this->username;
	}

	public function setPassword( $password ){
		$this->password = $password;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setForgotten( $forgotten ){
		$this->forgotCreated = new \DateTime();
		date_add($this->forgotCreated, date_interval_create_from_date_string('1 days'));
		$this->forgotten = $forgotten;
	}

	public function getForgotten(){
		return $this->forgotten;
	}

	public function setForgotCreated( $forgotCreated ){
		$this->forgotCreated = $forgotCreated;
	}

	public function getForgotCreated(){
		return $this->forgotCreated;
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

	public function setMeta( $meta ){
		$this->meta = $meta;
	}

	public function getMeta(){
		return $this->meta;
	}

	public function getFullname(){
		if ( $this->meta ){
			return $this->meta->getFirstname() . ' ' . $this->meta->getLastname();
		}

		return '';
	}

	public function setGroupUser( $groupUser ){
		$this->groupUser = $groupUser;
	}

	public function getGroupUser(){
		return $this->groupUser;
	}

	public function setSocialNetwork( \Document\Social\Network $socialNetwork ){
		$this->socialNetwork = $socialNetwork;
	}

	public function getSocialNetwork(){
		return $this->socialNetwork;
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

	public function setSlug( $slug ){
		$this->slug = $slug;
	}

	public function getSlug(){
		return $this->slug;
	}

	public function setAvatar( $avatar ){
		$this->avatar = $avatar;
	}

	public function getAvatar(){
		return $this->avatar;
	}

	public function setPostData( $postData ){
		$this->posts = $postData;
	}

	public function getPostData(){
		return $this->postData;
	}

	public function addFriendRequest( $friendRequest ){
		$this->friendRequests[] = $friendRequest;
	}

	public function setFriendRequests( $friendRequests ){
		$this->friendRequests = $friendRequests;
	}

	public function getFriendRequests(){
		return $this->friendRequests;
	}

	public function addNotification( Notification $notification ){
		$this->notifications[] = $notification;
	}

	public function setNotifications( $notifications ){
		$this->notifications = $notifications;
	}

	public function getNotifications(){
		return $this->notifications;
	}

	public function setUnRead( $unRead ){
		$this->unRead = $unRead;
	}

	public function getUnRead(){
		return $this->unRead;
	}

	public function setIsSocial( $isSocial ){
		$this->isSocial = $isSocial;
	}

	public function getIsSocial(){
		return $this->isSocial;
	}

	public function setToken( $token ){
		$this->tokenTime = new \DateTime();
		date_add($this->tokenTime, date_interval_create_from_date_string('7 days'));

		$this->token = $token;
	}

	public function getToken(){
		return $this->token;
	}

	public function setTokenTime( $tokenTime ){
		$this->tokenTime = $tokenTime;
	}

	public function getTokenTime(){
		return $this->tokenTime;
	}

	public function setBranches( $branches ){
		$this->branches = $branches;
	}

	public function getBranches(){
		return $this->branches;
	}

	public function addBranch( \Document\Branch\Branch $branch ){
		return $this->branches[] = $branch;
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
			$this->solrFullname = $this->meta->getFirstname() . ' ' . $this->meta->getLastname();
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
			$this->solrPrimaryEmail = $this->getPrimaryEmail()->getEmail();
		}
		catch(Exception $e){
			throw new Exception( 'Have error when add Data for Solr PrimaryEmail!<br>See User Document <b>Function getDataSolrPrimaryEmail()</b>', 0, $e);
		}
	}

	public function getCover(){
		return $this->cover;
	}

	public function setCover($cover){
		$this->cover = $cover;
	}
	//---------------------------------- end Solr Data Cache --------------------------
}