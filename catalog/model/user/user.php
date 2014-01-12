<?php
use Document\Friend\Friend,
	Document\User\Notification;
use Document\User\User,
	Document\User\Meta,
	Document\User\Meta\Email,
	Document\User\Meta\Education,
	Document\User\Meta\Experience,
	Document\User\Meta\Location,
	Document\User\Meta\Phone,
	Document\User\Meta\Skill;

class ModelUserUser extends Model {
	public function addUser($data, $isSocial = false) {
		if ( empty( $data['email'] ) ) {
			return false;
		}

		$user_config = $this->config->get('user');
		
		$user_group_info = $this->dm->getRepository('Document\User\Group')->findOneByName( $user_config['default']['group_name']);
		
		$salt = substr(md5(uniqid(rand(), true)), 0, 9);
		
		$meta = new Meta();
		if ( !empty( $data['firstname'] ) ) {
			$meta->setFirstname( $data['firstname'] );
		}
		if ( !empty( $data['lastname'] ) ) {
			$meta->setLastname( $data['lastname'] );
		}
		if ( !empty( $data['month'] ) && !empty( $data['day'] ) && !empty( $data['year'] ) ) {
			$meta->setBirthday( new \Datetime($data['month'] . '/' . $data['day'] . '/' . $data['year']) );
		}
		if ( !empty( $data['sex'] ) ) {
			$meta->setSex( $data['sex'] );
		}

		if ( !empty($data['location']) ){
			$location = new Location();
			$location->setLocation( $data['location'] );
			$meta->setLocation( $location );
		}
		
		$email = new Email();
		$email->setEmail( $data['email'] );
		$email->setPrimary( true );

		// Slug
		$slug = $this->url->create_slug( $data['firstname'] . ' ' . $data['lastname'] );
		
		$users = $this->dm->getRepository( 'Document\User\User' )->findBySlug( new MongoRegex("/^$slug/i") );

		$arr_slugs = array_map(function($user){
			return $user->getSlug();
		}, $users->toArray());

		$this->load->model( 'tool/slug' );
		$slug = $this->model_tool_slug->getSlug( $slug, $arr_slugs );

      	$user = new User();
      	$user->setSlug( $slug );
      	$user->setMeta( $meta );
      	$user->addEmail( $email );
      	$user->setSalt( $salt );
      	$user->setStatus( true );
      	$user->setGroupUser( $user_group_info );
      	if ( !$isSocial ) {
      		$user->setPassword( sha1($salt . sha1($salt . sha1($data['password']))) );
      	}
      	$user->setIsSocial( $isSocial );

      	$this->dm->persist( $user );
		$this->dm->flush();

		if ( !empty($data['avatar']) ){
      		$this->load->model('tool/image');
			$folder_link = $this->config->get('user')['default']['image_link'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $user->getId() . '/' . $avatar_name . '.jpg';
			
			$this->model_tool_image->moveFile( $data['avatar'], DIR_IMAGE . $path );
			$user->setAvatar( $path );
		}

		$token = md5( time() );
		$user->setToken( $token );

		$this->dm->flush();
		$this->language->load('mail/user');

		$subject = sprintf($this->language->get('text_subject'), $this->config->get('config_name'));		
		$message = sprintf($this->language->get('text_welcome'), $this->config->get('config_name')) . "\n\n";
		$message .= $this->language->get('text_approval') . "\n" ;
		$message .= $this->extension->path('ActiveAccount', array('token' => $token)) . "\n\n";
		$message .= $this->language->get('text_services') . "\n\n";
		$message .= $this->language->get('text_thanks') . "\n";
		$message .= $this->config->get('config_name');
		
		$mail = new Mail();
		$mail->protocol = $this->config->get('email')['protocol'];
		// $mail->parameter = $this->config->get('config_mail_parameter');
		$mail->hostname = $this->config->get('email')['hostname'];
		$mail->username = $this->config->get('email')['username'];
		$mail->password = $this->config->get('email')['password'];
		$mail->port = $this->config->get('email')['port'];
		// $mail->timeout = $this->config->get('config_smtp_timeout');				
		$mail->setTo($this->request->post['email']);
		$mail->setFrom('admin@yesocl.com');
		$mail->setSender('Admin Yesocl');
		$mail->setSubject(html_entity_decode($subject, ENT_QUOTES, 'UTF-8'));
		$mail->setText(html_entity_decode($message, ENT_QUOTES, 'UTF-8'));
		$mail->send();
		
		// Send to main admin email if new account email is enabled
		if ($this->config->get('config_account_mail')) {
			$mail->setTo($this->config->get('config_email'));
			$mail->send();
			
			// Send to additional alert emails if new account email is enabled
			$emails = explode(',', $this->config->get('config_alert_emails'));
			
			foreach ($emails as $email) {
				if (strlen($email) > 0 && preg_match('/^[^\@]+@.*\.[a-z]{2,6}$/i', $email)) {
					$mail->setTo($email);
					$mail->send();
				}
			}
		}

		return $user;
	}

	public function editUser( $user_slug, $data = array() ){
		$user = $this->dm->getRepository('Document\User\User')->findOneBySlug( $user_slug );

		if ( !$user ){
			return false;
		}

		if ( !empty($data['request_friend']) ){
			$requests = $user->getFriendRequests();

			$key = array_search( $data['request_friend'], $requests );

			if ( !$requests || $key === false ){
				$user->addFriendRequest( $data['request_friend'] );
			}else{
				unset($requests[$key]);
				$user->setFriendRequests( $requests );
			}
		}

		if ( !empty($data['friend']) ){
			$friend = new Friend();
			$friend->setUser( $data['friend'] );
			$this->dm->persist( $friend );
			// var_dump($friend->getCreated()); exit;
			$user->addFriend( $friend );
		}

		if ( !empty($data['unfriend']) ){
			$user->getFriends()->removeElement( $user->getFriendById( $data['unfriend'] ) );
			$user2 = $this->dm->getRepository('Document\User\User')->find( $data['unfriend'] );
			$user2->getFriends()->removeElement( $user2->getFriendBySlug( $user_slug ) );
		}

		if ( !empty($data['avatar']) && !empty($data['avatar']['image_link']) && !empty($data['avatar']['extension']) && is_file($data['avatar']['image_link']) ){
			$this->load->model('tool/image');

			$folder_link = $this->config->get('user')['default']['image_link'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $user->getId() . '/' . $avatar_name . '.' . $data['avatar']['extension'];
			$dest = DIR_IMAGE . $path;
			exit;
			if ( $this->model_tool_image->moveFile($data['avatar']['image_link'], $dest) ){
				$image = new Image( $dest );
				$image->crop( $data['avatar']['x'], $data['avatar']['y'], $data['avatar']['x'] + $data['avatar']['width'], $data['avatar']['y'] + $data['avatar']['width'] );
				$image->save( $dest );
				$user->setAvatar( $path );
			}
		}

		$this->dm->flush();

		return true;
	}

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

		if ( !empty($data['email']) ){
			return $this->dm->getRepository('Document\User\User')->findOneBy( array(
				'emails.email' => $data['email']
			));
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

	public function isExistEmail( $email, $user_id = '' ) {
		$users = $this->dm->getRepository( 'Document\User\User' )->findBy( array( 'emails.email' => $email ) );
		
		foreach ( $users as $user ) {
			if ( $user->getId() == $user_id ){
				continue;
			}else {
				return true;
			}
		}
		
		return false;
	}

	public function editPassword($email, $password) {
		$user = $this->dm->getRepository('Document\User\User')->findOneBy(array(
			'emails.email' => $email
		));

		if ( !$user || $user->getIsSocial() == true ){
			return null;
		}

		$salt = $user->getSalt();
		$passwordInput = substr(md5(mt_rand()), 0, 10);
		$password = sha1($salt . sha1($salt . sha1($passwordInput)));
		
		$user->setForgotten( $password );

		$this->dm->flush();

		return $passwordInput;
	}

	public function getTotalCustomersByEmail($email) {
		$query = $this->dm->getRepository('Document\User\User')->findBy(array(
			'emails.email' => $email
		));

		return $query->count();
	}

	public function active( $token ){
		$user = $this->dm->getRepository('Document\User\User')->findOneBy(array(
			'token' => $token
		));

		if ( !$user ){
			return null;
		}

		$user->setToken('');

		$this->dm->flush();

		return $user;
	}
}
?>