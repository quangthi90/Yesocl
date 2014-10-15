<?php
class ModelToolChat extends Model {
	public function pushMessage( $sChannelName, $sUsername, $sContent, $sEmail ) {
		$oMessage = $oRoom->getMessages()->last();

		$aOptions = $this->sanitiseInput(array(
			'nickname' => substr( htmlspecialchars($sUsername), 0, 30 ),
			'text' => substr( htmlspecialchars($sContent), 0, 300 ),
			'email' => substr( htmlspecialchars($sEmail), 0, 100 )
		));

		$sActivityType = $this->config->get('pusher')['type']['message'];

		$oActivity = new Activity($sActivityType, $aOptions['text'], $aOptions);

		$data = $oActivity->getMessage();
		$response = $this->pusher->trigger($sChannelName, $sActivityType, $data, null, true);

		return true;
	}

	private function sanitiseInput( $aChatInfo, $bGetGravatar = true ) {
	  	$email = isset($aChatInfo['email'])?$aChatInfo['email']:'';
	  	var_dump($aChatInfo);
	  	$aOptions = array();
	  	$aOptions['displayName'] = substr(htmlspecialchars($aChatInfo['nickname']), 0, 30);
	  	$aOptions['text'] = substr(htmlspecialchars($aChatInfo['text']), 0, 300);
	  	$aOptions['email'] = substr(htmlspecialchars($email), 0, 100);
	  	$aOptions['get_gravatar'] = $bGetGravatar;
	  	return $aOptions;
	}
}

class Activity {
  	private $display_name = '<em>Anon</em>';
  	private $image = null;
  	private $action_text = null;
  	private $date = null;
  	private $id;
  	private $type;
  
  	public function __construct($activity_type, $action_text, $options = array()) {
	    $options = $this->set_default_options($options);
	      
	    date_default_timezone_set('UTC');
	    
	    $this->type = $activity_type;
	    $this->id = uniqid();
	    $this->date = date('r');
	    
	    $this->action_text = $action_text;
	    $this->display_name = $options['displayName'];
	    $this->image = $options['image'];
    
	    if( $options['get_gravatar'] && $options['email'] ) {
	      	$this->image['url'] = $this->get_gravatar($options['email']);
	      
	      	if( is_null($this->display_name) ) {
		        $profile = $this->get_gravatar_profile($options['email']);
		        if( isset($profile['displayName']) ) {
		          $this->display_name = $profile['displayName'];
		        }
	      	}
	    }
    }
  
  	public function getMessage() {
	    $activity = array(
	      	'id' => $this->id,
	      	'body' => $this->action_text,
	      	'published' => $this->date,
	      	'type' => $this->type,
	      	'actor' => array(
		        'displayName' => $this->display_name,
		        'objectType' => 'person',
		        'image' => $this->image
	      	)
	    );
	    return $activity;
  	}
  
  	private function set_default_options($options) {
	    $defaults = array(
	    	'email' => null,
	    	'displayName' => null,
	    	'image' => array(
	    		'url' => 'http://www.gravatar.com/avatar?d=wavatar&s=48',
	    		'width' => 48,
	    		'height' => 48
	    	)
	    );
	    foreach ($defaults as $key => $value) {
	      	if( isset($options[$key]) == false ) {
	        	$options[$key] = $value;
	      	}
	    }
    
    	return $options;
  	}

}
?>