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
	public function addCustomer($data) {
		$user_config = $this->config->get('user');

		if ( isset( $data['network'] ) && $data['network'] == $user_config['network']['facebook'] ) {
			if ( !isset( $data['email'] ) || !$data['email'] ) {
				return false;
			}

			$user_config = $this->config->get('user');

			$customer_group_info = $this->dm->getRepository('Document\User\Group')->findOneByName( $user_config['default']['group_name']);
			
			$salt = substr(md5(uniqid(rand(), true)), 0, 9);
			$meta = new Meta();
			if ( isset( $data['firstname'] ) ) {
				$meta->setFirstname( $data['firstname'] );
			}
			if ( isset( $data['lastname'] ) ) {
				$meta->setLastname( $data['lastname'] );
			}
			if ( isset( $data['gender'] ) ) {
				$meta->setSex( $data['gender'] );
			}
			if ( isset( $data['location'] ) ) {
				$location = new Location();
				$location->setLocation( trim( $data['location'] ) );
				$location->setCityId( 0 );
				$meta->setLocation( $location );
			}

			$email = new Email();
			$email->setEmail( $data['email'] );
			$email->setPrimary( true );

			$network = $this->dm->getRepository( 'Document\Social\Network' )->findOneBy( array( 'code' => $data['network'] ) );

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
	      	$user->setGroupUser( $customer_group_info );
	      	$user->setSocialNetwork( $network );
			if ( isset( $data['username'] ) ) {
				$user->setUsername( $data['username'] );
			}

	      	$this->dm->persist( $user );
	      	$this->dm->flush();

			if ( isset( $data['avatar'] ) && $data['avatar'] ) {
				$folder_link = $this->config->get('user')['default']['image_link'] . $user->getId();
				$image_path = $folder_link . '/' . $this->config->get('post')['default']['avatar_name'] . '.jpg';

				$path = DIR_IMAGE;	
				$folder_names = explode('/', $folder_link);
				foreach ( $folder_names as $folder_name ) {
					$path .= $folder_name . '/';
					if ( !is_dir( $path ) ) {
						mkdir( $path );
					}
				}

				$ch = curl_init(); 
		        curl_setopt($ch, CURLOPT_URL, $data['avatar']);
		        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
		        $response = curl_exec($ch); 
		        curl_close($ch);

		        $file = $path . '/' . $this->config->get('post')['default']['avatar_name'] . '.jpg';
				file_put_contents($file, $response);
				$user->setAvatar( $image_path );
			}

			$this->dm->flush();

			return true;
		}else {
			$user_config = $this->config->get('user');

			/*if (isset($data['customer_group_id']) && is_array($this->config->get('config_customer_group_display')) && in_array($data['customer_group_id'], $this->config->get('config_customer_group_display'))) {
				$customer_group_id = $data['customer_group_id'];
			} else {
				$customer_group_id = $this->config->get('config_customer_group_id');
			}*/
			
			$customer_group_info = $this->dm->getRepository('Document\User\Group')->findOneByName( $user_config['default']['group_name']);
			
			$salt = substr(md5(uniqid(rand(), true)), 0, 9);
			
			$meta = new Meta();
			if ( isset( $data['firstname'] ) ) {
				$meta->setFirstname( $data['firstname'] );
			}
			if ( isset( $data['lastname'] ) ) {
				$meta->setLastname( $data['lastname'] );
			}
			if ( isset( $data['month'] ) && isset( $data['day'] ) && isset( $data['year'] ) ) {
				$meta->setBirthday( new \Datetime($data['month'] . '/' . $data['day'] . '/' . $data['year']) );
			}
			if ( isset( $data['sex'] ) ) {
				$meta->setSex( $data['sex'] );
			}

			if ( !isset( $data['email'] ) || empty( $data['email'] ) ) {
				return false;
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
	      	$user->setGroupUser( $customer_group_info );
	      	if ( isset( $data['password'] ) ) {
	      		$user->setPassword( sha1($salt . sha1($salt . sha1($data['password']))) );
	      	}

	      	$this->dm->persist( $user );
			$this->dm->flush();
			// $this->language->load('mail/customer');
			
			/*$subject = sprintf($this->language->get('text_subject'), $this->config->get('config_name'));
			
			$message = sprintf($this->language->get('text_welcome'), $this->config->get('config_name')) . "\n\n";
			
			if (!$customer_group_info['approval']) {
				$message .= $this->language->get('text_login') . "\n";
			} else {
				$message .= $this->language->get('text_approval') . "\n";
			}
			
			$message .= $this->url->link('account/login', '', 'SSL') . "\n\n";
			$message .= $this->language->get('text_services') . "\n\n";
			$message .= $this->language->get('text_thanks') . "\n";
			$message .= $this->config->get('config_name');
			
			$mail = new Mail();
			$mail->protocol = $this->config->get('config_mail_protocol');
			$mail->parameter = $this->config->get('config_mail_parameter');
			$mail->hostname = $this->config->get('config_smtp_host');
			$mail->username = $this->config->get('config_smtp_username');
			$mail->password = $this->config->get('config_smtp_password');
			$mail->port = $this->config->get('config_smtp_port');
			$mail->timeout = $this->config->get('config_smtp_timeout');				
			$mail->setTo($data['email']);
			$mail->setFrom($this->config->get('config_email'));
			$mail->setSender($this->config->get('config_name'));
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
			}*/
		}
	}

	public function editPassword($email, $password) {
		$user = $this->dm->getRepository('Document\User\User')->findOneBy(array(
			'emails.email' => $email
		));

		if ( !$user ){
			return false;
		}

		$salt = $user->getSalt();
		$password = sha1($salt . sha1($salt . sha1($password)));
		
		$user->setPassword( $password );

		$this->dm->flush();

		return true;
	}
					
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
		
	public function getTotalCustomersByEmail($email) {
		$query = $this->dm->getRepository('Document\User\User')->findBy(array(
			'emails.email' => $email
		));

		return $query->count();
	}

	public function editAvatar($data) {
		$user = $this->dm->getRepository('Document\User\User')->find( $this->customer->getId() );
		if ( !$user ) {
			return false;
		}

		// Avatar
		$this->load->model('tool/image');
		if ( !empty($data['avatar']) && $this->model_tool_image->isValidImage($data['avatar']) ) {
			$folder_link = $this->config->get('user')['default']['image_link'];
			$avatar_name = $this->config->get('post')['default']['avatar_name'];
			$path = $folder_link . $user->getId();
			if ( $data['avatar'] = $this->model_tool_image->uploadImage($path, $avatar_name, $data['avatar']) ) {
				$user->setAvatar( $data['avatar'] );
			}else {
				return false;
			}
		}else {
			return false;
		}

		// Save to DB
		$this->dm->persist( $user );
		$this->dm->flush();

		$this->load->model('tool/cache');
		$this->model_tool_cache->setObject( $user, $this->config->get('common')['type']['user'] );

		return true;
	}
}
?>