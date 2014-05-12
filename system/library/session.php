<?php
class Session {
	public $data = array();
			
  	public function __construct() {		
		if (!session_id()) {
			ini_set('session.use_cookies', 'On');
			ini_set('session.use_trans_sid', 'Off');
			
			session_set_cookie_params(0, '/');
			session_start();
		}
	
		$this->data =& $_SESSION;
	}

	public function setFlash( $key, $value ){
		$this->data[$key] = $value;
	}

	public function hasFlash( $key ){
		if ( !$this->data[$key] ) return false;
		return true;
	}

	public function getFlash( $key ){
		if ( empty($this->data[$key]) ){
			return null;
		}

		$value = $this->data[$key];
		unset( $this->data[$key] );
		return $value;
	}
}
?>