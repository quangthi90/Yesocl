<?php
use Document\User\User,
	Document\User\Meta,
	Document\User\Meta\Email,
	Document\User\Meta\Location,
	Document\User\Meta\Phone,
	Document\User\Meta\Skill,
	Document\User\Meta\Background;

class ModelUserMeta extends Model {
	public function updateInformation( $user_id, $data = array() ) {
		$this->load->model('user/user');
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ) {
			return false;
		}

		if ((strlen($data['username']) < 5) || (strlen($data['username']) > 32)) {
			return false;
		}else{
			$data['username'] = trim( $data['username'] );
		}

		if ((utf8_strlen($data['firstname']) < 1) || (utf8_strlen($data['firstname']) > 32)) {
			return false;
		}else {
			$data['firstname'] = trim( $data['firstname'] );
		}

		if ((utf8_strlen($data['lastname']) < 1) || (utf8_strlen($data['lastname']) > 32)) {
			return false;
		}else {
			$data['lastname'] = trim( $data['lastname'] );
		}

		// phone
		$phones_data = array();
		if ( !empty( $data['phones'] ) && is_array( $data['phones'] ) ) {
			foreach ($data['phones'] as $phone_data) {
				if ( (strlen( $phone_data['phone'] ) < 6) || (strlen( $phone_data['phone'] ) > 20) ) {
					continue;
				}
				if ( !preg_match('/^[0-9]+$/', $phone_data['phone']) ) {
					continue;
				}
				if ( empty($phone_data['type']) ) {
					continue;
				}
				// if ( empty($phone_data['visible']) ) {
				// 	continue;
				// }
				$phone = new Phone();
				$phone->setPhone( $phone_data['phone'] );
				$phone->setType( $phone_data['type'] );
				$phones_data[$phone_data['phone']] = $phone;
			}
		}

		// Email is required
		if ( !isset($data['emails']) || !is_array( $data['emails']) ){
			return false;
		}elseif ( count( $data['emails'] ) < 1 ) {
			return false;
		}

		// Primary email is required
		$primary_email = '';
		foreach ( $data['emails'] as $email_data ){
			if ( $email_data['primary'] ){
				$primary_email = strtolower( trim( $email_data['email'] ) );
				break;
			}
		}

		if ( $primary_email == '') {
			return false;
		}

		// Get list email 
		$emails_data = array();
		$email = new Email();
		$email->setEmail( $primary_email );
		$email->setPrimary( true );
		$emails_data[] = $email;

		foreach ( $data['emails'] as $email_data ){
			$email_data['email'] = strtolower( trim( $email_data['email'] ) );
			if ( $email_data['email'] === $primary_email ){
				continue;
			}elseif ( (utf8_strlen($email_data['email']) < 6) || (utf8_strlen($email_data['email']) > 96)) {
				continue;
	    	}elseif ( !preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $email_data['email']) ) {
	    		continue;
	    	}elseif ( $this->model_user_user->isExistEmail( $email_data['email'], $user->getId() ) ){
	    		continue;
	    	}
			$email = new Email();
			$email->setEmail( strtolower( trim( $email_data['email'] ) ) );
			$email->setPrimary( false );
			$emails_data[$email_data['email']] = $email;
		}

		if ( !isset( $data['sex'] ) || !is_string( $data['sex'] ) ) {
			$data['sex'] = 1;
		}else {
			$data['sex'] = (int) $data['sex'];
		}

		if ( !isset($data['birthday']) || !is_string( $data['birthday'] ) ) {
			return false;
		}elseif ( !\Datetime::createFromFormat('d/m/Y', $data['birthday']) ) {
			return false;
		}elseif ( \Datetime::createFromFormat('d/m/Y', $data['birthday']) > new Datetime() ) {
			return false;
		}

		if ( (utf8_strlen($data['address']) < 1) || (utf8_strlen($data['address']) > 255) ) {
			return false;
		}else {
			$data['address'] = trim( $data['address'] );
		}

		if ((utf8_strlen($data['location']) < 1) || (utf8_strlen($data['location']) > 255)) {
			return false;
		}else {
			$data['location'] = trim( $data['location'] );
		}

		if ( strlen( $data['cityid'] ) < 1 ) {
			$data['cityid'] = '';
		}else {
			$data['cityid'] = trim( strtolower( $data['cityid'] ) );
		}

		$location = new Location();
		$location->setLocation( $data['location'] );
		$location->setCityId( $data['cityid'] );

		if ( (utf8_strlen($data['industry']) < 1) || utf8_strlen($data['industry']) > 64 ) {
			return false;
		}else {
			$data['industry'] = trim( $data['industry'] );
		}

		if ( (utf8_strlen($data['industryid']) < 1) ) {
			$data['industryid'] = '';
		}else {
			$data['industryid'] = trim( strtolower( $data['industryid'] ) );
		}

		$user->setUsername( $data['username'] );
		$user->getMeta()->setFirstname( $data['firstname'] );
		$user->getMeta()->setLastname( $data['lastname'] );
		$user->setEmails( $emails_data );
		$user->getMeta()->setPhones( $phones_data );
		$user->getMeta()->setSex( (int) $data['sex'] );
		$user->getMeta()->setBirthday( \Datetime::createFromFormat( 'd/m/Y', $data['birthday'] ) );
		$user->getMeta()->setAddress( $data['address'] );
		$user->getMeta()->setLocation( $location );
		$user->getMeta()->setIndustry( $data['industry'] );
		$user->getMeta()->setIndustryId( $data['industryid'] );

		$this->dm->flush();

		return $user;
	}

	public function updateSummary( $user_id, $data = array() ) {
		$user = $this->dm->getRepository('Document\User\User')->find( $user_id );

		if ( !$user ) {
			return false;
		}

		if ( empty($data['summary']) ) {
			return false;
		}

		if ( !$user->getMeta()->getBackground() ){
			$background = new Background();
			$background->setSumary( $data['summary'] );
		}else{
			$user->getMeta()->getBackground()->setSumary( $data['summary'] );
		}
		
		$this->dm->flush();

		return true;
	}
}
?>