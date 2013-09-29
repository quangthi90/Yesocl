<?php
use Document\User\User,
	Document\User\Meta,
	Document\User\Meta\Email,
	Document\User\Meta\Education;

class ModelAccountCustomer extends Model {
	public function addCustomer($data) {
		$user_config = $this->config->get('user');

		/*if (isset($data['customer_group_id']) && is_array($this->config->get('config_customer_group_display')) && in_array($data['customer_group_id'], $this->config->get('config_customer_group_display'))) {
			$customer_group_id = $data['customer_group_id'];
		} else {
			$customer_group_id = $this->config->get('config_customer_group_id');
		}*/
		
		$customer_group_info = $this->dm->getRepository('Document\User\Group')->findOneByName( $user_config['default']['group_name']);
		
		$salt = substr(md5(uniqid(rand(), true)), 0, 9);
		
		$meta = new Meta();
		$meta->setFirstname( $data['firstname'] );
		$meta->setLastname( $data['lastname'] );
		$meta->setBirthday( new \Datetime($data['month'] . '/' . $data['day'] . '/' . $data['year']) );
		$meta->setSex( $data['sex'] );

		$email = new Email();
		$email->setEmail( $data['email'] );
		$email->setPrimary( true );

		// Slug
		$slug = $this->url->create_slug( 'user temp' );
		
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
      	$user->setPassword( sha1($salt . sha1($salt . sha1($data['password']))) );

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
	
	public function editCustomer($data) {
		$this->db->query("UPDATE " . DB_PREFIX . "customer SET firstname = '" . $this->db->escape($data['firstname']) . "', lastname = '" . $this->db->escape($data['lastname']) . "', email = '" . $this->db->escape($data['email']) . "', telephone = '" . $this->db->escape($data['telephone']) . "', fax = '" . $this->db->escape($data['fax']) . "' WHERE customer_id = '" . (int)$this->customer->getId() . "'");
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

	public function editNewsletter($newsletter) {
		$this->db->query("UPDATE " . DB_PREFIX . "customer SET newsletter = '" . (int)$newsletter . "' WHERE customer_id = '" . (int)$this->customer->getId() . "'");
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
		$query = $this->db->getDm()->getRepository('Document\User\User')->findOneBy( array(
			'status' => true,
			'emails.email' => $email
		));

		return $query;
	}
		
	public function getCustomerByToken($token) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "customer WHERE token = '" . $this->db->escape($token) . "' AND token != ''");
		
		$this->db->query("UPDATE " . DB_PREFIX . "customer SET token = ''");
		
		return $query->row;
	}
		
	public function getCustomers($data = array()) {
		$sql = "SELECT *, CONCAT(c.firstname, ' ', c.lastname) AS name, cg.name AS customer_group FROM " . DB_PREFIX . "customer c LEFT JOIN " . DB_PREFIX . "customer_group cg ON (c.customer_group_id = cg.customer_group_id) ";

		$implode = array();
		
		if (isset($data['filter_name']) && !is_null($data['filter_name'])) {
			$implode[] = "LCASE(CONCAT(c.firstname, ' ', c.lastname)) LIKE '" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
		}
		
		if (isset($data['filter_email']) && !is_null($data['filter_email'])) {
			$implode[] = "c.email = '" . $this->db->escape($data['filter_email']) . "'";
		}
		
		if (isset($data['filter_customer_group_id']) && !is_null($data['filter_customer_group_id'])) {
			$implode[] = "cg.customer_group_id = '" . $this->db->escape($data['filter_customer_group_id']) . "'";
		}	
		
		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$implode[] = "c.status = '" . (int)$data['filter_status'] . "'";
		}	
		
		if (isset($data['filter_approved']) && !is_null($data['filter_approved'])) {
			$implode[] = "c.approved = '" . (int)$data['filter_approved'] . "'";
		}	
			
		if (isset($data['filter_ip']) && !is_null($data['filter_ip'])) {
			$implode[] = "c.customer_id IN (SELECT customer_id FROM " . DB_PREFIX . "customer_ip WHERE ip = '" . $this->db->escape($data['filter_ip']) . "')";
		}	
				
		if (isset($data['filter_date_added']) && !is_null($data['filter_date_added'])) {
			$implode[] = "DATE(c.date_added) = DATE('" . $this->db->escape($data['filter_date_added']) . "')";
		}
		
		if ($implode) {
			$sql .= " WHERE " . implode(" AND ", $implode);
		}
		
		$sort_data = array(
			'name',
			'c.email',
			'customer_group',
			'c.status',
			'c.ip',
			'c.date_added'
		);	
			
		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY name";	
		}
			
		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " DESC";
		} else {
			$sql .= " ASC";
		}
		
		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}			

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}	
			
			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}		
		
		$query = $this->db->query($sql);
		
		return $query->rows;	
	}
		
	public function getTotalCustomersByEmail($email) {
		$query = $this->dm->getRepository('Document\User\User')->findBy(array(
			'emails.email' => $email
		));

		return $query->count();
	}
	
	public function getIps($customer_id) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_ip` WHERE customer_id = '" . (int)$customer_id . "'");
		
		return $query->rows;
	}	
	
	public function isBlacklisted($ip) {
		$query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "customer_ip_blacklist` WHERE ip = '" . $this->db->escape($ip) . "'");
		
		return $query->num_rows;
	}	

	public function updateBackground( $data = array() ) {
		if ( $this->customer->isLogged() ) {
			$customer = $this->dm->getRepository('Document\User\User')->find( $this->customer->getId() );

			if ( !$customer ) {
				return false;
			}

			if ( isset( $data['sumary'] ) && !empty( $data['sumary'] ) ) {
				$customer->getMeta()->getBackground()->setSumary( $data['sumary'] );
			}
		}else {
			return false;
		}

		$this->dm->flush();

		return true;
	}

	public function addEducation( $data = array() ) {
		if ( $this->customer->isLogged() ) {
			$customer = $this->dm->getRepository('Document\User\User')->find( $this->customer->getId() );

			if ( !$customer ) {
				return false;
			}

			if ( !isset( $data['started'] ) ) {
				return false;
			}

			if ( !isset( $data['ended'] ) ) {
				return false;
			}

			if ( !isset( $data['degree'] ) || empty( $data['degree'] ) ) {
				return false;
			}

			if ( !isset( $data['school'] ) || empty( $data['school'] ) ) {
				return false;
			}

			if ( !isset( $data['fieldofstudy'] ) || empty( $data['fieldofstudy'] ) ) {
				return false;
			}

			$education = new Education();
			$education->setStarted( (int) $data['started'] );
			$education->setEnded( (int) $data['ended'] );
			$education->setDegree( $data['degree'] );
			$education->setSchool( $data['school'] );
			$education->setFieldOfStudy( $data['fieldofstudy'] );

			$this->dm->persist( $education );
			$customer->getMeta()->getBackground()->addEducation( $education );

			$this->dm->flush();

			return $education->getId();
		}else {
			return false;
		}
	}

	public function removeEducation( $data = array() ) {
		if ( $this->customer->isLogged() ) {
			$customer = $this->dm->getRepository('Document\User\User')->find( $this->customer->getId() );

			if ( !$customer ) {
				return false;
			}

			if ( !isset( $data['id'] ) || empty( $data['id'] ) ) {
				return false;
			}

			foreach ($customer->getMeta()->getBackground()->getEducations() as $education) {
				if ( $education->getId() == $data['id'] ) {
					$customer->getMeta()->getBackground()->getEducations()->removeElement( $education );
				}
			}
		}else {
			return false;
		}

		$this->dm->flush();

		return true;
	}

	public function editEducation( $data = array() ) {
		if ( $this->customer->isLogged() ) {
			$customer = $this->dm->getRepository('Document\User\User')->find( $this->customer->getId() );

			if ( !$customer ) {
				return false;
			}

			if ( !isset( $data['id'] ) ) {
				return false;
			}

			if ( !isset( $data['started'] ) ) {
				return false;
			}

			if ( !isset( $data['ended'] ) ) {
				return false;
			}

			if ( !isset( $data['degree'] ) || empty( $data['degree'] ) ) {
				return false;
			}

			if ( !isset( $data['school'] ) || empty( $data['school'] ) ) {
				return false;
			}

			if ( !isset( $data['fieldofstudy'] ) || empty( $data['fieldofstudy'] ) ) {
				return false;
			}

			foreach ( $customer->getMeta()->getBackground()->getEducations() as $education ) {
				if ( $education->getId() == $data['id'] ) {
					$education->setStarted( (int) $data['started'] );
					$education->setEnded( (int) $data['ended'] );
					$education->setDegree( $data['degree'] );
					$education->setSchool( $data['school'] );
					$education->setFieldOfStudy( $data['fieldofstudy'] );
					break;
				}
			}

			$this->dm->flush();

			return $education->getId();
		}else {
			return false;
		}
	}
}
?>