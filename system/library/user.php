<?php
class User {
	private $user_id;
	private $username;
  	private $permission = array();

  	public function __construct($registry) {
		$this->db = $registry->get('db');
		$this->request = $registry->get('request');
		$this->session = $registry->get('session');
		
    	if (isset($this->session->data['user_id'])) {
			$user_query = $this->db->getDm()->getRepository( 'Document\Admin\Admin' )->findOneBy( array(
				'id' => $this->session->data['user_id'],
				'status' => true
			));
			
			if (!$user_query) {
				$this->logout();
			} else {
				$this->user_id = $user_query->getId();
				$this->username = $user_query->getUsername();
				
      			// $this->db->query("UPDATE " . DB_PREFIX . "user SET ip = '" . $this->db->escape($this->request->server['REMOTE_ADDR']) . "' WHERE user_id = '" . (int)$this->session->data['user_id'] . "'");

      			$user_group_query = $user_query->getGroup();
				
	  			$permissions = $user_group_query->getPermissions();

  				foreach ($permissions as $permission) {
  					$path = $permission->getLayout()->getPath();
    				$this->permission[$path] = array();

    				foreach ($permission->getActions() as $action) {
    					$code = $action->getCode();
    					$this->permission[$path][$code] = true;
    				}
  				}
			}
    	}
  	}
		
  	public function login($username, $password) {
  		$user_query = $this->db->getDm()->getRepository( 'Document\Admin\Admin' )->findOneBy( array(
			'username' => $username,
			'status' => true
		));

    	if (!$user_query) {
    		return false;
    	}

    	$salt = $user_query->getSalt();
    	$user_password = sha1($salt . sha1($salt . sha1($password)));
    	
    	if ( $user_password != $user_query->getPassword() ){
    		return false;
    	}

    	$this->session->data['user_id'] = $user_query->getId();
			
		$this->user_id = $user_query->getId();
		// print($this->user_id); exit;
		$this->username = $user_query->getUsername();			

  		$user_group_query = $user_query->getGroup();
				
		$permissions = $user_group_query->getPermissions();

		foreach ($permissions as $permission) {
			$path = $permission->getLayout()->getPath();
			$this->permission[$path] = array();

			foreach ($permission->getActions() as $action) {
				$code = $action->getCode();
				$this->permission[$path][$code] = true;
			}
		}
	
  		return true;
  	}

  	public function logout() {
		unset($this->session->data['user_id']);
	
		$this->user_id = '';
		$this->username = '';
		
		session_destroy();
  	}

  	public function hasPermission($layout_path, $action_code) {
    	if (isset($this->permission[$layout_path][$action_code])) {
	  		return $this->permission[$layout_path][$action_code];
		} else {
	  		return false;
		}
  	}
  
  	public function isLogged() {
    	return $this->user_id;
  	}
  
  	public function getId() {
    	return $this->user_id;
  	}
	
  	public function getUserName() {
    	return $this->username;
  	}	
}
?>