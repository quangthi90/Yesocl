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
	
  	public function __construct($registry) {
		$this->config = $registry->get('config');
		$this->db = $registry->get('db');
		$this->request = $registry->get('request');
		$this->session = $registry->get('session');
		$this->facebook = $registry->get('facebook');
		$this->url = $registry->get('url');
		//var_dump($this->session->data['customer_id']); exit;		
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
			
				// $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer_ip WHERE customer_id = '" . (int)$this->session->data['customer_id'] . "' AND ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "'");
				
				// if (!$query->num_rows) {
				// 	$this->db->query("INSERT INTO " . DB_PREFIX . "customer_ip SET customer_id = '" . (int)$this->session->data['customer_id'] . "', ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "', date_added = NOW()");
				// }
			} else {
				$this->logout();
			}
  		}
	}
		
  	public function login($email, $password, $override = false, $remember = false) {
		if ($override) {
			$customer_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer where LOWER(email) = '" . $this->db->escape(strtolower($email)) . "' AND status = '1'");
		} else {
			$customer_query = $this->db->getDm()->getRepository('Document\User\User')->findOneBy( array(
				'status' => true,
				'emails.email' => $email
			));
		}
		
		if ($customer_query) {
			$salt = $customer_query->getSalt();
	    	$user_password = sha1($salt . sha1($salt . sha1($password)));
	    	
	    	if ( $user_password != $customer_query->getPassword() ){
	    		return false;
	    	}

			$this->session->data['customer_id'] = $customer_query->getId();
									
			$this->customer_id = $customer_query->getId();
			$this->firstname = $customer_query->getMeta()->getFirstName();
			$this->lastname = $customer_query->getMeta()->getLastName();
			$this->email = $customer_query->getPrimaryEmail()->getEmail();
			$this->customer_group_id = $customer_query->getGroupUser()->getId();

			// remember
			if ($remember) {
				//setcookie('yid', $email, time() + 60 * 60 * 24 * 30, '/', $this->$request->server['HTTP_HOST']);
	    		//setcookie('ypass', $password, time() + 60 * 60 * 24 * 30, '/', $this->$request->server['HTTP_HOST']);
	        	setcookie('yid', $email, time() + 60 * 60 * 24 * 30);
	    		setcookie('ypass', $password, time() + 60 * 60 * 24 * 30);
	        }

			// $this->db->query("UPDATE " . DB_PREFIX . "customer SET ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "' WHERE customer_id = '" . (int)$this->customer_id . "'");
			
	  		return true;
    	} else {
      		return false;
    	}
  	}
  	
	public function logout() {		
		unset($this->session->data['customer_id']);

		$this->customer_id = '';
		$this->firstname = '';
		$this->lastname = '';
		$this->email = '';
		$this->customer_group_id = '';

		// delete cookie
		//setcookie('yid', '', time() - 3600, '/', $this->request->server['HTTP_HOST']);
	    //setcookie('ypass', '', time() - 3600, '/', $this->request->server['HTTP_HOST']);
		setcookie('yid', '', time() - 3600);
	    setcookie('ypass', '', time() - 3600);
  	}
  
  	public function isLogged() {
    	return $this->customer_id;
  	}

  	public function hasRemember() {
  		if ( isset( $this->request->cookie['yid'] ) && isset( $this->request->cookie['ypass'] ) && $this->login( $this->request->cookie['yid'], $this->request->cookie['ypass'] ) ) {
  			return true;
  		}else {
  			return false;
  		}
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
	
  	public function getBalance() {
		$query = $this->db->query("SELECT SUM(amount) AS total FROM " . DB_PREFIX . "customer_transaction WHERE customer_id = '" . (int)$this->customer_id . "'");
	
		return $query->row['total'];
  	}	
		
  	public function getRewardPoints() {
		$query = $this->db->query("SELECT SUM(points) AS total FROM " . DB_PREFIX . "customer_reward WHERE customer_id = '" . (int)$this->customer_id . "'");
	
		return $query->row['total'];	
  	}	

  	// facebook connect
  	public function facebookConnect() {
  		if ( $this->facebook->getUser() ) {
  			// kiem tra co tai khoan tuong ung hay chua
  			// $customer_data = $this->facebook->api('/me');
  			// $email = $customer_data['email'];
  			$email = ''
  			$customer = $this->db->getDm()->getRepository('Document\User\User')->findOneBy( array(
				'status' => true,
				'emails.email' => $email
			));
			if ( $customer->getId() && !empty( $customer ) ) {
  			// neu co thi nap vao session
				$this->session->data['customer_id'] = $customer->getId();
										
				$this->customer_id = $customer->getId();
				$this->firstname = $customer->getMeta()->getFirstName();
				$this->lastname = $customer->getMeta()->getLastName();
				$this->email = $customer->getPrimaryEmail()->getEmail();
				$this->customer_group_id = $customer->getGroupUser()->getId();
			}else {
  			// neu chua thi tao moi
  				$this->session->data['redirect'] = $this->request->get['route'];
				header( 'Location: ' . $this->url->link( 'account/login/facebookConnect' ) );
				exit;
			}
  		}else {
  			return false;
  		}

  		return true;
  	}
}
?>