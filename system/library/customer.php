<?php
class Customer {
	private $customer_id;
	private $firstname;
	private $lastname;
	private $email;
	private $avatar;
	private $username;
	private $customer_group_id;
	private $slug;
	private $facebook;
	private $url;
	private $friend_requests;
	private $user;
	
  	public function __construct($registry) {
		$this->config = $registry->get('config');
		$this->db = $registry->get('db');
		$this->request = $registry->get('request');
		$this->session = $registry->get('session');
		$this->facebook = $registry->get('facebook');
		$this->url = $registry->get('url');
			
		if (isset($this->session->data['customer_id'])) { 
			$customer_query = $this->db->getDm()->getRepository('Document\User\User')->findOneBy( array(
				'status' => true,
				'id' => $this->session->data['customer_id']
			));
			
			if ($customer_query) {
				$this->customer_id = $customer_query->getId();
				$this->firstname = $customer_query->getMeta()->getFirstName();
				$this->lastname = $customer_query->getMeta()->getLastName();
				$this->email = $customer_query->getPrimaryEmail()->getEmail();
				$this->username = $customer_query->getUsername();
				$this->customer_group_id = $customer_query->getGroupUser()->getId();
				$this->slug = $customer_query->getSlug();
				$this->avatar = $customer_query->getAvatar();
				$this->friend_requests = $customer_query->getFriendRequests();
				$this->user = $customer_query;
			} else {
				$this->logout();
			}
  		}
	}
		
  	public function login($email, $password, $remember = false, $is_social = false, $is_pass_encode = false) {
		$customer_query = $this->db->getDm()->getRepository('Document\User\User')->findOneBy( array(
			'status' => true,
			'emails.email' => $email
		));
		
		if ($customer_query) {
			if ( !$is_social ){
				$salt = $customer_query->getSalt();

				if ( !$is_pass_encode ){
		    		$user_password = sha1($salt . sha1($salt . sha1($password)));
		    	}else{
		    		$user_password = $password;
		    	}

				$date = new DateTime();
		    	if ( $user_password != $customer_query->getPassword() ){
		    		if ( $customer_query->getForgotCreated() < $date || $user_password != $customer_query->getForgotten() ){
		    			return false;
		    		}
		    	}

		    	if ( $customer_query->getTokenTime() != null && $customer_query->getTokenTime() < $date ){
		    		$this->db->getDm()->remove( $customer_query );
		    		$this->db->getDm()->flush();
		    		$this->session->setFlash('warning_delete_account', 'Your account had deleted because not active!');
		    		return false;
		    	}
		    }

			$this->session->data['customer_id'] = $customer_query->getId();
			$this->session->data['customer_slug'] = $customer_query->getSlug();
									
			$this->customer_id = $customer_query->getId();
			$this->firstname = $customer_query->getMeta()->getFirstName();
			$this->lastname = $customer_query->getMeta()->getLastName();
			$this->email = $customer_query->getPrimaryEmail()->getEmail();
			$this->username = $customer_query->getUsername();
			$this->customer_group_id = $customer_query->getGroupUser()->getId();
			$this->slug = $customer_query->getSlug();
			$this->avatar = $customer_query->getAvatar();
			$this->friend_requests = $customer_query->getFriendRequests();
			$this->user = $customer_query;

			// remember
			if ($remember) {
	        	setcookie('yid', $email, time() + 60 * 60 * 24 * 30, '/', $_SERVER['SERVER_NAME']);
	    		setcookie('ypass', $user_password, time() + 60 * 60 * 24 * 30, '/', $_SERVER['SERVER_NAME']);
	        }
			
	  		return true;
    	} else {
      		return false;
    	}
  	}

  	public function loginByToken($email) {
		$customer_query = $this->db->getDm()->getRepository('Document\User\User')->findOneBy( array(
			'status' => true,
			'emails.email' => $email
		));
		
		if ($customer_query) {
			$this->session->data['customer_id'] = $customer_query->getId();
									
			$this->customer_id = $customer_query->getId();
			$this->firstname = $customer_query->getMeta()->getFirstName();
			$this->lastname = $customer_query->getMeta()->getLastName();
			$this->email = $customer_query->getPrimaryEmail()->getEmail();
			$this->username = $customer_query->getUsername();
			$this->customer_group_id = $customer_query->getGroupUser()->getId();
			$this->slug = $customer_query->getSlug();
			$this->avatar = $customer_query->getAvatar();
			$this->friend_list = $customer_query->getFriends();
			$this->friend_requests = $customer_query->getFriendRequests();
			$this->user = $customer_query;
			
	  		return true;
    	} else {
      		return false;
    	}
  	}
  	
	public function logout() {		
		unset($this->session->data['customer_id']);
		unset($this->session->data['customer_slug']);

		$this->customer_id = '';
		$this->firstname = '';
		$this->lastname = '';
		$this->email = '';
		$this->customer_group_id = '';

		// delete cookie
		if ( !empty($this->request->cookie['yid']) ) {
			setcookie('yid', '', time() - 3600, '/', $_SERVER['SERVER_NAME']);
		}
		if ( !empty($this->request->cookie['ypass']) ) {
			setcookie('ypass', '', time() - 3600, '/', $_SERVER['SERVER_NAME']);
		}
  	}
  
  	public function isLogged() {
  		if ($this->customer_id) {
  			return $this->customer_id;
  		}elseif ( isset( $this->request->cookie['yid'] ) && isset( $this->request->cookie['ypass'] ) ) {
  			$this->login( $this->request->cookie['yid'], $this->request->cookie['ypass'], false, false, true );
  		}
  		return $this->customer_id;
  	}

  	public function hasRemember() {
  		
  		return false;
  	}

  	public function getId() {
    	return $this->customer_id;
  	}

  	public function getUsername(){
  		return $this->username;
  	}
      
  	public function getFirstName() {
		return $this->firstname;
  	}
  
  	public function getLastName() {
		return $this->lastname;
  	}
  
  	public function getEmail() {
		return $this->email;
  	}

  	public function getAvatar() {
		return $this->avatar;
  	}

  	public function getCustomerGroupId() {
		return $this->customer_group_id;	
  	}

  	public function getSlug(){
  		return $this->slug;
  	}

  	public function getFriendList(){
  		return $this->friend_list;
  	}

  	public function getFriendRequests(){
  		return $this->friend_requests;
  	}

  	public function getUser(){
  		return $this->user;
  	}
}
?>