<?php
class ModelToolChat extends Model {
	public function pushMessage( $aChannelNames, $sActivityType, $aOptions = array() ) {		
		foreach ( $aChannelNames as $sChannelName ) {
			$result = $this->pusher->trigger($sChannelName, $sActivityType, $aOptions, null, true);			
		}

		return true;
	}
}
?>