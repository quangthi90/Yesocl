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

	/** @MongoDB\ReferenceOne(targetDocument="Document\Social\Network", inversedBy="users") */
    private $socialNetwork;

    /** @MongoDB\ReferenceMany(targetDocument="Document\Group\Group", mappedBy="author") */
	private $groups = array();
	
	/** @MongoDB\Boolean */
	private $status;
	
	/** @MongoDB\Date */
	private $created;

	/** @MongoDB\String */
	private $avatar;

	/** @MongoDB\Collection */
	private $refreshIds = array();

	/** @MongoDB\ReferenceOne(targetDocument="Posts", mappedBy="user") */
	private $postData;

	/** @MongoDB\EmbedMany(targetDocument="Document\Friend\Friend") */
	private $friends = array();

	/** @MongoDB\EmbedMany(targetDocument="Document\Friend\Group") */
	private $friendGroups = array();

	/** @MongoDB\Collection */
	private $friendRequests;

	/** @MongoDB\EmbedMany(targetDocument="Notification") */
	private $notifications = array();

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
    	$this->created = new \DateTime();
    	$this->meta->setCurrent('unknow');
        $this->getDataSolrEmail();
        $this->getDataSolrFullname();
        $this->getDataSolrPrimaryEmail();
        $this->getDataSolrFriendList();
    }

    /** @MongoDB\PreUpdate */
    public function preUpdate()
    {
        $this->getDataSolrEmail();
        $this->getDataSolrFullname();
        $this->getDataSolrPrimaryEmail();
        $this->getDataSolrFriendList();
    }

    /**
	* Format array to save to Cache
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @return: array User
	*/
    public function formatToCache(){
		$data = array(
			'id'			=> $this->getId(),
			'username' 		=> $this->getUsername(),
			'avatar' 		=> $this->getAvatar(),
			'slug'			=> $this->getSlug(),
			'email' 		=> $this->getPrimaryEmail()->getEmail(),
			'current'		=> $this->getMeta()->getCurrent(),
			'gender'		=> $this->meta->getSex()
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
		foreach ($this->emails as $email) {
			if ($email->getPrimary()) {
				return $email;
			}
		}
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
		foreach ( $this->emails as $email_data ) {
			if ( strtolower( trim( $email ) ) == $email_data->getEmail() ) {
				return true;
			}
		}

		return false;
	}

	public function getFriendById( $friend_id ){
		foreach ( $this->friends as $friend ) {
			if ( $friend->getUser() && $friend->getUser()->getId() == $friend_id ){
				return $friend;
			}
		}

		return null;
	}

	public function getFriendBySlug( $friend_slug ){
		foreach ( $this->friends as $friend ) {
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
		foreach ( $this->notifications as $notification ){
			if ( $notification->getId() == $notification_id ){
				return $notification;
			}
		}
		
		return null;
	}

	public function getNotificationByData( $actor_id, $object_id, $action ){
		foreach ( $this->notifications as $notification ){
			if ( $notification->getActor()->getId() == $actor_id
				&& $notification->getObjectId() == $object_id
				&& $notification->getAction() == $action ){
				return $notification;
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

	public function addRefreshId( $refreshId ){
		$this->refreshIds[] = $refreshId;
	}

	public function setRefreshIds( $refreshIds ){
		$this->refreshIds = $refreshIds;
	}

	public function getRefreshIds(){
		return $this->refreshIds;
	}

	public function addFriend( \Document\Friend\Friend $friend ){
		$this->friends[] = $friend;
	}

	public function setFriends( $friends ){
		$this->friends = $friends;
	}

	public function getFriends(){
		return $this->friends;
	}

	public function addFriendGroup( \Document\Friend\Group $friendGroup ){
		$this->friendGroups[] = $friendGroup;
	}

	public function setFriendGroups( $friendGroups ){
		$this->friendGroups = $friendGroups;
	}

	public function getFriendGroups(){
		return $this->friendGroups;
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

	/**
	* @SOLR\Field(type="text")
	*/
	private $solrFriendList;

	public function setSolrFriendList( $solrFriendList ){
		$this->solrFriendList = $solrFriendList;
	}

	public function getSolrFriendList(){
		return $this->solrFriendList;
	}

	public function getDataSolrFriendList(){
		try{
			foreach ($this->getFriends() as $friend) {
				$this->solrFriendList .= ' ' . $friend->getUser()->getId();
			}
		}
		catch(Exception $e){
			throw new Exception( 'Have error when add Data for Solr Friend List!<br>See User Document <b>Function getDataSolrFriendList()</b>', 0, $e);
		}
	}
	//---------------------------------- end Solr Data Cache --------------------------
}