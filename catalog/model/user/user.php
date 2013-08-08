<?php
class ModelUserUser extends Doctrine {
	public function getUser( $user_id ){
		$this->load->model('tool/cache');
		$user_type = $this->config->get('common')['type']['user'];

		$user = $this->model_tool_cache->getObject( $user_id, $user_type );

		if ( !$user ){
			$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

			if ( !$user ){
				return null;
			}

			$this->model_tool_cache->setObject( $user, $user_type );

			$user = $user->formatToCache();
		}

		return $user;
	}
}
?>