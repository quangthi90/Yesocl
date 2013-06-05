<?php
use Document\User\User;
use Document\User\Meta;
use Document\User\Meta\Email;
use Document\User\Meta\Background;
use Document\User\Meta\Location;
use Document\User\Meta\Im;
use Document\User\Meta\Phone;
use Document\User\Meta\Website;
use Document\User\Meta\Education;
use Document\User\Meta\Experience;
use Document\User\Meta\Former;

class ModelUserUser extends Doctrine {
	/**
	 * Create new User
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	array Data{
	 * 		string Email
	 * 		string Password
	 * 		int Group ID
	 * 		string Firstname
	 * 		string Lastname
	 * 	}
	 * @return: boolean
	 */
	public function addUser( $data = array() ) {
		// Username
		if ( !isset($data['user']['username']) ){
			$data['user']['username'] = '';
		}

		// Email is required
		if ( !isset($data['user']['emails']) || count($data['user']['emails']) < 0 ){
			return false;
		}

		// Password is required
		if ( !isset($data['user']['password']) || empty($data['user']['password']) ){
			return false;
		}

		// Group is required
		if ( !isset($data['user']['group']) ){
			return false;
		}

		$group = $this->dm->getRepository('Document\User\Group')->find( $data['user']['group'] );
		if ( !$group ){
			return false;
		}

		// Firstname is required
		if ( !isset($data['meta']['firstname']) || empty($data['meta']['firstname']) ){
			return false;
		}

		// Lastname is required
		if ( !isset($data['meta']['lastname']) || empty($data['meta']['lastname']) ){
			return false;
		}

		// sex is required
		if ( isset($data['meta']['sex']) || empty($data['meta']['sex']) || $data['meta']['sex'] < 0 || $data['meta']['sex'] > 2 ){
			$data['meta']['sex'] = 1;
		}else {
			$data['meta']['sex'] = (int)$data['meta']['sex'];
		}

		// Birthday is required
		if ( !isset($data['meta']['birthday']) || empty($data['meta']['birthday']) ){
			return false;
		}

		// Marital status
		if ( !isset($data['background']['maritalstatus']) || empty($data['background']['maritalstatus']) ){
			$data['background']['maritalstatus'] = false;
		}
		
		// City is required
		if ( !isset($data['meta']['location']['location']) || empty($data['meta']['location']['location']) ){
			return false;
		}
		
		// Postal code is required
		if ( !isset($data['meta']['postalcode']) || empty($data['meta']['postalcode']) ){
			return false;
		}
		
		// Address is required
		if ( !isset($data['meta']['address']) || empty($data['meta']['address']) ){
			return false;
		}

		// Advice for contact
		if ( !isset($data['background']['adviceforcontact']) || empty($data['background']['adviceforcontact']) ){
			$data['background']['adviceforcontact'] = '';
		}

		// Industry is required
		if ( !isset($data['meta']['industry']) || empty($data['meta']['industry']) ){
			return false;
		}
		if ( !isset($data['meta']['industry_id']) ){
			$data['meta']['industry_id'] = 0;
		}

		// Heading Line
		if ( !isset($data['meta']['headingline']) || empty($data['meta']['headingline']) ){
			$data['meta']['headingline'] = '';
		}

		// Interest
		if ( !isset($data['background']['interest']) || empty($data['background']['interest']) ){
			$data['background']['interest'] = '';
		}

		// Ims
		if ( !isset($data['user']['ims']) || empty($data['user']['ims']) ){
			$data['user']['ims'] = array();
		}

		// Phones
		if ( !isset($data['user']['phones']) || empty($data['user']['phones']) ){
			$data['user']['phones'] = array();
		}

		// Websites
		if ( !isset($data['user']['websites']) || empty($data['user']['websites']) ){
			$data['user']['websites'] = array();
		}

		// Experiencies
		if ( !isset($data['background']['experiencies']) || empty($data['background']['experiencies']) ){
			$data['background']['experiencies'] = array();
		}

		// Educations
		if ( !isset($data['background']['educations']) || empty($data['background']['educations']) ){
			$data['background']['educations'] = array();
		}

		// Former
		if ( !isset($data['user']['formers']) || empty($data['user']['formers']) ){
			$data['user']['formers'] = array();
		}
		
		// Check email
		// Get primary email
		$primary_email = '';
		foreach ( $data['user']['emails'] as $email_data ){
			if ( $email_data['primary'] ){
				$primary_email = strtolower( trim( $email_data['email'] ) );
				break;
			}
		}
		// Get list email 
		$emails = array();
		$email = new Email();
		$email->setEmail( $primary_email );
		$email->setPrimary( true );
		$emails[] = $email;
		foreach ( $data['user']['emails'] as $email_data ){
			$email_data['email'] = strtolower( trim( $email_data['email'] ) );
			if ( $email_data['email'] === $primary_email ){
				continue;
			}elseif ( !$email_data['email'] ) {
				continue;
			}
			$email = new Email();
			$email->setEmail( strtolower( trim( $email_data['email'] ) ) );
			$email->setPrimary( false );
			$emails[$email_data['email']] = $email;
		}

		// Create Experiencies
		$experiencies = array();
		foreach ($data['background']['experiencies'] as $experience_data) {
			if ( !isset( $experience_data['company'] ) || empty( $experience_data['company'] ) ) {
				continue;
			}
			$ended = new \Datetime();
			$ended->setDate( $experience_data['ended']['year'], $experience_data['ended']['month'], 1 );
			$started = new \Datetime();
			$started->setDate( $experience_data['started']['year'], $experience_data['started']['month'], 1 );
			$experience = new Experience();
			$experience->setCompany( trim( $experience_data['company'] ) );
			$experience->setCurrent( trim( $experience_data['current'] ) );
			$experience->setTitle( trim( $experience_data['title'] ) );

			// Create Location
			$location = new Location();
			$location->setLocation( trim( $experience_data['location'] ) );
			$location->setCityId( trim( $experience_data['city_id'] ) );
			$experience->setLocation( $location );

			$experience->setEnded( $ended );
			$experience->setStarted( $started );
			$experience->setDescription( trim( $experience_data['description'] ) );
			$experiencies[] = $experience;
		}

		// Create Educations
		$educations = array();
		foreach ($data['background']['educations'] as $education_data) {
			if ( !isset( $education_data['school'] ) || empty( $education_data['school'] ) ) {
				continue;
			}
			$education = new Education();
			$education->setSchool( trim( $education_data['school'] ) );
			$education->setSchoolId( trim( $education_data['school_id'] ) );
			$education->setDegree( trim( $education_data['degree'] ) );
			$education->setDegreeId( trim( $education_data['degree_id'] ) );
			$education->setGrace( trim( $education_data['grace'] ) );
			$education->setFieldOfStudy( trim( $education_data['fieldofstudy'] ) );
			$education->setFieldOfStudyId( trim( $education_data['fieldofstudy_id'] ) );
			$education->setEnded( trim( $education_data['ended'] ) );
			$education->setStarted( trim( $education_data['started'] ) );
			$education->setSocieties( trim( $education_data['societies'] ) );
			$education->setDescription( trim( $education_data['description'] ) );
			$educations[] = $education;
		}

		// Create Background
		$background = new Background();
		$background->setMaritalStatus( $data['background']['maritalstatus'] );
		$background->setAdviceForContact( trim( $data['background']['adviceforcontact'] ) );
		$background->setInterest( trim( $data['background']['interest'] ) );
		$background->setExperiencies( $experiencies );
		$background->setEducations( $educations );

		// Create Ims
		$ims = array();
		foreach ($data['user']['ims'] as $im_data) {
			if ( !isset( $im_data['im'] ) || empty( $im_data['im'] ) ) {
				continue;
			}
			$im = new Im();
			$im->setIm( strtolower( trim($im_data['im']) ) );
			$im->setType( trim( $im_data['type'] ) );
			$im->setVisible( trim( $im_data['visible'] ) );
			$ims[] = $im;
		}

		// Create Phones
		$phones = array();
		foreach ($data['user']['phones'] as $phone_data) {
			if ( !isset( $phone_data['phone'] ) || empty( $phone_data['phone'] ) ) {
				continue;
			}
			$phone = new Phone();
			$phone->setPhone( trim( $phone_data['phone'] ) );
			$phone->setType( trim( $phone_data['type'] ) );
			$phone->setVisible( trim( $phone_data['visible'] ) );
			$phones[] = $phone;
		}

		// Create Websites
		$websites = array();
		foreach ($data['user']['websites'] as $website_data) {
			if ( !isset( $website_data['url'] ) || empty( $website_data['url'] ) ) {
				continue;
			}
			$website = new Website();
			$website->setUrl( strtolower( trim( $website_data['url'] ) ) );
			$website->setTitle( trim( $website_data['title'] ) );
			$websites[] = $website;
		}

		// Create Formers
		$formers = array();
		foreach ($data['user']['formers'] as $former_data) {
			if ( !isset( $former_data['name'] ) || empty( $former_data['name'] ) ) {
				continue;
			}
			$former = new Former();
			$former->setName( trim( $former_data['name'] ) );
			$former->setValue( trim( $former_data['value'] ) );
			$former->setVisible( trim( $former_data['visible'] ) );
			$formers[] = $former;
		}

		// Create Location
		$location = new Location();
		$location->setLocation( trim( $data['meta']['location']['location'] ) );
		$location->setCityId( trim( $data['meta']['location']['city_id'] ) );
		
		// Create Meta
		$meta = new Meta();
		$meta->setFirstname( trim( $data['meta']['firstname'] ) );
		$meta->setLastname( trim( $data['meta']['lastname'] ) );
		$meta->setBirthday( new \Datetime( $data['background']['birthday'] ) );
		$meta->setSex( $data['meta']['sex'] );
		$meta->setLocation( $location );
		$meta->setPostalCode( trim( $data['meta']['postalcode'] ) );
		$meta->setAddress( trim( $data['meta']['address'] ) );
		$meta->setIndustry( trim( $data['meta']['industry'] ) );
		$meta->setIndustryId( trim( $data['meta']['industry_id'] ) );
		$meta->setHeadingLine( trim( $data['meta']['headingline'] ) );
		$meta->setBackground( $background );
		$meta->setIms( $ims );
		$meta->setPhones( $phones );
		$meta->setWebsites( $websites );
		$meta->setFormers( $formers );

		// Slug
		$slug = $this->url->create_slug( $data['user']['username'] );
		
		$users = $this->dm->getRepository( 'Document\User\User' )->findBySlug( new MongoRegex("/^$slug/i") );

		$arr_slugs = array_map(function($user){
			return $user->getSlug();
		}, $users->toArray());

		$this->load->model( 'tool/slug' );
		$slug = $this->model_tool_slug->getSlug( $slug, $arr_slugs );

		// Create User
		$salt = substr(md5(uniqid(rand(), true)), 0, 9);
		$user = new User();
		$user->setSlug( $slug );
		$user->setUsername( $data['user']['username'] );
		$user->setEmails( $emails );
		$user->setPassword( sha1($salt . sha1($salt . sha1($data['user']['password']))) );
		$user->setGroupUser( $group );
		$user->setMeta( $meta );
		$user->setSalt( $salt );
		
		// Add status
		if ( isset($data['user']['status']) ){
			$user->setStatus( $data['user']['status'] );
		}
		
		// Save to DB
		$this->dm->persist( $user );
		$this->dm->flush();

		$this->load->model('tool/cache');
		$this->model_tool_cache->updateCacheUser( $user );
		
		return true;
	}

	/**
	 * Edit User
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param:
	 * 	User ID 
	 * 	array Data{
	 * 		string Email
	 * 		string Password
	 * 		int Group ID
	 * 		string Firstname
	 * 		string Lastname
	 * 	}
	 * @return: boolean
	 */
	public function editUser( $id, $data = array() ) {
		$user = $this->dm->getRepository('Document\User\User')->find( $id );
		if ( !$user ) {
			return false;
		}
		
		// Username
		if ( !isset($data['user']['username']) ){
			$data['user']['username'] = '';
		}

		// Email is required
		if ( !isset($data['user']['emails']) || count($data['user']['emails']) < 0 ){
			return false;
		}

		// Password is required
		//if ( !isset($data['user']['password']) || empty($data['user']['password']) ){
		//	return false;
		//}

		// Group is required
		if ( !isset($data['user']['group']) ){
			return false;
		}

		$group = $this->dm->getRepository('Document\User\Group')->find( $data['user']['group'] );
		if ( !$group ){
			return false;
		}

		// Firstname is required
		if ( !isset($data['meta']['firstname']) || empty($data['meta']['firstname']) ){
			return false;
		}

		// Lastname is required
		if ( !isset($data['meta']['lastname']) || empty($data['meta']['lastname']) ){
			return false;
		}

		// sex is required
		if ( isset($data['meta']['sex']) || empty($data['meta']['sex']) || $data['meta']['sex'] < 0 || $data['meta']['sex'] > 2 ){
			$data['meta']['sex'] = 1;
		}else {
			$data['meta']['sex'] = (int)$data['meta']['sex'];
		}

		// Birthday is required
		if ( !isset($data['meta']['birthday']) || empty($data['meta']['birthday']) ){
			return false;
		}

		// Marital status
		if ( !isset($data['background']['maritalstatus']) || empty($data['background']['maritalstatus']) ){
			$data['background']['maritalstatus'] = false;
		}
		
		// City is required
		if ( !isset($data['meta']['location']['location']) || empty($data['meta']['location']['location']) ){
			return false;
		}
		
		// Postal code is required
		if ( !isset($data['meta']['postalcode']) || empty($data['meta']['postalcode']) ){
			return false;
		}
		
		// Address is required
		if ( !isset($data['meta']['address']) || empty($data['meta']['address']) ){
			return false;
		}

		// Advice for contact
		if ( !isset($data['background']['adviceforcontact']) || empty($data['background']['adviceforcontact']) ){
			$data['background']['adviceforcontact'] = '';
		}

		// Industry is required
		if ( !isset($data['meta']['industry']) || empty($data['meta']['industry']) ){
			return false;
		}
		if ( !isset($data['meta']['industry_id']) ){
			$data['meta']['industry_id'] = 0;
		}

		// Heading Line
		if ( !isset($data['meta']['headingline']) || empty($data['meta']['headingline']) ){
			$data['meta']['headingline'] = '';
		}

		// Interest
		if ( !isset($data['background']['interest']) || empty($data['background']['interest']) ){
			$data['background']['interest'] = '';
		}

		// Ims
		if ( !isset($data['user']['ims']) || empty($data['user']['ims']) ){
			$data['user']['ims'] = array();
		}

		// Phones
		if ( !isset($data['user']['phones']) || empty($data['user']['phones']) ){
			$data['user']['phones'] = array();
		}

		// Websites
		if ( !isset($data['user']['websites']) || empty($data['user']['websites']) ){
			$data['user']['websites'] = array();
		}

		// Experiencies
		if ( !isset($data['background']['experiencies']) || empty($data['background']['experiencies']) ){
			$data['background']['experiencies'] = array();
		}

		// Educations
		if ( !isset($data['background']['educations']) || empty($data['background']['educations']) ){
			$data['background']['educations'] = array();
		}

		// Former
		if ( !isset($data['user']['formers']) || empty($data['user']['formers']) ){
			$data['user']['formers'] = array();
		}
		
		// Check email
		// Get primary email
		$primary_email = '';
		foreach ( $data['user']['emails'] as $email_data ){
			if ( $email_data['primary'] ){
				$primary_email = strtolower( trim( $email_data['email'] ) );
				break;
			}
		}
		// Get list email 
		$emails = array();
		$email = new Email();
		$email->setEmail( $primary_email );
		$email->setPrimary( true );
		$emails[] = $email;
		foreach ( $data['user']['emails'] as $email_data ){
			$email_data['email'] = strtolower( trim( $email_data['email'] ) );
			if ( $email_data['email'] === $primary_email ){
				continue;
			}elseif ( !$email_data['email'] ) {
				continue;
			}
			$email = new Email();
			$email->setEmail( strtolower( trim( $email_data['email'] ) ) );
			$email->setPrimary( false );
			$emails[$email_data['email']] = $email;
		}

		// Create Experiencies
		$experiencies = array();
		foreach ($data['background']['experiencies'] as $experience_data) {
			if ( !isset( $experience_data['company'] ) || empty( $experience_data['company'] ) ) {
				continue;
			}
			$ended = new \Datetime();
			$ended->setDate( $experience_data['ended']['year'], $experience_data['ended']['month'], 1 );
			$started = new \Datetime();
			$started->setDate( $experience_data['started']['year'], $experience_data['started']['month'], 1 );
			$experience = new Experience();
			$experience->setCompany( trim( $experience_data['company'] ) );
			$experience->setCurrent( trim( $experience_data['current'] ) );
			$experience->setTitle( trim( $experience_data['title'] ) );

			// Create Location
			$location = new Location();
			$location->setLocation( trim( $experience_data['location'] ) );
			$location->setCityId( trim( $experience_data['city_id'] ) );
			$experience->setLocation( $location );
			
			$experience->setEnded( $ended );
			$experience->setStarted( $started );
			$experience->setDescription( trim( $experience_data['description'] ) );
			$experiencies[] = $experience;
		}

		// Create Educations
		$educations = array();
		foreach ($data['background']['educations'] as $education_data) {
			if ( !isset( $education_data['school'] ) || empty( $education_data['school'] ) ) {
				continue;
			}
			$education = new Education();
			$education->setSchool( trim( $education_data['school'] ) );
			$education->setSchoolId( trim( $education_data['school_id'] ) );
			$education->setDegree( trim( $education_data['degree'] ) );
			$education->setDegreeId( trim( $education_data['degree_id'] ) );
			$education->setGrace( trim( $education_data['grace'] ) );
			$education->setFieldOfStudy( trim( $education_data['fieldofstudy'] ) );
			$education->setFieldOfStudyId( trim( $education_data['fieldofstudy_id'] ) );
			$education->setEnded( trim( $education_data['ended'] ) );
			$education->setStarted( trim( $education_data['started'] ) );
			$education->setSocieties( trim( $education_data['societies'] ) );
			$education->setDescription( trim( $education_data['description'] ) );
			$educations[] = $education;
		}

		// Create Background
		$background = new Background();
		$background->setMaritalStatus( $data['background']['maritalstatus'] );
		$background->setAdviceForContact( trim( $data['background']['adviceforcontact'] ) );
		$background->setInterest( trim( $data['background']['interest'] ) );
		$background->setExperiencies( $experiencies );
		$background->setEducations( $educations );

		// Create Ims
		$ims = array();
		foreach ($data['user']['ims'] as $im_data) {
			if ( !isset( $im_data['im'] ) || empty( $im_data['im'] ) ) {
				continue;
			}
			$im = new Im();
			$im->setIm( strtolower( trim($im_data['im']) ) );
			$im->setType( trim( $im_data['type'] ) );
			$im->setVisible( trim( $im_data['visible'] ) );
			$ims[] = $im;
		}

		// Create Phones
		$phones = array();
		foreach ($data['user']['phones'] as $phone_data) {
			if ( !isset( $phone_data['phone'] ) || empty( $phone_data['phone'] ) ) {
				continue;
			}
			$phone = new Phone();
			$phone->setPhone( trim( $phone_data['phone'] ) );
			$phone->setType( trim( $phone_data['type'] ) );
			$phone->setVisible( trim( $phone_data['visible'] ) );
			$phones[] = $phone;
		}

		// Create Websites
		$websites = array();
		foreach ($data['user']['websites'] as $website_data) {
			if ( !isset( $website_data['url'] ) || empty( $website_data['url'] ) ) {
				continue;
			}
			$website = new Website();
			$website->setUrl( strtolower( trim( $website_data['url'] ) ) );
			$website->setTitle( trim( $website_data['title'] ) );
			$websites[] = $website;
		}

		// Create Formers
		$formers = array();
		foreach ($data['user']['formers'] as $former_data) {
			if ( !isset( $former_data['name'] ) || empty( $former_data['name'] ) ) {
				continue;
			}
			$former = new Former();
			$former->setName( trim( $former_data['name'] ) );
			$former->setValue( trim( $former_data['value'] ) );
			$former->setVisible( trim( $former_data['visible'] ) );
			$formers[] = $former;
		}

		// Create Location
		$location = new Location();
		$location->setLocation( trim( $data['meta']['location']['location'] ) );
		$location->setCityId( trim( $data['meta']['location']['city_id'] ) );
		
		// Create Meta
		$meta = new Meta();
		$meta->setFirstname( trim( $data['meta']['firstname'] ) );
		$meta->setLastname( trim( $data['meta']['lastname'] ) );
		$meta->setSex( $data['meta']['sex'] );
		$meta->setBirthday(new \Datetime( $data['background']['birthday'] ));
		$meta->setLocation( $location );
		$meta->setPostalCode( trim( $data['meta']['postalcode'] ) );
		$meta->setAddress( trim( $data['meta']['address'] ) );
		$meta->setIndustry( trim( $data['meta']['industry'] ) );
		$meta->setIndustryId( trim( $data['meta']['industry_id'] ) );
		$meta->setHeadingLine( trim( $data['meta']['headingline'] ) );
		$meta->setBackground( $background );
		$meta->setIms( $ims );
		$meta->setPhones( $phones );
		$meta->setWebsites( $websites );
		$meta->setFormers( $formers );

		// Slug
		if ( $data['user']['username'] != $user->getUsername() ){
			$slug = $this->url->create_slug( $data['user']['username'] );
		
			$users = $this->dm->getRepository( 'Document\User\User' )->findBySlug( new MongoRegex("/^$slug/i") );

			$arr_slugs = array_map(function($user){
				return $user->getSlug();
			}, $users->toArray());

			$this->load->model( 'tool/slug' );
			$slug = $this->model_tool_slug->getSlug( $slug, $arr_slugs );
			
			$user->setSlug( $slug );
		}
		
		// Create User
		$salt = substr(md5(uniqid(rand(), true)), 0, 9);
		$user->setEmails( $emails );
		$user->setUsername( $data['user']['username'] );
		//$user->setPassword( sha1($salt . sha1($salt . sha1($data['user']['password']))) );
		$user->setGroupUser( $group );
		$user->setMeta( $meta );
	
		// Add status
		if ( isset($data['user']['status']) ){
			$user->setStatus( $data['user']['status'] );
		}

		// Save to DB
		$this->dm->persist( $user );
		$this->dm->flush();
		
		return true;
	}

	public function changePassword( $id, $data = array() ) {
		$user = $this->dm->getRepository('Document\User\User')->find( $id );
		if ( !$user ) {
			return false;
		}

		// Password is required
		if ( !isset($data['password']) || empty($data['password']) ){
			return false;
		}

		$salt = substr(md5(uniqid(rand(), true)), 0, 9);
		$user->setSalt( $salt );
		$user->setPassword( sha1($salt . sha1($salt . sha1($data['password']))) );

		// Save to DB
		$this->dm->persist( $user );
		$this->dm->flush();

		$this->load->model('tool/cache');
		$this->model_tool_cache->updateCacheUser( $user );

		return true;
	}

	/**
	 * Delete User
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param:
	 * 	array Data{
	 * 		int User ID
	 * 	}
	 * @return: void
	 */
	public function deleteUser( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$user = $this->dm->getRepository( 'Document\User\User' )->find( $id );
				$this->dm->remove($user);
			}
		}
		$this->dm->flush();

		$this->load->model('tool/cache');
		$this->model_tool_cache->updateCacheUser( $user );

		return true;
	}
	
	/**
	 * Get One User
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: User ID 
	 * @return: Object User
	 */
	public function getUser( $data = array() ) {
		$user_repository = $this->dm->getRepository( 'Document\User\User' );
		
		if ( isset( $data['user_id']) ){
			return $user_repository->find( $data['user_id'] );
		}
		
		if ( isset( $data['email']) ){
			return $user_repository->findOneBy( array('emails.email' => $data['email']) );
		}
		
		return null;
	}

	/**
	 * Edit List Users
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param:
	 * 	array Data{
	 * 		int Limit
	 * 		int Start
	 * 		int Group ID
	 * 	}
	 * @return: array Object Users
	 */
	public function getUsers( $data = array() ) {
		if ( isset($data['group_id']) ){
			return $this->dm->getRepository( 'Document\User\User' )->findBy( array('group.id' => $data['group_id']) );
		}
		
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\User\User' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	/**
	 * Count Total Users
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: empty
	 * @return: int Total User
	 */
	public function getTotalUsers() {
		$users = $this->dm->getRepository( 'Document\User\User' )->findAll();
		return count($users);
	}
	
	/**
	 * Check Exist Email
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: string Email
	 * @return: boolean
	 */
	public function isExistEmail( $curr_user_id, $email ) {
		$users = $this->dm->getRepository( 'Document\User\User' )->findAll();
		
		foreach ( $users as $user ) {
			if ( $user->getId() == $curr_user_id ){
				continue;
			}
			
			if ( $user->isExistEmail( $email ) ){
				return true;
			}
		}
		
		return false;
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