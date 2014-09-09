<?php
use Document\User\User,
	Document\User\Meta,
	Document\User\Meta\Email,
	Document\User\Meta\Education,
	Document\User\Meta\Experience,
	Document\User\Meta\Location,
	Document\User\Meta\Phone,
	Document\User\Meta\Skill;

class ModelAccountCustomer extends Model {
	public function getCustomer($user_id) {
		$this->load->model('tool/cache');
		$user = $this->model_tool_cache->getUser($user_id);

		if ( !$user ){
			$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

			if ( !$user ){
				return null;
			}

			$user = $this->model_tool_cache->setUser( $user );
		}

		return $user;
	}
	
	public function getCustomerByEmail($email) {
		$query = $this->dm->getRepository('Document\User\User')->findOneBy( array(
			'status' => true,
			'emails.email' => $email
		));

		return $query;
	}
}
?>