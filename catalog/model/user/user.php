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
		
		$this->load->model('tool/image');

		if ( !empty($user['avatar']) ){
			$user['avatar'] = $this->model_tool_image->resize( $user['avatar'], 180, 180 );
		}elseif ( !empty($user['email']) ){
            $user['avatar'] = $this->model_tool_image->getGavatar( $user['email'], 180 );
        }else{
        	$user['avatar'] = $this->model_tool_image->resize( 'no_user_avatar.png', 180, 180 );
		}

		return $user;
	}

	public function getUserFull( $data = array() ){
		if ( !empty($data['user_id']) ){
			return $this->dm->getRepository('Document\User\User')->find( $data['user_id'] );
		}

		if ( !empty($data['user_slug']) ){
			return $this->dm->getRepository('Document\User\User')->findOneBySlug( $data['user_slug'] );
		}

		return null;
	}

	public function getUsers( $data = array() ){
		if ( !empty($data['user_ids']) ){
			return $this->dm->getRepository('Document\User\User')->findBy(array(
				'id' => array('$in' => $data['user_ids'])
			));
		}

		return null;
	}
}
?>