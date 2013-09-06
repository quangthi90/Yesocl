<?php
class ModelUserUser extends Doctrine {
	public function getUser( $user_slug ){
		$this->load->model('tool/cache');
		$user_type = $this->config->get('common')['type']['user'];

		$user = $this->model_tool_cache->getObject( $user_slug, $user_type );

		if ( !$user ){
			$user = $this->dm->getRepository('Document\User\User')->findOneBySlug( $user_slug );

			if ( !$user ){
				return null;
			}

			$this->model_tool_cache->setObject( $user, $user_type );

			$user = $user->formatToCache();
		}

		return $user;
	}

	public function getUserFull( $data ){
		if ( !empty($data['user_id']) ){
			return $this->dm->getRepository('Document\User\User')->find( $data['user_id'] );
		}

		if ( !empty($data['user_slug']) ){
			return $this->dm->getRepository('Document\User\User')->findOneBySlug( $data['user_slug'] );
		}

		return null;
	}
}
?>