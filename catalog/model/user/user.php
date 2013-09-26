<?php
class ModelUserUser extends Model {
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

	public function searchUserByKeyword( $data = array() ) {
		if ( !isset( $data['filter'] ) || empty( $data['filter'] ) ) {
			return array();
		}

		$query = $this->client->createSelect(
    		array(
				'mappedDocument' => 'Document\User\User',
				)
    	);
 
		$query_data = 'solrEmail_t:*' . $data['filter'] . '* OR ';
		$query_data .= 'solrFullname_t:*' . $data['filter'] . '* OR ';
		$query_data .= 'username_t:*' . $data['filter'] . '* ';

		if ( isset( $data['start'] ) ) {
			$data['start'] = (int)$data['start'];
		}else {
			$data['start'] = 0;
		}

		if ( isset( $data['limit'] ) ) {
			$data['limit'] = (int)$data['limit'];
		}else {
			$data['limit'] = 10;
		}

		$query->setQuery( $query_data );
		$query->setRows( $data['limit'] );
		$query->setStart( $data['start'] );
 
		return $this->client->execute( $query );
	}
}
?>