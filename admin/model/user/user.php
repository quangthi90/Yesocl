<?php
use Document\User\User;
use Document\User\Meta;
use Document\User\Email;
use Document\User\Background;
use Document\User\Location;
use Document\User\Im;
use Document\User\Phone;
use Document\User\Website;
use Document\User\Education;
use Document\User\Experience;
use Document\User\Former;

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

		// Birthday is required
		if ( !isset($data['background']['birthday']) || empty($data['background']['birthday']) ){
			return false;
		}

		// Marital status
		if ( !isset($data['background']['maritalstatus']) || empty($data['background']['maritalstatus']) ){
			$data['background']['maritalstatus'] = false;
		}

		// Country is required
		if ( !isset($data['meta']['location']['country']) || empty($data['meta']['location']['country']) ){
			return false; 
		}
		if ( !isset($data['meta']['location']['country_id']) || empty($data['meta']['location']['country_id']) ){
			return false; 
		}
		
		// City is required
		if ( !isset($data['meta']['location']['city']) || empty($data['meta']['location']['city']) ){
			return false;
		}
		if ( !isset($data['meta']['location']['city_id']) || empty($data['meta']['location']['city_id']) ){
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

		// Create Location
		$location = new Location();
		$location->setCountry( $data['meta']['location']['country'] );
		$location->setCountryId( $data['meta']['location']['country_id'] );
		$location->setCity( $data['meta']['location']['city'] );
		$location->setCityId( $data['meta']['location']['city_id'] );
		
		// Create Meta
		$meta = new Meta();
		$meta->setFirstname( $data['meta']['firstname'] );
		$meta->setLastname( $data['meta']['lastname'] );
		$meta->setLocation( $location );
		$meta->setPostalCode( $data['meta']['postalcode'] );
		$meta->setAddress( $data['meta']['address'] );
		$meta->setIndustry( $data['meta']['industry'] );
		$meta->setHeadingLine( $data['meta']['headingline'] );
		
		// Check email
		// Get primary email
		$primary_email = '';
		foreach ( $data['user']['emails'] as $email_data ){
			if ( $email_data['primary'] ){
				$primary_email = strtolower($email_data['email']);
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
			if ( strtolower($email_data['email']) === $primary_email ){
				continue;
			}elseif ( !$email_data['email'] ) {
				continue;
			}
			$email = new Email();
			$email->setEmail( $data['email'] );
			$email->setPrimary( false );
			$emails[] = $email;
		}

		// Create Experiencies
		$experiencies = array();
		foreach ($data['background']['experiencies'] as $experience_data) {
			if ( !$experience_data['company'] ) {
				continue;
			}
			$experience = new Experience();
			$experience->setCompany( $experience_data['company'] );
			$experience->setCurrent( $experience_data['current'] );
			$experience->setTitle( $experience_data['title'] );
			$experience->setLocation( $experience_data['location'] );
			$experience->setEnded( $experience_data['ended'] );
			$experience->setStarted( $experience_data['started'] );
			$experience->setDescription( $experience_data['description'] );
			$experiencies[] = $experience;
		}

		// Create Educations
		$educations = array();
		foreach ($data['background']['educations'] as $education_data) {
			if ( !$education_data['school'] ) {
				continue;
			}
			$education = new Education();
			$education->setSchool( $education_data['school'] );
			$education->setDegree( $education_data['degree'] );
			$education->setGrace( $education_data['grace'] );
			$education->setFieldOfStudy( $education_data['fieldofstudy'] );
			$education->setEnded( $education_data['ended'] );
			$education->setStarted( $education_data['started'] );
			$education->setSocieties( $education_data['societies'] );
			$education->setDescription( $education_data['description'] );
			$educations[] = $education;
		}

		// Create Background
		$background = new Background();
		$background->setBirthday(new \Datetime( $data['background']['birthday'] ));
		$background->setMaritalStatus( $data['background']['maritalstatus'] );
		$background->setAdviceForContact( $data['background']['adviceforcontact'] );
		$background->setInterest( $data['background']['interest'] );
		$background->setExperiencies( $experiencies );
		$background->setEducations( $educations );

		// Create Ims
		$ims = array();
		foreach ($data['user']['ims'] as $im_data) {
			if ( !$im_data['im'] ) {
				continue;
			}
			$im = new Im();
			$im->setIm( $im_data['im'] );
			$im->setType( $im_data['type'] );
			$im->setVisible( $im_data['visible'] );
			$ims[] = $im;
		}

		// Create Phones
		$phones = array();
		foreach ($data['user']['phones'] as $phone_data) {
			if ( !$phone_data['phone'] ) {
				continue;
			}
			$phone = new Phone();
			$phone->setPhone( $phone_data['phone'] );
			$phone->setType( $phone_data['type'] );
			$phone->setVisible( $phone_data['visible'] );
			$phones[] = $phone;
		}

		// Create Websites
		$websites = array();
		foreach ($data['user']['websites'] as $website_data) {
			if ( !$website_data['url'] ) {
				continue;
			}
			$website = new Website();
			$website->setUrl( $website_data['url'] );
			$website->setTitle( $website_data['title'] );
			$websites[] = $website;
		}

		// Create Formers
		$formers = array();
		foreach ($data['user']['formers'] as $former_data) {
			if ( !$former_data['name'] ) {
				continue;
			}
			$former = new Website();
			$former->setName( $former_data['name'] );
			$former->setValue( $former_data['value'] );
			$former->setVisible( $former_data['visible'] );
			$formers[] = $former;
		}
		
		// Create User
		$salt = substr(md5(uniqid(rand(), true)), 0, 9);
		$user = new User();
		$user->setEmails( $emails );
		$user->setPassword( sha1($salt . sha1($salt . sha1($data['user']['password']))) );
		$user->setGroupUser( $group );
		$user->setMeta( $meta );
		$user->setBackground( $background );
		$user->setIms( $ims );
		$user->setPhones( $phones );
		$user->setWebsites( $websites );
		$user->setFormers( $formers );
		
		// Add status
		if ( isset($data['user']['status']) ){
			$user->setStatus( $data['user']['status'] );
		}
		
		// Save to DB
		$this->dm->persist( $user );
		$this->dm->flush();
		
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

		// Birthday is required
		if ( !isset($data['background']['birthday']) || empty($data['background']['birthday']) ){
			return false;
		}

		// Marital status
		if ( !isset($data['background']['maritalstatus']) || empty($data['background']['maritalstatus']) ){
			$data['background']['maritalstatus'] = false;
		}

		// Country is required
		if ( !isset($data['meta']['location']['country']) || empty($data['meta']['location']['country']) ){
			return false; 
		}
		if ( !isset($data['meta']['location']['country_id']) || empty($data['meta']['location']['country_id']) ){
			return false; 
		}
		
		// City is required
		if ( !isset($data['meta']['location']['city']) || empty($data['meta']['location']['city']) ){
			return false;
		}
		if ( !isset($data['meta']['location']['city_id']) || empty($data['meta']['location']['city_id']) ){
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

		// Create Location
		$location = new Location();
		$location->setCountry( $data['meta']['location']['country'] );
		$location->setCountryId( $data['meta']['location']['country_id'] );
		$location->setCity( $data['meta']['location']['city'] );
		$location->setCityId( $data['meta']['location']['city_id'] );
		
		// Create Meta
		$meta = new Meta();
		$meta->setFirstname( $data['meta']['firstname'] );
		$meta->setLastname( $data['meta']['lastname'] );
		$meta->setLocation( $location );
		$meta->setPostalCode( $data['meta']['postalcode'] );
		$meta->setAddress( $data['meta']['address'] );
		$meta->setIndustry( $data['meta']['industry'] );
		$meta->setHeadingLine( $data['meta']['headingline'] );
		
		// Check email
		// Get primary email
		$primary_email = '';
		foreach ( $data['user']['emails'] as $email_data ){
			if ( $email_data['primary'] ){
				$primary_email = strtolower($email_data['email']);
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
			if ( strtolower($email_data['email']) === $primary_email ){
				continue;
			}elseif ( !$email_data['email'] ) {
				continue;
			}
			$email = new Email();
			$email->setEmail( $email_data['email'] );
			$email->setPrimary( false );
			$emails[] = $email;
		}

		// Create Experiencies
		$experiencies = array();
		foreach ($data['background']['experiencies'] as $experience_data) {
			if ( !$experience_data['company'] ) {
				continue;
			}
			$experience = new Experience();
			$experience->setCompany( $experience_data['company'] );
			$experience->setCurrent( $experience_data['current'] );
			$experience->setTitle( $experience_data['title'] );
			$experience->setLocation( $experience_data['location'] );
			$experience->setEnded( $experience_data['ended'] );
			$experience->setStarted( $experience_data['started'] );
			$experience->setDescription( $experience_data['description'] );
			$experiencies[] = $experience;
		}

		// Create Educations
		$educations = array();
		foreach ($data['background']['educations'] as $education_data) {
			if ( !$education_data['school'] ) {
				continue;
			}
			$education = new Education();
			$education->setSchool( $education_data['school'] );
			$education->setDegree( $education_data['degree'] );
			$education->setGrace( $education_data['grace'] );
			$education->setFieldOfStudy( $education_data['fieldofstudy'] );
			$education->setEnded( $education_data['ended'] );
			$education->setStarted( $education_data['started'] );
			$education->setSocieties( $education_data['societies'] );
			$education->setDescription( $education_data['description'] );
			$educations[] = $education;
		}

		// Create Background
		$background = new Background();
		$background->setBirthday(new \Datetime( $data['background']['birthday'] ));
		$background->setMaritalStatus( $data['background']['maritalstatus'] );
		$background->setAdviceForContact( $data['background']['adviceforcontact'] );
		$background->setInterest( $data['background']['interest'] );
		$background->setExperiencies( $experiencies );
		$background->setEducations( $educations );

		// Create Ims
		$ims = array();
		foreach ($data['user']['ims'] as $im_data) {
			if ( !$im_data['im'] ) {
				continue;
			}
			$im = new Im();
			$im->setIm( $im_data['im'] );
			$im->setType( $im_data['type'] );
			$im->setVisible( $im_data['visible'] );
			$ims[] = $im;
		}

		// Create Phones
		$phones = array();
		foreach ($data['user']['phones'] as $phone_data) {
			if ( !$phone_data['phone'] ) {
				continue;
			}
			$phone = new Phone();
			$phone->setPhone( $phone_data['phone'] );
			$phone->setType( $phone_data['type'] );
			$phone->setVisible( $phone_data['visible'] );
			$phones[] = $phone;
		}

		// Create Websites
		$websites = array();
		foreach ($data['user']['websites'] as $website_data) {
			if ( !$website_data['url'] ) {
				continue;
			}
			$website = new Website();
			$website->setUrl( $website_data['url'] );
			$website->setTitle( $website_data['title'] );
			$websites[] = $website;
		}

		// Create Formers
		$formers = array();
		foreach ($data['user']['formers'] as $former_data) {
			if ( !$former_data['name'] ) {
				continue;
			}
			$former = new Website();
			$former->setName( $former_data['name'] );
			$former->setValue( $former_data['value'] );
			$former->setVisible( $former_data['visible'] );
			$formers[] = $former;
		}
		
		// Create User
		$salt = substr(md5(uniqid(rand(), true)), 0, 9);
		$user->setEmails( $emails );
		$user->setPassword( sha1($salt . sha1($salt . sha1($data['user']['password']))) );
		$user->setGroupUser( $group );
		$user->setMeta( $meta );
		$user->setBackground( $background );
		$user->setIms( $ims );
		$user->setPhones( $phones );
		$user->setWebsites( $websites );
		$user->setFormers( $formers );
	
		// Add status
		if ( isset($data['user']['status']) ){
			$user->setStatus( $data['user']['status'] );
		}

		// Save to DB
		$this->dm->persist( $user );
		$this->dm->flush();
		
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
}
?>