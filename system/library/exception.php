<?php
class CustomException extends Exception {
	private $message;
	private $code;
	private $is_service;

	public function __construct($message, $code=0, $is_service = false) {
        parent::__construct($message,$code); 
    }    

    public function __toString() {
        return "<b style='color:red'>".$this->message."</b>"; 
    } 
}
?>